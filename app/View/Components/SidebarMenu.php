<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarMenu extends Component
{
    public $name;
    public $icon;

    public function __construct($name, $icon)
    {
        $this->name = $name;
        $this->icon = $icon;
    }

    public function render(): View|Closure|string
    {
        return view('components.navigation.sidebar-menu');
    }
}
