<div class="flex flex-col md:flex-row w-full h-screen" x-data="{ isSidebarOpen: false }">
    <aside class="flex md:flex-col bg-primary md:h-screen w-full md:w-1/5 p-6 shadow-lg relative">
        <!-- Top Bar (Mobile) -->
        <div class="flex w-full items-center justify-between md:justify-center">
            <a href="/admin" class="flex items-center gap-2 md:mt-6 md:mb-10">
                <img src="{{ asset('images/logo_white.png') }}" alt="logo.png" class="w-6 md:w-7">
                <p class="text-white text-xl md:text-2xl font-bold tracking-wide">
                    WindShield<span class="text-accent">RVS</span>
                </p>
            </a>

            <!-- Burger Button (visible only on mobile) -->
            <button @click="isSidebarOpen = !isSidebarOpen" class="md:hidden text-white focus:outline-none">
                <x-feathericon-menu class="w-7 h-7" />
            </button>
        </div>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex flex-col gap-2 text-white">
            <button wire:click="setActiveTab('dashboard')"
                class="cursor-pointer flex items-center gap-3 hover:bg-accent rounded-xl px-4 py-3 font-medium transition-all duration-300 hover:translate-x-1
                {{ $activeTab === 'dashboard' ? 'bg-accent shadow-inner' : '' }}">
                <x-feathericon-layers class="w-5" stroke-width="1.6" />
                <span class="text-sm">Dashboard</span>
            </button>

            <button wire:click="setActiveTab('assessment')"
                class="cursor-pointer flex items-center gap-3 hover:bg-accent rounded-xl px-4 py-3 transition-all duration-300 hover:translate-x-1
                {{ $activeTab === 'assessment' ? 'bg-accent shadow-inner' : '' }}">
                <x-feathericon-clipboard class="w-5" stroke-width="1.6" />
                <span class="text-sm">Assessment</span>
            </button>

            <div class="border-t border-white/20 my-3"></div>

            <button
                class="cursor-pointer flex items-center gap-3 hover:bg-accent rounded-xl px-4 py-3 transition-all duration-300 hover:translate-x-1">
                <x-feathericon-settings class="w-5" stroke-width="1.6" />
                <span class="text-sm">Settings</span>
            </button>

            <button wire:click='logoutConfirm'
                class="cursor-pointer flex items-center gap-3 hover:bg-accent rounded-xl px-4 py-3 transition-all duration-300 hover:translate-x-1">
                <x-feathericon-log-out class="w-5" stroke-width="1.6" />
                <span class="text-sm">Logout</span>
            </button>
        </nav>
    </aside>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="isSidebarOpen" @click="isSidebarOpen = false"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 md:hidden"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

    <!-- Mobile Sidebar (same links as desktop) -->
    <div x-show="isSidebarOpen" @click.away="isSidebarOpen = false"
        class="fixed top-0 left-0 h-full w-64 bg-primary shadow-lg z-50 p-6 flex flex-col text-white md:hidden"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-x-full"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform -translate-x-full">
        <div class="flex justify-between items-center mb-6">
            <p class="text-2xl font-bold">Menu</p>
            <button @click="isSidebarOpen = false" class="text-white">
                <x-feathericon-x class="w-6 h-6" />
            </button>
        </div>

        <button wire:click="setActiveTab('dashboard')"
            class="cursor-pointer flex items-center gap-3 hover:bg-accent rounded-xl px-4 py-3 font-medium transition-all duration-300
            {{ $activeTab === 'dashboard' ? 'bg-accent shadow-inner' : '' }}">
            <x-feathericon-layers class="w-5" stroke-width="1.6" />
            <span class="text-sm">Dashboard</span>
        </button>

        <button wire:click="setActiveTab('assessment')"
            class="cursor-pointer flex items-center gap-3 hover:bg-accent rounded-xl px-4 py-3 transition-all duration-300
            {{ $activeTab === 'assessment' ? 'bg-accent shadow-inner' : '' }}">
            <x-feathericon-clipboard class="w-5" stroke-width="1.6" />
            <span class="text-sm">Assessment</span>
        </button>

        <div class="border-t border-white/20 my-3"></div>

        <button
            class="cursor-pointer flex items-center gap-3 hover:bg-accent rounded-xl px-4 py-3 transition-all duration-300">
            <x-feathericon-settings class="w-5" stroke-width="1.6" />
            <span class="text-sm">Settings</span>
        </button>

        <button wire:click='logoutConfirm'
            class="cursor-pointer flex items-center gap-3 hover:bg-accent rounded-xl px-4 py-3 transition-all duration-300">
            <x-feathericon-log-out class="w-5" stroke-width="1.6" />
            <span class="text-sm">Logout</span>
        </button>
    </div>


    <div class="flex-1 flex flex-col gap-6 p-8 overflow-auto h-screen bg-gray-50">
        @if ($activeTab === 'dashboard')
            <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-primary/20 bg-clip-text text-transparent">
                Dashboard Overview</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <!-- Total Assessments -->
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-indigo-100 text-indigo-600">
                            <x-feathericon-clipboard />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Assessments</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $dashboardStats['total'] }}</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-gray-500">Last 7 days</span>
                        <span
                            class="text-xs font-medium {{ $dashboardStats['total_change'] >= 0 ? 'text-green-500' : 'text-red-500' }}">
                            {{ $dashboardStats['total_change'] >= 0 ? '+' : '' }}{{ $dashboardStats['total_change'] }}%
                        </span>
                    </div>
                </div>

                <!-- High Risk -->
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-red-100 text-red-600">
                            <x-feathericon-alert-triangle />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">High</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $dashboardStats['high_risk'] }}</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-gray-500">Critical issues</span>
                        <span
                            class="text-xs font-medium {{ $dashboardStats['high_risk_change'] >= 0 ? 'text-red-500' : 'text-green-500' }}">
                            {{ $dashboardStats['high_risk_change'] >= 0 ? '+' : '' }}{{ $dashboardStats['high_risk_change'] }}%
                        </span>
                    </div>
                </div>

                <!-- Moderate Risk -->
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-yellow-100 text-yellow-600">
                            <x-feathericon-alert-circle />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Moderate</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $dashboardStats['moderate_risk'] }}</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-gray-500">Needs attention</span>
                        <span
                            class="text-xs font-medium {{ $dashboardStats['moderate_risk_change'] >= 0 ? 'text-yellow-500' : 'text-green-500' }}">
                            {{ $dashboardStats['moderate_risk_change'] >= 0 ? '+' : '' }}{{ $dashboardStats['moderate_risk_change'] }}%
                        </span>
                    </div>
                </div>

                <!-- Low Risk -->
                <div
                    class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-green-100 text-green-600">
                            <x-feathericon-check-circle />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Low</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $dashboardStats['low_risk'] }}</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-gray-500">Stable</span>
                        <span
                            class="text-xs font-medium {{ $dashboardStats['low_risk_change'] >= 0 ? 'text-green-500' : 'text-yellow-500' }}">
                            {{ $dashboardStats['low_risk_change'] >= 0 ? '+' : '' }}{{ $dashboardStats['low_risk_change'] }}%
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row-reverse gap-4 md:gap-6">
                <!-- GIS Map Section -->
                <div class="{{ $assessments->isEmpty() ? 'w-full' : 'w-full lg:w-2/3' }}">
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 space-y-6">
                        <h2 class="text-xl font-bold text-gray-800">GIS Map Overview</h2>
                        <div class="rounded-lg overflow-hidden h-96 bg-gray-100 flex items-center justify-center">
                            <livewire:map-view />
                        </div>
                    </div>
                </div>
                @if (!$assessments->isEmpty())
                    <!-- Pie Chart Section -->
                    <div class="w-full lg:w-1/3">
                        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 h-fit flex flex-col">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">
                                Structural Risk Breakdown
                            </h2>
                            <div id="Piechart" class="w-full flex justify-center items-center px-4" wire:ignore
                                x-data="{
                                    chart: null,
                                    init() {
                                        // If chart already exists, destroy it before re-render
                                        if (this.chart) {
                                            this.chart.destroy();
                                        }
                                
                                        const options = {
                                            series: @js($structuralRiskData),
                                            chart: {
                                                type: 'pie',
                                                width: '100%',
                                                height: 400,
                                                toolbar: { show: false }
                                            },
                                            labels: [
                                                'Roof Type & Condition',
                                                'Roof Truss',
                                                'Roof-Wall Connection',
                                                'Wall Integrity',
                                                'Wall-Foundation Connection',
                                                'Openings & Doors',
                                                'Column & Beam System',
                                                'Building Shape',
                                                'Overhang & Eaves',
                                                'Location / Exposure'
                                            ],
                                            colors: [
                                                '#6366F1', '#8B5CF6', '#EC4899', '#F43F5E',
                                                '#F97316', '#F59E0B', '#10B981', '#14B8A6',
                                                '#0EA5E9', '#64748B'
                                            ],
                                            legend: { show: false },
                                            dataLabels: {
                                                enabled: true,
                                                style: { fontSize: '12px', fontWeight: 'bold' },
                                                dropShadow: { enabled: false }
                                            }
                                        };
                                
                                        // Create new chart instance
                                        this.chart = new ApexCharts(this.$el, options);
                                        this.chart.render();
                                    }
                                }" x-init="init()"
                                x-on:refresh-piechart.window="init()">
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        @elseif ($activeTab === 'assessment')
            <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-primary/20 bg-clip-text text-transparent">
                Assessment Reports</h1>
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col md:flex-row space-y-4 sm:space-y-0 md:items-center justify-between pb-4">
                    <div>
                        <div class="relative">
                            <button wire:click="toggleDropdown"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5"
                                type="button">
                                <svg class="w-3 h-3 text-gray-500 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                </svg>
                                {{ $this->getFilterLabel() }}
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            <div x-show="$wire.showFilterDropdown" @click.away="$wire.showFilterDropdown = false"
                                class="absolute z-10 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow-sm">
                                <ul class="p-3 space-y-1 text-sm text-gray-700">
                                    <li>
                                        <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 cursor-pointer"
                                            wire:click="setDateFilter('7-days')">
                                            <input type="radio" value="7-days" name="filter-radio"
                                                {{ $dateFilter === '7-days' ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">
                                                Last 7 days
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 cursor-pointer"
                                            wire:click="setDateFilter('30-days')">
                                            <input type="radio" value="30-days" name="filter-radio"
                                                {{ $dateFilter === '30-days' ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">
                                                Last 30 days
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 cursor-pointer"
                                            wire:click="setDateFilter('month')">
                                            <input type="radio" value="month" name="filter-radio"
                                                {{ $dateFilter === 'month' ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">
                                                Last month
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 cursor-pointer"
                                            wire:click="setDateFilter('year')">
                                            <input type="radio" value="year" name="filter-radio"
                                                {{ $dateFilter === 'year' ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">
                                                Last year
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" wire:model.live="search" id="table-search"
                            class="w-full md:w-80 block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search assessments...">
                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="min-w-[720px] md:min-w-full w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="hidden md:block p-4"></th>
                                <th class="px-6 py-3">House Id</th>
                                <th class="px-6 py-3 text-center">Address / Brgy</th>
                                <th class="px-6 py-3 text-center">Severity</th>
                                <th class="px-6 py-3 text-center">Created at</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assessments as $assessment)
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                    <td class="hidden md:block w-4 p-4">
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        House {{ $assessment->house_id }}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{ $assessment->address }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div @class([
                                            'flex items-center justify-center px-3 py-1 rounded-full w-fit mx-auto',
                                            'bg-red-600' => $assessment->severity === 'very-high',
                                            'bg-orange-500' => $assessment->severity === 'high',
                                            'bg-yellow-500' => $assessment->severity === 'moderate',
                                            'bg-green-500' => $assessment->severity === 'low',
                                            'bg-blue-500' => $assessment->severity === 'very-low',
                                        ])>
                                            <span class="text-white text-sm font-medium">
                                                {{ ucwords(str_replace('-', ' ', $assessment->severity)) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $assessment->created_at->format('F j, Y') }}
                                    </td>
                                    <td class="px-6 py-4 flex items-center gap-2">
                                        <button wire:click="downloadAssessment({{ $assessment->id }})"
                                            class="cursor-pointer font-medium transform transition-transform duration-200 hover:scale-110">
                                            <x-feathericon-download class="text-blue-600 w-5 h-5" />
                                        </button>
                                        <button wire:click="deleteAssessment({{ $assessment->id }})"
                                            class="cursor-pointer font-medium transform transition-transform duration-200 hover:scale-110">
                                            <x-feathericon-trash-2 class="text-red-500 w-5 h-5" />
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        No assessments found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-col items-center mt-6">
                    <span class="text-sm text-gray-700">
                        Showing <span class="font-semibold text-primary">{{ $assessments->firstItem() ?? 0 }}</span>
                        to
                        <span class="font-semibold text-primary">{{ $assessments->lastItem() ?? 0 }}</span> of
                        <span class="font-semibold text-primary">{{ $assessments->total() }}</span> Entries
                    </span>
                    <div class="inline-flex mt-2 xs:mt-0">
                        <button wire:click="previousPage" wire:loading.attr="disabled"
                            @if ($assessments->onFirstPage()) disabled @endif
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-primary rounded-s hover:bg-[#0b3357] disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                            </svg>
                            Prev
                        </button>
                        <button wire:click="nextPage" wire:loading.attr="disabled"
                            @if (!$assessments->hasMorePages()) disabled @endif
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-primary border-0 border-s border-gray-700 rounded-e hover:bg-[#0b3357] disabled:opacity-50 disabled:cursor-not-allowed">
                            Next
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
