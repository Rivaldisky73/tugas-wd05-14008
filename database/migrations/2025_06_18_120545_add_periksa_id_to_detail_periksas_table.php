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
    Schema::table('detail_periksas', function (Blueprint $table) {
        $table->unsignedBigInteger('periksa_id')->after('id');
        $table->foreign('periksa_id')->references('id')->on('periksas')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('detail_periksas', function (Blueprint $table) {
        $table->dropForeign(['periksa_id']);
        $table->dropColumn('periksa_id');
    });
}

};
