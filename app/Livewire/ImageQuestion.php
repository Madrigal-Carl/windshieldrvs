<?php

namespace App\Livewire;

use Livewire\Component;

class ImageQuestion extends Component
{
    public string $question;
    public string $subtitle = '';
    public array $options = [];
    public string $model;
    public $value;

    public function updatedValue($val)
    {
        // Sync value to parent component
        $this->dispatch('optionSelected', field: $this->model, value: $val);
    }

    public function render()
    {
        return view('livewire.image-question');
    }
}
