@extends('layouts.app')

@section('title', 'tarifa')


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
                <div class="card-header">{{ __('Editar tarifa') }}</div>
               <div class="card-body">
                     <form method="POST" action="{{ route('tarifas.update', $tarifa->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="tipo">{{ __('tipo') }}</label>
                            <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{ $tarifa->tipo }}" required autocomplete="tipo" autofocus>

                            @error('tarifa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="valor">{{ __('valor') }}</label>
                            <input id="valor" type="text" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ $tarifa->valor }}" required autocomplete="valor">

                            @error('medidor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection