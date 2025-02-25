<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarPj;

class ApiDaftarPj extends Controller
{
    public function getDaftarpj()
    {
    $apipj = Daftarpj::all(); // Ambil semua data
    return response()->json($apipj); // Kembalikan dalam format JSON
    }

    // Menampilkan data Daftarpj berdasarkan ID
    public function show($id)
    {
        $apipj = Daftarpj::find($id);

        if (!$apipj) {
            return response()->json(['message' => 'Daftarpj not found'], 404);
        }

        return response()->json($apipj);
    }

    // Menyimpan data Daftarpj baru
    public function store(Request $request)
    {
        $request->validate([
           'nama_pj' => 'required|string|max:255',
            'alamat_pj' => 'required|string',
            'ketua_pj' => 'required|string|max:255',
            'sk_ketua_pj' => 'required|string|max:255',
            'periode_awal' => 'required|date',
            'periode_akhir' => 'required|date|after_or_equal:periode awal',
            'kontak_ketua_pj' => 'required',
        ]);

        $apipj = Daftarpj::create($request->all());

        return response()->json($apipj, 201);


    }

    // Mengupdate data Daftarpj
    public function update(Request $request, $id)
    {
        $apipj = Daftarpj::find($id);

        if (!$apipj) {
            return response()->json(['message' => 'Daftarpj not found'], 404);
        }

        $apipj->update($request->all());

        return response()->json($apirpj);
    }

    // Menghapus data Daftarpj
    public function destroy($id)
    {
        $apipj = Daftarpj::find($id);

        if (!$apipj) {
            return response()->json(['message' => 'Daftarpj not found'], 404);
        }

        $apipj->delete();

        return response()->json(['message' => 'Daftarpj deleted successfully']);
    }

}
