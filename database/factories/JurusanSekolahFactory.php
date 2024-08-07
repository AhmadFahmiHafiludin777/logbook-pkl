<?php

namespace Database\Factories;

use App\Models\Jurusan;
use App\Models\Sekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JurusanSekolah>
 */
class JurusanSekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

           'sekolah_id' => Sekolah::inRandomOrder()->first()->id,

           'jurusan_id' => Jurusan::inRandomOrder()->first()->id
            //
        ];
    }
}
