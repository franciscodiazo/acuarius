<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptores', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->unique();
            $table->string('apellidos', 100);
            $table->string('nombres', 100);
            $table->string('matricula', 100)->unique();
            $table->string('email')->unique();
            $table->date('fecha_nacimiento');
            $table->string('telefono', 20);
            $table->string('direccion_residencia', 100);
            $table->string('vereda', 100);
            $table->string('sector', 100);
            $table->string('municipio', 100);
            $table->string('pais', 100);
            $table->string('coordenadas', 100);
            $table->string('estado', 100);
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
        Schema::dropIfExists('suscriptores');
    }
}
