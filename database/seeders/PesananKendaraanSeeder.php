<?php

namespace Database\Seeders;

use App\Models\PesananKendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // PesananKendaraan::factory(6)->create();

        PesananKendaraan::create([
            'status_pesanan' => 'Menunggu Dokumen',
            'status_dokumen' => false,
            'waktu_mulai' => '2021-05-01 08:00:00',
            'waktu_selesai' => '2021-05-01 10:00:00',
            'Kendaraan_id_kendaraan' => 1,
            'Akun_id_akun' => 1,
        ]);

        PesananKendaraan::create([
            'status_pesanan' => 'Menunggu Dokumen',
            'status_dokumen' => true,
            'waktu_mulai' => '2021-10-23 10:00:00',
            'waktu_selesai' => '2021-10-23 15:00:00',
            'Kendaraan_id_kendaraan' => 2,
            'Akun_id_akun' => 1,
        ]);

        PesananKendaraan::create([
            'status_pesanan' => 'Menunggu Dokumen',
            'status_dokumen' => false,
            'waktu_mulai' => '2022-03-27 10:30:00',
            'waktu_selesai' => '2022-03-27 16:30:00',
            'Kendaraan_id_kendaraan' => 3,
            'Akun_id_akun' => 1,
        ]);

        PesananKendaraan::create([
            'status_pesanan' => 'Menunggu Dokumen',
            'status_dokumen' => true,
            'waktu_mulai' => '2022-07-27 13:30:00',
            'waktu_selesai' => '2022-07-27 16:30:00',
            'Kendaraan_id_kendaraan' => 4,
            'Akun_id_akun' => 1,
        ]);

        PesananKendaraan::create([
            'status_pesanan' => 'Menunggu Dokumen',
            'status_dokumen' => true,
            'waktu_mulai' => '2023-01-11 18:00:00',
            'waktu_selesai' => '2023-01-11 22:30:00',
            'Kendaraan_id_kendaraan' => 5,
            'Akun_id_akun' => 1,
        ]);

        PesananKendaraan::create([
            'status_pesanan' => 'Menunggu Dokumen',
            'status_dokumen' => false,
            'waktu_mulai' => '2022-05-12 08:30:00',
            'waktu_selesai' => '2022-05-12 20:00:00',
            'Kendaraan_id_kendaraan' => 6,
            'Akun_id_akun' => 1,
        ]);
    }
}
