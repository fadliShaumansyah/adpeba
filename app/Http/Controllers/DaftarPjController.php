<?php

namespace App\Http\Controllers;

use App\Models\DaftarPj;
use Illuminate\Http\Request;

class DaftarPjController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pjs = DaftarPj::all();
        return view('daftarpj.index', compact('pjs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pj' => 'required|string|max:255',
            'alamat_pj' => 'required|string',
            'ketua_pj' => 'required|string|max:255',
            'sk_ketua_pj' => 'required|string|max:255',
            'periode_awal' => 'required|date',
            'periode_akhir' => 'required|date|after_or_equal:periode awal',
            'kontak_ketua_pj' => 'required',
        ]);

       

        DaftarPj::create($validatedData);
        return redirect('/daftarpj')->with('success','Data berhasil ditambahkan');
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
