<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 16px auto;
            width: 80%;
        }
        .factura {
            background: #fff;
            border: 1px solid #ccc;
            margin-bottom: 16px;
            padding: 16px;
            page-break-after: always;
        }
        .factura:last-child {
            page-break-after: auto;
        }
        .header, .footer {
            display: flex;
            justify-content: space-between;
        }
        .header img {
            height: 50px;
        }
        .footer {
            border-top: 2px dashed #ccc;
            padding-top: 10px;
            margin-top: 20px;
            font-size: 10px;
        }
        .footer div {
            width: 48%;
        }
        h1, h2, h3, p {
            margin: 0;
            padding: 0;
        }
        h1 {
            font-size: 1.5rem;
            color: #2563EB;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            margin-top: 10px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: right;
        }
        table th {
            background: #f1f1f1;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    @if($facturas->isEmpty())
        <p>No se encontraron facturas en el rango especificado.</p>
    @else
        @foreach ($facturas as $factura)
        <div class="factura">
            <!-- Encabezado -->
            <div class="header">
                <div>
                    <h1>ACUAPALTRES</h1>
                    <p>Restrepo Valle del Cauca, Colombia</p>
                    <p>Teléfono: 310 553 6083</p>
                    <p>Email: acuapaltres@gmail.com</p>
                    <p>NIT: 805.019.516-2</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('img/LOGO_ACUAPALTRES.jpg') }}" alt="Logo Empresa">
                </div>
            </div>

            <!-- Información del Cliente -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <h2 class="text-sm font-bold text-blue-600 mb-2">Datos del Cliente</h2>
                    <p><strong>Nombres y Apellidos:</strong> {{ $factura->cliente->nombres }} {{ $factura->cliente->apellidos }}</p>
                    <p><strong>Matrícula:</strong> {{ $factura->cliente->matricula }}</p>
                    <p><strong>Dirección:</strong> {{ $factura->cliente->direccion }}</p>
                    <p><strong>Teléfono:</strong> {{ $factura->cliente->telefono }}</p>
                </div>
                <div>
                    <h2 class="text-sm font-bold text-blue-600 mb-2">Información de Factura</h2>
                    <p><strong>Cuota:</strong> {{ $factura->numero_factura }}</p>
                    <p><strong>Fecha de Emisión:</strong> {{ $factura->fecha_emision }}</p>
                    <p><strong>Fecha de Vencimiento:</strong> {{ $factura->fecha_vencimiento }}</p>
                    <p><strong>Total:</strong> ${{ number_format($factura->total, 2) }}</p>
                </div>
            </div>

            <!-- Detalles -->
            <h3>Detalle de Consumo</h3>
            <table>
                <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Impuesto</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($factura->detalles as $detalle)
                <tr>
                    <td style="text-align: left;">{{ $detalle->descripcion }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
                    <td>${{ number_format($detalle->subtotal, 2) }}</td>
                    <td>${{ number_format($detalle->impuesto, 2) }}</td>
                    <td>${{ number_format($detalle->total, 2) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Resumen -->
            <div class="footer">
                <div>
                    <h3>Medios de Pago</h3>
                    <p>Banco de Davivienda</p>
                    <p>Cuenta CTE No. 000-115-015182</p>
                    <p>A nombre de Asociación de Usuarios de la red de distribución de agua</p>
                    <p>Horario: Sábados de 8:00 am - 4:00 pm</p>
                </div>
                <div>
                    <h3>Resumen</h3>
                    <p><strong>Total:</strong> ${{ number_format($factura->total, 2) }}</p>
                    <p><strong>Fecha Límite de Pago:</strong> {{ $factura->fecha_vencimiento }}</p>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
</body>
</html>
