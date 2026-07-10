@extends('admin.layout')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.kondisi.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-accent hover:text-brand-dark mb-4 transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali ke Daftar Kondisi
    </a>
    <h1 class="text-2xl font-extrabold text-brand-dark tracking-tight mb-1">Edit Kondisi Medis</h1>
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

    <form action="{{ route('admin.kondisi.update', $kondisi->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- ID (Auto) removed -->
        <div class="mb-8">
            <label class="block text-sm font-bold text-brand-dark mb-2">Nama Kondisi / Penyakit</label>
            <input type="text" name="nama_kondisi" value="{{ old('nama_kondisi', $kondisi->nama_kondisi) }}" class="w-full bg-[#F5F8F6] border border-[#D0E3D6] rounded-xl px-4 py-3 text-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-dark/20 font-bold" required>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.kondisi.index') }}" class="px-6 py-3 rounded-xl font-bold text-brand-accent hover:bg-gray-100 transition-colors">Batal</a>
            <button type="submit" class="bg-brand-dark text-white px-8 py-3 rounded-xl font-bold hover:bg-opacity-90 shadow-lg transition-all">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
