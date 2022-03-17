<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageRound extends Component
{
    public $src;
    public $alt;
    public $class;
    public $size;
    public $height;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($src='', $alt='', $class='', $size=64)
    {
        $this->src = $src;
        $this->alt = $alt;
        $this->class = $class;
        $this->size = $size;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image-round');
    }
}
