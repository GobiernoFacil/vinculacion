<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOpdAndLocationToAcademicOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academic_offers', function (Blueprint $table) {
            $table->string("opd")->nullable();
            $table->string("city")->nullable();
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
        Schema::table('academic_offers', function (Blueprint $table) {
            //
        });
    }
}
