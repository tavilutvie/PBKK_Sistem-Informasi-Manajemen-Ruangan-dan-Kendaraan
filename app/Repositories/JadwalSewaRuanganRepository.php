<?php

namespace App\Repositories;

use App\Models\JadwalSewaRuangan;

class JadwalSewaRuanganRepository
{
    /**
     * Create new JadwalSewaRuangan
     */
    public function create(array $new)
    {
        $jadwalSewaRuangan = new JadwalSewaRuangan();
        $jadwalSewaRuangan->tanggal = $new['tanggal_pesanan'];
        $jadwalSewaRuangan->waktu_mulai = $new['waktu_mulai'];
        $jadwalSewaRuangan->waktu_selesai = $new['waktu_selesai'];
        $jadwalSewaRuangan->save();

        return $jadwalSewaRuangan;
    }

    /**
     * Get All JadwalSewaRuangans
     */
    public function getAll()
    {
        return JadwalSewaRuangan::all();
    }

    /**
     * Get JadwalSewaRuangans by id
     */
    public function get(int $id)
    {
        return JadwalSewaRuangan::where('id_jadwal_sewa_ruangan', $id)->first();
    }

    /**
     * Get JadwalSewaRuangans by Ruangan_id_ruangan
     */
    public function getByIdRuangan(int $id_ruangan)
    {
        return JadwalSewaRuangan::where('Ruangan_id_ruangan', $id_ruangan)->get();
    }

    /**
     * Update JadwalSewaRuangan by id
     */
    public function update(int $id, string $nama_kolom, string $update)
    {
        $jadwalSewaRuangan = JadwalSewaRuangan::where('id_jadwal_sewa_ruangan', $id)->first();

        if(!$jadwalSewaRuangan) {
            return null;
        }

        $jadwalSewaRuangan->$nama_kolom = $update;
        $jadwalSewaRuangan->save();

        return $jadwalSewaRuangan;
    }

    /**
     * Update JadwalSewaRuangans row
     */
    public function updateRow(int $id, array $update)
    {
        $jadwalSewaRuangan = JadwalSewaRuangan::where('id_jadwal_sewa_ruangan', $id)->first();

        if(!$jadwalSewaRuangan) {
            return null;
        }

        $jadwalSewaRuangan->tanggal_pesanan = $update['tanggal_pesanan'];
        $jadwalSewaRuangan->waktu_mulai = $update['waktu_mulai'];
        $jadwalSewaRuangan->waktu_selesai = $update['waktu_selesai'];
        $jadwalSewaRuangan->save();

        return $jadwalSewaRuangan;
    }

    /**
     * Delete JadwalSewaRuangan by id
     */
    public function delete(int $id)
    {
        $jadwalSewaRuangan = JadwalSewaRuangan::where('id_jadwal_sewa_ruangan', $id)->first();

        if(!$jadwalSewaRuangan) {
            return null;
        }

        $jadwalSewaRuangan->delete();

        return $jadwalSewaRuangan;
    }
}
