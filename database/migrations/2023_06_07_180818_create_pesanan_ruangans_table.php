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
        Schema::create('pesanan_ruangans', function (Blueprint $table) {
            $table->id('id_pesanan_ruangan');
            $table->string('status_pesanan')->default('Menunggu Dokumen');
            $table->boolean('status_dokumen')->default(false);
            $table->datetime('waktu_mulai');
            $table->datetime('waktu_selesai');

            // Foreign keys
            $table->unsignedBigInteger('Akun_id_akun');
            $table->unsignedBigInteger('Ruangan_id_ruangan');
            $table->foreign('Akun_id_akun')->references('id_akun')->on('akuns');
            $table->foreign('Ruangan_id_ruangan')->references('id_ruangan')->on('ruangans');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_ruangans');
    }
};
