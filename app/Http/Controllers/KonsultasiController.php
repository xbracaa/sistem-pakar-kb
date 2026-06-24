<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kondisi;
use App\Models\Aturan;
use App\Models\MetodeKb;

class KonsultasiController extends Controller
{
    /**
     * Menampilkan halaman form konsultasi (Multi-step Wizard).
     * Kondisi dikelompokkan ke dalam 3 langkah.
     */
    public function index()
    {
        // Kondisi yang disembunyikan dari UI karena akan dideteksi dari Form Biodata:
        // K12 (Anak > 3), K30 (Usia >= 35), K55 (Usia < 35)
        $hiddenIds = ['K12', 'K30', 'K55'];

        // Definisi pengelompokan kondisi untuk Step 2 (UI Wizard)
        $kategori = [
            'Umum & Reproduksi' => ['K03','K04','K05','K06','K07','K08','K13','K14','K15','K18','K19','K20','K21','K22','K23','K24','K25','K27','K28','K29','K49','K56'],
            'Kardiovaskular & Saraf' => ['K01','K02','K09','K31','K32','K33','K34','K35','K36','K40','K47','K48'],
            'Penyakit Kronis & Infeksi' => ['K16','K17','K26','K39','K41','K42','K43','K44','K45','K50','K52','K53'],
            'Kandungan & Tumor' => ['K10','K11','K37','K38','K46','K51','K54']
        ];

        $kelompokKondisi = [];
        foreach ($kategori as $namaKategori => $ids) {
            // Hilangkan ID yang hidden
            $idsFiltered = array_diff($ids, $hiddenIds);
            if (!empty($idsFiltered)) {
                $kelompokKondisi[$namaKategori] = Kondisi::whereIn('id', $idsFiltered)
                                                    ->orderByRaw("FIELD(id, '" . implode("','", $idsFiltered) . "')")
                                                    ->get();
            }
        }

        return view('konsultasi', compact('kelompokKondisi'));
    }

    /**
     * Mesin Inferensi: Forward Chaining + Certainty Factor
     *
     * Alur:
     * 1. Tangkap kondisi yang dicentang user (CF User = 1.0)
     * 2. Loop semua aturan, evaluasi premis (AND/OR)
     * 3. Jika aturan cocok → ambil konklusi & cf_pakar
     * 4. Kombinasikan CF: CF_combine = CF_old + CF_new × (1 - CF_old)
     * 5. Rule khusus: cf_pakar = -1.0 → Dilarang Mutlak (override semua)
     */
    public function hitung(Request $request)
    {
        // 1. Simpan Biodata & Logika Pakar Otomatis
        $biodata = [
            'nama' => $request->input('nama', 'Pasien'),
            'usia' => (int) $request->input('usia', 0),
            'suami' => $request->input('suami', '-'),
            'jml_anak' => (int) $request->input('jml_anak', 0)
        ];

        // Tangkap array ID kondisi yang dicentang user
        $kondisiUser = $request->input('kondisi', []);

        // Smart Logic: Inject Kondisi Otomatis berdasarkan Usia & Anak
        if ($biodata['usia'] >= 35) {
            $kondisiUser[] = 'K30';
        } elseif ($biodata['usia'] > 0 && $biodata['usia'] < 35) {
            $kondisiUser[] = 'K55';
        }

        if ($biodata['jml_anak'] > 3) {
            $kondisiUser[] = 'K12';
        }

        // Hapus duplikat just in case
        $kondisiUser = array_unique($kondisiUser);

        if (empty($kondisiUser)) {
            return redirect('/konsultasi')->with('error', 'Silakan pilih minimal satu kondisi keluhan.');
        }

        // Ambil nama kondisi untuk ditampilkan di hasil
        $kondisiDipilih = Kondisi::whereIn('id', $kondisiUser)->get();

        // 2. Ambil semua aturan dari database
        $semuaAturan = Aturan::all();

        // Array untuk menyimpan CF per metode & tracking aturan yang tereksekusi
        $hasilCF = [];           // ['M01' => 0.85, 'M02' => 0.72, ...]
        $dilarang = [];          // ['M05' => true, ...] — metode yang dilarang mutlak
        $aturanAktif = [];       // Tracking aturan mana saja yang aktif
        $detailPerhitungan = []; // Detail step-by-step untuk transparansi

        // 3. Forward Chaining: evaluasi setiap aturan
        foreach ($semuaAturan as $aturan) {
            $premis = $aturan->premis;
            $konklusi = $aturan->konklusi;
            $cfPakar = (float) $aturan->cf_pakar;

            // Evaluasi premis
            $terpenuhi = $this->evaluasiPremis($premis, $kondisiUser);

            if (!$terpenuhi) {
                continue; // Skip aturan yang premisnya tidak terpenuhi
            }

            // Aturan tereksekusi! Catat.
            $aturanAktif[] = [
                'id_aturan' => $aturan->id_aturan,
                'premis' => $premis,
                'konklusi' => $konklusi,
                'cf_pakar' => $cfPakar,
                'kategori_mec' => $aturan->kategori_mec,
            ];

            // 5. RULE KHUSUS: CF Pakar = -1.0 → Dilarang Mutlak (MEC 4)
            if ($cfPakar == -1.0) {
                $dilarang[$konklusi] = true;

                $detailPerhitungan[] = [
                    'aturan' => $aturan->id_aturan,
                    'metode' => $konklusi,
                    'aksi' => 'DILARANG MUTLAK (MEC 4)',
                    'cf_pakar' => $cfPakar,
                ];
                continue;
            }

            // 4. Hitung CF — CF User = 1.0 (karena user mencentang kondisi)
            $cfUser = 1.0;
            $cfHitung = $cfPakar * $cfUser; // = cfPakar (karena CF User selalu 1)

            if (!isset($hasilCF[$konklusi])) {
                // Metode ini baru pertama kali muncul
                $hasilCF[$konklusi] = $cfHitung;

                $detailPerhitungan[] = [
                    'aturan' => $aturan->id_aturan,
                    'metode' => $konklusi,
                    'aksi' => 'CF awal',
                    'cf_pakar' => $cfPakar,
                    'cf_hasil' => $cfHitung,
                ];
            } else {
                // Sudah ada CF sebelumnya → Kombinasikan
                $cfOld = $hasilCF[$konklusi];
                $cfNew = $cfHitung;

                // Rumus kombinasi CF:
                // Jika keduanya positif: CF_combine = CF_old + CF_new × (1 - CF_old)
                // Jika keduanya negatif: CF_combine = CF_old + CF_new × (1 + CF_old)
                // Jika berbeda tanda: CF_combine = (CF_old + CF_new) / (1 - min(|CF_old|, |CF_new|))
                if ($cfOld >= 0 && $cfNew >= 0) {
                    $cfCombine = $cfOld + $cfNew * (1 - $cfOld);
                } elseif ($cfOld < 0 && $cfNew < 0) {
                    $cfCombine = $cfOld + $cfNew * (1 + $cfOld);
                } else {
                    $denominator = 1 - min(abs($cfOld), abs($cfNew));
                    $cfCombine = $denominator != 0 ? ($cfOld + $cfNew) / $denominator : $cfOld + $cfNew;
                }

                $detailPerhitungan[] = [
                    'aturan' => $aturan->id_aturan,
                    'metode' => $konklusi,
                    'aksi' => 'Kombinasi CF',
                    'cf_pakar' => $cfPakar,
                    'cf_old' => round($cfOld, 4),
                    'cf_new' => round($cfNew, 4),
                    'cf_hasil' => round($cfCombine, 4),
                ];

                $hasilCF[$konklusi] = $cfCombine;
            }
        }

        // 6. Susun hasil akhir: gabungkan dengan data metode KB
        $semuaMetode = MetodeKb::all()->keyBy('id');
        $kondisiLookup = Kondisi::pluck('nama_kondisi', 'id')->toArray();
        $hasilAkhir = [];

        foreach ($semuaMetode as $id => $metode) {
            $status = 'tidak_ada_data'; // Default jika tidak ada aturan yang cocok
            $cf = 0;
            $alasan = [];

            if (isset($dilarang[$id])) {
                // Metode ini DILARANG MUTLAK — override semua CF positif
                $status = 'dilarang';
                $cf = -1.0;
                
                $alasanFatal = [];
                foreach ($aturanAktif as $r) {
                    if ($r['konklusi'] === $id && $r['cf_pakar'] == -1.0) {
                        $alasanFatal[] = $this->terjemahkanPremis($r['premis'], $kondisiLookup);
                    }
                }
                if (!empty($alasanFatal)) {
                    $alasan[] = "Berdasarkan pedoman keselamatan medis ketat dari WHO (Kategori MEC 4), metode ini kami tetapkan sebagai DILARANG MUTLAK untuk Bunda. Kami mendeteksi adanya riwayat " . implode(" serta ", array_unique($alasanFatal)) . ". Penggunaan metode ini dalam kondisi tersebut sangat dilarang karena berpotensi memicu komplikasi fatal yang mengancam jiwa atau memperburuk riwayat penyakit yang sudah ada. Sebagai praktisi kesehatan, keselamatan dan nyawa Bunda adalah prioritas tertinggi kami, sehingga opsi ini telah digugurkan sepenuhnya dari daftar rekomendasi.";
                }
            } elseif (isset($hasilCF[$id])) {
                $cf = round($hasilCF[$id], 4);

                if ($cf >= 0.6) {
                    $status = 'sangat_disarankan';
                } elseif ($cf > 0) {
                    $status = 'perlu_perhatian';
                } else {
                    $status = 'tidak_disarankan';
                }
                
                $alasanPositif = [];
                $alasanNegatif = [];

                foreach ($aturanAktif as $r) {
                    if ($r['konklusi'] === $id) {
                        $namaKondisi = $this->terjemahkanPremis($r['premis'], $kondisiLookup);
                        if ($r['cf_pakar'] > 0) {
                            $alasanPositif[] = $namaKondisi;
                        } else if ($r['cf_pakar'] < 0) {
                            $alasanNegatif[] = $namaKondisi;
                        }
                    }
                }
                
                $alasanPositif = array_unique($alasanPositif);
                $alasanNegatif = array_unique($alasanNegatif);

                if ($status == 'sangat_disarankan') {
                    $teks = "Melihat kondisi Bunda yang memiliki catatan " . implode(", ", $alasanPositif) . ", metode ini menduduki peringkat teratas sebagai pilihan prioritas yang sangat direkomendasikan. Dari evaluasi pakar, metode ini terbukti memiliki tingkat kompatibilitas yang sangat tinggi dengan kondisi tubuh Bunda saat ini. Penggunaannya dijamin aman untuk jangka panjang dan tidak akan memicu interaksi negatif dengan riwayat medis Bunda. Ini adalah solusi perlindungan yang sangat andal dan memberikan ketenangan pikiran.";
                    if (!empty($alasanNegatif)) {
                        $teks .= " Meskipun Bunda juga memiliki riwayat ringan pada " . implode(" dan ", $alasanNegatif) . ", keunggulan metode ini tetap jauh melampaui risiko minornya.";
                    }
                    $alasan[] = $teks;
                } elseif ($status == 'perlu_perhatian') {
                    $teks = "Secara umum, metode ini cukup aman dan boleh digunakan, namun dengan pengawasan khusus (Kategori MEC 2). Kami mencatat adanya kondisi " . (!empty($alasanPositif) ? implode(", ", $alasanPositif) : "yang mendukung") . ".";
                    if (!empty($alasanNegatif)) {
                        $teks .= " Namun, karena Bunda juga memiliki riwayat " . implode(" dan ", $alasanNegatif) . ", hal ini memerlukan kehati-hatian ekstra.";
                    }
                    $teks .= " Keuntungannya memang masih terbukti lebih besar daripada risikonya, tetapi kami sangat menyarankan Bunda untuk berkonsultasi langsung dan memeriksakan diri secara rutin ke bidan atau dokter kandungan untuk mengantisipasi keluhan saat pemakaian.";
                    $alasan[] = $teks;
                } else {
                    $teks = "Mohon berhati-hati. Kami mencatat kondisi " . (!empty($alasanNegatif) ? implode(" dan ", $alasanNegatif) : "tertentu") . " pada rekam medis Bunda. Secara klinis, metode ini KAMI KURANG SARANKAN (MEC 3) karena dikhawatirkan dapat memicu risiko komplikasi yang lebih besar daripada manfaatnya akibat kondisi tersebut. Sangat bijak untuk menghindari metode ini dan memilih alternatif yang lebih aman.";
                    $alasan[] = $teks;
                }
            }

            if ($status === 'tidak_ada_data') {
                $status = 'sangat_disarankan';
                $cf = 0.95;
                $alasan[] = "Berdasarkan pedoman WHO (Kategori MEC 1), metode ini SANGAT AMAN. Tidak ditemukan satupun kondisi kontraindikasi pada riwayat medis Bunda, sehingga dapat digunakan tanpa pembatasan medis.";
            } elseif (empty($alasan)) {
                $alasan[] = "Metode ini dapat Bunda gunakan secara umum karena dari analisis kami tidak ada keluhan medis yang berlawanan dengan metode ini.";
            }

            $hasilAkhir[] = [
                'id' => $id,
                'nama_metode' => $metode->nama_metode,
                'cf' => $cf,
                'persentase' => $cf > 0 ? round($cf * 100, 1) : 0,
                'status' => $status,
                'alasan' => array_unique($alasan),
            ];
        }

        // Urutkan: dilarang di bawah, lalu descending by CF
        usort($hasilAkhir, function ($a, $b) {
            $order = ['sangat_disarankan' => 1, 'perlu_perhatian' => 2, 'tidak_ada_data' => 3, 'tidak_disarankan' => 4, 'dilarang' => 5];
            $orderA = $order[$a['status']] ?? 99;
            $orderB = $order[$b['status']] ?? 99;

            if ($orderA !== $orderB) {
                return $orderA - $orderB;
            }
            return $b['cf'] <=> $a['cf']; // Descending CF dalam grup yang sama
        });

        // Simpan ke sesi untuk keperluan cetak PDF/Rekam Medis
        session([
            'hasilAkhir' => $hasilAkhir,
            'kondisiDipilih' => $kondisiDipilih,
            'biodata' => $biodata
        ]);

        return view('hasil', [
            'hasilAkhir' => $hasilAkhir,
            'kondisiDipilih' => $kondisiDipilih,
            'aturanAktif' => $aturanAktif,
            'detailPerhitungan' => $detailPerhitungan,
            'jumlahKondisi' => count($kondisiUser),
            'jumlahAturanAktif' => count($aturanAktif),
        ]);
    }

    public function cetak()
    {
        // Ambil data dari sesi
        $hasilAkhir = session('hasilAkhir');
        $kondisiDipilih = session('kondisiDipilih');

        // Jika tidak ada sesi (user mengakses langsung /cetak tanpa kalkulasi)
        if (!$hasilAkhir) {
            return redirect('/konsultasi')->with('error', 'Silakan lakukan konsultasi terlebih dahulu.');
        }

        $biodata = session('biodata', [
            'nama' => '......................................................',
            'usia' => '....................',
            'suami' => '......................................................',
            'jml_anak' => '....................'
        ]);

        return view('cetak', [
            'hasilAkhir' => $hasilAkhir,
            'kondisiDipilih' => $kondisiDipilih,
            'biodata' => $biodata
        ]);
    }

    /**
     * Evaluasi string premis terhadap kondisi user.
     *
     * Mendukung:
     * - Single: "K01"
     * - AND: "K01 AND K02" (semua harus terpenuhi)
     * - OR: "K01 OR K02" (minimal satu terpenuhi)
     * - Campuran AND/OR: dievaluasi AND-first (precedence)
     *
     * @param string $premis
     * @param array $kondisiUser
     * @return bool
     */
    private function evaluasiPremis(string $premis, array $kondisiUser): bool
    {
        // Cek apakah mengandung OR
        if (strpos($premis, ' OR ') !== false) {
            // Split by OR, lalu evaluasi tiap bagian (yang mungkin mengandung AND)
            $bagianOr = array_map('trim', explode(' OR ', $premis));

            foreach ($bagianOr as $bagian) {
                if ($this->evaluasiAnd($bagian, $kondisiUser)) {
                    return true; // Minimal satu OR terpenuhi
                }
            }
            return false;
        }

        // Tidak ada OR → evaluasi sebagai AND
        return $this->evaluasiAnd($premis, $kondisiUser);
    }

    /**
     * Evaluasi bagian AND dari premis.
     *
     * @param string $premis  Bisa "K01" atau "K01 AND K02 AND K03"
     * @param array $kondisiUser
     * @return bool
     */
    private function evaluasiAnd(string $premis, array $kondisiUser): bool
    {
        $bagianAnd = array_map('trim', explode(' AND ', $premis));

        foreach ($bagianAnd as $kode) {
            if (!in_array($kode, $kondisiUser)) {
                return false; // Satu saja tidak terpenuhi → AND gagal
            }
        }

        return true; // Semua AND terpenuhi
    }

    /**
     * Terjemahkan string premis (K01 AND K02) menjadi kalimat kondisi yang mudah dibaca.
     */
    private function terjemahkanPremis(string $premis, array $lookup): string
    {
        $kodeArray = preg_split('/\s+(AND|OR)\s+/', $premis);
        $namaArray = [];
        foreach ($kodeArray as $kode) {
            $kode = trim($kode);
            if (isset($lookup[$kode])) {
                $namaArray[] = $lookup[$kode];
            }
        }
        return implode(' dan ', array_unique($namaArray));
    }
}