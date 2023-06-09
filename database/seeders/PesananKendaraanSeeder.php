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
        PesananKendaraan::factory(10)->create();
    }
}
