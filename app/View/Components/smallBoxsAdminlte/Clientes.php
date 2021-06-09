<?php

namespace App\View\Components\smallBoxsAdminlte;

use Illuminate\View\Component;

class Clientes extends Component
{
    public $clientes;
    public function __construct($numeroClientes)
    {
        $this->clientes = $numeroClientes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.small-boxs-adminlte.clientes');
    }
}
