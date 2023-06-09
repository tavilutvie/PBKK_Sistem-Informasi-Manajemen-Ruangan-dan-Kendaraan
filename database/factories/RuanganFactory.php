<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruangan>
 */
class RuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //jenis ruangan
            //nama ruangan string
            'nama_ruangan' => $this->faker->name(),
            'jenis_ruangan' => array_rand(["kelas", "auditorium", "lab", "lainnya"]),
            'status_operasional' => $this->faker->boolean(),
            //kuota ruangan
            'kapasitas' => random_int(0,200),
            // 'kapasitas' => $this->faker->numberBetween(1, 100),
            // 'lokasi' => $this->faker->address(),
            // 'deskripsi' => $this->faker->text(),
            // 'foto_ruangan' => $this->faker->imageUrl()
        ];
    }
}
