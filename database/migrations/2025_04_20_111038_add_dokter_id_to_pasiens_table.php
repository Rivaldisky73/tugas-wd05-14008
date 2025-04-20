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
    Schema::table('pasiens', function (Blueprint $table) {
        $table->unsignedBigInteger('dokter_id')->nullable(); // Add nullable if it's not required initially
        $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('set null'); // or use cascade depending on your needs
    });
}

public function down()
{
    Schema::table('pasiens', function (Blueprint $table) {
        $table->dropForeign(['dokter_id']);
        $table->dropColumn('dokter_id');
    });
}

};
