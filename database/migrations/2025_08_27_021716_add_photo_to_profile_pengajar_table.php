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
        Schema::table('profile_pengajar', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('whatsapp');
        });
    }

    public function down(): void
    {
        Schema::table('profile_pengajar', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
};
