<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GeneroForm extends Component
{
    /**
     *
     * @var \App\Genero
     */
    public $genero;

    /**
     * Form action
     *
     * @var string
     */
    public $route;

    /**
     * Form method
     *
     * @var string
     */
    public $method;

    /**
     * Button text
     *
     * @var string
     */
    public $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($genero, $route, $method, $action)
    {
        $this->genero = $genero;
        $this->route = $route;
        $this->method = $method;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.genero-form');
    }
}
