<?php

namespace App\Services;

use App\Repositories\RuanganRepository;
use App\Services\JadwalSewaRuanganServiceProvider;

class RuanganServiceProvider
{
    public function __construct(
        private RuanganRepository $ruangan_repository,
        private JadwalSewaRuanganServiceProvider $jadwal_sewa_ruangan_service_provider
    ) {}

    /**
     * Get all room list info
     */
    public function getListRuangan(): array
    {
        $ruangans = $this->ruangan_repository->getAll();
        $ruangan_all = [];

        foreach($ruangans as $ruangan) {
            $ruangan_row = [
                'id_ruangan' => $ruangan->id_ruangan,
                'nama_ruangan' => $ruangan->nama_ruangan,
                'jenis_ruangan' => $ruangan->jenis_ruangan,
            ];
            array_push($ruangan_all, $ruangan_row);
        }

        return $ruangan_all;
    }

    /**
     * Get room detail info
     */
    public function getDetailRuangan(int $id): ?array
    {
        $ruangan = $this->ruangan_repository->getByID($id);

        if(!$ruangan) return null;

        $ruangan_row = [
            'id_ruangan' => $ruangan->id_ruangan,
            'nama_ruangan' => $ruangan->nama_ruangan,
            'jenis_ruangan' => $ruangan->jenis_ruangan,
            'status_operasional' => $ruangan->status_operasional,
            'kapasitas' => $ruangan->kapasitas
        ];

        return $ruangan_row;
    }

    /**
     * Get room with month and year info
     */
    public function getScheduleWithMonthYear(int $id, int $month, int $year): array
    {
        // Get room schedule with given month and year info
        $jadwal_sewa_ruangan = $this->jadwal_sewa_ruangan_service_provider->getWithIdRuangan($id, $month, $year);

        return $jadwal_sewa_ruangan;
    }

    /**
     * Get ruangan info by id
     */
    public function getRuanganById(int $id): ?array {
        $ruangan = $this->ruangan_repository->getByID($id);

    if(!$ruangan) return null;

        $ruangan_row = [
            'nama_ruangan' => $ruangan->nama_ruangan,
            'jenis_ruangan' => $ruangan->jenis_ruangan,
            'status_operasional' => $ruangan->status_operasional,
            'kapasitas' => $ruangan->kapasitas
        ];

        return $ruangan_row;
    }
}
