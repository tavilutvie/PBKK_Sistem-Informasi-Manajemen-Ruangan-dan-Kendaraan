<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalSewaKendaraan>
 */
class JadwalSewaKendaraanFactory extends Factory
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
            'tanggal_pesanan' => $this->faker->date(),
            'waktu_mulai' => $this->faker->time(),
            'waktu_selesai' => $this->faker->time(),

            'Kendaraan_id_kendaraan' => random_int(1,6),
        ];
    }
}
