<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleLectura extends Model
{
    use HasFactory;
    protected $table = 'detalle_lectura';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_cliente',
        'fecha_lectura',
        'lectura_anterior',
        'lectura_actual',
        'consumo',
    ];

    public function Suscriber()
    {
        return $this->belongsTo('App\Models\Suscriber', 'matricula');
    }
}

