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
        Schema::create('balasan_diskusi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diskusi_id'); // relasi ke diskusi
            $table->unsignedBigInteger('user_id');    // siapa yang membalas
            $table->text('konten');                   // isi balasan
            $table->timestamps();

            $table->foreign('diskusi_id')->references('id')->on('diskusi')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->index(['diskusi_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balasan_diskusi');
    }
};
