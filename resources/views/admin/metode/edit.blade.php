@extends('admin.layout')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.metode.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-accent hover:text-brand-dark mb-4 transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali ke Daftar Metode KB
    </a>
    <h1 class="text-2xl font-extrabold text-brand-dark tracking-tight mb-1">Edit Metode KB</h1>
</div>

<div class="bg-white rounded-3xl border border-brand-border p-8 shadow-sm max-w-xl">
    
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
        
        <div class="mb-8">
            <label class="block text-sm font-bold text-brand-dark mb-2">Nama Metode KB</label>
            <input type="text" name="nama_metode" value="{{ old('nama_metode', $metode->nama_metode) }}" class="w-full bg-[#F5F8F6] border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-bold" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-bold text-brand-dark mb-2">Kelebihan KB</label>
            <textarea name="kelebihan" rows="3" class="w-full bg-[#F5F8F6] border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-medium leading-relaxed">{{ old('kelebihan', $metode->kelebihan) }}</textarea>
        </div>

        <div class="mb-8">
            <label class="block text-sm font-bold text-brand-dark mb-2">Kekurangan KB</label>
            <textarea name="kekurangan" rows="3" class="w-full bg-[#F5F8F6] border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-medium leading-relaxed">{{ old('kekurangan', $metode->kekurangan) }}</textarea>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.metode.index') }}" class="px-6 py-3 rounded-xl font-bold text-brand-accent hover:bg-gray-100 transition-colors">Batal</a>
            <button type="submit" class="bg-brand-dark text-white px-8 py-3 rounded-xl font-bold hover:bg-opacity-90 shadow-lg transition-all">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
