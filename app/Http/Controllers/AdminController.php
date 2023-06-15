<?php

namespace App\Http\Controllers;

use App\Models\PesananRuangan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pemesananList = PesananRuangan::all();
        return view('admin', compact('pemesananList'));
    }

    public function update(Request $request, $id)
    {
        $pemesanan = PesananRuangan::findOrFail($id);
        $pemesanan->status_dokumen = $request->input('status_dokumen');
        $pemesanan->nama_ruangan_status = $request->input('status_pesanan');
        $pemesanan->save();

        return redirect()->back()->with('success', 'Pemesanan updated successfully.');
    }
}
