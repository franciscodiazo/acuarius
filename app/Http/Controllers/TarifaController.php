<?php

namespace App\Models;
namespace App\Http\Controllers;

use App\Models\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    // Mostrar todas las tarifas
    public function index()
    {
        $tarifas = Tarifa::orderBy('ano', 'desc')->paginate(10);
        return view('tarifas.index', compact('tarifas'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('tarifas.create');
    }

    // Guardar una nueva tarifa
    public function store(Request $request)
    {
        $request->validate([
            'ano' => 'required|integer',
            'tarifa_basica' => 'required|numeric',
            'precio_metro_adicional' => 'required|numeric',
        ]);

        Tarifa::create($request->all());

        return redirect()->route('tarifas.index')->with('success', 'Tarifa creada correctamente.');
    }

    // Mostrar el formulario de edición
    public function edit($id)
    {
        $tarifa = Tarifa::findOrFail($id);
        return view('tarifas.edit', compact('tarifa'));
    }

    // Actualizar una tarifa existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'ano' => 'required|integer',
            'tarifa_basica' => 'required|numeric',
            'precio_metro_adicional' => 'required|numeric',
        ]);

        $tarifa = Tarifa::findOrFail($id);
        $tarifa->update($request->all());

        return redirect()->route('tarifas.index')->with('success', 'Tarifa actualizada correctamente.');
    }

    // Eliminar una tarifa
    public function destroy($id)
    {
        $tarifa = Tarifa::findOrFail($id);
        $tarifa->delete();

        return redirect()->route('tarifas.index')->with('success', 'Tarifa eliminada correctamente.');
    }
}
