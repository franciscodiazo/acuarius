<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'tarifa_base',
        'tarifa_recargo',
    ];
}
