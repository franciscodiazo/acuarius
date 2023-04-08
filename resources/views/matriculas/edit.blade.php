@extends('layouts.app')

@section('title', 'matricula')


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
                <div class="card-header">{{ __('Editar matricula') }}</div>
               <div class="card-body">
                     <form method="POST" action="{{ route('matriculas.update', $matricula->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="matricula">{{ __('Matricula') }}</label>
                            <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ $matricula->matricula }}" required autocomplete="matricula" autofocus>

                            @error('matricula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="medidor">{{ __('fecha matricula') }}</label>
                            <input id="medidor" type="text" class="form-control @error('medidor') is-invalid @enderror" name="medidor" value="{{ $matricula->medidor }}" required autocomplete="medidor">

                            @error('medidor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="poliza">{{ __('poliza') }}</label>
                            <input id="poliza" type="text" class="form-control @error('poliza') is-invalid @enderror" name="poliza" value="{{ $matricula->poliza }}" required autocomplete="poliza">

                            @error('poliza')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="observaciones">{{ __('observaciones') }}</label>
                            <input id="observaciones" type="text" class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" value="{{ $matricula->observaciones }}" required autocomplete="observaciones">

                            @error('observaciones')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="estado">{{ __('estado') }}</label>
                            <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ $matricula->estado }}" required autocomplete="estado">

                            @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection