<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->unsignedBigInteger('aseguradora_id');
            $table->foreign('aseguradora_id')->references('id')->on('aseguradoras')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('tipo_seguro_id');
            $table->foreign('tipo_seguro_id')->references('id')->on('tipo_seguros')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('seguros');
    }
}
