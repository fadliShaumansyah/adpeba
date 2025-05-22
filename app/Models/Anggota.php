<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';

    protected $fillable = [
        'user_id', 'npa', 'asal_pj',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'npa', 'npa');
    }
}
