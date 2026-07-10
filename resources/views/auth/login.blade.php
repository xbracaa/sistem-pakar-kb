<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Bidan Pakar | SurePlan</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: { brand: { dark: '#173424', light: '#DFEBE3', accent: '#71867A' } }
                }
            }
        }
    </script>
</head>
<body class="bg-[#F5F3E9] min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-[#E8E5DA] p-8 md:p-10">
        <div class="mb-6">
            <a href="/" class="inline-flex items-center gap-2 text-sm font-bold text-brand-accent hover:text-brand-dark transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali ke Beranda
            </a>
        </div>
        <div class="flex flex-col items-center mb-8">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-16 h-16 object-contain mb-4">
            <h1 class="text-2xl font-extrabold text-brand-dark tracking-tight">Login SurePlan</h1>
            <p class="text-xs text-brand-accent font-bold uppercase tracking-widest mt-1">Sistem Pakar KB</p>
        </div>


        @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 text-sm rounded-xl p-4 mb-6 font-medium">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-bold text-brand-dark mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-[#F5F8F6] border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 transition-all font-medium" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-brand-dark mb-2">Password</label>
                <input type="password" name="password" class="w-full bg-[#F5F8F6] border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 transition-all font-medium" required>
            </div>
            <button type="submit" class="w-full bg-brand-dark text-white font-bold rounded-xl px-4 py-3.5 hover:bg-opacity-90 transition-all shadow-lg hover:shadow-xl mt-4">
                Masuk
            </button>
            <div class="text-center mt-6">
                <p class="text-sm text-brand-accent font-medium">Belum punya akun? <a href="{{ route('register') }}" class="text-brand-dark font-bold hover:underline">Daftar di sini</a></p>
            </div>
        </form>
    </div>
</body>
</html>
