<?php

namespace App\View\Components\main;

use Illuminate\View\Component;

class breadcrumbAdminlte extends Component
{
    public $current_route;
    public function __construct($currentRoute)
    {
        $this->current_route = $currentRoute;
    }

    public function render()
    {
        return view('components.main.breadcrumb-adminlte');
    }
}
