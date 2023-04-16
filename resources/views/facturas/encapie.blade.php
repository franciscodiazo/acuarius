<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
    <meta charset="UTF-8">
    <title>Recibo de Pago</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

</head>
<body>
<header>
    <h1>Acueducto</h1>
</header>

<main>
    <div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Recibo de Pago</h3>
                </div>
                <div class="box-body">

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-12">
            <h2>Factura</h2>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <p class="font-weight-bold">Detalle de la factura:</p>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID detalle lectura</th>
                    <th>Ciclo</th>
                    <th>Última fecha lectura</th>
                    <th>Lectura anterior</th>
                    <th>Lectura actual</th>
                    <th>Consumo</th>
                    <th>Valor total</th>
                    <th>Matrícula</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $detalles->id_detalle_lectura }}</td>
                    <td>{{ $detalles->ciclo }}</td>
                    <td>{{ $detalles->ultima_fecha_lectura }}</td>
                    <td>{{ $detalles->lectura_anterior }}</td>
                    <td>{{ $detalles->lectura_actual }}</td>
                    <td>{{ $detalles->consumo }}</td>
                    <td>{{ $detalles->valor_total }}</td>
                    <td>{{ $detalles->matricula }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>

<footer>
    <h1>Acuarius</h1>
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/adminlte.min.js') }}"></script>

</footer>
</body>
</html>


