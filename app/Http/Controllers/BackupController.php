<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function index()
    {
        return view('backup.index');
    }

    public function create(Request $request)
    {
        // Generar el backup
        Artisan::call('backup:run');

        return redirect()->back()->with('message', 'Copia de seguridad creada con éxito.');
    }

    public function download()
    {
        // Descargar el archivo de backup
        $file = storage_path('app/backup/db-dumps/' . date('Y-m-d') . '.sql');

        if (file_exists($file)) {
            return response()->download($file);
        }

        return redirect()->back()->with('error', 'No se encontró el archivo de copia de seguridad.');
    }
}
