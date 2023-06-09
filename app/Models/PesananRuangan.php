<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananRuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_pesanan',
        'status_dokumen',
        'waktu_mulai',
        'waktu_selesai',
    ];

    public function akun() {
        return $this->belongsTo(Akun::class, 'akun_id');
    }

    public function ruangan() {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}
