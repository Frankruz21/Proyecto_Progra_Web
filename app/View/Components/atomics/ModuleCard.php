<?php

namespace App\View\Components\atomics;

use Illuminate\View\Component;

class ModuleCard extends Component
{
    public $titulo;
    public $imagen;
    public $esGrande; // Para diferenciar las de abajo

    public function __construct($titulo, $imagen = 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80', $esGrande = false)
    {
        $this->titulo = $titulo;
        $this->imagen = $imagen;
        $this->esGrande = $esGrande;
    }

    public function render()
    {
        return view('components.atomics.module-card');
    }
}