<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{

    use SoftDeletes;

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

    public function libros()
    {
        return $this->belongToMany('App\Libro');
    }
}