<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\DetalleFactura;
use App\Models\Lectura;
use App\Models\Tarifa;
use Carbon\Carbon;

class FacturaController extends Controller
{
    public function createFromLectura(Request $request, $id)
    {
        $datos = $request->all();
    
        $request->validate([
            'matricula' => 'required|string',
            'lectura_anterior' => 'required|numeric',
            'lectura_actual' => 'required|numeric',
            'consumo' => 'required|numeric',
            'fecha' => 'required|date',
            'tarifa_base' => 'required|numeric',
            'valor_adicional' => 'required|numeric',
            'metros_adicionales' => 'required|numeric',
            'valor_a_pagar' => 'required|numeric',
            'ciclo_facturado' => 'required|integer',
        ]);
    
        // Verificar si ya existe una factura asociada a esta lectura
        $existingFactura = DetalleFactura::where('lectura_id', $id)->first();
        if ($existingFactura) {
            return redirect()->route('lecturas.index')->with('warning', 'Ya existe una factura asociada a esta lectura.');
        }
    
        // Obtener el cliente asociado a la matrícula
        $cliente = Cliente::where('matricula', $datos['matricula'])->firstOrFail();
    
        // Generar un número de factura único para el cliente
        $contadorFacturas = Factura::where('cliente_id', $cliente->id)->count() + 1;
        $numeroFacturaUnico = date('Y') . $cliente->id . $contadorFacturas;
    
        // Crear la factura
        $factura = new Factura();
        $factura->cliente_id = $cliente->id;
        $factura->numero_factura = $numeroFacturaUnico;
        $factura->fecha_emision = $datos['fecha'];
        $factura->fecha_vencimiento = Carbon::parse($datos['fecha'])->addDays(20);
        $factura->cufe = 'CUFE-EJEMPLO-123456';
        $factura->subtotal = $datos['valor_a_pagar'];
        $factura->impuestos = 0;
        $factura->total = $datos['valor_a_pagar'];
        $factura->estado = 'pendiente';
        $factura->save();
    
        // Actualizar el estado de la lectura a facturada
        $lectura = Lectura::findOrFail($id);
        $lectura->facturada = 1;
        $lectura->save();
    
        // Crear el detalle de la factura
        $detalle = new DetalleFactura();
        $detalle->factura_id = $factura->id;
        $detalle->lectura_id = $lectura->id; // Asignar el ID de la lectura
        $detalle->descripcion = "Fecha: {$datos['fecha']}, Ciclo: {$datos['ciclo_facturado']}, Consumo: {$datos['consumo']} m3";
        $detalle->cantidad = $datos['consumo'];
        $detalle->precio_unitario = $datos['tarifa_base'];
        $detalle->impuesto = 0;
        $detalle->subtotal = $datos['valor_a_pagar'];
        $detalle->total = $datos['valor_a_pagar'];
        $detalle->save();
    
        return redirect()->route('facturas.index')->with('success', 'Factura generada con éxito.');
    }
    

    public function index()
    {
        $facturas = Factura::paginate(10);

        return view('facturas.index', compact('facturas'));
    }

    public function show($id)
    {
        // Cargar la factura con los detalles y el cliente
        $factura = Factura::with('detalles', 'cliente')->findOrFail($id);
    
        // Verificar si el detalle tiene una lectura asociada
        $detalleFactura = $factura->detalles->first();
        $lectura = null;
        if ($detalleFactura && $detalleFactura->lectura_id) {
            $lectura = Lectura::find($detalleFactura->lectura_id);
        }
    
        // Obtener la tarifa actual (si solo hay una tarifa global)
        $tarifa = Tarifa::first();
    
        // Si no se encuentra la lectura, redirigir con mensaje de error
        if (!$lectura) {
            return redirect()->route('lecturas.index')->with('error', 'No se encontró una lectura asociada a esta factura.');
        }
    
        return view('facturas.show', compact('factura', 'detalleFactura', 'lectura', 'tarifa'));
    }
    

    public function pagar(Request $request)
    {
        $request->validate([
            'factura_id' => 'required|exists:facturas,id',
            'payment_method' => 'required|string|in:banco,efectivo,transferencia,otro',
            'other_method' => 'nullable|string|max:255',
            'payment_date' => 'required|date',
        ]);
    
        $factura = Factura::findOrFail($request->factura_id);
        $factura->estado = 'pagada';
        $factura->metodo_pago = $request->payment_method === 'otro' ? $request->other_method : $request->payment_method;
        $factura->fecha_pago = $request->payment_date;
        $factura->save();
    
        return redirect()->route('facturas.index')->with('success', 'Factura pagada exitosamente.');
    }
    
    public function historico($cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id);
    
        // Facturas pendientes
        $facturasPendientes = Factura::where('cliente_id', $cliente_id)
            ->where('estado', 'pendiente')
            ->get();
    
        // Última factura pagada
        $ultimaPagada = Factura::where('cliente_id', $cliente_id)
            ->where('estado', 'pagada')
            ->orderBy('fecha_pago', 'desc')
            ->first();
    
        return view('facturas.historico', compact('cliente', 'facturasPendientes', 'ultimaPagada'));
    }

    public function historicoFacturas($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);
    
        // Obtener facturas pendientes
        $facturasPendientes = Factura::where('cliente_id', $clienteId)
            ->where('estado', 'pendiente')
            ->orderBy('fecha_emision', 'desc')
            ->get();
    
        // Obtener facturas pagadas
        $facturasPagadas = Factura::where('cliente_id', $clienteId)
            ->where('estado', 'pagada')
            ->orderBy('fecha_pago', 'desc')
            ->get();
    
        // Obtener la última factura pagada
        $ultimaPagada = $facturasPagadas->first();
    
        // Pasar todas las variables a la vista
        return view('facturas.historico', compact('cliente', 'facturasPendientes', 'facturasPagadas', 'ultimaPagada'));
    }
    
    public function showFacturasCliente($clienteId)
    {
        // Obtener el cliente por ID
        $cliente = Cliente::findOrFail($clienteId);
    
        // Obtener facturas pendientes asociadas al cliente
        $facturasPendientes = Factura::where('cliente_id', $cliente->id)
            ->where('estado', 'pendiente')
            ->get();
    
        // Obtener la última factura pagada asociada al cliente
        $ultimaPagada = Factura::where('cliente_id', $cliente->id)
            ->where('estado', 'pagada')
            ->orderBy('fecha_pago', 'desc')
            ->first();
    
        // Retornar la vista con los datos
        return view('facturas.historico', compact('cliente', 'facturasPendientes', 'ultimaPagada'));
    }
    
                       

}
