<?php

namespace App\Services;

use App\Repositories\PesananRuanganRepository;

class PesananRuanganServiceProvider
{
    public function __construct(
        private PesananRuanganRepository $pesanan_ruangan_repository
    ) {}

    /**
     * Get All pesanan ruangan
     */
    public function getListOrder() {
        $pesanan_ruangans = $this->pesanan_ruangan_repository->getAll();
        $pesanan_ruangan_all = [];

        foreach($pesanan_ruangans as $pesanan_ruangan) {
            $pesanan_ruangan_row = [
                'id_pesanan_ruangan' => $pesanan_ruangan->id_pesanan_ruangan,
                'Akun_id_akun' => $pesanan_ruangan->Akun_id_akun,
                'Ruangan_id_ruangan' => $pesanan_ruangan->Ruangan_id_ruangan,
                'status_pesanan' => $pesanan_ruangan->status_pesanan,
                'status_dokumen' => $pesanan_ruangan->status_dokumen,
                'waktu_mulai' => $pesanan_ruangan->waktu_mulai,
                'waktu_selesai' => $pesanan_ruangan->waktu_selesai
            ];
            array_push($pesanan_ruangan_all, $pesanan_ruangan_row);
        }

        return $pesanan_ruangan_all;
    }

    /**
     * Update ruangan order data
     */
    public function updateRuanganOrder(array $data, int $id) {
        $this->pesanan_ruangan_repository->update($id, $data);

        return;
    }
}
