@extends('layouts.app')

@section('title', 'Tarifas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tarifas') }}</div>
                 <a class="btn btn-primary" href="{{ route('matriculas.create') }}">Crear Matricula</a>

                <div class="card-body">
                    <table class="table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>matricula</th>
                                <th>medidor</th>
                                <th>poliza</th>
                                <th>observaciones</th>
                                <th>estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matriculas as $matricula)
                            <tr>
                                <td>{{ $matricula->id }}</td>
                                <td>{{ $matricula->matricula }}</td>
                                <td>{{ $matricula->medidor }}</td>
                                <td>{{ $matricula->poliza }}</td>
                                <td>{{ $matricula->observaciones }}</td>
                                <td>{{ $matricula->estado }}</td>
                                <td>
                                    <a href="{{ route('matriculas.show', $matricula->id) }}" class="btn btn-primary">{{ __('Mostrar') }}</a>
                                    <a href="{{ route('matriculas.edit', $matricula->id) }}" class="btn btn-secondary">{{ __('Editar') }}</a>
                                    <form action="{{ route('matriculas.destroy', $matricula->id) }}" method="POST" style="display: inline-block;">
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

