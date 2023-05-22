<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Usuario;

class DatoExport extends FromCollection
{
    use HasFactory;


}
