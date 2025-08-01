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
    Schema::create('basic_quiz_questions', function (Blueprint $table) {
        $table->id();
        $table->integer('number'); // nomor halaman/soal
        $table->string('question');
        $table->string('image')->nullable();
        $table->string('option_a');
        $table->string('option_b');
        $table->string('option_c');
        $table->string('option_d');
        $table->string('correct_answer'); // untuk admin review
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_quiz_questions');
    }
};
