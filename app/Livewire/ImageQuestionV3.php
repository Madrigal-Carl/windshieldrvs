<?php

namespace App\Livewire;

use Livewire\Component;

class ImageQuestionV3 extends Component
{
    public string $question;
    public string $subtitle = '';
    public array $options = [];
    public string $model;
    public float $maxValue = 0;
    public array $counts = [];

    public function mount($counts = [])
    {
        if (!empty($counts)) {
            $this->counts = $counts;
        } else {
            foreach ($this->options as $option) {
                $this->counts[$option['value']] = 0;
            }
        }
    }

    public function updatedCounts()
    {
        $this->computeScore();
    }

    protected function computeScore()
    {
        $numericCounts = array_map(function ($value) {
            return is_numeric($value) ? (float) $value : 0;
        }, $this->counts);
        $sumCounts = array_sum($numericCounts);

        if ($sumCounts <= 0) {
            $sumCounts = 1;
        }

        $total = 0;
        foreach ($this->options as $option) {
            $count = $numericCounts[$option['value']] ?? 0;
            $percentage = isset($option['percentage']) ? ((float) $option['percentage'] / 100) : 0;
            $total += $count * $percentage;
        }

        $computedValue = ($total / $sumCounts) * $this->maxValue;
        $this->dispatch('optionSelected', field: $this->model, value: $this->counts, computedValue: $computedValue);

        $firstWord = strtolower(preg_replace('/([A-Z]).*/', '', $this->model)) ?: strtolower($this->model);
        $totalField = $firstWord . 'Total';
        $this->dispatch('optionTotal', field: $totalField, value: $sumCounts);
    }

    public function render()
    {
        return view('livewire.image-question-v3');
    }
}
