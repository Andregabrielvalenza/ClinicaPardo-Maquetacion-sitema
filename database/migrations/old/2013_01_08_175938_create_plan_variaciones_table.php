<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanVariacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_variaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('descuento');
            $table->integer('periodo');
            $table->char('activo',1)->default(1);
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('planes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('plan_variaciones');
    }
}
