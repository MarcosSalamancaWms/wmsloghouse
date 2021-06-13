<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inputGroupForm extends Component
{
    public $referenceInput;
    public $text;
    public $placeholder;
    public $classIcon;
    public $type;
    public $value;
    public function __construct($referenceInput, $text, $placeholder, $classIcon, $type, $value)
    {

        $this->referenceInput = $referenceInput;
        $this->text = $text;
        $this->placeholder = $placeholder;
        $this->classIcon = $classIcon;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input-group-form');
    }
}
