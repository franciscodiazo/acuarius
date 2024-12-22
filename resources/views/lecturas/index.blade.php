    @extends('layouts.app')

    @section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Tarifas y Lecturas</h1>

        <!-- Caja de Tarifas con Stats -->
        <div class="mb-8 p-4 bg-white border border-gray-300 rounded shadow grid grid-cols-1 sm:grid-cols-3 gap-4">
        @if(session('warning'))
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
                <p>{{ session('warning') }}</p>
            </div>
        @endif
            @forelse ($tarifas as $tarifa)
            <div class="bg-gray-100 p-4 rounded shadow text-center">
                <h3 class="text-lg font-bold mb-2">Año: {{ $tarifa->ano }}</h3>
                <p><strong>Tarifa Base:</strong> ${{ number_format($tarifa->tarifa_basica, 2) }}</p>
                <p><strong>Valor por Metro:</strong> ${{ number_format($tarifa->precio_metro_adicional, 2) }}</p>
                <p class="text-sm text-gray-500 mt-2">Última Actualización: {{ $tarifa->updated_at }}</p>
            </div>
            @empty
            <p class="text-center col-span-3">No hay tarifas disponibles.</p>
            @endforelse
            <div class="bg-blue-100 p-4 rounded shadow text-center">
                <h3 class="text-lg font-bold mb-2">Lecturas sin Facturar</h3>
                <p><strong>Total:</strong> {{ $lecturas->where('facturada', false)->count() }}</p>
            </div>
        </div>

        <!-- Tabla de Lecturas -->
        <div>
            <h2 class="text-xl font-bold mb-4">Últimas Lecturas por Matrícula</h2>
        <div class="overflow-x-auto relative">
            <div class="mb-4 text-right">
            <a href="{{ route('lecturas.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Nueva Lectura</a>
        </div>
                <table class="min-w-full bg-white border border-gray-300 rounded">
                    <thead class="bg-gray-100 sticky top-0">
                        <tr>
                            <th class="py-2 px-4 border-b">Matrícula</th>
                            <th class="py-2 px-4 border-b">Lectura Anterior</th>
                            <th class="py-2 px-4 border-b">Lectura Actual</th>
                            <th class="py-2 px-4 border-b">Consumo</th>
                            <th class="py-2 px-4 border-b">Fecha</th>
                            <th class="py-2 px-4 border-b">Tarifa Base</th>
                            <th class="py-2 px-4 border-b">Valor Adicional</th>
                            <th class="py-2 px-4 border-b">Metros Adicionales</th>
                            <th class="py-2 px-4 border-b">Valor a Pagar</th>
                            <th class="py-2 px-4 border-b" ></th>
                            <th class="py-2 px-4 border-b" ></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($lecturas as $lectura)
                        @php
                            $consumo = $lectura->lectura_actual - $lectura->lectura_anterior;
                            $metrosAdicionales = max(0, $consumo - 50);
                            $valorAPagar = $tarifa->tarifa_basica + ($metrosAdicionales * $tarifa->precio_metro_adicional);
                        @endphp
                        <tr data-ciclo-facturado="{{ $lectura->ciclo_facturado }}">
                            <td class="py-2 px-4 border-b">{{ $lectura->matricula }}</td>
                            <td class="py-2 px-4 border-b">{{ $lectura->lectura_anterior }}</td>
                            <td class="py-2 px-4 border-b">{{ $lectura->lectura_actual }}</td>
                            <td class="py-2 px-4 border-b lectura-consumo">{{ $consumo }}</td>
                            <td class="py-2 px-4 border-b">{{ $lectura->fecha }}</td>
                            <td class="py-2 px-4 border-b lectura-tarifa-base">{{ number_format($tarifa->tarifa_basica, 2) }}</td>
                            <td class="py-2 px-4 border-b lectura-precio-metro">{{ number_format($tarifa->precio_metro_adicional, 2) }}</td>
                            <td class="py-2 px-4 border-b lectura-metros-adicionales">{{ $metrosAdicionales }}</td>
                            <td class="py-2 px-4 border-b font-bold">{{ number_format($valorAPagar, 2) }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('lecturas.edit', $lectura->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                            </td>
                            <td class="py-2 px-4 text-right">
                                <form action="{{ route('facturas.create.from.lectura', $lectura->id) }}" method="POST" class="inline">
                                @csrf
                                <!-- Campos ocultos para enviar datos al controlador -->
                                <input type="hidden" name="matricula" value="{{ $lectura->matricula }}">
                                <input type="hidden" name="lectura_anterior" value="{{ $lectura->lectura_anterior }}">
                                <input type="hidden" name="lectura_actual" value="{{ $lectura->lectura_actual }}">
                                <input type="hidden" name="consumo" value="{{ $consumo }}">
                                <input type="hidden" name="fecha" value="{{ $lectura->fecha }}">
                                <input type="hidden" name="tarifa_base" value="{{ $tarifa->tarifa_basica }}">
                                <input type="hidden" name="valor_adicional" value="{{ $tarifa->precio_metro_adicional }}">
                                <input type="hidden" name="metros_adicionales" value="{{ $metrosAdicionales }}">
                                <input type="hidden" name="valor_a_pagar" value="{{ $valorAPagar }}">
                                <input type="hidden" name="ciclo_facturado" value="{{ $lectura->ciclo_facturado }}">

                                <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Facturar</button>
                            </form>
                        </td>
                    </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
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
