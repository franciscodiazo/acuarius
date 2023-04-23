<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleLecturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_lectura', function (Blueprint $table) {
            $table->id('id');
            $table->integer('matricula');
            $table->date('fecha_lectura');
            $table->integer('lectura_anterior');
            $table->integer('lectura_actual');
            $table->integer('consumo');
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
        Schema::dropIfExists('detalle_lectura');
    }
}
