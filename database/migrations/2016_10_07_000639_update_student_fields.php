<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStudentFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // matricula    nombre  apellido_paterno    apellido_materno    curp    carrera status
          $table->string('matricula')->nullable();
          $table->string('nombre')->nullable();
          $table->string('apellido_paterno')->nullable();
          $table->string('apellido_materno')->nullable();
          $table->string('curp')->nullable();
          $table->string('carrera')->nullable();
          $table->string('status')->nullable();
          $table->string('nombre_completo')->nullable();

          $table->dropColumn('student_registration_id');
          $table->dropColumn('student_name');
          $table->dropColumn('student_primary_last_name');
          $table->dropColumn('student_second_last_name');
          $table->dropColumn('student_street');
          $table->dropColumn('student_ext_number');
          $table->dropColumn('student_int_number');
          $table->dropColumn('student_zip');
          $table->dropColumn('student_colony');
          $table->dropColumn('student_state');
          $table->dropColumn('student_city');
          $table->dropColumn('student_phone');
          $table->dropColumn('student_mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
