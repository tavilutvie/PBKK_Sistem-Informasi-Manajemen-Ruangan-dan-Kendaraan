<?php

namespace App\Http\Controllers;

use App\Services\AdminServiceProvider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(
        private AdminServiceProvider $admin_service_provider
    ) {}

    public function index()
    {
        $jadwal_filtered = $this->admin_service_provider->getFilteredOrder();

        return view('Dashboard/admin', [
            "page" => "Admin Homepage",
            "ruangan_orders" => $jadwal_filtered['ruangan_order_list'],
            "kendaraan_orders" => $jadwal_filtered['kendaraan_order_list']
        ]);
    }

    /**
     * Update ruangan order data
     */
    public function updateRuangan(Request $request, int $id) {
        $status_dokumen = $request->status_dokumen;
        $status_pesanan = $request->status_pesanan;
        if($status_dokumen == null && $status_pesanan == null) {
            $status_dokumen = false;
            $status_pesanan = 'Menunggu Dokumen';
        }
        elseif ($status_dokumen != null && $status_pesanan == null) {
            $status_dokumen = true;
            $status_pesanan = 'Pengecekan Dokumen';
        }
        elseif ($status_dokumen == null && $status_pesanan != null) {
            $status_dokumen = false;
            $status_pesanan = 'Menunggu Dokumen';
        }
        else {
            $status_dokumen = true;
        }

        // update data ke order
        $ruangan_data = [
            'id_pesanan_ruangan' => $id,
            'status_pesanan' => $status_pesanan,
            'status_dokumen' => $status_dokumen,
        ];

        $this->admin_service_provider->updateRuanganOrder($ruangan_data, $id);

        // update data ke jadwal jika status_pesanan == Disetujui
        if ($status_pesanan == 'Disetujui') {

            // get ruangan id
            $id_ruangan = $this->admin_service_provider->getRuanganId($request->nama_ruangan);
            $jadwal_data = [
                'tanggal_pesanan' => $request->tanggal_pesanan,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_selesai' => $request->waktu_selesai,
                'Ruangan_id_ruangan' => $id_ruangan
            ];

            $this->admin_service_provider->addNewSchedule($jadwal_data);
        }

        return redirect()->route('admin');
    }
}
