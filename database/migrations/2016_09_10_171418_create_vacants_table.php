<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('opd_id')->nullable();
            $table->integer('academic_offer_id')->nullable();
            $table->string('vacant_name')->nullable();
            $table->string('vacant_location')->nullable();
            $table->string('vacant_schedule')->nullable();
            $table->string('vacant_salary')->nullable();
            $table->string('vacant_category')->nullable();
            $table->datetime('vacant_expiry_date')->nullable();
            $table->string('vacant_contract_type')->nullable();
            $table->integer('vacant_number')->nullable();
            $table->text('vacant_description')->nullable();
            $table->text('vacant_requirements')->nullable();
            $table->text('vacant_observations')->nullable();
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
        Schema::drop('vacants');
    }
}
