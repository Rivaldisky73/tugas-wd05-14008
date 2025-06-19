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
    Schema::table('periksas', function (Blueprint $table) {
        $table->decimal('biaya_periksa', 65, 2)->change();
    });
}

public function down()
{
    Schema::table('periksas', function (Blueprint $table) {
        $table->decimal('biaya_periksa', 20, 2)->change(); // default sebelumnya
    });
}

};
