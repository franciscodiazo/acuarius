@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Facturas Pendientes de Pago</h1>

    <!-- Estadísticas -->
    <div class="mb-4 bg-blue-100 p-4 rounded shadow">
        <p class="text-blue-800 font-bold">Total de Facturas Pendientes: {{ $totalPendientes }}</p>
    </div>

    <form method="POST" action="{{ route('facturas.printRange') }}" target="_blank" class="mb-4">
    @csrf
    <div class="flex items-center gap-4">
        <input 
            type="text" 
            name="start_range" 
            placeholder="Número de Factura Inicial" 
            class="border border-gray-300 rounded px-3 py-2"
            required
        >
        <input 
            type="text" 
            name="end_range" 
            placeholder="Número de Factura Final" 
            class="border border-gray-300 rounded px-3 py-2"
            required
        >
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Imprimir Rango</button>
    </div>
</form>


    <!-- Formulario de Búsqueda General -->
    <form method="GET" action="{{ route('facturas.index') }}" class="mb-4">
        <div class="flex items-center gap-4">
            <input 
                type="text" 
                name="search" 
                placeholder="Buscar por nombre, apellidos o matrícula" 
                value="{{ $search }}" 
                class="w-full border border-gray-300 rounded px-3 py-2"
            >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>
            <a href="{{ route('facturas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Limpiar</a>
        </div>
    </form>

    <!-- Formulario de selección de facturas -->
    <form method="POST" action="{{ route('facturas.print') }}" target="_blank">
        @csrf
        <!-- Tabla de Facturas -->
        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b"><input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)"></th>
                    <th class="py-2 px-4 border-b">Número de Factura</th>
                    <th class="py-2 px-4 border-b">Cliente</th>
                    <th class="py-2 px-4 border-b">Fecha de Emisión</th>
                    <th class="py-2 px-4 border-b">Total</th>
                    <th class="py-2 px-4 border-b">Estado</th>
                    <th class="py-2 px-4 border-b"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($facturas as $factura)
                <tr>
                    <td class="py-2 px-4 border-b">
                        <input type="checkbox" name="factura_ids[]" value="{{ $factura->id }}">
                    </td>
                    <td class="py-2 px-4 border-b">{{ $factura->numero_factura }}</td>
                    <td class="py-2 px-4 border-b">{{ $factura->cliente->nombres }} {{ $factura->cliente->apellidos }}</td>
                    <td class="py-2 px-4 border-b">{{ $factura->fecha_emision }}</td>
                    <td class="py-2 px-4 border-b">${{ number_format($factura->total, 2) }}</td>
                    <td class="py-2 px-4 border-b">{{ ucfirst($factura->estado) }}</td>
                    <td class="py-2 px-4 border-b text-right">
                        <button onclick="openPaymentModal({{ $factura->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Pagar</button>
                        <a href="{{ route('facturas.show', $factura->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Ver</a>
                        <a href="{{ route('facturas.historico', $factura->cliente_id) }}" class="bg-gray-500 text-white px-2 py-1 rounded">Histórico</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-2 px-4 border-b text-center">No hay facturas pendientes de pago.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Botón para imprimir facturas seleccionadas -->
        <div class="mt-4 flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Imprimir Seleccionadas</button>
        </div>
    </form>

    <div class="mt-4">
        {{ $facturas->links() }}
    </div>
</div>
@endsection
