<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
     use HasFactory;
    protected $table = 'facturacion';
    protected $fillable = [
        'numero',
        'fecha_emision',
        'fecha_vencimiento',
        'matricula',
        'id_detalle_factura',
        'monto_total',
        'estado',
        'fecha_pago',
        'forma_pago',
        'detalle'
    ];

    public function detalle_factura()
    {
        return $this->belongsTo(DetalleFactura::class, 'id_detalle_factura');
    }
}
