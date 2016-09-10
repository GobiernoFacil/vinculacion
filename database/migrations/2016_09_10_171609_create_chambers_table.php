<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChambersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id');
            $table->string('chamber_rfc')->unique();
            $table->string('chamber_comercial_name')->nullable();
            $table->string('chamber_social_reason')->nullable();
            $table->string('chamber_comercial_activity')->nullable();
            $table->string('chamber_activity_sector')->nullable();
            $table->string('chamber_sector')->nullable();
            $table->text('chamber_description')->nullable();
            $table->string('chamber_ceo')->nullable();
            $table->string('chamber_street')->nullable();
            $table->integer('chamber_ext_number')->nullable();
            $table->string('chamber_int_number')->nullable();
            $table->integer('chamber_zip')->nullable();
            $table->string('chamber_colony')->nullable();
            $table->string('chamber_state')->nullable();
            $table->string('chamber_city')->nullable();
            $table->string('chamber_web')->nullable();
            $table->string('chamber_contact_name')->nullable();
            $table->string('chamber_contact_position')->nullable();
            $table->string('chamber_contact_email')->nullable();
            $table->integer('chamber_contact_phone')->nullable();
            $table->integer('chamber_contact_mobile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chambers');
    }
}
