<h1>Listado de Suscriptores</h1>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cédula</th>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Nacimiento</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección Residencia</th>
            <th>Vereda</th>
            <th>Sector</th>
            <th>Municipio</th>
            <th>País</th>
            <th>Coordenadas</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suscriptores as $suscriptor)
            <tr>
                <td>{{ $suscriptor->id }}</td>
                <td>{{ $suscriptor->cedula }}</td>
                <td>{{ $suscriptor->apellidos }}</td>
                <td>{{ $suscriptor->nombres }}</td>
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
                        <a class="btn btn-primary" href="{{ route('suscriptores.edit', $suscriptor->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    <a class="btn btn-success" href="{{ route('suscriptores.create') }}">Crear nuevo Suscriptor</a>
</div>