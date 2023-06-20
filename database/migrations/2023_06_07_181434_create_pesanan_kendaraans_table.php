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
        Schema::create('pesanan_kendaraans', function (Blueprint $table) {
            $table->id('id_pesanan_kendaraan');
            $table->string('status_pesanan')->default('Menunggu Dokumen');
            $table->boolean('status_dokumen')->default(false);
            $table->datetime('waktu_mulai');
            $table->datetime('waktu_selesai');
            $table->string('dokumen_peminjaman')->nullable(true);

            // Foreign keys
            $table->unsignedBigInteger('Akun_id_akun');
            $table->unsignedBigInteger('Kendaraan_id_kendaraan');
            $table->foreign('Akun_id_akun')->references('id_akun')->on('akuns');
            $table->foreign('Kendaraan_id_kendaraan')->references('id_kendaraan')->on('kendaraans');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_kendaraans');
    }
};
