<?php

namespace Database\Factories;

use App\Models\AngkatanJurusanSekolah;
use App\Models\PembimbingLapangan;
use App\Models\PembimbingSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama' => fake()->name(20),

            'angkatan_jurusan_sekolah_id' => AngkatanJurusanSekolah::all()->random()->id,

            'pembimbing_lapangan_id' => PembimbingLapangan::all()->random()->id,

            'pembimbing_sekolah_id' => PembimbingSekolah::all()->random()->id,

            'alamat' => fake()->address(),
            
            'no_telp' => fake()->phoneNumber(),

            'email' => fake()->unique()->safeEmail()
        ];
    }
}