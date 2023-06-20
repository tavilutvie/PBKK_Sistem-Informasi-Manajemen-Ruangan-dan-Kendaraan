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
        $status = $this->faker->boolean();
        return [
            'status_dokumen' => $status,
            'status_pesanan' => $status == 0 ? "Menunggu Dokumen" : array_rand(["Pengecekan Dokumen", "Disetujui", "Ditolak"]),
            'waktu_mulai' => $this->faker->dateTime(),
            'waktu_selesai' => $this->faker->dateTime(),
            'dokumen_peminjaman' => $this->faker->word(),

            'Ruangan_id_ruangan' => random_int(1,6),
            'Akun_id_akun' => 1,
        ];
    }
}
