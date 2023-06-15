<?php

namespace App\Services;

use App\Services\PesananRuanganServiceProvider;
use App\Services\PesananKendaraanServiceProvider;
use App\Services\AkunServiceProvider;
use App\Services\UserServiceProvider;
use App\Services\RuanganServiceProvider;
use App\Services\KendaraanServiceProvider;

class AdminServiceProvider
{
    public function __construct(
        private PesananRuanganServiceProvider $pesanan_ruangan_service_provider,
        private PesananKendaraanServiceProvider $pesanan_kendaraan_service_provider,
        private UserServiceProvider $user_service_provider,
        private AkunServiceProvider $akun_service_provider,
        private RuanganServiceProvider $ruangan_service_provider,
        private KendaraanServiceProvider $kendaraan_service_provider
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
            if(!$data['status_dokumen'] || $data['status_pesanan'] == 'Menunggu Dokumen') {
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
            if(!$data['status_dokumen'] && $data['status_pesanan'] == 'Pengecekan Dokumen') {
                // Get Tanggal
                $data['tanggal'] = explode(" ", $data['waktu_mulai'])[0];

                // Get username
                $akun_data = $this->akun_service_provider->getAkunById($data['Akun_id_akun']);
                $id_akun = $akun_data['user_id'];

                $username = $this->user_service_provider->getUsernameById($id_akun);
                $data['username'] = $username;

                // Get jenis kendaraan
                $kendaraan_data = $this->kendaraan_service_provider->getKendaraanById($data['Kendaraan_id_ruangan']);
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
}
