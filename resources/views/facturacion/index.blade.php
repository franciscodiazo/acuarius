@extends('layouts.app')

@section('title', 'Suscriptores')

@section('content')
    <h1>detallefactura anteriores</h1>Total registros: {{ count($detallefactura) }}
@php
$total_costo = 0;
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Suscriptores | Usuarios') }}</div>
                <a class="btn btn-primary" href="{{ route('suscriptores.create') }}">Crear Usuario</a>

                <div class="table-responsive">
                    <table class="table table-striped">

    <thead>
        <tr>
            <th>id</th>
            <th>Matricula</th>
            <th>Ciclo</th>
            <th>Ultima Fecha</th>
            <th>Lectura Actual</th>
            <th>Lectura Anterior</th>
            <th>Consumo</th>
            <th>Total Factura</th>
            <th>Revisar</th> <!-- Nueva columna -->

        </tr>
    </thead>
    <tbody>
        <tbody>
    @foreach($detallefactura as $lectura)
      <tr>
        <td>{{ $lectura->id }}</td>
        <td>{{ $lectura->matricula }}</td>
        <td>{{ $lectura->ciclo }}</td>
        <td>{{ $lectura->ultima_fecha_lectura }}</td>
        <td>{{ $lectura->lectura_anterior }}</td>
        <td>{{ $lectura->lectura_actual }}</td>
        <td>{{ $lectura->consumo }}</td>
        <td>{{ $lectura->valor_total }}</td>
        <td>{{ $lectura->estado }}</td>
        <td>
      <form method="POST" action="{{ route('facturacion.store') }}">
        @csrf
        <div class="form-group">
          <input type="hidden" name="numero" value="{{ $lectura->id }}">
          <input type="hidden" name="fecha_emision" value="{{ date('Y-m-d') }}">
          <input type="hidden" name="fecha_vencimiento" value="{{ date('Y-m-d', strtotime('+7 days')) }}">
          <input type="hidden" name="matricula" value="{{ $lectura->matricula }}">
          <input type="hidden" name="id_detalle_factura" value="{{ $lectura->id }}">
          <input type="hidden" name="monto_total" value="{{ $lectura->valor_total }}">
          @if ($lectura->estado == "facturado")
            <input type="hidden" name="estado" value="facturada">
            <button type="submit" class="btn btn-primary">Ver Pago</button>
          @else
            <input type="hidden" name="estado" value="pendiente">
            <input type="hidden" name="fecha_pago" value="{{ date('Y-m-d', strtotime('+7 days')) }}">
            <input type="hidden" name="forma_pago" value="efectivo">
            <input type="hidden" name="detalle" value="{{ $lectura->id }}">
            <button type="submit" class="btn btn-success">Pagar</button>
          @endif
        </div>
      </form>
    </td> 
  </tr>
  @php
  $total_costo += $lectura->costo;
  @endphp
@endforeach
    </tbody>
    <p>Total costo: ${{ number_format($total_costo, 0, ',', '.') }}</p>

                    </table>
                </div>
            </div>
        </div>
    </div>

        <form method="POST" action="{{ route('detallefactura.store') }}">
            @csrf
            <button type="submit">Guardar</button>
        </form>

</div>



@endsection