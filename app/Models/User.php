<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids;

    protected $primaryKey = 'id'; // Pastikan primaryKey adalah 'id'
    public $incrementing = false; // Karena UUID tidak auto-increment
    protected $keyType = 'string'; // Karena UUID adalah tipe string
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'profil_image',
        'npa',
        'alamat',
        'desa',
        'kecamatan',
        'kota',
        'provinsi',
        'tanggal_lahir',
        'sd',
        'smp',
        'sma',
        's1',
        's2', 
        's3',
        'bio',
        'no_hp',
        'email',
        'password',
        'role',         
        'permissions',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function image():Attribute
    {
        return Attribute::make (
            get: fn($profil_image)=> $profil_image ? url('/storage/users'.$profil_image): null,
        );
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'permissions' => 'array',
        ];
    }

    public function hasPermission($permission): bool
    {
        $permissions = $this->permissions ?? [];

        return in_array($permission, $permissions);
    }

       //relasi ke post
       public function posts(){
        return $this->hasMany(Post::class);
    }
    //relasi ke komentar
    public function comments(){
        return $this-hasMany(Comment::class);
    }
    //relasi ke like
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
