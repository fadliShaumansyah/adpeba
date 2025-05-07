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

    // Default role untuk user baru'user'
    $validatedData['role'] = 'user';

    // Default permissions untuk user baru (misalnya hanya bisa melihat data sendiri)
    $validatedData['permissions'] = json_encode(['view_user']);

    // Simpan user baru
    User::create($validatedData);

    return redirect('/Registrasi')->with('success', 'Data berhasil ditambahkan');
}

// Menampilkan profil pengguna
public function showProfile()
{
    // Ambil data pengguna yang sedang login
    $user = Auth::user();

    // Kirim data pengguna ke view 'profile'
    return view('user.profil', ['user' => $user]);
}

// Menampilkan form untuk mengedit profil
public function editProfile()
{
    // Ambil data pengguna yang sedang login
    $user = Auth::user();

    return view('user.profiledit', compact('user'));
}


// Mengupdate profil pengguna
public function updateProfile(Request $request)
{
      // Ambil pengguna yang sedang login
      $user = Auth::user();

 
    // Validasi input dari form
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'npa' => 'required|string',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:255',
        'email' => 'required|email:rfc,dns',
        // Tambahkan validasi untuk password jika ingin mengubah password
        'password' => 'nullable|min:5|max:255',
    ]);

  

    // Update data pengguna
    $user->name = $validatedData['name'];
    $user->npa = $validatedData['npa'];
    $user->alamat = $validatedData['alamat'];
    $user->no_hp = $validatedData['no_hp'];
    $user->email = $validatedData['email'];

    // Jika ada password yang diubah, enkripsi password dan simpan
    if ($request->filled('password')) {
        $user->password = Hash::make($validatedData['password']);
    }

    // Simpan perubahan
    $user->save();

    // Redirect ke halaman profil dengan pesan sukses
    return redirect('/profile')->with('success', 'Profil berhasil diperbarui');
}

}
