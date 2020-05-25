<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('notificaciones', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->date('fecha_enviado');
            $table->string('remitente');
            $table->string('asunto');
            $table->text('mensaje');
            $table->string('adjunto');
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
        Schema::drop('notificaciones');
	}

}
