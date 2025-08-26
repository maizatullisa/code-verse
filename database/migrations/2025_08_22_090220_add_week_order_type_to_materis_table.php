<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->unsignedInteger('week_number')->default(1)->after('status');
            $table->unsignedInteger('order')->default(1)->after('week_number');
            $table->enum('type', ['materi', 'quiz'])->default('materi')->after('order');
        });
    }

    public function down()
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->dropColumn(['week_number', 'order', 'type']);
        });
    }
};
