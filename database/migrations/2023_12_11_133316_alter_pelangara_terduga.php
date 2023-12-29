<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelanggaran_lists', function (Blueprint $table) {
            $table->integer('polda_terduga')->nullable();
            $table->integer('polres_terduga')->nullable();
            $table->integer('polsek_terduga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggaran_lists', function (Blueprint $table) {
            //
        });
    }
};
