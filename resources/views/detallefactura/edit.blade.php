@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar detalle de factura') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('detallefactura.update', $detallefactura->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="factura_id" class="col-md-4 col-form-label text-md-right">{{ __('Factura') }}</label>

                            <div class="col-md-6">
                                <select name="factura_id" class="form-control">
                                    @foreach($facturas as $factura)
                                        <option value="{{ $factura->id }}" @if($detallefactura->factura_id == $factura->id) selected @endif>{{ $factura->id }}</option>
                                    @endforeach
                                </select>
                                @error('factura_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="producto_id" class="col-md-4 col-form-label text-md-right">{{ __('Producto') }}</label>

                            <div class="col-md-6">
                                <select name="producto_id" class="form-control">
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id }}" @if($detallefactura->producto_id == $producto->id) selected @endif>{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('producto_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="number" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ $detallefactura->cantidad }}" required autocomplete="cantidad" autofocus>

                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                                <a href="{{ route('detallefactura.show', $detallefactura->id) }}" class="btn btn-secondary">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
