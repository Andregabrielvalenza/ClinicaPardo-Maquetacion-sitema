<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('planes', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('id_aseguradora')->unsigned();
            $table->foreign('id_aseguradora')->references('id')->on('aseguradoras')->onDelete('cascade');
            $table->string('nombre');
            $table->bigInteger('id_tipo_de_seguro')->unsigned();
            $table->foreign('id_tipo_de_seguro')->references('id')->on('tipos_de_seguros')->onDelete('cascade');
            $table->decimal('cobertura',8,2)->nullable();
            $table->decimal('interes',8,2)->nullable();
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
        Schema::drop('planes');
	}

}
