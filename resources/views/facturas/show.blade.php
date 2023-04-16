<!DOCTYPE html>
<html lang="en">
 <head>

   @include('layouts.head')
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
 </head>
 <body>
 
<div class="wrapper">

<section class="invoice">

<div class="row">
<div class="col-12">
<h2 class="page-header">
<i class="fas fa-globe"></i> Acueducto, Inc.
<small class="float-right">Date: 2/10/2014</small>
</h2>
</div>

</div>

<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
From
<address>
<strong>Admin, Inc.</strong><br>
795 Folsom Ave, Suite 600<br>
San Francisco, CA 94107<br>
Phone: (804) 123-5432<br>
Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2b42454d446b4a47464a584a4e4e4f585f5e4f424405484446">[email&#160;protected]</a>
</address>
</div>

<div class="col-sm-4 invoice-col">
To
<address>
<strong>{{ $detalles->matricula }} Nombres Apellidos</strong><br>
Dir<br>
Sector<br>
</address>
</div>

<div class="col-sm-4 invoice-col">
<b>Invoice #007612</b><br>
<br>
<b>Order ID:</b> 4F3S8J<br>
<b>Payment Due:</b> 2/22/2014<br>
<b>Account:</b> 968-34567
</div>

</div>


<div class="row">
<div class="col-12 table-responsive">
<table class="table table-striped">
<thead>
                <tr>
                    <th>ID detalle lectura</th>
                    <th>Ciclo</th>
                    <th>Última fecha lectura</th>
                    <th>Lectura anterior</th>
                    <th>Lectura actual</th>
                </tr>
               
</thead>
<tbody>
                <tr>
                    <td>{{ $detalles->id_detalle_lectura }}</td>
                    <td>{{ $detalles->ciclo }}</td>
                    <td>{{ $detalles->ultima_fecha_lectura }}</td>
                    <td>{{ $detalles->lectura_anterior }}</td>
                    <td>{{ $detalles->lectura_actual }}</td>
                    <td></td>
                </tr>

</tbody>
</table>
</div>

</div>

<div class="row">

<div class="col-6">
<p class="lead">Payment Methods:</p>
<img src="#" alt="Efectivo"> Efectivo
<img src="#" alt="Banco"> Banco
<img src="#" alt="Transferencia"> Transferencia
<img src="#" alt="Paypal">
<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
El acueducto rural es un proyecto de todos, cuidar el recurso más valioso es nuestro deber.
</p>
</div>

<div class="col-6">
<p class="lead">Amount Due 2/22/2014</p>
<div class="table-responsive">
<table class="table">
<tr>
<th>Tarifa Base:</th>
<td align="right">$18.000</td>
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
</table>
</div>
</div>

</div>

</section>

</div>
    @include('layouts.footer-scripts')
</body>
</html>
