<?php

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Usuario; // Reemplaza "Usuario" por el nombre de tu modelo

class DatosExport implements FromCollection
{
    public function collection()
    {
        return Usuario::all(); // Reemplaza "Usuario" por el nombre de tu modelo
    }
}
