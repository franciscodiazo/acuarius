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
        <h1>Nueva Matricula</h1>
        <form method="POST" action="{{ route('matriculas.store') }}">
            @csrf
            <div class="form-group">
                <label for="matricula">Matrícula</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required>
            </div>
            <div class="form-group">
                <label for="medidor">medidor</label>
                <input type="text" class="form-control" id="medidor" name="medidor" required>
            </div>
            <div class="form-group">
                <label for="poliza">poliza</label>
                <input type="text" class="form-control" id="poliza" name="poliza" required>
            </div>
            <div class="form-group">
                <label for="observaciones">observaciones</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" required>
            </div>
            <div class="form-group">
                <label for="estado">estado</label>
                <input type="number" class="form-control" id="estado" name="estado" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Matricula</button>
        </form>
    </div>
@endsection