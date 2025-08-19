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
            Schema::create('course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            
            // Data dari Step 1 - Personal Information
            $table->string('full_name');
            $table->string('email');
            $table->string('whatsapp');
            $table->date('birth_date');
            $table->string('education');
            $table->enum('experience', ['beginner', 'basic', 'intermediate', 'advanced'])->nullable();
            $table->text('motivation')->nullable();
            
            // Data dari Step 2 - Learning Preferences
            $table->json('features')->nullable(); // untuk checkbox benefit
            $table->text('goals')->nullable();
            
            // Status dan metadata
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->boolean('newsletter_subscription')->default(false);
            $table->timestamp('enrolled_at')->nullable();
            
            $table->timestamps();
            
            // Prevent duplicate enrollment
            $table->unique(['user_id', 'kelas_id'], 'unique_user_kelas_enrollment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_enrollments');
    }

};
