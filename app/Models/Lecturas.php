<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturas extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricula',
        'fecha_lectura',
        'ciclo',
        'ano_actual',
        'lectura_actual',
        'lectura_anterior',
    ];
}
