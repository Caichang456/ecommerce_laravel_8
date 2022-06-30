<?php

namespace App\View\Components\button;

use Illuminate\View\Component;

class savebutton extends Component
{
    public $type, $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name)
    {
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.savebutton');
    }
}
