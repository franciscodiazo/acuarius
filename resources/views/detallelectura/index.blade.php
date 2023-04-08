
@extends('layouts.app')

@section('content')
    <h1>detallelectura anteriores</h1>Total registros: {{ count($lecturas) }}


<table>
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Última fecha de lectura</th>
            <th>Lectura actual</th>
            <th>Lectura anterior</th>
            <th>Diferencia</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lecturas as $lectura)
            <tr>
                <td>{{ $lectura->matricula }}</td>
                <td>{{ $lectura->ultima_fecha_lectura }}</td>
                <td>{{ $lectura->lectura_actual }}</td>
                <td>{{ $lectura->lectura_anterior }}</td>
                <td>{{ $lectura->diferencia }}</td>
            </tr>
        @endforeach

    </tbody>
</table>





@endsection