<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaPlanesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('empresa_planes', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->bigInteger('id_plan')->unsigned();
            $table->foreign('id_plan')->references('id')->on('planes')->onDelete('cascade');
            $table->decimal('comision',8,2);
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
        Schema::drop('empresa_planes');
	}

}
