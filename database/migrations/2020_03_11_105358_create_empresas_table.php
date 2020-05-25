<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('empresas', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('nombre_comercial');
            $table->string('ruc',30);
            $table->string('telf');
            $table->string('correo');
            $table->string('direccion');
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
        Schema::drop('empresas');
	}

}
