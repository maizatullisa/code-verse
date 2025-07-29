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
        Schema::create('user_materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('materi_id')->constrained('materis')->onDelete('cascade');
            $table->enum('status', ['belum', 'selesai'])->default('belum');
            $table->string('progress')->nullable(); //0%, 50%, 100%
            $table->integer('nilai')->nullable();//nilai quiz
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_materi');
    }
};
