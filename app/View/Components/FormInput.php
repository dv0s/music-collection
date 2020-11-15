<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{

    public $type;
    public $name;
    public $value;
    public $id;
    public $label;
    public $helper;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type, string $name, string $id, string $label, string $value, string $helper)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value ?? null;
        $this->id = $id ?? null;
        $this->helper = $helper ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form-input');
    }
}
