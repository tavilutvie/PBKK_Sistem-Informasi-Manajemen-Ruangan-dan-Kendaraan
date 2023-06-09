<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ruangan',
        'jenis_ruangan',
        'status_operasional',
        'kapasitas'
    ];

    public function pesananRuangan() {
        return $this->hasMany(PesananRuangan::class, 'ruangan_id');
    }

    public function jadwalSewaRuangan() {
        return $this->hasMany(JadwalSewaRuangan::class, 'ruangan_id');
    }
}
