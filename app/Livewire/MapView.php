<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Assessment;

class MapView extends Component
{
    public $pins = [];

    public function mount()
    {
        $this->pins = Assessment::select('latitude', 'longitude', 'severity')->get();
    }

    public function render()
    {
        return view('livewire.map-view');
    }
}
