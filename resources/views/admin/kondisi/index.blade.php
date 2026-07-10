@extends('admin.layout')

@section('content')
<div class="mb-8 flex justify-between items-end">
    <div>
        <h1 class="text-2xl font-extrabold text-brand-dark tracking-tight mb-1">Manajemen Kondisi / Penyakit</h1>
        <p class="text-sm text-brand-accent font-medium">Kelola daftar kondisi medis atau gejala yang dialami pasien.</p>
    </div>
    <a href="{{ route('admin.kondisi.create') }}" class="bg-brand-dark text-white px-6 py-3 rounded-xl font-bold hover:bg-opacity-90 shadow-lg transition-all flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
        Tambah Kondisi Baru
    </a>
</div>

<div class="bg-white rounded-3xl border border-brand-border shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#F5F8F6] border-b border-brand-border text-xs font-bold text-brand-accent uppercase tracking-widest">
                    <th class="px-6 py-4">ID Kondisi</th>
                    <th class="px-6 py-4">Nama Kondisi / Penyakit</th>
                    <th class="px-6 py-4 text-center w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-brand-border text-sm font-medium text-brand-dark">
                @foreach($kondisis as $kondisi)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-brand-accent font-bold">{{ $kondisi->id }}</td>
                    <td class="px-6 py-4 font-bold">{{ $kondisi->nama_kondisi }}</td>
                    <td class="px-6 py-4 flex items-center justify-center gap-2">
                        <a href="{{ route('admin.kondisi.edit', $kondisi->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-brand-light text-brand-dark hover:bg-brand-dark hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                        </a>
                        <form action="{{ route('admin.kondisi.destroy', $kondisi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kondisi ini?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
