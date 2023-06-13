<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'acuerdo',
        'detalle',
        'fecha_inicio',
        'fecha_final',
        'acuerdo',
        'detalle',
        'monto',
        'tasa_interes',
        'plazo_meses',
        'fecha_proximo_pago',
        'saldo',
    ];
 
    public function suscriptor()
    {
        return $this->belongsTo(Suscriptor::class, 'matricula');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'credito_id');
    }

   public function credito()
    {
        return $this->belongsTo(Credito::class);
    }
}
