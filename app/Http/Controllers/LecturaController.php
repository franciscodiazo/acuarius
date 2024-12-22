<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lectura;
use App\Models\Cliente;
use App\Models\Tarifa;

class LecturaController extends Controller
{
    public function create()
    {
        return view('lecturas.create');
    }

    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'matricula' => 'required|string',
            'ciclo_facturado' => 'required|integer',
            'lectura_actual' => 'required|numeric',
            'lectura_anterior' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $consumo = $datosValidados['lectura_actual'] - $datosValidados['lectura_anterior'];

        // Verificar si ya existe una lectura para el mismo ciclo y fecha
        $lecturaExistente = Lectura::where('matricula', $datosValidados['matricula'])
            ->where('fecha', $datosValidados['fecha'])
            ->where('ciclo_facturado', $datosValidados['ciclo_facturado'])
            ->first();

        if ($lecturaExistente) {
            return redirect()->back()->withErrors(['error' => 'Ya existe una lectura para esta fecha y ciclo.']);
        }

        $lectura = new Lectura();
        $lectura->matricula = $datosValidados['matricula'];
        $lectura->fecha = $datosValidados['fecha'];
        $lectura->ciclo_facturado = $datosValidados['ciclo_facturado'];
        $lectura->lectura_actual = $datosValidados['lectura_actual'];
        $lectura->lectura_anterior = $datosValidados['lectura_anterior'];
        $lectura->consumo = $consumo;
        $lectura->facturada = false;
        $lectura->save();

        return redirect()->route('lecturas.index')->with('success', 'Lectura creada con éxito.');
    }

    public function index()
    {
        $tarifas = Tarifa::all();

        // Si no existen tarifas, redirigir a crear tarifa
        if ($tarifas->isEmpty()) {
            return redirect()->route('tarifas.index')->with('warning', 'No hay tarifas configuradas. Por favor, crea una antes de continuar.');
        }

        // Filtrar lecturas no facturadas y paginarlas
        $lecturas = Lectura::where('facturada', 0)->paginate(10); // Solo las no facturadas
    
        // Obtener todas las tarifas y organizarlas por ciclo_facturado
        $tarifas = Tarifa::all()->keyBy('ciclo_facturado'); // Indexar tarifas por ciclo_facturado
    
        // Transformar las lecturas para calcular valores adicionales
        $lecturas->getCollection()->transform(function ($lectura) use ($tarifas) {
            $tarifa = $tarifas->get($lectura->ciclo_facturado); // Buscar tarifa correspondiente
    
            $lectura->tarifa_basica = $tarifa->tarifa_basica ?? 0;
            $lectura->precio_metro_adicional = $tarifa->precio_metro_adicional ?? 0;
            $lectura->metros_adicionales = max(0, $lectura->consumo - 50);
            $lectura->valor_a_pagar = $lectura->tarifa_basica + ($lectura->metros_adicionales * $lectura->precio_metro_adicional);
    
            return $lectura;
        });
    
        // Retornar vista con las lecturas y tarifas
        return view('lecturas.index', compact('lecturas', 'tarifas'));
    }
        

    public function obtenerUltimaLectura($matricula)
    {
        $ultimaLectura = Lectura::where('matricula', $matricula)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($ultimaLectura) {
            return response()->json([
                'lectura_anterior' => $ultimaLectura->lectura_actual,
                'ultimo_ciclo_facturado' => $ultimaLectura->ciclo_facturado,
                'facturada' => $ultimaLectura->facturada
            ]);
        } else {
            return response()->json([
                'lectura_anterior' => 0,
                'ultimo_ciclo_facturado' => null,
                'facturada' => false
            ]);
        }
    }

    public function edit($id)
    {
        $lectura = Lectura::findOrFail($id);
        return view('lecturas.edit', compact('lectura'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'matricula' => 'required|string|max:255',
            'lectura_actual' => 'required|numeric|min:0',
            'lectura_anterior' => 'required|numeric|min:0',
            'consumo' => 'required|numeric|min:0',
            'ciclo_facturado' => 'required|integer|min:1|max:12',
            'fecha' => 'required|date',
        ]);

        $lectura = Lectura::findOrFail($id);
        $lectura->lectura_actual = $request->input('lectura_actual');
        $lectura->lectura_anterior = $request->input('lectura_anterior');
        $lectura->consumo = $request->input('consumo');
        $lectura->ciclo_facturado = $request->input('ciclo_facturado');
        $lectura->fecha = $request->input('fecha');
        $lectura->save();

        return redirect()->route('lecturas.index')->with('success', 'Lectura actualizada con éxito.');
    }
}
