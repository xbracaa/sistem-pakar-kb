@extends('admin.layout')

@section('content')
<div class="mb-10">
    <h1 class="text-3xl font-extrabold text-brand-dark tracking-tight mb-2">Selamat Datang, Bidan!</h1>
    <p class="text-brand-accent font-medium">Kelola basis pengetahuan (Knowledge Base) sistem pakar SurePlan dari sini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-gradient-to-br from-white to-[#F5F8F6] rounded-3xl p-8 border border-white shadow-lg shadow-brand-dark/5 flex items-center justify-between transform transition-transform hover:-translate-y-1">
        <div>
            <span class="block text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-2">Total Kondisi / Penyakit</span>
            <div class="text-4xl font-extrabold text-brand-dark">{{ $totalKondisi }}</div>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#DFEBE3] to-[#A2C2AF] text-[#173424] flex items-center justify-center shadow-inner">
            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
        </div>
    </div>
    <div class="bg-gradient-to-br from-white to-[#F5F8F6] rounded-3xl p-8 border border-white shadow-lg shadow-brand-dark/5 flex items-center justify-between transform transition-transform hover:-translate-y-1">
        <div>
            <span class="block text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-2">Metode KB</span>
            <div class="text-4xl font-extrabold text-brand-dark">{{ $totalMetode }}</div>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#DFEBE3] to-[#A2C2AF] text-[#173424] flex items-center justify-center shadow-inner">
            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
        </div>
    </div>
    <div class="bg-gradient-to-br from-white to-[#F5F8F6] rounded-3xl p-8 border border-white shadow-lg shadow-brand-dark/5 flex items-center justify-between transform transition-transform hover:-translate-y-1">
        <div>
            <span class="block text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-2">Aturan Medis</span>
            <div class="text-4xl font-extrabold text-brand-dark">{{ $totalAturan }}</div>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#173424] to-[#2A5C41] text-white flex items-center justify-center shadow-md">
            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
        </div>
    </div>
</div>

<div class="bg-white rounded-3xl border border-[#E8E5DA] p-8 shadow-sm">
    <h2 class="text-xl font-extrabold text-brand-dark mb-4">Akses Cepat</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <a href="{{ route('admin.aturan.index') }}" class="block p-6 rounded-2xl bg-[#F5F8F6] hover:bg-[#E5EFE8] transition-colors border border-[#D0E3D6]">
            <span class="block font-bold text-brand-dark mb-1">Ubah Aturan & Penjelasan</span>
            <p class="text-xs text-brand-accent font-medium leading-relaxed">Kelola nilai persentase keamanan KB dan penjelasan medis yang akan tampil di hasil.</p>
        </a>
    </div>
</div>
@endsection
