<?php

namespace App\View\Components\smallBoxsAdminlte;

use Illuminate\View\Component;

class Ventas extends Component
{
    public $venta;
    public function __construct($ventaTotal)
    {
        $this->venta = $ventaTotal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.small-boxs-adminlte.ventas');
    }
}
