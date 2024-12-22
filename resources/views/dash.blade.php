<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaRural - Gestión de Acueductos Rurales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Hero Section -->
    <header class="relative bg-blue-700 text-white">
        <div class="absolute inset-0">
            <img src="https://source.unsplash.com/1600x900/?water,nature" alt="Paisaje acuático" class="w-full h-full object-cover opacity-50">
        </div>
        <div class="relative container mx-auto px-4 py-24 text-center">
            <h1 class="text-5xl font-extrabold mb-4">Bienvenido a AquaRural</h1>
            <p class="text-xl mb-6">La solución integral para gestionar acueductos rurales de manera moderna y eficiente.</p>
            <a href="#features" class="bg-white text-blue-700 px-6 py-3 rounded font-bold shadow-md hover:bg-gray-200">Conoce Más</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">¿Qué puedes hacer con AquaRural?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-blue-50 p-6 rounded shadow text-center">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">Gestión de Clientes</h3>
                    <p class="text-gray-600">Organiza y administra la información de los usuarios de tu acueducto de forma centralizada.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-blue-50 p-6 rounded shadow text-center">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">Generación de Facturas</h3>
                    <p class="text-gray-600">Automatiza la facturación y simplifica el seguimiento de pagos pendientes.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-blue-50 p-6 rounded shadow text-center">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">Configuración de Tarifas</h3>
                    <p class="text-gray-600">Establece tarifas personalizadas para los servicios de agua de tu comunidad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-blue-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Empieza ahora con AquaRural</h2>
            <p class="text-lg mb-6">Crea tu cuenta y lleva la gestión de tu acueducto al siguiente nivel.</p>
            <a href="/register" class="bg-white text-blue-700 px-6 py-3 rounded font-bold shadow-md hover:bg-gray-200">Registrarse</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} AquaRural. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>



