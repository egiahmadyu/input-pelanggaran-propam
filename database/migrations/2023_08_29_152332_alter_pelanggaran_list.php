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
            $table->enum('pelanggar', ['asn', 'polri']);
            $table->string('penyelesaian');
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
