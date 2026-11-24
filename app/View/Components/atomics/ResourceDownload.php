<?php

namespace App\View\Components\atomics;

use Illuminate\View\Component;

class ResourceDownload extends Component
{
    public $titulo;
    public $ruta;
    public $tipo;
    public $peso;

    public function __construct($titulo, $ruta, $tipo = 'pdf', $peso = null)
    {
        $this->titulo = $titulo;
        $this->ruta = $ruta;
        $this->tipo = $tipo;
        $this->peso = $peso;
    }

    public function render()
    {
        return view('components.atomics.resource-download');
    }
}