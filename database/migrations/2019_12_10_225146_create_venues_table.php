<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('venues', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name')->unique();
      $table->string('address');
      $table->string('locality');
      $table->string('postal');
      $table->string('region');
      $table->string('country');
      $table->string('link');
      $table->text('map');
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
    Schema::dropIfExists('venues');
  }
}
