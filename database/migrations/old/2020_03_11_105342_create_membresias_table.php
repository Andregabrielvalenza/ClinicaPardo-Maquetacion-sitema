<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('membresias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre',40);
            $table->text('descripcion')->nullable();
            $table->string('resumen',255);
            $table->string('icono',255);
            $table->string('rol',50);
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
        Schema::drop('membresias');
	}

}
