@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Histórico de Facturas para {{ $cliente->nombres }} {{ $cliente->apellidos }}</h1>

    <!-- Mostrar saldo pendiente -->
    <h2 class="text-xl font-bold mt-6 mb-4">Saldo Total Pendiente</h2>
    <p class="text-lg font-bold text-red-500">${{ number_format($saldoPendiente, 2) }}</p>

    <!-- Facturas Pendientes -->
    <h2 class="text-xl font-bold mt-6 mb-4">Facturas Pendientes</h2>
    @if($facturasPendientes->isEmpty())
        <p>No hay facturas pendientes.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300 rounded mb-6">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">Número de Factura</th>
                    <th class="py-2 px-4 border-b">Fecha de Emisión</th>
                    <th class="py-2 px-4 border-b">Total</th>
                    <th class="py-2 px-4 border-b"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturasPendientes as $factura)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $factura->numero_factura }}</td>
                    <td class="py-2 px-4 border-b">{{ $factura->fecha_emision }}</td>
                    <td class="py-2 px-4 border-b">${{ number_format($factura->total, 2) }}</td>
                    <td class="py-2 px-4 border-b text-right">
                        <button onclick="openPaymentModal({{ $factura->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Pagar</button>
                        <a href="{{ route('facturas.show', $factura->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Última Factura Pagada -->
    <h2 class="text-xl font-bold mt-6 mb-4">Última Factura Pagada</h2>
@if(!$ultimaPagada)
    <p>No se encontró una última factura pagada.</p>
@else
    <div class="bg-white p-6 rounded shadow border border-gray-300">
        <p><strong>Número de Factura:</strong> {{ $ultimaPagada->numero_factura }}</p>
        <p><strong>Fecha de Pago:</strong> {{ $ultimaPagada->fecha_pago }}</p>
        <p><strong>Total Pagado:</strong> ${{ number_format($ultimaPagada->total, 2) }}</p>
        <p><strong>Estado:</strong> {{ ucfirst($ultimaPagada->estado) }}</p>
        <a href="{{ route('facturas.show', $ultimaPagada->id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Ver Factura</a>
    </div>
@endif


</div>


<h2 class="text-xl font-bold mt-6 mb-4">Todas las Facturas</h2>
<table class="min-w-full bg-white border border-gray-300 rounded mb-6">
    <thead class="bg-gray-100">
        <tr>
            <th class="py-2 px-4 border-b">Número de Factura</th>
            <th class="py-2 px-4 border-b">Fecha de Emisión</th>
            <th class="py-2 px-4 border-b">Total</th>
            <th class="py-2 px-4 border-b">Estado</th>
            <th class="py-2 px-4 border-b"></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($todasFacturas as $factura)
    <tr>
        <td class="py-2 px-4 border-b">{{ $factura->numero_factura }}</td>
        <td class="py-2 px-4 border-b">{{ $factura->fecha_emision }}</td>
        <td class="py-2 px-4 border-b">${{ number_format($factura->total, 2) }}</td>
        <td class="py-2 px-4 border-b">{{ ucfirst($factura->estado) }}</td>
        <td class="py-2 px-4 border-b text-right">
            <a href="{{ route('facturas.show', $factura->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Ver</a>
            @if($factura->estado === 'pendiente')
                <button onclick="openPaymentModal({{ $factura->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Pagar</button>
            @endif
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

<!-- Modal -->
<div id="paymentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow-md w-96">
        <h2 class="text-xl font-bold mb-4">Confirmar Pago</h2>
        <form id="paymentForm" method="POST" action="{{ route('facturas.pagar') }}">
            @csrf
            <input type="hidden" id="factura_id" name="factura_id" value="">
            <div class="mb-4">
                <label for="payment_method" class="block text-gray-700">Método de Pago</label>
                <select id="payment_method" name="payment_method" class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="">Seleccione un método</option>
                    <option value="banco">Banco</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="transferencia">Transferencia</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
            <div id="other_method_field" class="mb-4 hidden">
                <label for="other_method" class="block text-gray-700">Especifique</label>
                <input type="text" id="other_method" name="other_method" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label for="payment_date" class="block text-gray-700">Fecha de Pago</label>
                <input type="date" id="payment_date" name="payment_date" value="{{ date('Y-m-d') }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closePaymentModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancelar</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Confirmar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openPaymentModal(facturaId) {
        document.getElementById('factura_id').value = facturaId;
        document.getElementById('paymentModal').classList.remove('hidden');
    }

    function closePaymentModal() {
        document.getElementById('paymentModal').classList.add('hidden');
    }

    document.getElementById('payment_method').addEventListener('change', function () {
        const otherField = document.getElementById('other_method_field');
        if (this.value === 'otro') {
            otherField.classList.remove('hidden');
        } else {
            otherField.classList.add('hidden');
            document.getElementById('other_method').value = '';
        }
    });
</script>
@endsection
