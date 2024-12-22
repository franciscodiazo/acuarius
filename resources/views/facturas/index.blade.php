@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Facturas</h1>
    <table class="min-w-full bg-white border border-gray-300 rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border-b">Número de Factura</th>
                <th class="py-2 px-4 border-b">Cliente</th>
                <th class="py-2 px-4 border-b">Fecha de Emisión</th>
                <th class="py-2 px-4 border-b">Total</th>
                <th class="py-2 px-4 border-b">Estado</th>
                <th class="py-2 px-4 border-b"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
            <tr>
                <td class="py-2 px-4 border-b">{{ $factura->numero_factura }}</td>
                <td class="py-2 px-4 border-b">{{ $factura->cliente->nombres }} {{ $factura->cliente->apellidos }}</td>
                <td class="py-2 px-4 border-b">{{ $factura->fecha_emision }}</td>
                <td class="py-2 px-4 border-b">${{ number_format($factura->total, 2) }}</td>
                <td class="py-2 px-4 border-b">{{ ucfirst($factura->estado) }}</td>
                <td class="py-2 px-4 border-b text-right">
                    @if($factura->estado === 'pendiente')
                    <button onclick="openPaymentModal({{ $factura->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Pagar</button>
                    @endif
                    <a href="{{ route('facturas.show', $factura->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Ver</a>
                    <a href="{{ route('facturas.historico', $factura->cliente_id) }}" class="bg-gray-500 text-white px-2 py-1 rounded">Histórico</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $facturas->links() }}
    </div>
</div>

<!-- Modal -->
<div id="paymentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow-md w-96">
        <h2 class="text-xl font-bold mb-4">Confirmar Pago</h2>
        <form id="paymentForm" method="POST" action="{{ route('facturas.pagar') }}">
            @csrf
            <input type="hidden" id="factura_id" name="factura_id" value="">

            <!-- Método de Pago -->
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

            <!-- Especificar otro método -->
            <div id="other_method_field" class="mb-4 hidden">
                <label for="other_method" class="block text-gray-700">Especifique</label>
                <input type="text" id="other_method" name="other_method" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <!-- Fecha de Pago -->
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
