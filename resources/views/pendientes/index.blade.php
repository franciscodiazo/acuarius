@extends('layouts.app')

@section('content')
    <h1>Detalles de Factura Pendientes</h1>Total registros: {{ count($detallesPendientes) }}

    @if ($detallesPendientes->isEmpty())
        <p>No hay detalles de factura pendientes.</p>

    @else
 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Suscriptores | Cuota Familiar')}}</div><p>Suma del Valor Total: {{ number_format($sumaValorTotal, 2, ',', '.') }}</p>


                <div class="table-responsive">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>IdLectura</th>                                    
                                    <th></th>
                                    <th></th>
                                    <th>Matrícula</th>
                                    <th>Ciclo</th>
                                    <th>Última Fecha Lectura</th>
                                    <th>Lectura Anterior</th>
                                    <th>Lectura Actual</th>
                                    <th>Consumo</th>
                                    <th>Valor Total</th>

                                </tr>
            </thead>
            <tbody>
                @foreach ($detallesPendientes as $detalle)
                    <tr>
                        <td>{{ $detalle->id }}</td>
                        <td>{{ $detalle->matricula }}</td>
                        <!-- Agrega otras columnas que desees mostrar -->
                                        <td>{{ $detalle->id }}</td>
                                        <td>{{ $detalle->id_detalle_lectura }}</td>
                                        <td>{{ $detalle->matricula }} </td>
                                        <td>{{ $detalle->ciclo }}</td>
                                        <td>{{ $detalle->ultima_fecha_lectura }}</td>
                                        <td>{{ $detalle->lectura_anterior }}</td>
                                        <td>{{ $detalle->lectura_actual }}</td>
                                        <td>{{ $detalle->consumo }}</td>
                                        <td align="right">{{ $detalle->valor_total }}</td>
                                        <td>{{ $detalle->estado }}</td>
                                        <td>                         
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection


