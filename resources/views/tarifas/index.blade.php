@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="text-2xl font-bold mb-4">Gestión de Tarifas</h1>
    <div class="overflow-x-auto relative">
        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead class="bg-gray-100 sticky top-0">
                <tr>
                    <th class="py-2 px-4 border-b">Año</th>
                    <th class="py-2 px-4 border-b">Tarifa Básica</th>
                    <th class="py-2 px-4 border-b">Precio por Metro Adicional</th>
                    <th class="py-2 px-4 border-b">Última Actualización</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarifas as $tarifa)
                <tr>
                    <form action="{{ route('tarifas.update', $tarifa->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td class="py-2 px-4 border-b">
                            <input type="number" name="ano" value="{{ $tarifa->ano }}" class="w-full border border-gray-300 p-2 rounded modified-input">
                        </td>
                        <td class="py-2 px-4 border-b">
                            <input type="number" name="tarifa_basica" value="{{ $tarifa->tarifa_basica }}" step="0.01" class="w-full border border-gray-300 p-2 rounded modified-input">
                        </td>
                        <td class="py-2 px-4 border-b">
                            <input type="number" name="precio_metro_adicional" value="{{ $tarifa->precio_metro_adicional }}" step="0.01" class="w-full border border-gray-300 p-2 rounded modified-input">
                        </td>
                        <td class="py-2 px-4 border-b">{{ $tarifa->updated_at }}</td>
                        <td class="py-2 px-4 border-b">
                            <button type="submit" class="text-green-500 hover:underline">Guardar</button>
                        </td>
                    </form>
                    <td class="py-2 px-4 border-b">
                        <form action="{{ route('tarifas.destroy', $tarifa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $tarifas->links() }}
    </div>

    <div class="container mx-auto p-4">
        <h2 class="text-xl font-bold mb-4">Registrar Nueva Tarifa</h2>
        <form action="{{ route('tarifas.store') }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf
            <div class="mb-4">
                <label for="ano" class="block text-gray-700 font-bold mb-2">Año</label>
                <input type="number" name="ano" id="ano" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="tarifa_basica" class="block text-gray-700 font-bold mb-2">Tarifa Básica</label>
                <input type="number" name="tarifa_basica" id="tarifa_basica" step="0.01" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="precio_metro_adicional" class="block text-gray-700 font-bold mb-2">Precio por Metro Adicional</label>
                <input type="number" name="precio_metro_adicional" id="precio_metro_adicional" step="0.01" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
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
    .modified-input:focus {
        border-color: #2563eb; /* Azul */
        background-color: #eff6ff; /* Azul claro */
    }
</style>

@endsection
