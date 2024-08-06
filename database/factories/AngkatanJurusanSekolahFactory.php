<?php

namespace Database\Factories;

use App\Models\Angkatan;
use App\Models\JurusanSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AngkatanJurusanSekolah>
 */
class AngkatanJurusanSekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'jurusan_sekolah_id' => JurusanSekolah::all()->random()->id,

           'angkatan_id' => Angkatan::all()->random()->id
            //
        ];
    }
}
