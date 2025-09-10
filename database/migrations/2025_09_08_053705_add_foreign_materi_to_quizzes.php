<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            // pastikan kolom materi_id sudah ada
            if (!Schema::hasColumn('quizzes', 'materi_id')) {
                $table->foreignId('materi_id')
                      ->nullable()
                      ->constrained('materis')
                      ->onDelete('cascade');
            } else {
                $table->foreign('materi_id')
                      ->references('id')
                      ->on('materis')
                      ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropForeign(['materi_id']);
        });
    }
};
