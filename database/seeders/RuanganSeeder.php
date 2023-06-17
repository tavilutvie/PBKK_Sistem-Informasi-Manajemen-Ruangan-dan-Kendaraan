<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Ruangan::factory(10)->create();

        Ruangan::create([
            'nama_ruangan' => 'Teater_A-1',
            'jenis_ruangan' => 'teater',
            'status_operasional' => true,
            'kapasitas' => 60,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Ruang_Pascasarjana',
            'jenis_ruangan' => 'auditorium',
            'status_operasional' => false,
            'kapasitas' => 100,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Teater_A',
            'jenis_ruangan' => 'teater',
            'status_operasional' => true,
            'kapasitas' => 30,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Pusat_Robotika',
            'jenis_ruangan' => 'gedung',
            'status_operasional' => false,
            'kapasitas' => 30,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Teater_B',
            'jenis_ruangan' => 'teater',
            'status_operasional' => true,
            'kapasitas' => 50,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Teater_C',
            'jenis_ruangan' => 'teater',
            'status_operasional' => false,
            'kapasitas' => 50,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Lapangan_Taman_Alumni',
            'jenis_ruangan' => 'labangan',
            'status_operasional' => false,
            'kapasitas' => 2000,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Lapangan_Perpustakaan',
            'jenis_ruangan' => 'labangan',
            'status_operasional' => false,
            'kapasitas' => 1000,
        ]);

    }
}
