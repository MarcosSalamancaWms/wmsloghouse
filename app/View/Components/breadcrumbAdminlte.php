<?php

namespace App\View\Components;

use Illuminate\View\Component;

class breadcrumbAdminlte extends Component
{
    public $current_route;
    public function __construct($currentRoute)
    {
        $this->current_route = $currentRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.breadcrumb-adminlte');
    }
}
