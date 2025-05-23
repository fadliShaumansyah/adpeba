<?php

namespace App\Http\Controllers;

use App\Models\DaftarPj;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Anggota;

class DaftarPjController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pjs = DaftarPj::orderByRaw('CAST(SUBSTRING(kode_pj, 3) AS UNSIGNED) ASC')->get();
        return view('daftarpj.list_pj', compact('pjs'));
   
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua anggota beserta user-nya (relasi)
    $anggota = Anggota::with('user')->get();

    return view('dashboard.inputpj', compact('anggota'));
    }

 public function getKontakUser($id)
{
    $anggota = Anggota::with('user')->find($id);

    if (!$anggota || !$anggota->user) {
        return response()->json([
            'success' => false,
            'error' => 'Data tidak ditemukan',
            'no_hp' => null
        ], 404);
    }

    return response()->json([
        'success' => true,
        'no_hp' => $anggota->user->no_hp
    ]);
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pj' => 'required|string|max:255',
            'kode_pj' => 'required|string|max:255',
            'alamat_pj' => 'required|string',
            'ketua_pj' => 'required|string|max:255',
            'sk_ketua_pj' => 'required|string|max:255',
            'periode_awal' => 'required|date',
            'periode_akhir' => 'required|date|after_or_equal:periode awal',
            'kontak_ketua_pj' => 'required',
        ]);

       

        DaftarPj::create($validatedData);
        return redirect('/list_pj')->with('success','Data berhasil ditambahkan');
    }
 

    /**
     * Display the specified resource.
     */
    public function show(DaftarPj $daftarPj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarPj $daftarPj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarPj $daftarPj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarPj $daftarPj)
    {
        //
    }
}
