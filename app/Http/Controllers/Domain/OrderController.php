<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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
    public function orderRuangan(Ruangan $ruangan) {
        return view('Order\orderRuangan', [
            'page' => 'Order Ruangan',
        ]);
    }

    /**
     * Order Kendaraan.
     */
    public function orderKendaraan(Kendaraan $kendaraan) {
        return view('Order\orderKendaraan', [
            'page' => 'Order Kendaraan',
        ]);
    }

    public function orderRuanganTest() {
        return view('Order/orderRoom', [
            'page' => 'Order Ruangan Test',
        ]);
    }

    public function orderKendaraanTest() {
        return view('Order/orderVehicle', [
            'page' => 'Order Kendaraan Test',
        ]);
    }
}
