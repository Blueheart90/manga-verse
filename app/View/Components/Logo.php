<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logo extends Component
{
    public $width;
    public $height;
    public $color;
    /**
     * Create a new component instance.
     */
    public function __construct($width = 50, $height = 50, $color = 'currentColor')
    {
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.logo');
    }
}
