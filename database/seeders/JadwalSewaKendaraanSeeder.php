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
        JadwalSewaKendaraan::factory(10)->create();
    }
}
