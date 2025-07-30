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
        Schema::create('rangkumans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_id')->constrained()->onDelete('cascade');
            $table->text('isi'); // bisa pakai longText jika isi banyak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rangkumans');
    }
};
