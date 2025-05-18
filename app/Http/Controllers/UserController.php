<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

 
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
        'profil_image' => 'nullable|image|max:2048',
        'npa' => 'required|string',
        'alamat' => 'required|string|max:255',
        'desa' => 'string|max:255',
        'kecamatan' => 'string|max:255',
        'kota' => 'string|max:255',
        'provinsi' => 'string|max:255',
        'tanggal_lahir' => 'date|max:255',
        'sd' => 'string|max:255',
        'smp' => 'string|max:255',
        'sma' => 'string|max:255',
        's1' => 'string|max:255',
        's2' => 'string|max:255',
        's3' => 'string|max:255',
        'bio' => 'text',
        'no_hp' => 'required|string|max:255',
        'email' => 'required|email:rfc,dns',
        'password' => 'required|min:5|max:255',
    ]);
 
    $path = null;
    if ($request->hasFile('profil_image')) {
        $path = $request->file('profil_image')->store('profilimg', 'public');
        
    }

    // Enkripsi password
    $validatedData['password'] = Hash::make($validatedData['password']);

    // Enkripsi password
    $validatedData['profil_image'] = $path;

    // 
    $validatedData['role'] = 'user';

    // Default permissions untuk user baru (misalnya hanya bisa melihat data sendiri)
    $validatedData['permissions'] = json_encode(['view_user']);

    // Simpan user baru
    User::create($validatedData);

    return redirect('/Registrasi')->with('success', 'Data berhasil ditambahkan');
}

public function showProfileuser($id)
{
    // Cari pengguna berdasarkan ID
    $user = User::findOrFail($id);

    // Tampilkan view profil pengguna
    return view('user.profil', ['user' => $user]);
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
        'profil_image' => 'nullable|image|max:2048',
        'alamat' => 'required|string|max:255',
        'desa' => 'string|max:255',
        'kecamatan' => 'string|max:255',
        'kota' => 'string|max:255',
        'provinsi' => 'string|max:255',
        'tanggal_lahir' => 'date|max:255',
        'sd' => 'nullable|string|max:255',
        'smp' => 'nullable|string|max:255',
        'sma' => 'nullable|string|max:255',
        's1' => 'nullable|string|max:255',
        's2' => 'nullable|string|max:255',
        's3' => 'nullable|string|max:255',
        'bio' => 'nullable|string',
        'no_hp' => 'required|string|max:255',
        'email' => 'required|email:rfc',
        // Tambahkan validasi untuk password jika ingin mengubah password
        'password' => 'nullable|min:5|max:255',
    ]);

  

    // Update data pengguna
    $user->name = $validatedData['name'];
    $user->alamat = $validatedData['alamat'];
    $user->no_hp = $validatedData['no_hp'];
    $user->email = $validatedData['email'];
    $user->desa = $validatedData['desa'];
    $user->kecamatan = $validatedData['kecamatan'];
    $user->kota = $validatedData['kota'];
    $user->provinsi = $validatedData['provinsi'];
    $user->sd = $validatedData['sd'];
    $user->smp = $validatedData['smp'];
    $user->sma = $validatedData['sma'];
    $user->s1 = $validatedData['s1'];
    $user->s2 = $validatedData['s2'];
    $user->s3 = $validatedData['s3'];
    $user->bio = $validatedData['bio'];

    // Jika ada password yang diubah, enkripsi password dan simpan
    if ($request->filled('password')) {
        $user->password = Hash::make($validatedData['password']);
    }

    $path = null;
    if ($request->hasFile('profil_image')) {
        $path = $request->file('profil_image')->store('profil_images', 'public');
        $user->profil_image=$path;
    }
   

    // Simpan perubahan
    $user->save();

    // Redirect ke halaman profil dengan pesan sukses
    return redirect('/profile')->with('success', 'Profil berhasil diperbarui');
}

}
