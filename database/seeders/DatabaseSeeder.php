<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use App\Models\AngkatanJurusanSekolah;
use App\Models\Jadwal;
use App\Models\jurusan;
use App\Models\Jurusan as ModelsJurusan;
use App\Models\JurusanSekolah;
use App\Models\Kegiatan;
use App\Models\PembimbingLapangan;
use App\Models\PembimbingSekolah;
use App\Models\Sekolah;
use App\Models\Siswa;
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
        User::factory(100)->create();
        Sekolah::factory(50)->create();
        Jurusan::factory(5)->create();
        JurusanSekolah::factory(20)->create();
        Angkatan::factory(14)->create();
        AngkatanJurusanSekolah::factory(20)->create();
        PembimbingLapangan::factory(30)->create();
        PembimbingSekolah::factory(40)->create();
        Siswa::factory(100)->create();
        Jadwal::factory(50)->create();
        Kegiatan::factory(100)->create();


        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@example.com',
        ]);

        Siswa::factory()->create([
            'nama' => 'Test Siswa',
            'email' => 'test@kkkj.com',
        ]);

        PembimbingSekolah::factory()->create([
            'nama' => 'ahmad fahmi hafiludin',
        ]);
        PembimbingSekolah::factory()->create([
            'nama' => 'farrel_raditya_marset',
        ],);

        
        $this->call([
            RolePermissionSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
        ]);
        // jurusan ::create([
        //     'kode' => 'RPL',
        //     'nama' => 'Rekayasa Perangkat Lunak'
        // ]);
    }
}
