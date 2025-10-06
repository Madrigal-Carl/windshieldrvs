<div class="flex w-full h-screen">
    <aside class="flex flex-col bg-primary h-screen w-1/5 p-6 shadow-lg">
        <a href="/admin" class="w-full flex items-center justify-center gap-2 mt-6 mb-10">
            <img src="{{ asset('images/logo_white.png') }}" alt="logo.png" class="w-7">
            <p class="text-white text-2xl font-bold tracking-wide">
                WindShield<span class="text-accent">RVS</span>
            </p>
        </a>
        <nav class="flex flex-col gap-2 text-white">
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

    <div class="flex-1 flex flex-col gap-6 p-8 overflow-auto h-screen">
        @if ($activeTab === 'dashboard')
            <h1 class="text-2xl font-bold text-primary">Dashboard Overview</h1>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Assessments -->
                <div class="bg-white rounded-md p-4 hover:shadow-md duration-300 border border-gray-200">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-primary/20">
                            <x-feathericon-clipboard class="text-primary w-6 h-6" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Assessments</p>
                            <p class="text-2xl font-semibold text-dark">1,248</p>
                        </div>
                    </div>
                </div>

                <!-- High Risk -->
                <div class="bg-white rounded-md p-4 hover:shadow-md duration-300 border border-gray-200">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-red-500/20">
                            <x-feathericon-alert-triangle class="text-red-500 w-6 h-6" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">High Risk</p>
                            <p class="text-2xl font-semibold text-red-600">42</p>
                        </div>
                    </div>
                </div>

                <!-- Moderate Risk -->
                <div class="bg-white rounded-md p-4 hover:shadow-md duration-300 border border-gray-200">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-yellow-500/20">
                            <x-feathericon-alert-circle class="text-yellow-500 w-6 h-6" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Moderate Risk</p>
                            <p class="text-2xl font-semibold text-yellow-600">120</p>
                        </div>
                    </div>
                </div>

                <!-- Low Risk -->
                <div class="bg-white rounded-md p-4 hover:shadow-md duration-300 border border-gray-200">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-green-500/20">
                            <x-feathericon-check-circle class="text-green-500 w-6 h-6" />
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Low Risk</p>
                            <p class="text-2xl font-semibold text-green-600">982</p>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="text-2xl font-bold text-primary">GIS Map</h1>
            <livewire:map-view />
        @elseif ($activeTab === 'assessment')
            <h1 class="text-2xl font-bold text-primary">Assessment Reports</h1>

            <div class="relative overflow-x-auto">
                <div
                    class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                    <div>
                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5"
                            type="button">
                            <svg class="w-3 h-3 text-gray-500 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                            </svg>
                            Last 30 days
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownRadio"
                            class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow-sm"
                            data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                            style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                            <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                                <li>
                                    <div class="flex items-center p-2 rounded-sm hover:bg-gray-100">
                                        <input id="filter-radio-example-1" type="radio" value=""
                                            name="filter-radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-1"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Last
                                            day</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded-sm hover:bg-gray-100">
                                        <input checked="" id="filter-radio-example-2" type="radio"
                                            value="" name="filter-radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-2"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Last 7
                                            days</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded-sm hover:bg-gray-100">
                                        <input id="filter-radio-example-3" type="radio" value=""
                                            name="filter-radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-3"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Last 30
                                            days</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded-sm hover:bg-gray-100">
                                        <input id="filter-radio-example-4" type="radio" value=""
                                            name="filter-radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-4"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Last
                                            month</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded-sm hover:bg-gray-100">
                                        <input id="filter-radio-example-5" type="radio" value=""
                                            name="filter-radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="filter-radio-example-5"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm">Last
                                            year</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search for items">
                    </div>
                </div>

                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th class="px-6 py-3">
                                House Id
                            </th>
                            <th class="px-6 py-3 text-center">
                                Address / Brgy
                            </th>
                            <th class="px-6 py-3 text-center">
                                Severity
                            </th>
                            <th class="px-6 py-3 text-center">
                                Created at
                            </th>
                            <th class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 6; $i++)
                            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    House 1235
                                </th>
                                <td class="px-6 py-4 text-center">
                                    Santol, Gasan, Marinduque
                                </td>
                                <td class="px-6 py-4 flex items-center justify-center">
                                    {{-- <span class="inline-block px-3 py-1 rounded-full text-white bg-green-500">
                                    Low
                                </span> --}}
                                    <span class="inline-block px-3 py-1 rounded-full text-white bg-accent">
                                        Moderate
                                    </span>
                                    {{-- <span class="inline-block px-3 py-1 rounded-full text-white bg-red-500">
                                    High
                                </span> --}}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    October 4, 2025
                                </td>
                                <td class="px-6 py-4 flex items-center gap-2">
                                    <button
                                        class="cursor-pointer font-medium transform transition-transform duration-200 hover:scale-110">
                                        <x-feathericon-download class="text-blue-600 w-5 h-5" />
                                    </button>
                                    <button
                                        class="cursor-pointer font-medium transform transition-transform duration-200 hover:scale-110">
                                        <x-feathericon-trash-2 class="text-red-500 w-5 h-5" />
                                    </button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>

                <div class="flex flex-col items-center mt-6">
                    <span class="text-sm text-gray-700">
                        Showing <span class="font-semibold text-primary">1</span> to
                        <span class="font-semibold text-primary">10</span> of
                        <span class="font-semibold text-primary">100</span> Entries
                    </span>
                    <div class="inline-flex mt-2 xs:mt-0">
                        <button
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-primary rounded-s hover:bg-[#0b3357]">
                            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                            </svg>
                            Prev
                        </button>
                        <button
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-primary border-0 border-s border-gray-700 rounded-e hover:bg-[#0b3357]">
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
