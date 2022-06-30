<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inputnumber extends Component
{
    public $name, $value, $min;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value, $min)
    {
        $this->name = $name;
        $this->value = $value;
        $this->min = $min;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputnumber');
    }
}
