<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('metas', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('tipo_meta');
            $table->decimal('valor_meta',8,2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('dirigido');
            $table->bigInteger('id_usuario_empresa')->unsigned();
            $table->foreign('id_usuario_empresa')->references('id')->on('usuario_empresas')->onDelete('cascade');
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
        Schema::drop('metas');
	}

}
