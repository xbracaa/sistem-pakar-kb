<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aturan;
use App\Models\Kondisi;
use App\Models\MetodeKb;

class AturanController extends Controller
{
    public function index()
    {
        $aturans = Aturan::all();
        $kondisis = Kondisi::all()->keyBy('id');
        $metodes = MetodeKb::all()->keyBy('id');

        return view('admin.aturan.index', compact('aturans', 'kondisis', 'metodes'));
    }

    public function create()
    {
        $kondisis = Kondisi::all();
        $metodes = MetodeKb::all();
        return view('admin.aturan.create', compact('kondisis', 'metodes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kondisi' => 'required|array|min:1',
            'metode' => 'required|string',
            'cf_pakar' => 'required|numeric|min:-1|max:1',
            'alasan_medis' => 'nullable|string'
        ]);

        $premis = implode(' AND ', $request->kondisi);

        $lastAturan = Aturan::orderByRaw('CAST(SUBSTRING(id_aturan, 2) AS UNSIGNED) DESC')->first();
        $nextNumber = $lastAturan ? intval(substr($lastAturan->id_aturan, 1)) + 1 : 1;
        $nextId = 'R' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        $cf = (float) $request->cf_pakar;
        $kategori = '1';
        if ($cf == -1.0) $kategori = '4';
        elseif ($cf < 0) $kategori = '3';
        elseif ($cf < 0.8) $kategori = '2';

        Aturan::create([
            'id_aturan' => $nextId,
            'premis' => $premis,
            'konklusi' => $request->metode,
            'cf_pakar' => $cf,
            'kategori_mec' => $kategori,
            'alasan_medis' => $request->alasan_medis
        ]);

        return redirect()->route('admin.aturan.index')->with('success', 'Aturan Medis berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $aturan = Aturan::findOrFail($id);
        $kondisis = Kondisi::all()->keyBy('id');
        $metodes = MetodeKb::all()->keyBy('id');

        return view('admin.aturan.edit', compact('aturan', 'kondisis', 'metodes'));
    }

    public function update(Request $request, $id)
    {
        $aturan = Aturan::findOrFail($id);
        
        $request->validate([
            'cf_pakar' => 'required|numeric|min:-1|max:1',
            'alasan_medis' => 'nullable|string'
        ]);

        $aturan->update([
            'cf_pakar' => $request->cf_pakar,
            'alasan_medis' => $request->alasan_medis
        ]);

        return redirect()->route('admin.aturan.index')->with('success', 'Aturan dan Penjelasan Medis berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $aturan = Aturan::findOrFail($id);
        $aturan->delete();
        return redirect()->route('admin.aturan.index')->with('success', 'Aturan Medis berhasil dihapus!');
    }
}
