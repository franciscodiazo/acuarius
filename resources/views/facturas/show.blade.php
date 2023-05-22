<!DOCTYPE html>
<html lang="en">
 <head>

      @include('layouts.head')
      <script>
  var fecha_actual = new Date(); // crea un objeto Date con la fecha y hora actuales
  var dia = fecha_actual.getDate(); // obtiene el día del mes (1-31)
  var mes = fecha_actual.getMonth() + 1; // obtiene el mes (0-11) y se le suma 1 para que sea 1-12
  var anio = fecha_actual.getFullYear(); // obtiene el año con cuatro dígitos
  
  // construye la fecha en formato DD/MM/AAAA y la muestra en el elemento HTML correspondiente
  document.getElementById("fecha_actual").innerHTML = dia + "/" + mes + "/" + anio;
</script>
      <style>
         @page {
            margin: 5mm 5mm;
            font-family: Arial;
            size: 50mm 80mm; /* Tamaño de la página */
         }
         body {
            margin: 0;
            font-size: 8px; /* Tamaño de letra */
         }
         .wrapper {
            width: 40mm;
            height: 80mm;
            overflow: hidden; /* Ajustar el contenido al tamaño de la página */
         }
         .invoice {
            padding: 2mm;
         }
         .row {
            margin: 0;
         }
         .col-6 {
            width: 50%;
            float: left;
         }
         .col-12 {
            width: 100%;
         }
         .text-muted {
            font-size: 6px;
         }

        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.producto,
        th.producto {
            width: 75px;
            max-width: 75px;
        }

        td.cantidad,
        th.cantidad {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.precio,
        th.precio {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }
      </style>
 </head>
 <body>
     <body>
        <div class="ticket" align="center">
            <p class="centrado">ACUAPALTRES<br>Cuota Familiar<br><span id="current-date"></span></p>
            <p></p>
            <table>
                <thead>
                    <tr>
                        <th colspan="3">DETALLES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CICLO</td>
                        <td>{{ $detalles->ciclo }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Fecha Lectura</td>
                        <td>{{ $detalles->ultima_fecha_lectura }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Lectura</td>
                        <td>{{ $detalles->lectura_anterior }}</td>
                        <td>{{ $detalles->lectura_actual }}</td>
                    </tr>
                    <tr>
                         <th style="width:50%" >Subtotal:</th>
                         <td align="right">${{ $detalles->valor_total }}</td>
                    </tr>
                    <tr>
                        <th>Consumo</th>
                        <td align="right">{{ $detalles->consumo }} M3</td>                    
                    </tr>
                    <tr>
                    <th>Total:</th>
                    <td align="right">${{ $detalles->valor_total }}</td>
                    </tr>

                </tbody>
            </table>
            <p class="centrado">¡GRACIAS POR APORTE!<br></p>
        </div>
    @include('layouts.footer-scripts')
</body>
</html>
