<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.registrasi');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'npa' => 'required|string',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5|max:255',
        ], [
            'email.unique' => 'Email sudah terdaftar, gunakan email lain.'
        ]);

        // Generate UUID manual
        $validatedData['id'] = (string) Str::uuid();
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat user
        $user = User::create($validatedData);

        // Kirim email verifikasi
        event(new Registered($user));

        // Login otomatis (jika mau, boleh dihapus kalau tidak mau)
        Auth::login($user);

        return redirect('/login')->with('success', 'Registrasi sukses! Silakan login. Email verifikasi sudah dikirim.');
    }
}
