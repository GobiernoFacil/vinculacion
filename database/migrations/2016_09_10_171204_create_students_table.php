<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_registration_id')->unique();
            $table->integer('user_id');
            $table->integer('opd_id');
            $table->integer('creator_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('creator_id')->nullable();
            $table->string('student_name')->nullable();
            $table->string('student_primary_last_name')->nullable();
            $table->string('student_second_last_name')->nullable();
            $table->string('student_street')->nullable();
            $table->integer('student_ext_number')->nullable();
            $table->string('student_int_number')->nullable();
            $table->integer('student_zip')->nullable();
            $table->string('student_colony')->nullable();
            $table->string('student_state')->nullable();
            $table->string('student_city')->nullable();
            $table->integer('student_phone')->nullable();
            $table->integer('student_mobile')->nullable();
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
        Schema::drop('students');
    }
}
