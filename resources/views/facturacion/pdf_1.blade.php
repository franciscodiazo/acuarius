<!DOCTYPE html>

 <html>
  <head>
   <title></title>

<style>
body {
  color: #000;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 12px;
}

header {
    color: black;
    background-color: #ffffff;
    height: 100px;
    width: 95%;
    
}

footer {
    color: #000;
    background-color: #ffffff;
    width: 100%;
    height: 200px;
    position: absolute;
    bottom: 0;
    left: 0;
}
#rcorners1 {
  border-radius: 10px;
  background: #73AD21;
  border: 1px solid #73AD21;
  padding: 20px; 
}

#rcorners2 {
  border-radius: 10px;
  border: 1px solid #73AD21;
  padding: 20px; 
}
#rcorners3 {
  border-radius: 10px;
  border: 1px solid #73AD21;
}
.container:before,
.container:after {
  content: "";
  display: table;
}
.container:after {
  clear: both;
}
.container {
  background: #ffffff;
  width: 100%;
  *zoom: 1;
}
.container,
section,
aside {
  border-radius: 10px;
}
section,
aside {
  
  margin: 0px;
  padding: 10px 0;
  text-align: center;
}
section {
  float: left;
  width: 66%;
}
aside {
  float: right;
  width: 33%;
}

.container {
    padding:12px;
}

.columna {
  width:33%;
  float:left;
}
  .vertical .redBar, .vertical .greenBar, .vertical .blueBar {
    width:16px;
  }
  .vertical.top td {
    vertical-align:top;
  }
  .vertical.bottom td {
    vertical-align:bottom;
  }
 
  .redBar, .greenBar, .blueBar {
    box-shadow: 2px 2px 5px #999;
    border-radius: 3px;
  }
  .redBar {
    background-color:gray;
  }
  .greenBar {
    background-color:gray;
  }
  .blueBar {
    background-color:gray;
  }

@media (max-width: 100%) {
  
  .columna {
    width:auto;
    float:none;
  } 
}

</style>

   </head>
<body>
   <header>
   <div class="columna" align="center">
   <img src="{{ asset('img/acuapaltres.png') }}" alt="Acuapaltres" width="100" height="auto">
   </div>
   <div class="columna" align="center">
    <fieldset>
      <table cellpadding="0" cellspacing="0" align="center" >
        <tr>
            <td>
            <div class="box"><div id="invoice"  align="center" >
              <font color="#0087C3" align="right">
                  SUSCRIPTOR:{{ $detalles->matricula }}<br>  
                  REF: {{ $detalles->id }}
                <p>Fecha de Emisión: {{ $detalles->fecha_emision }}</p>
              </font>   
            </div>
            </td>
        </tr>
      </table>
   </fieldset>
   </div>
   <div class="columna">
   <fieldset><h3>Detalles de Facturación</h3>
   # Cuota Familiar: {{ $detalles->numero }}<br>
   <p>Pago Oportuno: {{ $detalles->fecha_vencimiento }}</p>
   <p># Cuota: {{ $detalles->id_detalle_factura }}</p>
     </fieldset>
   <br>
      <div  align="center" style="border: solid #A52A2A 3px; border-radius: 50%;"><div><b>TOTAL A PAGAR</b><br>${{ number_format($detalles->monto_total, 2, ',', '.') }} </div>

      </div>
  </div>
</header>
<br>
<main>
  <br>
  <br>
   <div id="rcorners3" align="center">
    <table width="100%">
      <tr>
        <td><b>NOMBRE:</b></td>
        <td> </td>
        <td></td>
        <td><b>CICLO:</b></td>
        <td></td>
        <td></td>
        <td><b>TARIFA:</b></td>
        <td>$14.000 50M3</td>
      </tr>
      <tr>
        <td><b>DIRECCIÓN:</b></td>
        <td></td>
        <td> </td>
        <td><b>MEDIDOR:</b></td>
        <td></td>
        <td> </td>
        <td><b>CLASE SERVICIO:</b></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><b>SECTOR:</b></td>
        <td></td>
        <td> </td>
        <td><b>ESTRATO:</b></td>
        <td></td>
        <td> </td>
        <td><b></b></td>
        <td></td>
        <td></td>
      </tr>
      
    </table>
   </div>
<br>
   <div id="rcorners3" align="center">
    <table width="100%">
      <thead>
        <tr bgcolor="#c3c3c3">
        <th>Detalles del Consumo</th>
        <th>Consumo M3</th>
        <th>Cost. Ref.</th>
        <th>Tarifa Aplicada</th>
        <th>Costor real mes</th>
        <th>Subsidio</th>
        <th>Neto a Pagar</th>
      </tr>
      </thead>
      <tbody>
    <tr>
        <td><b>Cargo Fijo:</b></td>
        <td>M3</td>
        <td align="right">$0</td>
        <td align="right">$0</td>
        <td align="right">$0</td>
        <td align="right">$0</td>
        <td align="right">$0</td>
      </tr>
      <tr>
        <td><b>Consumo Basico:</b></td>
        <td>50m3</td>
        <td align="right">$14000</td>
        <td align="right">$14000</td>
        <td align="right">$14000</td>
        <td align="right">$0</td>
        <td align="right">$14000</td>
      </tr>
      <tr>
        <td><b>Consumo Total:</b></td>
        <td> m3</td>
        <td align="right">$14000</td>
        <td align="right">$14000</td>
        <td align="right">$14000</td>
        <td align="right">$0</td>
        <td align="right">$14000</td>
      </tr>
      <tr>
        <td><b>Multas|Otros:</b></td>
        <td>50m3</td>
        <td align="right">$14000</td>
        <td align="right">$14000</td>
        <td align="right">$14000</td>
        <td align="right">$0</td>
        <td align="right">$14000</td>
      </tr>
      </tbody>
    <tfoot align="center">
      <tr>
        <td><b>TOTAL:</b></td>
        <td></td>
        <td> </td>
        <td></td>
        <td></td>
        <td> </td>
        <td align="right"><b id="rcorners1">$</b></td>
      </tr>
    </tfoot>
    </table>
  <table width="100%" align="center">
    <tr align="center" bgcolor="#c3c3c3">
      <td><b>Periodo Facturado</b></td>
      <td><b>Lectura</b></td>
      <td><b>Fecha Fact</b></td>
     <td><b>Consumo</b></td>
      <td><b>Creditos|Otros</b></td>
    </tr>

    <tr align="center">
      <td></td>
      <td></td>
     <td></td>
      <td></td>
     <td align="right"><b  id="rcorners1">$</b></td>
    </tr>
    </table>
   </div>

<br>  
 <div align="center" style="border: solid #A52A2A 3px; border-radius: 50%;">TOTAL (CUOTA + OTROS)<br><b> ${{ number_format($detalles->monto_total, 2, ',', '.') }}</b><br><b>Mensaje: </b>¡Sí proteges el Agua Proteges la Vida! -<b> 
      </b>

 </div>
 
<div class="container">
  <section>
  <article id="rcorners3">
    <h3>CREDITOS OTORGADOS</h3>
   
   <table align="center" width="100%">
    <thead>
    <tr bgcolor="#c3c3c3">
      <th align="left">Descripción</th>
      <th>Valor Credito</th>
      <th>Cuota</th>
      <th>Pendiente</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <th align="left">*</th>
      <th></th>
      <th></th>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <th align="right">TOTAL</th>
      <th bgcolor="#c3c3c3" align="right">$</th>
      <th></th>
    </tr>
    </tfoot>
   </table>    
   <h3>ULTIMO PAGO REALIZADO</h3>
   <table>
    <thead>
    <tr>
      <th align="left">Fecha</th>
      <th></th>
      <th></th>
    <th align="left">Estado</th>
      <td>

    </td>
     
    </tr>
    </thead>
    <tbody>
    <tr>
      <th align="left">Valor</th>
      <th></th>
      <th></th>
    </tr>
    </tbody>
    </table>

  </article>
   <br>  
  <article>
<div id="rcorners3" align="center"><b>HISTORA DE CONSUMO</b>
<table border=0 cellspacing=5 cellpadding=0 class="vertical bottom" align="center">
  <tr>
    <td>
      <div class="redBar" style="height:$px"></div>
    </td>
    <td>
      <div class="redBar" style="height:$px"></div>
    </td>
    <td>$
      <div class="redBar" style="height:$px"></div>
    </td>
  <td width="20px">&nbsp;</td>
  <td>*Pago oportuno hasta:<br><br>*Recuerde siempre conservar los recibos y soportes de pago<br>
  </td>
  </tr>
</table>
</div>
  </article>
  </section>
  <aside>

  <article id="rcorners3">
    <div>
  <table align="center">
    <thead>
    <tr>
      <td colspan="2"><div style="background: #7DD3EC;" id="rcorners3" align="center"><b>RESUMEN DE FACTURACIÓN</b></div>
      </td>
    </tr>
    </thead>
    <tbody>
    <tr>
      <th align="left">Cargo Basico</th>
      <td align="right">$14000</td>
    </tr>
    <tr>
      <th align="left">Consumo total M3 </th>
      <td align="right"> M3</td>
    </tr>
    <tr>
      <th align="left">Valor Recargo x m3</th>
      <td align="right">
      
      </td></tr>
    <tr>
      <th align="left"></th>
      <td align="right"></td></tr>
    </tbody>
    <tfoot>
      <tr>
        <th align="left"><div style="background: #7DD3EC;" ><h3>PAGO TOTAL</h3> </div>
        </th>
        <td align="right"><h3><b>$</b></h3></td>
      </tr>
    </tfoot>
  </table>

  </article>
  <article><div style="background: #7DD3EC;" >
    <h3>CREDITOS | OTROS</h3></div>
  <table align="center">
    <tr><th align="left">Cartera</th><td align="right">$</td></tr>
    <tr><th align="left">Creditos</th><td align="right">$</td></tr>
    <tr><th align="left">Otros</th><td align="right">$</td></tr>
    <tfoot>
      <tr><th align="left"><div style="background: #7DD3EC;" >GRAL TOTAL</div>  </th><td align="right"></h3></td></tr>
    </tfoot>
  </table>
  </article>
  </aside>
<div align="center" style="border: solid #A52A2A 3px; border-radius: 50%;">
      
</div>

</div>
  </div>
 </main> 
<hr style="border: 0; height: 0px; border-top: 0px dashed black; border-bottom: 1px dashed black;" />
   <footer >
    <br>
    <div class="columna" align="left">
   <img src="{{ asset('img/acuapaltres.png') }}" alt="Acuapaltres" width="50" height="auto"> 
   </div>
   <div class="columna" >
    <fieldset>
    <b>Nombre: </b> <br>
    <b>Suscriptor: </b><br>
    <b>Sector: </b>
    </fieldset>
   </div>
   <div class="columna" align="center" >
    <FIELDSET>
      <b>Fecha Facturación: </b><br>
      $
    </FIELDSET><br><b>TOTAL CUOTA:</b> <br><div style="border: solid #A52A2A 3px; border-radius: 50%;">${{ number_format($detalles->monto_total, 2, ',', '.') }}</div>
 </div>
   </footer>

</html> 
