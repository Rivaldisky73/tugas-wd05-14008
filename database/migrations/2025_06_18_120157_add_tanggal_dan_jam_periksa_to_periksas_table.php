<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->date('tanggal_periksa')->after('dokter_id');
            $table->time('jam_periksa')->after('tanggal_periksa');
        });
    }

    public function down(): void
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->dropColumn(['tanggal_periksa', 'jam_periksa']);
        });
    }
};
