<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akuns extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_belakang',
        'nama_depan',
        'nomor_telepon',
        'nip',
        'jabatan',
        'foto_tanda_pengenal',
        'user_id'
    ];

    protected $hidden = [
        'password',
    ];

    // Table relationships
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pesananRuangan() {
        return $this->hasMany(PesananRuangan::class, 'Akun_id_akun', 'id_akun');
    }

    public function pesananKendaraan() {
        return $this->hasMany(PesananKendaraan::class, 'Akun_id_akun', 'id_akun');
    }
}
