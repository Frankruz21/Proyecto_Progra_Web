<?php

namespace App\View\Components\atomics;

use Illuminate\View\Component;

class LessonCard extends Component
{
    public $titulo;
    public $progreso;
    public $imagen;

    public function __construct($titulo, $progreso = 'In Progress', $imagen = 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80')
    {
        $this->titulo = $titulo;
        $this->progreso = $progreso;
        $this->imagen = $imagen;
    }

    public function render()
    {
        return view('components.atomics.lesson-card');
    }
}