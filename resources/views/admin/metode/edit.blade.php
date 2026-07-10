@extends('admin.layout')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.metode.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-accent hover:text-brand-dark mb-4 transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali ke Daftar Metode KB
    </a>
    <h1 class="text-2xl font-extrabold text-brand-dark tracking-tight mb-1">Edit Metode KB</h1>
</div>

<div class="bg-gradient-to-br from-white to-[#F5F8F6] rounded-3xl border border-white p-8 shadow-lg shadow-brand-dark/5 max-w-2xl relative">
    <div class="absolute top-0 right-0 p-8 opacity-5 pointer-events-none">
        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
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

    <form action="{{ route('admin.metode.update', $metode->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-6 relative z-10">
            <label class="block text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-2">Nama Metode KB</label>
            <input type="text" name="nama_metode" value="{{ old('nama_metode', $metode->nama_metode) }}" class="w-full bg-white border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-bold transition-all shadow-sm hover:shadow-md" required>
        </div>

        <div class="mb-6 relative z-10">
            <label class="block text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-2">Kelebihan KB</label>
            <textarea name="kelebihan" rows="3" class="w-full bg-white border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-medium leading-relaxed transition-all shadow-sm hover:shadow-md">{{ old('kelebihan', $metode->kelebihan) }}</textarea>
        </div>

        <div class="mb-8 relative z-10">
            <label class="block text-[10px] font-bold tracking-widest text-brand-accent uppercase mb-2">Kekurangan KB</label>
            <textarea name="kekurangan" rows="3" class="w-full bg-white border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-medium leading-relaxed transition-all shadow-sm hover:shadow-md">{{ old('kekurangan', $metode->kekurangan) }}</textarea>
        </div>

        <div class="flex justify-end gap-3 mt-8 relative z-10">
            <a href="{{ route('admin.metode.index') }}" class="px-5 py-2.5 rounded-full text-sm font-bold text-brand-accent hover:bg-gray-100 transition-colors">Batal</a>
            <button type="submit" class="bg-gradient-to-r from-brand-dark to-[#244f38] text-white text-sm font-bold px-6 py-2.5 rounded-full hover:shadow-lg hover:-translate-y-0.5 transition-all">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
