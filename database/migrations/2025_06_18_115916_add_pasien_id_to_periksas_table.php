<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasienIdToPeriksasTable extends Migration
{
    public function up()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->unsignedBigInteger('pasien_id')->after('id');

            // Jika ada tabel pasien, buat foreign key:
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->dropForeign(['pasien_id']);
            $table->dropColumn('pasien_id');
        });
    }
}
