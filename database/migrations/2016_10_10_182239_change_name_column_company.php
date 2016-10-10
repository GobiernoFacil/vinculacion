<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameColumnCompany extends Migration
{
  public function up()
     {
         Schema::table('companies', function($t) {
                         $t->renameColumn('razon_scocial', 'razon_social');
                 });
     }


     public function down()
     {
         Schema::table('companies', function($t) {
                         $t->renameColumn('razon_social', 'razon_scocial');
                 });
     }
}
