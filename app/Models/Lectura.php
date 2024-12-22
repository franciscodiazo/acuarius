<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'matricula',
        'lectura_anterior',
        'lectura_actual',
        'consumo',
        'fecha',
        'ciclo_facturado',
        'facturada',
    ];
    
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'matricula', 'matricula');
    }

    /**
     * Verifica si la lectura puede ser almacenada.
     *
     * @return bool
     */
    public function puedeAlmacenar()
    {
        // Aquí puedes agregar la lógica para verificar si la lectura puede ser almacenada
        // Por ejemplo, podrías verificar si todos los campos requeridos están presentes
        return !empty($this->matricula) && !empty($this->lectura_actual) && !empty($this->fecha) && !empty($this->ciclo_facturado);
    }

    public function tarifa()
    {
        return $this->belongsTo(Tarifa::class, 'ciclo_facturado', 'ano');
    }
}
