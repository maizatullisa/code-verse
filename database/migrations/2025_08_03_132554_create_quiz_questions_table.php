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
        Schema::create('quiz_questions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('quiz_id');
        $table->text('pertanyaan');
        $table->enum('tipe_soal', ['pilihan_ganda', 'isian']);
        $table->string('pilihan_a')->nullable();
        $table->string('pilihan_b')->nullable();
        $table->string('pilihan_c')->nullable();
        $table->string('pilihan_d')->nullable();
        $table->string('jawaban_benar')->nullable(); // untuk pilgan
        $table->text('jawaban_isian')->nullable();   // untuk isian
        $table->integer('nomor_soal');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
