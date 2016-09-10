<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('opd_name')->nullable();
            $table->text('opd_description')->nullable();
            $table->string('opd_chancellor')->nullable();
            $table->string('opd_street')->nullable();
            $table->integer('opd_ext_number')->nullable();
            $table->string('opd_int_number')->nullable();
            $table->integer('opd_zip')->nullable();
            $table->string('opd_colony')->nullable();
            $table->string('opd_state')->nullable();
            $table->string('opd_city')->nullable();
            $table->string('opd_web')->nullable();
            $table->string('opd_contact_name')->nullable();
            $table->string('opd_contact_position')->nullable();
            $table->string('opd_contact_email')->nullable();
            $table->integer('opd_contact_phone')->nullable();
            $table->integer('opd_contact_mobile')->nullable();
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
        Schema::drop('opds');
    }
}
