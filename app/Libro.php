<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use SoftDeletes;

    /**
     * Arreglo para saber que campos se pueden llenar
     * 
     * @var array
     */
    protected $fillable = [
        'titulo',
        'isbn',
        'resumen',
        'portada',
        'user_id'
    ];

    public function autores()
    {
        return $this->belongToMany('App\Autor');
    }
    
    public function generos()
    {
        return $this->belongToMany('App\Genero');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
