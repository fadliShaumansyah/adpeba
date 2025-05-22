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
    return view('dashboard.index', compact('totalAnggota'));
}

//method persetujuan menjadi anggota
public function approveNpa(User $user)
{
    if ($user->npa_pending) {
        $user->npa = $user->npa_pending;
        $user->npa_pending = null;
        $user->npa_approved = true;
        $user->save();

        return redirect()->route('admin.npa.approval')->with('success', 'NPA berhasil disetujui.');
    }

    return redirect()->route('anggota.npapending')->with('error', 'Tidak ada NPA yang perlu disetujui.');
}
//method view persetujuan anggota untuk admin
public function showNpaApproval()
{
    // Ambil user yang punya npa_pending
    $users = User::whereNotNull('npa_pending')->get();

    return view('anggota.npapending', compact('users'));
}
}
