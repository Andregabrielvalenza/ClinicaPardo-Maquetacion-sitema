<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('usuario_empresas', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->nullable();
            $table->bigInteger('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->date('fecha_add');
            $table->string('cargo');
            $table->string('codigo_acceso',10);
            $table->char('estado',1);
            $table->string('nickname',100);
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
        Schema::drop('usuario_empresas');
	}

}
