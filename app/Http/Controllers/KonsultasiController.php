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

        $metodeKbs = MetodeKb::all();

        return view('konsultasi', compact('kelompokKondisi', 'metodeKbs'));
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

        // Target KB (Goal Utama) yang dipilih pasien
        $targetKb = $request->input('target_kb', null);

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

        // 2. Persiapan Data untuk Backward Chaining
        $semuaMetode = MetodeKb::all()->keyBy('id');
        // Kelompokkan aturan berdasarkan Konklusi (Goal)
        $semuaAturanGrouped = Aturan::all()->groupBy('konklusi');
        $kondisiLookup = Kondisi::pluck('nama_kondisi', 'id')->toArray();

        $hasilAkhir = [];
        $aturanAktif = [];       // Tracking aturan mana saja yang aktif
        $detailPerhitungan = []; // Detail step-by-step untuk transparansi

        // Jika ada target, evaluasi target tersebut terlebih dahulu (re-ordering array goals)
        $goalIds = $semuaMetode->keys()->toArray();
        if ($targetKb && in_array($targetKb, $goalIds)) {
            $goalIds = array_diff($goalIds, [$targetKb]);
            array_unshift($goalIds, $targetKb);
        }

        // 3. Backward Chaining: Mengevaluasi setiap Goal (Metode KB)
        foreach ($goalIds as $idMetode) {
            $metode = $semuaMetode[$idMetode];
            $aturanUntukMetode = $semuaAturanGrouped->get($idMetode, collect());

            $cfMethod = null;
            $isDilarang = false;
            $status = 'tidak_ada_data';
            $alasan = [];

            // Mengevaluasi mundur semua premis yang dibutuhkan untuk goal ini
            foreach ($aturanUntukMetode as $aturan) {
                $premis = $aturan->premis;
                $cfPakar = (float) $aturan->cf_pakar;

                // Cek ke Fakta Pasien
                $terpenuhi = $this->evaluasiPremis($premis, $kondisiUser);

                if (!$terpenuhi) {
                    continue; // Fakta tidak mendukung aturan ini
                }

                // Fakta mendukung aturan ini! Aturan tereksekusi.
                $aturanAktif[] = [
                    'id_aturan' => $aturan->id_aturan,
                    'premis' => $premis,
                    'konklusi' => $idMetode,
                    'cf_pakar' => $cfPakar,
                    'kategori_mec' => $aturan->kategori_mec,
                ];

                // RULE KHUSUS (Mutlak)
                if ($cfPakar == -1.0) {
                    $isDilarang = true;
                    $detailPerhitungan[] = [
                        'aturan' => $aturan->id_aturan, 'metode' => $idMetode,
                        'aksi' => 'DILARANG MUTLAK (MEC 4)', 'cf_pakar' => $cfPakar
                    ];
                    continue;
                }

                // Kalkulasi CF
                $cfUser = 1.0;
                $cfHitung = $cfPakar * $cfUser;

                if ($cfMethod === null) {
                    $cfMethod = $cfHitung;
                    $detailPerhitungan[] = [
                        'aturan' => $aturan->id_aturan, 'metode' => $idMetode,
                        'aksi' => 'CF awal', 'cf_pakar' => $cfPakar, 'cf_hasil' => $cfHitung
                    ];
                } else {
                    $cfOld = $cfMethod;
                    $cfNew = $cfHitung;

                    if ($cfOld >= 0 && $cfNew >= 0) {
                        $cfCombine = $cfOld + $cfNew * (1 - $cfOld);
                    } elseif ($cfOld < 0 && $cfNew < 0) {
                        $cfCombine = $cfOld + $cfNew * (1 + $cfOld);
                    } else {
                        $denominator = 1 - min(abs($cfOld), abs($cfNew));
                        $cfCombine = $denominator != 0 ? ($cfOld + $cfNew) / $denominator : $cfOld + $cfNew;
                    }

                    $detailPerhitungan[] = [
                        'aturan' => $aturan->id_aturan, 'metode' => $idMetode,
                        'aksi' => 'Kombinasi CF', 'cf_pakar' => $cfPakar,
                        'cf_old' => round($cfOld, 4), 'cf_new' => round($cfNew, 4), 'cf_hasil' => round($cfCombine, 4)
                    ];
                    $cfMethod = $cfCombine;
                }
            }

            // 4. Kesimpulan untuk Goal Ini
            if ($isDilarang) {
                $status = 'dilarang';
                $cfMethod = -1.0;
                
                $alasanFatal = [];
                foreach ($aturanAktif as $r) {
                    if ($r['konklusi'] === $idMetode && $r['cf_pakar'] == -1.0) {
                        $namaKondisi = $this->terjemahkanPremis($r['premis'], $kondisiLookup);
                        
                        // Cek apakah ada alasan khusus dari DB
                        if (!empty($r['alasan_medis'])) {
                            $alasan[] = $r['alasan_medis'];
                        } else {
                            $alasanFatal[] = $namaKondisi;
                        }
                    }
                }
                
                if (!empty($alasanFatal)) {
                    $alasanDetail = $this->generateAlasanMedisSpesifik($alasanFatal, $metode->nama_metode, 'fatal');
                    $alasan[] = "Berdasarkan evaluasi keahlian klinis Bidan dan pedoman ketat WHO (Kategori MEC 4), metode ini kami tetapkan sebagai DILARANG MUTLAK untuk Bunda. Mengapa? Karena $alasanDetail. Keselamatan Bunda adalah prioritas, sehingga opsi ini telah digugurkan sepenuhnya.";
                }
            } elseif ($cfMethod !== null) {
                $cfMethod = round($cfMethod, 4);

                if ($cfMethod >= 0.6) {
                    $status = 'sangat_disarankan';
                } elseif ($cfMethod > 0) {
                    $status = 'perlu_perhatian';
                } else {
                    $status = 'tidak_disarankan';
                }

                $alasanPositif = [];
                $alasanNegatif = [];
                $alasanDariDb = [];

                foreach ($aturanAktif as $r) {
                    if ($r['konklusi'] === $idMetode) {
                        if (!empty($r['alasan_medis'])) {
                            $alasanDariDb[] = $r['alasan_medis'];
                        } else {
                            $namaKondisi = $this->terjemahkanPremis($r['premis'], $kondisiLookup);
                            if ($r['cf_pakar'] > 0) {
                                $alasanPositif[] = $namaKondisi;
                            } else if ($r['cf_pakar'] < 0) {
                                $alasanNegatif[] = $namaKondisi;
                            }
                        }
                    }
                }
                
                $alasanPositif = array_unique($alasanPositif);
                $alasanNegatif = array_unique($alasanNegatif);

                // Prioritaskan alasan spesifik dari DB jika ada
                if (!empty($alasanDariDb)) {
                    $alasan = array_merge($alasan, $alasanDariDb);
                } else {
                    if ($status == 'sangat_disarankan') {
                        $teks = "Metode ini sangat direkomendasikan sebagai salah satu pilihan terbaik yang aman untuk Bunda.";
                        if (!empty($alasanPositif)) {
                            $alasanDetail = $this->generateAlasanMedisSpesifik($alasanPositif, $metode->nama_metode, 'positif');
                            $teks .= " Secara medis, metode ini dinilai sangat cocok karena $alasanDetail.";
                        } else {
                            $teks .= " Penggunaannya dijamin aman untuk jangka panjang.";
                        }
                        if (!empty($alasanNegatif)) {
                            $alasanMinus = $this->generateAlasanMedisSpesifik($alasanNegatif, $metode->nama_metode, 'negatif');
                            $teks .= " Walaupun $alasanMinus, keunggulan metode ini masih jauh melampaui risikonya.";
                        }
                        $alasan[] = $teks;
                    } elseif ($status == 'perlu_perhatian') {
                        $teks = "Secara umum, metode ini cukup aman dan boleh digunakan, namun dengan pengawasan khusus (Kategori MEC 2).";
                        if (!empty($alasanPositif)) {
                            $alasanDetail = $this->generateAlasanMedisSpesifik($alasanPositif, $metode->nama_metode, 'positif');
                            $teks .= " Keunggulannya adalah $alasanDetail.";
                        }
                        if (!empty($alasanNegatif)) {
                            $alasanMinus = $this->generateAlasanMedisSpesifik($alasanNegatif, $metode->nama_metode, 'negatif');
                            $teks .= " Namun hal ini memerlukan kehati-hatian ekstra karena $alasanMinus. Kami sangat menyarankan Bunda untuk memeriksakan diri secara rutin ke dokter.";
                        }
                        $alasan[] = $teks;
                    } else {
                        $teks = "Metode ini tidak disarankan untuk Bunda (Kategori MEC 3). Risiko secara teoritis melebihi keuntungannya.";
                        if (!empty($alasanNegatif)) {
                            $alasanMinus = $this->generateAlasanMedisSpesifik($alasanNegatif, $metode->nama_metode, 'negatif');
                            $teks .= " Kondisi Bunda menyebabkan $alasanMinus. Sebaiknya pilih alternatif KB lain atau konsultasikan terlebih dahulu ke dokter.";
                        }
                        $alasan[] = $teks;
                    }
                }
            }
            
            // Kumpulkan semua nama kondisi yang dipilih pasien untuk variasi teks
            $semuaNamaKondisiUser = [];
            foreach ($kondisiUser as $kId) {
                if (isset($kondisiLookup[$kId])) {
                    $semuaNamaKondisiUser[] = $kondisiLookup[$kId];
                }
            }
            $teksRiwayat = "";
            if (count($semuaNamaKondisiUser) > 0) {
                $kondisiDisebut = array_slice($semuaNamaKondisiUser, 0, 3);
                $teksRiwayat = implode(', ', $kondisiDisebut);
                if (count($semuaNamaKondisiUser) > 3) {
                    $teksRiwayat .= ', serta riwayat medis Bunda lainnya';
                }
            }

            // 5. Default jika tidak ada aturan yang terpicu sama sekali
            if ($status === 'tidak_ada_data') {
                $status = 'sangat_disarankan';
                $cfMethod = 0.95;
                
                if ($teksRiwayat !== "") {
                    $alasan[] = "Berdasarkan pedoman WHO (Kategori MEC 1), " . $metode->nama_metode . " sangat aman digunakan. Metode ini sama sekali tidak memiliki kontraindikasi, sehingga bebas digunakan meskipun Bunda memiliki profil $teksRiwayat.";
                } else {
                    $alasan[] = "Berdasarkan evaluasi keahlian klinis Bidan dan pedoman WHO (Kategori MEC 1), metode ini SANGAT AMAN. Tidak ditemukan satupun kondisi kontraindikasi pada riwayat medis Bunda, sehingga dapat digunakan tanpa pembatasan medis.";
                }
            } elseif (empty($alasan)) {
                $alasan[] = "Metode ini dapat Bunda gunakan secara umum karena dari analisis kami tidak ada keluhan medis yang berlawanan dengan metode ini.";
            }

            // Tambahan kalimat pemanis untuk hasil yang sangat disarankan tapi punya sedikit aturan positif
            if ($status === 'sangat_disarankan' && !empty($alasan) && $teksRiwayat !== "") {
                // Cek apakah alasan ini dari DB langsung, jika ya biarkan. Jika dari auto-generate, tambahkan kalimat pelengkap.
                if (empty($alasanDariDb)) {
                    $alasanTerakhir = array_pop($alasan);
                    if (strpos($alasanTerakhir, 'Secara medis') !== false) {
                        $alasanTerakhir .= " Lebih dari itu, metode ini juga dipastikan aman dan tidak akan memperburuk $teksRiwayat.";
                    }
                    $alasan[] = $alasanTerakhir;
                }
            }

            $isTarget = ($idMetode === $targetKb);

            $hasilAkhir[] = [
                'id' => $idMetode,
                'nama_metode' => $metode->nama_metode,
                'cf' => $cfMethod,
                'persentase' => $cfMethod > 0 ? round($cfMethod * 100, 1) : 0,
                'status' => $status,
                'alasan' => array_unique($alasan),
                'is_target' => $isTarget,
                'kelebihan' => $metode->kelebihan,
                'kekurangan' => $metode->kekurangan
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
            'biodata' => $biodata,
            'targetKb' => $targetKb
        ]);

        return view('hasil', [
            'hasilAkhir' => $hasilAkhir,
            'kondisiDipilih' => $kondisiDipilih,
            'aturanAktif' => $aturanAktif,
            'detailPerhitungan' => $detailPerhitungan,
            'jumlahKondisi' => count($kondisiUser),
            'jumlahAturanAktif' => count($aturanAktif),
            'targetKb' => $targetKb
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

    /**
     * Menghasilkan teks alasan medis spesifik berdasarkan interaksi antara metode KB dan kondisi.
     */
    private function generateAlasanMedisSpesifik(array $kondisis, string $namaMetode, string $kategori = 'positif'): string
    {
        $metodeHormonalKombinasi = ['pil kombinasi', 'suntik kombinasi 1 bulan'];
        $metodeProgestin = ['pil mini', 'suntik kb 3 bulan', 'implan', 'susuk'];
        $metodeIud = ['iud tembaga', 'iud hormonal', 'mirena'];
        
        $isKombinasi = false;
        $isProgestin = false;
        $isIud = false;
        $metodeLower = strtolower($namaMetode);

        foreach ($metodeHormonalKombinasi as $m) { if (strpos($metodeLower, $m) !== false) $isKombinasi = true; }
        foreach ($metodeProgestin as $m) { if (strpos($metodeLower, $m) !== false) $isProgestin = true; }
        foreach ($metodeIud as $m) { if (strpos($metodeLower, $m) !== false) $isIud = true; }

        $alasanList = [];
        
        foreach ($kondisis as $kondisi) {
            $k = strtolower($kondisi);
            
            if ($kategori == 'negatif' || $kategori == 'fatal') {
                if (strpos($k, 'hipertensi') !== false || strpos($k, 'jantung') !== false || strpos($k, 'stroke') !== false || strpos($k, 'darah tinggi') !== false) {
                    if ($isKombinasi) $alasanList[] = "kandungan hormon Estrogen pada metode ini dapat memicu retensi cairan yang meroketkan tekanan darah, sehingga sangat membahayakan kardiovaskular Bunda ($kondisi)";
                    else $alasanList[] = "kondisi kardiovaskular ($kondisi) dapat berisiko terbebani dengan pemakaian metode ini";
                }
                elseif (strpos($k, 'payudara') !== false || strpos($k, 'tumor') !== false || strpos($k, 'kanker') !== false) {
                    if ($isKombinasi || $isProgestin) $alasanList[] = "sel tumor/kanker payudara sangat sensitif terhadap asupan hormon sintetis dari luar, sehingga dapat merangsang pertumbuhan sel yang tidak normal ($kondisi)";
                    else $alasanList[] = "kondisi tumor/kanker ($kondisi) merupakan kontraindikasi medis untuk metode ini";
                }
                elseif (strpos($k, 'panggul') !== false || strpos($k, 'seksual') !== false || strpos($k, 'pendarahan') !== false || strpos($k, 'ims') !== false) {
                    if ($isIud) $alasanList[] = "pemasangan benda asing ke dalam rahim dapat memperburuk peradangan atau infeksi panggul yang sedang terjadi ($kondisi)";
                    else $alasanList[] = "kondisi reproduksi ($kondisi) sedang tidak stabil untuk menerima metode ini";
                }
                elseif (strpos($k, 'migrain') !== false) {
                    if ($isKombinasi) $alasanList[] = "hormon Estrogen dapat memicu penyempitan pembuluh darah (vasokonstriksi) yang berisiko memperparah serangan migrain Bunda ($kondisi)";
                    else $alasanList[] = "riwayat sakit kepala parah ($kondisi) dapat memburuk akibat efek samping metode ini";
                }
                else {
                    $alasanList[] = "terdapat risiko medis karena berbenturan dengan riwayat $kondisi";
                }
            } 
            else { // Positif
                if (strpos($k, 'menyusui') !== false || strpos($k, 'laktasi') !== false) {
                    if (!$isKombinasi) $alasanList[] = "sifat metode ini tidak menekan produksi hormon prolaktin, sehingga kualitas dan kuantitas ASI untuk si kecil dipastikan tetap aman dan lancar ($kondisi)";
                    else $alasanList[] = "metode ini dapat mengakomodasi kebutuhan ibu menyusui ($kondisi)";
                }
                elseif (strpos($k, 'jangka panjang') !== false || strpos($k, 'jarak kehamilan') !== false) {
                    if ($isIud || $isProgestin) $alasanList[] = "metode ini didesain khusus untuk memberikan perlindungan stabil jangka panjang tanpa menuntut Bunda untuk repot mengingat jadwal pemakaian rutin ($kondisi)";
                    else $alasanList[] = "metode ini memiliki tingkat efektivitas tinggi untuk menjaga jarak kehamilan ($kondisi)";
                }
                else {
                    $alasanList[] = "metode ini sangat teruji selaras dan aman untuk profil kesehatan $kondisi";
                }
            }
        }

        if (empty($alasanList)) return "";

        // Gabungkan list alasan menjadi paragraf yang baik
        if (count($alasanList) == 1) {
            return $alasanList[0];
        } else {
            $last = array_pop($alasanList);
            return implode("; selain itu, ", $alasanList) . "; serta " . $last;
        }
    }
}