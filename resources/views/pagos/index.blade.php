@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar Pago') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pagos.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="credito_id" class="col-md-4 col-form-label text-md-right">{{ __('Crédito') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="credito_id">
                                    @php
                                        $default_credito = request()->input('credito_id') ?: ($creditos->first() ? $creditos->first()->id : null);
                                    @endphp

                                    @foreach($creditos as $c)
                                        <option value="{{ $c->id }}" {{ $default_credito == $c->id ? 'selected' : '' }}>
                                            {{ $c->id }} | {{ $c->matricula }}
                                        </option>
                                    @endforeach
                                    </select>

                                    @error('credito_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fecha_pago" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Pago') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha_pago" type="date" class="form-control @error('fecha_pago') is-invalid @enderror" name="fecha_pago" value="{{ old('fecha_pago') ? old('fecha_pago') : date('Y-m-d') }}" required autocomplete="fecha_pago">

                                    @error('fecha_pago')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto" class="col-md-4 col-form-label text-md-right">{{ __('Monto') }}</label>

                                <div class="col-md-6">
                                    <input id="monto" type="number" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" required autocomplete="monto">

                                    @error('monto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar Pago') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection