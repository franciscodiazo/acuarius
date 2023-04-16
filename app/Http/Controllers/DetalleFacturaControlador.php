<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\DetalleFactura;
use App\Models\Lecturas;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use PDF;

class DetalleFacturaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifas = DB::table('tarifas')->first();
        $tarifa_base = $tarifas->tarifa_base;
        $tarifa_recargo = $tarifas->tarifa_recargo;


        $ultimasLecturas = DB::table('lecturas')
            ->select('id','matricula', 'ciclo', 'lectura_actual', 'fecha_lectura')
            ->whereIn('id', function ($query) {
        $query->select(DB::raw('MAX(id)'))
            ->from('lecturas')
            ->groupBy('matricula');
    })
    ->get();

    $lecturas = [];
    foreach ($ultimasLecturas as $ultimaLectura) {
        $lecturaAnterior = Lecturas::where('matricula', $ultimaLectura->matricula)
            ->where('fecha_lectura', '<', $ultimaLectura->fecha_lectura)
            ->orderBy('fecha_lectura', 'desc')
            ->first();

        $lectura = new \stdClass();
        $lectura->id = $ultimaLectura->id;
        $lectura->matricula = $ultimaLectura->matricula;
        $lectura->ciclo = $ultimaLectura->ciclo;
        $lectura->ultima_fecha_lectura = $ultimaLectura->fecha_lectura;
        $lectura->lectura_actual = $ultimaLectura->lectura_actual;
        $lectura->lectura_anterior = $lecturaAnterior ? $lecturaAnterior->lectura_actual : 0;
        $lectura->diferencia = $lectura->lectura_actual - $lectura->lectura_anterior;

            $consumo = $lectura->diferencia;
            $costo = $tarifa_base;

     if ($consumo > 50) {
        $costo = ($consumo - 50) * $tarifa_recargo;
        $costo += $tarifa_base;
    } else {
        $costo = $tarifa_base;
    }
    $lectura->costo = $costo;


        $detallefactura[] = $lectura;
    }

    return view('detallefactura.index', compact('detallefactura'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarifas = DB::table('tarifas')->first();
        $tarifa_base = $tarifas->tarifa_base;
        $tarifa_recargo = $tarifas->tarifa_recargo;


        $ultimasLecturas = DB::table('lecturas')
            ->select('id','matricula', 'ciclo', 'lectura_actual', 'fecha_lectura')
            ->whereIn('id', function ($query) {
        $query->select(DB::raw('MAX(id)'))
            ->from('lecturas')
            ->groupBy('matricula');
    })
    ->get();

    $lecturas = [];
    foreach ($ultimasLecturas as $ultimaLectura) {
        $lecturaAnterior = Lecturas::where('matricula', $ultimaLectura->matricula)
            ->where('fecha_lectura', '<', $ultimaLectura->fecha_lectura)
            ->orderBy('fecha_lectura', 'desc')
            ->first();

        $lectura = new \stdClass();
        $lectura->id = $ultimaLectura->id;
        $lectura->matricula = $ultimaLectura->matricula;
        $lectura->ciclo = $ultimaLectura->ciclo;
        $lectura->ultima_fecha_lectura = $ultimaLectura->fecha_lectura;
        $lectura->lectura_actual = $ultimaLectura->lectura_actual;
        $lectura->lectura_anterior = $lecturaAnterior ? $lecturaAnterior->lectura_actual : 0;
        $lectura->diferencia = $lectura->lectura_actual - $lectura->lectura_anterior;

            $consumo = $lectura->diferencia;
            $costo = $tarifa_base;

     if ($consumo > 50) {
        $costo = ($consumo - 50) * $tarifa_recargo;
        $costo += $tarifa_base;
    } else {
        $costo = $tarifa_base;
    }
    $lectura->costo = $costo;


// Validar si la lectura ya fue almacenada en la tabla detallefactura
    $lecturaExistente = DetalleFactura::where('matricula', $lectura->matricula)
        ->where('ciclo', $lectura->ciclo)
        ->first();

    if ($lecturaExistente) {
        echo "La lectura de la matrícula " . $lectura->matricula . " para el ciclo " . $lectura->ciclo . " ya ha sido almacenada en la tabla detallefactura.<br>";
        continue; // Pasar a la siguiente lectura
    }


        $detallefactura[] = $lectura;
    

            $detalleFactura = new DetalleFactura();
            $detalleFactura->id_detalle_lectura = $lectura->id;
            $detalleFactura->ciclo = $lectura->ciclo;
            $detalleFactura->ultima_fecha_lectura = $lectura->ultima_fecha_lectura;
            $detalleFactura->lectura_actual = $lectura->lectura_actual;
            $detalleFactura->lectura_anterior = $lectura->lectura_anterior;
            $detalleFactura->consumo = $lectura->diferencia;
            $detalleFactura->valor_total = $lectura->costo;
            $detalleFactura->matricula = $lectura->matricula;
            $detalleFactura->save();
        }

        return "Lecturas almacenadas en detallefactura";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detallefactura = DetalleFactura::find($id);
        return view('detallefactura.show', compact('detallefactura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
            $detallefactura = DetalleFactura::find($id);
    return view('detallefactura.edit', compact('detallefactura'));
    }
    
public function pdf($id)
{
    $detalles = DetalleFactura::find($id);
    $pdf = PDF::loadView('facturas.pdf', compact('detalles'));
    return $pdf->download('factura.pdf');
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function generate($id)
    {
        $detalles = DetalleFactura::find($id);
        $pdf = PDF::loadView('facturas.pdf', compact('detalles'));

        return $pdf->download('factura.pdf');
    }
}
