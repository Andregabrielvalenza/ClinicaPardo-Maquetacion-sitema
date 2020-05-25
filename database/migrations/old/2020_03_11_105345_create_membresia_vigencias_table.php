<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresiaVigenciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('membresia_vigencias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_membresia')->unsigned()->index();
            $table->foreign('id_membresia')->references('id')->on('membresias')->onDelete('cascade');
            $table->integer('id_vigencia')->unsigned()->index();
            $table->foreign('id_vigencia')->references('id')->on('vigencias')->onDelete('cascade');
            $table->decimal('precio',4,2);
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
        Schema::drop('membresia_vigencias');
	}

}
