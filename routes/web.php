<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsultasiController;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Halaman Form Konsultasi (Multi-step Wizard)
Route::get('/konsultasi', [KonsultasiController::class, 'index']);

// Proses Perhitungan & Tampilkan Hasil Rekomendasi
Route::post('/hasil', [KonsultasiController::class, 'hitung'])->name('konsultasi.hitung');

// Cetak Format Rekam Medis (A4)
Route::get('/cetak', [KonsultasiController::class, 'cetak'])->name('konsultasi.cetak');

// Edukasi KB (Katalog)
Route::get('/katalog', function () {
    $metode = \App\Models\MetodeKb::all();
    return view('katalog', compact('metode'));
});