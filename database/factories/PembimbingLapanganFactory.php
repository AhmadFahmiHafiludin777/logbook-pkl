<?php

namespace Database\Factories;

use App\Models\AngkatanJurusanSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PembimbingLapangan>
 */
class PembimbingLapanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'nama' => fake()->name(20),

            'angkatan_jurusan_sekolah_id' => AngkatanJurusanSekolah::all()->random()->id,
            
            'no_telp' => fake()->phoneNumber()
        ];
    }
}
