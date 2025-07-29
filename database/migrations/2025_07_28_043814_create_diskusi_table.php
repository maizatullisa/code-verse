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
        Schema::create('diskusi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_id'); // relasi ke materi
            $table->unsignedBigInteger('user_id');   // siapa yang posting
            $table->text('konten');                  // isi diskusi
            $table->boolean('is_pinned')->default(false); // apakah dipin
            $table->integer('views')->default(0);    // jumlah dilihat
            $table->timestamps();

            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->index(['materi_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diskusi');
    }
};
