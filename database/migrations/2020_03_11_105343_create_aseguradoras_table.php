<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAseguradorasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('aseguradoras', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('correo');
            $table->string('telf',30);
            $table->string('ruc',30);
            $table->string('direccion');
            $table->string('nombre_contacto');
            $table->string('apellido_contacto');
            $table->string('telf_contacto');
            $table->string('correo_contacto');
            $table->string('logo');
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
        Schema::drop('aseguradoras');
	}

}
