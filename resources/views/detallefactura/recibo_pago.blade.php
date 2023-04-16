<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        font-size: 14px;
    }
    tr.page-break {
        page-break-after: always;
    }
</style>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Detalle Lectura</th>
            <th>Matrícula</th>
            <th>Ciclo</th>
            <th>Última Fecha Lectura</th>
            <th>Lectura Anterior</th>
            <th>Lectura Actual</th>
            <th>Consumo</th>
            <th>Valor Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($detalles as $detalleFactura)
            <tr>
                <td>{{ $detalleFactura->id }}</td>
                <td>{{ $detalleFactura->id_detalle_lectura }}</td>
                <td>{{ $detalleFactura->matricula }}</td>
                <td>{{ $detalleFactura->ciclo }}</td>
                <td>{{ $detalleFactura->ultima_fecha_lectura }}</td>
                <td>{{ $detalleFactura->lectura_anterior }}</td>
                <td>{{ $detalleFactura->lectura_actual }}</td>
                <td>{{ $detalleFactura->consumo }}</td>
                <td>{{ $detalleFactura->valor_total }}</td>
                <td><a href="{{ route('facturas.show', $detalleFactura->id) }}" class="btn btn-sm btn-info">Ver Detalle</a></td>
            </tr>
            <tr class="page-break">
                <td colspan="10"></td>
            </tr>
        @endforeach
    </tbody>
</table>



