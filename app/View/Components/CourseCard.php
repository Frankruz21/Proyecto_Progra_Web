<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CourseCard extends Component
{
    public $titulo;
    public $descripcion;
    public $categoria;
    public $colorFondo;
    public $cursoId; 

    public function __construct($titulo, $descripcion, $categoria, $colorFondo = '#143D60', $cursoId = null)
    {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->colorFondo = $colorFondo;
        $this->cursoId = $cursoId;
    }

    public function render()
    {
        return view('components.course-card');
    }

    
}