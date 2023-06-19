<?php

namespace App\Services;

use App\Repositories\PesananRuanganRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
                'waktu_selesai' => $pesanan_ruangan->waktu_selesai,
                'dokumen_peminjaman' => $pesanan_ruangan->dokumen_peminjaman,
            ];
            array_push($pesanan_ruangan_all, $pesanan_ruangan_row);
        }

        return $pesanan_ruangan_all;
    }

    /**
     * Update ruangan order data
     */
    public function updateRuanganOrder(array $data) {
        $this->pesanan_ruangan_repository->update($data);

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
            'Ruangan_id_ruangan' => 'required|integer',
            'tanggal_pemakaian' => 'required|date|after_or_equal:' . $now->format('Y-m-d'),
            'dokumen_peminjaman' => 'mimes:pdf|max:2048'
        ]);
        return $is_valid;
    }

    /**
     * Create new ruangan order
     */
    public function createRuanganOrder(Request $data) {
        $doc_path = "";
        $status_dokumen = false;

        if($data->hasFile('dokumen_peminjaman')) {
            // change status dokumen

            $doc = $data->file('dokumen_peminjaman');
            $file_name = time() . '-' . str_replace(' ', '_', $doc->getClientOriginalName());
            $doc->storeAs('public/documents/ruangan', $file_name);

            // Get doc path
            $doc_path = Storage::url('documents/ruangan/' . $file_name);
        }

        $doc_path != "" ? $status_dokumen = true : $status_dokumen = false;

        // change doc file to path
        $data['dokumen_peminjaman'] = $doc_path;

        // save data
        $new_data = [
            'Akun_id_akun' => $data->Akun_id_akun,
            'Ruangan_id_ruangan' => $data->Ruangan_id_ruangan,
            'waktu_mulai' => $data->tanggal_pemakaian . " " . $data->waktu_mulai,
            'waktu_selesai' => $data->tanggal_pemakaian . " " . $data->waktu_selesai,
            'dokumen_peminjaman' => $doc_path,
            'status_dokumen' => $status_dokumen,
        ];

        $this->pesanan_ruangan_repository->create($new_data);

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
        $doc->storeAs('public/documents/ruangan', $file_name);

        // Get doc path
        $doc_path = Storage::url('documents/ruangan/' . $file_name);

        $data = [
            'id_pesanan_ruangan' => $id,
            'dokumen_peminjaman' => $doc_path,
            'status_dokumen' => $status_dokumen,
        ];

        $this->pesanan_ruangan_repository->update($data, $id);

        return $data;
    }
}
