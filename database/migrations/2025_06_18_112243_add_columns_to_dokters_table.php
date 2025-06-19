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
    Schema::table('dokters', function (Blueprint $table) {
        $table->string('nama')->nullable();
        $table->string('spesialis')->nullable();
        $table->string('no_hp')->nullable();
        $table->text('alamat')->nullable();
        $table->unsignedBigInteger('id_poli')->nullable();
        $table->unsignedBigInteger('user_id')->nullable();
    });
}

public function down()
{
    Schema::table('dokters', function (Blueprint $table) {
        $table->dropColumn(['nama', 'spesialis', 'no_hp', 'alamat', 'id_poli', 'user_id']);
    });
}

};
