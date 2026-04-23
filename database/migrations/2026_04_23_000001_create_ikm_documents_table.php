<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ikm_documents', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi');
            $table->text('link_dokumen');
            $table->boolean('status')->default(true);
            $table->foreignId('pegawai_id')->constrained('pegawais')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ikm_documents');
    }
};

