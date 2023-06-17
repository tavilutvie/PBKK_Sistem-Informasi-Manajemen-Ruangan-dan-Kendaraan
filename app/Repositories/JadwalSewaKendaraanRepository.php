<?php

namespace App\Repositories;

use App\Models\JadwalSewaKendaraan;

class JadwalSewaKendaraanRepository
{
    /**
     * Create new JadwalSewaKendaraan
     */
    public function create(array $new)
    {
        $jadwalSewaKendaraan = new JadwalSewaKendaraan();
        $jadwalSewaKendaraan->tanggal_pesanan = $new['tanggal_pesanan'];
        $jadwalSewaKendaraan->waktu_mulai = $new['waktu_mulai'];
        $jadwalSewaKendaraan->waktu_selesai = $new['waktu_selesai'];
        $jadwalSewaKendaraan->save();

        return $jadwalSewaKendaraan;
    }

    /**
     * Get All JadwalSewaKendaraans
     */
    public function getAll()
    {
        return JadwalSewaKendaraan::all();
    }

    /**
     * Get JadwalSewaKendaraans by id
     */
    public function get(int $id)
    {
        return JadwalSewaKendaraan::where('id_jadwal_sewa_kendaraan', $id)->first();
    }

    /**
     * Get JadwalSewaKendaraans by Kendaraan_id_kendaraan
     */
    public function getByIdKendaraan(int $id_kendaraan)
    {
        return JadwalSewaKendaraan::where('Kendaraan_id_kendaraan', $id_kendaraan)->get();
    }

    /**
     * Update JadwalSewaKendaraan by id
     */
    public function update(int $id, string $nama_kolom, string $update)
    {
        $jadwalSewaKendaraan = JadwalSewaKendaraan::where('id_jadwal_sewa_kendaraan', $id)->first();

        if(!$jadwalSewaKendaraan) {
            return null;
        }

        $jadwalSewaKendaraan->$nama_kolom = $update;
        $jadwalSewaKendaraan->save();

        return $jadwalSewaKendaraan;
    }

    /**
     * Update JadwalSewaKendaraans row
     */
    public function updateRow(int $id, array $update)
    {
        $jadwalSewaKendaraan = JadwalSewaKendaraan::where('id_jadwal_sewa_kendaraan', $id)->first();

        if(!$jadwalSewaKendaraan) {
            return null;
        }

        $jadwalSewaKendaraan->tanggal_pesanan = $update['tanggal_pesanan'];
        $jadwalSewaKendaraan->waktu_mulai = $update['waktu_mulai'];
        $jadwalSewaKendaraan->waktu_selesai = $update['waktu_selesai'];
        $jadwalSewaKendaraan->save();

        return $jadwalSewaKendaraan;
    }

    /**
     * Delete JadwalSewaKendaraan by id
     */
    public function delete(int $id)
    {
        $jadwalSewaKendaraan = JadwalSewaKendaraan::where('id_jadwal_sewa_kendaraan', $id)->first();

        if(!$jadwalSewaKendaraan) {
            return null;
        }

        $jadwalSewaKendaraan->delete();

        return $jadwalSewaKendaraan;
    }
}
