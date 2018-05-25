<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlancaListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blanca_lista', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lista_blanca_id')->unsigned();
            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_blanca_id')->references('id')
                                                    ->on('lista_blanca')
                                                    ->onDelete('cascade')
                                                    ->onUpdate('cascade');
            $table->foreign('lista_id')->references('id')
                ->on('listas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('blanca_lista');
    }
}
