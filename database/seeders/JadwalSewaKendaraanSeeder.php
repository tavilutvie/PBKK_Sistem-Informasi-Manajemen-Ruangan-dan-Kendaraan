<?php

namespace Database\Seeders;

use App\Models\JadwalSewaKendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSewaKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // JadwalSewaKendaraan::factory(10)->create();

        JadwalSewaKendaraan::create([
            'tanggal_pesanan' => '2022-06-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Kendaraan_id_kendaraan' => '1'
        ]);

        JadwalSewaKendaraan::create([
            'tanggal_pesanan' => '2022-11-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Kendaraan_id_kendaraan' => '2'
        ]);

        JadwalSewaKendaraan::create([
            'tanggal_pesanan' => '2023-01-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Kendaraan_id_kendaraan' => '3'
        ]);

        JadwalSewaKendaraan::create([
            'tanggal_pesanan' => '2023-03-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Kendaraan_id_kendaraan' => '4'
        ]);

        JadwalSewaKendaraan::create([
            'tanggal_pesanan' => '2023-11-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Kendaraan_id_kendaraan' => '5'
        ]);
    }
}
