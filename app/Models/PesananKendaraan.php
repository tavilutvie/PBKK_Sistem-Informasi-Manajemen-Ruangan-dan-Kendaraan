<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_pesanan',
        'status_dokumen',
        'waktu_mulai',
        'waktu_selesai',
    ];

    public function akun() {
        return $this->belongsTo(Akuns::class);
    }

    public function kendaraan() {
        return $this->belongsTo(Kendaraan::class, 'Kendaraan_id_kendaraan', 'id_kendaraan');
    }
}
