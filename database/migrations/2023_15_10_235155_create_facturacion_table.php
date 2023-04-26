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
         Schema::create('facturacion', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->integer('matricula');
            $table->integer('id_detalle_factura');
            $table->decimal('monto_total', 12, 2);
            $table->enum('estado', ['pendiente', 'pagado']);
            $table->date('fecha_pago');
            $table->string('forma_pago');
            $table->json('detalle');
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
        Schema::dropIfExists('facturas');
    }
}
