<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use App\Models\jurusan;
use App\Models\Jurusan as ModelsJurusan;
use App\Models\JurusanSekolah;
use App\Models\Sekolah;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)->create();
        Sekolah::factory(20)->create();
        Jurusan::factory(20)->create();
        JurusanSekolah::factory(20)->create();
        // Angkatan::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // jurusan ::create([
        //     'kode' => 'RPL',
        //     'nama' => 'Rekayasa Perangkat Lunak'
        // ]);
    }
}
