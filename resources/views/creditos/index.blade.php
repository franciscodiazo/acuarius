@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Créditos</h1>
        <div class="mb-2">
            <a href="{{ route('creditos.create') }}" class="btn btn-success">Agregar Crédito</a>
<form action="{{ route('creditos.index') }}" method="GET">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar..." name="search" value="{{ $search }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form>

        </div>
        @if (count($creditos) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matrícula</th>
                        <th>Acuerdo</th>
                        <th>Detalle</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>Monto</th>
                        <th>Tasa de Interés</th>
                        <th>Plazo (meses)</th>
                        <th>Fecha Próximo Pago</th>
                        <th>Saldo</th>
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($creditos as $cred)
                        <tr>
                            <td>{{ $cred->id }}</td>
                            <td>{{ $cred->matricula }}</td>
                            <td>{{ $cred->acuerdo }}</td>
                            <td>{{ $cred->detalle }}</td>
                            <td>{{ $cred->fecha_inicio }}</td>
                            <td>{{ $cred->fecha_final }}</td>
                            <td>{{ $cred->monto }}</td>
                            <td>{{ $cred->tasa_interes }}</td>
                            <td>{{ $cred->plazo_meses }}</td>
                            <td>{{ $cred->fecha_proximo_pago }}</td>
                            <td>{{ $cred->saldo }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('creditos.edit', $cred->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('creditos.destroy', $cred->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>


                                </div>
                            </td>
                            <td><div><a href="{{ route('pagos.index', ['credito_id' => $cred->id]) }}" class="btn btn-primary">Pagar</a></div></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay créditos registrados.</p>
        @endif
    </div>
@endsection