<?php

namespace App\Repositories;

use App\Models\PesananKendaraan;

class PesananKendaraanRepository
{
    public function __construct(
        private PesananKendaraan $pesanan_kendaraan
    ) {}


    /**
     * Create new Order Kendaraan
     */
    public function create(array $new)
    {
        $pesanan_kendaraan = new PesananKendaraan();
        $pesanan_kendaraan->status_pesanan = $new['status_pesanan'];
        $pesanan_kendaraan->status_dokumen = $new['status_dokumen'];
        $pesanan_kendaraan->waktu_mulai = $new['waktu_mulai'];
        $pesanan_kendaraan->waktu_selesai = $new['waktu_selesai'];
        $pesanan_kendaraan->save();

        return $pesanan_kendaraan;
    }

    /**
     * Get All Order Kendaraan
     */
    public function getAll()
    {
        return PesananKendaraan::all();
    }

    /**
     * Get Order Kendaraan by id
     */
    public function get(int $id)
    {
        return PesananKendaraan::where('id_pesanan_kendaraan', $id)->first();
    }

    /**
     * Get Order Kendaraan by Kendaraan_id_kendaraan
     */
    public function getByIdKendaraan(int $id_kendaraan)
    {
        return PesananKendaraan::where('Kendaraan_id_kendaraan', $id_kendaraan)->get();
    }

    /**
     * Get Order Kendaraan by User_id_user
     */
    public function getByIdUser(int $id_user)
    {
        return PesananKendaraan::where('User_id_user', $id_user)->get();
    }


    /**
     * Update Order Kendaraan by id
     */
    public function update(array $update)
    {
        $pesanan_kendaraan = PesananKendaraan::where('id_pesanan_kendaraan', $update['id_pesanan_kendaraan']);

        if(!$pesanan_kendaraan) {
            return null;
        }

        foreach($update as $key => $value) {
            $pesanan_kendaraan->update([$key => $value]);
        }

        return $pesanan_kendaraan;
    }

    /**
     * Delete Order Kendaraan by id
     */
    public function delete(int $id)
    {
        $pesanan_kendaraan = PesananKendaraan::where('id_pesanan_kendaraan', $id)->first();

        if(!$pesanan_kendaraan) {
            return null;
        }

        $pesanan_kendaraan->delete();

        return $pesanan_kendaraan;
    }
}
