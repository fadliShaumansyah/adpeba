<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DaftarPj extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id_pj';  
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama_pj', 
        'alamat_pj', 
        'kode_pj',
        'ketua_pj', 
        'sk_ketua_pj', 
        'periode_awal', 
        'periode_akhir', 
        'kontak_ketua_pj'];
}

