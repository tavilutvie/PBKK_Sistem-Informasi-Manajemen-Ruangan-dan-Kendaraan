<?php

namespace App\Http\Controllers;

use App\Services\AdminServiceProvider;

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
}
