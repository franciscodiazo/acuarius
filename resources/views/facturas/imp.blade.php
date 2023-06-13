<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cuota Familiar</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

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
      font-family: "Roboto", Arial, sans-serif;
      font-size: 12px;

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
      padding: 0cm; /* Espaciado interno de 1 centímetro */
      background-color: #f2f2f2; /* Color de fondo del footer */
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }

    table th {
      background-color: #f2f2f2;
      color: #333;
      font-weight: bold;
      padding: 10px;
    }

    table td {
      padding: 10px;
    }

    table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    table tr:hover {
      background-color: #e6e6e6;
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
    .fieldset-container {
      display: flex;
      gap: 1rem;
    }

    .modern-fieldset {
      border: 1px solid #3498db;
      border-radius: 6px;
      padding: 1rem;
      margin: 0;
    }

    .modern-fieldset legend {
      font-size: 14px;
      font-weight: bold;
      color: #3498db;
    }

    .modern-fieldset p {
      font-size: 12px;
      margin: 0;
    }

    .modern-fieldset p span {
      font-size: 11px;
      font-weight: normal;
    }    
    .modern-fieldset.footer-fieldset {
      flex-basis: 100%; /* Ocupa todo el ancho */
      margin-top: 1rem;
    }
    .section-divider {
      border-bottom: 1px dashed #000;
      margin-bottom: 1rem;
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
        <fieldset class="modern-fieldset">
        <legend>Datos del Suscriptor</legend>
        <p><b>SUSCRIPTOR:</b> {{ $detalles->matricula }}</p>
        <p><b>REF:</b> {{ $detalles->id }}</p>
        <p><b>Fecha de Emisión:</b> {{ $detalles->ultima_fecha_lectura }}</p>    
        <p><b>Pago Oportuno:</b>  {{ date('Y-m-d', strtotime($detalles->ultima_fecha_lectura . '+20 days')) }}</p>
        <p><b>Ciclo:</b>{{ $detalles->ciclo }}</p>      
        </fieldset>
      </div>
      <div class="component">
        <!-- Componente 2 con los detalles de facturación -->
        <fieldset class="modern-fieldset">
        <legend>Detalles de Facturación</legend>
        <p><b>Cuota Familiar #:</b> {{ $detalles->id }}</p>
        <div align="center"><b> Total Cuota</b></div>
         <div align="center" style="border: solid #A52A2A 3px; border-radius: 50%;"><b> ${{ number_format($detalles->valor_total, 2, ',', '.') }}</b></div>
         <div align="center">
          <b>Cretidos y otros:</b><p> <div align="left"> Cuotas: <p align="right"> ${{ number_format($total_facturas_pendientes, 2, ',', '.') }}</p></div></p>
          <p>
          @php
              $totalSaldoCredito = 0;
          @endphp

          @foreach ($creditos as $credito)
              @if ($credito->saldo > 0)
                  @php
                      $totalSaldoCredito += $credito->saldo;
                  @endphp
                  <!-- Agrega más campos de crédito según tus necesidades -->
              @endif
          @endforeach

          <div align="left">Créditos: <p align="right">${{ number_format($totalSaldoCredito, 2, ',', '.') }}</p></div>
          <div align="left"><b>Total pendientes:</b> <p align="right">${{ number_format(($totalSaldoCredito + $total_facturas_pendientes), 2, ',', '.') }}</p></div>                
          </p></div>
        </fieldset>
      </div>
    </div>
  </header>

  <main>
    <!-- Contenido principal -->
<section>
  <h3 align="center"><div align="center">¡Sí proteges el Agua Proteges la Vida!</div></h3>
  <div class="fieldset-container">
    <fieldset class="modern-fieldset">
      @foreach ($tarifas as $tarifa)
      <legend>Información de Tarifa</legend>
      <p><b>Tarifa: </b><span>${{ $tarifa->tarifa_base }}</span></p>
      <p><b>Precio por M3: </b><span>${{ $tarifa->tarifa_recargo }}</span></p>

    @endforeach
    </fieldset>
    <fieldset class="modern-fieldset">
      <legend>Lectura Actual</legend>
      <p><span>{{ $detalles->lectura_actual }}</span></p>
    </fieldset>
    <fieldset class="modern-fieldset">
      <legend>Lectura Anterior</legend>
      <p><span>{{ $detalles->lectura_anterior }}</span></p>
    </fieldset>
    <fieldset class="modern-fieldset">
      <legend>Consumo</legend>
      <p><b>M3: </b><span>{{ $detalles->consumo }}</span></p>
    </fieldset>
    <fieldset class="modern-fieldset">
      <legend>Total a Pagar</legend>
      <p><span>${{ number_format($detalles->valor_total, 2, ',', '.') }}</span></p>
    </fieldset>
  </div>
</section>    
<section>

  <div class="fieldset-container">
    <!-- Tus otros fieldsets aquí -->
    <fieldset class="modern-fieldset footer-fieldset">
      <legend>Resumen cuota Familiar</legend>
      <div class="factura content">
        <table>
          <tr>
            <th colspan="2" align="center">Descripción</th>
          </tr>
          <tr>
            <td>Lectura Actual</td>
            <td align="right">{{ $detalles->lectura_actual }}</td>
          </tr>
          <tr>
            <td>Lectura Anterior</td>
            <td align="right">{{ $detalles->lectura_anterior }}</td>
          </tr>
          <tr>
            <td>Total Otros Créditos</td>
            <td>{{ $detalles->total_creditos }}</td>
          </tr>
          <tr>
            <td>Total Cuota</td>
            <td align="right">${{ number_format($detalles->valor_total, 2, ',', '.') }}</td> 
      </b>

 </div></td>
          </tr>
        </table>
      </div>
    </fieldset>
  </div>
</section>
<section>
  <div class="fieldset-container">
    <fieldset class="modern-fieldset footer-fieldset">
      <legend> Pendientes</legend>
@php
    $total = 0;
@endphp

@foreach ($ultimos_detalles as $detalle)
    @if ($detalle->estado == 'pendiente' && $detalle->valor_total > 0)
        @php
            $total += $detalle->valor_total;
        @endphp
        <p><b>Estado: </b>{{ $detalle->estado }} {{ $detalle->valor_total }} Ciclo: {{ $detalle->ciclo }}</p>
    @endif
@endforeach

<p>Total: {{ $total }}</p>

    </fieldset>
    <fieldset class="modern-fieldset footer-fieldset">
      <legend> Ultimos Consumos</legend>
      @foreach ($ultimos_detalles as $detalle)
          <p><b>Ciclo:</b> {{ $detalle->ciclo }} <b>Consumo:</b> {{ $detalle->consumo }}</p><progress value="{{ $detalle->consumo }}" max="1000"></progress>
          <!-- Agrega más campos de detalle según tus necesidades -->
      @endforeach

    </fieldset>
    <fieldset class="modern-fieldset footer-fieldset">
      <legend>Creditos</legend>
    @php
        $totalSaldoCredito = 0;
    @endphp

    @foreach ($creditos as $credito)
        <div class="credito">
           @if ($credito->saldo > 0)
            @php
                $totalSaldoCredito += $credito->saldo;
            @endphp
            <p><b>Crédito {{ $credito->acuerdo }}:</b> ${{ $credito->saldo }}</p>
            <!-- Agrega más campos de crédito según tus necesidades -->
           @endif
        </div>
    @endforeach

    <p>Total Saldo de Crédito: ${{ $totalSaldoCredito }}</p>    </fieldset>
  </div>
</section>

</main>

  <footer>
    <!-- Pie de página -->

<section>
<div class="section-divider"></div>
  <div class="fieldset-container">
    <!-- Tus otros fieldsets aquí -->
    <fieldset class="modern-fieldset footer-fieldset">
      <legend>Copia</legend>
      <table>
      <tr>
        <td rowspan="2">
          <img src="{{ asset('img/acuapaltres.png') }}" alt="Acuapaltres" width="50" height="auto">
        </td>
        <td>
          <strong>Nombre del Suscriptor:</strong> {{ $detalles->nombres }} {{ $detalles->apellidos }}          
          <p><strong>Matrícula:</strong> {{ $detalles->matricula }} 
          <p><strong>Dirección:</strong> {{ $detalles->direccion_residencia }} {{ $detalles->sector }}
        </td>
      </tr>
      <tr>
        <td>
          <strong>Paguese antes de:</strong> {{ date('Y-m-d', strtotime($detalles->ultima_fecha_lectura . '+20 days')) }}
        </td>
        <td align="right">
          <strong>Total del Consumo:</strong>{{ $detalles->consumo }} <br>
        </td>
      </tr>
      <tr>
        <td> 
        </td>
        <td> 
        </td>
        <td>
          <div align="center" style="border: solid #A52A2A 3px; border-radius: 50%;"><strong>Total a Pagar:</strong> ${{ number_format($detalles->valor_total, 2, ',', '.') }}</div>
        </td>
      </tr>
    </table>
    </fieldset>
  </div>
</section>
    
  </footer>

  <script src="script.js"></script> <!-- Enlace a un archivo JavaScript externo -->
  <script>
    // Código JavaScript
  </script>
</body>
</html>
