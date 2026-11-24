<?php

namespace App\View\Components\atomics;

use Illuminate\View\Component;

class VideoPlayer extends Component
{
    public $titulo;
    public $descripcion;
    public $categoria;
    public $imagenFondo;
    public $urlVideo;

    public function __construct(
        $titulo, 
        $descripcion, 
        $categoria = 'Curso', 
        $imagenFondo = 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
        $urlVideo = null
    ) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->imagenFondo = $imagenFondo;
        $this->urlVideo = $urlVideo;
    }

    public function render()
    {
        return view('components.atomics.video-player');
    }
}