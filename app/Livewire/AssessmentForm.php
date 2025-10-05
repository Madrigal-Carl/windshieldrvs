<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\ValidationException;

class AssessmentForm extends Component
{
    public int $currentStep = 13;
    public int $totalSteps = 14;
    public $isAccepted;
    public $houseId, $address, $date, $assessorName;
    public $roofType, $roofMade, $roofAnchor, $roofWall, $roofCondition;
    public $roofWallConnection, $roofWallFastener;
    public $wallMade, $wallStructure, $wallCondition;
    public $foundation, $settlement;
    public $doorType, $doorCondition, $windowType, $windowCondition;
    public $columnShape, $columnMaterial, $columnCondition;
    public $houseShape, $houseRatio;
    public $roofOverhang, $eavesSoffits;
    public $houseHeight;
    public $houseLocation, $neighbor;
    public $latitude, $longitude;

    public function mount()
    {
        $this->date = now();
    }

    public function getFormattedDateProperty()
    {
        return Carbon::parse($this->date)->format('F d, Y');
    }

    protected function validateStep()
    {
        try {
            switch ($this->currentStep) {
                case 1:
                    $this->validate([
                        'isAccepted' => 'required',
                    ], [
                        'isAccepted.required' => 'Please check the agreement box before continuing.',
                    ]);
                    break;

                case 2:
                    $this->validate([
                        'houseId' => 'required',
                        'address' => 'required',
                        'assessorName' => 'required',
                    ], [
                        'houseId.required' => 'The House ID is required.',
                        'address.required' => 'The address or barangay is required.',
                    ]);
                    break;

                case 3:
                    $this->validate([
                        'roofType' => 'required',
                        'roofMade' => 'required',
                        'roofCondition' => 'required',
                    ], [
                        'roofType.required' => 'Please select the roof type.',
                        'roofMade.required' => 'Please select the roof material.',
                        'roofCondition.required' => 'Please specify the roof condition.',
                    ]);
                    break;

                case 4:
                    $this->validate([
                        'roofAnchor' => 'required',
                        'roofWall' => 'required',
                        'roofWallConnection' => 'required',
                    ], [
                        'roofAnchor.required' => 'Please select how the roof is anchored.',
                        'roofWall.required' => 'Please select the roof-wall type.',
                        'roofWallConnection.required' => 'Please select the roof-wall connection type.',
                    ]);
                    break;

                case 5:
                    $this->validate([
                        'wallMade' => 'required',
                        'wallStructure' => 'required',
                        'wallCondition' => 'required',
                    ], [
                        'wallMade.required' => 'Please specify the wall material.',
                        'wallStructure.required' => 'Please specify the wall structure.',
                        'wallCondition.required' => 'Please describe the wall condition.',
                    ]);
                    break;

                case 6:
                    $this->validate([
                        'foundation' => 'required',
                        'settlement' => 'required',
                    ], [
                        'foundation.required' => 'Please describe the type of foundation.',
                        'settlement.required' => 'Please specify if there are any settlements.',
                    ]);
                    break;

                case 7:
                    $this->validate([
                        'doorType' => 'required',
                        'doorCondition' => 'required',
                        'windowType' => 'required',
                        'windowCondition' => 'required',
                    ], [
                        'doorType.required' => 'Please select the type of door.',
                        'doorCondition.required' => 'Please describe the condition of the door.',
                        'windowType.required' => 'Please select the type of window.',
                        'windowCondition.required' => 'Please describe the condition of the window.',
                    ]);
                    break;

                case 8:
                    $this->validate([
                        'columnShape' => 'required',
                        'columnMaterial' => 'required',
                        'columnCondition' => 'required',
                    ], [
                        'columnShape.required' => 'Please select the column shape.',
                        'columnMaterial.required' => 'Please select the column material.',
                        'columnCondition.required' => 'Please specify the column condition.',
                    ]);
                    break;

                case 9:
                    $this->validate([
                        'houseShape' => 'required',
                        'houseRatio' => 'required',
                    ], [
                        'houseShape.required' => 'Please specify the overall house shape.',
                        'houseRatio.required' => 'Please provide the length-to-width ratio.',
                    ]);
                    break;

                case 10:
                    $this->validate([
                        'roofOverhang' => 'required',
                        'eavesSoffits' => 'required',
                    ], [
                        'roofOverhang.required' => 'Please specify the roof overhang length.',
                        'eavesSoffits.required' => 'Please describe the eaves or soffits condition.',
                    ]);
                    break;

                case 11:
                    $this->validate([
                        'houseHeight' => 'required',
                    ], [
                        'houseHeight.required' => 'Please specify the house height.',
                    ]);
                    break;

                case 12:
                    $this->validate([
                        'houseLocation' => 'required',
                        'neighbor' => 'required',
                    ], [
                        'houseLocation.required' => 'Please specify the house location.',
                        'neighbor.required' => 'Please describe nearby buildings or surroundings.',
                    ]);
                    break;

                case 13:
                    $this->validate([
                        'date' => 'required|date',
                        'latitude' => 'required|numeric',
                        'longitude' => 'required|numeric',
                    ], [
                        'latitude.required' => 'Please pin your location on the map.',
                        'longitude.required' => 'Please pin your location on the map.',
                    ]);

                    $boacBounds = [
                        'north' => 13.4450,
                        'south' => 13.3750,
                        'west'  => 121.8200,
                        'east'  => 121.9500,
                    ];

                    if (
                        $this->latitude < $boacBounds['south'] ||
                        $this->latitude > $boacBounds['north'] ||
                        $this->longitude < $boacBounds['west'] ||
                        $this->longitude > $boacBounds['east']
                    ) {
                        notyf()
                            ->position('x', 'right')
                            ->position('y', 'top')
                            ->error('Please select a location within Boac, Marinduque.');
                        return false;
                    }

                    break;
            }
        } catch (ValidationException $e) {
            $message = $e->validator->errors()->first();
            notyf()->position('x', 'right')->position('y', 'top')->error($message);
            return false;
        }

        return true;
    }

    public function nextStep()
    {
        if ($this->validateStep() && $this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            $this->dispatch('scroll-to-top');
        }
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            $this->dispatch('scroll-to-top');
        }
    }

    #[On('optionSelected')]
    public function handleOptionSelected($field, $value)
    {
        $this->$field = $value;
    }

    public function render()
    {
        return view('livewire.assessment-form');
    }
}
