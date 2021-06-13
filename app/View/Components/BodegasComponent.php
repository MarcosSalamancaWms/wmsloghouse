<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BodegasComponent extends Component
{
    public $text;
    public $reference;
    public $bodegas;
    public function __construct($text, $reference, $bodegas)
    {
        $this->text = $text;
        $this->reference = $reference;
        $this->bodegas = $bodegas;
    }
    public function render()
    {
        return view('components.bodegas-component');
    }
}
