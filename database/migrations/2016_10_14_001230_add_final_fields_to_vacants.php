<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinalFieldsToVacants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacants', function (Blueprint $table) {
          $table->string('job')->nullable();
          $table->text('tags')->nullable();
          $table->integer('age_from')->nullable();
          $table->integer('age_to')->nullable();
          $table->boolean('travel')->nullable();
          $table->boolean('location')->nullable();
          $table->text('experience')->nullable();
          $table->float('salary')->nullable();
          $table->string('work_from')->nullable();
          $table->string('work_to')->nullable();
          $table->string('benefits')->nullable();
          $table->string('expenses')->nullable();
          $table->string('training')->nullable();

          $table->string('state')->nullable();
          $table->string('city')->nullable();

          $table->float('salary_min')->nullable();
          $table->float('salary_max')->nullable();
          $table->string('salary_type')->nullable();
          $table->integer('salary_variable')->nullable();
          $table->integer('salary_extra')->nullable();

          $table->string('personality')->nullable();
          $table->string('contract_level')->nullable();
          $table->string('contract_type')->nullable();

          $table->string('speciality')->nullable();

          $table->boolean('status')->nullable();

          $table->dropColumn('academic_offer_id');
          $table->dropColumn('vacant_name');
          $table->dropColumn('vacant_location');
          $table->dropColumn('vacant_schedule');
          $table->dropColumn('vacant_salary');
          $table->dropColumn('vacant_category');
          $table->dropColumn('vacant_expiry_date');
          $table->dropColumn('vacant_contract_type');
          $table->dropColumn('vacant_number');
          $table->dropColumn('vacant_description');
          $table->dropColumn('vacant_requirements');
          $table->dropColumn('vacant_observations');
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
