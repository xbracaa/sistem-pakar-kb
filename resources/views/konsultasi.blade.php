<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Konsultasi | SurePlan</title>
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
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #E8E5DA; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #71867A; }
    </style>
</head>
<body class="bg-brand-bg text-brand-dark antialiased min-h-screen flex flex-col font-sans" x-data="wizardData()">

    <!-- Navbar -->
    <nav class="max-w-7xl mx-auto w-full px-6 py-6 flex justify-between items-center relative z-50">
        <!-- Logo -->
        <a href="/" class="flex items-center gap-2 font-bold text-xl tracking-tight text-brand-dark">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            SurePlan
        </a>
        <!-- CTA -->
        <a href="/" class="bg-brand-dark text-white text-sm font-semibold px-6 py-2.5 rounded-full hover:bg-opacity-90 transition-all flex items-center gap-2 hidden md:flex">
            Batal Konsultasi
        </a>
    </nav>

    <!-- Main Container -->
    <main class="flex-grow flex flex-col items-center px-4 py-8 relative w-full">
        
        <!-- Error Alert -->
        @if(session('error'))
        <div class="max-w-3xl w-full bg-red-50 border border-red-200 text-red-700 p-4 mb-8 rounded-2xl shadow-sm flex items-center gap-3">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            <p class="font-semibold text-sm">{{ session('error') }}</p>
        </div>
        @endif

        <!-- Progress Tracker -->
        <div class="w-full max-w-3xl mb-12 relative px-4 sm:px-0" data-aos="fade-down">
            <!-- Connecting Line Background -->
            <div class="absolute top-5 left-[10%] right-[10%] h-[1px] bg-brand-border -z-10"></div>
            <!-- Connecting Line Active -->
            <div class="absolute top-5 left-[10%] h-[2px] bg-brand-dark -z-10 transition-all duration-500 ease-out" 
                 :style="`width: ${ ((step - 1) / (totalSteps - 1)) * 80 }%`"></div>
            
            <div class="flex justify-between items-start">
                <template x-for="i in totalSteps" :key="i">
                    <div class="flex flex-col items-center gap-3 relative bg-brand-bg px-2 sm:px-4 cursor-pointer" @click="jumpToStep(i)">
                        <!-- Circle -->
                        <div :class="step >= i ? 'bg-brand-dark text-white border-brand-dark' : 'bg-brand-bg text-brand-accent/50 border-brand-border'" 
                             class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm border transition-colors duration-500 shadow-sm">
                            <span x-show="step <= i" x-text="i"></span>
                            <svg x-show="step > i" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <!-- Label -->
                        <span :class="step === i ? 'text-brand-dark font-bold' : 'text-brand-accent'" class="text-[9px] sm:text-[10px] tracking-widest uppercase transition-colors text-center w-16 sm:w-20" x-text="getStepName(i)"></span>
                    </div>
                </template>
            </div>
        </div>

        <!-- Form Card -->
        <form action="{{ route('konsultasi.hitung') }}" method="POST" id="form-konsultasi" @submit="isSubmitting = true" class="w-full max-w-3xl bg-brand-card rounded-[32px] p-6 sm:p-12 shadow-[0_10px_40px_-10px_rgba(23,52,36,0.05)] border border-brand-border relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            @csrf
            
            <!-- STEP 1: Identitas Diri -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                <div class="mb-10">
                    <span class="text-[10px] font-bold tracking-widest uppercase text-brand-accent block mb-3">Langkah 1 Dari 5</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark mb-3 tracking-tight">Ceritakan sedikit<br>tentang Anda</h2>
                    <p class="text-sm text-brand-accent leading-relaxed max-w-xl">Informasi dasar ini membantu algoritma kami menghitung risiko medis berbasis usia dan paritas (jumlah anak).</p>
                </div>

                <div class="space-y-6 mb-12">
                    <!-- Nama Lengkap -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold tracking-widest uppercase text-brand-accent ml-2">Nama Lengkap</label>
                        <input type="text" name="nama" required placeholder="Cth: Nisa Sabyan" class="w-full px-5 py-4 bg-[#F9F8F3] border border-transparent rounded-2xl focus:outline-none focus:border-brand-dark focus:bg-white transition-all font-medium text-brand-dark placeholder-brand-accent/40 text-sm">
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold tracking-widest uppercase text-brand-accent ml-2">Metode KB yang Diinginkan (Target)</label>
                        <div class="relative">
                            <select name="target_kb" class="w-full px-5 py-4 bg-[#F9F8F3] border border-transparent rounded-2xl focus:outline-none focus:border-brand-dark focus:bg-white transition-all font-medium text-brand-dark text-sm appearance-none cursor-pointer">
                                <option value="" selected>Belum Tahu / Tampilkan Semua Rekomendasi</option>
                                @foreach($metodeKbs as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_metode }}</option>
                                @endforeach
                            </select>
                            <svg class="w-4 h-4 absolute right-5 top-1/2 -translate-y-1/2 text-brand-accent pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Usia -->
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold tracking-widest uppercase text-brand-accent ml-2">Usia (Tahun)</label>
                            <div class="relative">
                                <select name="usia" required class="w-full px-5 py-4 bg-[#F9F8F3] border border-transparent rounded-2xl focus:outline-none focus:border-brand-dark focus:bg-white transition-all font-medium text-brand-dark text-sm appearance-none cursor-pointer">
                                    <option value="" disabled selected>Pilih Usia</option>
                                    @for($i=15; $i<=55; $i++)
                                        <option value="{{ $i }}">{{ $i }} Tahun</option>
                                    @endfor
                                </select>
                                <svg class="w-4 h-4 absolute right-5 top-1/2 -translate-y-1/2 text-brand-accent pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </div>
                        </div>

                        <!-- Jumlah Anak -->
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold tracking-widest uppercase text-brand-accent ml-2">Jumlah Anak</label>
                            <div class="relative">
                                <select name="jml_anak" required class="w-full px-5 py-4 bg-[#F9F8F3] border border-transparent rounded-2xl focus:outline-none focus:border-brand-dark focus:bg-white transition-all font-medium text-brand-dark text-sm appearance-none cursor-pointer">
                                    <option value="" disabled selected>Pilih Jumlah</option>
                                    <option value="0">0 (Belum ada)</option>
                                    <option value="1">1 Anak</option>
                                    <option value="2">2 Anak</option>
                                    <option value="3">3 Anak</option>
                                    <option value="4">4 Anak</option>
                                    <option value="5">5 Anak atau lebih</option>
                                </select>
                                <svg class="w-4 h-4 absolute right-5 top-1/2 -translate-y-1/2 text-brand-accent pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Privacy Info Box -->
                    <div class="flex items-start gap-3 p-4 border border-brand-border rounded-2xl bg-white mt-4">
                        <svg class="w-5 h-5 text-brand-accent flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        <p class="text-xs text-brand-accent/80 leading-relaxed">Data Anda tidak disimpan di server manapun secara permanen. Analisa berlangsung sepenuhnya real-time dan bersifat rahasia total.</p>
                    </div>
                </div>
            </div>

            <!-- STEP 2 to 5: Kategori Medis -->
            @php 
                $stepCount = 2; 
                $kategoriKeys = array_keys($kelompokKondisi);
                
                // Array mapping untuk icon kategori
                $catIcons = [
                    'Tujuan KB & Kondisi Reproduksi' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />',
                    'Kardiovaskular & Neurologis' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />',
                    'Penyakit Sistemik Lainnya' => '<path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />',
                    'Kandungan & Tumor' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />'
                ];
            @endphp

            @foreach($kelompokKondisi as $namaKategori => $kondisis)
            <div x-show="step === {{ $stepCount }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                <div class="mb-10">
                    <span class="text-[10px] font-bold tracking-widest uppercase text-brand-accent block mb-3">Langkah {{ $stepCount }} Dari 5</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark mb-3 tracking-tight">{{ $namaKategori }}</h2>
                    <p class="text-sm text-brand-accent leading-relaxed max-w-xl">Pilih semua kondisi yang sesuai dengan situasi Anda saat ini. Boleh memilih lebih dari satu jika relevan.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-12">
                    @foreach($kondisis as $k)
                    <label class="relative flex items-center p-4 cursor-pointer rounded-2xl bg-white border border-brand-border transition-all group"
                           :class="selected.includes('{{ $k->id }}') ? 'border-brand-dark bg-brand-light/30 shadow-sm' : 'hover:border-brand-dark/30'">
                        
                        <!-- Checkbox Logic (Hidden but Functional) -->
                        <input type="checkbox" name="kondisi[]" value="{{ $k->id }}" class="peer absolute h-0 w-0 opacity-0" 
                               :checked="selected.includes('{{ $k->id }}')" 
                               @change="handleCheck('{{ $k->id }}', $event.target.checked)">
                        
                        <!-- Icon Left -->
                        <div class="w-10 h-10 rounded-xl bg-brand-bg flex items-center justify-center flex-shrink-0 mr-4 text-brand-dark"
                             :class="selected.includes('{{ $k->id }}') ? 'bg-white' : ''">
                             <svg class="w-5 h-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 {!! $catIcons[$namaKategori] ?? '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />' !!}
                             </svg>
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-grow pr-4">
                            <span class="block text-sm font-bold text-brand-dark leading-snug mb-0.5">{{ $k->nama_kondisi }}</span>
                        </div>

                        <!-- Check Indicator Right -->
                        <div class="w-5 h-5 rounded-full border border-brand-border flex items-center justify-center flex-shrink-0 transition-colors"
                             :class="selected.includes('{{ $k->id }}') ? 'bg-brand-dark border-brand-dark text-white' : 'group-hover:border-brand-accent'">
                            <svg x-show="selected.includes('{{ $k->id }}')" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </div>
                    </label>
                    @endforeach

                    <!-- Special "Tidak Ada" Card -->
                    <label class="relative flex items-center p-4 cursor-pointer rounded-2xl bg-[#FDFBF7] border border-dashed border-brand-border hover:border-brand-accent transition-all group md:col-span-2 mt-2"
                           :class="isNoneSelectedInGroup('{{ $namaKategori }}') ? 'border-brand-accent/50 bg-[#F5F3E9]' : ''">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 mr-4 text-amber-500">
                             <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <div class="flex-grow">
                            <span class="block text-sm font-bold text-brand-dark mb-0.5">Tidak ada kondisi di atas</span>
                            <span class="block text-xs text-brand-accent">Saya dalam keadaan sehat dan normal untuk kategori ini.</span>
                        </div>
                    </label>
                </div>
            </div>
            @php $stepCount++; @endphp
            @endforeach

            <!-- Form Footer / Navigation -->
            <div class="pt-6 border-t border-brand-border flex items-center justify-between">
                <!-- Back Button -->
                <button type="button" @click="prevStep()" :class="step === 1 ? 'invisible' : ''" class="flex items-center gap-2 text-sm font-bold text-brand-accent hover:text-brand-dark transition-colors px-4 py-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                    Kembali
                </button>
                
                <!-- Counter & Next Button -->
                <div class="flex items-center gap-6">
                    <span class="text-xs font-bold text-brand-accent tracking-widest"><span x-text="step"></span> / 5</span>
                    
                    <button type="button" x-show="step < 5" @click="nextStep()" class="bg-brand-dark text-white text-sm font-bold px-8 py-3.5 rounded-full hover:bg-opacity-90 transition-all flex items-center gap-2 shadow-md">
                        Selanjutnya
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                    </button>

                    <button type="submit" x-show="step === 5" :disabled="isSubmitting" class="bg-brand-dark text-white text-sm font-bold px-8 py-3.5 rounded-full hover:bg-opacity-90 transition-all flex items-center gap-2 shadow-md disabled:opacity-70 disabled:cursor-not-allowed">
                        <span x-show="!isSubmitting">Lihat Rekomendasi</span>
                        <span x-show="isSubmitting">Memproses...</span>
                        <svg x-show="!isSubmitting" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                    </button>
                </div>
            </div>

        </form>
    </main>

    <!-- Footer -->
    <footer class="py-8 text-center mt-auto w-full">
        <p class="text-brand-accent/60 text-xs font-medium">
            &copy; 2026 SurePlan. Data Anda sepenuhnya rahasia &mdash; tidak disimpan, tidak dikirim ke pihak manapun.
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

    <!-- Alpine Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('wizardData', () => ({
                step: 1,
                totalSteps: 5,
                isSubmitting: false,
                selected: [],
                
                getStepName(i) {
                    const names = ['Identitas Diri', 'Tujuan & Kondisi', 'Kardiovaskular', 'Penyakit Lainnya', 'Kandungan & KB'];
                    return names[i-1];
                },

                jumpToStep(targetStep) {
                    // Hanya bisa lompat ke step yang sudah dilewati atau step saat ini
                    if(targetStep < this.step) {
                        this.step = targetStep;
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                },

                nextStep() {
                    // Validasi step 1
                    if(this.step === 1) {
                        const form = document.getElementById('form-konsultasi');
                        if(!form.nama.value || !form.usia.value || !form.jml_anak.value) {
                            alert('Mohon isi Nama, Usia, dan Jumlah Anak untuk melanjutkan.');
                            return;
                        }
                    }
                    if(this.step < this.totalSteps) {
                        this.step++;
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                },
                
                prevStep() {
                    if(this.step > 1) {
                        this.step--;
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                },

                isNoneSelectedInGroup(groupName) {
                    // Helper visual sederhana (bukan fungsional database)
                    return false;
                },

                handleCheck(id, isChecked) {
                    if (!isChecked) {
                        this.selected = this.selected.filter(i => i !== id);
                        return;
                    }
                    
                    // Logika Mutually Exclusive
                    const groups = [
                        ['K13', 'K15', 'K04'], // Tujuan Jarak
                        ['K18', 'K20'], // Perlindungan
                        ['K01', 'K09', 'K32', 'K07'], // Hipertensi / Normal
                        ['K27', 'K29', 'K56', 'K49'], // Salin / Keguguran
                        ['K35', 'K36'], // Migrain
                        ['K19', 'K10', 'K11', 'K51', 'K38', 'K44', 'K55'], // Tumor / Kanker payudara & serviks dll
                        ['K16', 'K41'], // Durasi Diabetes
                        ['K31', 'K54'], // Merokok
                        ['K03', 'K28'] // Menyusui
                    ];
                    
                    let foundGroup = groups.find(g => g.includes(id));
                    if (foundGroup) {
                        // Hilangkan semua item lain di grup ini dari array selected
                        this.selected = this.selected.filter(item => !foundGroup.includes(item));
                    }
                    
                    // Masukkan ID baru
                    this.selected.push(id);
                }
            }))
        })
    </script>
</body>
</html>
