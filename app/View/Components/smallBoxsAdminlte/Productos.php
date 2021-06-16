<?php

namespace App\View\Components\smallBoxsAdminlte;

use Illuminate\View\Component;

class Productos extends Component
{
    public $numeroProductos;
    public function __construct($numeroProductos)
    {
        $this->numeroProductos = $numeroProductos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.small-boxs-adminlte.productos');
    }
}
