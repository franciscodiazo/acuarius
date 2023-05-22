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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reciboModal" data-matricula="{{ $lectura->matricula }}" data-total="{{ $lectura->valor_total }}">Ver recibo</button>
            <div>
            <a href="#" class="btn btn-sm btn-primary d-inline-block" onclick="window.open('{{ route('facturacion.pdf', ['matricula' => $lectura->matricula]) }}', '_blank', 'location=0, menubar=0, status=0, titlebar=0, toolbar=0')"> PDF</a></div>

          @else
            <input type="hidden" name="estado" value="pendiente">
            <input type="hidden" name="fecha_pago" value="{{ date('Y-m-d', strtotime('+7 days')) }}">
            <input type="hidden" name="forma_pago" value="efectivo">
            <input type="hidden" name="detalle" value=" {{ $lectura->consumo }} ">
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
<div class="modal fade" id="reciboModal" tabindex="-1" role="dialog" aria-labelledby="reciboModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reciboModalLabel">Recibo de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>sdfsd
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="numero">Número de Recibo:</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{ $lectura->id }}" readonly>
          </div>
          <div class="form-group">
            <label for="fecha_emision">Fecha de Emisión:</label>
            <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" value="{{ $lectura->ultima_fecha_lectura }}" readonly>{{ $lectura->ultima_fecha_lectura }}
          </div>
          <div class="form-group">
            <label for="matricula">Matrícula:</label>
            <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $lectura->matricula }}" readonly>
          </div>
          <div class="form-group">
            <label for="ciclo">Ciclo:</label>
            <input type="text" class="form-control" id="ciclo" name="ciclo" value="{{ $lectura->ciclo }}" readonly>
          </div>
          <div class="form-group">
            <label for="lectura_anterior">Lectura Anterior:</label>
            <input type="text" class="form-control" id="lectura_anterior" name="lectura_anterior" value="{{ $lectura->lectura_anterior }}" readonly>
          </div>
          <div class="form-group">
            <label for="lectura_actual">Lectura Actual:</label>
            <input type="text" class="form-control" id="lectura_actual" name="lectura_actual" value="{{ $lectura->lectura_actual }}" readonly>
          </div>
          <div class="form-group">
            <label for="consumo">Consumo:</label>
            <input type="text" class="form-control" id="consumo" name="consumo" value="{{ $lectura->consumo }}" readonly>
          </div>
          <div class="form-group">
            <label for="valor_total">Total a pagar:</label>
            <input type="text" class="form-control" id="valor_total" name="valor_total" value="{{ $lectura->valor_total }}" readonly>
          </div>
          <!-- Agregar los demás campos necesarios -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="window.print()">Imprimir</button>
      </div>
    </div>
  </div>
</div>

@endsection
