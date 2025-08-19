<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tambah kolom kelas_id ke tabel diskusi yang sudah ada
     */
    public function up(): void
    {
        Schema::table('diskusi', function (Blueprint $table) {
            // Tambah kolom kelas_id (nullable dulu, nanti diisi bertahap)
            $table->unsignedBigInteger('kelas_id')->nullable()->after('id');
            
            // Tambah index untuk performa
            $table->index('kelas_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diskusi', function (Blueprint $table) {
            $table->dropIndex(['kelas_id']);
            $table->dropColumn('kelas_id');
        });
    }
};