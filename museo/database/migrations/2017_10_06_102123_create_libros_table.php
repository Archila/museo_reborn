<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('anio');
            $table->string('edicion');
            $table->string('paginas');

            $table->integer('idautor')->unsigned();
            $table->foreign('idautor')->references('id')->on('autores');

            $table->integer('ideditorial')->unsigned();
            $table->foreign('ideditorial')->references('id')->on('editoriales');

            $table->integer('idcategoria')->unsigned();
            $table->foreign('idcategoria')->references('id')->on('categorias');

            $table->integer('idempleado')->unsigned();
            $table->foreign('idempleado')->references('id')->on('empleados');
            
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
        Schema::dropIfExists('libros');
    }
}
