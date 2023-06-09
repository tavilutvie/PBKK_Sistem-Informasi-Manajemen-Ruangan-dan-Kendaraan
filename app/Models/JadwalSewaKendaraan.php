<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSewaKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pesanan',
        'waktu_mulai',
        'waktu_selesai'
    ];

    public function kendaraan() {
        return $this->belongsTo(Kendaraan::class);
    }
    
}
