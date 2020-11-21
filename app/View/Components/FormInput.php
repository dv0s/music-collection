<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{

    public string $type;
    public string $name;
    public string $id;
    public string $label;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type, string $name, string $id, string $label, $value)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
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
