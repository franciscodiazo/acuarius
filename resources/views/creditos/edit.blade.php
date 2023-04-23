@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">{{ __('Editar crédito') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('creditos.update', $creditos) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="matricula" class="col-md-4 col-form-label text-md-right">{{ __('Matrícula') }}</label>

                            <div class="col-md-6">
                                <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula', $creditos->matricula) }}" required autocomplete="matricula" autofocus>

                                @error('matricula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de inicio') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_inicio" type="date" class="form-control @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio" value="{{ old('fecha_inicio', is_string($creditos->fecha_inicio) ? $creditos->fecha_inicio : $creditos->fecha_inicio->format('Y-m-d')) }}" required autocomplete="fecha_inicio">

                                @error('fecha_inicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_final" class="col-md-4 col-form-label text-md-right">{{ __('Fecha final') }}</label>

                            <div class="col-md-6">
                               <input id="fecha_final" type="date" class="form-control @error('fecha_final') is-invalid @enderror" name="fecha_final" value="{{ old('fecha_final', is_string($creditos->fecha_final) ? $creditos->fecha_final : $creditos->fecha_final->format('Y-m-d')) }}" required autocomplete="fecha_final">


                                @error('fecha_final')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto" class="col-md-4 col-form-label text-md-right">{{ __('Monto') }}</label>

                            <div class="col-md-6">
                                <input id="monto" type="number" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto', $creditos->monto) }}" required autocomplete="monto" min="0" step="1">

                                @error('monto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tasa_interes" class="col-md-4 col-form-label text-md-right">{{ __('Tasa de interés') }}</label>

                              <div class="col-md-6">
                            <input id="tasa_interes" type="number" class="form-control @error('tasa_interes') is-invalid @enderror" name="tasa_interes" value="{{ old('tasa_interes', $creditos->tasa_interes) }}" required autocomplete="tasa_interes" min="0" step="0.01">

                            @error('tasa_interes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cuotas" class="col-md-4 col-form-label text-md-right">{{ __('Cuotas') }}</label>

                        <div class="col-md-6">
                            <input id="plazo_meses" type="number" class="form-control @error('plazo_meses') is-invalid @enderror" name="plazo_meses" value="{{ old('plazo_meses', $creditos->plazo_meses) }}" required autocomplete="cuotas" min="1" step="1">

                            @error('cuotas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Guardar cambios') }}
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