<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sekolah>
 */
class SekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $jenis = $this->faker->randomElement(['SMKN', 'SMK']);
        $nomor = $this->faker->numberBetween(1, 10);
        $kota = $this->faker->city();
        $nama = "{$jenis} {$nomor} {$kota}";
        $email = 'info@' . strtolower(str_replace(' ', '', $nama)) . '.sch.id';

        return [
            'nama' => "{$jenis} {$nomor} {$kota}",
            'email' => $email,
            'no_telp' => fake()->phoneNumber(),
            'alamat' => fake()->address()
            //
        ];
    }
}
