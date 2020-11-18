<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormCheckbox extends Component
{

    public $label;
    public $name;
    public $id;
    public $isChecked;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label, string $name, string $id, bool $isChecked, int $value)
    {
        $this->name = $name;
        $this->label = $label;
        $this->id = $id;
        $this->isChecked = $isChecked;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form-checkbox');
    }
}
