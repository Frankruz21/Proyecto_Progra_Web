<?php

namespace App\View\Components\Atomics;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExpandButton extends Component
{
    public function __construct(
        public string $texto = 'Nuevo',
        public string $icono = 'bi-plus-lg',
        public string $color = '#0D3559',
        public string $hoverColor = '#134673',
        public string $maxWidth = '140px',
    ) {}

    public function render(): View
    {
        return view('components.atomics.expand-button');
    }
}