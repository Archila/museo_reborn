<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('activo')->default(true);
            $table->float('monto', 8, 2);
            $table->date('inicio');
            $table->date('final');

            $table->integer('rango')->unsigned();
            $table->foreign('rango')->references('id')->on('rango_edades');

            $table->integer('tipov')->unsigned();
            $table->foreign('tipov')->references('id')->on('tipo_visitantes');


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
        Schema::dropIfExists('tarifas');
    }
}
