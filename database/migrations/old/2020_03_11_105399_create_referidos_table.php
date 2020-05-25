<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('referidos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('id_lider')->unsigned();
            $table->foreign('id_lider')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_miembro')->unsigned();
            $table->foreign('id_miembro')->references('id')->on('users')->onDelete('cascade');
            $table->char('estado',1);
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
        Schema::drop('referidos');
	}

}
