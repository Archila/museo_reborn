<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdquisicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adquisiciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            
            $table->integer('idpieza')->unsigned();
            $table->foreign('idpieza')->references('id')->on('piezas');

            $table->integer('iddonante')->unsigned();
            $table->foreign('iddonante')->references('id')->on('donantes');

            $table->integer('idempleado')->unsigned();
            $table->foreign('idempleado')->references('id')->on('empleados');

            $table->integer('idtipoad')->unsigned();
            $table->foreign('idtipoad')->references('id')->on('tipo_adquisiciones');


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
        Schema::dropIfExists('adquisiciones');
    }
}
