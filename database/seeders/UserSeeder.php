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

        $adminSuper = User::create([
            'name' => 'adminsuper1',
            'email' => 'adminsuper1@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $adminSuper->assignRole('super-admin');

        $pembimbingPKL = User::create([
            'name' => 'pembimbingPKL',
            'email' => 'pembimbingpkl@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $pembimbingPKL->assignRole('pembimbing-pkl');
    }
}
