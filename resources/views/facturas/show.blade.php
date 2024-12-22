@extends('layouts.app')

@section('content')
@if(session('error'))
    <div class="bg-red-500 text-white text-center py-2 mb-4 rounded">
        {{ session('error') }}
    </div>
@endif
<div class="container mx-auto p-4" id="printable-area">
    <div class="bg-white p-6 rounded shadow-md border border-gray-300">
        <!-- Encabezado de la Factura -->
        <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
            <div>
                <h1 class="text-2xl font-bold text-blue-600">Factura de Servicios Públicos</h1>
                <p class="text-gray-600">Número de Factura: <strong>{{ $factura->numero_factura }}</strong></p>
                <p class="text-gray-600">CUFE: <strong>{{ $factura->cufe }}</strong></p>
            </div>
            <div class="text-right">
                <img src="{{ asset('img/logo_empresa.png') }}" alt="Logo Empresa" class="h-16">
                <p class="text-gray-600">Fecha de Emisión: <strong>{{ $factura->fecha_emision }}</strong></p>
                <p class="text-gray-600">Fecha de Vencimiento: <strong>{{ $factura->fecha_vencimiento }}</strong></p>
            </div>
        </div>

        <!-- Información del Cliente -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <h2 class="text-lg font-bold text-blue-600 mb-2">Datos del Cliente</h2>
                <p><strong>Nombres y Apellidos:</strong> {{ $factura->cliente->nombres }} {{ $factura->cliente->apellidos }}</p>
                <p><strong>Matrícula:</strong> {{ $factura->cliente->matricula }}</p>
                <p><strong>Dirección:</strong> {{ $factura->cliente->direccion }}</p>
                <p><strong>Teléfono:</strong> {{ $factura->cliente->telefono }}</p>
            </div>
            <div>
                <h2 class="text-lg font-bold text-blue-600 mb-2">Resumen de Consumo</h2>
                @if($lectura)
                    <p><strong>Lectura Anterior:</strong> {{ $lectura->lectura_anterior }}</p>
                    <p><strong>Lectura Actual:</strong> {{ $lectura->lectura_actual }}</p>
                    <p><strong>Consumo:</strong> {{ $lectura->consumo }} m³</p>
                @else
                    <p>Gracias por realizar su pago</p>
                @endif
            <!-- Gráfico de Consumo -->
<!-- Gráfico de Consumo -->
<div class="mt-4 border border-gray-100 rounded shadow p-4 bg-gray-10">
    <svg viewBox="0 0 800 50" xmlns="http://www.w3.org/2000/svg">
        @if($lectura)
            @php
                $maxLectura = max($lectura->lectura_actual, $lectura->lectura_anterior);
                $widthAnterior = ($lectura->lectura_anterior / $maxLectura) * 180;
                $widthActual = ($lectura->lectura_actual / $maxLectura) * 180;
            @endphp

            <!-- Barra Lectura Anterior -->
            <rect x="10" y="10" width="{{ $widthAnterior }}" height="10" fill="#2563EB"></rect>
            <text x="10" y="8" fill="#000" font-size="10">Lectura Anterior: {{ $lectura->lectura_anterior }} m³</text>

            <!-- Barra Lectura Actual -->
            <rect x="10" y="30" width="{{ $widthActual }}" height="10" fill="#4B5563"></rect>
            <text x="10" y="28" fill="#000" font-size="10">Lectura Actual: {{ $lectura->lectura_actual }} m³</text>
        @else
            <text x="10" y="25" fill="#000" font-size="10">No hay datos de consumo para graficar</text>
        @endif
    </svg>
</div>

            </div>
        </div>

        <!-- Detalle de Consumo -->
        <div class="mb-6">
            
            <table class="w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-center" colspan="6"><h2 class="text-lg font-bold text-blue-600 mb-2">Detalle del Servicio</h2>{{ $factura->detalles->first()->descripcion }}</th>
                    </tr>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Cantidad</th>
                        <th class="border border-gray-300 px-4 py-2 text-right">Precio Unitario</th>
                        <th class="border border-gray-300 px-4 py-2 text-right">Subtotal</th>
                        <th class="border border-gray-300 px-4 py-2 text-right">Impuesto</th>
                        <th class="border border-gray-300 px-4 py-2 text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factura->detalles as $detalle)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ $detalle->cantidad }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($detalle->precio_unitario, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($detalle->subtotal, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($detalle->impuesto, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($detalle->total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Resumen de Pagos -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <h2 class="text-lg font-bold text-blue-600 mb-2">Estado de la Factura</h2>
                <p><strong>Estado:</strong> {{ ucfirst($factura->estado) }}</p>
            </div>
            <div class="text-right">
                <h2 class="text-lg font-bold text-blue-600 mb-2">Totales</h2>
                <p><strong>Subtotal:</strong> ${{ number_format($factura->subtotal, 2) }}</p>
                <p><strong>Impuestos:</strong> ${{ number_format($factura->impuestos, 2) }}</p>
                <p class="text-2xl font-bold">Total: ${{ number_format($factura->total, 2) }}</p>
            </div>
        </div>
    </div>

    <!-- Desprendible de Pago -->
    <div class="mt-6 bg-gray-100 p-4 border-t border-gray-300">
        <h2 class="text-lg font-bold text-blue-600 mb-4">Desprendible de Pago</h2>
        <p><strong>Nombres y Apellidos:</strong> {{ $factura->cliente->nombres }} {{ $factura->cliente->apellidos }}</p>
        <p><strong>Dirección:</strong> {{ $factura->cliente->direccion }}</p>
        <p><strong>Matrícula:</strong> {{ $factura->cliente->matricula }}</p>
        <p><strong>Total a Pagar:</strong> ${{ number_format($factura->total, 2) }}</p>
        <p><strong>Fecha Límite de Pago:</strong> {{ $factura->fecha_vencimiento }}</p>
    </div>
</div>

<!-- Botón para imprimir -->
<div class="text-center mt-6">
    <button onclick="printDocument()" class="bg-blue-500 text-white px-4 py-2 rounded shadow">Imprimir Factura</button>
</div>

<script>
    function printDocument() {
        const printArea = document.getElementById('printable-area').innerHTML;
        const originalContent = document.body.innerHTML;

        document.body.innerHTML = printArea;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
@endsection
