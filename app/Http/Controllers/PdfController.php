<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;


class PdfController extends Controller
{
    //


    public function descargarPDF()
    {
        // Obtener el contenido HTML del archivo
        $html = file_get_contents(public_path('/factura/'));

        // Crear una nueva instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el contenido HTML en PDF
        $dompdf->render();

        // Obtener el contenido PDF generado
        $output = $dompdf->output();

        // Descargar el archivo PDF generado
        return response()->download(public_path('archivo.pdf'));
    }
}
