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
        Schema::create('jadwaldokters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokter_id');
            $table->boolean('senin');
            $table->boolean('selasa');
            $table->boolean('rabu');
            $table->boolean('kamis');
            $table->boolean('jumat');
            $table->boolean('status_aktif');
            $table->date('dari');
            $table->date('sampai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwaldokters');
    }
};
