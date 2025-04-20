<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    /**
     * Display the registration form for a new dokter.
     */
    public function index()
    {
        // Fetch the patients assigned to the logged-in doctor
        $patients = User::where('role', 'pasien')->where('dokter_id', Auth::id())->get();

        // Pass the $patients variable to the view
        return view('dokters.index', compact('patients'));
    }
    public function create()
    {
        return view('dokters.register'); // This will show the registration form
    }

    /**
     * Store the new dokter in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Validate password confirmation
        ]);

        // Create the dokter (doctor) in the users table with role set as 'dokter'
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'role' => 'dokter', // Ensure the role is set to 'dokter'
        ]);

        return redirect()->route('login')->with('success', 'Registrasi dokter berhasil. Silakan login.');
    }

    // Other methods remain the same...
}
