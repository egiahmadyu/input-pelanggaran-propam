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
    Schema::create('side_menus', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('icon')->nullable();
      $table->string('url', 250)->nullable();
      $table->integer('parent_id')->nullable();
      $table->integer('type');
      $table->integer('sort')->nullable();
      $table->string('permission')->nullable();
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
    Schema::dropIfExists('side_menus');
  }
};
