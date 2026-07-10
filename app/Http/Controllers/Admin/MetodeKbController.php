<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MetodeKb;

class MetodeKbController extends Controller
{
    public function index()
    {
        $metodes = MetodeKb::all();
        return view('admin.metode.index', compact('metodes'));
    }

    public function create()
    {
        return view('admin.metode.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_metode' => 'required|string|max:255',
            'kelebihan' => 'nullable|string',
            'kekurangan' => 'nullable|string',
        ]);

        $lastMetode = MetodeKb::orderByRaw('CAST(SUBSTRING(id, 2) AS UNSIGNED) DESC')->first();
        $nextNumber = $lastMetode ? intval(substr($lastMetode->id, 1)) + 1 : 1;
        $nextId = 'M' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        MetodeKb::create([
            'id' => $nextId,
            'nama_metode' => $request->nama_metode,
            'kelebihan' => $request->kelebihan,
            'kekurangan' => $request->kekurangan,
        ]);

        return redirect()->route('admin.metode.index')->with('success', 'Metode KB berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $metode = MetodeKb::findOrFail($id);
        return view('admin.metode.edit', compact('metode'));
    }

    public function update(Request $request, $id)
    {
        $metode = MetodeKb::findOrFail($id);
        
        $request->validate([
            'nama_metode' => 'required|string|max:255',
            'kelebihan' => 'nullable|string',
            'kekurangan' => 'nullable|string',
        ]);

        $metode->update([
            'nama_metode' => $request->nama_metode,
            'kelebihan' => $request->kelebihan,
            'kekurangan' => $request->kekurangan,
        ]);

        return redirect()->route('admin.metode.index')->with('success', 'Metode KB berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $metode = MetodeKb::findOrFail($id);
        $metode->delete();
        return redirect()->route('admin.metode.index')->with('success', 'Metode KB berhasil dihapus!');
    }
}
