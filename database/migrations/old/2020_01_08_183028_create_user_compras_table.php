<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('planes')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('plan_variacion_id');
            $table->decimal('monto',8,2);
            $table->string('transaccion',100);
            $table->string('codigo_venta',10);
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
        Schema::dropIfExists('user_compras');
    }
}
