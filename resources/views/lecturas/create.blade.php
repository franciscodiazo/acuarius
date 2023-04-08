@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nueva Lectura</h1>
        <form method="POST" action="{{ route('lecturas.store') }}">
            @csrf
            <div class="form-group">
                <label for="matricula">Matrícula</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required>
            </div>
            <div class="form-group">
                <label for="fecha_lectura">Fecha de Lectura</label>
                <input type="date" class="form-control" id="fecha_lectura" name="fecha_lectura" required>
            </div>
            <div class="form-group">
                <label for="ciclo">Ciclo</label>
                <input type="text" class="form-control" id="ciclo" name="ciclo" required>
            </div>
            <div class="form-group">
                <label for="ano_actual">Año Actual</label>
                <input type="number" class="form-control" id="ano_actual" name="ano_actual" required>
            </div>
            <div class="form-group">
                <label for="lectura_actual">Lectura Actual</label>
                <input type="number" class="form-control" id="lectura_actual" name="lectura_actual" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Lectura</button>
        </form>
    </div>
@endsection