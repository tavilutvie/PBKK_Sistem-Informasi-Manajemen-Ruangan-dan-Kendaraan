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
            'nama_ruangan' => 'Lab Pemrograman 1',
            'jenis_ruangan' => 'lab',
            'status_operasional' => true,
            'kapasitas' => 60,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Aula Handayani',
            'jenis_ruangan' => 'auditorium',
            'status_operasional' => false,
            'kapasitas' => 100,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Kelas 101',
            'jenis_ruangan' => 'kelas',
            'status_operasional' => true,
            'kapasitas' => 30,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Kelas 102',
            'jenis_ruangan' => 'kelas',
            'status_operasional' => false,
            'kapasitas' => 30,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Lapangan Tennis',
            'jenis_ruangan' => 'kelas',
            'status_operasional' => true,
            'kapasitas' => 50,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'Lapangan Basket',
            'jenis_ruangan' => 'lapangan',
            'status_operasional' => false,
            'kapasitas' => 50,
        ]);

    }
}
