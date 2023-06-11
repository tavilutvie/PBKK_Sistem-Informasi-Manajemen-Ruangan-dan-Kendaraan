<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_sewa_kendaraans', function (Blueprint $table) {
            $table->id('id_jadwal_sewa_kendaraan');
            $table->date('tanggal_pesanan');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');

            // Foreign keys
            $table->unsignedBigInteger('Kendaraan_id_kendaraan');
            $table->foreign('Kendaraan_id_kendaraan')->references('id_kendaraan')->on('kendaraans');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_sewa_kendaraans');
    }
};
