<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetalleLectura;
use App\Models\Lecturas;
use App\Models\Subscriber;
use Carbon\Carbon;



class DetalleLecturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ultimasLecturas = DB::table('lecturas')
            ->select('matricula', 'lectura_actual', 'fecha_lectura')
            ->whereIn('id', function ($query) {
        $query->select(DB::raw('MAX(id)'))
            ->from('lecturas')
            ->groupBy('matricula');
    })
    ->get();

    $lecturas = [];
    foreach ($ultimasLecturas as $ultimaLectura) {
        $lecturaAnterior = Lecturas::where('matricula', $ultimaLectura->matricula)
            ->where('fecha_lectura', '<', $ultimaLectura->fecha_lectura)
            ->orderBy('fecha_lectura', 'desc')
            ->first();

        $lectura = new \stdClass();
        $lectura->matricula = $ultimaLectura->matricula;
        $lectura->ultima_fecha_lectura = $ultimaLectura->fecha_lectura;
        $lectura->lectura_actual = $ultimaLectura->lectura_actual;
        $lectura->lectura_anterior = $lecturaAnterior ? $lecturaAnterior->lectura_actual : 0;
        $lectura->diferencia = $lectura->lectura_actual - $lectura->lectura_anterior;

        $lecturas[] = $lectura;
    }

    return view('detallelectura.index', compact('lecturas'));



     }

    public function obtenerLecturaAnterior($matricula, $fecha_actual)
    {
        $lectura_anterior = DB::table('registro_lecturas')
                            ->select('lectura_anterior')
                            ->where('matricula', '=', $matricula)
                            ->where('fecha_lectura', '<', $fecha_actual)
                            ->orderBy('fecha_lectura', 'DESC')
                            ->limit(1)
                            ->value('lectura_anterior');

        return $lectura_anterior;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
