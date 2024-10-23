<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $siswa = User::create([
        //     'name' => 'siswa',
        //     'email' => 'siswa2@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);
        // $siswa->assignRole('Siswa');

        // $adminSuper = User::create([
        //     'name' => 'adminsuper',
        //     'email' => 'adminsuper@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);
        // $adminSuper->assignRole('Admin Super');

        $pembimbingPKL = User::create([
            'name' => 'pembimbingPKL',
            'email' => 'pembimbingpkl@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $pembimbingPKL->assignRole('Pembimbing PKL');
    }
}
