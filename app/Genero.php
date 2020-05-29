<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function libros()
    {
        return $this->belongToMany('App\Libro');
    }
}
