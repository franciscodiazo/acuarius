<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas = Matricula::all();
        return view('matriculas.index', compact('matriculas'));
    }
 public function create()
    {
        return view('matriculas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matricula' => 'required',
            'medidor' => 'required',
            'ciclo' => 'required',
            'poliza' => 'required',
            'observaciones' => 'required',
        ]);

        $matricula = new matriculas;
        $matricula->matricula = $request->matricula;
        $matricula->fecha_matricula = $request->fecha_matricula;
        $matricula->ciclo = $request->ciclo;
        $matricula->ano_actual = $request->ano_actual;
        $matricula->matricula_actual = $request->matricula_actual;
        $matricula->matricula_anterior = $request->matricula_anterior;
        $matricula->save();

        return redirect()->route('matriculas.index')->with('success', 'matricula creada correctamente');
    }

    public function show($id)
    {
        //
        $matricula = Matricula::findOrFail($id);
      
        return view('matriculas.show', compact('matricula'));

    }


    public function edit($id)
    {
        $matricula = Matricula::find($id);
        return view('matriculas.edit', compact('matricula'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'matricula' => 'required',
            'medidor' => 'required',
            'ciclo' => 'required',
            'poliza' => 'required',
            'observaciones' => 'required',
        ]);

        $matricula = Matricula::find($id);
        $matricula->matricula = $request->matricula;
        $matricula->fecha_matricula = $request->fecha_matricula;
        $matricula->ciclo = $request->ciclo;
        $matricula->ano_actual = $request->ano_actual;
        $matricula->matricula_actual = $request->matricula_actual;
        $matricula->matricula_anterior = $request->matricula_anterior;
        $matricula->save();

        return redirect()->route('matriculas.index')->with('success', 'matricula actualizada correctamente');
    }

    public function destroy($id)
    {
        $matricula = Matricula::find($id);
        $matricula->delete();
        return redirect()->route('matriculas.index')->with('success', 'matricula eliminada correctamente');
    }
}
