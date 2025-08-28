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
        Schema::create('profile_pengajar', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('nip')->unique();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->text('address')->nullable();

            // Academic info
            $table->string('academic_position')->nullable();
            $table->string('expertise')->nullable();
            $table->string('faculty')->nullable();
            $table->string('study_program')->nullable();

            // Contact info
            $table->string('institutional_email')->nullable()->unique();
            $table->string('personal_email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();

            

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_pengajar');
    }
};
