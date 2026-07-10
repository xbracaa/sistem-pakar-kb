<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | SurePlan</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: { brand: { dark: '#173424', light: '#DFEBE3', accent: '#71867A', bg: '#F5F3E9', border: '#E8E5DA' } }
                }
            }
        }
    </script>
</head>
<body class="bg-[#F5F8F6] text-brand-dark antialiased font-sans bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] bg-fixed">
    
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-white/80 backdrop-blur-md border-r border-brand-border hidden md:flex flex-col shadow-2xl relative z-10">
            <div class="p-6 border-b border-brand-border">
                <a href="/" class="flex items-center gap-2 font-bold text-xl tracking-tight text-brand-dark">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                    SurePlan
                </a>
                <span class="block mt-1 text-[10px] font-bold tracking-widest text-brand-accent uppercase">Panel Bidan</span>
            </div>
            
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-brand-dark to-[#244f38] text-white shadow-md' : 'text-brand-accent hover:bg-brand-light/50 hover:text-brand-dark' }} transition-all duration-300">
                    Dashboard
                </a>
                <a href="{{ route('admin.kondisi.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.kondisi.*') ? 'bg-gradient-to-r from-brand-dark to-[#244f38] text-white shadow-md' : 'text-brand-accent hover:bg-brand-light/50 hover:text-brand-dark' }} transition-all duration-300">
                    Data Kondisi
                </a>
                <a href="{{ route('admin.metode.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.metode.*') ? 'bg-gradient-to-r from-brand-dark to-[#244f38] text-white shadow-md' : 'text-brand-accent hover:bg-brand-light/50 hover:text-brand-dark' }} transition-all duration-300">
                    Metode KB
                </a>
                <a href="{{ route('admin.aturan.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-xl {{ request()->routeIs('admin.aturan.*') ? 'bg-gradient-to-r from-brand-dark to-[#244f38] text-white shadow-md' : 'text-brand-accent hover:bg-brand-light/50 hover:text-brand-dark' }} transition-all duration-300">
                    Aturan Medis & Penjelasan
                </a>
            </nav>
            
            <div class="p-4 border-t border-brand-border">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 text-sm font-bold text-rose-600 bg-rose-50 hover:bg-rose-100 rounded-xl transition-colors">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-screen overflow-hidden">
            <!-- Header Mobile -->
            <header class="md:hidden bg-white border-b border-brand-border p-4 flex justify-between items-center">
                <span class="font-bold text-brand-dark">SurePlan Admin</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs font-bold text-rose-600">Logout</button>
                </form>
            </header>
            
            <div class="flex-1 overflow-y-auto p-6 md:p-10">
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl text-sm font-bold shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-700 px-6 py-4 rounded-2xl text-sm font-bold shadow-sm">
                        {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </main>
        
    </div>
</body>
</html>
