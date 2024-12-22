<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'numero_factura',
        'fecha_emision',
        'fecha_vencimiento',
        'cufe',
        'subtotal',
        'impuestos',
        'total',
        'estado',
        'metodo_pago',
        'fecha_pago',
    ];
    

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleFactura::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
        
}
