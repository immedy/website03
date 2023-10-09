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
        Schema::create('laporankerusakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengirim');
            $table->foreignId('dariruangan');
            $table->foreignId('tujuanruangan');
            $table->string('keterangan');
            $table->string('spesifikasi',100);
            $table->string('alat',20);
            $table->dateTimeTz('waktu_pelaporan');
            $table->dateTimeTz('waktu_respon');            
            $table->foreignId('diterima_oleh');
            $table->string('status',3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporankerusakans');
    }
};
