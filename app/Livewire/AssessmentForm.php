<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Assessment;
use Livewire\Attributes\On;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Shared\Converter;
use Illuminate\Validation\ValidationException;

class AssessmentForm extends Component
{
    public array $selectedOptions = [];
    // public array $selectedOptions = [
    //     // Roof
    //     'roofType' => 3,
    //     'roofMade' => 3,
    //     'roofAnchor' => 3,
    //     'roofCondition' => 3,

    //     // Truss
    //     'trussMaterial' => 3,
    //     'trussCondition' => 3,

    //     // Roof-Wall Connection
    //     'roofWallConnection' => 3,
    //     'roofWallQuality' => 3,

    //     // Walls
    //     'wallType' => 5,
    //     'wallsCondition' => 2,

    //     // Tilt
    //     'signsTilt' => 3,

    //     // Doors & Windows
    //     'doorType' => 2,
    //     'doorCondition' => 2,
    //     'windowType' => 2,
    //     'doorwindowFrame' => 2,

    //     // Columns & Beams
    //     'columnsShape' => 1,
    //     'columnMade' => 2,
    //     'beamShape' => 1,
    //     'beamMade' => 3,
    //     'columnbeamCondition' => 3,

    //     // House Shape & Dimensions
    //     'houseShape' => 3,
    //     'houseHeight' => 1,
    //     'houseRatio' => 2,

    //     // Others
    //     'overhang' => 1,
    //     'eaves' => 2,

    //     'houseNumber' => 2,
    //     'houseLocation' => 2,
    // ];

    public int $currentStep = 13;
    public int $totalSteps = 14;
    public $isAccepted = '';
    public $houseId, $address, $date, $assessorName;
    public $roofType, $roofMade, $roofAnchor, $roofCondition;
    public $truss, $trussMaterial, $trussCondition;
    public $roofWallConnection, $roofWallQuality;
    public $wallTotal, $wallType, $wallsTotal, $wallsCondition;
    public $signsTilt;
    public $doors, $doorType, $doorCondition, $windowTotal, $windowType, $doorwindowFrame, $doorwindowTotal;
    public $columnsTotal, $columnsShape, $columnTotal, $columnMade, $beams, $beamShape, $beamMade, $columnbeamCondition, $columnbeamTotal;
    public $houseShape, $houseHeight, $houseRatio;
    public $overhangTotal, $overhang, $eavesTotal, $eaves;
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
                        'roofMade' => 'required',
                        'roofType' => 'required_unless:roofMade,concrete-slab',
                        'roofAnchor' => 'required_unless:roofMade,concrete-slab',
                        'roofCondition' => 'required_unless:roofMade,concrete-slab',
                    ], [
                        'roofMade.required' => 'Please specify the roof material.',
                        'roofType.required_unless' => 'Please specify the roof type.',
                        'roofAnchor.required_unless' => 'Please specify the roof anchor.',
                        'roofCondition.required_unless' => 'Please specify the roof condition.',
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
                        'wallType' => 'required',
                        'wallsCondition' => 'required',
                    ], [
                        'wallType.required' => 'Please specify the type of the wall.',
                        'wallsCondition.required' => 'Please specify the condition of the wall.',
                    ]);
                    if ($this->wallTotal !== $this->wallsTotal) {
                        notyf()
                            ->position('x', 'right')
                            ->position('y', 'top')
                            ->error('The total number of wall types should be equal to the total number of wall conditions.');
                        return false;
                    }
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
                        'columnsShape' => 'required',
                        'columnMade' => 'required',
                        'beams' => 'required',
                        'beamShape' => 'required',
                        'beamMade' => 'required',
                        'columnbeamCondition' => 'required',
                    ], [
                        'columnsShape.required' => 'Please specify the column type.',
                        'columnMade.required' => 'Please specify the column material.',
                        'beams.required' => 'Please enter the total beams.',
                        'beamShape.required' => 'Please specify the beam type.',
                        'beamMade.required' => 'Please specify the beam material.',
                        'columnbeamCondition.required' => 'Please specify the number of column/beam condition.',
                    ]);

                    if ($this->columnsTotal !== $this->columnTotal) {
                        notyf()
                            ->position('x', 'right')
                            ->position('y', 'top')
                            ->error('The number of column shapes made must match the total number of columns.');
                        return false;
                    }
                    $columns = $this->columnsTotal;
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
                    if ($this->overhangTotal !== $this->eavesTotal) {
                        notyf()
                            ->position('x', 'right')
                            ->position('y', 'top')
                            ->error('The number of roof overhangs must match the number of eaves and soffits.');
                        return false;
                    }
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
        if ($this->validateStep() && $this->currentStep <= $this->totalSteps) {

            if ($this->currentStep === 3 && $this->roofMade === 'concrete-slab') {
                $this->currentStep = 6;
                return $this->dispatch('scroll-to-top');
            }

            if ($this->currentStep === $this->totalSteps - 1) {
                $this->evaluateAssessment();
            }

            // 👇 Before saving images, show the overlay
            if ($this->currentStep === $this->totalSteps) {
                $this->dispatch('show-loading-overlay');
                $this->dispatch('triggerSaveAllSectionsToServer');
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

        if ($this->roofMade !== 'concrete-slab' && $this->truss === 'not-present') {
            // truss material and condition take their own maximums (4 and 6)
            $this->selectedOptions['trussMaterial'] = 4;
            $this->selectedOptions['trussCondition'] = 6;
        }

        // If roof is concrete-slab, ensure all truss-related keys remain 0
        if ($this->roofMade === 'concrete-slab') {
            $this->selectedOptions['trussMaterial'] = 0;
            $this->selectedOptions['trussCondition'] = 0;
        }
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

    // public function updatedWalls()
    // {
    //     unset(
    //         $this->selectedOptions['wallType'],
    //         $this->selectedOptions['wallsCondition']
    //     );

    //     $this->wallType = null;
    //     $this->wallsCondition = null;

    //     $this->dispatch('resetWallOptions');
    // }

    // public function updatedColumns()
    // {
    //     unset(
    //         $this->selectedOptions['columnsShape'],
    //         $this->selectedOptions['columnMade']
    //     );

    //     $this->columnsShape = null;
    //     $this->columnMade = null;

    //     $this->dispatch('resetColumnOptions');
    // }

    public function updatedBeams()
    {
        unset(
            $this->selectedOptions['beamShape'],
            $this->selectedOptions['beamMade']
        );

        $this->beamShape = null;
        $this->beamMade = null;

        $this->dispatch('resetBeamOptions');
    }

    // public function updatedNoEaves()
    // {
    //     unset(
    //         $this->selectedOptions['overhang'],
    //         $this->selectedOptions['eaves']
    //     );

    //     $this->overhang = null;
    //     $this->eaves = null;

    //     $this->dispatch('resetNoEavesOptions');
    // }

    #[On('optionSelected')]
    public function handleOptionSelected($field, $value, $computedValue)
    {
        $this->selectedOptions[$field] = $computedValue;
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

            $this->roofType = null;
            $this->roofAnchor = null;
            $this->roofCondition = null;
            $this->truss = null;
            $this->trussMaterial = null;
            $this->trussCondition = null;
            $this->roofWallConnection = null;
            $this->roofWallQuality = null;

            // If concrete slab is selected, set related fields to 0 vulnerability and mark truss not-applicable
            if ($value === 'concrete-slab') {
                $this->selectedOptions['roofType'] = 0;
                $this->selectedOptions['roofAnchor'] = 0;
                $this->selectedOptions['roofCondition'] = 0;
                $this->selectedOptions['trussMaterial'] = 0;
                $this->selectedOptions['trussCondition'] = 0;
                $this->selectedOptions['roofWallConnection'] = 0;
                $this->selectedOptions['roofWallQuality'] = 0;
            } else {
                // If changing away from concrete-slab, remove any automatic zeroed values so user can answer
                unset(
                    $this->selectedOptions['roofType'],
                    $this->selectedOptions['roofAnchor'],
                    $this->selectedOptions['roofCondition'],
                    $this->selectedOptions['trussMaterial'],
                    $this->selectedOptions['trussCondition'],
                    $this->selectedOptions['roofWallConnection'],
                    $this->selectedOptions['roofWallQuality']
                );
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
        // Compute section bars first so we can derive a normalized overall percent
        $this->computeSectionBars();
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
        if ($isHighRisk('wallType', 3) || $isHighRisk('wallsCondition', 3)) {
            $byStepVulns[6] = sprintf($vulnTemplate, 'Wall system');
            $byStepRecs[6] = sprintf($actionTemplate, 'wall construction');
        } elseif (isset($this->selectedOptions['wallType']) || isset($this->selectedOptions['wallsCondition'])) {
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
        if ($isHighRisk('columnsShape', 2) || $isHighRisk('beamShape', 2)) {
            $byStepVulns[9] = sprintf($vulnTemplate, 'Column and beam configuration');
            $byStepRecs[9] = sprintf($actionTemplate, 'column and beam system');
        } elseif (isset($this->selectedOptions['columnsShape']) || isset($this->selectedOptions['beamShape'])) {
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

    protected function computeSectionBars(): void
    {
        $weights = [20, 10, 8, 10, 7, 10, 12, 8, 5, 10];

        $sectionKeys = [
            'roof_type_and_condition',
            'roof_truss',
            'roof_to_wall_connection',
            'wall_type_integrity',
            'wall_to_foundation_connection',
            'openings_windows_and_doors',
            'column_and_beam_system',
            'building_shape_and_plan_configuration',
            'overhand_and_eaves',
            'location_or_environmental_exposure',
        ];

        $sections = [
            ['roofType' => 6, 'roofMade' => 5, 'roofAnchor' => 5, 'roofCondition' => 4],
            ['trussMaterial' => 4, 'trussCondition' => 6],
            ['roofWallConnection' => 4, 'roofWallQuality' => 4],
            ['wallType' => 7, 'wallsCondition' => 3],
            ['signsTilt' => 7],
            ['doorType' => 3, 'doorCondition' => 2, 'windowType' => 3, 'doorwindowFrame' => 2],
            ['columnsShape' => 2, 'columnMade' => 2, 'beamShape' => 2, 'beamMade' => 2, 'columnbeamCondition' => 4],
            ['houseShape' => 3, 'houseHeight' => 3, 'houseRatio' => 2],
            ['overhang' => 3, 'eaves' => 2],
            ['houseNumber' => 5, 'houseLocation' => 5],
        ];

        // 🎨 Risk-level color setup
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
        $sectionValues = []; // store section valueTotals

        $colorBuckets = [
            [0, 19, '#3b82f6'],
            [20, 39, '#22c55e'],
            [40, 59, '#eab308'],
            [60, 79, '#f97316'],
            [80, 100, '#dc2626'],
        ];

        foreach ($sections as $index => $fields) {
            $maxTotal = 0;
            $valueTotal = 0;

            foreach ($fields as $field => $maxValue) {
                $maxTotal += $maxValue;
                $val = $this->selectedOptions[$field] ?? 0;
                $valueTotal += $val;
            }

            // 🎯 Round the raw valueTotal
            $valueTotal = round($valueTotal, 2);

            $sectionPercent = $maxTotal > 0 ? ($valueTotal / $maxTotal) * 100 : 0;
            $sectionPercent = round(min(100, max(0, $sectionPercent)));
            $overallPercent = round(($sectionPercent / 100) * $weights[$index], 2);

            // Determine fill color
            $fillHex = collect($colorBuckets)
                ->firstWhere(fn($b) => $sectionPercent >= $b[0] && $sectionPercent <= $b[1])[2]
                ?? '#3b82f6';

            $bars[] = [
                'index' => $index + 1,
                'weight' => $weights[$index],
                'sectionPercent' => round($sectionPercent, 1),
                'fillPercent' => round($sectionPercent, 1),
                'overallPercent' => round($overallPercent, 2),
                'strokeColor' => $stroke,
                'textColor' => $text,
                'fillColorHex' => $fillHex,
            ];

            $sectionValues[$sectionKeys[$index]] = $valueTotal;
        }

        $this->sectionBars = $bars;
        $this->strokeColor = $stroke;
        $this->textColorClass = $text;

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

        Assessment::updateOrCreate(
            ['house_id' => $this->houseId],
            array_merge($sectionValues, [
                'address' => $this->address,
                'assessor_name' => $this->assessorName,
                'severity' => strtolower(str_replace(' ', '-', $this->riskLevel)),
                'latitude' => round($this->latitude, 7),
                'longitude' => round($this->longitude, 7),
            ])
        );
    }


    public function saveImagesToStorage($images)
    {
        $paths = [];

        foreach ($images as $image) {
            $data = $image['data'];
            $filename = $image['filename'];

            // Remove base64 header
            $data = preg_replace('#^data:image/\w+;base64,#i', '', $data);
            $imageData = base64_decode($data);

            $path = "reports/temp/{$filename}";
            Storage::disk('public')->put($path, $imageData);
            $paths[] = storage_path("app/public/{$path}");
        }

        $this->generateDocx($paths);

        Storage::disk('public')->deleteDirectory('reports/temp');
    }

    public function generateDocx($imagePaths)
    {
        $phpWord = new PhpWord();

        $sectionStyle = [
            'orientation'   => 'portrait',
            'marginLeft'    => Converter::cmToTwip(1),
            'marginRight'   => Converter::cmToTwip(1),
            'marginTop'     => Converter::cmToTwip(1),
            'marginBottom'  => Converter::cmToTwip(1),
        ];
        $section = $phpWord->addSection($sectionStyle);

        $maxWidthCm = 19;
        $maxHeightCm = 26.7;

        foreach ($imagePaths as $index => $path) {
            [$widthPx, $heightPx] = getimagesize($path);

            $widthCm = $widthPx / 96 * 2.54;
            $heightCm = $heightPx / 96 * 2.54;

            // Scale to fit page
            $scale = min($maxWidthCm / $widthCm, $maxHeightCm / $heightCm, 1);
            $scaledWidthCm = $widthCm * $scale;
            $scaledHeightCm = $heightCm * $scale;

            // Add the image
            $section->addImage($path, [
                'width'     => Converter::cmToPoint($scaledWidthCm),
                'height'    => Converter::cmToPoint($scaledHeightCm),
                'alignment' => 'center',
            ]);
        }

        $filename = 'assessment_report_' . $this->houseId . '_' . now()->format('Ymd_His') . '.docx';
        $storagePath = "reports/{$filename}";
        $absolutePath = storage_path("app/public/{$storagePath}");

        if (!file_exists(dirname($absolutePath))) {
            mkdir(dirname($absolutePath), 0755, true);
        }

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($absolutePath);

        Assessment::where('house_id', $this->houseId)
            ->update(['path' => $storagePath]);

        return redirect()->route('download.report', ['path' => $storagePath]);
    }


    public function render()
    {
        return view('livewire.assessment-form');
    }
}
