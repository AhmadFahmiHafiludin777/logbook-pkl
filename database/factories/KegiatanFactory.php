<?php

namespace Database\Factories;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kegiatan>
 */
class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'deskripsi' => fake()->paragraph(),

            'jadwal_id' => Jadwal::inRandomOrder()->first()->id,

            'user_id' => User::inRandomOrder()->first()->id,

            'status' => fake()->randomElement(['sudah', 'belum'])

            //
        ];
    }
}
