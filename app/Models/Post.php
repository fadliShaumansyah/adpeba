<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'image',
        'user_id',
    ];



    protected function image():Attribute
    {
        return Attribute::make (
            get: fn($image)=> $image ? url('/storage/'.$image): null,
        );
    }
     //relasi ke user
     public function user(){
        return $this->belongsTo(User::class);
    }
    //relasi ke komentar
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    //relasi ke like
    public function likes(){
        return $this->hasMany(Like::class);
    }
    
}

