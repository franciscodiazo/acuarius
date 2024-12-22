@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Clientes</h1>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('clientes.index') }}" class="mb-4">
        <div class="flex items-center gap-4">
            <input 
                type="text" 
                name="search" 
                placeholder="Buscar por matrícula o nombre" 
                value="{{ request('search') }}" 
                class="w-full border border-gray-300 rounded px-3 py-2"
            >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>
            <a href="{{ route('clientes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Limpiar</a>
        </div>
    </form>


    <!-- Mostrar mensajes de error -->
    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($clientes->isEmpty())
        <div class="text-center mt-4">
            <p>No hay clientes registrados.</p>
            <a href="{{ route('clientes.create') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Registrar Nuevo Cliente</a>
        </div>
    @else
        <div class="overflow-x-auto relative">
            <table class="min-w-full bg-white border border-gray-300 rounded">
                <thead class="bg-gray-100 sticky top-0">
                    <tr>
                        <th class="py-2 px-4 border-b">Matrícula</th>
                        <th class="py-2 px-4 border-b">Cédula</th>
                        <th class="py-2 px-4 border-b">Nombres</th>
                        <th class="py-2 px-4 border-b">Apellidos</th>
                        <th class="py-2 px-4 border-b">Celular</th>
                        <th class="py-2 px-4 border-b">Sector</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                        <th class="py-2 px-4 border-b"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $cliente->matricula }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->cedula }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->nombres }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->apellidos }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->cel }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->barrio }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->email }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('facturas.historico', $cliente->id) }}" class="bg-gray-500 text-white px-2 py-1 rounded">Histórico</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $clientes->links() }}
        </div>

        <a href="{{ route('clientes.create') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Registrar Nuevo Cliente</a>
    @endif
</div>

<style>
    .overflow-x-auto {
        max-height: 70vh;
    }
    thead {
        position: sticky;
        top: 0;
        z-index: 10;
        background-color: #f3f4f6;
    }
</style>

@endsection
