<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Error extends Component
{
    public $valor;
    public function __construct(string $valor)
    {
        $this->valor=$valor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.error');
    }
}
