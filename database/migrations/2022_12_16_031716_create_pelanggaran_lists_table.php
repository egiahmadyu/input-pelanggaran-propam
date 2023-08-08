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
        Schema::create('pelanggaran_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('jenis_pelanggaran');
            $table->string('nrp_nip')->nullable();
            $table->string('nama')->nullable();
            $table->integer('jenis_kelamin');
            $table->integer('pangkat');
            $table->text('jabatan')->nullable();
            $table->integer('diktuk')->nullable();
            $table->integer('polda')->nullable();
            $table->integer('polres')->nullable();
            $table->integer('polsek')->nullable();
            $table->string('nolp')->nullable();
            $table->date('tgllp')->nullable();
            $table->integer('wujud_perbuatan')->nullable();
            $table->text('kronologi_singkat')->nullable();
            $table->text('pasal_pelanggaran')->nullable();
            $table->string('pidana')->nullable();
            $table->integer('wujud_perbuatan_pidana')->nullable();
            $table->text('pasal_pidana')->nullable();
            $table->string('nolp_pidana')->nullable();
            $table->date('tgllp_pidana')->nullable();
            $table->integer('peran_narkoba')->nullable();
            $table->integer('jenis_narkoba')->nullable();
            $table->string('no_kep')->nullable();
            $table->date('tgl_kep')->nullable();
            $table->integer('putusan_1')->nullable();
            $table->integer('putusan_2')->nullable();
            $table->integer('putusan_3')->nullable();
            $table->integer('putusan_4')->nullable();
            $table->integer('putusan_5')->nullable();
            $table->integer('putusan_6')->nullable();
            $table->integer('putusan_7')->nullable();
            $table->integer('putusan_8')->nullable();
            $table->integer('putusan_9')->nullable();
            $table->integer('putusan_10')->nullable();
            $table->integer('putusan_11')->nullable();
            $table->integer('putusan_12')->nullable();
            $table->string('nokepsp3')->nullable();
            $table->date('tglkepsp3')->nullable();



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
        Schema::dropIfExists('pelanggaran_lists');
    }
};
