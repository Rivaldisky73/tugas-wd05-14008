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
        if (!Schema::hasColumn('pasiens', 'nama')) {
            $table->string('nama')->nullable();
        }
        if (!Schema::hasColumn('pasiens', 'jenis_kelamin')) {
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
        }
        if (!Schema::hasColumn('pasiens', 'no_hp')) {
            $table->string('no_hp')->nullable();
        }
        if (!Schema::hasColumn('pasiens', 'alamat')) {
            $table->text('alamat')->nullable();
        }
        if (!Schema::hasColumn('pasiens', 'tanggal_lahir')) {
            $table->date('tanggal_lahir')->nullable();
        }
    });
}

public function down()
{
    Schema::table('pasiens', function (Blueprint $table) {
        $table->dropColumn(['nama', 'jenis_kelamin', 'no_hp', 'alamat', 'tanggal_lahir']);
    });
}

};
