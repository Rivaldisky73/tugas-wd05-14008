<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\DetailPeriksa;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Obat;

class PeriksaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_periksa' => 'required|date',
            'jam_periksa' => 'required',
            'keluhan' => 'required|string',
            'diagnosa' => 'required|string',
            'biaya_periksa' => 'required|numeric|min:0',
            'obat_ids' => 'required|array',
            'obat_ids.*' => 'exists:obats,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1'
        ]);

        $periksa = Periksa::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'tanggal_periksa' => $request->tanggal_periksa,
            'jam_periksa' => $request->jam_periksa,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
            'biaya_periksa' => $request->biaya_periksa,
        ]);

        for ($i = 0; $i < count($request->obat_ids); $i++) {
            DetailPeriksa::create([
                'periksa_id' => $periksa->id,
                'obat_id' => $request->obat_ids[$i],
                'jumlah' => $request->jumlah[$i]
            ]);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Periksa berhasil ditambahkan.');
    }


    public function showDokterTable()
    {
        $dokters = Dokter::all();
        return view('periksa.dokter', compact('dokters'));
    }

    public function showPasienTable()
    {
        $pasiens = Pasien::all();
        return view('periksa.pasien', compact('pasiens'));
    }

        public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $obats = Obat::all();

        return view('periksa.create', compact('pasiens', 'dokters', 'obats'));
    }
}
