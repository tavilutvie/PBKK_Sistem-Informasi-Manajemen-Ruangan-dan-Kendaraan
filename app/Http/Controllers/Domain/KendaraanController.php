<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKendaraanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKendaraanRequest $request, Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Get List of kendaraan
     */
    public function list(Kendaraan $kendaraan) {
        return view('Vehicle\vehicleList', [
            "page" => "Kendaraan",
            "kendaraans" => $kendaraan->all(),
        ]);
    }

    /**
     * Get schedule of kendaraan dipinjam
     */
    public function schedule(Kendaraan $kendaraan, int $month, int $year) {
        return view('schedule\vehicleSchedule', [
            "page" => $kendaraan->jenis_kendaraan,
            "kendaraan" => $kendaraan,
            "month" => $month,
            "year" => $year,
            "jadwal_sewa_kendaraans" =>
                $kendaraan->jadwalSewaKendaraan()
                    ->whereMonth('tanggal_pesanan', $month)
                    ->whereYear('tanggal_pesanan', $year)
                    ->get(),
        ]);
    }
}
