<?php

namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepository
{
    /**
     * Create new Kendaraan
     */
    public function create(array $new)
    {
        $kendaraan = new Kendaraan();
        $kendaraan->jenis_kendaraan = $new['jenis_kendaraan'];
        $kendaraan->nomor_plat = $new['nomor_plat'];
        $kendaraan->status_operasional = $new['status_operasional'];
        $kendaraan->save();

        return $kendaraan;
    }

    /**
     * Get All Kendaraans
     */
    public function getAll()
    {
        return Kendaraan::all();
    }

    /**
     * Get Kendaraans by id
     */
    public function getbyID(int $id)
    {
        return Kendaraan::where('id_kendaraan', $id)->first();
    }

    /**
     * Update Kendaraan by id
     */
    public function update(int $id, string $nama_kolom, string $update)
    {
        $kendaraan = Kendaraan::where('id_kendaraan', $id)->first();

        if(!$kendaraan) {
            return null;
        }

        $kendaraan->$nama_kolom = $update;
        $kendaraan->save();

        return $kendaraan;
    }

    /**
     * Get Kendaraan id by type
     */
    public function getIdByType(string $jenis_kendaraan) {
        $kendaraan_data = Kendaraan::where('jenis_kendaraan', $jenis_kendaraan)->first();
        return $kendaraan_data->id_kendaraan;
    }

    /**
     * Update Kendaraans row
     */
    public function updateRow(int $id, array $update)
    {
        $kendaraan = Kendaraan::where('id_kendaraan', $id)->first();

        if(!$kendaraan) {
            return null;
        }

        $kendaraan->jenis_kendaraan = $update['jenis_kendaraan'];
        $kendaraan->nomor_plat = $update['nomor_plat'];
        $kendaraan->status_operasional = $update['status_operasional'];
        $kendaraan->save();

        return $kendaraan;
    }

    /**
     * Delete Kendaraan by id
     */
    public function delete(int $id)
    {
        $kendaraan = Kendaraan::where('id_kendaraan', $id)->first();

        if(!$kendaraan) {
            return null;
        }

        $kendaraan->delete();

        return $kendaraan;
    }
}
