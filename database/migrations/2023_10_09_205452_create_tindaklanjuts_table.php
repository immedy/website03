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
        Schema::create('tindaklanjuts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notiket');
            $table->string('kegiatan_survei');
            $table->string('penyebab_rusak');
            $table->foreignId('kodisi_alat',);
            $table->foreignId('hasil_perbaikan');
            $table->foreignId('rekomendasi');
            $table->foreignId('petugas_pemeriksa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindaklanjuts');
    }
};
