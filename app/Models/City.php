<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = [
        'region', 'codigo_dane_depto','departamento','codigo_dane_mun','municipio'
    ];
}
