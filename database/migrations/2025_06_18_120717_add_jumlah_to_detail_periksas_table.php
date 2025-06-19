<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('detail_periksas', function (Blueprint $table) {
            $table->integer('jumlah')->default(1);
        });
    }

    public function down(): void
    {
        Schema::table('detail_periksas', function (Blueprint $table) {
            $table->dropColumn('jumlah');
        });
    }
};

