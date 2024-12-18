<?php

namespace Database\Factories;

use App\Models\AngkatanJurusanSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PembimbingSekolah>
 */
class PembimbingSekolahFactory extends Factory
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

            'no_telp' => fake()->phoneNumber()
            //
        ];
    }
}
