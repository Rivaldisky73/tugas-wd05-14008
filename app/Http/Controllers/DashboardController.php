<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Periksa;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPasien = Pasien::count();
        $jumlahPeriksa = Periksa::count();
        $riwayatTerbaru = Periksa::with(['pasien', 'dokter'])
                            ->orderBy('tanggal_periksa', 'desc')
                            ->limit(5)
                            ->get();

        return view('dashboard', compact('jumlahPasien', 'jumlahPeriksa', 'riwayatTerbaru'));
    }
}
