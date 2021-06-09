<?php

namespace App\View\Components\smallBoxsAdminlte;

use Illuminate\View\Component;

class Productos extends Component
{
    public $productos;
    public function __construct($numeroProductos)
    {
        $this->productos = $numeroProductos;
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
