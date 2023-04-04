<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lecturas;

class LecturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturas = Lecturas::all();
        return view('lecturas.index', compact('lecturas'));
    }
 public function create()
    {
        return view('lecturas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matricula' => 'required',
            'fecha_lectura' => 'required',
            'ciclo' => 'required',
            'ano_actual' => 'required',
            'lectura_actual' => 'required',
            'lectura_anterior' => 'required'
        ]);

        $lectura = new Lecturas;
        $lectura->matricula = $request->matricula;
        $lectura->fecha_lectura = $request->fecha_lectura;
        $lectura->ciclo = $request->ciclo;
        $lectura->ano_actual = $request->ano_actual;
        $lectura->lectura_actual = $request->lectura_actual;
        $lectura->lectura_anterior = $request->lectura_anterior;
        $lectura->save();

        return redirect()->route('lecturas.index')->with('success', 'Lectura creada correctamente');
    }

    public function show($id)
    {
        //
        $lectura = Lecturas::findOrFail($id);
      
        return view('lecturas.show', compact('lectura'));

    }


    public function edit($id)
    {
        $lectura = Lecturas::find($id);
        return view('lecturas.edit', compact('lectura'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'matricula' => 'required',
            'fecha_lectura' => 'required',
            'ciclo' => 'required',
            'ano_actual' => 'required',
            'lectura_actual' => 'required',
            'lectura_anterior' => 'required'
        ]);

        $lectura = Lecturas::find($id);
        $lectura->matricula = $request->matricula;
        $lectura->fecha_lectura = $request->fecha_lectura;
        $lectura->ciclo = $request->ciclo;
        $lectura->ano_actual = $request->ano_actual;
        $lectura->lectura_actual = $request->lectura_actual;
        $lectura->lectura_anterior = $request->lectura_anterior;
        $lectura->save();

        return redirect()->route('lecturas.index')->with('success', 'Lectura actualizada correctamente');
    }

    public function destroy($id)
    {
        $lectura = Lecturas::find($id);
        $lectura->delete();
        return redirect()->route('lecturas.index')->with('success', 'Lectura eliminada correctamente');
    }
}