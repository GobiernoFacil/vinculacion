<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddsSmallBannertoOpds extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::table('opds', function (Blueprint $table) {
          $table->string("small_banner")->nullable();
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
      Schema::table('opds', function (Blueprint $table) {
          //
      });
  }
}
