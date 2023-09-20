<?php

namespace App\View\Components;

use Closure;
use App\Models\Servidor;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class HomeLayout extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.home');
    }
}
