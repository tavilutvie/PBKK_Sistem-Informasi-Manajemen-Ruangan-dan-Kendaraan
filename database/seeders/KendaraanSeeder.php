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
            'jenis_kendaraan' => 'mobil',
            'nomor_plat' => 'B 1234 ABC',
            'status_operasional' => true,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'motor',
            'nomor_plat' => 'B 1114 C',
            'status_operasional' => false,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'bus',
            'nomor_plat' => 'B 3242 GS',
            'status_operasional' => true,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'mobil',
            'nomor_plat' => 'L 9326 E',
            'status_operasional' => false,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'motor',
            'nomor_plat' => 'S 3431 WW',
            'status_operasional' => false,
        ]);

        Kendaraan::create([
            'jenis_kendaraan' => 'bus',
            'nomor_plat' => 'B 3662 TT',
            'status_operasional' => false,
        ]);
    }
}
