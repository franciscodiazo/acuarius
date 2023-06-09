<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
  /*  $lecturas = Lecturas::select(DB::raw('MAX(id) as id_max'), 'matricula', DB::raw('MAX(ciclo) as ciclo_maximo'), 'ano_actual', 'lectura_actual', DB::raw('MAX(fecha_lectura) as ultima_fecha_lectura'))
                ->groupBy('matricula', 'ano_actual', 'lectura_actual')
                ->orderBy('matricula', 'desc')
                ->get();
    return view('lecturas.index', compact('lecturas'));
    */
     $lecturas = DB::table('lecturas')
        ->select('id', 'matricula', 'ciclo', 'ano_actual', 'lectura_actual', 'fecha_lectura')
        ->whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('lecturas')
                ->groupBy('matricula');
        })
        ->get();

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
        ]);

        $lectura = new Lecturas;
        $lectura->matricula = $request->matricula;
        $lectura->fecha_lectura = $request->fecha_lectura;
        $lectura->ciclo = $request->ciclo;
        $lectura->ano_actual = $request->ano_actual;
        $lectura->lectura_actual = $request->lectura_actual;
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
        ]);

        $lectura = Lecturas::find($id);
        $lectura->matricula = $request->matricula;
        $lectura->fecha_lectura = $request->fecha_lectura;
        $lectura->ciclo = $request->ciclo;
        $lectura->ano_actual = $request->ano_actual;
        $lectura->lectura_actual = $request->lectura_actual;
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