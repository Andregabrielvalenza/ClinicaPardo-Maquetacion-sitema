<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_seguros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('comision',8,2);
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('user_empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('seguro_id');
            $table->foreign('seguro_id')->references('id')->on('seguros')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('empresa_seguros');
    }
}
