<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi KB | SurePlan</title>
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <!-- Tailwind CSS & AlpineJS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'] 
                    },
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
</head>
<body class="bg-brand-bg text-brand-dark antialiased overflow-x-hidden font-sans pb-10">

    <!-- Navbar -->
    <nav class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center relative z-50">
        <!-- Logo -->
        <a href="/" class="flex items-center gap-2 font-bold text-xl tracking-tight text-brand-dark">
            <div class="w-7 h-7 bg-brand-dark rounded-full text-white flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
            </div>
            SurePlan
        </a>
        <a href="/katalog" class="hidden md:block text-sm font-bold border-b-2 border-brand-dark pb-1 text-brand-dark transition-colors">Edukasi KB</a>
        <!-- CTA -->
        <a href="/konsultasi" class="bg-brand-dark text-white text-sm font-semibold px-6 py-2.5 rounded-full hover:bg-opacity-90 transition-all flex items-center gap-2">
            Mulai Konsultasi
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
        </a>
    </nav>

    <!-- Main Content wrapper with Alpine -->
    <main x-data="{ activeFilter: 'Semua' }" class="max-w-7xl mx-auto px-6 pt-16 pb-24">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h1 class="text-5xl md:text-7xl font-extrabold text-brand-dark tracking-tight leading-[1.1] mb-6">
                Pahami<br>Pilihan Anda.
            </h1>
            <p class="text-lg text-brand-accent font-medium leading-relaxed max-w-2xl mx-auto">
                Eksplorasi secara transparan 10+ metode kontrasepsi modern bersertifikasi WHO. Kenali cara kerja, kelebihan, dan kekurangannya.
            </p>
        </div>

        <!-- Filters -->
        <div class="flex flex-wrap items-center justify-center gap-3 mb-16" data-aos="fade-up" data-aos-delay="100">
            <button @click="activeFilter = 'Semua'" 
                :class="activeFilter === 'Semua' ? 'bg-brand-dark text-white border-brand-dark' : 'bg-white text-brand-dark border-brand-border hover:border-brand-dark/30'"
                class="px-6 py-3 rounded-full text-sm font-bold transition-all border shadow-sm flex items-center gap-2">
                Semua
                <span :class="activeFilter === 'Semua' ? 'bg-white/20' : 'bg-brand-light text-brand-dark'" class="px-2 py-0.5 rounded-full text-xs transition-colors">10</span>
            </button>
            <button @click="activeFilter = 'Hormonal'" 
                :class="activeFilter === 'Hormonal' ? 'bg-brand-dark text-white border-brand-dark' : 'bg-white text-brand-dark border-brand-border hover:border-brand-dark/30'"
                class="px-6 py-3 rounded-full text-sm font-bold transition-all border shadow-sm">
                Hormonal
            </button>
            <button @click="activeFilter = 'Non-Hormonal'" 
                :class="activeFilter === 'Non-Hormonal' ? 'bg-brand-dark text-white border-brand-dark' : 'bg-white text-brand-dark border-brand-border hover:border-brand-dark/30'"
                class="px-6 py-3 rounded-full text-sm font-bold transition-all border shadow-sm">
                Non-Hormonal
            </button>
            <button @click="activeFilter = 'Permanen'" 
                :class="activeFilter === 'Permanen' ? 'bg-brand-dark text-white border-brand-dark' : 'bg-white text-brand-dark border-brand-border hover:border-brand-dark/30'"
                class="px-6 py-3 rounded-full text-sm font-bold transition-all border shadow-sm">
                Permanen
            </button>
        </div>

        @php
            // Data dictionary detail KB 
            $infoKb = [
                'M01' => [
                    'tipe' => 'Hormonal', 'subtitle' => 'ESTROGEN + PROGESTERON', 'efektivitas' => '91',
                    'deskripsi' => 'Pil harian yang mengandung estrogen dan progestin buatan untuk menunda ovulasi pada wanita.',
                    'plus' => ['Haid lebih teratur', 'Mengurangi nyeri haid'],
                    'minus' => ['Harus disiplin diminum tiap hari', 'Tidak untuk busui <6 bulan']
                ],
                'M02' => [
                    'tipe' => 'Hormonal', 'subtitle' => 'MINI-PIL / PROGESTERON ONLY', 'efektivitas' => '91',
                    'deskripsi' => 'Pil yang hanya mengandung progestin. Didesain khusus sangat aman bagi ibu yang sedang menyusui.',
                    'plus' => ['Aman untuk ibu menyusui', 'Bisa langsung pasca salin'],
                    'minus' => ['Siklus haid tidak teratur', 'Harus diminum di jam yang sama']
                ],
                'M03' => [
                    'tipe' => 'Hormonal', 'subtitle' => 'DEPO-ESTROGEN SIKLOFENAT', 'efektivitas' => '94',
                    'deskripsi' => 'Suntikan bulanan yang mengandung hormon estrogen dan progestin untuk mencegah pelepasan sel telur.',
                    'plus' => ['Haid biasanya tetap teratur', 'Lebih praktis dari pil harian'],
                    'minus' => ['Rutin ke bidan tiap bulan', 'Pengembalian kesuburan lambat']
                ],
                'M04' => [
                    'tipe' => 'Hormonal', 'subtitle' => 'DMPA / DEPO PROVERA', 'efektivitas' => '96',
                    'deskripsi' => 'Suntikan progestin yang diberikan setiap 3 bulan sekali untuk mencegah kehamilan.',
                    'plus' => ['Praktis, hanya 4x/tahun', 'Aman untuk ibu menyusui'],
                    'minus' => ['Haid tidak teratur / berhenti', 'Kesuburan lambat pulih (6-12 bln)']
                ],
                'M05' => [
                    'tipe' => 'Hormonal', 'subtitle' => 'BATANG SUBDERMAL HORMONAL', 'efektivitas' => '99',
                    'deskripsi' => 'Batang kecil berisi progestin ditanam di bawah kulit lengan atas, efektif bekerja selama 3 tahun.',
                    'plus' => ['Efektif sangat tinggi (>99%)', 'Praktis, tidak perlu diingat harian'],
                    'minus' => ['Perlu prosedur pemasangan', 'Spotting di bulan-bulan pertama']
                ],
                'M06' => [
                    'tipe' => 'Non-Hormonal', 'subtitle' => 'ALAT KONTRASEPSI DALAM RAHIM', 'efektivitas' => '99',
                    'deskripsi' => 'Alat berbentuk T dari tembaga dipasang dalam rahim, bekerja non-hormonal mencegah sperma hingga 10 tahun.',
                    'plus' => ['Bebas hormon, aman menyusui', 'Efektif sangat lama (10 tahun)'],
                    'minus' => ['Haid lebih deras & kram', 'Perlu prosedur pemasangan medis']
                ],
                'M07' => [
                    'tipe' => 'Hormonal', 'subtitle' => 'IUD LEVONORGESTREL', 'efektivitas' => '99',
                    'deskripsi' => 'IUD yang secara perlahan melepaskan hormon progestin lokal di dalam rahim, efektif selama 5 tahun.',
                    'plus' => ['Mengurangi darah haid berlebih', 'Meredakan nyeri haid ekstrim'],
                    'minus' => ['Biaya cenderung lebih mahal', 'Bulan pertama haid tak teratur']
                ],
                'M08' => [
                    'tipe' => 'Permanen', 'subtitle' => 'STERILISASI WANITA (TUBEKTOMI)', 'efektivitas' => '99',
                    'deskripsi' => 'Prosedur bedah memotong atau mengikat saluran tuba fallopi untuk secara permanen mencegah pembuahan.',
                    'plus' => ['Sangat efektif permanen', 'Tidak mengganggu keseimbangan hormon'],
                    'minus' => ['Sangat sulit dibatalkan', 'Membutuhkan prosedur operasi']
                ],
                'M09' => [
                    'tipe' => 'Permanen', 'subtitle' => 'STERILISASI PRIA (VASEKTOMI)', 'efektivitas' => '99',
                    'deskripsi' => 'Prosedur bedah ringan untuk memotong saluran sperma. KB khusus pria yang paling efektif dan aman.',
                    'plus' => ['Sangat efektif permanen', 'Prosedur ringan & cepat pulih'],
                    'minus' => ['Metode permanen', 'Tidak mencegah Penyakit Menular Seksual']
                ],
                'M10' => [
                    'tipe' => 'Non-Hormonal', 'subtitle' => 'METODE BARIER PRIA (KONDOM)', 'efektivitas' => '82',
                    'deskripsi' => 'Selubung karet lateks yang digunakan pria saat berhubungan intim. Bebas dari segala efek samping sistemik.',
                    'plus' => ['Mencegah PMS / HIV', 'Mudah didapat tanpa resep'],
                    'minus' => ['Bisa bocor jika penggunaan salah', 'Harus sedia tiap kali berhubungan']
                ]
            ];
        @endphp

        <!-- Cards Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($metode as $m)
                @php
                    // Fallback aman jika data metode baru tidak ada di array
                    $info = $infoKb[$m->id] ?? [
                        'tipe' => 'Lainnya', 'subtitle' => 'METODE KONTRASEPSI', 'efektivitas' => '90',
                        'deskripsi' => 'Penjelasan metode belum tersedia. Silakan hubungi tenaga medis Anda.',
                        'plus' => ['Mencegah kehamilan'], 'minus' => ['Perlu konsultasi medis']
                    ];
                @endphp
                
                <div x-show="activeFilter === 'Semua' || activeFilter === '{{ $info['tipe'] }}'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95 hidden"
                     class="bg-brand-card rounded-[32px] p-8 shadow-sm border border-brand-border flex flex-col h-full hover:shadow-xl transition-all group">
                    
                    <!-- Header Kartu -->
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-14 h-14 bg-brand-dark rounded-xl flex items-center justify-center text-white shadow-sm transition-transform group-hover:-translate-y-1">
                            @if(in_array($m->id, ['M01','M02']))
                                <!-- Link/Pill Icon as in design -->
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" /></svg>
                            @elseif(in_array($m->id, ['M03','M04']))
                                <!-- Syringe -->
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                            @elseif($m->id == 'M05')
                                <!-- Wave / Implan -->
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 12h4l2-4 4 8 2-4h4" /></svg>
                            @elseif(in_array($m->id, ['M06','M07']))
                                <!-- Anchor / IUD -->
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0a8 8 0 10-8-8h2m6 8a8 8 0 118-8h-2m-6-10V4m0 0h-4m4 0h4" /></svg>
                            @elseif(in_array($m->id, ['M08','M09']))
                                <!-- Scissors / Steril -->
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" /></svg>
                            @else
                                <!-- Shield / Kondom -->
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            @endif
                        </div>
                        <span class="bg-brand-light text-brand-dark text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider">
                            {{ $info['tipe'] }}
                        </span>
                    </div>

                    <!-- Judul -->
                    <h3 class="text-2xl font-extrabold text-brand-dark leading-tight">{{ $m->nama_metode }}</h3>
                    <p class="text-[10px] font-bold tracking-widest text-brand-accent uppercase mt-2 mb-4">{{ $info['subtitle'] }}</p>
                    
                    <!-- Deskripsi -->
                    <p class="text-sm text-brand-dark/80 leading-relaxed mb-8 flex-grow">
                        {{ $info['deskripsi'] }}
                    </p>

                    <!-- Efektivitas -->
                    <div class="mb-8">
                        <div class="flex justify-between text-[10px] font-bold text-brand-accent mb-2 tracking-widest uppercase">
                            <span>Efektivitas</span>
                            <span class="text-brand-dark text-xs">{{ $info['efektivitas'] }}%</span>
                        </div>
                        <div class="w-full h-1.5 bg-brand-light rounded-full overflow-hidden">
                            <div class="h-full bg-brand-dark rounded-full" style="width: {{ $info['efektivitas'] }}%"></div>
                        </div>
                    </div>

                    <!-- Garis batas -->
                    <div class="w-full h-[1px] bg-brand-border mb-6"></div>

                    <!-- Plus Minus -->
                    @php
                        // Coba pakai data dari DB jika ada, split berdasarkan koma. Jika kosong, fallback ke hardcode.
                        $plusList = $m->kelebihan ? array_filter(array_map('trim', explode(',', $m->kelebihan))) : $info['plus'];
                        $minusList = $m->kekurangan ? array_filter(array_map('trim', explode(',', $m->kekurangan))) : $info['minus'];
                    @endphp
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <div class="text-[10px] font-bold tracking-widest text-brand-dark uppercase mb-3 flex items-center gap-1">
                                <span>+</span> KELEBIHAN
                            </div>
                            <ul class="text-xs text-brand-accent space-y-2.5">
                                @foreach($plusList as $plus)
                                    <li class="flex items-start gap-1.5">
                                        <div class="w-1 h-1 rounded-full bg-brand-dark mt-1.5 flex-shrink-0"></div>
                                        <span class="leading-relaxed">{{ $plus }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold tracking-widest text-amber-800 uppercase mb-3 flex items-center gap-1">
                                <span>-</span> KEKURANGAN
                            </div>
                            <ul class="text-xs text-brand-accent space-y-2.5">
                                @foreach($minusList as $minus)
                                    <li class="flex items-start gap-1.5">
                                        <div class="w-1 h-1 rounded-full bg-amber-800/60 mt-1.5 flex-shrink-0"></div>
                                        <span class="leading-relaxed">{{ $minus }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </main>

    <!-- Bottom CTA Banner -->
    <section class="max-w-7xl mx-auto px-6 py-10 pb-20" data-aos="zoom-in">
        <div class="bg-brand-dark rounded-[40px] p-12 md:p-20 text-center relative overflow-hidden">
            <!-- Decorative Circles -->
            <div class="absolute top-0 right-0 w-96 h-96 border-[40px] border-white/5 rounded-full -translate-y-1/2 translate-x-1/4 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 border-[30px] border-white/5 rounded-full translate-y-1/3 -translate-x-1/4 pointer-events-none"></div>
            
            <div class="relative z-10 max-w-2xl mx-auto space-y-6">
                <span class="text-xs font-bold tracking-widest uppercase text-brand-light">Konsultasi Personal</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-white leading-tight tracking-tight">Bingung metode mana<br>yang paling aman untuk<br>tubuh Anda?</h2>
                <p class="text-white/80 text-lg mb-8 leading-relaxed">Jangan menebak-nebak. Biarkan algoritma cerdas kami mencocokkan riwayat medis Anda dengan metode terbaik yang sesuai.</p>
                <div class="pt-4">
                    <a href="/konsultasi" class="inline-flex items-center gap-2 bg-white text-brand-dark text-base font-bold px-8 py-4 rounded-full hover:bg-brand-card transition-all shadow-xl">
                        Cek Kecocokan KB Sekarang
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 border-t border-brand-border text-center space-y-6">
        <a href="/" class="flex items-center justify-center gap-2 font-bold text-xl tracking-tight text-brand-dark">
            <div class="w-7 h-7 bg-brand-dark rounded-full text-white flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
            </div>
            SurePlan
        </a>
        <p class="text-brand-accent text-sm max-w-lg mx-auto leading-relaxed">
            SurePlan adalah sistem bantu pengambilan keputusan. Tidak menggantikan konsultasi langsung dengan tenaga medis profesional.
        </p>
        <p class="text-brand-accent/60 text-xs">
            &copy; 2026 SurePlan. Seluruh hak cipta dilindungi.
        </p>
    </footer>

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
