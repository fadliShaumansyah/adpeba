<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
     //relasi ke user
     public function user(){
        return $this->belongsTo(User::class);
    }
    //relasi ke post
    public function post(){
        $this->belongsTo(Post::class);
    }
}
