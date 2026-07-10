<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kondisi;

class KondisiController extends Controller
{
    public function index()
    {
        $kondisis = Kondisi::all();
        return view('admin.kondisi.index', compact('kondisis'));
    }

    public function create()
    {
        return view('admin.kondisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kondisi' => 'required|string|max:255',
        ]);

        $lastKondisi = Kondisi::orderByRaw('CAST(SUBSTRING(id, 2) AS UNSIGNED) DESC')->first();
        $nextNumber = $lastKondisi ? intval(substr($lastKondisi->id, 1)) + 1 : 1;
        $nextId = 'K' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        Kondisi::create([
            'id' => $nextId,
            'nama_kondisi' => $request->nama_kondisi,
        ]);

        return redirect()->route('admin.kondisi.index')->with('success', 'Data Kondisi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kondisi = Kondisi::findOrFail($id);
        return view('admin.kondisi.edit', compact('kondisi'));
    }

    public function update(Request $request, $id)
    {
        $kondisi = Kondisi::findOrFail($id);
        
        $request->validate([
            'nama_kondisi' => 'required|string|max:255',
        ]);

        $kondisi->update([
            'nama_kondisi' => $request->nama_kondisi,
        ]);

        return redirect()->route('admin.kondisi.index')->with('success', 'Data Kondisi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kondisi = Kondisi::findOrFail($id);
        
        $aturanTerkait = \App\Models\Aturan::where('premis', 'LIKE', '%' . $kondisi->id . '%')->exists();
        if ($aturanTerkait) {
            return redirect()->route('admin.kondisi.index')->with('error', 'Kondisi tidak bisa dihapus karena masih digunakan di Aturan Medis!');
        }

        $kondisi->delete();
        return redirect()->route('admin.kondisi.index')->with('success', 'Data Kondisi berhasil dihapus!');
    }
}
