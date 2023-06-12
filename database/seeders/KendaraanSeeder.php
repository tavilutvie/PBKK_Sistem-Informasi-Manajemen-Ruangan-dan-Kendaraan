<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Kendaraan::factory(10)->create();

        Kendaraan::create([
            'jenis_kendaraan' => 'Mobil',
            'nomor_plat' => 'B 1234 ABC',
            'status_operasional' => true,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'Motor',
            'nomor_plat' => 'B 1114 C',
            'status_operasional' => false,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'Bus',
            'nomor_plat' => 'B 3242 GS',
            'status_operasional' => true,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'Mobil',
            'nomor_plat' => 'L 9326 E',
            'status_operasional' => false,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'Motor',
            'nomor_plat' => 'S 3431 WW',
            'status_operasional' => false,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'Bus',
            'nomor_plat' => 'S 4432 TT',
            'status_operasional' => false,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'Truk_Box',
            'nomor_plat' => 'F 5333 NM',
            'status_operasional' => false,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'Mobil_Pickup',
            'nomor_plat' => 'J 6211 F',
            'status_operasional' => false,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'Truk_Engkel',
            'nomor_plat' => 'F 9430 RG',
            'status_operasional' => false,
        ]);
    }
}
