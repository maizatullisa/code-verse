<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_pengajar_id')->constrained('profile_pengajar')->onDelete('cascade');
            $table->string('jenjang'); // S1, S2, S3
            $table->string('jurusan'); // Marketing, Teknik Informatika, dll
            $table->string('institusi'); // Universitas Aganda
            $table->year('tahun_lulus')->nullable(); // 2019
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_pendidikan');
    }
};
