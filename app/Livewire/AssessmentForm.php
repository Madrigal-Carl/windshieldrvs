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
    public array $vulnerabilities = [];
    public array $recommendations = [];
    public bool $allClear = false;
    public string $remarksMessage = '';
    // New: group vulnerabilities and remarks by assessment step
    public array $vulnerabilitiesByStep = [];
    public array $remarksByStep = [];

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
                        'walls' => 'required',
                        'wallType' => 'required',
                        'wallCondition' => 'required',
                    ], [
                        'walls.required' => 'Please specify the type of foundation.',
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
                        'north' => 13.4900,
                        'south' => 13.3800,
                        'west'  => 121.7900,
                        'east'  => 121.9300,
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
            if ($this->currentStep === $this->totalSteps - 1) {
                $this->evaluateAssessment();
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

            // If concrete slab is selected, automatically set truss score to 0 (no vulnerability)
            if ($value === 'concrete-slab') {
                $this->selectedOptions['truss'] = 0;
                $this->truss = 'not-applicable';
            }
        }

        if ($field === 'truss') {
            unset(
                $this->selectedOptions['trussMaterial'],
                $this->selectedOptions['trussCondition'],
            );
            $this->trussMaterial = null;
            $this->trussCondition = null;

            // If not concrete slab and no truss, assign maximum vulnerability score
            if ($this->roofMade !== 'concrete-slab' && $value === 'not-present') {
                $this->selectedOptions['truss'] = 10; // Maximum vulnerability
                // Skip additional truss questions
                $this->selectedOptions['trussMaterial'] = 0;
                $this->selectedOptions['trussCondition'] = 0;
            }
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

        $this->prepareReport();
    }

    protected function prepareReport()
    {
        $vulns = [];
        $recs = [];
        $byStepVulns = [];
        $byStepRecs = [];

        // Helper to check if an option's score is 50% or more of its max value
        $isHighRisk = function ($field, $maxValue) {
            return isset($this->selectedOptions[$field]) &&
                ($this->selectedOptions[$field] / $maxValue) >= 0.5;
        };

        // Generic message templates
        $vulnTemplate = '%s shows potential vulnerability';
        $actionTemplate = 'Consider improvements to %s to enhance wind resistance';
        $goodTemplate = '%s appears to be in acceptable condition';

        // Step 3: Roof (max values: type=6, made=5, anchor=5, condition=4)
        if ($isHighRisk('roofType', 6)) {
            $byStepVulns[3] = sprintf($vulnTemplate, 'Roof type');
            $byStepRecs[3] = sprintf($actionTemplate, 'roof type');
        } elseif (isset($this->selectedOptions['roofType'])) {
            $byStepRecs[3] = sprintf($goodTemplate, 'Roof type');
        }

        if ($isHighRisk('roofMade', 5)) {
            $byStepVulns[3] = sprintf($vulnTemplate, 'Roof material');
            $byStepRecs[3] = sprintf($actionTemplate, 'roof material');
        } elseif (isset($this->selectedOptions['roofMade'])) {
            $byStepRecs[3] = sprintf($goodTemplate, 'Roof material');
        }

        // Step 4: Truss handling for different roof scenarios
        if ($this->roofMade === 'concrete-slab') {
            // Concrete slab roof - no truss needed, no vulnerability
            $byStepRecs[4] = 'Concrete slab roof does not require trusses';
        } elseif ($this->truss === 'not-present') {
            // Non-concrete roof without truss - maximum vulnerability
            $byStepVulns[4] = 'Critical: Missing roof trusses for non-concrete roof';
            $byStepRecs[4] = 'Add proper trusses or bracing to distribute loads - high priority';
            // Ensure maximum score is reflected
            $this->selectedOptions['truss'] = 10;
        } elseif ($this->truss === 'present') {
            // Normal truss evaluation for non-concrete roof with truss
            if ($isHighRisk('trussCondition', 6)) {
                $byStepVulns[4] = sprintf($vulnTemplate, 'Truss condition');
                $byStepRecs[4] = sprintf($actionTemplate, 'truss system');
            } elseif (isset($this->selectedOptions['trussCondition'])) {
                $byStepRecs[4] = sprintf($goodTemplate, 'Truss system');
            }
        }

        // Step 5: Roof-Wall Connection (max=4 each)
        if ($isHighRisk('roofWallConnection', 4) || $isHighRisk('roofWallQuality', 4)) {
            $byStepVulns[5] = sprintf($vulnTemplate, 'Roof-to-wall connections');
            $byStepRecs[5] = sprintf($actionTemplate, 'roof-to-wall connections');
        } elseif (isset($this->selectedOptions['roofWallConnection']) || isset($this->selectedOptions['roofWallQuality'])) {
            $byStepRecs[5] = sprintf($goodTemplate, 'Roof-to-wall connections');
        }

        // Step 6: Walls
        if ($isHighRisk('wallType', 3) || $isHighRisk('wallCondition', 3)) {
            $byStepVulns[6] = sprintf($vulnTemplate, 'Wall system');
            $byStepRecs[6] = sprintf($actionTemplate, 'wall construction');
        } elseif (isset($this->selectedOptions['wallType']) || isset($this->selectedOptions['wallCondition'])) {
            $byStepRecs[6] = sprintf($goodTemplate, 'Wall system');
        }

        // Step 7: Wall-Foundation
        if ($isHighRisk('signsTilt', 7)) {
            $byStepVulns[7] = sprintf($vulnTemplate, 'Wall-to-foundation connection');
            $byStepRecs[7] = sprintf($actionTemplate, 'wall-to-foundation connections');
        } elseif (isset($this->selectedOptions['signsTilt'])) {
            $byStepRecs[7] = sprintf($goodTemplate, 'Wall-to-foundation connection');
        }

        // Step 8: Openings
        if ($isHighRisk('doorCondition', 3) || $isHighRisk('windowType', 3) || $isHighRisk('doorwindowFrame', 2)) {
            $byStepVulns[8] = sprintf($vulnTemplate, 'Door and window system');
            $byStepRecs[8] = sprintf($actionTemplate, 'door and window installations');
        } elseif (isset($this->selectedOptions['doorCondition']) || isset($this->selectedOptions['windowType'])) {
            $byStepRecs[8] = sprintf($goodTemplate, 'Door and window system');
        }

        // Step 9: Columns/Beams
        if ($isHighRisk('columnShape', 2) || $isHighRisk('beamShape', 2)) {
            $byStepVulns[9] = sprintf($vulnTemplate, 'Column and beam configuration');
            $byStepRecs[9] = sprintf($actionTemplate, 'column and beam system');
        } elseif (isset($this->selectedOptions['columnShape']) || isset($this->selectedOptions['beamShape'])) {
            $byStepRecs[9] = sprintf($goodTemplate, 'Column and beam system');
        }

        // Step 10: House Shape
        if ($isHighRisk('houseShape', 3) || $isHighRisk('houseHeight', 3) || $isHighRisk('houseRatio', 2)) {
            $byStepVulns[10] = sprintf($vulnTemplate, 'Building geometry');
            $byStepRecs[10] = sprintf($actionTemplate, 'overall building shape and proportions');
        } elseif (isset($this->selectedOptions['houseShape'])) {
            $byStepRecs[10] = sprintf($goodTemplate, 'Building geometry');
        }

        // Step 11: Overhangs
        if ($isHighRisk('overhang', 3) || $isHighRisk('eaves', 2)) {
            $byStepVulns[11] = sprintf($vulnTemplate, 'Roof overhang and eaves');
            $byStepRecs[11] = sprintf($actionTemplate, 'roof overhangs and eaves');
        } elseif (isset($this->selectedOptions['overhang']) || isset($this->selectedOptions['eaves'])) {
            $byStepRecs[11] = sprintf($goodTemplate, 'Roof overhang and eaves');
        }

        // Step 12: Location/Environment
        if ($isHighRisk('houseNumber', 5) || $isHighRisk('houseLocation', 5)) {
            $byStepVulns[12] = sprintf($vulnTemplate, 'Environmental exposure');
            $byStepRecs[12] = sprintf($actionTemplate, 'environmental protection measures');
        } elseif (isset($this->selectedOptions['houseNumber']) || isset($this->selectedOptions['houseLocation'])) {
            $byStepRecs[12] = sprintf($goodTemplate, 'Environmental exposure');
        }

        // Overall assessment summary (step 14)
        if ($this->riskScore >= 50) {
            $byStepVulns[14] = 'Multiple aspects may affect wind resistance';
            $byStepRecs[14] = 'Consider addressing highlighted vulnerabilities in order of severity';
        } elseif ($this->riskScore > 0) {
            $byStepRecs[14] = 'Consider preventive maintenance to maintain current conditions';
        }

        // Assign to class properties (keep flat arrays for compatibility)
        foreach ($byStepVulns as $vuln) {
            $vulns[] = $vuln;
        }
        foreach ($byStepRecs as $rec) {
            $recs[] = $rec;
        }

        $this->vulnerabilities = array_values(array_unique($vulns));
        $this->recommendations = array_values(array_unique($recs));
        $this->vulnerabilitiesByStep = $byStepVulns;
        $this->remarksByStep = $byStepRecs;

        // All clear logic
        $this->allClear = empty($this->vulnerabilitiesByStep);
        if ($this->allClear) {
            $this->remarksMessage = 'All assessed components show acceptable conditions based on the evaluation criteria.';
        } else {
            $this->remarksMessage = '';
        }
    }


    public function render()
    {
        return view('livewire.assessment-form');
    }
}
