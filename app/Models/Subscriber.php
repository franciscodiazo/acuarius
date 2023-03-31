<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //use HasFactory;
    protected $table = 'suscriptores';

    protected $fillable = [
        'cedula',
        'apellidos',
        'nombres',
        'matricula',
        'fecha_nacimiento',
        'email',
        'telefono',
        'direccion_residencia',
        'vereda',
        'sector',
        'municipio',
        'pais',
        'coordenadas',
        'estado',
    ];
}
