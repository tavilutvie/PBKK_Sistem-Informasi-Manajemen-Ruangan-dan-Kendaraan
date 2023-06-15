<?php

namespace App\Services;

use App\Repositories\PesananKendaraanRepository;

class PesananKendaraanServiceProvider
{
    public function __construct(
        private PesananKendaraanRepository $pesanan_kendaraan_repository
    ) {}

    /**
     * Get All pesanan kendaraan
     */
    public function getListOrder() {
        $pesanan_kendaraans = $this->pesanan_kendaraan_repository->getAll();
        $pesanan_kendaraan_all = [];

        foreach($pesanan_kendaraans as $pesanan_kendaraan) {
            $pesanan_kendaraan_row = [
                'Akun_id_akun' => $pesanan_kendaraan->Akun_id_akun,
                'Kendaraan_id_kendaraan' => $pesanan_kendaraan->Kendaraan_id_kendaraan,
                'status_pesanan' => $pesanan_kendaraan->status_pesanan,
                'status_dokumen' => $pesanan_kendaraan->status_dokumen,
                'waktu_mulai' => $pesanan_kendaraan->waktu_mulai,
                'waktu_selesai' => $pesanan_kendaraan->waktu_selesai
            ];
            array_push($pesanan_kendaraan_all, $pesanan_kendaraan_row);
        }

        return $pesanan_kendaraan_all;
    }
}
