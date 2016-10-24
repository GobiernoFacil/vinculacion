<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultiUserTypeForVacancies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacants', function (Blueprint $table) {
            $table->integer("vacancy_id")->nullable();
            $table->string("vacancy_type")->nullable();
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
        Schema::table('vacants', function (Blueprint $table) {
            //
        });
    }
}
