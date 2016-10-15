<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postcodes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("_id")->nullable();
            $table->string("codigo_postal_asentamiento")->nullable();
            $table->string("nombre_asentamiento")->nullable();
            $table->string("tipo_asentamiento")->nullable();
            $table->string("nombre_municipio")->nullable();
            $table->string("nombre_estado")->nullable();
            $table->string("nombre_ciudad")->nullable();
            $table->string("codigo_postal_oficina")->nullable();
            $table->string("clave_estado")->nullable();
            $table->string("codigo_postal_oficina_")->nullable();
            $table->string("c_cp_vacio")->nullable();
            $table->string("clave_tipo_asentamiento")->nullable();
            $table->string("clave_municipio")->nullable();
            $table->string("identificador_asentamiento")->nullable();
            $table->string("zona_asentamiento")->nullable();
            $table->string("clave_interna_cp_ciudad")->nullable();
            
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
        Schema::drop('postcodes');
    }
}
