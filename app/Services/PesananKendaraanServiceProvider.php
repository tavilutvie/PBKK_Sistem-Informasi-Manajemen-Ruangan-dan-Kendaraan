<?php

namespace App\Services;

use App\Repositories\PesananKendaraanRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Services\AkunServiceProvider;
use App\Services\KendaraanServiceProvider;

class PesananKendaraanServiceProvider
{
    public function __construct(
        private PesananKendaraanRepository $pesanan_kendaraan_repository,
        private AkunServiceProvider $akun_service_provider,
        private KendaraanServiceProvider $kendaraan_service_provider
    ) {}

    /**
     * Get pesanan with id
     */
    public function getListOrderWithId(int $id_akun) {
        $pesanan_kendaraans = $this->pesanan_kendaraan_repository->getByIdAkun($id_akun);

        if($pesanan_kendaraans == null) {
            return [];
        }

        $pesanan_kendaraan_all = [];
        foreach ($pesanan_kendaraans as $pesanan_kendaraan) {
            $jabatan = $this->akun_service_provider->getJabatan($id_akun);

            $jenis_kendaraan = $this->kendaraan_service_provider->getDetailKendaraan($pesanan_kendaraan->Kendaraan_id_kendaraan)['jenis_kendaraan'];
            $nomor_plat = $this->kendaraan_service_provider->getDetailKendaraan($pesanan_kendaraan->Kendaraan_id_kendaraan)['nomor_plat'];

            $pesanan_kendaraan_row = [
                'id_pesanan_kendaraan' => $pesanan_kendaraan->id_pesanan_kendaraan,
                'Akun_id_akun' => $id_akun,
                'jabatan' => $jabatan,
                'Kendaraan_id_kendaraan' => $pesanan_kendaraan->Kendaraan_id_kendaraan,
                'status_pesanan' => $pesanan_kendaraan->status_pesanan,
                'status_dokumen' => $pesanan_kendaraan->status_dokumen,
                'waktu_mulai' => $pesanan_kendaraan->waktu_mulai,
                'waktu_selesai' => $pesanan_kendaraan->waktu_selesai,
                'jenis_kendaraan' => $jenis_kendaraan,
                'nomor_plat' => $nomor_plat,
                'dokumen_peminjaman' => $pesanan_kendaraan->dokumen_peminjaman
            ];

            array_push($pesanan_kendaraan_all, $pesanan_kendaraan_row);
        }

        return $pesanan_kendaraan_all;
    }

    /**
     * Get All pesanan kendaraan
     */
    public function getListOrder() {
        $pesanan_kendaraans = $this->pesanan_kendaraan_repository->getAll();
        $pesanan_kendaraan_all = [];

        foreach($pesanan_kendaraans as $pesanan_kendaraan) {
            $id_akun = $pesanan_kendaraan->Akun_id_akun;
            $jabatan = $this->akun_service_provider->getJabatan($id_akun);

            $jenis_kendaraan = $this->kendaraan_service_provider->getDetailKendaraan($pesanan_kendaraan->Kendaraan_id_kendaraan)['jenis_kendaraan'];
            $nomor_plat = $this->kendaraan_service_provider->getDetailKendaraan($pesanan_kendaraan->Kendaraan_id_kendaraan)['nomor_plat'];
            $pesanan_kendaraan_row = [
                'id_pesanan_kendaraan' => $pesanan_kendaraan->id_pesanan_kendaraan,
                'Akun_id_akun' => $id_akun,
                'jabatan' => $jabatan,
                'Kendaraan_id_kendaraan' => $pesanan_kendaraan->Kendaraan_id_kendaraan,
                'status_pesanan' => $pesanan_kendaraan->status_pesanan,
                'status_dokumen' => $pesanan_kendaraan->status_dokumen,
                'waktu_mulai' => $pesanan_kendaraan->waktu_mulai,
                'waktu_selesai' => $pesanan_kendaraan->waktu_selesai,
                'dokumen_peminjaman' => $pesanan_kendaraan->dokumen_peminjaman,
                'jenis_kendaraan' => $jenis_kendaraan,
                'nomor_plat' => $nomor_plat,
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
            'dokumen_peminjaman' => 'mimes:pdf|max:2048'
        ]);
        return $is_valid;
    }

    /**
     * Create new kendaraan order
     */
    public function createKendaraanOrder(Request $data) {
        $doc_path = "";
        $status_dokumen = false;
        $status_pesanan = "Menunggu Dokumen";

        if($data->hasFile('dokumen_peminjaman')) {
            // change status dokumen

            $doc = $data->file('dokumen_peminjaman');
            $file_name = time() . '-' . str_replace(' ', '_', $doc->getClientOriginalName());
            $doc->storeAs('public/documents/kendaraan', $file_name);

            // Get doc path
            $doc_path = Storage::url('documents/kendaraan/' . $file_name);
        }

        if ($doc_path != "") {
            $status_dokumen = true;
            $status_pesanan = "Pengecekan Dokumen";
        }

        // change doc file to path
        $data['dokumen_peminjaman'] = $doc_path;

        // save data
        $new_data = [
            'Akun_id_akun' => $data->Akun_id_akun,
            'Kendaraan_id_kendaraan' => $data->Kendaraan_id_kendaraan,
            'waktu_mulai' => $data->tanggal_pemakaian . " " . $data->waktu_mulai,
            'waktu_selesai' => $data->tanggal_pemakaian . " " . $data->waktu_selesai,
            'dokumen_peminjaman' => $doc_path,
            'status_pesanan' => $status_pesanan,
            'status_dokumen' => $status_dokumen,
        ];

        $this->pesanan_kendaraan_repository->create($new_data);

        return;
    }

    /**
     * Upload new document
     */
    public function uploadDokumenPeminjaman(Request $request, int $id)
    {
        $doc_path = "";
        $status_dokumen = true;

        $doc = $request->file('dokumen_peminjaman');
        $file_name = time() . '-' . str_replace(' ', '_', $doc->getClientOriginalName());
        $doc->storeAs('public/documents/kendaraan', $file_name);

        // Get doc path
        $doc_path = Storage::url('documents/kendaraan/' . $file_name);

        $data = [
            'id_pesanan_kendaraan' => $id,
            'dokumen_peminjaman' => $doc_path,
            'status_dokumen' => $status_dokumen,
        ];

        $this->pesanan_kendaraan_repository->update($data);

        return $data;
    }

    /**
     * Get detail kendaraan
     */
    public function getDetailKendaraan(int $id)
    {
        return $this->kendaraan_service_provider->getDetailKendaraan($id);
    }

    /**
     * Cancel kendaraan order
     */
    public function cancelKendaraanOrder(int $id) {
        $pesanan_kendaraan = [
            'id_pesanan_kendaraan' => $id,
            'status_pesanan' => 'Dibatalkan',
        ];

        $this->pesanan_kendaraan_repository->update($pesanan_kendaraan);

        return;
    }
}
