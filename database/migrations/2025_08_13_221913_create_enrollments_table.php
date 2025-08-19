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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->timestamp('enrolled_at')->default(now());
            $table->timestamp('completed_at')->nullable();
            $table->decimal('progress', 5, 2)->default(0.00); // Progress dalam persen
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Prevent duplicate enrollment
            $table->unique(['user_id', 'kelas_id']);
            
            // Index untuk performa
            $table->index(['user_id', 'kelas_id']);
            $table->index('status');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
