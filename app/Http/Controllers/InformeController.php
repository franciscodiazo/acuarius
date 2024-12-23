<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use Carbon\Carbon;

class InformeController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $today = Carbon::today();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Total recaudado en el año
        $totalAnual = Factura::where('estado', 'pagada')
            ->whereYear('fecha_pago', $currentYear)
            ->sum('total');

        // Total recaudado en el mes
        $totalMensual = Factura::where('estado', 'pagada')
            ->whereYear('fecha_pago', $currentYear)
            ->whereMonth('fecha_pago', $currentMonth)
            ->sum('total');

        // Facturas pendientes por cobrar
        $totalPendientes = Factura::where('estado', 'pendiente')->count();

        // Recaudo diario
        $recaudoDiario = Factura::where('estado', 'pagada')
            ->whereDate('fecha_pago', $today)
            ->sum('total');

        // Recaudo según fecha o rango de fechas
        $recaudoPorFecha = null;
        if ($startDate && $endDate) {
            $recaudoPorFecha = Factura::where('estado', 'pagada')
                ->whereBetween('fecha_pago', [$startDate, $endDate])
                ->sum('total');
        }

        return view('informes.index', compact(
            'totalAnual',
            'totalMensual',
            'totalPendientes',
            'recaudoDiario',
            'recaudoPorFecha',
            'startDate',
            'endDate'
        ));
    }
}
