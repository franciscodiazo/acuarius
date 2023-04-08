@extends('layouts.app')

@section('title', 'lectura')


@section('content')  
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar lectura') }}</div>
               <div class="card-body">
                     <form method="POST" action="{{ route('lecturas.update', $lectura->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="matricula">{{ __('Matricula') }}</label>
                            <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ $lectura->matricula }}" required autocomplete="matricula" autofocus>

                            @error('matricula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_lectura">{{ __('fecha lectura') }}</label>
                            <input id="fecha_lectura" type="date" class="form-control @error('fecha_lectura') is-invalid @enderror" name="fecha_lectura" value="{{ $lectura->fecha_lectura }}" required autocomplete="fecha_lectura">

                            @error('fecha_lectura')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ciclo">{{ __('ciclo') }}</label>
                            <input id="ciclo" type="text" class="form-control @error('ciclo') is-invalid @enderror" name="ciclo" value="{{ $lectura->ciclo }}" required autocomplete="ciclo">

                            @error('ciclo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ano_actual">{{ __('ano_actual') }}</label>
                            <input id="ano_actual" type="text" class="form-control @error('ano_actual') is-invalid @enderror" name="ano_actual" value="{{ $lectura->ano_actual }}" required autocomplete="ano_actual">

                            @error('ano_actual')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lectura_actual">{{ __('lectura actual') }}</label>
                            <input id="lectura_actual" type="text" class="form-control @error('lectura_actual') is-invalid @enderror" name="lectura_actual" value="{{ $lectura->lectura_actual }}" required autocomplete="lectura_actual">

                            @error('lectura_actual')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection