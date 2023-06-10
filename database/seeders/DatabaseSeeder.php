<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AkunSeeder;

use App\Models\Akun;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     AkunSeeder::class,
        // ]);
        Akun::create([
            'nama_belakang' => 'lutvie',
            'nama_depan' => 'tavirazin',
            'username' => 'tavirazin',
            'email' => 'tavirazin@gmail.com',
            'password' => '12345678',
            'nomor_telepon' => '081234567890',
            'nip' => '1234567890',
            'jabatan' => 'mahasiswa',
            'foto_tanda_pengenal' => 'foto_tanda_pengenal'
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
