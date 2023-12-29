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
        Schema::create('putusan_sidang_p_k_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sidang_pk_id');
            $table->string('putusan');
            $table->bigInteger('putusan_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('putusan_sidang_p_k_s');
    }
};
