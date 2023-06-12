<!-- facturacion/pendientes.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalles de Factura Pendientes</h1>

    @if ($detallesPendientes->isEmpty())
        <p>No hay detalles de factura pendientes.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Matrícula</th>
                    <!-- Agrega otras columnas que desees mostrar -->
                </tr>
            </thead>
            <tbody>
                @foreach ($detallesPendientes as $detalle)
                    <tr>
                        <td>{{ $detalle->id }}</td>
                        <td>{{ $detalle->matricula }}</td>
                        <!-- Agrega otras columnas que desees mostrar -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection|