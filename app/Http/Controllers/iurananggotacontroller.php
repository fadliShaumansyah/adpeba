<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class iurananggotacontroller extends Controller
{
    public function index()
    {
        $iuran = IuranAnggota::with(['user', 'daftarpj'])->get();

        return response()->json($iuran);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'daftarpj_id' => 'required|exists:daftarpj,id',
            'tahun' => 'required|integer',
            'bulan' => 'required|integer|min:1|max:12',
        ]);

        if (IuranAnggota::cekSudahBayar($request->user_id, $request->tahun, $request->bulan)) {
            return response()->json(['message' => 'User sudah membayar untuk bulan ini'], 400);
        }

        $iuran = IuranAnggota::create([
            'user_id' => $request->user_id,
            'daftarpj_id' => $request->daftarpj_id,
            'jumlah' => 20000,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'keterangan' => $request->keterangan
        ]);

        return response()->json($iuran, 201);
    }
}
