<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCompanyFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
          $table->string("rfc")->nullable();
          $table->string("razon_scocial")->nullable();
          $table->string("nombre_comercial")->nullable();
          $table->string("address")->nullable();
          $table->string("zip")->nullable();
          $table->string("phone")->nullable();
          $table->string("email")->nullable();
          $table->string("giro_comercial")->nullable();
          $table->string("alcance")->nullable();
          $table->string("type")->nullable();
          $table->string("size")->nullable();

          $table->dropColumn('company_rfc');
          $table->dropColumn('company_comercial_name');
          $table->dropColumn('company_social_reason');
          $table->dropColumn('company_comercial_activity');
          $table->dropColumn('company_activity_sector');
          $table->dropColumn('company_sector');
          $table->dropColumn('company_description');
          $table->dropColumn('company_ceo');
          $table->dropColumn('company_street');
          $table->dropColumn('company_ext_number');
          $table->dropColumn('company_int_number');
          $table->dropColumn('company_zip');
          $table->dropColumn('company_colony');
          $table->dropColumn('company_state');
          $table->dropColumn('company_city');
          $table->dropColumn('company_web');
          $table->dropColumn('company_contact_name');
          $table->dropColumn('company_contact_position');
          $table->dropColumn('company_contact_email');
          $table->dropColumn('company_contact_phone');
          $table->dropColumn('company_contact_mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
