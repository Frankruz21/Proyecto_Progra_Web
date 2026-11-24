<?php

namespace App\View\Components\atomics;

use Illuminate\View\Component;

class KpiCard extends Component
{
    public $titulo;
    public $valor;
    public $colorFondo;
    public $textoInferior;

    public function __construct($titulo, $valor, $colorFondo = '#143D60', $textoInferior = null)
    {
        $this->titulo = $titulo;
        $this->valor = $valor;
        $this->colorFondo = $colorFondo;
        $this->textoInferior = $textoInferior;
    }

    public function render()
    {
        return view('components.atomics.kpi-card');
    }
}