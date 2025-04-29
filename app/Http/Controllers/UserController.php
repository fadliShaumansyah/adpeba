<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    public function show($name)
    {
        return view('dashboard.index', ['name' => $name]);
    }

    public function optionalShow($name = 'Fadli')
    {
        return view('dashboard.index', ['name' => $name]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'npa' => 'required|string',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:255',
        'email' => 'required|email:rfc,dns',
        'password' => 'required|min:5|max:255',
    ]);

    // Enkripsi password
    $validatedData['password'] = Hash::make($validatedData['password']);

    // Default role untuk user baru, misalnya 'user'
    $validatedData['role'] = 'user';

    // Default permissions untuk user baru (misalnya hanya bisa melihat data sendiri)
    $validatedData['permissions'] = json_encode(['view_user']);

    // Simpan user baru
    User::create($validatedData);

    return redirect('/Registrasi')->with('success', 'Data berhasil ditambahkan');
}

}
