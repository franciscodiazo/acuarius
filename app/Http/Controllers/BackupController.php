<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function index()
    {
      // Generar el backup
        return Excel::download(new InvoicesExport, 'invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
 
    }

    public function download()
    {
        // Nombre del archivo de respaldo
        $fileName = 'backup-' . date('Y-m-d_H-i-s') . '.sql';

        // Ejecuta el comando de shell para exportar la base de datos
        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_HOST'),
            env('DB_DATABASE'),
            storage_path('app/backups/' . $fileName)
        );

        exec($command);

        // Devuelve el archivo descargable
        return response()->download(storage_path('app/backups/' . $fileName), $fileName)->deleteFileAfterSend();
    }

    
    public function backup()
    {
        // Nombre del archivo de backup
        $filename = 'backup-' . date('YmdHis') . '.sql';

        // Ejecutar comando artisan para crear el backup
        Artisan::call('backup:run', ['--filename' => $filename]);

        // Descargar el archivo de backup
        $content = Storage::disk('local')->get($filename);
        $headers = [
            'Content-Type' => 'application/sql',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->download(storage_path('app/backups/' . $filename), $filename, $headers)->deleteFileAfterSend();
    }
}
