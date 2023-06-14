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
     * Validate AKun
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
}
