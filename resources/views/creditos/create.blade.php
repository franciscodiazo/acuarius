@extends('layouts.app')

@section('title', 'Matriculas')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Crédito') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('creditos.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="matricula" class="col-md-4 col-form-label text-md-right">{{ __('Matrícula') }}</label>

                                <div class="col-md-6">
                                    <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula" autofocus>

                                    @error('matricula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="acuerdo" class="col-md-4 col-form-label text-md-right">{{ __('Acuerdo') }}</label>

                            <div class="col-md-6">
                                <input id="acuerdo" type="text" class="form-control @error('acuerdo') is-invalid @enderror" name="acuerdo" value="{{ old('acuerdo') }}" required autocomplete="acuerdo" autofocus>

                                @error('acuerdo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                            <div class="col-md-6">
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror" name="detalle" value="{{ old('detalle') }}" required autocomplete="detalle" autofocus>

                                @error('detalle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group row">
                                <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de inicio') }}</label>

                                <div class="col-md-6">
                                <input id="fecha_inicio" type="date" class="form-control @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio" value="{{ old('fecha_inicio') ? old('fecha_inicio') : date('Y-m-d') }}" required autocomplete="fecha_inicio">


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
                                    <input id="fecha_final" type="date" class="form-control @error('fecha_final') is-invalid @enderror" name="fecha_final" value="{{ date('Y-m-d') }}" required autocomplete="fecha_final">
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
                                    <input id="monto" type="number" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" required autocomplete="monto">

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
                                    <input id="tasa_interes" type="number" class="form-control @error('tasa_interes') is-invalid @enderror" name="tasa_interes" value="{{ old('tasa_interes') }}" required autocomplete="tasa_interes" step="0.01"> 

                                       @error('tasa_interes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plazo_meses" class="col-md-4 col-form-label text-md-right">{{ __('Plazo en meses') }}</label>

                            <div class="col-md-6">
                                <input id="plazo_meses" type="number" class="form-control @error('plazo_meses') is-invalid @enderror" name="plazo_meses" value="{{ old('plazo_meses') }}" required autocomplete="plazo_meses">

                                @error('plazo_meses')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_proximo_pago" class="col-md-4 col-form-label text-md-right">{{ __('Fecha del próximo pago') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_proximo_pago" type="date" class="form-control @error('fecha_proximo_pago') is-invalid @enderror" name="fecha_proximo_pago" value="{{ old('fecha_proximo_pago') }}" required autocomplete="fecha_proximo_pago">

                                @error('fecha_proximo_pago')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="saldo" class="col-md-4 col-form-label text-md-right">{{ __('Saldo') }}</label>

                            <div class="col-md-6">
                                <input id="saldo" type="number" class="form-control @error('saldo') is-invalid @enderror" name="saldo" value="{{ old('saldo') }}" required autocomplete="saldo">

                                @error('saldo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear') }}
                                </button>
                                <a href="{{ route('creditos.index') }}" class="btn btn-secondary">
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