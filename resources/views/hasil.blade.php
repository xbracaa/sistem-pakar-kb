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
            [id^="desc-"] { display: block !important; }
            [id^="icon-"] { display: none !important; }
        }
    </style>
</head>
<body class="bg-brand-bg text-brand-dark antialiased font-sans pb-40 relative">

    @php
        // Grouping results based on status
        $kat12 = [];
        $kat3 = [];
        $kat4 = [];
        $targetItem = null;

        foreach($hasilAkhir as $hasil) {
            if (isset($hasil['is_target']) && $hasil['is_target']) {
                $targetItem = $hasil;
            }

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
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
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
    <header class="max-w-3xl mx-auto px-6 pt-16 pb-8 text-center print:pt-4 print:pb-4" data-aos="fade-down">
        <!-- Success Icon -->
        <div class="w-20 h-20 rounded-full bg-[#E5EFE8] border-8 border-[#F5F3E9] shadow-[0_0_0_2px_#D0E3D6] text-brand-dark flex items-center justify-center mx-auto mb-6 no-print">
            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
        </div>
        
        <!-- Date Badge -->
        <div class="inline-flex items-center gap-2 bg-white border border-brand-border rounded-full px-4 py-2 text-[10px] font-bold tracking-widest uppercase text-brand-dark shadow-sm mb-6">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
            Evaluasi Pakar & WHO MEC - {{ date('d F Y') }}
        </div>

        <h1 class="text-4xl md:text-[54px] leading-[1.1] font-extrabold text-brand-dark tracking-tight mb-6">
            Analisa Selesai. Ini<br>Rekomendasi Terbaik<br>Untuk Anda.
        </h1>
        <p class="text-base text-brand-accent font-medium leading-relaxed max-w-2xl mx-auto">
            Algoritma kami telah mencocokkan profil kesehatan Anda berdasarkan pengetahuan medis Bidan pakar kami dan pedoman WHO MEC 2025.
        </p>
    </header>

    <!-- DISCLAIMER MEDIS (Pindah ke atas agar rapi) -->
    <div class="max-w-3xl mx-auto px-6 mb-12 no-print" data-aos="fade-up">
        <div class="bg-amber-50/70 border border-amber-200/60 rounded-2xl p-5 flex items-start gap-4">
            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <div>
                <h4 class="text-[10px] font-bold tracking-widest uppercase text-amber-800 mb-1.5">Penting Sebelum Membaca</h4>
                <p class="text-xs text-amber-900/70 leading-relaxed font-medium">
                    Hasil ini dikalkulasi sistem berdasarkan keahlian klinis Bidan serta pedoman <em>WHO MEC 2025</em> dan bertujuan sebagai pra-skrining. <strong>Ini BUKAN pengganti diagnosis medis.</strong> Selalu konsultasikan pilihan kontrasepsi Anda secara langsung ke tenaga medis.
                </p>
            </div>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-6">
        
        <!-- PROFIL KESEHATAN PASIEN -->
        <section class="mb-12 no-print" data-aos="fade-up">
            <div class="bg-white rounded-3xl border border-brand-border p-6 md:p-8 shadow-sm">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-full bg-brand-light flex items-center justify-center text-brand-dark">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold text-brand-dark">Profil Kesehatan & Riwayat Gejala</h2>
                        <p class="text-xs font-bold text-brand-accent tracking-widest uppercase">Data yang Anda masukkan</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2">
                    @foreach($kondisiDipilih as $k)
                        <span class="inline-flex items-center gap-1.5 bg-[#F5F8F6] border border-[#D0E3D6] text-brand-dark px-3 py-1.5 rounded-full text-xs font-bold shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-dark"></span>
                            {{ $k->nama_kondisi }}
                        </span>
                    @endforeach
                </div>
            </div>
        </section>
        
        @if($targetItem)
        @php
            if ($targetItem['status'] == 'sangat_disarankan' || $targetItem['persentase'] >= 80) {
                $themeBg = 'bg-brand-dark';
                $themeStar = 'text-[#A2C2AF]';
                $themeDesc = 'text-brand-light/80';
                $themeStatus = 'text-green-400';
                $themeAccordion = 'hover:bg-gray-50';
            } elseif ($targetItem['status'] == 'perlu_perhatian' || $targetItem['status'] == 'tidak_disarankan' || ($targetItem['persentase'] >= 40 && $targetItem['persentase'] < 80)) {
                $themeBg = 'bg-amber-600';
                $themeStar = 'text-amber-200';
                $themeDesc = 'text-amber-50';
                $themeStatus = 'text-yellow-200';
                $themeAccordion = 'hover:bg-amber-50';
            } else {
                $themeBg = 'bg-rose-700';
                $themeStar = 'text-rose-200';
                $themeDesc = 'text-rose-50';
                $themeStatus = 'text-rose-200';
                $themeAccordion = 'hover:bg-rose-50';
            }
        @endphp
        <!-- HASIL GOAL (ANALISIS PILIHAN PASIEN) -->
        <section class="mb-16">
            <div class="{{ $themeBg }} rounded-[32px] border border-brand-border shadow-lg flex flex-col md:flex-row relative overflow-hidden group print-border print-break-inside-avoid" data-aos="zoom-in">
                <div class="p-8 md:p-10 flex flex-col flex-grow text-white w-full">
                    <span class="text-[10px] font-bold tracking-widest {{ $themeStar }} uppercase mb-4">★ ANALISIS PILIHAN ANDA</span>
                    <h3 class="text-3xl font-extrabold mb-2">{{ $targetItem['nama_metode'] }}</h3>
                    <p class="text-sm {{ $themeDesc }} mb-8 max-w-2xl">
                        Anda menargetkan metode KB ini pada awal konsultasi. Berikut adalah hasil evaluasi pakar kami terhadap kondisi Anda.
                    </p>

                    <div class="flex items-center gap-6 mb-8 bg-white/10 rounded-2xl p-6 border border-white/20 flex-wrap md:flex-nowrap">
                        <div class="flex-grow">
                            <span class="block text-[10px] font-bold tracking-widest {{ $themeDesc }} uppercase mb-2">TINGKAT KECOCOKAN MEDIS</span>
                            <div class="text-4xl font-extrabold text-white">{{ $targetItem['persentase'] }}%</div>
                        </div>
                        <div class="h-16 w-[1px] bg-white/20 hidden md:block"></div>
                        <div class="flex-grow md:text-right">
                            <span class="block text-[10px] font-bold tracking-widest {{ $themeDesc }} uppercase mb-2">STATUS KEAMANAN</span>
                            <div class="text-lg font-bold {{ $themeStatus }}">
                                @if($targetItem['status'] == 'sangat_disarankan' || $targetItem['persentase'] >= 80) AMAN (Kategori 1/2)
                                @elseif($targetItem['status'] == 'perlu_perhatian' || $targetItem['persentase'] >= 40) PERLU KEHATI-HATIAN (Kategori 3)
                                @else DILARANG (Kategori 4)
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-5 text-brand-dark shadow-sm cursor-pointer {{ $themeAccordion }} transition-colors" onclick="toggleAccordion('target')">
                        <div class="flex justify-between items-center">
                            <span class="block text-[11px] font-extrabold tracking-widest uppercase">Lihat Penjelasan Medis Khusus</span>
                            <svg id="icon-target" class="w-5 h-5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                        <div id="desc-target" class="hidden mt-4 pt-4 border-t border-brand-border">
                            <p class="text-sm leading-relaxed font-medium mb-6">
                                @if(isset($targetItem['alasan']) && count($targetItem['alasan'])>0)
                                    {{ $targetItem['alasan'][0] }}
                                @else
                                    Secara umum, metode ini dapat digunakan.
                                @endif
                            </p>
                            
                            @if(isset($targetItem['kelebihan']) || isset($targetItem['kekurangan']))
                            @php
                                $plusList = $targetItem['kelebihan'] ? array_filter(array_map('trim', explode(',', $targetItem['kelebihan']))) : [];
                                $minusList = $targetItem['kekurangan'] ? array_filter(array_map('trim', explode(',', $targetItem['kekurangan']))) : [];
                            @endphp
                            <div class="grid md:grid-cols-2 gap-5 mt-4 pt-4 border-t border-brand-border/50">
                                <div>
                                    <div class="text-[10px] font-bold tracking-widest text-brand-dark uppercase mb-3 flex items-center gap-1">
                                        <span>+</span> KELEBIHAN
                                    </div>
                                    <ul class="text-xs text-brand-dark/80 space-y-2.5">
                                        @foreach($plusList as $plus)
                                            <li class="flex items-start gap-1.5"><div class="w-1 h-1 rounded-full bg-brand-dark mt-1.5 flex-shrink-0"></div><span class="leading-relaxed">{{ $plus }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <div class="text-[10px] font-bold tracking-widest text-amber-800 uppercase mb-3 flex items-center gap-1">
                                        <span>-</span> KEKURANGAN
                                    </div>
                                    <ul class="text-xs text-brand-dark/80 space-y-2.5">
                                        @foreach($minusList as $minus)
                                            <li class="flex items-start gap-1.5"><div class="w-1 h-1 rounded-full bg-amber-800/60 mt-1.5 flex-shrink-0"></div><span class="leading-relaxed">{{ $minus }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="flex items-center gap-4 mb-10 opacity-60 no-print" data-aos="fade-up">
            <div class="flex-grow h-[1px] bg-brand-dark"></div>
            <span class="text-[10px] font-bold tracking-widest uppercase text-brand-dark text-center">Rekomendasi Alternatif Lainnya</span>
            <div class="flex-grow h-[1px] bg-brand-dark"></div>
        </div>
        @endif

        <!-- KATEGORI 1 & 2 (Rekomendasi Utama) -->
        @if(count($kat12) > 0)
        @php
            $maxPersentaseKat12 = max(array_column($kat12, 'persentase'));
        @endphp
        <section class="mb-16">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($kat12 as $index => $item)
                <div class="bg-white rounded-[32px] border border-brand-border shadow-sm flex flex-col relative overflow-hidden group print-border print-break-inside-avoid" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    
                    @if($item['persentase'] == $maxPersentaseKat12)
                    <!-- Top Highlight Banner for top choices -->
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
                        <div class="bg-[#F5F8F6] rounded-2xl p-5 mt-auto border border-brand-light/50 cursor-pointer hover:bg-[#E5EFE8] transition-colors" onclick="toggleAccordion('kat12-{{ $index }}')">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#4E765D]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span class="block text-[10px] font-bold tracking-widest text-brand-dark uppercase">Detail Rekomendasi</span>
                                </div>
                                <svg id="icon-kat12-{{ $index }}" class="w-4 h-4 text-brand-dark transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                            </div>
                            <div id="desc-kat12-{{ $index }}" class="hidden mt-4 pt-4 border-t border-[#D0E3D6]">
                                <p class="text-xs text-brand-accent leading-relaxed mb-4">
                                    @if(isset($item['alasan']) && count($item['alasan'])>0)
                                        {{ $item['alasan'][0] }}
                                    @else
                                        Sepenuhnya aman dan sangat direkomendasikan sesuai pedoman WHO MEC untuk profil medis Anda saat ini.
                                    @endif
                                </p>

                                @if(isset($item['kelebihan']) || isset($item['kekurangan']))
                                @php
                                    $plusList = $item['kelebihan'] ? array_filter(array_map('trim', explode(',', $item['kelebihan']))) : [];
                                    $minusList = $item['kekurangan'] ? array_filter(array_map('trim', explode(',', $item['kekurangan']))) : [];
                                @endphp
                                <div class="grid grid-cols-2 gap-4 mt-3 pt-3 border-t border-[#D0E3D6]/50">
                                    <div>
                                        <div class="text-[9px] font-bold tracking-widest text-brand-dark uppercase mb-2">+ KELEBIHAN</div>
                                        <ul class="text-[11px] text-brand-accent space-y-2">
                                            @foreach($plusList as $plus)
                                                <li class="flex items-start gap-1.5"><div class="w-1 h-1 rounded-full bg-brand-dark mt-1.5 flex-shrink-0"></div><span class="leading-relaxed">{{ $plus }}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div>
                                        <div class="text-[9px] font-bold tracking-widest text-amber-800 uppercase mb-2">- KEKURANGAN</div>
                                        <ul class="text-[11px] text-brand-accent space-y-2">
                                            @foreach($minusList as $minus)
                                                <li class="flex items-start gap-1.5"><div class="w-1 h-1 rounded-full bg-amber-800/60 mt-1.5 flex-shrink-0"></div><span class="leading-relaxed">{{ $minus }}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
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
                <h2 class="text-3xl font-extrabold text-brand-dark tracking-tight">Kategori 3 &mdash;<br>Konsultasikan ke Bidan/Dokter</h2>
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
                    
                    <div class="bg-[#FFFAF0] rounded-xl p-4 mt-2 border border-amber-100 cursor-pointer hover:bg-[#FFF4E5] transition-colors" onclick="toggleAccordion('kat3-{{ $loop->index }}')">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                <span class="block text-[10px] font-bold tracking-widest text-amber-800 uppercase">Mengapa perlu pertimbangan?</span>
                            </div>
                            <svg id="icon-kat3-{{ $loop->index }}" class="w-4 h-4 text-amber-600 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                        <div id="desc-kat3-{{ $loop->index }}" class="hidden mt-3 pt-3 border-t border-amber-200/50">
                            <p class="text-xs text-amber-900/80 leading-relaxed font-medium mb-4">
                                @if(isset($item['alasan']) && count($item['alasan'])>0)
                                    {{ $item['alasan'][0] }}
                                @else
                                    Risiko secara teoritis melebihi keuntungan untuk profil medis Anda. Konsultasikan ke dokter sebelum memilih opsi ini.
                                @endif
                            </p>

                            @if(isset($item['kelebihan']) || isset($item['kekurangan']))
                            @php
                                $plusList = $item['kelebihan'] ? array_filter(array_map('trim', explode(',', $item['kelebihan']))) : [];
                                $minusList = $item['kekurangan'] ? array_filter(array_map('trim', explode(',', $item['kekurangan']))) : [];
                            @endphp
                            <div class="grid grid-cols-2 gap-4 mt-3 pt-3 border-t border-amber-200/50">
                                <div>
                                    <div class="text-[9px] font-bold tracking-widest text-amber-800 uppercase mb-2">+ KELEBIHAN</div>
                                    <ul class="text-[11px] text-amber-900/70 space-y-2">
                                        @foreach($plusList as $plus)
                                            <li class="flex items-start gap-1.5"><div class="w-1 h-1 rounded-full bg-amber-500 mt-1.5 flex-shrink-0"></div><span class="leading-relaxed">{{ $plus }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <div class="text-[9px] font-bold tracking-widest text-amber-800 uppercase mb-2">- KEKURANGAN</div>
                                    <ul class="text-[11px] text-amber-900/70 space-y-2">
                                        @foreach($minusList as $minus)
                                            <li class="flex items-start gap-1.5"><div class="w-1 h-1 rounded-full bg-amber-800/60 mt-1.5 flex-shrink-0"></div><span class="leading-relaxed">{{ $minus }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
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
                <h2 class="text-3xl font-extrabold text-brand-dark tracking-tight">Kategori 4 (Fatal) &mdash;<br>Dilarang Digunakan</h2>
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
                        <div class="mt-3 cursor-pointer inline-flex items-center gap-1.5 text-xs font-bold text-rose-600 uppercase tracking-widest hover:text-rose-800 transition-colors" onclick="toggleAccordion('kat4-{{ $loop->index }}')">
                            Lihat Bahaya Medis
                            <svg id="icon-kat4-{{ $loop->index }}" class="w-3.5 h-3.5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                        <div id="desc-kat4-{{ $loop->index }}" class="hidden mt-3 pt-3 border-t border-rose-200">
                            <p class="text-sm text-rose-800/90 leading-relaxed font-medium">
                                @if(isset($item['alasan']) && count($item['alasan'])>0)
                                    {{ $item['alasan'][0] }}
                                @else
                                    Berbahaya. Kondisi medis Anda merupakan kontraindikasi absolut terhadap metode ini. Penggunaan sangat dilarang.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
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
            <a href="https://wa.me/62895701284177?text=Halo%20Bidan,%20saya%20ingin%20berkonsultasi%20mengenai%20hasil%20rekomendasi%20KB%20dari%20sistem%20SurePlan." target="_blank" class="bg-[#25D366] text-white text-xs sm:text-sm font-extrabold px-5 py-3 rounded-full flex items-center justify-center gap-2 shadow-xl hover:bg-[#20bd5a] transition-all transform hover:scale-105 flex-grow sm:flex-grow-0 whitespace-nowrap">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Hubungi Bidan
            </a>
            <a href="/cetak" target="_blank" class="bg-white text-brand-dark text-xs sm:text-sm font-extrabold px-5 py-3 rounded-full flex items-center justify-center gap-2 shadow-xl hover:bg-brand-card transition-colors flex-grow sm:flex-grow-0 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                PDF
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
        function toggleAccordion(id) {
            const desc = document.getElementById('desc-' + id);
            const icon = document.getElementById('icon-' + id);
            if (desc.classList.contains('hidden')) {
                desc.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                desc.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }

        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic',
        });
    </script>
</body>
</html>
