<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\ValidationException;

class AssessmentForm extends Component
{
    public array $selectedOptions = [];
    public int $currentStep = 1;
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
    // Section bar visualization (10 sections)
    public array $sectionBars = [];
    public string $strokeColor = 'bg-green-500';
    public string $textColorClass = 'text-green-600';
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
        unset(
            $this->selectedOptions['trussMaterial'],
            $this->selectedOptions['trussCondition']
        );

        $this->trussMaterial = null;
        $this->trussCondition = null;
        $this->dispatch('resetTrussOptions');
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
        // For 'truss' we store only the presence value in the component property (present/not-present/not-applicable)
        // Do NOT store a numeric score under selectedOptions['truss'] — truss presence is represented by $this->truss
        if ($field !== 'truss') {
            $this->selectedOptions[$field] = $computedValue;
        }
        $this->$field = $value;

        if ($field === 'roofMade') {
            // Clear dependent entries first
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

            // If concrete slab is selected, set related fields to 0 vulnerability and mark truss not-applicable
            if ($value === 'concrete-slab') {
                $this->selectedOptions['trussMaterial'] = 0;
                $this->selectedOptions['trussCondition'] = 0;
                $this->selectedOptions['roofWallConnection'] = 0;
                $this->selectedOptions['roofWallQuality'] = 0;

                $this->truss = 'not-applicable';
                // notify front-end to reset/hide dependent controls
                $this->dispatch('resetTrussOptions');
                $this->dispatch('resetRoofWallOptions');
            } else {
                // If changing away from concrete-slab, remove any automatic zeroed values so user can answer
                unset(
                    $this->selectedOptions['truss'],
                    $this->selectedOptions['trussMaterial'],
                    $this->selectedOptions['trussCondition'],
                    $this->selectedOptions['roofWallConnection'],
                    $this->selectedOptions['roofWallQuality']
                );
                $this->truss = null;
            }
        }

        if ($field === 'truss') {
            // Reset dependent fields when truss selection changes so they can be re-computed or reanswered
            unset(
                $this->selectedOptions['trussMaterial'],
                $this->selectedOptions['trussCondition']
            );
            $this->trussMaterial = null;
            $this->trussCondition = null;

            // If not concrete slab and no truss, assign maximum vulnerability scores for truss-related fields
            if ($this->roofMade !== 'concrete-slab' && $value === 'not-present') {
                // truss material and condition take their own maximums (4 and 6)
                $this->selectedOptions['trussMaterial'] = 4;
                $this->selectedOptions['trussCondition'] = 6;
                // notify front-end to ensure material/condition questions remain hidden
                $this->dispatch('resetTrussOptions');
            }

            // If roof is concrete-slab, ensure all truss-related keys remain 0
            if ($this->roofMade === 'concrete-slab') {
                $this->selectedOptions['trussMaterial'] = 0;
                $this->selectedOptions['trussCondition'] = 0;
            }
        }
    }

    #[On('optionTotal')]
    public function handleOptionTotal($field, $value)
    {
        // For aggregated/total-style controls, store both the property and the selectedOptions
        // Keep the numeric total on the component property (used for UI validation and counts)
        $this->$field = $value;
        // NOTE: do NOT store aggregated totals from ImageQuestionV3 in selectedOptions
        // These totals are counts (e.g., doorsTotal, windowTotal) and should not be treated
        // as vulnerability scores that contribute to the overall risk sum.
    }

    public function evaluateAssessment()
    {
        // Compute section bars first so we can derive a normalized overall percent
        $this->computeSectionBars();

        // riskScore should be the normalized overall percent (sum of each section's contribution)
        $scorePercent = array_sum(array_column($this->sectionBars, 'overallPercent'));
        $this->riskScore = round($scorePercent, 2);

        if ($this->riskScore >= 81 && $this->riskScore <= 100) {
            $this->riskLevel = 'Very High';
        } elseif ($this->riskScore >= 61 && $this->riskScore <= 80) {
            $this->riskLevel = 'High';
        } elseif ($this->riskScore >= 41 && $this->riskScore <= 60) {
            $this->riskLevel = 'Medium';
        } elseif ($this->riskScore >= 21 && $this->riskScore <= 40) {
            $this->riskLevel = 'Low';
        } else {
            $this->riskLevel = 'Very Low';
        }

        // Prepare full report (this will re-run computeSectionBars internally but that's cheap)
        $this->prepareReport();
    }

    protected function prepareReport()
    {
        // compute section bars early so we can base remarks/vulns on per-section percentages
        $this->computeSectionBars();

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

        // --- Enforce per-section vulnerability rule (50% threshold) ---
        // Map section index (1..10) to assessment step (3..12) and friendly label
        $sectionToStepMap = [
            1 => ['step' => 3, 'label' => 'Roof'],
            2 => ['step' => 4, 'label' => 'Truss / Roof framing'],
            3 => ['step' => 5, 'label' => 'Roof-to-wall connections'],
            4 => ['step' => 6, 'label' => 'Walls'],
            5 => ['step' => 7, 'label' => 'Wall-to-foundation'],
            6 => ['step' => 8, 'label' => 'Openings (doors & windows)'],
            7 => ['step' => 9, 'label' => 'Columns and Beams'],
            8 => ['step' => 10, 'label' => 'Building geometry'],
            9 => ['step' => 11, 'label' => 'Overhangs & eaves'],
            10 => ['step' => 12, 'label' => 'Location / Environment'],
        ];

        foreach ($this->sectionBars as $seg) {
            $secIndex = $seg['index'];
            if (!isset($sectionToStepMap[$secIndex])) continue;
            $map = $sectionToStepMap[$secIndex];
            $step = $map['step'];
            $label = $map['label'];

            // If section percent is 50 or higher -> vulnerability, otherwise mark as good
            if (($seg['sectionPercent'] ?? 0) >= 50) {
                $byStepVulns[$step] = sprintf($vulnTemplate, $label);
                $byStepRecs[$step] = sprintf($actionTemplate, strtolower($label));
            } else {
                $byStepRecs[$step] = sprintf($goodTemplate, $label);
                // ensure any previous vulnerability for this step is removed
                if (isset($byStepVulns[$step])) unset($byStepVulns[$step]);
            }
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

        // Compute the per-step section bars for the results visualization
        $this->computeSectionBars();
    }

    /**
     * Compute the 10 section vulnerability bars.
     * Each section has a predefined weight (contribution to 100%).
     * We use $this->selectedOptions to obtain values for each field; missing keys are treated as 0.
     */
    protected function computeSectionBars(): void
    {
        $weights = [20, 10, 8, 10, 7, 10, 12, 8, 5, 10];

        // Map each of the 10 sections to fields and their maximum possible value.
        // Sections correspond to assessment steps 3..12 respectively.
        $sections = [
            // 1 (step 3): Roof (type, made, anchor, condition)
            ['roofType' => 6, 'roofMade' => 5, 'roofAnchor' => 5, 'roofCondition' => 4],
            // 2 (step 4): Truss (material and condition)
            ['trussMaterial' => 4, 'trussCondition' => 6],
            // 3 (step 5): Roof-to-wall connection
            ['roofWallConnection' => 4, 'roofWallQuality' => 4],
            // 4 (step 6): Walls
            ['wallType' => 3, 'wallCondition' => 3],
            // 5 (step 7): Wall/Foundation signs
            ['signsTilt' => 7],
            // 6 (step 8): Openings - doors/windows
            ['doorCondition' => 3, 'windowType' => 3, 'doorwindowFrame' => 2],
            // 7 (step 9): Columns & beams (shape and condition)
            ['columnShape' => 2, 'beamShape' => 2, 'columnbeamCondition' => 6],
            // 8 (step 10): Building geometry
            ['houseShape' => 3, 'houseHeight' => 3, 'houseRatio' => 2],
            // 9 (step 11): Overhangs & eaves
            ['overhang' => 3, 'eaves' => 2],
            // 10 (step 12): Location / Environment
            ['houseNumber' => 5, 'houseLocation' => 5],
        ];

        switch ($this->riskLevel ?? 'Very Low') {
            case 'Very High':
                $stroke = 'bg-red-600';
                $text = 'text-red-600';
                break;
            case 'High':
                $stroke = 'bg-orange-500';
                $text = 'text-orange-500';
                break;
            case 'Medium':
                $stroke = 'bg-yellow-400';
                $text = 'text-yellow-500';
                break;
            case 'Low':
                $stroke = 'bg-green-500';
                $text = 'text-green-600';
                break;
            default:
                $stroke = 'bg-blue-500';
                $text = 'text-blue-600';
                break;
        }

        $bars = [];

        // Color buckets (based on section percent)
        $colorBuckets = [
            [0, 19, '#3b82f6'],   // blue
            [20, 39, '#22c55e'],  // green
            [40, 59, '#eab308'],  // yellow
            [60, 79, '#f97316'],  // orange
            [80, 100, '#dc2626'], // red
        ];

        foreach ($sections as $index => $fields) {
            $maxTotal = 0;
            $valueTotal = 0;

            foreach ($fields as $field => $maxValue) {
                // Special handling: if truss does not apply for concrete slab roofs, exclude truss fields
                if (in_array($field, ['trussMaterial', 'trussCondition'], true) && $this->roofMade === 'concrete-slab') {
                    continue;
                }

                $maxTotal += $maxValue;
                $val = $this->selectedOptions[$field] ?? 0;
                // If non-concrete roof and truss not present, ensure maximum vulnerability (selectedOptions handled elsewhere)
                $valueTotal += $val;
            }

            $sectionPercent = $maxTotal > 0 ? ($valueTotal / $maxTotal) * 100 : 0;
            $sectionPercent = min(100, max(0, $sectionPercent));
            $overallPercent = ($sectionPercent / 100) * $weights[$index];
            // pick a hex color from buckets
            $fillHex = null;
            foreach ($colorBuckets as $bucket) {
                if ($sectionPercent >= $bucket[0] && $sectionPercent <= $bucket[1]) {
                    $fillHex = $bucket[2];
                    break;
                }
            }

            $bars[] = [
                'index' => $index + 1,
                'weight' => $weights[$index],
                'sectionPercent' => round($sectionPercent, 1),
                // fillPercent used to drive the width of the colored fill inside the segment
                'fillPercent' => round($sectionPercent, 1),
                // contribution to the overall 100%
                'overallPercent' => round($overallPercent, 1),
                'strokeColor' => $stroke,
                'textColor' => $text,
                'fillColorHex' => $fillHex,
            ];
        }

        $this->sectionBars = $bars;
        $this->strokeColor = $stroke;
        $this->textColorClass = $text;
    }


    public function render()
    {
        return view('livewire.assessment-form');
    }
}
