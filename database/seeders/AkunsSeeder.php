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
            'nama_depan' => 'user1',
            'nama_belakang' => 'tod',
            'nomor_telepon' => '081232266890',
            'nip' => '5012324678',
            'jabatan' => 'mahasiswa',
            'foto_tanda_pengenal' => 'foto.jpg',
            'user_id' => 1,
        ]);

        Akuns::create([
            'nama_depan' => 'user2',
            'nama_belakang' => 'nathan',
            'nomor_telepon' => '081232265890',
            'nip' => '5012321678',
            'jabatan' => 'mahasiswa',
            'foto_tanda_pengenal' => 'foto.jpg',
            'user_id' => 2,
        ]);

        Akuns::create([
            'is_admin' => true,
            'is_verified' => true,
            'nama_depan' => 'admin1',
            'nama_belakang' => 'somad',
            'nomor_telepon' => '081234564890',
            'nip' => '5012345678',
            'jabatan' => 'mahasiswa',
            'foto_tanda_pengenal' => 'foto.jpg',
            'user_id' => 3,
        ]);

        Akuns::create([
            'is_admin' => true,
            'is_verified' => true,
            'nama_depan' => 'admin2',
            'nama_belakang' => 'pat',
            'nomor_telepon' => '081234563890',
            'nip' => '5012345622',
            'jabatan' => 'mahasiswa',
            'foto_tanda_pengenal' => 'foto.jpg',
            'user_id' => 4,
        ]);

        Akuns::create([
            'is_admin' => true,
            'is_verified' => true,
            'nama_depan' => 'admin3',
            'nama_belakang' => 'ngit',
            'nomor_telepon' => '081234562890',
            'nip' => '5012345633',
            'jabatan' => 'mahasiswa',
            'foto_tanda_pengenal' => 'foto.jpg',
            'user_id' => 5,
        ]);

        Akuns::create([
            'is_admin' => true,
            'is_verified' => true,
            'nama_depan' => 'el',
            'nama_belakang' => 'tavi',
            'nomor_telepon' => '081234561890',
            'nip' => '5012345644',
            'jabatan' => 'dosen',
            'foto_tanda_pengenal' => 'foto.jpg',
            'user_id' => 6,
        ]);
    }
}
