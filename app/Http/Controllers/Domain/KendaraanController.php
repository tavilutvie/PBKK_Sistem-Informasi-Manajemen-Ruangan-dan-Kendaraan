<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Services\KendaraanServiceProvider;

class KendaraanController extends Controller
{
    public function __construct(
        private KendaraanServiceProvider $kendaraanServiceProvider
    ) {}
    /**
     * Get List of kendaraan
     */
    public function list() {
        return view('Vehicle\vehicleList', [
            "page" => "Kendaraan",
            "kendaraans" => $this->kendaraanServiceProvider->getListKendaraan(),
        ]);
    }

    /**
     * Get schedule of kendaraan dipinjam
     */
    public function schedule(int $id, int $month, int $year) {
        $jadwal_sewa_kendaraan = $this->kendaraanServiceProvider->getScheduleWithMonthYear($id, $month, $year);
        $kendaraan_info = $this->kendaraanServiceProvider->getDetailKendaraan($id);

        return view('schedule\vehicleSchedule', [
            "page" => $kendaraan_info['jenis_kendaraan'],
            "kendaraan" => $kendaraan_info,
            "month" => $month,
            "year" => $year,
            "jadwal_sewa_kendaraans" => $jadwal_sewa_kendaraan,
        ]);
    }
}
