<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LibroForm extends Component
{
    /**
     * metodo por el que se envia el form
     * @var string
     */
    public $method; 

    /**
    * accion a realizar
    * @var string
    */
    public $action;

    /**
    * texto del boton
    * @var string
    */
    public $btnText;

    /**
    * libro
    * @var \App\Libro
    */
    public $libro;


    /**
     * @param String $method
     * @param String $action
     * @param String $btnText
     * @param \App\Libro $libro
     */
    
    public function __construct($method, $action, $btnText, $libro)
    {
    $this->method = $method; 
    $this->action = $action;
    $this->btnText = $btnText; 
    $this->libro = $libro;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.libro-form');
    }
}
