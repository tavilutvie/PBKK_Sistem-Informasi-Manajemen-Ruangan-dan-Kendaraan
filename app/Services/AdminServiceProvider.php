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
                if ($data['status_pesanan'] == 'Dibatalkan') continue;

                // Get Tanggal
                $data['tanggal'] = explode(" ", $data['waktu_mulai'])[0];

                // Get username
                $akun_data = $this->akun_service_provider->getAkunById($data['Akun_id_akun']);
                $id_akun = $akun_data['user_id'];

                $username = $this->user_service_provider->getUsernameById($id_akun);
                $data['username'] = $username;

                // Get room name
                $ruangan_data = $this->ruangan_service_provider->getDetailRuangan($data['Ruangan_id_ruangan']);
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
                if (['status_pesanan'] == 'Dibatalkan') continue;

                // Get Tanggal
                $data['tanggal'] = explode(" ", $data['waktu_mulai'])[0];

                // Get username
                $akun_data = $this->akun_service_provider->getAkunById($data['Akun_id_akun']);
                $id_akun = $akun_data['user_id'];

                $username = $this->user_service_provider->getUsernameById($id_akun);
                $data['username'] = $username;

                // Get jenis kendaraan
                $kendaraan_data = $this->kendaraan_service_provider->getDetailKendaraan($data['Kendaraan_id_kendaraan']);
                $data['jenis_kendaraan'] = $kendaraan_data['jenis_kendaraan'];

                // Get plat kendaraan
                $data['nomor_plat'] = $kendaraan_data['nomor_plat'];

                array_push($filtered_data, $data);
            }
        }

        return $filtered_data;
    }

    /**
     * Utility Functions
     *
     * getListOrder with order name and username
     *
     */
    private function unfilterOrderList(array $dataList, string $tipe): array {
        $unfiltered_data = [];

        foreach($dataList as $data) {
            // Get Tanggal
            $data['tanggal'] = explode(" ", $data['waktu_mulai'])[0];

            // Get username
            $akun_data = $this->akun_service_provider->getAkunById($data['Akun_id_akun']);
            $id_akun = $akun_data['user_id'];

            $username = $this->user_service_provider->getUsernameById($id_akun);
            $data['username'] = $username;

            // Get room name
            if ($tipe == "ruangan") {
                $data['jenis'] = "Ruangan";
                $ruangan_data = $this->ruangan_service_provider->getDetailRuangan($data['Ruangan_id_ruangan']);
                $data['nama'] = $ruangan_data['nama_ruangan'];
            } elseif ($tipe == "kendaraan") {
                $data['jenis'] = "Kendaraan";
                $kendaraan_data = $this->kendaraan_service_provider->getDetailKendaraan($data['Kendaraan_id_kendaraan']);
                $data['nomor_plat'] = $kendaraan_data['nomor_plat'];
                $data['nama'] = $kendaraan_data['jenis_kendaraan'];
            }

            array_push($unfiltered_data, $data);
        }

        return $unfiltered_data;
    }

    /**
     * Get all order ruangan and kendaraan filtered
     */
    public function getFilteredOrder() {
        $ruangan_order_list = $this->pesanan_ruangan_service_provider->getListOrder();
        $kendaraan_order_list = $this->pesanan_kendaraan_service_provider->getListOrder();

        // dd($kendaraan_order_list);
        $filtered_ruangan_order_list = $this->filterRuanganOrderList($ruangan_order_list);
        $filtered_kendaraan_order_list = $this->filterKendaraanOrderList($kendaraan_order_list);

        return [
            "ruangan_order_list" => $filtered_ruangan_order_list,
            "kendaraan_order_list" => $filtered_kendaraan_order_list
        ];
    }


    /**
     * Get all order ruangan and kendaraan filtered
     */
    public function getUnfilteredOrder() {
        $ruangan_order_list = $this->pesanan_ruangan_service_provider->getListOrder();
        $kendaraan_order_list = $this->pesanan_kendaraan_service_provider->getListOrder();

        $unfiltered_ruangan_order_list = $this->unfilterOrderList($ruangan_order_list, "ruangan");
        $unfiltered_kendaraan_order_list = $this->unfilterOrderList($kendaraan_order_list, "kendaraan");

        return [
            "ruangan_order_list" => $unfiltered_ruangan_order_list,
            "kendaraan_order_list" => $unfiltered_kendaraan_order_list
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
        return $this->kendaraan_service_provider->getIdKendaraanByJenis($jenis_kendaraan);
    }

    /**
     * Get Jabatan by id
     */
    public function getJabatan(int $id) {

        return $this->akun_service_provider->getJabatan($id);
    }

    /**
     * Get Unverified Akun List
     */
    public function getUnverifiedAkunList() {
        $daftar_akun = $this->akun_service_provider->getDaftarAkun();

        // Filter $daftar akun is_verified == false
        $filtered_daftar_akun = [];

        foreach($daftar_akun as $akun) {
            if(!$akun['is_verified']) {
                array_push($filtered_daftar_akun, $akun);
            }
        }

        return $filtered_daftar_akun;
    }

    /**
     * Verify Akun
     */
    public function verifyAkun(int $id_akun) {
        $this->akun_service_provider->verifyAkun($id_akun);
    }
}
