<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kendaraan>
 */
class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'jenis_kendaraan' => array_rand(["mobil", "motor", "sepeda", "lainnya"]),
            // //nomor plat complex
            // 'nomor_plat' => $this->faker->unique()->regexify('[A-Z]{1,3}[0-9]{1,4}[A-Z]{1,3}'),
            // 'status_operasional' => $this->faker->boolean(),
        ];
    }
}
