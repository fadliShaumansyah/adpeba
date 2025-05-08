<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengecek apakah user 'super_admin' sudah ada atau belum
        if (User::where('email', 'fadlishaumansyah@gmail.com')->doesntExist()) {
            // Membuat user super admin pertama
            User::create([
                'id' => (string) Str::uuid(), // Menggunakan UUID
                'name' => 'Fadli Shaumansyah',
                'npa' => '22.0016',
                'alamat' => 'Pameutingan',
                'desa' => 'Malakasari',
                'Kecamatan' => 'Baleendah',
                'Kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'tanggal_lahir' => '1994/03/24',
                'sd' => 'SDN Rancaengang',
                'smp' => 'Mts Persis 03',
                'sma' => 'SMK Al-Marwah',
                's1' => 'STAI Yamisa',
                
                'bio' => 'I am Web Developer, I Like Design, now I work In Purwakarta',
                'no_hp' => '08996244594',
                'email' => 'Fadlishaumansyah@gmail.com',
                'password' => Hash::make('111114'), // password default, ganti dengan yang aman
                'role' => 'super_admin',   // Set role sebagai 'super_admin'
                'permissions' => json_encode(['edit_user', 'delete_user']), // Permissions default
            ]);
        }
    }
}
