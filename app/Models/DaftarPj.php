<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarPj extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pj', 
        'alamat_pj', 
        'ketua_pj', 
        'sk_ketua_pj', 
        'periode_awal', 
        'periode_akhir', 
        'kontak_ketua_pj'];
}

