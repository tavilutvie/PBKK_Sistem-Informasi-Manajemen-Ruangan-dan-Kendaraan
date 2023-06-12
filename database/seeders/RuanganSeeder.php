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
            'nama_ruangan' => 'TeaterA-1',
            'jenis_ruangan' => 'teater',
            'status_operasional' => true,
            'kapasitas' => 60,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'RuangPascasarjana',
            'jenis_ruangan' => 'auditorium',
            'status_operasional' => false,
            'kapasitas' => 100,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'TeaterA',
            'jenis_ruangan' => 'teater',
            'status_operasional' => true,
            'kapasitas' => 30,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'PusatRobotika',
            'jenis_ruangan' => 'gedung',
            'status_operasional' => false,
            'kapasitas' => 30,
        ]);

        Ruangan::create([
            'nama_ruangan' => 'TeaterB',
            'jenis_ruangan' => 'teater',
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
