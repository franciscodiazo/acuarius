<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watermeter extends Model
{
    //use HasFactory;
    return $this->hasMany(Matricula::class, 'medidor', 'medidor');

}
