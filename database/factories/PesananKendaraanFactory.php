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
            'status_pesanan' => array_rand(["menunggu", "disetujui", "ditolak"]),
            'status_dokumen' => $this->faker->boolean(),
            'waktu_mulai_pesan' => $this->faker->dateTime(),
            'waktu_selesai_pesan' => $this->faker->dateTime(),

            'Kendaraan_id_kendaraan' => random_int(1,10),
            'Akun_id_akun' => random_int(1,10),
        ];
    }
}
