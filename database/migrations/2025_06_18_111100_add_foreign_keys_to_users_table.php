<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('dokter_id')
                ->references('id')->on('dokters')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('pasien_id')
                ->references('id')->on('pasiens')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['dokter_id']);
            $table->dropForeign(['pasien_id']);
        });
    }
};
