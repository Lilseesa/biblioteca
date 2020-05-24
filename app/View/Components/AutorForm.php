<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AutorForm extends Component
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
    * @var \App\Autor
    */
    public $autor;


    /**
     * @param String $method
     * @param String $action
     * @param String $btnText
     * @param \App\Autor $autor
     */
    
    public function __construct($method, $action, $btnText, $autor)
    {
    $this->method = $method; 
    $this->action = $action;
    $this->btnText = $btnText; 
    $this->autor = $autor;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.autor-form');
    }
}
