<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;
    protected $table = 'detalle_factura';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_detalle_lectura',
        'ciclo',
        'ultima_fecha_lectura',
        'lectura_anterior',
        'lectura_actual',
        'consumo',
        'valor_total',
        'matricula',
    ];

   /* public function Suscriber()
    {
        return $this->belongsTo('App\Models\Suscriber', 'matricula');
    }*/
        public function subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'matricula');
    }

}
