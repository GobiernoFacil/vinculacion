<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('creator_id')->nullable();
            $table->string('company_rfc')->unique();
            $table->string('company_email')->nullable();
            $table->string('company_comercial_name')->nullable();
            $table->string('company_social_reason')->nullable();
            $table->string('company_comercial_activity')->nullable();
            $table->string('company_activity_sector')->nullable();
            $table->string('company_sector')->nullable();
            $table->text('company_description')->nullable();
            $table->string('company_ceo')->nullable();
            $table->string('company_street')->nullable();
            $table->integer('company_ext_number')->nullable();
            $table->string('company_int_number')->nullable();
            $table->integer('company_zip')->nullable();
            $table->string('company_colony')->nullable();
            $table->string('company_state')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_web')->nullable();
            $table->string('company_contact_name')->nullable();
            $table->string('company_contact_position')->nullable();
            $table->string('company_contact_email')->nullable();
            $table->integer('company_contact_phone')->nullable();
            $table->integer('company_contact_mobile')->nullable();
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
        Schema::drop('companies');
    }
}
