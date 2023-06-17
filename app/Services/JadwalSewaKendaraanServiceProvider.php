<?php

namespace App\Services;

use App\Utils\Utils;
use App\Repositories\JadwalSewaKendaraanRepository;

class JadwalSewaKendaraanServiceProvider
{
    public function __construct(
        private JadwalSewaKendaraanRepository $jadwal_sewa_kendaraan_repository,
        private Utils $utilFunctions
    ) {}

    /**
     * Get vehicle schedule with given month and year info
     */
    public function getWithIdKendaraan(int $id_kendaraan, int $month, int $year)
    {
        $jadwal_sewa_kendaraan_with_id = $this->jadwal_sewa_kendaraan_repository->getByIdKendaraan($id_kendaraan);

        $jadwal_sewa_kendaraan_each_MY = [];
        foreach ($jadwal_sewa_kendaraan_with_id as $jadwal_sewa_kendaraan)
        {
            $jadwal_month = $this->utilFunctions->GetMonthFromDate($jadwal_sewa_kendaraan->tanggal_pesanan);
            $jadwal_year = $this->utilFunctions->GetYearFromDate($jadwal_sewa_kendaraan->tanggal_pesanan);
            if ($jadwal_month == $month && $jadwal_year == $year)
            {
                $jadwal_sewa_kendaraan_row = [
                    'tanggal_pesanan' => $jadwal_sewa_kendaraan->tanggal_pesanan,
                    'waktu_mulai' => $jadwal_sewa_kendaraan->waktu_mulai,
                    'waktu_selesai' => $jadwal_sewa_kendaraan->waktu_selesai,
                ];
                array_push($jadwal_sewa_kendaraan_each_MY, $jadwal_sewa_kendaraan_row);
            }
        }

        return $jadwal_sewa_kendaraan_each_MY;
    }

    /**
     * Add new jadwal data
     */
    public function addData(array $data) {
        $this->jadwal_sewa_kendaraan_repository->create($data);
    }
}
