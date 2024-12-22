@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Bienvenido a la Aplicación de Gestión de Facturación</h1>
    
    <!-- Resumen de Datos -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-blue-500 text-white p-6 rounded shadow text-center">
            <h2 class="text-lg font-bold">Clientes Registrados</h2>
            <p class="text-4xl font-bold">{{ $clientesCount }}</p>
        </div>
        <div class="bg-green-500 text-white p-6 rounded shadow text-center">
            <h2 class="text-lg font-bold">Facturas Emitidas</h2>
            <p class="text-4xl font-bold">{{ $facturasCount }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-6 rounded shadow text-center">
            <h2 class="text-lg font-bold">Tarifas Activas</h2>
            <p class="text-4xl font-bold">{{ $tarifasCount }}</p>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Gráfico de Barras -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4 text-center">Gráfico de Barras</h2>
            <div class="w-full h-64">
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <!-- Gráfico de Tortas -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4 text-center">Gráfico de Tortas</h2>
            <div class="w-full h-64">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Accesos rápidos -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
        <a href="{{ route('clientes.index') }}" class="bg-blue-500 text-white p-4 rounded shadow text-center">
            <h3 class="text-lg font-bold">Gestión de Clientes</h3>
        </a>
        <a href="{{ route('facturas.index') }}" class="bg-green-500 text-white p-4 rounded shadow text-center">
            <h3 class="text-lg font-bold">Gestión de Facturas</h3>
        </a>
        <a href="{{ route('tarifas.index') }}" class="bg-yellow-500 text-white p-4 rounded shadow text-center">
            <h3 class="text-lg font-bold">Gestión de Tarifas</h3>
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Barras
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Clientes', 'Facturas', 'Tarifas'],
            datasets: [{
                label: 'Totales',
                data: [{{ $clientesCount }}, {{ $facturasCount }}, {{ $tarifasCount }}],
                backgroundColor: ['#2563EB', '#16A34A', '#F59E0B'],
                borderColor: ['#1E3A8A', '#065F46', '#B45309'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico de Tortas
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Clientes', 'Facturas', 'Tarifas'],
            datasets: [{
                label: 'Totales',
                data: [{{ $clientesCount }}, {{ $facturasCount }}, {{ $tarifasCount }}],
                backgroundColor: ['#2563EB', '#16A34A', '#F59E0B'],
                borderColor: ['#1E3A8A', '#065F46', '#B45309'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const value = context.raw;
                            const percentage = ((value / total) * 100).toFixed(2);
                            return `${context.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
