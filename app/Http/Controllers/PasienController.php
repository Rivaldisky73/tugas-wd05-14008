<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasiens = Pasien::latest()->paginate(10);
        return view('pasiens.index', compact('pasiens'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokters = Dokter::all();
        return view('pasiens.create', compact('dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasiens.index')
            ->with('success', 'Pasien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        return view('pasiens.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        return view('pasiens.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasiens.index')
            ->with('success', 'Data Pasien berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasiens.index')
            ->with('success', 'Data Pasien berhasil dihapus.');
    }

    /**
     * Display the form to select a dokter for the pasien.
     */
    public function pilihDokter()
    {
        $dokters = Dokter::all(); // Fetch all dokters
        return view('pasiens.pilih_dokter', compact('dokters'));
    }

    /**
     * Store the selected dokter for the pasien.
     */
    public function simpanPilihan(Request $request)
    {
        // Validate the input
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id', // Ensure dokter exists
        ]);

        // Get the logged-in pasien
        $pasien = Auth::user()->pasien; // Assuming each user has one pasien model

        // Update the pasien with selected dokter
        $pasien->dokter_id = $request->dokter_id;
        $pasien->save();

        return redirect()->route('dashboard') // Or any route you want to redirect after saving
            ->with('success', 'Dokter berhasil dipilih.');
    }
}
