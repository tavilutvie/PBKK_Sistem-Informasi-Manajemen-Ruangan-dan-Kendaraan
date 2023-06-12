<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Http\Requests\StoreRuanganRequest;
use App\Http\Requests\UpdateRuanganRequest;

class RuanganController extends Controller
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
    public function store(StoreRuanganRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruangan $ruangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRuanganRequest $request, Ruangan $ruangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        //
    }

    /**
     * Get List of ruangan
     */
    public function list(Ruangan $ruangan) {
        return view('Room\roomList', [
            "page" => "Ruangan",
            "ruangans" => $ruangan->all()
        ]);
    }

    /**
     * Get Detail of one ruangan
     */
    public function detail(Ruangan $ruangan) {
        return view('Room\roomDetail', [
            "page" => $ruangan->nama_ruangan,
            "ruangan" => $ruangan
        ]);
    }

    /**
     * Get schedule of ruangan dipinjam
     */
    public function schedule(Ruangan $ruangan, int $month, int $year) {
        return view('schedule\roomSchedule', [
            "page" => $ruangan->nama_ruangan,
            "ruangan" => $ruangan,
            "month" => $month,
            "year" => $year,
            "jadwal_sewa_ruangans" =>
                $ruangan->jadwalSewaRuangan()
                    ->whereMonth('tanggal_pesanan', $month)
                    ->whereYear('tanggal_pesanan', $year)
                    ->get(),
        ]);
    }
}
