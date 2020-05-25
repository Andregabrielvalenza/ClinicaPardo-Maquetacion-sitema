<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioMembresiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('usuario_membresias', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->integer('id_membresia_vigencia')->unsigned()->index();
            $table->foreign('id_membresia_vigencia')->references('id')->on('membresia_vigencias')->onDelete('cascade');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->date('fecha_compra');
            $table->string('transaccion',100);
            $table->decimal('precio_compra',4,2);
            $table->decimal('igv',4,2);
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
        Schema::drop('usuario_membresias');
	}

}
