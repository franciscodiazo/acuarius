<?php

namespace App\Http\Controllers;
use Carbon\Carbon;


use App\Models\Credito;
use Illuminate\Http\Request;

class CreditosController extends Controller
{
     public function index()
    {
        $creditos = Credito::all();

        return view('creditos.index', compact('creditos'));
 
    }

    public function create()
    {
        return view('creditos.create');
    }

    public function store(Request $request)
    {
        $credito = $request->validate([
            'matricula' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date',
            'monto' => 'required|integer',
            'tasa_interes' => 'required|numeric',
            'plazo_meses' => 'required|integer',
            'fecha_proximo_pago' => 'required|date',
            'saldo' => 'required|integer',
        ]);

        Credito::create($credito);

        return redirect()->route('creditos.index')->with('success', 'Crédito creado correctamente.');
    }

    public function edit($id)
    {
         $creditos = Credito::find($id);
        return view('creditos.edit', compact('creditos'));
    }


    public function update(Request $request, Credito $credito)
{
    // Validate the form input
    $validatedData = $request->validate([
        'matricula' => 'required|string|max:255',
        'fecha_inicio' => 'required|date',
        'fecha_final' => 'required|date|after:fecha_inicio',
        'monto' => 'required|numeric|min:0',
         'plazo_meses' => 'required|integer',
        'tasa_interes' => 'required|numeric|min:0',
    ]);

    // Convert the input date string to a DateTime instance
    $fecha_inicio = Carbon::createFromFormat('Y-m-d', $validatedData['fecha_inicio']);

    // Update the Credito instance with the form data
    $credito->matricula = $validatedData['matricula'];
    $credito->fecha_inicio = $fecha_inicio;
    $credito->fecha_final = $validatedData['fecha_final'];
    $credito->monto = $validatedData['monto'];
     $credito->plazo_meses = $validatedData['plazo_meses'];
    $credito->tasa_interes = $validatedData['tasa_interes'];

    // Save the updated Credito instance to the database
    $credito->save();

    // Redirect the user back to the Credito list page
    return redirect()->route('creditos.index')->with('success', 'Crédito actualizado correctamente.');
}

public function show($id)
{
    $credito = Credito::find($id);

    return view('creditos.show', compact('credito'));
}


    public function destroy(Credito $credito)
    {
        $credito->delete();

        return redirect()->route('creditos.index')->with('success', 'Crédito eliminado correctamente.');
    }
}
