<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\DetailPeriksaController;
use App\Http\Controllers\PasienController;

// Auth routes
Auth::routes();

// Public routes
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/dokters', [DokterController::class, 'index'])->name('dokters.index');
Route::get('/dokter/{id}', [DokterController::class, 'show'])->name('dokters.show');

Route::get('/register-dokter', [DokterController::class, 'create'])->name('dokter.register');
Route::post('/register-dokter', [DokterController::class, 'store'])->name('dokter.register.store');
Route::get('/periksa/create', [PeriksaController::class, 'create'])->name('periksa.create');
Route::post('/periksa', [PeriksaController::class, 'store'])->name('periksa.store');
Route::middleware('auth')->group(function () {
    // Resource routes
    Route::resource('dokters', DokterController::class)->except(['index', 'show']);
    Route::resource('obats', ObatController::class);
    Route::resource('pasiens', PasienController::class);
    Route::resource('periksas', PeriksaController::class);
    Route::resource('detail-periksas', DetailPeriksaController::class);

    // Additional routes
    Route::get('/pasien/dashboard', [PasienController::class, 'index'])->name('pasien.dashboard');
    Route::get('/pasien/pilih-dokter', [PasienController::class, 'pilihDokter'])->name('pasien.pilih_dokter');
    Route::post('/pasien/simpan-pilihan', [PasienController::class, 'simpanPilihan'])->name('pasien.simpan_pilihan');

    Route::get('/periksa/dokter-table', [PeriksaController::class, 'showDokterTable'])->name('periksa.dokter');
    Route::get('/periksa/pasien-table', [PeriksaController::class, 'showPasienTable'])->name('periksa.pasien');
});
