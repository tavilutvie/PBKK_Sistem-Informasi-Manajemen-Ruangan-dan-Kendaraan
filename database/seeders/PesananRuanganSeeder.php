<?php

namespace Database\Seeders;

use App\Models\PesananRuangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PesananRuangan::factory(10)->create();
    }
}
