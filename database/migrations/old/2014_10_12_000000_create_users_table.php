<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('telefono',20)->nullable;;
            $table->string('imagen')->nullable;;
            $table->date('fecha_nacimiento')->nullable;;
            $table->string('email')->unique()->nullable;
            $table->string('provider')->nullable;
            $table->string('provider_id')->nullable;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable;
            $table->char('activo',1)->default(1);
            $table->date('caducidad_membresia')->nullable;
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('planes')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
