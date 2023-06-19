<?php

namespace App\Services;

use App\Repositories\PesananKendaraanRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                'id_pesanan_kendaraan' => $pesanan_kendaraan->id_pesanan_kendaraan,
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
    /**
     * Update kendaraan order data
     */
    public function updateKendaraanOrder(array $data) {
        $this->pesanan_kendaraan_repository->update($data);

        return;
    }

    /**
     * Validate new data
     */
    public function validateData(Request $data) {
        $now = now();
        $is_valid = Validator::make($data->all(), [
            'Akun_id_akun' => 'required|integer',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'Kendaraan_id_kendaraan' => 'required|integer',
            'tanggal_pemakaian' => 'required|date|after_or_equal:' . $now->format('Y-m-d'),
        ]);
        return $is_valid;
    }

        /**
     * Create new kendaraan order
     */
    public function createKendaraanOrder(Request $data) {
        $new_data = [
            'Akun_id_akun' => $data->Akun_id_akun,
            'Kendaraan_id_kendaraan' => $data->Kendaraan_id_kendaraan,
            'waktu_mulai' => $data->tanggal_pemakaian . " " . $data->waktu_mulai,
            'waktu_selesai' => $data->tanggal_pemakaian . " " . $data->waktu_selesai,
        ];

        $this->pesanan_kendaraan_repository->create($new_data);

        return;
    }

        /**
     * Delete kendaraan order
     */
    public function deleteKendaraanOrder(int $id) {
        $this->pesanan_kendaraan_repository->delete($id);

        return;
    }
}
