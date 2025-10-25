<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Assessment;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPanel extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $activeTab = 'dashboard';
    public $search = '';
    public $selectedAssessments = [];
    public $dateFilter = '30-days';
    public $showFilterDropdown = false;

    public function downloadAssessment($id)
    {
        $assessment = Assessment::findOrFail($id);
        notyf()->position('x', 'right')->position('y', 'top')->success('Download Completed');
        return response()->download(storage_path('app/public/' . $assessment->path));
    }

    public function deleteAssessment($id)
    {
        $assessment = Assessment::find($id);
        if ($assessment) {
            if ($assessment->path && Storage::exists($assessment->path)) {
                Storage::delete($assessment->path);
            }
            $assessment->delete();
            notyf()->position('x', 'right')->position('y', 'top')->success('Successfully deleted assessment(s)');
        }
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function logoutConfirm()
    {
        $this->dispatch('show-logout-confirm');
    }

    #[On('logout')]
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing.page');
    }

    public function toggleDropdown()
    {
        $this->showFilterDropdown = !$this->showFilterDropdown;
    }

    public function setDateFilter($filter)
    {
        $this->dateFilter = $filter;
        $this->showFilterDropdown = false;
        $this->resetPage();
    }

    public function getFilterLabel()
    {
        return match ($this->dateFilter) {
            '7-days' => 'Last 7 days',
            '30-days' => 'Last 30 days',
            'month' => 'Last month',
            'year' => 'Last year',
            default => 'Last 30 days'
        };
    }

    public function getAssessments()
    {
        return Assessment::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('house_id', 'like', '%' . $this->search . '%')
                        ->orWhere('address', 'like', '%' . $this->search . '%')
                        ->orWhere('assessor_name', 'like', '%' . $this->search . '%')
                        ->orWhere('severity', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->dateFilter, function ($query) {
                match ($this->dateFilter) {
                    '7-days' => $query->where('created_at', '>=', now()->subDays(7)),
                    '30-days' => $query->where('created_at', '>=', now()->subDays(30)),
                    'month' => $query->where('created_at', '>=', now()->startOfMonth()),
                    'year' => $query->where('created_at', '>=', now()->startOfYear()),
                    default => $query
                };
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    protected function getDashboardStats()
    {
        $stats = [
            'total' => Assessment::count(),
            'high_risk' => Assessment::whereIn('severity', ['high', 'very-high'])->count(),
            'moderate_risk' => Assessment::where('severity', 'moderate')->count(),
            'low_risk' => Assessment::whereIn('severity', ['low', 'very-low'])->count(),
        ];

        // Calculate percentage changes (last 7 days compared to previous 7 days)
        $today = now();
        $last7Days = Assessment::where('created_at', '>=', $today->copy()->subDays(7))->count();
        $previous7Days = Assessment::whereBetween('created_at', [
            $today->copy()->subDays(14),
            $today->copy()->subDays(7)
        ])->count();

        $last7DaysHigh = Assessment::whereIn('severity', ['high', 'very-high'])
            ->where('created_at', '>=', $today->copy()->subDays(7))
            ->count();
        $previous7DaysHigh = Assessment::whereIn('severity', ['high', 'very-high'])
            ->whereBetween('created_at', [$today->copy()->subDays(14), $today->copy()->subDays(7)])
            ->count();

        $last7DaysModerate = Assessment::where('severity', 'moderate')
            ->where('created_at', '>=', $today->copy()->subDays(7))
            ->count();
        $previous7DaysModerate = Assessment::where('severity', 'moderate')
            ->whereBetween('created_at', [$today->copy()->subDays(14), $today->copy()->subDays(7)])
            ->count();

        $last7DaysLow = Assessment::whereIn('severity', ['low', 'very-low'])
            ->where('created_at', '>=', $today->copy()->subDays(7))
            ->count();
        $previous7DaysLow = Assessment::whereIn('severity', ['low', 'very-low'])
            ->whereBetween('created_at', [$today->copy()->subDays(14), $today->copy()->subDays(7)])
            ->count();

        // Calculate percentage changes
        $stats['total_change'] = $this->calculatePercentageChange($previous7Days, $last7Days);
        $stats['high_risk_change'] = $this->calculatePercentageChange($previous7DaysHigh, $last7DaysHigh);
        $stats['moderate_risk_change'] = $this->calculatePercentageChange($previous7DaysModerate, $last7DaysModerate);
        $stats['low_risk_change'] = $this->calculatePercentageChange($previous7DaysLow, $last7DaysLow);

        return $stats;
    }

    protected function calculatePercentageChange($previous, $current)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        return round((($current - $previous) / $previous) * 100, 1);
    }

    protected function getStructuralRiskData()
    {
        $fields = [
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

        $data = [];
        foreach ($fields as $field) {
            $data[] = round(Assessment::avg($field) ?? 0, 2);
        }

        return $data;
    }


    public function render()
    {
        $dashboardStats = $this->getDashboardStats();
        $structuralRiskData = $this->getStructuralRiskData();

        return view('livewire.admin-panel', [
            'assessments' => $this->getAssessments(),
            'dashboardStats' => $dashboardStats,
            'structuralRiskData' => $structuralRiskData
        ]);
    }
}
