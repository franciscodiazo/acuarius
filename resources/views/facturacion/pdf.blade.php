<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Título de la página</title>
  <link rel="stylesheet" href="styles.css"> <!-- Enlace a una hoja de estilos CSS externa -->
  <style>
    /* Estilos CSS internos */
    @media print {
      @page {
        margin: 1cm;
        size: letter;
      }
    }

    body {
      margin: 2;
      padding: 2;
      height: 24.94cm; /* 27.94cm es el tamaño de una página carta en centímetros */
      display: flex;
      flex-direction: column;
    }

    header {
      display: flex; /* Mostrar los elementos del encabezado en línea */
      align-items: center; /* Centrar verticalmente los elementos del encabezado */
    }

    .header-container {
      display: flex; /* Mostrar las cajas en línea */
      width: 100%; /* Ancho completo */
    }

    .logo,
    .component {
      margin-right: 1cm; /* Espacio de 1 centímetro entre las cajas */
      flex: 1; /* Distribución equitativa del espacio disponible */
    }

    main {
      flex-grow: 1; /* Hacer que el contenido principal ocupe todo el espacio disponible */
    }

    footer {
      margin-top: auto; /* Empujar el footer hacia la parte inferior de la página */
      padding: 1cm; /* Espaciado interno de 1 centímetro */
      background-color: #f2f2f2; /* Color de fondo del footer */
    }

    table {
      width: 100%;
      max-width: 18.59cm; /* Ancho máximo de tamaño carta - 2cm de los márgenes laterales */
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
    }
    
    .content {
      overflow-x: auto; /* Barra de desplazamiento horizontal */
      max-width: 100%; /* Ancho máximo para permitir desplazamiento */
    }

    .fieldset-container {
      display: flex;
      gap: 1rem;
    }

    fieldset {
      border: 1;
      padding: 0;
      margin: 0;
    }

    legend {
      font-size: 14px;
      font-weight: bold;
    }

    fieldset p {
      font-size: 12px;
      margin: 0;
    }

    fieldset p span {
      font-size: 11px;
      font-weight: normal;
    }
  </style>
</head>
<body>
  <header>
    <!-- Encabezado de la página -->
    <div class="header-container">
      <div class="logo">
        <!-- Coloca aquí tu logotipo -->
        <img src="{{ asset('img/acuapaltres.png') }}" alt="Acuapaltres" width="100" height="auto">
      </div>
      <div class="component">
        <!-- Componente 1 con los datos básicos del suscriptor o usuario -->
        <h3>Datos del Suscriptor</h3>
        <p>SUSCRIPTOR: {{ $detalles->matricula }}</p>
        <p>REF: {{ $detalles->id }}</p>
        <p>Fecha de Emisión: {{ $detalles->fecha_emision }}</p>
      </div>
      <div class="component">
        <!-- Componente 2 con los detalles de facturación -->
        <h3>Detalles de Facturación</h3>
        <p># Cuota Familiar: {{ $detalles->numero }}</p>
        <p>Pago Oportuno: {{ $detalles->fecha_vencimiento }}</p>
        <p># Cuota: {{ $detalles->id_detalle_factura }}</p>
      </div>
    </div>
  </header>

  <main>
    <!-- Contenido principal -->
    <section>
      <h2>Sección 1</h2>
      <div class="factura content">
        <h3>Factura</h3>
        <table>
          <tr>
            <th>Categoría</th>
            <th>Valor</th>
          </tr>
          <tr>
            <td>Periodo Facturado</td>
            <td>{{ $detalles->periodo_facturado }}</td>
          </tr>
          <tr>
            <td>Lectura Actual</td>
            <td>{{ $detalles->lectura_actual }}</td>
          </tr>
          <tr>
            <td>Lectura Anterior</td>
            <td>{{ $detalles->lectura_anterior }}</td>
          </tr>
          <tr>
            <td>Total Otros Créditos</td>
            <td>{{ $detalles->total_creditos }}</td>
          </tr>
          <tr>
            <td>Total a Pagar Créditos más Factura</td>
            <td>{{ $detalles->total_pagar }}</td>
          </tr>
        </table>
      </div>
    </section>

<section>
  <h2>Sección 2</h2>
  <div class="fieldset-container">
    <fieldset>
      <legend>Información de Tarifa</legend>
      <p>Tarifa: <span>{{ $detalles->tarifa }}</span></p>
      <p>Precio por kWh: <span>{{ $detalles->precio_kwh }}</span></p>
    </fieldset>
    <fieldset>
      <legend>Lectura Actual</legend>
      <p>Lectura: <span>{{ $detalles->lectura_actual }}</span></p>
    </fieldset>
    <fieldset>
      <legend>Lectura Anterior</legend>
      <p>Lectura: <span>{{ $detalles->lectura_anterior }}</span></p>
    </fieldset>
    <fieldset>
      <legend>Consumo</legend>
      <p>Total kWh Consumidos: <span>{{ $detalles->total_consumo }}</span></p>
    </fieldset>
    <fieldset>
      <legend>Resumen de Total a Pagar</legend>
      <p>Total a Pagar: <span>{{ $detalles->total_pagar }}</span></p>
    </fieldset>
  </div>
</section>

  </main>

  <footer>
    <!-- Pie de página -->
    <table>
      <tr>
        <td rowspan="2">
          <img src="{{ asset('img/acuapaltres.png') }}" alt="Acuapaltres" width="50" height="auto">
        </td>
        <td>
          <strong>Nombre del Suscriptor:</strong> Juan Pérez
        </td>
      </tr>
      <tr>
        <td>
          <strong>Fecha de Factura:</strong> 10 de junio de 2023
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <strong>Total del Consumo:</strong> $150.00<br>
          <strong>Total a Pagar:</strong> $100.00
        </td>
      </tr>
    </table>
  </footer>

  <script src="script.js"></script> <!-- Enlace a un archivo JavaScript externo -->
  <script>
    // Código JavaScript
  </script>
</body>
</html>
