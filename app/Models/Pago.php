<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_credito',
        'fecha_pago',
        'monto',
    ];

    public function credito()
    {
        return $this->belongsTo(Credito::class);
    }
}
