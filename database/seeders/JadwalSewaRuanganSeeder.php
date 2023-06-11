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
        JadwalSewaRuangan::factory(10)->create();
    }
}
