<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FichasTecnicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_tecnicas', function (Blueprint $table) {
            $table->increments('id');
            $table->float('peso', 8, 2)->nullable();
            $table->float('altura', 8, 2)->nullable();
            $table->float('ancho', 8, 2)->nullable();
            $table->integer('genero')->unsigned();
            $table->foreign('genero')->references('id')->on('generos');
            
            $table->integer('idpieza')->unsigned();
            $table->foreign('idpieza')->references('id')->on('piezas');
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
        Schema::dropIfExists('fichas_tecnicas');
    }
}
