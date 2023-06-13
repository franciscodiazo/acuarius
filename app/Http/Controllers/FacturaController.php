<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\DetalleFactura;
use App\Models\Factura;
use Dompdf\Dompdf;
//use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
Use PDF;



class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    $detalles = DetalleFactura::join('suscriptores', 'detalle_factura.matricula', '=', 'suscriptores.matricula')
        ->select('detalle_factura.*', 'suscriptores.nombres', 'suscriptores.apellidos')
        ->with('subscriber')
        ->whereIn('detalle_factura.id_detalle_lectura', function ($query) {
            $query->select(DB::raw('MAX(id_detalle_lectura)'))
                ->from('detalle_factura')
                ->groupBy('matricula');
        })
        ->get();

    return view('facturas.index', compact('detalles'));

    }

    /*public function index()
    {
        //
            $detalles = DetalleFactura::all();
            return view('facturas.index', compact('detalles'));

    }
*/
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalles = DetalleFactura::find($id);
        return view('facturas.show', compact('detalles'));
    }

    public function generarReciboPago($id)
    {
        // Lógica para generar el recibo de pago
        return view('facturas.recibo_pago');
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
    
    public function imprimirPdf($id)
{
   // Obtener el detalle de factura correspondiente al ID
    $detalles = DetalleFactura::find($id);

    // Renderizar la vista show.blade.php como HTML
    $html = view('facturas.show', compact('detalles'))->render();

    // Crea una instancia de Dompdf
    $pdf = new Dompdf();

    // Establece los parámetros de página para la impresora térmica
//    $pdf->setPaper('40mm', '80mm'); // ancho: 40mm, alto: 80mm

    // Carga el contenido HTML que quieres imprimir
    $pdf->loadHtml($html);

    // Renderiza el PDF
    $pdf->render();

    // Devuelve una vista que muestre el PDF
    return view('facturas.imprimir', ['pdf' => $pdf->output()]); 
}

}
