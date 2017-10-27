<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasInformativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_informativas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('historia',800);
            $table->string('multimedia',500)->nullable();
            $table->string('video',550)->nullable();
            $table->string('epoca',50)->nullable();
            $table->integer('id_pieza')->unsigned();
            $table->foreign('id_pieza')->references('id')->on('piezas');
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
        Schema::dropIfExists('fichas_informativas');
    }
}
