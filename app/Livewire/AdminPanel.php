<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminPanel extends Component
{
    public $activeTab = 'dashboard';

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

    public function render()
    {
        return view('livewire.admin-panel');
    }
}
