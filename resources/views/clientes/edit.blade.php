@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Cliente</h1>

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

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="matricula" class="block text-gray-700">Matrícula</label>
            <input type="text" id="matricula" name="matricula" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->matricula }}" required>
        </div>

        <div class="mb-4">
            <label for="cedula" class="block text-gray-700">Cédula</label>
            <input type="text" id="cedula" name="cedula" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->cedula }}" required>
        </div>

        <div class="mb-4">
            <label for="nombres" class="block text-gray-700">Nombres</label>
            <input type="text" id="nombres" name="nombres" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->nombres }}" required>
        </div>

        <div class="mb-4">
            <label for="apellidos" class="block text-gray-700">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->apellidos }}" required>
        </div>

        <div class="mb-4">
            <label for="telefono" class="block text-gray-700">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->telefono }}">
        </div>

        <div class="mb-4">
            <label for="celular" class="block text-gray-700">Celular</label>
            <input type="text" id="celular" name="celular" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->cel }}">
        </div>

        <div class="mb-4">
            <label for="direccion" class="block text-gray-700">Dirección</label>
            <input type="text" id="direccion" name="direccion" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->direccion }}">
        </div>

        <div class="mb-4">
            <label for="barrio" class="block text-gray-700">Barrio</label>
            <input type="text" id="barrio" name="barrio" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->barrio }}">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->email }}">
        </div>

        <div class="mb-4">
            <label for="fecha_nacimiento" class="block text-gray-700">Fecha de Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="border border-gray-300 rounded p-2 w-full" value="{{ $cliente->fecha_nacimiento }}">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
    </form>
</div>
@endsection
