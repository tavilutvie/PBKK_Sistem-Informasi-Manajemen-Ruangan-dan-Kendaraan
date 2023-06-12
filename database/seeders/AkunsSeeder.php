<?php

namespace Database\Seeders;

use App\Models\Akuns;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Akuns::create([
            'nama_depan' => 'admin',
            'nama_belakang' => 'damas',
            'nomor_telepon' => '081234567890',
            'nip' => '5012345678',
            'jabatan' => 'mahasiswa',
            'foto_tanda_pengenal' => 'foto.jpg',
            'user_id' => 1,
        ]);
    }
}
