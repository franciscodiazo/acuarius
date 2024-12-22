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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('numero_factura')->unique();
            $table->timestamp('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->string('cufe')->nullable();
            $table->decimal('subtotal', 15, 2);
            $table->decimal('impuestos', 15, 2);
            $table->decimal('total', 15, 2);
            $table->enum('estado', ['pendiente', 'pagada', 'anulada'])->default('pendiente');
            $table->string('metodo_pago')->nullable(); // Campo para método de pago
            $table->timestamp('fecha_pago')->nullable(); // Campo para fecha de pago
            $table->timestamps();
            
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};