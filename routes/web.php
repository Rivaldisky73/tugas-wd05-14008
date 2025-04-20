<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\DetailPeriksaController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\Dokter\RegisterDokterController;

// 🚪 Auth routes (login, register, etc.)
Auth::routes();

// 🏠 Dashboard (protected, only after login)
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// 🩺 Public registration for Dokter
Route::get('/register-dokter', [RegisterDokterController::class, 'create'])->name('dokter.register');
Route::post('/register-dokter', [RegisterDokterController::class, 'store'])->name('dokter.register.store');

// 🔐 Protected routes (must login first)
Route::middleware('auth')->group(function () {

    // 💊 Obat route
    Route::resource('obats', ObatController::class);

    // 👤 Pasien-only routes
    Route::resource('pasiens', PasienController::class);
    Route::get('/pasien/dashboard', [PasienController::class, 'index']);

    // 🩺 Dokter-only routes
    Route::resource('dokters', DokterController::class);
    Route::resource('periksas', PeriksaController::class);
    Route::resource('detail-periksas', DetailPeriksaController::class);

    // Routes for selecting a doctor (for the patient)
    Route::get('/pasien/pilih-dokter', [PasienController::class, 'pilihDokter'])->name('pasien.pilih_dokter');
    Route::post('/pasien/simpan-pilihan', [PasienController::class, 'simpanPilihan'])->name('pasien.simpan_pilihan');

    // Routes for managing 'periksa' and related data (Dokter and Pasien tables)
    Route::get('/periksa/dokter-table', [PeriksaController::class, 'showDokterTable'])->name('periksa.dokter');
    Route::get('/periksa/pasien-table', [PeriksaController::class, 'showPasienTable'])->name('periksa.pasien');
});

// 🩺 Public routes for viewing data
Route::get('/dokters', [DokterController::class, 'index'])->name('dokters.index');
Route::get('/dokter/{id}', [DokterController::class, 'show'])->name('dokters.show');

