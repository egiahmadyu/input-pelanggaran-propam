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
            $table->string('dp3d_bp3kkepp')->nullable();
            $table->string('tanggal_dp3d_bp3kkepp')->nullable();
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
