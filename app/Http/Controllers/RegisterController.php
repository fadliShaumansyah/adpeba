<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;

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
            'email' => 'required|email:rfc.dns|unique:users',
            'password' => 'required|min:5|max:255',
           
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success','Registrasi Sukses, silahkan log in');
    }
}
