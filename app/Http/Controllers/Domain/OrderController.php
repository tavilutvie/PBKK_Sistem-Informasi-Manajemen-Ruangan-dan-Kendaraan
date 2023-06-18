<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\RuanganServiceProvider;
use App\Services\KendaraanServiceProvider;
use App\Services\PesananRuanganServiceProvider;
use App\Services\PesananKendaraanServiceProvider;

class OrderController extends Controller
{
    public function __construct(
        private RuanganServiceProvider $ruangan_service_provider,
        private KendaraanServiceProvider $kendaraan_service_provider,
        private PesananRuanganServiceProvider $pesanan_ruangan_service_provider,
        private PesananKendaraanServiceProvider $pesanan_kendaraan_service_provider
    ) {}

    /**
     * Get all orders.
     */
    public function list() {
        return view('Order\orderList', [
            'page' => 'Order List',
            'username' => auth()->user()->name,
            'pesanan_ruangans' => auth()->user()->akun->pesananRuangan,
            'pesanan_kendaraans' => auth()->user()->akun->pesananKendaraan,
        ]);
    }

    /**
     * Order Ruangan.
     */
    public function orderRuanganView(int $id) {
        $ruangan_data = $this->ruangan_service_provider->getDetailRuangan($id);

        return view('Order\orderRoom', [
            'page' => 'Order Ruangan',
            'id_ruangan' => $id,
            'nama_ruangan' => $ruangan_data['nama_ruangan'],
        ]);
    }

    /**
     * Order Kendaraan.
     */
    public function orderKendaraanView(int $id) {
        $kendaraan_data = $this->kendaraan_service_provider->getDetailKendaraan($id);

        return view('Order\orderVehicle', [
            'page' => 'Order Kendaraan',
            'id_kendaraan' => $id,
            'jenis_kendaraan' => $kendaraan_data['jenis_kendaraan'],
        ]);
    }

    /**
     * Order Ruangan Post
     */
    public function orderRuangan(Request $request) {
        $is_valid = $this->pesanan_ruangan_service_provider->validateData($request);

        if(!$is_valid) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        $this->pesanan_ruangan_service_provider->createRuanganOrder($request);

        return redirect()->route('index')->with('success', 'Pesanan berhasil dibuat');
    }

        /**
     * Order Kendaraan Post
     */
    public function orderKendaraan(Request $request) {
        $is_valid = $this->pesanan_kendaraan_service_provider->validateData($request);

        if(!$is_valid) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        $this->pesanan_kendaraan_service_provider->createKendaraanOrder($request);

        return redirect()->route('index')->with('success', 'Pesanan berhasil dibuat');
    }
}
