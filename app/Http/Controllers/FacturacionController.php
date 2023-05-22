<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;

use App\Models\Facturacion;
use App\Models\Factura;
use App\Models\DetalleFactura;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FacturacionExport;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;


class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
       $detallefactura = DetalleFactura::join('suscriptores', 'detalle_factura.matricula', '=', 'suscriptores.matricula')
        ->select('detalle_factura.*', 'suscriptores.nombres', 'suscriptores.apellidos')
        ->with('subscriber')
        ->whereIn('detalle_factura.id_detalle_lectura', function ($query) {
            $query->select(DB::raw('MAX(id_detalle_lectura)'))
                ->from('detalle_factura')
                ->groupBy('matricula');
        })
        ->get();

    return view('facturacion.index', compact('detallefactura'));

    }

    public function create()
    {
        return view('facturacion.create');
    }

     public function store(Request $request)
{
    // Buscar si ya existe una factura con los mismos valores de numero, matricula e id_detalle_factura
    $factura_existente = Facturacion::where('numero', $request->numero)
                                    ->where('matricula', $request->matricula)
                                    ->where('id_detalle_factura', $request->id_detalle_factura)
                                    ->first();

    // Si ya existe, mostrar mensaje y redirigir al index
    if ($factura_existente) {
        return redirect()->route('facturacion.index')->with('success', 'La factura ya está guardada.');
    }

    // Si no existe, crear la nueva factura
    $monto_total = $request->monto_total;
    $estado = $monto_total == $request->monto_total ? 'pagado' : 'pendiente';
        $detalle = json_decode($request->detalle, true);

    $factura = new Facturacion([
        'numero' => $request->numero,
        'fecha_emision' => $request->fecha_emision,
        'fecha_vencimiento' => $request->fecha_vencimiento,
        'matricula' => $request->matricula,
        'id_detalle_factura' => $request->id_detalle_factura,
        'monto_total' => $monto_total,
        'estado' => $estado,
        'fecha_pago' => $request->fecha_pago,
        'forma_pago' => $request->forma_pago,
        'detalle' => $request->detalle
    ]);

    $factura->save();

    // Actualizar el estado del detalle de la factura a "pagada"
    $detalle_factura = DetalleFactura::where('id', $request->id_detalle_factura)->first();
    $detalle_factura->estado = 'facturado';
    $detalle_factura->save();

    return redirect()->route('facturacion.index')->with('success', 'La factura se ha creado correctamente.');
}

    public function show($id)
    {
        $factura = Facturacion::find($id);
        return view('facturacion.show', compact('factura'));
    }

    public function edit($id)
    {
        $factura = Facturacion::find($id);
        return view('facturacion.edit', compact('factura'));
    }

    public function update(Request $request, $id)
    {
        $factura = Facturacion::find($id);
        $factura->numero = $request->numero;
        $factura->fecha_emision = $request->fecha_emision;
        $factura->fecha_vencimiento = $request->fecha_vencimiento;
        $factura->matricula = $request->matricula;
        $factura->id_detalle_factura = $request->id_detalle_factura;
        $factura->monto_total = $request->monto_total;
        $factura->estado = $request->estado;
        $factura->forma_pago = $request->forma_pago;
        $factura->detalle = $request->detalle;
        $factura->save();

        return redirect()->route('facturacion.index')->with('success', 'La factura se ha actualizado correctamente.');
    }

    public function destroy($id)
    {
       $detalleFactura = DetalleFactura::findOrFail($id);
    $facturacion = Facturacion::where('id_detalle_factura', $detalleFactura->id)->first();
    
    if (!is_null($facturacion)) {
        $facturacion->delete();
    }

    $detalleFactura->delete();

    return redirect()->route('facturas.index')
                     ->with('success', 'Detalle de factura eliminado exitosamente.');

    }

        public function ticket($matricula)
{
   // Obtener el detalle de factura correspondiente al matricula
    //$detalles = Facturacion::find($matricula);
    $detalles = Facturacion::where('matricula', $matricula)->first();

    // Renderizar la vista show.blade.php como HTML
    $html = view('facturas.ticket', compact('detalles'))->render();

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

        public function pdf($matricula)
{
/*    $detalles = Facturacion::where('matricula', $matricula)->first();
    $html = view('facturacion.pdf', compact('detalles'))->render();
    $pdf = new Dompdf();
    $pdf->loadHtml($html);
    $pdf->render();

    return view('facturacion.pdf', ['pdf' => $pdf->output()]); 
*/
     // Obtener el detalle de factura correspondiente a la matricula
    $detalles = Facturacion::where('matricula', $matricula)->first();

    // Verificar si se encontraron los detalles de facturación
    if ($detalles) {
        // Renderizar la vista pdf.blade.php como HTML
        $html = view('facturacion.pdf', compact('detalles'))->render();

        // Crear una instancia de Dompdf
        $pdf = new Dompdf();

        // Cargar el contenido HTML que quieres imprimir
        $pdf->loadHtml($html);

        // Renderizar el PDF
        $pdf->render();

        // Devolver una respuesta con el PDF descargable
    //    return $pdf->stream('facturacion.pdf');
//vista del pdf antes de imprimir
        return view('facturacion.pdf', compact('detalles'));

    } else {
        // Si no se encontraron los detalles de facturación, puedes redirigir a una página de error o mostrar un mensaje
        return redirect()->back()->with('error', 'No se encontraron los detalles de facturación.');
    }
}


}
