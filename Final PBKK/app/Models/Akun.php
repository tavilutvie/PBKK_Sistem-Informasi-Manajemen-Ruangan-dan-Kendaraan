<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_belakang',
        'nama_depan',
        'username',
        'email',
        'password',
        'nomor_telepon',
        'nip',
        'jabatan',
        'foto_tanda_pengenal'
    ];

    protected $hidden = [
        'password',
    ];

    public function pesananRuangan() {
        return $this->hasMany(PesananRuangan::class, 'id_akun');
    }
}
