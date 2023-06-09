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
        Schema::create('akuns', function (Blueprint $table) {
            $table->id('id_akun');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->string('nama_belakang');
            $table->string('nama_depan');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nomor_telepon')->unique();
            $table->string('nip');
            $table->string('jabatan');
            $table->string('foto_tanda_pengenal');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akuns');
    }
};
