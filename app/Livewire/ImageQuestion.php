<?php

namespace App\Livewire;

use Livewire\Component;

class ImageQuestion extends Component
{
    public string $question;
    public string $subtitle = '';
    public array $options = [];
    public string $model;
    public $value = '';
    public float $maxValue = 0;

    public function updatedValue($val)
    {
        $selectedOption = collect($this->options)->firstWhere('value', $val);

        $computedValue = 0;
        if ($selectedOption && isset($selectedOption['percentage'])) {
            $computedValue = ($selectedOption['percentage'] / 100) * $this->maxValue;
        }

        // Sync value to parent component
        $this->dispatch('optionSelected', field: $this->model, value: $val, computedValue: $computedValue);
    }

    public function render()
    {
        return view('livewire.image-question');
    }
}
