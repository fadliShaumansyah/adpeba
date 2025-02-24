<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\DaftarPj;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        DaftarPj::create([
            'nama pj'=>'Pameutingan',
            'alamat pj'=>'Baleendah',
            'ketua pj'=>'fadli shaumansyah',
            'sk ketua pj'=> '12mk20234',
            'periode awal'=> '2023-12-12',
            'periode akhir'=> '2025-12-12',
            'kontak ketua pj'=> '08996244594'
        ]);
    }
}
