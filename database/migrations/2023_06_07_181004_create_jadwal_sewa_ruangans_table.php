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
        Schema::create('jadwal_sewa_ruangans', function (Blueprint $table) {
            $table->id('id_jadwal_sewa_ruangan');
            $table->date('tanggal_pesanan');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');

            // Foreign keys
            $table->unsignedBigInteger('Ruangan_id_ruangan');
            $table->foreign('Ruangan_id_ruangan')->references('id_ruangan')->on('ruangans');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_sewa_ruangans');
    }
};
