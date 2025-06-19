<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->unsignedBigInteger('dokter_id')->after('pasien_id');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->dropForeign(['dokter_id']);
            $table->dropColumn('dokter_id');
        });
    }
};
