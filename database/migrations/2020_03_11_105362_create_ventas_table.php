<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('ventas', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->date('fecha_compra');
            $table->decimal('prima',8,2);
            $table->decimal('igv',8,2);
            $table->bigInteger('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->bigInteger('id_usuario_empresa')->unsigned();
            $table->foreign('id_usuario_empresa')->references('id')->on('usuario_empresas')->onDelete('cascade');
            $table->bigInteger('id_plan_periodo')->unsigned();
            $table->foreign('id_plan_periodo')->references('id')->on('plan_periodos')->onDelete('cascade');
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
        Schema::drop('ventas');
	}

}
