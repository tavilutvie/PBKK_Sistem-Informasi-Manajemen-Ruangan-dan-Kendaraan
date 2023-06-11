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
    ];

    protected $hidden = [
        'password',
    ];

    // Table relation
    public function user() {
        return $this->belongsTo(User::class);
    }
}
