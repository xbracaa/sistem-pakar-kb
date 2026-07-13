<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SurePlan | Sistem Pakar KB Terpercaya</title>
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
                    fontFamily: { 
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'] 
                    },
                    colors: {
                        brand: {
                            bg: '#F5F3E9', // Latar belakang cream hangat
                            dark: '#173424', // Hijau tua pekat
                            light: '#DFEBE3', // Hijau pudar kartu
                            card: '#F1EFE8', // Cream gelap kartu
                            accent: '#71867A', // Teks abu kehijauan
                            border: '#E8E5DA' // Garis tipis
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-brand-bg text-brand-dark antialiased overflow-x-hidden font-sans">

    <!-- Navbar -->
    <nav class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center relative z-50">
        <!-- Logo -->
        <a href="/" class="flex items-center gap-2 font-bold text-xl tracking-tight text-brand-dark">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            SurePlan
        </a>
        <!-- Links and Actions -->
        <div class="flex items-center gap-6">
            <!-- Nav Link -->
            <a href="/katalog" class="hidden md:block text-sm font-medium text-brand-accent hover:text-brand-dark transition-colors">Edukasi KB</a>
            
            @auth
                <div class="flex items-center gap-4 border-l border-brand-border pl-6">
                    <span class="text-sm font-semibold text-brand-dark hidden md:inline">Halo, {{ Auth::user()->name }}</span>
                    @if(Auth::user()->role === 'bidan')
                        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-brand-dark hover:text-brand-accent transition-colors">Dashboard</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-rose-500 hover:text-rose-700 transition-colors">Logout</button>
                    </form>
                </div>
            @endauth
            @guest
                <div class="flex items-center gap-4 border-l border-brand-border pl-6">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-brand-dark hover:text-brand-accent transition-colors">Masuk</a>
                </div>
            @endguest

            <!-- CTA -->
            <a href="/konsultasi" class="bg-brand-dark text-white text-sm font-semibold px-6 py-2.5 rounded-full hover:bg-opacity-90 transition-all flex items-center gap-2">
                Mulai Konsultasi
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-6 pt-10 pb-24 grid lg:grid-cols-2 gap-12 lg:gap-8 items-center">
        <!-- Left Content -->
        <div class="space-y-6 lg:pr-8" data-aos="fade-right">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white border border-brand-border rounded-full px-4 py-2 text-xs font-semibold text-brand-accent shadow-sm">
                <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                Berdasarkan Standar WHO MEC 2025
            </div>
            <!-- Headline -->
            <h1 class="text-5xl md:text-6xl font-extrabold leading-[1.15] tracking-tight text-brand-dark">
                Pilihan Kontrasepsi Paling Aman Untuk Masa Depan Keluarga Anda.
            </h1>
            <!-- Subheadline -->
            <p class="text-lg text-brand-accent leading-relaxed max-w-xl">
                Dapatkan rekomendasi metode kontrasepsi yang paling aman dan sesuai dengan kondisi kesehatan Anda saat ini, berdasarkan pedoman medis WHO MEC.
            </p>

            

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center gap-4 pt-4">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                    <a href="/konsultasi" class="bg-brand-dark text-white text-base font-semibold px-8 py-4 rounded-full hover:bg-opacity-90 transition-all flex items-center gap-2 shadow-lg">
                        Cek Kecocokan KB Sekarang
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                    </a>
                    <div class="flex items-center gap-3 text-sm text-brand-accent font-medium">
                        <div class="flex -space-x-3">
                            <div class="w-8 h-8 rounded-full bg-brand-light border-2 border-brand-bg"></div>
                            <div class="w-8 h-8 rounded-full bg-[#B6C9BD] border-2 border-brand-bg"></div>
                            <div class="w-8 h-8 rounded-full bg-brand-dark border-2 border-brand-bg"></div>
                        </div>
                        12.000+ ibu telah konsultasi
                    </div>
                </div>
                <div class="flex items-center gap-2 text-xs font-medium text-brand-accent">
                    <div class="flex text-yellow-400 gap-0.5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                    </div>
                    4.9/5 dari ribuan pengguna
                </div>
            </div>
        </div>
        
        <!-- Right Image -->
        <div class="relative w-full h-[500px] lg:h-[600px] flex justify-center items-center" data-aos="fade-left" data-aos-delay="200">
            <!-- Organic Circular Mask -->
            <div class="relative w-[380px] h-[380px] lg:w-[480px] lg:h-[480px] rounded-full overflow-hidden bg-brand-light">
                <img src="{{ asset('assets/images/ilustrasi.png') }}" class="w-full h-full object-cover object-[center_30%]" alt="Ilustrasi">
            </div>
            
            <!-- Left Badge -->
            <div class="absolute top-1/4 left-0 lg:-left-4 bg-white px-5 py-4 rounded-3xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-brand-dark text-white flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <div>
                    <div class="text-xl font-bold text-brand-dark leading-none">93%</div>
                    <div class="text-xs text-brand-accent mt-1">Tingkat Akurasi</div>
                </div>
            </div>
            
            <!-- Right Badge -->
            <div class="absolute bottom-1/4 right-0 lg:-right-4 bg-brand-dark text-white p-5 rounded-3xl shadow-[0_10px_40px_-10px_rgba(23,52,36,0.3)]">
                <div class="flex-grow">
                    <div class="text-[10px] font-bold text-brand-light uppercase tracking-wider">Standar</div>
                    <div class="text-base font-bold">WHO MEC 2025</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="max-w-7xl mx-auto px-6 py-20 border-t border-brand-border">
        <div class="text-center mb-16 space-y-4" data-aos="fade-up">
            <span class="text-xs font-bold tracking-widest uppercase text-brand-accent">Mengapa SurePlan</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-brand-dark tracking-tight">Dirancang untuk<br>ketenangan pikiran Anda</h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-brand-light rounded-[32px] p-10 relative overflow-hidden flex flex-col h-full min-h-[340px]" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 rounded-xl border border-brand-dark/10 flex items-center justify-center mb-8 bg-brand-bg/50">
                    <svg class="w-6 h-6 text-brand-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                </div>
                <h3 class="text-2xl font-bold text-brand-dark mb-3">Privasi Terjamin</h3>
                <p class="text-sm text-brand-dark/70 leading-relaxed mb-12">Tanpa simpan data pribadi, analisa sepenuhnya rahasia dan aman.</p>
                
                <div class="mt-auto">
                    <div class="text-4xl font-black text-brand-dark">0 Data</div>
                    <div class="text-[10px] font-bold tracking-widest text-brand-dark/50 uppercase mt-2">Tersimpan</div>
                </div>
                <!-- Decor -->
                <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-brand-dark/5 rounded-full"></div>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-brand-card rounded-[32px] p-10 relative overflow-hidden flex flex-col h-full min-h-[340px]" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 rounded-xl border border-brand-dark/10 flex items-center justify-center mb-8 bg-brand-bg/50">
                    <svg class="w-6 h-6 text-brand-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                </div>
                <h3 class="text-2xl font-bold text-brand-dark mb-3">Standar Global</h3>
                <p class="text-sm text-brand-dark/70 leading-relaxed mb-12">Menggunakan kriteria kelayakan medis WHO yang diakui secara internasional.</p>
                
                <div class="mt-auto">
                    <div class="text-4xl font-black text-brand-dark">WHO</div>
                    <div class="text-[10px] font-bold tracking-widest text-brand-dark/50 uppercase mt-2">MEC 2025</div>
                </div>
                <!-- Decor -->
                <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-brand-dark/5 rounded-full"></div>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-brand-dark rounded-[32px] p-10 relative overflow-hidden flex flex-col h-full min-h-[340px] text-white" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 rounded-xl border border-white/20 bg-white/10 flex items-center justify-center mb-8">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Cepat & Akurat</h3>
                <p class="text-sm text-white/70 leading-relaxed mb-12">Hasil rekomendasi instan, terperinci, dan siap dicetak untuk dokter Anda.</p>
                
                <div class="mt-auto">
                    <div class="text-4xl font-black text-white">< 60</div>
                    <div class="text-[10px] font-bold tracking-widest text-white/50 uppercase mt-2">Detik</div>
                </div>
                <!-- Decor -->
                <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-white/5 rounded-full"></div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="max-w-7xl mx-auto px-6 py-24 border-t border-brand-border">
        <div class="text-center mb-24 space-y-4" data-aos="zoom-in">
            <span class="text-xs font-bold tracking-widest uppercase text-brand-accent">Cara Kerja</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-brand-dark tracking-tight">Tiga langkah menuju<br>keputusan yang tepat</h2>
        </div>
        
        <div class="relative max-w-5xl mx-auto">
            <!-- Connecting Line -->
            <div class="absolute top-6 left-0 w-full h-[1px] bg-brand-border hidden md:block"></div>
            
            <div class="grid md:grid-cols-3 gap-16 md:gap-12 relative">
                <!-- Step 1 -->
                <div class="bg-brand-bg relative z-10 md:pr-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 rounded-full bg-brand-dark text-white flex items-center justify-center font-bold text-lg mb-6">01</div>
                    <h3 class="text-xl font-bold text-brand-dark mb-3">Isi Kuesioner Medis</h3>
                    <p class="text-sm text-brand-accent leading-relaxed">Jawab pertanyaan singkat tentang kondisi kesehatan dan riwayat medis Anda. Hanya butuh 2-3 menit.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="bg-brand-bg relative z-10 md:px-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 rounded-full bg-brand-dark text-white flex items-center justify-center font-bold text-lg mb-6">02</div>
                    <h3 class="text-xl font-bold text-brand-dark mb-3">Analisis Pintar</h3>
                    <p class="text-sm text-brand-accent leading-relaxed">Algoritma berbasis WHO MEC 2025 secara otomatis mengevaluasi kelayakan setiap metode KB untuk kondisi Anda.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="bg-brand-bg relative z-10 md:pl-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 rounded-full bg-brand-dark text-white flex items-center justify-center font-bold text-lg mb-6">03</div>
                    <h3 class="text-xl font-bold text-brand-dark mb-3">Terima Rekomendasi</h3>
                    <p class="text-sm text-brand-accent leading-relaxed">Dapatkan laporan lengkap, terperinci, dan personal yang siap dibawa ke konsultasi bidan atau dokter Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Expert Profile Section -->
    <section class="max-w-7xl mx-auto px-6 py-20 border-t border-brand-border">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left: Circular Image -->
            <div class="relative flex justify-center lg:justify-start" data-aos="fade-right">
                <div class="w-[320px] h-[400px] md:w-[420px] md:h-[500px] bg-[#E3E1DA] rounded-[200px] overflow-hidden">
                    <img src="{{ asset('assets/images/bidan.jpg') }}" class="w-full h-full object-cover mix-blend-multiply" alt="Bidan Profil">
                </div>
                <!-- Badge SIP -->
                <div class="absolute bottom-8 right-4 lg:right-12 bg-white px-6 py-4 rounded-2xl shadow-xl border border-brand-border">
                    <div class="text-[10px] uppercase tracking-wider text-brand-accent mb-0.5">SIPB Verified</div>
                    <div class="text-sm font-bold text-brand-dark">500.16.7.2/1547/384-SIPB/DPMPTS/2023</div>
                </div>
            </div>
            
            <!-- Right: Content -->
            <div class="space-y-8" data-aos="fade-left">
                <div class="space-y-4">
                    <span class="text-xs font-bold tracking-widest uppercase text-brand-accent">Dibangun Bersama Pakar</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-brand-dark leading-[1.15] tracking-tight">Dipercaya oleh<br>tenaga medis<br>profesional</h2>
                </div>
                
                <!-- Quote Box -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-brand-border relative">
                    <div class="absolute -top-6 left-6 text-brand-light text-[80px] font-serif leading-none h-12 overflow-hidden">"</div>
                    <p class="text-brand-accent text-lg italic leading-relaxed mb-6 mt-2 relative z-10">
                        Sistem ini dibangun atas basis pengetahuan kebidanan yang ketat. Setiap rekomendasi telah melalui validasi klinis yang cermat. Keselamatan reproduksi Anda adalah prioritas mutlak kami.
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/bidan.jpg') }}" class="w-12 h-12 rounded-full object-cover shadow-sm">
                        <div>
                            <div class="font-bold text-brand-dark text-sm">Hani Herfiyana, S.Tr.Keb,bdn</div>
                            <div class="text-xs text-brand-accent mt-0.5">SIPB: 500.16.7.2/1547/384-SIPB/DPMPTS/2023</div>
                        </div>
                    </div>
                </div>
                
                <!-- Checklist -->
                <ul class="space-y-4 pt-4">
                    <li class="flex items-center gap-4 text-brand-dark font-medium text-sm">
                        <div class="w-6 h-6 rounded-full bg-brand-light flex items-center justify-center text-brand-dark flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        Berbasis Algoritma WHO MEC 2025 yang telah tervalidasi
                    </li>
                    <li class="flex items-center gap-4 text-brand-dark font-medium text-sm">
                        <div class="w-6 h-6 rounded-full bg-brand-light flex items-center justify-center text-brand-dark flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        Mencakup 10+ metode kontrasepsi modern
                    </li>
                    <li class="flex items-center gap-4 text-brand-dark font-medium text-sm">
                        <div class="w-6 h-6 rounded-full bg-brand-light flex items-center justify-center text-brand-dark flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        Laporan lengkap siap cetak dalam format PDF
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="max-w-7xl mx-auto px-6 py-20" data-aos="zoom-in">
        <div class="bg-brand-dark rounded-[40px] p-12 md:p-20 text-center relative overflow-hidden">
            <!-- Decorative Circles -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/4"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full translate-y-1/3 -translate-x-1/4"></div>
            
            <div class="relative z-10 max-w-2xl mx-auto space-y-6">
                <span class="text-xs font-bold tracking-widest uppercase text-brand-light">Gratis Selamanya</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-white leading-tight tracking-tight">Mulai konsultasi sekarang, tanpa biaya apapun.</h2>
                <p class="text-white/80 text-lg mb-8">Ribuan ibu telah menemukan pilihan KB terbaik mereka. Kini giliran Anda.</p>
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
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
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