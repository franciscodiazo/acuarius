<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>detalles</title>
    <style>
        /* Estilos del PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            text-align: left;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>detalles</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $detalles->id }}</td>
                <td>{{ $detalles->matricula }}</td>
                <td>{{ $detalles->matricula }}</td>
                <td>{{ $detalles->matricula }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
