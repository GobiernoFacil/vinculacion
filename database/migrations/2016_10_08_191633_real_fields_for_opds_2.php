<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RealFieldsForOpds2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opds', function (Blueprint $table) {
            $table->string("name")->nullable();
            $table->string("url")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("address")->nullable();
            $table->string("zip")->nullable();

            $table->dropColumn('opd_name');
            $table->dropColumn('opd_description');
            $table->dropColumn('opd_chancellor');
            $table->dropColumn('opd_street');
            $table->dropColumn('opd_ext_number');
            $table->dropColumn('opd_int_number');
            $table->dropColumn('opd_zip');
            $table->dropColumn('opd_colony');
            $table->dropColumn('opd_state');
            $table->dropColumn('opd_city');
            $table->dropColumn('opd_web');
            $table->dropColumn('opd_contact_name');
            $table->dropColumn('opd_contact_position');
            $table->dropColumn('opd_contact_email');
            $table->dropColumn('opd_contact_phone');
            $table->dropColumn('opd_contact_mobile');
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
        Schema::table('opds', function (Blueprint $table) {
            //
        });
    }
}
