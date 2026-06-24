<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi Medis | SurePlan</title>
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        brand: {
                            bg: '#F5F3E9', 
                            dark: '#173424', 
                            light: '#DFEBE3', 
                            card: '#FFFFFF', 
                            accent: '#71867A', 
                            border: '#E8E5DA' 
                        }
                    }
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #E8E5DA; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #71867A; }
        
        @media print {
            body { background: white !important; color: black !important; font-size: 11pt; }
            .no-print { display: none !important; }
            .print-break-inside-avoid { page-break-inside: avoid; break-inside: avoid; }
            * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
            .print-border { border: 1px solid #000 !important; }
        }
    </style>
</head>
<body class="bg-brand-bg text-brand-dark antialiased font-sans pb-40 relative">

    @php
        // Grouping results based on status
        $kat12 = [];
        $kat3 = [];
        $kat4 = [];

        foreach($hasilAkhir as $hasil) {
            if ($hasil['status'] == 'sangat_disarankan' || $hasil['status'] == 'direkomendasikan' || $hasil['persentase'] >= 80) {
                $kat12[] = $hasil;
            } elseif ($hasil['status'] == 'perlu_perhatian' || $hasil['status'] == 'tidak_disarankan' || ($hasil['persentase'] >= 40 && $hasil['persentase'] < 80)) {
                $kat3[] = $hasil;
            } elseif ($hasil['status'] == 'dilarang' || $hasil['persentase'] < 40) {
                $kat4[] = $hasil;
            }
        }

        // Subtitle mapper
        $subtitles = [
            'Pil Kombinasi' => 'ESTROGEN + PROGESTIN',
            'Pil Mini (Progestin)' => 'PROGESTERON ONLY PILL',
            'Suntik Kombinasi 1 Bulan' => 'DEPO-ESTROGEN SIKLOFENAT',
            'Suntik KB 3 Bulan (DMPA)' => 'DEPO PROVERA',
            'Implan / Susuk KB' => 'SUBDERMAL PROGESTIN IMPLANT',
            'IUD Tembaga' => 'COPPER IUD - NON-HORMONAL',
            'IUD Hormonal (Mirena)' => 'LEVONORGESTREL IUS',
            'Tubektomi (Sterilisasi Wanita)' => 'METODE PERMANEN WANITA',
            'Vasektomi (Sterilisasi Pria)' => 'METODE PERMANEN PRIA',
            'Kondom' => 'METODE BARIER PRIA'
        ];
    @endphp

    <!-- Sticky Navbar -->
    <nav class="w-full px-6 py-5 flex justify-between items-center sticky top-0 z-40 bg-brand-bg/80 backdrop-blur-xl border-b border-brand-border/50 no-print transition-all">
        <div class="max-w-7xl mx-auto w-full flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2 font-bold text-xl tracking-tight text-brand-dark">
                <div class="w-7 h-7 bg-brand-dark rounded-full text-white flex items-center justify-center shadow-sm">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" /></svg>
                </div>
                SurePlan
            </a>
            <span class="hidden md:block text-sm font-bold text-brand-dark opacity-60">Hasil Analisa Medis</span>
            <!-- CTA -->
            <a href="/konsultasi" class="bg-brand-dark text-white text-sm font-semibold px-6 py-2.5 rounded-full hover:bg-opacity-90 transition-all flex items-center gap-2">
                Mulai Konsultasi
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </a>
        </div>
    </nav>

    <!-- Header / Hero Rekomendasi -->
    <header class="max-w-3xl mx-auto px-6 pt-16 pb-12 text-center print:pt-4 print:pb-4" data-aos="fade-down">
        <!-- Success Icon -->
        <div class="w-20 h-20 rounded-full bg-[#E5EFE8] border-8 border-[#F5F3E9] shadow-[0_0_0_2px_#D0E3D6] text-brand-dark flex items-center justify-center mx-auto mb-6 no-print">
            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
        </div>
        
        <!-- Date Badge -->
        <div class="inline-flex items-center gap-2 bg-white border border-brand-border rounded-full px-4 py-2 text-[10px] font-bold tracking-widest uppercase text-brand-dark shadow-sm mb-6">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
            Analisa WHO MEC 2015 - {{ date('d F Y') }}
        </div>

        <h1 class="text-4xl md:text-[54px] leading-[1.1] font-extrabold text-brand-dark tracking-tight mb-6">
            Analisa Selesai. Ini<br>Rekomendasi Terbaik<br>Untuk Anda.
        </h1>
        <p class="text-base text-brand-accent font-medium leading-relaxed max-w-2xl mx-auto">
            Algoritma kami telah mencocokkan profil kesehatan Anda dengan standar pedoman WHO Medical Eligibility Criteria 2015.
        </p>
    </header>

    <main class="max-w-7xl mx-auto px-6">
        
        <!-- KATEGORI 1 & 2 (Rekomendasi Utama) -->
        @if(count($kat12) > 0)
        <section class="mb-16">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($kat12 as $index => $item)
                <div class="bg-white rounded-[32px] border border-brand-border shadow-sm flex flex-col relative overflow-hidden group print-border print-break-inside-avoid" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    
                    @if($index === 0)
                    <!-- Top Highlight Banner for 1st choice -->
                    <div class="bg-brand-dark text-white text-[10px] font-bold tracking-widest uppercase text-center py-2 no-print">
                        ★ REKOMENDASI UTAMA
                    </div>
                    @endif

                    <div class="p-8 flex flex-col flex-grow">
                        <!-- Header Card -->
                        <div class="flex justify-between items-start mb-6">
                            <div class="w-14 h-14 bg-brand-light rounded-2xl flex items-center justify-center text-brand-dark">
                                <!-- Dynamic Icon logic here -->
                                @if(strpos(strtolower($item['nama_metode']), 'iud') !== false)
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0a8 8 0 10-8-8h2m6 8a8 8 0 118-8h-2m-6-10V4m0 0h-4m4 0h4" /></svg>
                                @elseif(strpos(strtolower($item['nama_metode']), 'suntik') !== false)
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                                @elseif(strpos(strtolower($item['nama_metode']), 'implan') !== false)
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                @else
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" /></svg>
                                @endif
                            </div>
                            <span class="bg-[#E9F2EC] text-brand-dark text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider">
                                Kategori 1/2 - Aman
                            </span>
                        </div>

                        <!-- Info -->
                        <h3 class="text-2xl font-extrabold text-brand-dark mb-1">{{ $item['nama_metode'] }}</h3>
                        <p class="text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-6">
                            {{ $subtitles[$item['nama_metode']] ?? 'METODE KONTRASEPSI' }}
                        </p>

                        <!-- Progress Bar Kecocokan -->
                        <div class="mb-6">
                            <div class="flex justify-between text-[10px] font-bold text-brand-accent mb-2 tracking-widest uppercase">
                                <span>KECOCOKAN MEDIS</span>
                                <span class="text-brand-dark">{{ $item['persentase'] }}%</span>
                            </div>
                            <div class="w-full h-1.5 bg-brand-bg rounded-full overflow-hidden">
                                <div class="h-full bg-brand-dark rounded-full" style="width: {{ $item['persentase'] }}%"></div>
                            </div>
                        </div>

                        <!-- Alasan Klinis Box -->
                        <div class="bg-[#F5F8F6] rounded-2xl p-5 mt-auto border border-brand-light/50">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#4E765D] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                                <div>
                                    <span class="block text-[10px] font-bold tracking-widest text-brand-dark uppercase mb-1">Pilihan terbaik untuk kondisi Anda</span>
                                    <p class="text-xs text-brand-accent leading-relaxed">
                                        @if(isset($item['alasan']) && count($item['alasan'])>0)
                                            {{ $item['alasan'][0] }}
                                        @else
                                            Sepenuhnya aman dan sangat direkomendasikan sesuai pedoman WHO MEC untuk profil medis Anda saat ini.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- KATEGORI 3 (Perlu Pertimbangan) -->
        @if(count($kat3) > 0)
        <section class="mb-16">
            <div class="flex items-center gap-4 mb-6">
                <span class="text-[10px] font-bold tracking-widest uppercase text-amber-700 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span> PERLU PERTIMBANGAN KHUSUS
                </span>
                <div class="flex-grow h-[1px] bg-amber-200/50"></div>
            </div>

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8" data-aos="fade-right">
                <h2 class="text-3xl font-extrabold text-brand-dark tracking-tight">Kategori 3 WHO &mdash;<br>Konsultasikan ke Dokter</h2>
                <span class="bg-[#FFF4E5] text-amber-800 text-[10px] font-bold px-4 py-2 rounded-full uppercase tracking-wider border border-amber-200/50">
                    {{ count($kat3) }} Metode
                </span>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                @foreach($kat3 as $item)
                <div class="bg-white rounded-3xl border border-amber-200 p-6 flex flex-col shadow-sm print-break-inside-avoid print-border" data-aos="fade-up">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#FFF4E5] rounded-xl flex items-center justify-center text-amber-600">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-brand-dark text-lg">{{ $item['nama_metode'] }}</h4>
                                <span class="text-[9px] font-bold uppercase tracking-widest text-amber-600">Perlu Kehati-hatian Ekstra &bull; Kecocokan: {{ $item['persentase'] }}%</span>
                            </div>
                        </div>
                        <span class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-1 rounded md">Kat. 3</span>
                    </div>
                    
                    <div class="bg-[#FFFAF0] rounded-xl p-4 mt-2 border border-amber-100 flex items-start gap-3">
                        <svg class="w-4 h-4 text-amber-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        <p class="text-xs text-amber-900/80 leading-relaxed font-medium">
                            @if(isset($item['alasan']) && count($item['alasan'])>0)
                                {{ $item['alasan'][0] }}
                            @else
                                Risiko secara teoritis melebihi keuntungan untuk profil medis Anda. Konsultasikan ke dokter sebelum memilih opsi ini.
                            @endif
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- KATEGORI 4 (Dilarang) -->
        @if(count($kat4) > 0)
        <section class="mb-20">
            <div class="flex items-center gap-4 mb-6">
                <div class="flex-grow h-[1px] bg-rose-200"></div>
                <span class="text-[10px] font-bold tracking-widest uppercase text-rose-600">ZONA KONTRAINDIKASI</span>
                <div class="flex-grow h-[1px] bg-rose-200"></div>
            </div>

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8" data-aos="fade-right">
                <h2 class="text-3xl font-extrabold text-brand-dark tracking-tight">Kategori 4 WHO &mdash;<br>Dilarang Digunakan</h2>
                <span class="bg-[#FFF0F2] text-rose-700 text-[10px] font-bold px-4 py-2 rounded-full uppercase tracking-wider border border-rose-200">
                    {{ count($kat4) }} Metode
                </span>
            </div>

            <div class="space-y-4">
                @foreach($kat4 as $item)
                <div class="bg-[#FFFAFA] border border-rose-200 rounded-3xl p-6 flex flex-col md:flex-row items-start md:items-center gap-6 shadow-sm print-break-inside-avoid print-border" data-aos="fade-up">
                    <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
                    </div>
                    <div class="flex-grow">
                        <div class="flex items-center gap-3 mb-1">
                            <h4 class="font-extrabold text-brand-dark text-lg">{{ $item['nama_metode'] }}</h4>
                            <span class="bg-rose-100 text-rose-700 text-[9px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">Kontraindikasi - Kat. 4</span>
                            <span class="text-[10px] font-bold text-rose-600/80 uppercase">Kecocokan: {{ $item['persentase'] }}%</span>
                        </div>
                        <p class="text-sm text-rose-800/80 leading-relaxed font-medium">
                            @if(isset($item['alasan']) && count($item['alasan'])>0)
                                {{ $item['alasan'][0] }}
                            @else
                                Berbahaya. Kondisi medis Anda merupakan kontraindikasi absolut terhadap metode ini. Penggunaan sangat dilarang.
                            @endif
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-8 p-5 rounded-2xl border border-brand-border flex items-start gap-3 bg-white no-print">
                <svg class="w-5 h-5 text-brand-accent flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <p class="text-xs text-brand-accent leading-relaxed">
                    <strong>Perhatian:</strong> Hasil ini adalah panduan berbasis algoritma WHO MEC 2015 dan tidak menggantikan konsultasi langsung dengan dokter atau bidan. Keputusan akhir pemilihan kontrasepsi wajib dikonfirmasi oleh tenaga medis berlisensi.
                </p>
            </div>
        </section>
        @endif

    </main>

    <!-- Floating Sticky Bottom Banner -->
    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-4xl bg-brand-dark rounded-3xl p-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between shadow-[0_20px_50px_-10px_rgba(23,52,36,0.5)] z-50 no-print border border-white/10 transition-transform duration-300">
        <div class="text-center sm:text-left mb-4 sm:mb-0">
            <h4 class="font-extrabold text-white text-sm sm:text-base">Laporan Anda Siap</h4>
            <p class="text-[10px] sm:text-xs text-white/70 tracking-wide">Bagikan ke bidan atau dokter kandungan Anda</p>
        </div>
        <div class="flex items-center gap-3 sm:gap-6 w-full sm:w-auto justify-center">
            <a href="/konsultasi" class="text-white text-xs sm:text-sm font-bold opacity-80 hover:opacity-100 transition-opacity">
                Konsultasi Ulang
            </a>
            <a href="/cetak" target="_blank" class="bg-white text-brand-dark text-xs sm:text-sm font-extrabold px-6 py-3 rounded-full flex items-center justify-center gap-2 shadow-xl hover:bg-brand-card transition-colors flex-grow sm:flex-grow-0 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                Cetak Laporan (PDF)
            </a>
        </div>
    </div>

    <!-- Print Footer -->
    <div class="hidden print:block text-center pt-8 border-t border-black mt-8 text-xs font-bold">
        Laporan Medis SurePlan &mdash; Dicetak pada {{ date('d M Y, H:i') }}
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic',
        });
    </script>
</body>
</html>
