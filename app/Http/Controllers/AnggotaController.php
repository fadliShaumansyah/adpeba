<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;

class AnggotaController extends Controller
{
    //
    public function jumlahAnggota()
{
    $totalAnggota = Anggota::count();
    $totalUser = User::count();
    return view('dashboard.index', compact('totalAnggota','totalUser'));
}

//method persetujuan menjadi anggota
public function approveNpa(User $user)
{
    if ($user->npa_pending) {
        $user->npa = $user->npa_pending;
        $user->npa_pending = null;
        $user->npa_approved = true;
        $user->save();

        // Cek apakah sudah jadi anggota
        if (!Anggota::where('user_id', $user->id)->exists()) {
            Anggota::create([
                'user_id' => $user->id,
                'npa' => $user->npa,
                // tambahkan kolom lain sesuai kebutuhan
            ]);
        }

        return redirect()->route('admin.npa.approval')->with('success', 'NPA berhasil disetujui.');
    }

    return redirect()->route('anggota.npapending')->with('error', 'Tidak ada NPA yang perlu disetujui.');
}

//method untuk menolak anggota
public function rejectNpa(User $user)
{
    if ($user->npa_pending) {
        // Hapus nilai npa_pending dan reset status approval
        $user->npa_pending = null;
        $user->npa_approved = false;  // atau kamu bisa pakai kolom lain untuk status penolakan
        $user->save();

        return redirect()->route('admin.npa.approval')->with('success', 'NPA berhasil ditolak dan dibersihkan.');
    }

    return redirect()->route('anggota.npapending')->with('error', 'Tidak ada NPA yang perlu ditolak.');
}

//method view persetujuan anggota untuk admin
public function showNpaApproval()
{
    // Ambil user yang punya npa_pending
    $users = User::whereNotNull('npa_pending')->get();

    return view('anggota.npapending', compact('users'));
}

public function show()
{
  
}

}