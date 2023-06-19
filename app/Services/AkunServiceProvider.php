<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\AkunRepository;

class AkunServiceProvider
{
    public function __construct(
        private AkunRepository $akunRepository
    ) {}

    /**
     * Validate Akun
     */
    public function validateAkun(Request $request) {
        $isValid = $request->validate([
            'nama_belakang' => 'required|max:255',
            'nama_depan' => 'required|max:255',
            'nomor_telepon' => 'required|unique:Akuns|max:20',
            'nip' => 'required|unique:Akuns|min:10|max:20',
            'jabatan' => 'required|max:255',
            'foto_tanda_pengenal' => 'required|image'
        ]);

        return $isValid;
    }

    /**
     * Save akun
     */
    public function saveAkun(int $id, array $new_data) {
        $this->akunRepository->create($id, $new_data);
    }

    /**
     * Get akun by ID
     */
    public function getAkunById(int $id) {
        $akun_data = $this->akunRepository->getById($id);

        $akun_data_array = [
            'user_id' => $akun_data->user_id,
            'nama_belakang' => $akun_data->nama_belakang,
            'nama_depan' => $akun_data->nama_depan,
            'nomor_telepon' => $akun_data->nomor_telepon,
            'nip' => $akun_data->nip,
            'jabatan' => $akun_data->jabatan,
            'foto_tanda_pengenal' => $akun_data->foto_tanda_pengenal
        ];

        return $akun_data_array;
    }

    /**
     * Get jabatan
     */
    public function getJabatan(int $id) {
        $akun_data = $this->akunRepository->getById($id);

        return $akun_data->jabatan;
    }
}
