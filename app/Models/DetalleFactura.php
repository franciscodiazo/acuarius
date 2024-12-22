<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id','lectura_id','descripcion', 'cantidad', 'precio_unitario',
        'subtotal', 'impuesto', 'total'
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }
}
