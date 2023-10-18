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
        Schema::create('history_edits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('data_pelanggar_id');
            $table->bigInteger('edited_by');
            $table->timestamps();
        });

        Schema::table('pelanggaran_lists', function (Blueprint $table) {
            $table->bigInteger('edited_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_edits');
    }
};
