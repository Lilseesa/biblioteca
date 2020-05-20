<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    /**
     * Arreglo para saber que campos se pueden llenar
     * 
     * @var array
     */
    protected $fillable = [
        'Nombre',
        'Apellidos',
        'Biografía',
        'Pais',
        'avatar'
    ];
}