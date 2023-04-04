@extends('layouts.app')

@section('title', 'Suscriptores')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lecturas') }}</div>
                 <a class="btn btn-primary" href="{{ route('lecturas.create') }}">Crear Usuario</a>

                <div class="card-body">
                    <table class="table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Matrícula</th>
                                <th>Fecha de Lectura</th>
                                <th>Ciclo</th>
                                <th>Año Actual</th>
                                <th>Lectura Actual</th>
                                <th>Lectura Anterior</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lecturas as $lectura)
                            <tr>
                                <td>{{ $lectura->id }}</td>
                                <td>{{ $lectura->matricula }}</td>
                                <td>{{ $lectura->fecha_lectura }}</td>
                                <td>{{ $lectura->ciclo }}</td>
                                <td>{{ $lectura->ano_actual }}</td>
                                <td>{{ $lectura->lectura_actual }}</td>
                                <td>{{ $lectura->lectura_anterior }}</td>
                                <td>
                                    <a href="{{ route('lecturas.show', $lectura->id) }}" class="btn btn-primary">{{ __('Mostrar') }}</a>
                                    <a href="{{ route('lecturas.edit', $lectura->id) }}" class="btn btn-secondary">{{ __('Editar') }}</a>
                                    <form action="{{ route('lecturas.destroy', $lectura->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection