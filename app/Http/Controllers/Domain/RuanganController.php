<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Services\RuanganServiceProvider;

class RuanganController extends Controller
{
    public function __construct(
        private RuanganServiceProvider $ruanganServiceProvider
    ) {}

    /**
     * Get List of ruangan
     */
    public function list() {
        return view('Room\roomList', [
            "page" => "Ruangan",
            "ruangans" => $this->ruanganServiceProvider->getListRuangan(),
        ]);
    }

    /**
     * Get Detail of one ruangan
     */
    public function detail(int $id) {
        $ruangan_info = $this->ruanganServiceProvider->getDetailRuangan($id);

        return view('Room\roomDetail', [
            "page" => $ruangan_info['nama_ruangan'],
            "ruangan" => $ruangan_info,
        ]);
    }

    /**
     * Get schedule of ruangan dipinjam
     */
    public function schedule(int $id, int $month, int $year) {
        $jadwal_sewa_ruangan = $this->ruanganServiceProvider->getScheduleWithMonthYear($id, $month, $year);
        $ruangan_info = $this->ruanganServiceProvider->getDetailRuangan($id);

        return view('schedule\roomSchedule', [
            "page" => $ruangan_info['nama_ruangan'],
            "ruangan" => $ruangan_info,
            "month" => $month,
            "year" => $year,
            "jadwal_sewa_ruangans" => $jadwal_sewa_ruangan,
        ]);
    }
}
