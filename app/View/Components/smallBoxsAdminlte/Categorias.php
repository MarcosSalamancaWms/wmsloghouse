<?php

namespace App\View\Components\smallBoxsAdminlte;

use Illuminate\View\Component;

class Categorias extends Component
{
    public $numeroCategorias;
    public function __construct($numeroCategorias)
    {
        $this->numeroCategorias = $numeroCategorias;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.small-boxs-adminlte.categorias');
    }
}
