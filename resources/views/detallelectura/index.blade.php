
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <h1>{{ __('Suscriptores | Cuota Familiar') }}</h1>Total registros: {{ count($lecturas) }} </div>

                <div class="table-responsive">
                    <table class="table table-striped">
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
{{ $ultimasLecturas->links() }}



                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection