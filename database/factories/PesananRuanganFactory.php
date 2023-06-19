<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PesananRuangan>
 */
class PesananRuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //status pesanan varchar, status dokumen bool, waktu mulai, datetime, waktu selesai datetime
            'status_pesanan' => array_rand(["Menunggu Dokumen", "Disetujui", "Ditolak"]),
            'status_dokumen' => $this->faker->boolean(),
            'waktu_mulai' => $this->faker->dateTime(),
            'waktu_selesai' => $this->faker->dateTime(),
            'dokumen_peminjaman' => $this->faker->word(),

            'Ruangan_id_ruangan' => random_int(1,6),
            'Akun_id_akun' => 1,
        ];
    }
}
