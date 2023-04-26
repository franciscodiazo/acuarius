<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use App\Models\Factura;
use App\Models\DetalleFactura;
use Illuminate\Http\Request;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
        $detallefactura = DetalleFactura::all();
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
}
