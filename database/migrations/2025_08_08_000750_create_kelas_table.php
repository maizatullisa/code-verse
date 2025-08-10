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
            Schema::create('kelas', function (Blueprint $table) {
                $table->id();
                $table->string('nama_kelas');
                $table->enum('kategori', [
                    'programming', 
                    'design', 
                    'web', 
                    'mobile', 
                    'data', 
                    'ai', 
                    'marketing', 
                    'business'
                ]);
                $table->enum('level', ['beginner', 'intermediate', 'advanced']);
                $table->text('deskripsi');
                $table->string('durasi')->nullable();
                $table->integer('kapasitas')->default(9999);
                $table->decimal('harga', 12, 2)->default(0);
                $table->enum('status', ['draft', 'published'])->default('draft');
                $table->string('cover_image')->nullable();
                $table->foreignId('pengajar_id')->constrained('users')->onDelete('cascade');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
