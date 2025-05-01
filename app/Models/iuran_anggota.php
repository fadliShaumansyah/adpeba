<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class iuran_anggota extends Model
{
    use HasFactory;
    protected $table = 'iuran_anggota';
    
    protected $fillable = [
        'npa',
        'id_pj',
        'jumlah',
        'tahun',
        'bulan',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, ' npa');
    }

    public function daftar_pjs()
    {
        return $this->belongsTo(daftar_pjs::class, 'id_pj');
    }

    public static function ceksudahbayar($user, $tahun, $bulan)
    {
        return self::where('npa',$userId)
        ->where('tahun',$tahun)
        ->where('bulan',$bulan)
        ->exists();
    }
}
