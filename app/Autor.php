<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{

    public $table = "autores";

    /**
     * Arreglo para saber que campos se pueden llenar
     * 
     * @var array
     */

    protected $fillable = [
        'nombre',
        'apellidos',
        'biografia',
        'pais',
        'avatar'
    ];
}