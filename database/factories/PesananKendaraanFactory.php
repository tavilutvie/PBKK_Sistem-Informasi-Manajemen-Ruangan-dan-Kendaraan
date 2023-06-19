<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PesananKendaraan>
 */
class PesananKendaraanFactory extends Factory
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
            'status_pesanan' => array_rand(["Menunggu Dokumen", "Disetujui", "Ditolak"]),
            'status_dokumen' => $this->faker->boolean(),
            'waktu_mulai' => $this->faker->dateTime(),
            'waktu_selesai' => $this->faker->dateTime(),
            'dokumen_peminjaman' => $this->faker->word(),

            'Kendaraan_id_kendaraan' => random_int(1,6),
            'Akun_id_akun' => 1,
        ];
    }
}
