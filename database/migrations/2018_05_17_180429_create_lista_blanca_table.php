<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaBlancaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_blanca', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email');
            $table->string('sms')->nullable();
            $table->date('fecha_cumpleanios')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('genero')->nullable();
            $table->string('profesion_ocupacion')->nullable();
            $table->string('sector_trabajo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('distrito')->nullable();
            $table->string('provincia')->nullable();
            $table->string('departamento')->nullable();
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
        Schema::dropIfExists('lista_blanca');
    }
}
