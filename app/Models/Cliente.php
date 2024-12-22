<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula', 'cedula', 'apellidos', 'nombres', 'barrio', 'cel', 'direccion', 'email', 'fecha_nacimiento'
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Lectura
    public function lecturas()
    {
        return $this->hasMany(Lectura::class, 'matricula', 'matricula');
    }
    
    // Método para obtener todos los clientes
    public static function obtenerTodosLosClientes()
    {
        return self::all();
    }

    // Método para encontrar un cliente por ID
    public static function encontrarClientePorId($id)
    {
        return self::find($id);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
