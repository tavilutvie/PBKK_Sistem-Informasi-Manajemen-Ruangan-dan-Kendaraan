<?php

namespace App\Services;

use App\Services\PesananRuanganServiceProvider;
use App\Services\PesananKendaraanServiceProvider;
use App\Services\AkunServiceProvider;
use App\Services\UserServiceProvider;
use App\Services\RuanganServiceProvider;
use App\Services\KendaraanServiceProvider;
use App\Services\JadwalSewaRuanganServiceProvider;
use App\Services\JadwalSewaKendaraanServiceProvider;
use Database\Seeders\JadwalSewaRuanganSeeder;

class AdminServiceProvider
{
    public function __construct(
        private PesananRuanganServiceProvider $pesanan_ruangan_service_provider,
        private PesananKendaraanServiceProvider $pesanan_kendaraan_service_provider,
        private UserServiceProvider $user_service_provider,
        private AkunServiceProvider $akun_service_provider,
        private RuanganServiceProvider $ruangan_service_provider,
        private KendaraanServiceProvider $kendaraan_service_provider,
        private JadwalSewaRuanganServiceProvider $jadwal_sewa_ruangan_service_provider,
        private JadwalSewaKendaraanServiceProvider $jadwal_sewa_kendaraan_service_provider,
    ) {}

    /**
     * Utility Functions
     *
     * filterRuanganOrderList => Filtering Ruangan Order List to just have unchecked status dokumen and pengecekan dokumen
     *
     */
    private function filterRuanganOrderList(array $dataList): array {
        $filtered_data = [];

        foreach($dataList as $data) {
            if(!$data['status_dokumen'] || $data['status_pesanan'] == 'Menunggu Dokumen' || $data['status_pesanan'] == 'Pengecekan Dokumen') {
                // Get Tanggal
                $data['tanggal'] = explode(" ", $data['waktu_mulai'])[0];

                // Get username
                $akun_data = $this->akun_service_provider->getAkunById($data['Akun_id_akun']);
                $id_akun = $akun_data['user_id'];

                $username = $this->user_service_provider->getUsernameById($id_akun);
                $data['username'] = $username;

                // Get room name
                $ruangan_data = $this->ruangan_service_provider->getRuanganById($data['Ruangan_id_ruangan']);
                $data['nama_ruangan'] = $ruangan_data['nama_ruangan'];

                array_push($filtered_data, $data);
            }
        }

        return $filtered_data;
    }

    /**
     * Utility Functions
     *
     * filterKendaraanOrderList => Filtering Kendaraan Order List to just have unchecked status dokumen and pengecekan dokumen
     *
     */
    private function filterKendaraanOrderList(array $dataList): array {
        $filtered_data = [];

        foreach($dataList as $data) {
            if(!$data['status_dokumen'] || $data['status_pesanan'] == 'Menunggu Dokumen' || $data['status_pesanan'] == 'Pengecekan Dokumen') {
                // Get Tanggal
                $data['tanggal'] = explode(" ", $data['waktu_mulai'])[0];

                // Get username
                $akun_data = $this->akun_service_provider->getAkunById($data['Akun_id_akun']);
                $id_akun = $akun_data['user_id'];

                $username = $this->user_service_provider->getUsernameById($id_akun);
                $data['username'] = $username;

                // Get jenis kendaraan
                $kendaraan_data = $this->kendaraan_service_provider->getKendaraanById($data['Kendaraan_id_kendaraan']);
                $data['jenis_kendaraan'] = $kendaraan_data['jenis_kendaraan'];

                array_push($filtered_data, $data);
            }
        }

        return $filtered_data;
    }

    /**
     * Get all order ruangan and kendaraan filtered
     */
    public function getFilteredOrder() {
        $ruangan_order_list = $this->pesanan_ruangan_service_provider->getListOrder();
        $kendaraan_order_list = $this->pesanan_kendaraan_service_provider->getListOrder();

        $filtered_ruangan_order_list = $this->filterRuanganOrderList($ruangan_order_list);
        $filtered_kendaraan_order_list = $this->filterKendaraanOrderList($kendaraan_order_list);

        return [
            "ruangan_order_list" => $filtered_ruangan_order_list,
            "kendaraan_order_list" => $filtered_kendaraan_order_list
        ];
    }

    /**
     * Update Ruangan order data
     */
    public function updateRuanganOrder(array $ruangan_data) {
        $this->pesanan_ruangan_service_provider->updateRuanganOrder($ruangan_data);

        return;
    }

    /**
     * Update Kendaraan order data
     */
    public function updateKendaraanOrder(array $kendaraan_data) {
        $this->pesanan_kendaraan_service_provider->updateKendaraanOrder($kendaraan_data);

        return;
    }

    /**
     * Add New Jadwal data for Ruangan
     */
    public function addNewScheduleRuangan(array $jadwal_data) {
        $this->jadwal_sewa_ruangan_service_provider->addData($jadwal_data);
    }

    /**
     * Add New Jadwal data for Kendaraan
     */
    public function addNewScheduleKendaraan(array $jadwal_data) {
        $this->jadwal_sewa_kendaraan_service_provider->addData($jadwal_data);
    }

    /**
     * Get Ruangan id from nama
     */
    public function getRuanganId(string $nama_ruangan) {
        return $this->ruangan_service_provider->getIdByRoomName($nama_ruangan);
    }
        /**
     * Get Kendaraan id from nama
     */
    public function getKendaraanId(string $jenis_kendaraan) {
        return $this->kendaraan_service_provider->getIdByVehicleType($jenis_kendaraan);
    }

    /**
     * Get Jabatan by id
     */
    public function getJabatan(int $id) {
        return $this->akun_service_provider->getJabatan($id);
    }
}
