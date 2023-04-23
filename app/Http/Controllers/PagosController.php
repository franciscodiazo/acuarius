<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $creditos = Credito::orderBy('created_at', 'desc')->paginate(10);

        return view('pagos.index', compact('creditos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Credito $credito)
    {
        return view('pagos.create', compact('credito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {

     $request->validate([
        'id_credito' => 'required|exists:creditos,id',
        'fecha_pago' => 'required|date',
        'monto' => 'required|numeric|min:0',
    ]);

    $credito = Credito::find($request->id_credito);

    if ($credito->saldo <= 0) {
        return redirect()->route('creditos.index', $request->id_credito)->with('warning', 'El crédito ya está al día.');
    }

    $pago = Pago::create([
        'id_credito' => $request->id_credito,
        'fecha_pago' => $request->fecha_pago,
        'monto' => $request->monto,
    ]);

    $pago->save();

    $credito->saldo = $credito->saldo - $request->monto;
    //$credito->fecha_proximo_pago = date('Y-m-d', strtotime($credito->fecha_proximo_pago . ' +1 month'));
    $credito->fecha_proximo_pago = Carbon::createFromFormat('Y-m-d', $credito->fecha_proximo_pago)->addMonth()->toDateString();
    $credito->save();

    return redirect()->route('creditos.show', $request->id_credito)->with('success', 'Pago registrado correctamente.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        $credito = $pago->credito;
        return view('pagos.show', compact('pago', 'credito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
