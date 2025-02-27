<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($name)
    {
        return view('user', ['name' => $name]);
    }

    public function optionalShow($name = 'Fadli')
    {
        return view('user', ['name' => $name]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'npa' => 'required|string',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|date',
            'password' => 'required|date|after_or_equal:periode awal',
           
        ]);

       

        User::create($validatedData);
        return redirect('/Registrasi')->with('success','Data berhasil ditambahkan');
    }
}
