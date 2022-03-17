<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameTile extends Component
{

    public $id;
    public $title;
    public $tag;
    public $image;
    public $price;
    /**
     * Create a new component instance.
     * @param $id
     * @param $title
     * @param $tag
     * @param $image
     * @param $price
     * @return void
     */
    public function __construct($id, $title, $tag, $image, $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->tag = $tag;
        $this->image = $image;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game-tile');
    }
}
