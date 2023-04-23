<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'fecha_inicio',
        'fecha_final',
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
        return $this->hasMany(Pago::class, 'id_credito');
    }

   public function credito()
    {
        return $this->belongsTo(Credito::class);
    }
}
