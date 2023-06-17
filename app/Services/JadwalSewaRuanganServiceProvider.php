<?php

namespace App\Services;

use App\Utils\Utils;
use App\Repositories\JadwalSewaRuanganRepository;

class JadwalSewaRuanganServiceProvider
{
    public function __construct(
        private JadwalSewaRuanganRepository $jadwal_sewa_ruangan_repository,
        private Utils $utilFunctions
    ) {}

    /**
     * Get room schedule with given month and year info
     *
     */
    public function getWithIdRuangan(int $id_ruangan, int $month, int $year)
    {
        $jadwal_sewa_ruangan_with_id = $this->jadwal_sewa_ruangan_repository->getByIdRuangan($id_ruangan);

        $jadwal_sewa_ruangan_each_MY = [];
        foreach ($jadwal_sewa_ruangan_with_id as $jadwal_sewa_ruangan)
        {
            $jadwal_month = $this->utilFunctions->GetMonthFromDate($jadwal_sewa_ruangan->tanggal_pesanan);
            $jadwal_year = $this->utilFunctions->GetYearFromDate($jadwal_sewa_ruangan->tanggal_pesanan);
            if ($jadwal_month == $month && $jadwal_year == $year)
            {
                $jadwal_sewa_ruangan_row = [
                    'tanggal_pesanan' => $jadwal_sewa_ruangan->tanggal_pesanan,
                    'waktu_mulai' => $jadwal_sewa_ruangan->waktu_mulai,
                    'waktu_selesai' => $jadwal_sewa_ruangan->waktu_selesai,
                ];
                array_push($jadwal_sewa_ruangan_each_MY, $jadwal_sewa_ruangan_row);
            }
        }

        return $jadwal_sewa_ruangan_each_MY;
    }

    /**
     * Add new jadwal data
     */
    public function addData(array $data) {
        $this->jadwal_sewa_ruangan_repository->create($data);
    }
}
