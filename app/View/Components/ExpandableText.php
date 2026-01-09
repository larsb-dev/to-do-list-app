<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExpandableText extends Component
{
    public string $text;
    public int $limit;

    /**
     * Create a new component instance.
     */
    public function __construct(string $text, int $limit = 50)
    {
        $this->text = $text;
        $this->limit = $limit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.expandable-text');
    }
}
