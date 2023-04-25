<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;


class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->get('search');
        
        $matriculas = Matricula::where('matricula', 'like', '%'.$search.'%')
                            ->paginate(10);
        return view('matriculas.index', compact('matriculas', 'search'));
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
            'poliza' => 'required',
            'observaciones' => 'required',
            'estado' => 'required',
        ]);

        $matricula = new Matricula;
        $matricula->matricula = $request->matricula;
        $matricula->medidor = $request->medidor;
        $matricula->poliza = $request->poliza;
        $matricula->observaciones = $request->observaciones;
        $matricula->estado = $request->estado;
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
            'poliza' => 'required',
            'observaciones' => 'required',
            'estado' => 'required',
        ]);

        $matricula = Matricula::find($id);
        $matricula->matricula = $request->matricula;
        $matricula->medidor = $request->medidor;
        $matricula->poliza = $request->poliza;
        $matricula->observaciones = $request->observaciones;
        $matricula->estado = $request->estado;
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
