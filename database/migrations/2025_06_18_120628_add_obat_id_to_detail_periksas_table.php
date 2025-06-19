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
        $table->unsignedBigInteger('obat_id')->after('periksa_id');
        $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('detail_periksas', function (Blueprint $table) {
        $table->dropForeign(['obat_id']);
        $table->dropColumn('obat_id');
    });
}

};
