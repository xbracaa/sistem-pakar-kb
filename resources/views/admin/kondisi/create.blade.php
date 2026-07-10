@extends('admin.layout')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.kondisi.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-accent hover:text-brand-dark mb-4 transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali ke Daftar Kondisi
    </a>
    <h1 class="text-2xl font-extrabold text-brand-dark tracking-tight mb-1">Tambah Kondisi Medis Baru</h1>
</div>

<div class="bg-gradient-to-br from-white to-[#F5F8F6] rounded-3xl border border-white p-8 shadow-lg shadow-brand-dark/5 max-w-2xl relative">
    <div class="absolute top-0 right-0 p-8 opacity-5 pointer-events-none">
        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
    </div>
    @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 text-sm rounded-xl p-4 mb-6 font-medium">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kondisi.store') }}" method="POST">
        @csrf
        
        <div class="mb-8 relative z-10">
            <label class="block text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-2">Nama Kondisi / Penyakit</label>
            <input type="text" name="nama_kondisi" value="{{ old('nama_kondisi') }}" class="w-full bg-white border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-bold transition-all shadow-sm hover:shadow-md" placeholder="Misal: Kista Ovarium" required>
        </div>

        <div class="flex justify-end gap-3 relative z-10">
            <a href="{{ route('admin.kondisi.index') }}" class="px-5 py-2.5 rounded-full text-sm font-bold text-brand-accent hover:bg-gray-100 transition-colors">Batal</a>
            <button type="submit" class="bg-gradient-to-r from-brand-dark to-[#244f38] text-white text-sm font-bold px-6 py-2.5 rounded-full hover:shadow-lg hover:-translate-y-0.5 transition-all">Simpan Kondisi</button>
        </div>
    </form>
</div>
@endsection
