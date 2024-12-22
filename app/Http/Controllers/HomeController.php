<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Tarifa;

class HomeController extends Controller
{
    /**
     * Muestra la página de inicio.
     */
    public function index()
    {
        // Obtén los conteos necesarios
        $clientesCount = Cliente::count();
        $facturasCount = Factura::count();
        $tarifasCount = Tarifa::count();

        // Retorna la vista con los datos
        return view('welcome', compact('clientesCount', 'facturasCount', 'tarifasCount'));
    }
}
