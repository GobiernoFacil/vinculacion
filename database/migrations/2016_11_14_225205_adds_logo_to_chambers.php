<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddsLogoToChambers extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::table('chambers', function (Blueprint $table) {
          $table->string("chamber_logo")->nullable();
          //
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::table('chambers', function (Blueprint $table) {
          //
      });
  }
}
