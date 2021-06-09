<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    /* atributos */

    public $color;
    public $nameApp;

    /* -------- */
    public function __construct($color, $nameApp)
    {
        $this->color = $color;
        $this->nameApp = $nameApp;
    }

    public function render()
    {
        return view('components.navbar');
    }
}
