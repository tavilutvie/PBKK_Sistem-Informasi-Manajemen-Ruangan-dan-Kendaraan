<?php

namespace App\Repositories;

use App\Models\Ruangan;

class RuanganRepository
{
    /**
     * Create new Ruangan
     */
    public function create(array $new)
    {
        $ruangan = new Ruangan();
        $ruangan->nama_ruangan = $new['nama_ruangan'];
        $ruangan->jenis_ruangan = $new['jenis_ruangan'];
        $ruangan->status_operasional = $new['status_operasional'];
        $ruangan->kapasitas = $new['kapasitas'];
        $ruangan->save();

        return $ruangan;
    }

    /**
     * Get All Ruangans
     */
    public function getAll()
    {
        return Ruangan::all();
    }

    /**
     * Get Ruangans by id
     */
    public function getbyID(int $id)
    {
        return Ruangan::where('id_ruangan', $id)->first();
    }

    /**
     * Update Ruangan by id
     */
    public function update(int $id, string $nama_kolom, string $update)
    {
        $ruangan = Ruangan::where('id_ruangan', $id)->first();

        if(!$ruangan) {
            return null;
        }

        $ruangan->$nama_kolom = $update;
        $ruangan->save();

        return $ruangan;
    }

    /**
     * Update Ruangans row
     */
    public function updateRow(int $id, array $update)
    {
        $ruangan = Ruangan::where('id_ruangan', $id)->first();

        if(!$ruangan) {
            return null;
        }

        $ruangan->nama_ruangan = $update['nama_ruangan'];
        $ruangan->jenis_ruangan = $update['jenis_ruangan'];
        $ruangan->status_operasional = $update['status_operasional'];
        $ruangan->kapasitas = $update['kapasitas'];
        $ruangan->save();

        return $ruangan;
    }

    /**
     * Delete Ruangan by id
     */
    public function delete(int $id)
    {
        $ruangan = Ruangan::where('id_ruangan', $id)->first();

        if(!$ruangan) {
            return null;
        }

        $ruangan->delete();

        return $ruangan;
    }
}
