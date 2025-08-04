<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::table('diskusi', function (Blueprint $table) {
            $table->unsignedBigInteger('pengajar_id')->after('id');
            $table->foreign('pengajar_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('diskusi', function (Blueprint $table) {
            $table->dropForeign(['pengajar_id']);
            $table->dropColumn('pengajar_id');
        });
    }
};
