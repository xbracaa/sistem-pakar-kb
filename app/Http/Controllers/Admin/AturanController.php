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
            'alasan_medis' => 'required|string|min:15'
        ]);

        $premis = implode(' AND ', $request->kondisi);

        $existingAturan = Aturan::where('premis', $premis)->where('konklusi', $request->metode)->first();
        if ($existingAturan) {
            $kondisiNames = \App\Models\Kondisi::whereIn('id', $request->kondisi)->pluck('nama_kondisi')->implode(' + ');
            $metodeName = \App\Models\MetodeKb::where('id', $request->metode)->value('nama_metode');
            $errorMsg = "Aturan tidak dapat ditambahkan karena aturan dengan kondisi '{$kondisiNames}' maka menggunakan metode '{$metodeName}' telah tersedia pada ID aturan {$existingAturan->id_aturan}";
            return redirect()->back()->withInput()->with('error', $errorMsg);
        }

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
            'kondisi' => 'required|array|min:1',
            'metode' => 'required|string',
            'cf_pakar' => 'required|numeric|min:-1|max:1',
            'alasan_medis' => 'required|string|min:15'
        ]);

        $premis = implode(' AND ', $request->kondisi);

        $existingAturan = Aturan::where('premis', $premis)->where('konklusi', $request->metode)->where('id', '!=', $id)->first();
        if ($existingAturan) {
            $kondisiNames = \App\Models\Kondisi::whereIn('id', $request->kondisi)->pluck('nama_kondisi')->implode(' + ');
            $metodeName = \App\Models\MetodeKb::where('id', $request->metode)->value('nama_metode');
            $errorMsg = "Aturan tidak dapat diubah karena aturan dengan kondisi '{$kondisiNames}' maka menggunakan metode '{$metodeName}' telah tersedia pada ID aturan {$existingAturan->id_aturan}";
            return redirect()->back()->withInput()->with('error', $errorMsg);
        }

        $cf = (float) $request->cf_pakar;
        $kategori = '1';
        if ($cf == -1.0) $kategori = '4';
        elseif ($cf < 0) $kategori = '3';
        elseif ($cf < 0.8) $kategori = '2';

        $aturan->update([
            'premis' => $premis,
            'konklusi' => $request->metode,
            'cf_pakar' => $cf,
            'kategori_mec' => $kategori,
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
