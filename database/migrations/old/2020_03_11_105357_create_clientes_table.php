<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('clientes', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('nombre',150);
            $table->string('apellido',150);
            $table->string('telf',30);
            $table->string('correo',150);
            $table->string('direccion');
            $table->string('foto_perfil');
            $table->date('fecha_nacimiento');
            $table->char('estado')->default(0);
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('clientes');
	}

}
