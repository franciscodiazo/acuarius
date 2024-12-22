<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('lectura_id'); // Nuevo campo para referenciar la lectura
            $table->string('descripcion');
            $table->decimal('cantidad', 10, 2);
            $table->decimal('precio_unitario', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->decimal('impuesto', 15, 2);
            $table->decimal('total', 15, 2);
            $table->timestamps();
    
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('lectura_id')->references('id')->on('lecturas')->onDelete('cascade'); // Relación con la tabla lecturas
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('detalle_facturas');
    }
    /**
     * Reverse the migrations.     
    public function down(): void
    {
        Schema::table('detalle_facturas', function (Blueprint $table) {
            $table->dropForeign(['lectura_id']);
            $table->dropColumn('lectura_id');
        });
    }*/    
};
