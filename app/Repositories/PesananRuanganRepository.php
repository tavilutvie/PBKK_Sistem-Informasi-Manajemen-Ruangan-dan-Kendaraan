<?php

namespace App\Repositories;

use App\Models\PesananRuangan;

class PesananRuanganRepository
{
    public function __construct(
        private PesananRuangan $pesanan_ruangan
    ) {}

    /**
     * Create new Order Ruangan
     */
    public function create(array $new)
    {
        $pesanan_ruangan = new PesananRuangan();
        $pesanan_ruangan->status_dokumen = $new['status_dokumen'];
        $pesanan_ruangan->status_pesanan = $new['status_pesanan'];
        $pesanan_ruangan->waktu_mulai = $new['waktu_mulai'];
        $pesanan_ruangan->waktu_selesai = $new['waktu_selesai'];
        $pesanan_ruangan->dokumen_peminjaman = $new['dokumen_peminjaman'];
        $pesanan_ruangan->Akun_id_akun = $new['Akun_id_akun'];
        $pesanan_ruangan->Ruangan_id_ruangan = $new['Ruangan_id_ruangan'];
        $pesanan_ruangan->save();

        return $pesanan_ruangan;
    }

    /**
     * Get All Order Ruangan
     */
    public function getAll()
    {
        return PesananRuangan::all();
    }

    /**
     * Get Order Ruangan by id
     */
    public function get(int $id)
    {
        return PesananRuangan::where('id_pesanan_ruangan', $id)->get();
    }

    /**
     * Get Order Ruangan by akun id
     */
    public function getByIdAkun(int $id_akun)
    {
        return PesananRuangan::where('Akun_id_akun', $id_akun)->get();
    }

    /**
     * Get Order Ruangan by Ruangan_id_ruangan
     */
    public function getByIdRuangan(int $id_ruangan)
    {
        return PesananRuangan::where('Ruangan_id_ruangan', $id_ruangan)->get();
    }

    /**
     * Get Order Ruangan by User_id_user
     */
    public function getByIdUser(int $id_user)
    {
        return PesananRuangan::where('User_id_user', $id_user)->get();
    }

    /**
     * Update Order Ruangan Row
     */
    public function update(array $update)
    {
        $pesanan_ruangan = PesananRuangan::where('id_pesanan_ruangan', $update['id_pesanan_ruangan']);

        if(!$pesanan_ruangan) {
            return null;
        }

        foreach($update as $key => $value) {
            $pesanan_ruangan->update([$key => $value]);
        }

        return $pesanan_ruangan;
    }


}
