<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\PesananRuanganServiceProvider;
use App\Services\PesananKendaraanServiceProvider;

class OrderController extends Controller
{
    public function __construct(
        private PesananRuanganServiceProvider $pesanan_ruangan_service_provider,
        private PesananKendaraanServiceProvider $pesanan_kendaraan_service_provider
    ) {}

    /**
     * Get all orders.
     */
    public function list() {
        $pesanan_ruangan = $this->pesanan_ruangan_service_provider->getListOrder();
        $pesanan_kendaraan = $this->pesanan_kendaraan_service_provider->getListOrder();

        return view('Order\orderList', [
            'page' => 'Order List',
            'username' => auth()->user()->name,
            'pesanan_ruangans' => $pesanan_ruangan,
            'pesanan_kendaraans' => $pesanan_kendaraan,
        ]);
    }

    /**
     * Order Ruangan.
     */
    public function orderRuanganView(int $id) {
        $ruangan_data = $this->pesanan_ruangan_service_provider->getDetailRuangan($id);

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
        $kendaraan_data = $this->pesanan_kendaraan_service_provider->getDetailKendaraan($id);

        return view('Order\orderVehicle', [
            'page' => 'Order Kendaraan',
            'id_kendaraan' => $id,
            'jenis_kendaraan' => $kendaraan_data['jenis_kendaraan'],
            'nomor_plat' => $kendaraan_data['nomor_plat'],
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

        if($is_valid->fails()) {
            return redirect($request->Kendaraan_id_kendaraan.'/orderKendaraan')->with('error', 'Data tidak valid');
        }

        $this->pesanan_kendaraan_service_provider->createKendaraanOrder($request);

        return redirect()->route('index')->with('success', 'Pesanan berhasil dibuat');
    }

    /**
     * Upload dokumen peminjaman baru
     */
    public function uploadDokumenRuangan(Request $request, int $id)
    {
        $new_data = $this->pesanan_ruangan_service_provider->uploadDokumenPeminjaman($request, $id);

        if(!$new_data) {
            return redirect()->back()->with('error', 'Dokumen gagal diupload');
        }

        return redirect()->back()->with('success', 'Dokumen berhasil diupload');
    }

    /**
     * Upload dokumen peminjaman baru
     */
    public function uploadDokumenKendaraan(Request $request, int $id)
    {
        $new_data = $this->pesanan_kendaraan_service_provider->uploadDokumenPeminjaman($request, $id);

        if(!$new_data) {
            return redirect()->back()->with('error', 'Dokumen gagal diupload');
        }

        return redirect()->back()->with('success', 'Dokumen berhasil diupload');
    }

    /**
     * Delete ruangan order data
     */
    public function deleteRuangan(Request $request, int $id) {
        $status_pesanan = $request->status_pesanan;


        // tidak bisa delete ruangan jika status_pesanan == Disetujui
        if ($status_pesanan == 'Disetujui' || $status_pesanan == 'Gagal') {
            return redirect()->route('orderList')->with('error', 'Pesanan tidak bisa dihapus');
        }
        else {
            $this->pesanan_ruangan_service_provider->cancelRuanganOrder($id);
        }

        return redirect()->route('orderList')->with('success', 'Pesanan berhasil dihapus');
    }

    /**
     * Delete kendaraan order data
     */
    public function deleteKendaraan(Request $request, int $id) {
        $status_pesanan = $request->status_pesanan;

        // tidak bisa delete kendaraan jika status_pesanan == Disetujui
        if ($status_pesanan == 'Disetujui' || $status_pesanan == 'Gagal') {
            return redirect()->route('orderList')->with('error', 'Pesanan tidak bisa dihapus');
        }
        else {
            $this->pesanan_kendaraan_service_provider->deleteKendaraanOrder($id);
        }

        return redirect()->route('orderList')->with('success', 'Pesanan berhasil dihapus');
    }

}
