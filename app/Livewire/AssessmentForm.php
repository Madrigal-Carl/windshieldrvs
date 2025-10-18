<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\ValidationException;

class AssessmentForm extends Component
{
    public array $selectedOptions = [];
    public int $currentStep = 14;
    public int $totalSteps = 14;
    public $isAccepted = '';
    public $houseId, $address, $date, $assessorName;
    public $roofType, $roofMade, $roofAnchor, $roofCondition;
    public $truss, $trussMaterial, $trussCondition;
    public $roofWallConnection, $roofWallQuality;
    public $walls, $wallType, $wallCondition;
    public $signsTilt;
    public $doors, $doorType, $doorCondition, $windowTotal, $windowType, $doorwindowFrame, $doorwindowTotal;
    public $columns, $columnShape, $columnMade, $beams, $beamShape, $beamMade, $columnbeamCondition, $columnbeamTotal;
    public $houseShape, $houseHeight, $houseRatio;
    public $overhang, $eaves;
    public $houseNumber, $houseLocation;
    public $latitude, $longitude;
    public $riskLevel, $riskScore;

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
                        'isAccepted' => 'accepted',
                    ], [
                        'isAccepted.accepted' => 'Please check the agreement box before continuing.',
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
                        'roofAnchor' => 'required',
                        'roofCondition' => 'required',
                    ], [
                        'roofType.required' => 'Please specify the roof type.',
                        'roofMade.required' => 'Please specify the roof material.',
                        'roofAnchor.required' => 'Please specify the roof anchor.',
                        'roofCondition.required' => 'Please specify the roof condition.',
                    ]);
                    break;

                case 4:
                    $rules = [
                        'truss' => 'required',
                    ];

                    if ($this->truss === 'present' && $this->roofMade !== 'concrete-slab') {
                        $rules['trussMaterial'] = 'required';
                        $rules['trussCondition'] = 'required';
                    }

                    $messages = [
                        'truss.required' => 'Please specify if there is a truss or not.',
                        'trussMaterial.required' => 'Please specify the truss material.',
                        'trussCondition.required' => 'Please specify the truss condition.',
                    ];

                    $this->validate($rules, $messages);
                    break;

                case 5:
                    $this->validate([
                        'roofWallConnection' => 'required',
                        'roofWallQuality' => 'required',
                    ], [
                        'wallMade.required' => 'Please specify the roof-to-wall connection.',
                        'wallStructure.required' => 'Please specify the roof-to-wall quality.',
                    ]);
                    break;

                case 6:
                    $this->validate([
                        'wall' => 'required',
                        'wallType' => 'required',
                        'wallCondition' => 'required',
                    ], [
                        'wall.required' => 'Please specify the type of foundation.',
                        'wallType.required' => 'Please specify the type of the wall.',
                        'wallCondition.required' => 'Please specify the condition of the wall.',
                    ]);
                    break;

                case 7:
                    $this->validate([
                        'signsTilt' => 'required',
                    ], [
                        'signsTilt.required' => 'Please specify the signs of tilt.',
                    ]);
                    break;

                case 8:
                    $this->validate([
                        'doors' => 'required',
                        'doorType' => 'required',
                        'doorCondition' => 'required',
                        'windowType' => 'required',
                        'doorwindowFrame' => 'required',
                    ], [
                        'doors.required' => 'Please enter the total doors.',
                        'doorType.required' => 'Please specify the door type.',
                        'doorCondition.required' => 'Please specify the door condition.',
                        'windowType.required' => 'Please specify the number of window type.',
                        'doorwindowFrame.required' => 'Please specify the number of window/door anchors.',
                    ]);
                    $doors = $this->doors;
                    $windowTotal = $this->windowTotal;
                    $doorwindowTotal = $this->doorwindowTotal;
                    if (($doors + $windowTotal) !== $doorwindowTotal) {
                        notyf()
                            ->position('x', 'right')
                            ->position('y', 'top')
                            ->error('The sum of Doors and Window Total should be equal to the number of Door and Window Frames.');
                        return false;
                    }

                    break;

                case 9:
                    $this->validate([
                        'columns' => 'required',
                        'columnShape' => 'required',
                        'columnMade' => 'required',
                        'beams' => 'required',
                        'beamShape' => 'required',
                        'beamMade' => 'required',
                        'columnbeamCondition' => 'required',
                    ], [
                        'columns.required' => 'Please enter the total columns.',
                        'columnShape.required' => 'Please specify the column type.',
                        'columnMade.required' => 'Please specify the column material.',
                        'beams.required' => 'Please enter the total beams.',
                        'beamShape.required' => 'Please specify the beam type.',
                        'beamMade.required' => 'Please specify the beam material.',
                        'columnbeamCondition.required' => 'Please specify the number of column/beam condition.',
                    ]);
                    $columns = $this->columns;
                    $beams = $this->beams;
                    $columnbeamTotal = $this->columnbeamTotal;
                    if (($columns + $beams) !== $columnbeamTotal) {
                        notyf()
                            ->position('x', 'right')
                            ->position('y', 'top')
                            ->error('The sum of Column and Beam Total should be equal to the number of Column and Beam Condition.');
                        return false;
                    }
                    break;

                case 10:
                    $this->validate([
                        'houseShape' => 'required',
                        'houseHeight' => 'required',
                        'houseRatio' => 'required',
                    ], [
                        'houseShape.required' => 'Please specify the house shape.',
                        'houseHeight.required' => 'Please describe the house height.',
                        'houseRatio.required' => 'Please describe the house ratio.',
                    ]);
                    break;

                case 11:
                    $this->validate([
                        'overhang' => 'required',
                        'eaves' => 'required',
                    ], [
                        'overhang.required' => 'Please specify the roof overhang length.',
                        'eaves.required' => 'Please describe the eaves or soffits condition.',
                    ]);
                    break;

                case 12:
                    $this->validate([
                        'houseNumber' => 'required',
                        'houseLocation' => 'required',
                    ], [
                        'houseNumber.required' => 'Please describe nearby buildings or surroundings.',
                        'houseLocation.required' => 'Please specify the house location.',
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
            if ($this->currentStep === 3 && $this->roofMade === 'concrete-slab') {
                $this->currentStep = 6;
                return $this->dispatch('scroll-to-top');
            }
            $this->currentStep++;
            $this->dispatch('scroll-to-top');
        }
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            if ($this->currentStep === 6 && $this->roofMade === 'concrete-slab') {
                $this->currentStep = 3;
                return $this->dispatch('scroll-to-top');
            }
            $this->currentStep--;
            $this->dispatch('scroll-to-top');
        }
    }

    public function updatedTruss()
    {
        if ($this->truss === 'not-present' && $this->roofMade !== 'concrete-slab') {
            $this->handleOptionSelected($this->truss, 'present', 10);
        }
    }

    public function updatedWalls()
    {
        unset(
            $this->selectedOptions['wallType'],
            $this->selectedOptions['wallCondition']
        );

        $this->wallType = null;
        $this->wallCondition = null;

        $this->dispatch('resetWallOptions');
    }

    public function updatedDoors()
    {
        unset(
            $this->selectedOptions['doorType'],
            $this->selectedOptions['doorCondition']
        );

        $this->doorType = null;
        $this->doorCondition = null;

        $this->dispatch('resetDoorOptions');
    }

    #[On('optionSelected')]
    public function handleOptionSelected($field, $value, $computedValue)
    {
        $this->selectedOptions[$field] = $computedValue;
        $this->$field = $value;

        if ($field === 'roofMade') {
            unset(
                $this->selectedOptions['truss'],
                $this->selectedOptions['trussMaterial'],
                $this->selectedOptions['trussCondition'],
                $this->selectedOptions['roofWallConnection'],
                $this->selectedOptions['roofWallQuality']
            );
            $this->truss = null;
            $this->trussMaterial = null;
            $this->trussCondition = null;
            $this->roofWallConnection = null;
            $this->roofWallQuality = null;
        }

        if ($field === 'truss') {
            unset(
                $this->selectedOptions['trussMaterial'],
                $this->selectedOptions['trussCondition'],
            );
            $this->trussMaterial = null;
            $this->trussCondition = null;
        }
    }

    #[On('optionTotal')]
    public function handleOptionTotal($field, $value)
    {
        $this->$field = $value;
    }

    public function evaluateAssessment()
    {
        $totalScore = array_sum($this->selectedOptions);
        $this->riskScore = $totalScore;

        if ($totalScore >= 81 && $totalScore <= 100) {
            $this->riskLevel = 'Very High';
        } elseif ($totalScore >= 61 && $totalScore <= 80) {
            $this->riskLevel = 'High';
        } elseif ($totalScore >= 41 && $totalScore <= 60) {
            $this->riskLevel = 'Medium';
        } elseif ($totalScore >= 21 && $totalScore <= 40) {
            $this->riskLevel = 'Low';
        } else {
            $this->riskLevel = 'Very Low';
        }
    }


    public function render()
    {
        return view('livewire.assessment-form');
    }
}
