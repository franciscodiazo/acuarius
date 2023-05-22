@extends('layouts.app')

@section('content')
    <h1>detallefactura anteriores</h1>Total registros: {{ count($detalles) }}

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Suscriptores | Cuota Familiar')}}</div>

                <div class="table-responsive">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>IdLectura</th>
                                    <th>Matrícula</th>
                                    <th>Ciclo</th>
                                    <th>Última Fecha Lectura</th>
                                    <th>Lectura Anterior</th>
                                    <th>Lectura Actual</th>
                                    <th>Consumo</th>
                                    <th>Valor Total</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detalles as $detalleFactura)
                                    <tr>
                                        <td>{{ $detalleFactura->id }}</td>
                                        <td>{{ $detalleFactura->id_detalle_lectura }}</td>
                                        <td>{{ $detalleFactura->matricula }} {{ $detalleFactura->subscriber->nombres }} {{ $detalleFactura->subscriber->apellidos }}</td>
                                        <td>{{ $detalleFactura->ciclo }}</td>
                                        <td>{{ $detalleFactura->ultima_fecha_lectura }}</td>
                                        <td>{{ $detalleFactura->lectura_anterior }}</td>
                                        <td>{{ $detalleFactura->lectura_actual }}</td>
                                        <td>{{ $detalleFactura->consumo }}</td>
                                        <td>{{ $detalleFactura->valor_total }}</td>
                                        <td> 
                                            <div>
                                                <a href="#" class="btn btn-sm btn-info d-inline-block" onclick="window.open('{{ route('facturas.show', $detalleFactura->id) }}', 'detalleFactura', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1024,height=720'); return false;">Detalle</a>
                                            </div>
                                        </td>
                                        <td> 
                                            <div>
                                                <a href="#" class="btn btn-sm btn-primary d-inline-block" onclick="window.open('{{ route('facturas.imprimir', ['id' => $detalleFactura->id]) }}', '_blank', 'location=0, menubar=0, status=0, titlebar=0, toolbar=0')"> PDF</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                    </div>                                

                </div>
            </div>
        </div>
    </div>
@endsection