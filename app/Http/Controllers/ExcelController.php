<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DatosExport; 
use App\Models\User;
use App\Models\Facturacion;


class ExcelController extends Controller
{
   

    public function export()
    {
        return Excel::download(new DatosExport(Facturacion::all()), 'datos.xlsx');
    }

    public function collection()
    {
        return Facturacion::all();
    }
    /*
      public function export()
    {
        $users = Facturacion::all();

        return Excel::download($this, 'users.xlsx');
    }

    public function descargar()
    {
        return Excel::download(new DatosExport, 'datos.xlsx'); // Reemplaza "DatosExport" por el nombre de tu exportador y "datos.xlsx" por el nombre que quieras darle al archivo
    }

    public function exportUsers()
    {
        $users = DB::table('users')->get();

        $fileName = 'users.xlsx';

        return Excel::download(function($excel) use ($users) {
            $excel->sheet('Sheet1', function($sheet) use ($users) {
                $sheet->fromArray($users);
            });
        }, $fileName);
    }*/
}
