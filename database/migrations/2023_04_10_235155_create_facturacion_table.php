<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento')->nullable();
            $table->unsignedBigInteger('matricula');
            $table->foreign('matricula')->references('matricula')->on('suscriptores');
            $table->decimal('monto_total', 8, 2);
            $table->enum('estado', ['pendiente', 'pagada', 'anulada']);
            $table->date('fecha_pago')->nullable();
            $table->string('forma_pago')->nullable();
            $table->json('detalle');
            $table->unsignedBigInteger('id_detallefactura');
            $table->foreign('id_detallefactura')->references('id')->on('detallefactura');
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
        Schema::dropIfExists('facturacion');
    }
}
