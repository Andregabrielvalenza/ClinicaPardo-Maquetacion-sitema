<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_agentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo',10);
            $table->datetime('verificado_el');
            $table->char('activo',1)->default(1);
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('user_empresas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('empresa_agentes');
    }
}
