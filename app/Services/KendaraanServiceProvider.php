<?php

namespace App\Services;

use App\Repositories\KendaraanRepository;
use App\Services\JadwalSewaKendaraanServiceProvider;

class KendaraanServiceProvider
{
    public function __construct(
        private KendaraanRepository $kendaraan_repository,
        private JadwalSewaKendaraanServiceProvider $jadwal_sewa_kendaraan_service_provider
    ) {}

    /**
     * Get all vehicle list info
     */
    public function getListKendaraan(): array
    {
        $kendaraans = $this->kendaraan_repository->getAll();
        $kendaraan_all = [];

        foreach($kendaraans as $kendaraan) {
            $kendaraan_row = [
                'id_kendaraan' => $kendaraan->id_kendaraan,
                'nomor_plat' => $kendaraan->nomor_plat,
                'jenis_kendaraan' => $kendaraan->jenis_kendaraan,
                'status_operasional' => $kendaraan->status_operasional,
            ];
            array_push($kendaraan_all, $kendaraan_row);
        }

        return $kendaraan_all;
    }

    /**
     * Get vehicle detail info
     */
    public function getDetailKendaraan(int $id): ?array
    {
        $kendaraan = $this->kendaraan_repository->getbyID($id);

        if(!$kendaraan) return null;

        $kendaraan_row = [
            'id_kendaraan' => $kendaraan->id_kendaraan,
            'nomor_plat' => $kendaraan->nomor_plat,
            'jenis_kendaraan' => $kendaraan->jenis_kendaraan,
            'status_operasional' => $kendaraan->status_operasional,
        ];

        return $kendaraan_row;
    }

    /**
     * Get vehicle with month and year info
     */
    public function getScheduleWithMonthYear(int $id, int $month, int $year): array
    {
        // Get vehicle schedule with given month and year info
        $jadwal_sewa_kendaraan = $this->jadwal_sewa_kendaraan_service_provider->getWithIdKendaraan($id, $month, $year);

        return $jadwal_sewa_kendaraan;
    }

    /**
     * Get kendaraan info by id
     */
    public function getKendaraanById(int $id): ?array {
        $kendaraan = $this->kendaraan_repository->getByID($id);

        if(!$kendaraan) return null;

        $kendaraan_row = [
            'jenis_kendaraan' => $kendaraan->jenis_kendaraan,
            'nomor_plat' => $kendaraan->nomor_plat,
            'status_operasional' => $kendaraan->status_operasional
        ];

        return $kendaraan_row;
    }

        /**
     * Get kendaraan id from nama
     */
    public function getIdByVehicleType(string $nama_ruangan) {
        return $this->kendaraan_repository->getIdByType($nama_ruangan);
    }
}
