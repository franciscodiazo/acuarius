<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lecturas', function (Blueprint $table) {
            $table->id();
            $table->string('matricula'); // Matrícula del cliente o usuario.
            $table->decimal('lectura_anterior', 8, 2); // Lectura anterior del medidor.
            $table->decimal('lectura_actual', 8, 2); // Lectura actual del medidor.
            $table->decimal('consumo', 8, 2)->nullable(); // Consumo calculado (puede ser nulo).
            $table->date('fecha'); // Fecha de la lectura.
            $table->integer('ciclo_facturado'); // Ciclo al que corresponde la lectura.
            $table->boolean('facturada')->default(false); // Estado de facturación por defecto false.
            $table->timestamps(); // Timestamps para created_at y updated_at.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturas');
    }
}
