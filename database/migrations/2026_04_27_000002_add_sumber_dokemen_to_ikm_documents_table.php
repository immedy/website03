<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ikm_documents', function (Blueprint $table) {
            $table->foreignId('sumber_dokemen')
                ->nullable()
                ->after('link_dokumen')
                ->constrained('referensis')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('ikm_documents', function (Blueprint $table) {
            $table->dropForeign(['sumber_dokemen']);
            $table->dropColumn('sumber_dokemen');
        });
    }
};

