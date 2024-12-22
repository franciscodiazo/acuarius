@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Gestión de Clientes</h1>

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

    <div class="flex flex-wrap -mx-2">
        <!-- Tarjeta de Registro de Cliente -->
        <div class="w-full md:w-1/2 px-2 mb-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Registrar Nuevo Cliente</h2>
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="matricula" class="block text-gray-700">Matrícula</label>
                        <input type="text" id="matricula" name="matricula" class="border border-gray-300 rounded p-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="cedula" class="block text-gray-700">Cédula</label>
                        <input type="text" id="cedula" name="cedula" class="border border-gray-300 rounded p-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="nombres" class="block text-gray-700">Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="border border-gray-300 rounded p-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="apellidos" class="block text-gray-700">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="border border-gray-300 rounded p-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="telefono" class="block text-gray-700">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="celular" class="block text-gray-700">Celular</label>
                        <input type="text" id="celular" name="celular" class="border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="direccion" class="block text-gray-700">Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="barrio" class="block text-gray-700">Barrio</label>
                        <input type="text" id="barrio" name="barrio" class="border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="fecha_nacimiento" class="block text-gray-700">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="border border-gray-300 rounded p-2 w-full">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                </form>
            </div>
        </div>

        <!-- Tarjeta de Último Cliente Registrado y Total de Clientes -->
        <div class="w-full md:w-1/2 px-2 mb-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Información de Clientes</h2>
                
                <div class="mb-4">
                    <h3 class="text-lg font-medium mb-2">Último Cliente Registrado</h3>
                    @if($ultimoCliente)
                        <p><strong>Matrícula:</strong> {{ $ultimoCliente->matricula }}</p>
                        <p><strong>Cédula:</strong> {{ $ultimoCliente->cedula }}</p>
                        <p><strong>Nombres:</strong> {{ $ultimoCliente->nombres }}</p>
                        <p><strong>Apellidos:</strong> {{ $ultimoCliente->apellidos }}</p>
                        <p><strong>Teléfono:</strong> {{ $ultimoCliente->telefono }}</p>
                        <p><strong>Celular:</strong> {{ $ultimoCliente->celular }}</p>
                        <p><strong>Barrio:</strong> {{ $ultimoCliente->barrio }}</p>
                    @else
                        <p>No hay clientes registrados aún.</p>
                    @endif
                </div>

                <div>
                    <h3 class="text-lg font-medium mb-2">Total de Clientes</h3>
                    <p class="text-2xl font-bold">{{ $totalClientes }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
