<?php

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubscribersExport;

public function export() 
{
    return Excel::download(new SubscribersExport, 'suscriptores.xlsx');
}