<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSewaRuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pesanan',
        'waktu_mulai',
        'waktu_selesai'
    ];

    public function ruangan() {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}
