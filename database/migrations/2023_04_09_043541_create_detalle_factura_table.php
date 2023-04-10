<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_detalle_lectura');
            $table->string('ciclo');
            $table->date('ultima_fecha_lectura');
            $table->integer('lectura_anterior');
            $table->integer('lectura_actual');
            $table->integer('consumo');
            $table->decimal('valor_total', 8, 2);
            $table->timestamps();
            $table->foreignId('matricula')->constrained('suscriptores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_factura');
    }
}
