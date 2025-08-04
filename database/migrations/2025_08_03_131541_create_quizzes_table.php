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
    Schema::create('quizzes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('materi_id');
        $table->string('judul');
        $table->text('deskripsi')->nullable();
        $table->integer('jumlah_soal');
        $table->enum('tipe_soal', ['pilihan_ganda', 'isian']);
        $table->enum('status', ['aktif', 'tdk aktif'])->default('aktif');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
