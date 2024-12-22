@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historial de Lecturas</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Lectura Actual</th>
                <th>Lectura Anterior</th>
                <th>Consumo</th>
                <th>Año</th>
                <th>Ciclo</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lecturas as $lectura)
                <tr>
                    <td>{{ $lectura->matricula }}</td>
                    <td>{{ $lectura->lectura_actual }}</td>
                    <td>{{ $lectura->lectura_anterior }}</td>
                    <td>{{ $lectura->consumo }}</td>
                    <td>{{ $lectura->ano }}</td>
                    <td>{{ $lectura->ciclo }}</td>
                    <td>{{ $lectura->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
