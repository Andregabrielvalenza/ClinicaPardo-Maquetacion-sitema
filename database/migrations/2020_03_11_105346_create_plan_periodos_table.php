<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanPeriodosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('plan_periodos', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('cascade');
            $table->bigInteger('id_plan')->unsigned();
            $table->foreign('id_plan')->references('id')->on('planes')->onDelete('cascade');
            $table->decimal('prima',8,2);
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
        Schema::drop('plan_periodos');
	}

}
