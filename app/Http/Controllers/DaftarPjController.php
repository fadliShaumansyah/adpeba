<?php

namespace App\Http\Controllers;

use App\Models\DaftarPj;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Event;

class DaftarPjController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventEnd = \Carbon\Carbon::parse('2025-05-01 23:59:59')->toIso8601String();
   
        $pjs = DaftarPj::all();
        return view('daftarpj.list_pj', compact('pjs','eventEnd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.inputpj');
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
