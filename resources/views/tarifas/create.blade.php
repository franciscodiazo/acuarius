@extends('layouts.app')

@section('title', 'tarifas')

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
        <h1>Nueva tarifa</h1>
        <form method="POST" action="{{ route('tarifas.store') }}">
            @csrf
            <div class="form-group">
                <label for="tipo">Tipo tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
            <div class="form-group">
                <label for="valor">valor</label>
                <input type="number" class="form-control" id="valor" name="valor" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear tarifa</button>
        </form>
    </div>
@endsection