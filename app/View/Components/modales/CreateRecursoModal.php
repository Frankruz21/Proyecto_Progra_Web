<?php

namespace App\View\Components\modales;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateRecursoModal extends Component
{
    public function __construct()
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.modales.create-recurso-modal');
    }
}