<?php

namespace App\View\Components\Users;

use Illuminate\View\Component;

class TableUsers extends Component
{
    public $user_data;
    public function __construct($userData)
    {
        $this->user_data = $userData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.users.table-users');
    }
}
