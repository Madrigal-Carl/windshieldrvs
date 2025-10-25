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

        // if (!$assessment->path || !Storage::exists('public/' . $assessment->path)) {
        //     notyf()->position('x', 'right')->position('y', 'top')->error('Document not found')
        //         ->error('Document not found');
        //     return;
        // }
        notyf()->position('x', 'right')->position('y', 'top')->success('Download Completed');
        return response()->download(storage_path('app/public/' . $assessment->path));
    }

    public function deleteAssessment($id)
    {
        $assessment = Assessment::find($id);
        if ($assessment) {
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

    public function render()
    {
        return view('livewire.admin-panel', [
            'assessments' => $this->getAssessments()
        ]);
    }
}
