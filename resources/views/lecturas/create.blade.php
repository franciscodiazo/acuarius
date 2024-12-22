@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Registrar Lectura</h1>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('lecturas.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div class="mb-4">
                    <label for="matricula" class="block text-gray-700 mb-2">Matrícula:</label>
                    <div class="flex">
                        <input type="text" id="matricula" name="matricula" class="border border-gray-300 p-2 rounded w-1/3" maxlength="5" required>
                        <button type="button" onclick="consultarUltimaLectura()" class="bg-blue-500 text-white px-4 py-2 ml-2 rounded">
                            Consultar
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="mb-4">
                        <label for="lectura_actual" class="block text-gray-700 mb-2">Nueva Lectura:</label>
                        <input type="text" id="lectura_actual" name="lectura_actual" class="border border-gray-300 p-2 rounded w-full" oninput="calcularConsumo()" required>
                    </div>

                    <div class="mb-4">
                        <label for="lectura_anterior" class="block text-gray-700 mb-2">Última Lectura Registrada:</label>
                        <input type="text" id="lectura_anterior" name="lectura_anterior" class="border border-gray-300 p-2 rounded w-full" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="consumo" class="block text-gray-700 mb-2">Consumo Calculado:</label>
                        <input type="text" id="consumo" name="consumo" class="border border-gray-300 p-2 rounded w-full" readonly>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="ano" class="block text-gray-700 mb-2">Año:</label>
                        <input type="number" id="ano" name="ano" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="ciclo_facturado" class="block text-gray-700 mb-2">Ciclo:</label>
                        <input type="number" id="ciclo_facturado" name="ciclo_facturado" class="border border-gray-300 p-2 rounded w-full" min="1" max="12" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="fecha" class="block text-gray-700 mb-2">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" class="border border-gray-300 p-2 rounded w-full" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
            </div>

            <div id="ultima_info" class="mb-4 text-sm text-gray-600 hidden">
                <p>Último ciclo registrado: <span id="ultimo_ciclo"></span></p>
                <p>Último año registrado: <span id="ultimo_ano"></span></p>
            </div>
            
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Registrar Lectura</button>
        </form>
    </div>
</div>

<script>
    function calcularConsumo() {
        const lecturaAnterior = parseFloat(document.getElementById('lectura_anterior').value) || 0;
        const lecturaActual = parseFloat(document.getElementById('lectura_actual').value) || 0;
        const consumo = lecturaActual - lecturaAnterior;
        document.getElementById('consumo').value = consumo.toFixed(2);
    }

    async function consultarUltimaLectura() {
        const matricula = document.getElementById('matricula').value;

        if (matricula) {
            try {
                const response = await fetch(`{{ route('lecturas.ultima', '') }}/${matricula}`, {
                    headers: {
                        'Accept': 'application/json',
                    }
                });

                if (!response.ok) {
                    throw new Error(`Error en la respuesta del servidor: ${response.statusText}`);
                }

                const data = await response.json();

                if (data.lectura_anterior !== undefined) {
                    document.getElementById('lectura_anterior').value = data.lectura_anterior;
                    document.getElementById('ultimo_ciclo').textContent = data.ultimo_ciclo_facturado || 'No disponible';
                    document.getElementById('ultimo_ano').textContent = data.ultimo_ano || 'No disponible';
                    document.getElementById('ultima_info').classList.remove('hidden');
                    calcularConsumo();
                    
                    // Sugerir el año actual
                    const currentYear = new Date().getFullYear();
                    document.getElementById('ano').value = currentYear;
                    
                    // Sugerir el siguiente ciclo
                    let siguienteCiclo = (parseInt(data.ultimo_ciclo_facturado) || 0) + 1;
                    if (siguienteCiclo > 12) {
                        siguienteCiclo = 1;
                        document.getElementById('ano').value = currentYear + 1;
                    }
                    document.getElementById('ciclo_facturado').value = siguienteCiclo;
                } else {
                    throw new Error('Lectura no encontrada');
                }
            } catch (error) {
                console.error('Error al obtener la última lectura:', error);
                alert('No se pudo obtener la última lectura. Verifica la matrícula o intenta más tarde.');
            }
        } else {
            alert("Por favor, ingresa una matrícula válida.");
        }
    }

    // Agregar un event listener al formulario para enviar la última lectura como lectura_anterior
    document.querySelector('form').addEventListener('submit', function(e) {
        const lecturaAnteriorInput = document.getElementById('lectura_anterior');
        const ultimaLecturaInput = document.createElement('input');
        ultimaLecturaInput.type = 'hidden';
        ultimaLecturaInput.name = 'lectura_anterior';
        ultimaLecturaInput.value = lecturaAnteriorInput.value;
        this.appendChild(ultimaLecturaInput);
    });

    // Establecer el año actual como valor predeterminado
    document.getElementById('ano').value = new Date().getFullYear();
</script>
@endsection
