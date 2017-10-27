<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piezas', function (Blueprint $table) {
          
            $table->increments('id');
            $table->string('cod_pieza',200);
            $table->string('nombre',250);
            $table->boolean('activo')->default(true);
            $table->string('codigo_qr',250)->nullable();
            $table->string('fotografia',250)->nullable();
            $table->integer('id_tipopieza')->unsigned();
            $table->foreign('id_tipopieza')->references('id_tipo')->on('tipo_piezas');
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
        Schema::dropIfExists('piezas');
    }
}
