<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filled extends Component
{
    public string $primary;

    /**
     * Create a new component instance.
     */
    public function __construct(bool $primary = true)
    {
        $this->primary = $primary;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.filled');
    }
}
