<?php

namespace App\Exports;

use App\Models\Facturacion;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class FacturacionExport implements FromCollection
{
    public function collection()
    {
        return Facturacion::all();
    }
}
