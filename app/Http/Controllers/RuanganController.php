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
    public function list() {
        return view('Room/roomList', [
            "page" => "Ruangan"
        ]);
    }

    /**
     * Get Detail of one ruangan
     */
    public function detail(Ruangan $ruangan) {

    }

    /**
     * Get schedule of ruangan dipinjam
     */
    public function schedule(Ruangan $ruangan) {

    }
}
