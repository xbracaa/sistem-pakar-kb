@extends('admin.layout')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.aturan.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-accent hover:text-brand-dark mb-4 transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali ke Aturan
    </a>
    <h1 class="text-2xl font-extrabold text-brand-dark tracking-tight mb-1">Tambah Aturan Medis Baru</h1>
</div>

<form action="{{ route('admin.aturan.store') }}" method="POST">
    @csrf
    
    <div class="bg-white rounded-3xl border border-brand-border p-8 shadow-sm mb-8">
        <!-- Visual Helper -->
        <div class="flex flex-col md:flex-row items-center gap-6 bg-[#F5F8F6] rounded-2xl p-6 border border-[#D0E3D6] mb-8">
            <div class="flex-grow w-full">
                <label class="block text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-2">JIKA KONDISI PASIEN:</label>
                <div class="h-48 overflow-y-auto bg-white border border-[#D0E3D6] rounded-xl p-3">
                    @foreach($kondisis as $k)
                        <label class="flex items-start gap-2 mb-2 cursor-pointer p-2 hover:bg-gray-50 rounded">
                            <input type="checkbox" name="kondisi[]" value="{{ $k->id }}" class="mt-1">
                            <span class="text-sm font-bold text-brand-dark">{{ $k->nama_kondisi }}</span>
                        </label>
                    @endforeach
                </div>
                <p class="text-[10px] text-brand-accent mt-1">*Bisa pilih lebih dari satu (AND)</p>
            </div>
            
            <div class="hidden md:flex text-brand-accent flex-shrink-0">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </div>
            <div class="flex md:hidden text-brand-accent">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>
            </div>

            <div class="flex-grow w-full">
                <label class="block text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-2">MAKA METODE KB:</label>
                <select name="metode" class="w-full text-lg font-extrabold text-brand-dark bg-white border border-[#D0E3D6] rounded-xl p-3" required>
                    <option value="" disabled selected>Pilih Metode...</option>
                    @foreach($metodes as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_metode }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-8 max-w-sm">
            <label class="block text-sm font-bold text-brand-dark mb-2">Bobot Pakar (Berdasarkan Kategori MEC)</label>
            <input type="number" step="0.01" name="cf_pakar" class="w-full bg-white border border-brand-border rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-bold" required>
            <p class="text-[10px] text-brand-accent mt-2 font-medium">Panduan: -1.0 (Dilarang Mutlak / Kat. 4), -0.5 (Perhatian Khusus / Kat. 3), 1.0 (Sangat Aman / Kat. 1)</p>
        </div>

        <div>
            <label class="block text-sm font-bold text-brand-dark mb-2">Penjelasan Medis Khusus</label>
            <textarea name="alasan_medis" rows="4" class="w-full bg-[#F5F8F6] border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-medium leading-relaxed" placeholder="Tuliskan alasan mengapa metode ini dilarang/dianjurkan untuk kondisi di atas..." required minlength="15"></textarea>
            <p class="text-[10px] text-brand-accent mt-2 font-medium">Teks ini akan muncul di Accordion hasil rekomendasi pasien.</p>
        </div>

        <div class="mt-8 flex justify-end gap-3">
            <a href="{{ route('admin.aturan.index') }}" class="px-5 py-2.5 rounded-full text-sm font-bold text-brand-accent hover:bg-gray-100 transition-colors">Batal</a>
            <button type="submit" class="bg-brand-dark text-white text-sm font-bold px-6 py-2.5 rounded-full hover:bg-opacity-90 transition-all shadow-sm">Simpan Aturan</button>
        </div>
    </div>
</form>
@endsection
