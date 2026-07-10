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
        <div class="flex flex-col items-center mb-8">
            <div class="w-12 h-12 bg-brand-dark rounded-full text-white flex items-center justify-center shadow-sm mb-4">
                <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" /></svg>
            </div>
            <h1 class="text-2xl font-extrabold text-brand-dark tracking-tight">SurePlan Admin</h1>
            <p class="text-xs text-brand-accent font-bold uppercase tracking-widest mt-1">Portal Pakar Bidan</p>
        </div>

        @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 text-sm rounded-xl p-4 mb-6 font-medium">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-bold text-brand-dark mb-2">Email Bidan</label>
                <input type="email" name="email" value="{{ old('email', 'bidan@sureplan.com') }}" class="w-full bg-[#F5F8F6] border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 transition-all font-medium" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-brand-dark mb-2">Password</label>
                <input type="password" name="password" value="password" class="w-full bg-[#F5F8F6] border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 transition-all font-medium" required>
            </div>
            <button type="submit" class="w-full bg-brand-dark text-white font-bold rounded-xl px-4 py-3.5 hover:bg-opacity-90 transition-all shadow-lg hover:shadow-xl mt-4">
                Masuk ke Dashboard
            </button>
        </form>
    </div>
</body>
</html>
