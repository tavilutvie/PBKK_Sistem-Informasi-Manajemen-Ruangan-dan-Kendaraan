<?php

namespace App\Repositories;

use App\Models\Akuns;

class AkunRepository
{
    /**
     * Create new Akuns
     */
    public function create(int $user_id, array $new)
    {
        $akun = new Akuns();
        $akun->user_id = $user_id;
        $akun->nama_belakang = $new['nama_belakang'];
        $akun->nama_depan = $new['nama_depan'];
        $akun->nomor_telepon = $new['nomor_telepon'];
        $akun->nip = $new['nip'];
        $akun->jabatan = $new['jabatan'];
        $akun->foto_tanda_pengenal = $new['foto_tanda_pengenal'];
        $akun->save();

        return $akun;
    }

    /**
     * Get All Akuns
     */
    public function getAll()
    {
        return Akuns::all();
    }

    /**
     * Get Akuns by ID
     */
    public function getById(int $id)
    {
        return Akuns::where('id_akun', $id)->first();
    }

    /**
     * Update Akun by username
     */
    public function update(string $username, string $nama_kolom, string $update)
    {
        $akun = Akuns::where('username', $username)->first();

        if(!$akun) {
            return null;
        }

        $akun->$nama_kolom = $update;
        $akun->save();

        return $akun;
    }

    /**
     * Update Akuns row
     */
    public function updateRow(string $username, array $update)
    {
        $akun = Akuns::where('username', $username)->first();

        if(!$akun) {
            return null;
        }

        $akun->update($update);

        return $akun;
    }

    /**
     * Delete Akun by username
     */
    public function delete(string $username)
    {
        $akun = Akuns::where('username', $username)->first();

        if(!$akun) {
            return null;
        }

        $akun->delete();

        return $akun;
    }

    /**
     * Get Akun user join
     */
    public function getAkunUserJoin()
    {
        return Akuns::join('users', 'users.id', '=', 'akuns.user_id')
            ->select('users.*', 'akuns.*')
            ->get();
    }

    /**
     * Verify Akun
     */
    public function verify(int $id)
    {
        $akun = Akuns::where('id_akun', $id);

        if(!$akun) {
            return null;
        }

        $akun->update([
            'is_verified' => true
        ]);

        return $akun;

    }
}
