@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Suscriptores | Usuarios') }}</div>
                <a class="btn btn-primary" href="{{ route('suscriptores.create') }}">Crear Usuario</a>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Matricula</th>
                                <th scope="col">Nacimiento</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Dirección Residencia</th>
                                <th scope="col">Vereda</th>
                                <th scope="col">Sector</th>
                                <th scope="col">Municipio</th>
                                <th scope="col">País</th>
                                <th scope="col">Coordenadas</th>
                                <th scope="col">Estado</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="display: none;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($suscriptores as $suscriptor)
                                <tr class="odd">
                                    <th scope="row"><a href="{{ route('suscriptores.edit', $suscriptor->id) }}">{{ $suscriptor->id }}</a></th>
                                    <td>{{ $suscriptor->cedula }}</td>
                                    <td>{{ $suscriptor->apellidos }}</td>
                                    <td>{{ $suscriptor->nombres }}</td>
                                    <td>{{ $suscriptor->matricula }}</td>
                                    <td>{{ $suscriptor->fecha_nacimiento }}</td>
                                    <td>{{ $suscriptor->email }}</td>
                                    <td>{{ $suscriptor->telefono }}</td>
                                    <td>{{ $suscriptor->direccion_residencia }}</td>
                                    <td>{{ $suscriptor->vereda }}</td>
                                    <td>{{ $suscriptor->sector }}</td>
                                    <td>{{ $suscriptor->municipio }}</td>
                                    <td>{{ $suscriptor->pais }}</td>
                                    <td>{{ $suscriptor->coordenadas }}</td>
                                    <td>{{ $suscriptor->estado }}</td>
                                    <td>
                                       
                                        <form action="{{ route('suscriptores.destroy', $suscriptor->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('suscriptores.edit', $suscriptor->id) }}">Editar</a></td><td>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
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

