@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Lectura</h1>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('lecturas.update', $lectura->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4">
                <div class="mb-4">
                    <label for="matricula" class="block text-gray-700 mb-2">Matrícula:</label>
                    <input type="text" id="matricula" name="matricula" class="border border-gray-300 p-2 rounded w-1/3" value="{{ $lectura->matricula }}" readonly>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="mb-4">
                        <label for="lectura_actual" class="block text-gray-700 mb-2">Nueva Lectura:</label>
                        <input type="text" id="lectura_actual" name="lectura_actual" class="border border-gray-300 p-2 rounded w-full" value="{{ $lectura->lectura_actual }}" oninput="calcularConsumo()" required>
                    </div>

                    <div class="mb-4">
                        <label for="lectura_anterior" class="block text-gray-700 mb-2">Última Lectura Registrada:</label>
                        <input type="text" id="lectura_anterior" name="lectura_anterior" class="border border-gray-300 p-2 rounded w-full" value="{{ $lectura->lectura_anterior }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="consumo" class="block text-gray-700 mb-2">Consumo Calculado:</label>
                        <input type="text" id="consumo" name="consumo" class="border border-gray-300 p-2 rounded w-full" value="{{ $lectura->consumo }}" readonly>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="ciclo_facturado" class="block text-gray-700 mb-2">Ciclo:</label>
                        <input type="number" id="ciclo_facturado" name="ciclo_facturado" class="border border-gray-300 p-2 rounded w-full" value="{{ $lectura->ciclo_facturado }}" min="1" max="12" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="fecha" class="block text-gray-700 mb-2">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" class="border border-gray-300 p-2 rounded w-full" value="{{ $lectura->fecha instanceof \DateTime ? $lectura->fecha->format('Y-m-d') : $lectura->fecha }}" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Actualizar Lectura</button>
        </form>
    </div>
</div>

<script>
    function calcularConsumo() {
        const lecturaAnterior = parseFloat(document.getElementById('lectura_anterior').value) || 0;
        const lecturaActual = parseFloat(document.getElementById('lectura_actual').value) || 0;
        const consumo = lecturaActual - lecturaAnterior;
        document.getElementById('consumo').value = consumo.toFixed(2);
    }
</script>
@endsection
