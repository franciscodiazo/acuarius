<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\Suscriber;

class SuscriptorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suscriptores = Subscriber::all();
        return view('suscriptores.index', compact('suscriptores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('suscriptores.create');
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
        $request->validate([
            'cedula' => 'required|unique:suscriptores|max:20',
            'apellidos' => 'required|max:100',
            'nombres' => 'required|max:100',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|max:100',
            'telefono' => 'required|max:20',
            'direccion_residencia' => 'required|max:100',
            'vereda' => 'required|max:100',
            'sector' => 'required|max:100',
            'municipio' => 'required|max:100',
            'pais' => 'required|max:100',
            'coordenadas' => 'required|max:100',
            'estado' => 'required|max:100',
        ]);
         Subscriber::create($request->all());

        return redirect()->route('suscriptores.index')->with('success', 'Suscriptor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('suscriptores.show', compact('suscriptor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suscriptor = Subscriber::find($id);
        return view('suscriptores.edit',compact('suscriptor','id'));
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
        $suscriptor = Subscriber::find($id);
        $this->validate(request(), [
            'cedula' => 'required|max:20|unique:suscriptores,cedula,' . $suscriptor->id,
            'apellidos' => 'required|max:100',
            'nombres' => 'required|max:100',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|max:100',
            'telefono' => 'required|max:20',
            'direccion_residencia' => 'required|max:100',
            'vereda' => 'required|max:100',
            'sector' => 'required|max:100',
            'municipio' => 'required|max:100',
            'pais' => 'required|max:100',
            'coordenadas' => 'required|max:100',
            'estado' => 'required|max:100',
          ]);

        $suscriptor->update($request->all());

        return redirect()->route('suscriptores.index')->with('success', 'Suscriptor actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function destroy($id)
   {

        $suscriptor = Subscriber::find($id);
        $suscriptor->delete();
 
       return redirect()->route('suscriptores.index')->with('success', 'Suscriptor eliminado exitosamente.');

   }
}
