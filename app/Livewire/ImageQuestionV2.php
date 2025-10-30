<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ImageQuestionV2 extends Component
{
    public string $question;
    public string $subtitle = '';
    public array $options = [];
    public string $model;
    public $value = '';
    public float $maxValue = 0;
    public $baseValue = 1;

    public function updatedValue($val)
    {
        $selectedOption = collect($this->options)->firstWhere('value', $val);

        $computedValue = 0;

        if ($selectedOption && isset($selectedOption['percentage'])) {
            $percentage = $selectedOption['percentage'];
            if ($percentage > 1) {
                $percentage /= 100;
            }
            $computedValue = (($this->baseValue * $percentage) / $this->baseValue) * $this->maxValue;
        }

        // Sync value to parent component
        $this->dispatch('optionSelected', field: $this->model, value: $val, computedValue: $computedValue);
    }

    // #[On('resetWallOptions')]
    // public function resetWallOptions()
    // {
    //     if (in_array($this->model, ['wallType', 'wallCondition'])) {
    //         $this->value = '';
    //     }
    // }

    // #[On('resetDoorOptions')]
    // public function resetDoorOptions()
    // {
    //     if (in_array($this->model, ['doorType', 'doorCondition'])) {
    //         $this->value = '';
    //     }
    // }

    // #[On('resetColumnOptions')]
    // public function resetColumnOptions()
    // {
    //     if (in_array($this->model, ['columnShape', 'columnMade'])) {
    //         $this->value = '';
    //     }
    // }

    #[On('resetBeamOptions')]
    public function resetBeamOptions()
    {
        if (in_array($this->model, ['beamShape', 'beamMade'])) {
            $this->value = '';
        }
    }

    // #[On('resetNoEavesOptions')]
    // public function resetNoEavesOptions()
    // {
    //     if (in_array($this->model, ['overhang', 'eaves'])) {
    //         $this->value = '';
    //     }
    // }

    public function render()
    {
        return view('livewire.image-question-v2');
    }
}
