@extends('layouts.app')

@section('content')
    <h1>detallefactura anteriores</h1>Total registros: {{ count($detallefactura) }}
@php
$total_costo = 0;
@endphp
<div class="card-body">
    <table class="table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>Matricula</th>
            <th>Ciclo</th>
            <th>Ultima Fecha de Lectura</th>
            <th>Lectura Actual</th>
            <th>Lectura Anterior</th>
            <th>Diferencia</th>
            <th>Total Factura</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detallefactura as $lectura)
        <tr>
            <td>{{ $lectura->id }}</td>
            <td>{{ $lectura->matricula }}</td>
            <td>{{ $lectura->ciclo }}</td>
            <td>{{ $lectura->ultima_fecha_lectura }}</td>
            <td>{{ $lectura->lectura_actual }}</td>
            <td>{{ $lectura->lectura_anterior }}</td>
            <td>{{ $lectura->diferencia }}</td>
            <td align="right">${{ number_format($lectura->costo, 0, ',', '.') }}</td>
        </tr>
        @php
        $total_costo += $lectura->costo;
        @endphp

        @endforeach
    </tbody>
    <p>Total costo: ${{ number_format($total_costo, 0, ',', '.') }}</p>


</table>

        <form method="POST" action="{{ route('detallefactura.store') }}">
            @csrf
            <button type="submit">Guardar</button>
        </form>

</div>



@endsection