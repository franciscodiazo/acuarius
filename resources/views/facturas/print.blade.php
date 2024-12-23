<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .factura {
            border: 1px solid #ccc;
            margin: 16px;
            padding: 16px;
            page-break-after: always;
        }
        .factura:last-child {
            page-break-after: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header .empresa {
            text-align: right;
        }
        .header img {
            height: 50px;
        }
        .info-cliente {
            text-align: left;
        }
        .factura-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .factura-info h1 {
            margin: 5px 0;
        }
        .factura-info p {
            margin: 2px 0;
        }
        .footer {
            border-top: 1px solid #ccc;
            padding-top: 10px;
            margin-top: 20px;
        }
        .desprendible {
            border-top: 2px dashed #ccc;
            padding-top: 10px;
            margin-top: 20px;
            font-size: 10px;
        }
        .desprendible .empresa-info {
            text-align: left;
        }
    </style>
</head>
<body>
    @foreach ($facturas as $factura)
    <div class="factura">
        <!-- Encabezado -->
        <div class="header">
            <div class="info-cliente">
                <h2>Datos del Cliente</h2>
                <p><strong>Nombre:</strong> {{ $factura->cliente->nombres }} {{ $factura->cliente->apellidos }}</p>
                <p><strong>Dirección:</strong> {{ $factura->cliente->direccion }}</p>
                <p><strong>Matrícula:</strong> {{ $factura->cliente->matricula }}</p>
            </div>
            <div class="empresa">
                <img src="{{ asset('img/LOGO_ACUAPALTRES.jpg') }}" alt="Logo Empresa">
                <p><strong>ACUAPALTRES</strong></p>
                <p>Restrepo Valle del Cauca, Colombia</p>
                <p>Tel: 310 553 6083</p>
                <p>Email: acuapaltres@gmail.com</p>
            </div>
        </div>

        <!-- Información de la Factura -->
        <div class="factura-info">
            <h1>Factura</h1>
            <p><strong>Número:</strong> {{ $factura->numero_factura }}</p>
            <p><strong>Fecha de Emisión:</strong> {{ $factura->fecha_emision }}</p>
            <p><strong>Fecha de Vencimiento:</strong> {{ $factura->fecha_vencimiento }}</p>
            <p><strong>Total:</strong> ${{ number_format($factura->total, 2) }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($factura->estado) }}</p>
            <h2>Medios de Pago</h2>
            <p>Banco de Davivienda, Cuenta CTE No. 000-115-015182</p>
            <p>A nombre de Asociación de Usuarios de la red de distribución de agua</p>
            <p>Horario de atención y recaudo: sábados de 8:00 am a 12:00 m y de 1:00 pm a 4:00 pm</p>
        </div>

        <!-- Detalles de Consumo -->
        <h2>Detalles</h2>
        <ul>
            @foreach ($factura->detalles as $detalle)
            <li>{{ $detalle->descripcion }} - ${{ number_format($detalle->total, 2) }}</li>
            @endforeach
        </ul>

        <!-- Desprendible de Pago -->
        <div class="desprendible">
            <div class="empresa-info">
                <p><strong>Desprendible de Pago</strong></p>
                <p><strong>Nombre:</strong> {{ $factura->cliente->nombres }} {{ $factura->cliente->apellidos }}</p>
                <p><strong>Total a Pagar:</strong> ${{ number_format($factura->total, 2) }}</p>
                <p><strong>Fecha Límite:</strong> {{ $factura->fecha_vencimiento }}</p>
            </div>
            <div class="empresa-info">
                <p><strong>Información de Contacto</strong></p>
                <p>Banco de Davivienda, Cuenta CTE No. 000-115-015182</p>
                <p>A nombre de Asociación de Usuarios de la red de distribución de agua</p>
                <p>Horario: sábados de 8:00 am a 12:00 m y de 1:00 pm a 4:00 pm</p>
                <p>Tel: 310 553 6083</p>
                <p>Email: acuapaltres@gmail.com</p>
            </div>
        </div>
    </div>
    @endforeach
</body>
</html>
