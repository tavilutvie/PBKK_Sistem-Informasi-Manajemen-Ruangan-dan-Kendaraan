<?php

namespace Database\Seeders;

use App\Models\JadwalSewaRuangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSewaRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // JadwalSewaRuangan::factory(10)->create();

        JadwalSewaRuangan::create([
            'tanggal_pesanan' => '2022-06-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Ruangan_id_ruangan' => '1'
        ]);

        JadwalSewaRuangan::create([
            'tanggal_pesanan' => '2022-11-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Ruangan_id_ruangan' => '2'
        ]);

        JadwalSewaRuangan::create([
            'tanggal_pesanan' => '2023-01-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Ruangan_id_ruangan' => '3'
        ]);

        JadwalSewaRuangan::create([
            'tanggal_pesanan' => '2023-03-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Ruangan_id_ruangan' => '4'
        ]);

        JadwalSewaRuangan::create([
            'tanggal_pesanan' => '2023-11-02',
            'waktu_mulai' => '04:00:00',
            'waktu_selesai' => '07:30:00',
            'Ruangan_id_ruangan' => '5'
        ]);
    }
}
