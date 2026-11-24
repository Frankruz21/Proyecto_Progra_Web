<?php

namespace App\View\Components\modales;

use Illuminate\View\Component;
use App\Models\Modulo;

class CreateLeccionModal extends Component
{
    public $moduloId;
    public $modulos;
    public $leccion;

    public function __construct($moduloId = null, $leccion = null)
    {
        $this->moduloId = $moduloId;
        $this->leccion = $leccion;
        // Si es edición y no nos pasan moduloId, lo sacamos de la lección
        if ($leccion && !$moduloId) {
            $this->moduloId = $leccion->modulo_id;
        }
        $this->modulos = Modulo::with('curso')->get();
    }

    public function render()
    {
        return view('components.modales.create-leccion-modal');
    }
}