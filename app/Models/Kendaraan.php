<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kendaraan',
        'nomor_plat',
        'status_operasional'
    ];

    public function pesananKendaraan() {
        return $this->hasMany(PesananKendaraan::class, 'Kendaraan_id_kendaraan', 'id_kendaraan');
    }

    public function jadwalSewaKendaraan() {
        return $this->hasMany(JadwalSewaKendaraan::class, 'Kendaraan_id_kendaraan', 'id_kendaraan');
    }
}
