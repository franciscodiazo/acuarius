@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Informes y Estadísticas</h1>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-100 p-4 rounded shadow">
            <h2 class="text-xl font-bold text-blue-800">Total Recaudado en el Año</h2>
            <p class="text-2xl font-bold text-blue-600">${{ number_format($totalAnual, 2) }}</p>
        </div>
        <div class="bg-green-100 p-4 rounded shadow">
            <h2 class="text-xl font-bold text-green-800">Total Recaudado en el Mes</h2>
            <p class="text-2xl font-bold text-green-600">${{ number_format($totalMensual, 2) }}</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded shadow">
            <h2 class="text-xl font-bold text-yellow-800">Facturas Pendientes</h2>
            <p class="text-2xl font-bold text-yellow-600">{{ $totalPendientes }}</p>
        </div>
        <div class="bg-purple-100 p-4 rounded shadow">
            <h2 class="text-xl font-bold text-purple-800">Recaudo Diario</h2>
            <p class="text-2xl font-bold text-purple-600">${{ number_format($recaudoDiario, 2) }}</p>
        </div>
    </div>

    <!-- Búsqueda por Fecha -->
    <form method="GET" action="{{ route('informes.index') }}" class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="start_date" class="block text-gray-700">Fecha Inicio</label>
                <input type="date" id="start_date" name="start_date" value="{{ $startDate }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div>
                <label for="end_date" class="block text-gray-700">Fecha Fin</label>
                <input type="date" id="end_date" name="end_date" value="{{ $endDate }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Recaudo por Fecha -->
    @if($recaudoPorFecha !== null)
        <div class="bg-gray-100 p-4 rounded shadow mb-6">
            <h2 class="text-xl font-bold text-gray-800">Recaudo en el Rango Seleccionado</h2>
            <p class="text-2xl font-bold text-gray-600">${{ number_format($recaudoPorFecha, 2) }}</p>
        </div>
    @endif
</div>
@endsection
