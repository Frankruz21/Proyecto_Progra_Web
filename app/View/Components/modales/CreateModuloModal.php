<?php

namespace App\View\Components\modales;

use Illuminate\View\Component;

class CreateModuloModal extends Component
{
    public $cursoId;

    public function __construct($cursoId = null)
    {
        $this->cursoId = $cursoId;
    }

    public function render()
    {
        return view('components.modales.create-modulo-modal');
    }
}