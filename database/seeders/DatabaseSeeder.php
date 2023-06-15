<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use App\Models\Akun;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => 'user12345',

        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',

        ]);


        $this->call([
            AkunsSeeder::class,
            KendaraanSeeder::class,
            RuanganSeeder::class,
            PesananKendaraanSeeder::class,
            PesananRuanganSeeder::class,
            JadwalSewaKendaraanSeeder::class,
            JadwalSewaRuanganSeeder::class,
        ]);


    }
}
