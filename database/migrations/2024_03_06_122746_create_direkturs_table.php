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
        Schema::create('direkturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('deskripsi');
            $table->date('awal_periode');
            $table->date('akhir_periode');
            $table->string('foto_direktur');
            $table->foreignId('pegawai_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direkturs');
    }
};
