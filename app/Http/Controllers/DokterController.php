<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = Dokter::with('poli')->get();
        return view('dokters.index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource (register form).
     */
    public function create()
    {
        $polis = Poli::where('status', 'active')->get();
        return view('dokters.register', compact('polis'));
    }

    /**
     * Store a newly created resource in storage (register process).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'spesialis' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'id_poli' => 'required|exists:polis,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::transaction(function () use ($validated) {
            // Create user account
            $user = User::create([
                'name' => $validated['nama'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'dokter', // Assuming you have role field
            ]);

            // Create dokter record
            Dokter::create([
                'nama' => $validated['nama'],
                'spesialis' => $validated['spesialis'],
                'no_hp' => $validated['no_hp'],
                'alamat' => $validated['alamat'],
                'id_poli' => $validated['id_poli'],
                'user_id' => $user->id, // Link to user account
            ]);
        });

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil didaftarkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dokter = Dokter::with('poli')->findOrFail($id);
        return view('dokters.show', compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $polis = Poli::where('status', 'active')->get();
        return view('dokters.edit', compact('dokter', 'polis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokter = Dokter::findOrFail($id);
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'id_poli' => 'required|exists:polis,id',
        ]);

        $dokter->update($validated);

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokters.index')
            ->with('success', 'Dokter berhasil dihapus.');
    }
}