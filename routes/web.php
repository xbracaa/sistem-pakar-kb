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

// ADMIN PANEL ROUTES
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KondisiController;
use App\Http\Controllers\Admin\MetodeKbController;
use App\Http\Controllers\Admin\AturanController;

// Auth
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('kondisi', KondisiController::class);
    Route::resource('metode', MetodeKbController::class);
    Route::resource('aturan', AturanController::class);
});