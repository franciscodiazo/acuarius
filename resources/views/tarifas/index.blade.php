@extends('layouts.app')

@section('title', 'Tarifas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tarifas') }}</div>
                 <a class="btn btn-primary" href="{{ route('tarifas.create') }}">Crear tarifa</a>

                <div class="card-body">
                    <table class="table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>tipo</th>
                                <th>valor Base</th>
                                <th>valor Recargo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tarifas as $tarifa)
                            <tr>
                                <td>{{ $tarifa->id }}</td>
                                <td>{{ $tarifa->tipo }}</td>
                                <td>{{ $tarifa->tarifa_base }}</td>
                                <td>{{ $tarifa->tarifa_recargo }}</td>
                                <td>
                                    <a href="{{ route('tarifas.show', $tarifa->id) }}" class="btn btn-primary">{{ __('Mostrar') }}</a>
                                    <a href="{{ route('tarifas.edit', $tarifa->id) }}" class="btn btn-secondary">{{ __('Editar') }}</a>
                                    <form action="{{ route('tarifas.destroy', $tarifa->id) }}" method="POST" style="display: inline-block;">
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