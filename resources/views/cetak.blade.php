<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis - SurePlan</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            font-family: 'Nunito', sans-serif;
            background: #e2e8f0; /* Gray background for screen viewing */
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        .a4-container {
            background: white;
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            padding: 20mm;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            color: black;
        }
        @media print {
            body { background: white; margin: 0; padding: 0; }
            .a4-container { box-shadow: none; padding: 10mm; width: 100%; min-height: auto; margin: 0; }
            .no-print { display: none !important; }
            .page-break { page-break-before: always; }
        }
    </style>
</head>
<body onload="window.print()">

    <!-- Print Control Bar (Visible only on screen) -->
    <div class="bg-slate-800 text-white text-center py-4 no-print sticky top-0 z-50 shadow-md">
        <div class="max-w-4xl mx-auto flex justify-between items-center px-6">
            <span class="font-bold">Mode Pratinjau Cetak Rekam Medis (A4)</span>
            <div class="flex gap-4">
                <button onclick="window.close()" class="px-4 py-2 bg-slate-600 hover:bg-slate-500 rounded font-semibold transition-colors text-sm">Tutup</button>
                <button onclick="window.print()" class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded font-semibold transition-colors text-sm">Cetak Sekarang</button>
            </div>
        </div>
    </div>

    <div class="a4-container">
        <!-- Kop Surat -->
        <div class="border-b-4 border-black pb-6 mb-8 text-center flex flex-col items-center">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 rounded-sm bg-black text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" /></svg>
                </div>
                <h1 class="text-3xl font-black uppercase tracking-widest">Sure<span class="text-slate-500">Plan.</span></h1>
            </div>
            <p class="text-sm font-bold tracking-wider text-slate-700">DOKUMEN HASIL ANALISA SISTEM PAKAR KESEHATAN REPRODUKSI</p>
            <p class="text-xs text-slate-500 mt-1">Standar Evaluasi Klinis Bidan & WHO MEC 2015</p>
        </div>

        <div class="flex justify-between items-end mb-8">
            <h2 class="text-xl font-black uppercase border-b-2 border-black inline-block pb-1">Data Pasien & Riwayat Medis</h2>
            <div class="text-sm text-right">
                <p><strong>Tanggal Cetak:</strong> {{ date('d F Y H:i') }}</p>
                <p><strong>ID Diagnosa:</strong> #KP-{{ strtoupper(substr(md5(time()), 0, 8)) }}</p>
            </div>
        </div>

        <!-- Formulir Biodata Pasien -->
        <div class="grid grid-cols-2 gap-x-8 gap-y-4 mb-8">
            <div class="flex border-b border-black border-dashed pb-1">
                <span class="font-bold w-32">Nama Pasien</span>
                <span class="flex-grow">: {{ $biodata['nama'] ?? '......................................................' }}</span>
            </div>
            <div class="flex border-b border-black border-dashed pb-1">
                <span class="font-bold w-32">Usia</span>
                <span class="flex-grow">: {{ $biodata['usia'] ? $biodata['usia'] . ' Tahun' : '.................... Tahun' }}</span>
            </div>
            <div class="flex border-b border-black border-dashed pb-1">
                <span class="font-bold w-32">Nama Suami</span>
                <span class="flex-grow">: {{ $biodata['suami'] ?? '......................................................' }}</span>
            </div>
            <div class="flex border-b border-black border-dashed pb-1">
                <span class="font-bold w-32">Jml Anak</span>
                <span class="flex-grow">: {{ $biodata['jml_anak'] !== '' ? $biodata['jml_anak'] . ' Orang' : '.................... Orang' }}</span>
            </div>
            <div class="flex border-b border-black border-dashed pb-1 col-span-2">
                <span class="font-bold w-32">Alamat</span>
                <span class="flex-grow">: .....................................................................................................................................</span>
            </div>
        </div>

        <!-- Tabel Riwayat Penyakit Terdeteksi -->
        <h3 class="font-bold mb-3">Keluhan & Kondisi Fisik (Input Sistem):</h3>
        <table class="w-full text-left border-collapse border border-black mb-10">
            <thead>
                <tr class="bg-slate-100">
                    <th class="border border-black px-4 py-2 w-12 text-center">No</th>
                    <th class="border border-black px-4 py-2">Deskripsi Kondisi</th>
                    <th class="border border-black px-4 py-2 w-24 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kondisiDipilih as $index => $k)
                <tr>
                    <td class="border border-black px-4 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border border-black px-4 py-2">{{ $k->nama_kondisi }}</td>
                    <td class="border border-black px-4 py-2 text-center font-bold">&#10003; Ya</td>
                </tr>
                @endforeach
                @if(count($kondisiDipilih) == 0)
                <tr>
                    <td class="border border-black px-4 py-4 text-center italic" colspan="3">Tidak ada riwayat medis yang dimasukkan (Kondisi Umum Normal)</td>
                </tr>
                @endif
            </tbody>
        </table>

        <!-- Tabel Hasil Rekomendasi -->
        <div class="flex justify-between items-end mb-4">
            <h2 class="text-xl font-black uppercase border-b-2 border-black inline-block pb-1">Hasil Evaluasi Kelayakan Metode KB</h2>
        </div>
        
        <table class="w-full text-left border-collapse border border-black mb-12">
            <thead>
                <tr class="bg-slate-100">
                    <th class="border border-black px-4 py-2 w-12 text-center">Peringkat</th>
                    <th class="border border-black px-4 py-2">Metode Kontrasepsi</th>
                    <th class="border border-black px-4 py-2 w-32 text-center">Tingkat Kecocokan</th>
                    <th class="border border-black px-4 py-2 w-48 text-center">Kategori Evaluasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasilAkhir as $index => $hasil)
                    @php
                        $mecBadge = '';
                        $cfText = $hasil['persentase'] . '%';
                        
                        if ($hasil['status'] == 'sangat_disarankan') {
                            $mecBadge = 'MEC 1 (Sangat Aman)';
                        } elseif ($hasil['status'] == 'perlu_perhatian') {
                            $mecBadge = 'MEC 2 (Pengawasan)';
                        } elseif ($hasil['status'] == 'dilarang') {
                            $mecBadge = 'MEC 4 (Dilarang Mutlak)';
                            $cfText = 'TOLAK';
                        } elseif ($hasil['status'] == 'tidak_disarankan') {
                            $mecBadge = 'MEC 3 (Kurang Aman)';
                        } else {
                            $mecBadge = 'Normal';
                        }
                    @endphp
                <tr>
                    <td class="border border-black px-4 py-3 text-center font-bold text-lg">{{ $index + 1 }}</td>
                    <td class="border border-black px-4 py-3 font-bold">{{ $hasil['nama_metode'] }}</td>
                    <td class="border border-black px-4 py-3 text-center font-bold text-lg">{{ $cfText }}</td>
                    <td class="border border-black px-4 py-3 text-center">{{ $mecBadge }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tanda Tangan Dokter/Bidan -->
        <div class="flex justify-end mt-16">
            <div class="text-center w-64">
                <p class="mb-20">Dokter / Bidan Pemeriksa,</p>
                <p class="border-b border-black inline-block w-48 mb-1"></p>
                <p class="text-sm">SIP: .......................................</p>
            </div>
        </div>

    </div>

</body>
</html>
