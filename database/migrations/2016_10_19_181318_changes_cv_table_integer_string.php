<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesCvTableIntegerString extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::table('cvs', function (Blueprint $table) {
        $table->string('city')->nullable()->change();
        $table->string('state')->nullable()->change();
        $table->string('country')->nullable()->change();
        $table->string('email')->nullable()->change();
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
      Schema::table('cvs', function (Blueprint $table) {
          //
      });
  }
}
