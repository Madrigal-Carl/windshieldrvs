<div class="bg-gray-50 w-full">
    <div id="loading-overlay" wire:ignore
        class="hidden fixed bg-black/30 w-dvw h-dvh z-50 backdrop-blur-xs justify-center items-center" role="status">
        <svg class="absolute top-1/2 left-[47.8%] w-12 h-12 text-gray-200 animate-spin fill-blue-600"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
            <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div>


    <!-- Navigation -->
    @if ($currentStep === 1 || $currentStep < $totalSteps)
        <a href="/" class="cursor-pointer w-14 h-14 absolute top-3 md:left-3 flex items-center justify-center">
            <x-feathericon-arrow-left class="w-8 h-8 text-primary" />
        </a>
    @endif

    <div class="container mx-auto px-4 py-12 max-w-3xl">
        <!-- Progress Bar -->
        @if ($currentStep <= $totalSteps)
            <div class="mb-8 mt-8">
                <div class="flex justify-between mb-2 md:mt-2">
                    <span class="text-primary font-medium">Progress</span>
                    <span class="text-primary font-medium">{{ $currentStep }}/{{ $totalSteps }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="h-2.5 rounded-full transition-all duration-500 bg-primary"
                        style="width: {{ ($currentStep / $totalSteps) * 100 }}%"></div>
                </div>
            </div>
        @endif
        <!-- Form Steps -->
        <div>
            @if ($currentStep === 1)
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="text-gray-600 mb-6 space-y-4">
                        <h2 class="text-2xl font-bold text-primary mb-4 pb-6 border-b border-gray-200">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                        <p><b>Dear Ma’am/Sir,</b></p>
                        <p><b>Greetings!</b></p>
                        <p>
                            We are students from the <b>Bachelor of Science in Civil Engineering at Marinduque State
                                University (MarSU),</b> currently conducting our Capstone study entitled:
                        </p>
                        <p><b>“Development and Validation of a Rapid Visual Screening (RVS) Tool for Assessing Wind
                                Vulnerability of One-Storey Concrete Houses in Boac, Marinduque.”</b></p>
                        <p>
                            The purpose of this study is to create a simple, practical, and standards-based tool
                            that
                            can
                            help identify the level of wind vulnerability of residential houses, particularly in
                            areas
                            exposed to typhoons. This tool follows the guidelines set by <b>FEMA P-2062</b>, the
                            <b>National
                                Structural Code of the Philippines (NSCP)</b>, and the <b>National Building Code
                                (NBC)</b>,
                            adapted to the local context of Marinduque.
                        </p>
                        <p>
                            Through this form, we respectfully invite you to take part in the assessment process.
                            You
                            will
                            be asked to provide information about the structural condition of your house (such as
                            roof,
                            walls, foundation, openings, and other features). Each section contains simple questions
                            in
                            both
                            English and Filipino to make it easier to understand. Your responses will be scored
                            based on
                            vulnerability levels ranging from <b>Very Low Risk (Mababa ang Panganib) to Very High
                                Risk
                                (Mataas ang Panganib).</b>
                        </p>
                        <p>
                            By participating in this study, you will play an important role in testing and refining
                            the
                            <b>Rapid Visual Screening (RVS) tool</b> to ensure its accuracy and usefulness. Your
                            involvement
                            will also contribute to the broader efforts of disaster preparedness and resilience in
                            Boac,
                            Marinduque, by providing valuable information that can guide risk reduction strategies.
                            In
                            addition, your participation will support initiatives that aim to develop safer housing
                            designs
                            and preventive measures against wind hazards, ultimately helping to protect communities
                            from
                            the
                            destructive impacts of typhoons.
                        </p>
                        <p>
                            Your participation in this study is entirely voluntary. You may choose to participate or
                            not,
                            and your decision will be respected without any consequence. All information gathered
                            will
                            be
                            treated with the highest level of confidentiality, in compliance with <b>Republic Act
                                No.
                                10173
                                (Data Privacy Act of 2012).</b> The results will only be used for academic purposes
                            and
                            disaster risk reduction planning.
                        </p>
                        <p>
                            Should you have any questions or concerns about the study, please feel free to contact
                            us:
                        </p>
                        <p><b>Contact Information</b></p>
                        <p>
                            <b>Researcher:</b> Wilmer Anjaneya D. Imperio IV<br>
                            <b>Email Address:</b> imperiowadi@gmail.com<br>
                            <b>Contact No.:</b> 09453045255
                        </p>
                        <p>
                            <b>Researcher:</b> Denielle Marie V. Peñaroyo<br>
                            <b>Email Address:</b> penaroyodeniellemarie09@gmail.com<br>
                            <b>Contact No.:</b> 09776219505
                        </p>
                        <p>
                            <b>Researcher:</b> Art Heaverleen R. Ricohermoso<br>
                            <b>Email Address:</b> artheaverleenricohermoso@gmail.com<br>
                            <b>Contact No.:</b> 09561501511
                        </p>
                        <p>
                            <b>Researcher:</b> Samuel V. Valdepeña<br>
                            <b>Email Address:</b> samvaldepena003@gmail.com<br>
                            <b>Contact No.:</b> 09389484323
                        </p>
                        <p>
                            We sincerely thank you for your valuable time and support. With your participation, we
                            can
                            help strengthen the resilience of our communities against strong winds and typhoons.
                            Respectfully yours,
                            The Researchers
                        </p>
                    </div>

                    <div class="mb-8 border-t border-gray-200 pt-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox" wire:model.live="isAccepted"
                                    class="w-4 h-4 rounded-full border-2 border-secondary accent-secondary">
                            </div>
                            <label for="terms" class="ml-2 text-sm font-medium text-gray-700 text-justify">
                                I have read and understood the information above and agree to participate in this
                                study.
                                (Nabasa at naunawaan ko ang impormasyong nasa itaas at ako ay sumasang-ayon na
                                lumahok
                                sa pag-aaral na ito.)
                            </label>
                        </div>
                    </div>
                </div>
            @endif

            @if ($currentStep === 2)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>House Information <i>(Impormasyon ng Bahay)</i></b></p>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-4">Date</h3>
                        <div class="relative w-1/2">
                            <div class="relative">
                                <input type="text" disabled value="{{ $this->formattedDate }}"
                                    class="peer text-gray-700 border-b border-gray-300 focus:outline-none w-full bg-transparent" />
                                <span
                                    class="absolute left-1/2 bottom-0 h-[2px] w-0 bg-primary transition-all duration-300 ease-out peer-focus:w-full peer-focus:left-0 peer-focus:h-[3px] rounded-full"></span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-4">House ID</h3>
                        <div class="relative w-1/2">
                            <div class="relative">
                                <input type="text" wire:model.live='houseId'
                                    class="peer text-gray-700 border-b border-gray-300 focus:outline-none w-full bg-transparent" />
                                <span
                                    class="absolute left-1/2 bottom-0 h-[2px] w-0 bg-primary transition-all duration-300 ease-out peer-focus:w-full peer-focus:left-0 peer-focus:h-[3px] rounded-full"></span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-4">Address / Barangay</h3>
                        <div class="relative w-1/2">
                            <div class="relative">
                                <input type="text" wire:model.live='address'
                                    class="peer text-gray-700 border-b border-gray-300 focus:outline-none w-full bg-transparent" />
                                <span
                                    class="absolute left-1/2 bottom-0 h-[2px] w-0 bg-primary transition-all duration-300 ease-out peer-focus:w-full peer-focus:left-0 peer-focus:h-[3px] rounded-full"></span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-4">Assessor Name <span class="italic">(Tagasuri)</span>
                            (Optional)</h3>
                        <div class="relative w-1/2">
                            <div class="relative">
                                <input type="text" wire:model.live='assessorName'
                                    class="peer text-gray-700 border-b border-gray-300 focus:outline-none w-full bg-transparent" />
                                <span
                                    class="absolute left-1/2 bottom-0 h-[2px] w-0 bg-primary transition-all duration-300 ease-out peer-focus:w-full peer-focus:left-0 peer-focus:h-[3px] rounded-full"></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($currentStep === 3)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Roof Type & Condition <i>(Uri at Kondisyon ng Bubong)</i></b></p>
                    </div>

                    @php
                        $roofTypeOptions = [
                            [
                                'value' => 'hip',
                                'label' => 'Hip / compact (quatro aguas)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'monoslope',
                                'label' => 'Monoslope',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'gable',
                                'label' => 'Gable (dos aguas)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'irregular',
                                'label' => 'Irregular / complex',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'unknown',
                                'label' => 'Unknown framing',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $roofMadeOptions = [
                            [
                                'value' => 'concrete-slab',
                                'label' => 'Concrete slab',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'concrete-tiles',
                                'label' => 'Concrete tiles / heavy tile',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'metal-sheets',
                                'label' => 'Metal sheets with good overlap (yero)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'old-metal',
                                'label' => 'Corrugated thin metal / old metal (lumang yero)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'nipa',
                                'label' => 'Light thatch / nipa or severely degraded material (nipa o pawid)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $roofAnchorOptions = [
                            [
                                'value' => 'proper-bolted',
                                'label' => 'Proper bolted / welded anchors & straps (Maayos at matatag ang pagkakabit)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'embedded-anchors',
                                'label' =>
                                    'Embedded anchors / mechanical anchors in good condition (Maganda ang kalagayan ng pagkakabit)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'some-achors',
                                'label' =>
                                    'Some anchors present but partially corroded (May presensya ng mga anchor ngunit bahagyang kinakalawang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'mostly-nails',
                                'label' =>
                                    'Mostly nails only / weak fasteners (Pako lang ang ginamit/Mahina ang ginamit na pangkabit)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'no-anchor',
                                'label' => 'No anchorage (Walang maayos na pagkakabit)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $roofConditionOptions = [
                            [
                                'value' => 'no-corrosion',
                                'label' => 'New / no corrosion (Bago/walang kalawang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'minor-corrosion',
                                'label' =>
                                    'Minor corrosion / with some repairs (Maliit na kalawang/may ilang pag-aayos)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'some-loose-panels',
                                'label' =>
                                    'Some loose panels / patches (May ilang luma at maluluwang na panel/may tinagpiang mga panel)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'many-loose-panels',
                                'label' =>
                                    'Many loose panels / lots of corrosion (Maraming maluluwang na panel/lubhang kinakalawang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'with-holes',
                                'label' => 'With holes / large gaps (Butas-butas/malalaking mga puwang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                    @endphp

                    <livewire:image-question question="1.1  What is the roof made of?" subtitle="Saan gawa ang bubong?"
                        :options="$roofMadeOptions" model="roofMade" wire:key="roofMade-question" :maxValue="5"
                        :value="$roofMade" />

                    @if ($roofMade !== 'concrete-slab')
                        <livewire:image-question question="1.2 What type of roof does the house have?"
                            subtitle="Ano ang uri ng bubong ng bahay?" :options="$roofTypeOptions" model="roofType"
                            wire:key="roofType-question" :maxValue="6" :value="$roofType" />

                        <livewire:image-question question="1.3  How is the roof anchored to the structure?"
                            subtitle="Paano nakakabit ang bubong sa istruktura?" :options="$roofAnchorOptions" model="roofAnchor"
                            wire:key="roofAnchor-question" :maxValue="5" :value="$roofAnchor" />

                        <livewire:image-question question="1.4  What is the current condition of the roof?"
                            subtitle="Ano ang kasalukuyang kondisyon ng bubong?" :options="$roofConditionOptions" model="roofCondition"
                            wire:key="roofCondition-question" :maxValue="4" :value="$roofCondition" />
                    @endif

                </div>
            @endif

            @if ($currentStep === 4)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Roof- Truss <i>(Trases)</i></b></p>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-6">2.1 Are there roof trusses present? <span
                                class="italic">(May trases ba na ginamit sa bubong ng bahay?)</span></h3>

                        <div class="space-y-4">
                            <label class="flex items-center cursor-pointer select-none">
                                <input id="option-1" name="trusses" type="radio" wire:model.live='truss'
                                    value="present" class="hidden peer">
                                <span
                                    class="outer w-5 h-5 rounded-full border-2 flex items-center justify-center border-black/50 mr-3 p-0.5">
                                    <span
                                        class="inner w-full h-full rounded-full bg-secondary opacity-0 transform scale-100 transition-all duration-500"></span>
                                </span>
                                <span class="text-gray-700 text-sm">Yes (Meron)</span>
                            </label>
                            <label class="flex items-center cursor-pointer select-none">
                                <input id="option-2" name="trusses" type="radio" wire:model.live="truss"
                                    value="not-present" class="hidden peer" />
                                <span
                                    class="outer w-5 h-5 rounded-full border-2 flex items-center justify-center border-black/50 mr-3 p-0.5">
                                    <span
                                        class="inner w-full h-full rounded-full bg-secondary opacity-0 transform scale-100 transition-all duration-500"></span>
                                </span>
                                <span class="text-gray-700 text-sm">None (Wala)</span>
                            </label>
                        </div>
                    </div>
                    @php
                        $trussMaterialOptions = [
                            [
                                'value' => 'truss-material-steel',
                                'label' => 'Steel/Metal truss (Bakal o metal na trases)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'truss-material-engineered-wood',
                                'label' =>
                                    'Engineered/prefabricated wood truss (Prefabricated na trases na gawa sa kahoy)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'truss-material-sawn-wood',
                                'label' => 'Solid sawn wood truss (Karaniwang kahoy na trases)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'truss-material-hybrid-wood',
                                'label' => 'Hybrid Truss/Wood and steel (Pinagsamang trases na gawa sa kahoy at bakal)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'unknown',
                                'label' => 'Unknown or deteriorated material (Hindi tiyak o sira na materyales)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $trussConditionOptions = [
                            [
                                'value' => 'truss-condition-good',
                                'label' =>
                                    'All connections and bracing are intact and in good condition (Buo at maayos ang lahat ng dugtungan at brace)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'truss-condition-minor',
                                'label' =>
                                    'Minor corrosion or slightly missing connectors/bracing (May kaunting kalawang o kulang na koneksyon/brace) ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'truss-condition-weak',
                                'label' =>
                                    'Several weak or loose connectios observed (Ilang dugtungan ang maluwag o mahina)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'truss-condition-missing',
                                'label' =>
                                    'Many missing or severly corroded connectors/bracing (Maraming kulang o lubhang kalawangin na dugtungan/brace)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'truss-condition-no-visible',
                                'label' =>
                                    'No visible bracing or failed connnections (Walang brace o sira ang mga dugtungan)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    @if ($truss === 'present' && $roofMade !== 'concrete-slab')
                        <livewire:image-question question="2.2 Truss Material ?" :options="$trussMaterialOptions"
                            model="trussMaterial" wire:key="trussMaterial-question" :maxValue="4" />

                        <livewire:image-question
                            question="2.3 What is the condition of the truss connection and bracing?"
                            subtitle="Ano ang kalagayan ng mga dugtungan at brace ng trases?" :options="$trussConditionOptions"
                            model="trussCondition" wire:key="trussCondition-question" :maxValue="6" />
                    @endif
                </div>
            @endif

            @if ($currentStep === 5)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Roof - to - Wall Connection <i>(Koneksyon ng Bubong at Pader)</i></b>
                        </p>
                    </div>

                    @php
                        $roofWallConnectionOptions = [
                            [
                                'value' => 'roof-wall-hurricane-ties',
                                'label' =>
                                    'Hurricane ties/ anchor bolts everywhere (Kumpleto at matibay ang koneksyon)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'roof-wall-present',
                                'label' => 'Mostly present & correct (Mayroong ties at tama ang pagkakabit)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'roof-wall-partial',
                                'label' => 'Partial coverage (Bahagya lang ang sakop ng koneksyon)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'roof-wall-rarely-present',
                                'label' => 'Rarely present (Madalang ang maayos na koneksyon)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'roof-wall-absent',
                                'label' => 'Absent (Walang maayos na koneksyon)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $roofWallQualityOptions = [
                            [
                                'value' => 'roof-wall-high-quality',
                                'label' =>
                                    'High quality, adequate spacing, corrosion protected (Mataas ang kalidad, may tamang pagitan, walang kalawang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'roof-wall-good-quality',
                                'label' => 'Good quality, minor corrosion (Maganda ang kalidad, may konting kalawang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'roof-wall-moderate-quality',
                                'label' =>
                                    'Moderate (mixed fasteners) (Pangkaraniwang kalidad, magkahalong pako, turnilyo at bolts ang ginamit na fastener)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'roof-wall-low-quality',
                                'label' =>
                                    'Low quality (nails only, some missing) (Mababa ang kalidad at marami ang kulang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'roof-wall-very-quality',
                                'label' =>
                                    'Very poor or missing fasteners (Sobrang baba ng kalidad, halos walang mga fastener)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    <livewire:image-question question="3.1	Are there proper roof-to-wall connections (ties/anchors)?"
                        subtitle="Mayroon bang wastong ties o anchor bolts sa bubong at pader?" :options="$roofWallConnectionOptions"
                        model="roofWallConnection" wire:key="roofWallConnection-question" :maxValue="4"
                        :value="$roofWallConnection" />

                    <livewire:image-question
                        question="3.2	What is the quality of the roof-to-wall fasteners (nails, screws, bolts)?"
                        subtitle="Ano ang kalidad ng mga fasteners (pako, turnilyo at bolts)?" :options="$roofWallQualityOptions"
                        model="roofWallQuality" wire:key="roofWallQuality-question" :maxValue="4"
                        :value="$roofWallQuality" />
                </div>
            @endif

            @if ($currentStep === 6)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Wall Type and Integrity <i>(Uri at Integridad ng Pader)</i></b>
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-4">How many wall sections are there?</h3>
                        <div class="relative w-1/2">
                            <div class="relative">
                                <input type="number" wire:model.live='walls' min="1"
                                    class="peer text-gray-700 border-b border-gray-300 focus:outline-none w-full bg-transparent" />
                                <span
                                    class="absolute left-1/2 bottom-0 h-[2px] w-0 bg-primary transition-all duration-300 ease-out peer-focus:w-full peer-focus:left-0 peer-focus:h-[3px] rounded-full"></span>
                            </div>
                        </div>
                    </div>
                    @php
                        $wallTypeOptions = [
                            [
                                'value' => 'wall-type-shear',
                                'label' => 'Shear walls',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'wall-type-mixed',
                                'label' =>
                                    'Mixed (RC + CHB with steel reinforcement) (Magkahalong kongreto, hollow blocks at bakal)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'wall-type-concrete',
                                'label' =>
                                    'Concrete hollow block (CHB) with some reinforcement (Hollow blocks na may bakal)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'wall-type-unreinforced',
                                'label' => 'Unreinforced CHB / weak masonry (Hollow blocks)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'wall-type-lightweight',
                                'label' => 'Lightweight / poor materials (Highly vulnerable) (Kahoy o pawid) ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $wallConditionOptions = [
                            [
                                'value' => 'wall-condition-no-damage',
                                'label' =>
                                    'No visible cracks, deformation, or damage. Paint and Plaster are intact. (Walang bitak o pinsala, maayos ang pintura at palitada)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'wall-condition-minor',
                                'label' =>
                                    'Minor hairline cracks or small surface wear, no structural concern. (May maliit na bitak o gasgas ngunit hindi nakakaapekto sa tibay ng pader)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'wall-condition-slight',
                                'label' =>
                                    'Noticeable cracks (1-5mm), slightly bulging, or signs of moisture damage. (May kapansin-pansing bitak, paglobo, o bakas ng tubig)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'wall-condition-large',
                                'label' =>
                                    'Large cracks (>5mm), spalling, or partial detachment of wall surface. (Malalaking bitak, nalalaglag na palitada, o lumuluwag na bahagi ng pader.)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'wall-condition-severe',
                                'label' =>
                                    'Walls show severe cracking, separation or signs of potential collapse. (Malubhang bitak o halos maghiwalay na bahagi; possibleng bumagsak ang pader)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    @if ($walls)
                        <livewire:image-question-v2 question="4.1 What type of material are the walls made of?"
                            subtitle="Anong materyales ang ginamit sa pader?" :options="$wallTypeOptions" model="wallType"
                            wire:key="wallType-question" :maxValue="7" :value="$wallType" :baseValue="$walls" />

                        <livewire:image-question-v2 question="4.2 What is the condition of the walls?"
                            subtitle="Ano ang kondisyon ng pader?" :options="$wallConditionOptions" model="wallCondition"
                            wire:key="wallCondition-question" :maxValue="3" :value="$wallCondition"
                            :baseValue="$walls" />
                    @endif
                </div>
            @endif

            @if ($currentStep === 7)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House)</h2>
                        <p class="p-8"><b>Wall-to-Foundation Connection <i>(Koneksyon ng Pader sa
                                    Pundasyon)</i></b>
                        </p>
                    </div>

                    @php
                        $signsTiltOptions = [
                            [
                                'value' => 'signs-tilt-none',
                                'label' => 'None (wala)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'signs-tilt-minor',
                                'label' => 'Minor settlement (<10mm) (Maliit na paglubog) ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'signs-tilt-moderate',
                                'label' => 'Moderate settlement / cracking (May bahagyang paglubog at pagbitak)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'signs-tilt-noticeable',
                                'label' => 'Noticeable tilt / separation (Tabingi/HUmiwalay na pader) ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'signs-tilt-severe',
                                'label' =>
                                    'Severe settlement / separation (Malubhang paglubog / Halos bumagsak ang pader)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp
                    <livewire:image-question question="5.1 Are there signs of settlement or tilt?"
                        subtitle="Mayroon bang sensyales ng paglubog ng lupa o pagtagilid ng pader?" :options="$signsTiltOptions"
                        model="signsTilt" wire:key="signsTilt-question" :maxValue="7" :value="$signsTilt" />
                </div>
            @endif

            @if ($currentStep === 8)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Openings - Windows and Doors <i>(Mga Bintana at Pinto)</i></b>
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-4">How many doors does the house have? <i>(Ilang
                                pinto
                                mayroon sa bahay?)</i></h3>
                        <div class="relative w-1/2">
                            <div class="relative">
                                <input type="number" wire:model.live='doors' min="1"
                                    class="peer text-gray-700 border-b border-gray-300 focus:outline-none w-full bg-transparent" />
                                <span
                                    class="absolute left-1/2 bottom-0 h-[2px] w-0 bg-primary transition-all duration-300 ease-out peer-focus:w-full peer-focus:left-0 peer-focus:h-[3px] rounded-full"></span>
                            </div>
                        </div>
                    </div>

                    @php
                        $doorTypeOptions = [
                            [
                                'value' => 'door-type-metal',
                                'label' => 'Solid metal/Secure doors (Metal)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'door-type-sturdy',
                                'label' => 'Sturdy wooden doors (Matibay na kahoy) ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'door-type-panel',
                                'label' => 'Panel/Flush doors (Panel/Flush door)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'door-type-fragile',
                                'label' => 'Fragile doors / glass doors (Salamin na pinto)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'door-type-weak',
                                'label' => 'Very weak / missing doors (Mahina/walang pinto)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $doorConditionOptions = [
                            [
                                'value' => 'door-condition-secure',
                                'label' => 'Well-fitted swing/secure sliding (Maayos ang pagbukas at paglapat)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'door-condition-good',
                                'label' =>
                                    'Good operation with minor gaps (Maganda ang kondisyon ngunit may konting puwang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'door-condition-loose',
                                'label' =>
                                    'Operational issues / loose fittings (Hindi maayos ang pagbukas at maluwang ang pagkakakabit)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'door-condition-poor',
                                'label' =>
                                    'Poor seals / large gaps (Hindi Pulido ang kabit at may mga malalaking puwang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'door-condition-detached',
                                'label' => 'Easily blown / detached (Madaling tangayin o matumba)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                        $windowTypeOptions = [
                            [
                                'value' => 'window-type-protected',
                                'label' =>
                                    'Fixed or protected glazing (impact resistant) (Fixed na bintana na mayroong proteksyon sa impact)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'window-type-good',
                                'label' => 'Casement with good frame (BIntana na may matibay na frame) ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'window-type-standard',
                                'label' => 'Sliding/standard windows/jalousie (Karaniwang mga bintana)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'window-type-weak',
                                'label' =>
                                    'Single-panel or weak glazing (Bintanang binubuo ng isang panel at mayroong mahinang proteksyon)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'window-type-missing',
                                'label' =>
                                    'Large fragile glazing / missing shutters (Malaking mga bintana na walang proteksyon)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                        $doorwindowFrameOptions = [
                            [
                                'value' => 'doorwindow-frame-string',
                                'label' =>
                                    'String frames, anchored to structure (Matibay na frame at naka-angkla sa istruktura)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'doorwindow-frame-good',
                                'label' =>
                                    'Good frames, minor gaps (Maayos na frame ngunit mayroong konting mga puwang)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'doorwindow-frame-moderate',
                                'label' =>
                                    'Moderate anchorage, signs of looseness (Katamtamang pagkaka-angkla at mayroong senyales ng pagiging maluwag)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'doorwindow-frame-loose',
                                'label' =>
                                    'Loose frames, missing anchors (Maluwag na mga frame at kulang ang pagkaka-angkla sa istrauktura)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'doorwindow-frame-detached',
                                'label' => 'Frames detached / vulnerable to blowout (walang mga frame)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    @if ($doors)
                        <livewire:image-question-v2 question="6.1 What type of doors does the building have?"
                            subtitle="Ano ang uri ng pinto ang mayroon sa gusali?" :options="$doorTypeOptions" model="doorType"
                            wire:key="doorType-question" :maxValue="3" :value="$doorType" :baseValue="$doors" />

                        <livewire:image-question-v2
                            question="6.2 Do the doors swing/slide properly and is it well sealed?"
                            subtitle="Maayos bang bumubukas/sumasara ang pinto at seyado ba ito?" :options="$doorConditionOptions"
                            model="doorCondition" wire:key="doorCondition-question" :maxValue="2"
                            :value="$doorCondition" :baseValue="$doors" />

                        <livewire:image-question-v3 question="6.3 How many type of windows are installed?"
                            subtitle="Ilang uri ng bintana ang nakakabit?" :options="$windowTypeOptions" model="windowType"
                            :counts="$windowType ?? []" wire:key="windowType-question" :maxValue="3" />

                        <livewire:image-question-v3 question="6.4 How many secured and anchored door/window frames?"
                            subtitle="Ilan ang matibay at maayos ang nakakabit ang mga frame ng bintana at pinto?"
                            :options="$doorwindowFrameOptions" model="doorwindowFrame" :counts="$doorwindowFrame ?? []"
                            wire:key="doorwindowFrame-question" :maxValue="2" />
                    @endif

                </div>
            @endif

            @if ($currentStep === 9)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Column and Beam System <i>(Sistema ng mga Haligi at Biga)</i></b>
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-4">How many columns are there? <i>(Ilang haligi
                                mayroon ang bahay?)</i></h3>
                        <div class="relative w-1/2">
                            <div class="relative">
                                <input type="number" wire:model.live='columns' min="1"
                                    class="peer text-gray-700 border-b border-gray-300 focus:outline-none w-full bg-transparent" />
                                <span
                                    class="absolute left-1/2 bottom-0 h-[2px] w-0 bg-primary transition-all duration-300 ease-out peer-focus:w-full peer-focus:left-0 peer-focus:h-[3px] rounded-full"></span>
                            </div>
                        </div>
                    </div>

                    @php
                        $columnShapeOptions = [
                            [
                                'value' => 'column-shape-proper',
                                'label' => 'Proper rectangular/square well-designed (Hugis parisukat o parihaba)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'column-shape-adequate',
                                'label' =>
                                    'Slightly irregular but adequate (Hindi regular ang hugid ngunit sapat ang disenyo)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'column-shape-mixed',
                                'label' => 'Mixed/unkown (Magkakaiba ang hugis)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'column-shape-undersized',
                                'label' => 'Poor cross-section / undersized (Maliit dimension para sa istruktura)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'column-shape-inadequate',
                                'label' => 'Inadequate columns (Hindi akmang mga haligi)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $columnMadeOptions = [
                            [
                                'value' => 'column-condition-secure',
                                'label' => 'Reinforced concrete (Kongkreto)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'column-condition-good',
                                'label' => 'Composite (Magkahalong materyales)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 33.33,
                            ],
                            [
                                'value' => 'column-condition-loose',
                                'label' => 'Steel only  (Metal o bakal)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 66.66,
                            ],
                            [
                                'value' => 'column-condition-poor',
                                'label' => 'Weak or damaged material (Mga materyales na may sira o mahina)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    @if ($columns)
                        <livewire:image-question-v2 question="7.1 What is the shape of the columns? "
                            subtitle="Ano ang hugis ng haligi?" :options="$columnShapeOptions" model="columnShape"
                            wire:key="columnShape-question" :maxValue="2" :value="$columnShape" :baseValue="$columns" />

                        <livewire:image-question-v2 question="7.2 What is the material of the columns? "
                            subtitle="Anong materyales ang ginagamit sa haligi?" :options="$columnMadeOptions" model="columnMade"
                            wire:key="columnMade-question" :maxValue="2" :value="$columnMade" :baseValue="$columns" />
                    @endif

                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-4">How many beams are there? <i>(Ilang biga
                                mayroon
                                ang bahay?)</i></h3>
                        <div class="relative w-1/2">
                            <div class="relative">
                                <input type="number" wire:model.live='beams' min="1"
                                    class="peer text-gray-700 border-b border-gray-300 focus:outline-none w-full bg-transparent" />
                                <span
                                    class="absolute left-1/2 bottom-0 h-[2px] w-0 bg-primary transition-all duration-300 ease-out peer-focus:w-full peer-focus:left-0 peer-focus:h-[3px] rounded-full"></span>
                            </div>
                        </div>
                    </div>

                    @php
                        $beamShapeOptions = [
                            [
                                'value' => 'beam-shape-proper',
                                'label' =>
                                    'T-beam or L-beam integrated with slab (T-beam or L-beam na konektado sa slab',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'beam-shape-reinforced',
                                'label' => 'Rectangular reinforced beam',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'beam-shape-short',
                                'label' => 'Short or undersized beam (Maikli o manipis ayon sa haba)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'beam-shape-irregular',
                                'label' => 'Irregular or non-standard beam (Hindi pantay ang pagkakagawa)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'beam-shape-distinct',
                                'label' => 'No distinct beam (Walang maayos na biga)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $beamMadeOptions = [
                            [
                                'value' => 'beam-condition-secure',
                                'label' => 'Reinforced concrete (Kongkreto)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'beam-condition-steel',
                                'label' => 'Steel beam (Bakal)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 33.33,
                            ],
                            [
                                'value' => 'beam-condition-wood',
                                'label' => 'Treated timber/ wood beam  (Kahoy)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 66.66,
                            ],
                            [
                                'value' => 'beam-condition-weak',
                                'label' => 'Weak materials (Mahinang materyales katulad ng kawayan)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    @if ($beams)
                        <livewire:image-question-v2 question="7.3 What is the shape of the beams? "
                            subtitle="Ano ang hugis ng biga?" :options="$beamShapeOptions" model="beamShape"
                            wire:key="beamShape-question" :maxValue="2" :value="$beamShape" :baseValue="$beams" />

                        <livewire:image-question-v2 question="7.4 What is the material of the beams? "
                            subtitle="Anong materyales ang ginagamit sa biga?" :options="$beamMadeOptions" model="beamMade"
                            wire:key="beamMade-question" :maxValue="2" :value="$beamMade" :baseValue="$beams" />
                    @endif

                    @php
                        $columnbeamConditionOptions = [
                            [
                                'value' => 'columnbeam-condition-no-defects',
                                'label' => 'No visible defects (Walang nakikitang depekto)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'columnbeam-condition-minor',
                                'label' => 'Minor hairline cracks (May maliliit na bitak)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'columnbeam-condition-moderate',
                                'label' =>
                                    'Moderate cracks / repairs (May katamtamang bitak at isinaayos na bitak) (1.5mm to 5mm)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'columnbeam-condition-major',
                                'label' =>
                                    'Major cracks / spalling (Malalaking bitak o may natuklap na bahagi ng kongkreto) (Greater than o mas Malaki pa sa sukat na 5mm)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'columnbeam-condition-severe',
                                'label' =>
                                    'Severe deterioration / compromised (Matinding pagkasira at hindi na matibay ang estruktura)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    <livewire:image-question-v3 question="7.5 How many columns/beams are in good condition?"
                        subtitle="Matibay at maayos bang nakakabit ang mga frame ng bintana at pinto?"
                        :options="$columnbeamConditionOptions" model="columnbeamCondition" wire:key="columnbeamCondition-question"
                        :counts="$columnbeamCondition ?? []" :maxValue="4" />
                </div>
            @endif

            @if ($currentStep === 10)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Building Shape & Plan Configuration <i>(Hugis ng Gusali at
                                    Plano)</i></b>
                        </p>
                    </div>

                    @php
                        $houseShapeOptions = [
                            [
                                'value' => 'house-shape-regular',
                                'label' => 'Regular rectangular/square (Parihaba/parisukat)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'house-shape-mostly-regular',
                                'label' =>
                                    'Mostly regular with small projections (Karamihan ay regular na may nakausling maliit na bahagi)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'house-shape-lt-projections',
                                'label' => 'L/T projections (Hugis L/T)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'house-shape-irregular',
                                'label' => 'Irregular plan with re-entrant corners',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'house-shape-highly-irregular',
                                'label' => 'Highly irregular complex',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $houseHeightOptions = [
                            [
                                'value' => 'house-height-2.4',
                                'label' => '2.4 - 3.0 m',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'house-height-3.1',
                                'label' => '3.1 - 4.7 m ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'house-height-4.8',
                                'label' => '4.8 - 6.0 m ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'house-height-6.1',
                                'label' => '6.1 - 7.1 m ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'house-height-7.2',
                                'label' => '≥ 7.2 m ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $houseRatioOptions = [
                            [
                                'value' => 'house-ratio-low',
                                'label' => 'Low-rise wide base (stable) (Mababa na may malapad na pundasyon)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'house-ratio-slightly',
                                'label' => 'Slightly tall but stable (Medyo mataas pero metatag)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'house-ratio-moderate',
                                'label' => 'Moderate slenderness (Katamtamang proprosyon ng taas at lapad ng bahay)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'house-ratio-tall',
                                'label' => 'Tall and narrow for a one-storey (Mataas at makitid)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'house-ratio-unbalanced',
                                'label' => 'Extremely unbalanced (Lubhang hindi balance)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    <livewire:image-question question="8.1 What is the shape of the house? "
                        subtitle="Ano ang hugis ng bahay?" :options="$houseShapeOptions" model="houseShape"
                        wire:key="houseShape-question" :maxValue="3" :value="$houseShape" />

                    <livewire:image-question question="8.2 How tall is your house?" subtitle="Gaano katas ang bahay?"
                        :options="$houseHeightOptions" model="houseHeight" wire:key="houseHeight-question" :maxValue="3"
                        :value="$houseHeight" />

                    <livewire:image-question question="8.3 What is the aspect ratio of the house (Height: Width)"
                        subtitle="Gaano katas ang bahay?Ano ang proporsyon ng sukat ng taas at lapad ng bahay?"
                        :options="$houseRatioOptions" model="houseRatio" wire:key="houseRatio-question" :maxValue="2"
                        :value="$houseRatio" />
                </div>
            @endif

            @if ($currentStep === 11)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Overhangs & Eaves <i>(Bulada o Nakausling Bahagi ng Bubong)</i></b>
                        </p>
                    </div>

                    @php
                        $overhangOptions = [
                            [
                                'value' => 'overhang-minimal',
                                'label' => 'Minimal (≤300 mm wood / (≤450 mm concrete) (Maiksi)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'overhang-moderate',
                                'label' => 'Moderate Length ( 450-500 mm) (Katamtamang haba)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'overhang-slightly',
                                'label' => 'Slightly long (510mm-600mm)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'overhang-long',
                                'label' => 'Long overhangs (610mm-1m) (Mahaba)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'overhang-very-long',
                                'label' => 'Very Long / Unsupported overhangs (>1m) (Sobrang haba) ',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $eavesOptions = [
                            [
                                'value' => 'eaves-resistant',
                                'label' =>
                                    'Well anchored, corrosion resistant (Maayos ang pagkakakabit, walang senyales ng pangangalawang/pagkasira)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'eaves-minor',
                                'label' =>
                                    'Good condition with minor corrosion (Maayos ang kondisyon, may kaunting senyales ng pangangalawang /pagkasira)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'eaves-moderate',
                                'label' =>
                                    'Moderate corrosion / some loose elements (May katamtamang senyales ng pangangalawang o pagkasira, lumuluwag na ang pagkakakabit)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'eaves-loose',
                                'label' => 'Loose / corroded fasteners (Maluwag/kinakalawang na ang mga turnilyo/pako)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'eaves-detached',
                                'label' =>
                                    'Detached or falling elements (HUmihiwalay/nahuhulog na ang ilang mga parte)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    <livewire:image-question question="9.1 How long is the roof overhang?"
                        subtitle="Gaano kahaba ang bolada o nakausling bahagi ng bubong?" :options="$overhangOptions"
                        model="overhang" wire:key="overhang-question" :maxValue="3" :value="$overhang" />

                    <livewire:image-question
                        question="9.2 What is the condition of the eaves and soffits of the house?"
                        subtitle="Ano ang kalagayan ng bolada o nakausli at ilalim na bahagi ng bubong?"
                        :options="$eavesOptions" model="eaves" wire:key="eaves-question" :maxValue="2"
                        :value="$eaves" />
                </div>
            @endif

            @if ($currentStep === 12)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">Rapid Visual
                            Screening (RVS)
                            Tool
                            for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque</h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">WIND
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Location / Environmental Exposure <i>(Lokasyon at Kondisyon ng
                                    Kapaligiran)</i></b>
                        </p>
                    </div>

                    @php
                        $houseNumberOptions = [
                            [
                                'value' => 'house-number-high',
                                'label' => 'High density (Many obstructions / sheltered) (Marami ang bilang ng bahay)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'house-number-medium',
                                'label' => 'Medium density (Katamtaman lamang ang bilang ng bahay)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'house-number-low',
                                'label' => 'Low density (some shelter) (Kaunti lamang ang bahay)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'house-number-sparse',
                                'label' => 'Sparse isolated (less shelter) (Kaunti lamang ang bahay)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'house-number-isolated',
                                'label' => 'Isolated house in open terrain (nakahiwalay na bahay sa kapatagan',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];

                        $houseLocationOptions = [
                            [
                                'value' => 'house-location-sheltered',
                                'label' =>
                                    'Sheltered inland, many obstructions (Panloobna lugar na hindi direktang tinatamaan ng hangin mula sa dagat)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 0,
                            ],
                            [
                                'value' => 'house-location-urban',
                                'label' => 'Urban area with surrounding buildings (Bayan na may mga gusali)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 25,
                            ],
                            [
                                'value' => 'house-location-mixed',
                                'label' => 'Mixed terrain / partial exposure',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 50,
                            ],
                            [
                                'value' => 'house-location-open',
                                'label' => 'Open terrain (Kapatagan)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 75,
                            ],
                            [
                                'value' => 'house-location-coastal',
                                'label' => 'Coastal (Baybayin/Tabing dagat)',
                                'image' => asset('images/unknown_building.png'),
                                'percentage' => 100,
                            ],
                        ];
                    @endphp

                    <livewire:image-question question="10.1 How would you describe the number of houses in your area?"
                        subtitle="Paano mo ilalarawan ang dami ng bahay sa inyong lugar?" :options="$houseNumberOptions"
                        model="houseNumber" wire:key="houseNumber-question" :maxValue="5" :value="$houseNumber" />

                    <livewire:image-question question="10.2 Where is the location of your house?"
                        subtitle="Saan matatagpuan ang inyong bahay?" :options="$houseLocationOptions" model="houseLocation"
                        wire:key="houseLocation-question" :maxValue="5" :value="$houseLocation" />
                </div>
            @endif

            @if ($currentStep === 13)
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 border-t-12 border-primary">
                        <h2 class="text-2xl font-bold text-primary">
                            Rapid Visual Screening (RVS)
                            Tool for Assessing Wind Vulnerability of One-Storey Concrete Houses in Boac, Marinduque
                        </h2>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <h2 class="text-lg font-bold text-white p-8 bg-primary">
                            WIND VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House)
                        </h2>
                        <p class="p-8">
                            <b>Please pin your house location on the map below.
                                <i>I-pin ang lokasyon ng iyong bahay sa mapa sa ibaba</i>
                            </b>
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="p-4">
                            <!-- MAP -->
                            <div wire:ignore id="pin-map" class="w-full h-[500px] rounded-lg shadow-md"
                                x-data="pinMapComponent(@this, {{ $latitude ?? 'null' }}, {{ $longitude ?? 'null' }})" x-init="initMap()"
                                x-on:refresh-map.window="refreshMap()"></div>

                            <!-- LOCATION DISPLAY -->
                            <div class="mt-4 text-sm text-gray-600 text-center">
                                @if ($latitude && $longitude)
                                    📍 <b>Selected Location:</b>
                                    {{ number_format($latitude, 5) }}, {{ number_format($longitude, 5) }}
                                @else
                                    No location selected yet.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($currentStep === 14)
                <div class="flex flex-col gap-4 bg-white rounded-xl shadow-md overflow-hidden pt-8 px-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-primary mb-2">Assessment Complete!</h2>
                        <p class="text-gray-600">Your security vulnerability score</p>
                    </div>

                    <div class="flex flex-col items-center justify-between gap-8 mb-12">
                        <div class="relative w-54 h-54">
                            @php
                                [$strokeColor, $textColorClass] = match ($riskLevel) {
                                    'Very High' => ['#dc2626', 'text-red-600'],
                                    'High' => ['#f97316', 'text-orange-500'],
                                    'Medium' => ['#eab308', 'text-yellow-500'],
                                    'Low' => ['#22c55e', 'text-green-500'],
                                    'Very Low' => ['#3b82f6', 'text-blue-500'],
                                    default => ['#6b7280', 'text-gray-500'],
                                };
                            @endphp

                            <svg class="progress-circle w-full h-full" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="45" fill="none" stroke="#e5e7eb"
                                    stroke-width="6" />
                                <circle cx="50" cy="50" r="45" fill="none"
                                    stroke="{{ $strokeColor }}" stroke-width="6" stroke-dasharray="283"
                                    stroke-dashoffset="{{ 283 - (283 * ($riskScore ?? 0)) / 100 }}"
                                    stroke-linecap="round" transform="rotate(180 50 50)" />
                            </svg>


                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-3xl font-bold mb-2 {{ $textColorClass }}" id="score-percentage">
                                    {{ $riskLevel }}
                                </span>
                                <span class="text-gray-500">{{ number_format($riskScore, 2) ?? 0 }}%</span>
                            </div>
                        </div>

                        {{-- Vulnerability Bar --}}

                        <!-- Segmented vulnerability bar (10 sections) -->
                        <div class="w-full mb-6">
                            <div
                                class="w-full bg-gray-200 rounded-md h-8 flex relative overflow-hidden border-2 border-gray-300">
                                @foreach ($sectionBars as $seg)
                                    <div style="flex: {{ $seg['weight'] }}; position: relative; min-width:0;">
                                        <!-- filled portion -->
                                        <div class="h-full relative">
                                            <div class="absolute left-0 top-0 bottom-0 flex items-stretch w-full">
                                                <div style="width: {{ $seg['fillPercent'] }}%;" class="h-full">
                                                    {{-- Use inline background-color hex if provided, otherwise fallback to Tailwind class --}}
                                                    @if (!empty($seg['fillColorHex']))
                                                        <div class="h-full transition-all duration-500"
                                                            style="background-color: {{ $seg['fillColorHex'] }};">
                                                        </div>
                                                    @else
                                                        <div
                                                            class="h-full {{ $seg['strokeColor'] }} transition-all duration-500">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex-1"></div>
                                            </div>
                                        </div>

                                        <!-- 2px divider on the right between segments -->
                                        @if (!$loop->last)
                                            <div class="absolute right-0 top-0 bottom-0 z-30 pointer-events-none"
                                                style="border-right:2px solid rgba(34, 34, 34, 0.95);"></div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <!-- Per-segment contribution labels -->
                            <div class="mt-2 flex w-full text-xs text-gray-600">
                                @foreach ($sectionBars as $seg)
                                    <div style="flex: {{ $seg['weight'] }}; text-align: center; min-width:0;">
                                        <div class="{{ $seg['textColor'] }}">{{ $seg['overallPercent'] }}%</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex-1 text-left">
                            <h3 class="text-xl font-semibold text-primary mb-4 text-center">Vulnerability Rating
                            </h3>
                            <div class="mb-4">
                                <h4 class="font-medium text-primary mb-2">Key Vulnerabilities:</h4>
                                @if (!empty($vulnerabilities))
                                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                                        @foreach ($vulnerabilities as $v)
                                            <li>{{ $v }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-gray-600">No specific vulnerabilities identified based on your
                                        answers.</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <h4 class="font-medium text-primary mb-2">Remarks:</h4>
                                @if ($allClear)
                                    <p class="text-gray-700">{{ $remarksMessage }}</p>
                                @elseif(!empty($recommendations))
                                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                                        @foreach ($recommendations as $r)
                                            <li>{{ $r }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-gray-600">No specific remarks available. Review assessment
                                        details for guidance.</p>
                                @endif
                            </div>

                            <div class="mt-10">
                                <p class="text-gray-700 text-sm">Thank you for taking the time to participate in
                                    our
                                    study.
                                    Your responses will
                                    greatly contribute to our research on assessing wind-induced structural
                                    vulnerability of one-storey concrete houses in Marinduque. (Maraming salamat
                                    sa paglalaan ng oras upang lumahok sa aming pag-aaral. Malaki ang
                                    maitutulong ng iyong mga sagot sa aming pananaliksik hinggil sa pagtatasa ng
                                    kahinaan ng mga isang-palapag na konkretong bahay laban sa malalakas na
                                    hangin sa Marinduque.)</p>
                            </div>

                            {{-- <div class="mt-6">
                                <h3 class="font-medium text-primary mb-2">
                                    Any Additional Recommendations?
                                </h3>
                                <p class="text-gray-600 mb-4 text-sm">
                                    Please share any suggestions or mitigation strategies that may help improve the
                                    assessment.
                                </p>

                                <textarea id="additional-recommendations" rows="5"
                                    class="w-full resize-none px-3 py-2 text-gray-700 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                                    placeholder="E.g., Make the interface more user-friendly, add visual progress indicators, include more sample images, or improve loading speed..."></textarea>
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endif

            @if ($currentStep > $totalSteps)
                <div class="rounded-xl shadow-md w-full overflow-hidden pb-8 bg-white">
                    <div class="bg-primary p-6">
                        <h1 class="text-2xl font-bold text-white">Detailed Wind Vulnerability Report</h1>
                        <p class="text-gray-200 mt-1">Structural Assessment</p>
                    </div>

                    @php
                        $color = [
                            'Very High' => ['bg-red-600/15', 'text-red-600'],
                            'High' => ['bg-orange-500/15', 'text-orange-500'],
                            'Medium' => ['bg-yellow-500/15', 'text-yellow-500'],
                            'Low' => ['bg-green-500/15', 'text-green-500'],
                            'Very Low' => ['bg-blue-500/15', 'text-blue-500'],
                        ];
                    @endphp
                    <!-- Content -->
                    <div class="p-6 md:p-8 space-y-14">
                        <div class="capture-section space-y-6" id="section-1">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">1. Roof Type & Condition (Uri at
                                    Kondisyon ng
                                    Bubong)</h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 20%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $roofMax = 5 + 6 + 5 + 4; // roofMade + roofType + roofAnchor + roofCondition
                                        $roofSum =
                                            ($selectedOptions['roofMade'] ?? 0) +
                                            ($selectedOptions['roofType'] ?? 0) +
                                            ($selectedOptions['roofAnchor'] ?? 0) +
                                            ($selectedOptions['roofCondition'] ?? 0);
                                        $roofFill = $roofMax > 0 ? ($roofSum / $roofMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $roofFill }}%;">
                                        <span class="text-xs text-white mr-2">
                                            {{ round($roofSum, 2) }}%
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                <!-- 1.1 -->
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">1.1 What is the roof made of?
                                        (Saan gawa
                                        ang Bubong?)</p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['roofMade'] ?? 0) / 5) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['roofMade'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- 1.2 -->
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">1.2 What Type of roof does the
                                        house have?
                                        (Ano ang uri ng bubong ng bahay?)</p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['roofType'] ?? 0) / 6) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['roofType'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- 1.3 -->
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">1.3 How is the roof anchored
                                        to the
                                        structure?
                                        (Paano nakakabit ang bubong sa istruktura?)</p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['roofAnchor'] ?? 0) / 5) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['roofAnchor'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- 1.4 -->
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">1.4 What is the current
                                        condition of the
                                        roof?
                                        (Ano ang kasalukuyang kondisyon ng bubong?)</p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['roofCondition'] ?? 0) / 4) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['roofCondition'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="capture-section space-y-6" id="section-2">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">2. Roof-Truss (Trases)</h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 10%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>
                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $trussMax = 4 + 6; // trussMaterial + trussCondition
                                        $trussSum =
                                            ($selectedOptions['trussMaterial'] ?? 0) +
                                            ($selectedOptions['trussCondition'] ?? 0);
                                        $trussFill = $trussMax > 0 ? ($trussSum / $trussMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $trussFill }}%;">
                                        <span class="text-xs text-white mr-1">{{ round($trussSum, 2) }}%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                {{-- 2.1 remains as N/A control if used --}}
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">2.1 Are there roof trusses
                                        present? (May
                                        trases ba na ginamit sa bubong ng bahay?)</p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg w-[0%]">
                                            <span class="absolute text-xs -right-0 top-3.5 text-gray-500">N/A</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">2.2 Truss Material</p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['trussMaterial'] ?? 0) / 4) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['trussMaterial'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">2.3 What is the condition of
                                        the truss
                                        connection and bracing? (Ano ang kalagayan ng mga dugtungan at brace ng
                                        trases?)
                                    </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['trussCondition'] ?? 0) / 6) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['trussCondition'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="capture-section space-y-6" id="section-3">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">3. Roof – to – Wall Connection
                                    (Koneksyon ng
                                    Bubong
                                    at Pader)</h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 8%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $rwcMax = 4 + 4; // roofWallConnection + roofWallQuality
                                        $rwcSum =
                                            ($selectedOptions['roofWallConnection'] ?? 0) +
                                            ($selectedOptions['roofWallQuality'] ?? 0);
                                        $rwcFill = $rwcMax > 0 ? ($rwcSum / $rwcMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $rwcFill }}%;">
                                        <span class="text-xs text-white mr-1">{{ round($rwcSum, 2) }}%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">3.1 Are there proper
                                        roof-towall
                                        connections
                                        (ties/anchors)? (Mayroon bang wastong ties o anchor bolts sa bubong at
                                        pader?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['roofWallConnection'] ?? 0) / 4) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['roofWallConnection'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">3.2 What is the quality of the
                                        roof-to-wall
                                        fasteners (nails, screws, bolts)? (Ano ang kalidad ng mga fasteners
                                        (pako, turnilyo
                                        at
                                        bolts)?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['roofWallQuality'] ?? 0) / 4) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['roofWallQuality'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="capture-section space-y-6" id="section-4">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">4. Wall Type and Integrity (Uri at
                                    Integridad ng
                                    Pader) </h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 10%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $wallsMax = 7 + 3; // wallType + wallCondition
                                        $wallsSum =
                                            ($selectedOptions['wallType'] ?? 0) +
                                            ($selectedOptions['wallCondition'] ?? 0);
                                        $wallsFill = $wallsMax > 0 ? ($wallsSum / $wallsMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $wallsFill }}%;">
                                        <span class="text-xs text-white mr-1">{{ round($wallsSum, 2) }}%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">4.1 What type of material are
                                        the walls
                                        made of? (Anong materyales ang ginamit sa pader?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['wallType'] ?? 0) / 7) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['wallType'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">4.2 What is the condition of
                                        the walls?
                                        (Ano
                                        ang kondisyon ng pader?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['wallCondition'] ?? 0) / 3) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['wallCondition'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="capture-section space-y-6" id="section-5">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">5. Wall-to-Foundation Connection
                                    (Koneksyon ng
                                    Pader
                                    sa Pundasyon) </h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 7%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $tiltMax = 7; // signsTilt
                                        $tiltSum = $selectedOptions['signsTilt'] ?? 0;
                                        $tiltFill = $tiltMax > 0 ? ($tiltSum / $tiltMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $tiltFill }}%;">
                                        <span class="text-xs text-white mr-1">{{ round($tiltSum, 2) }}%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">5.1 Are there signs of
                                        settlement or tilt?
                                        (Mayroon bang sensyales ng paglubog ng lupa o pagtagilid ng pader?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['signsTilt'] ?? 0) / 7) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['signsTilt'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="capture-section space-y-6" id="section-6">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">6. Openings - Windows and Doors (Mga
                                    Bintana at
                                    Pinto) </h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 10%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $openMax = 3 + 2 + 3 + 2;
                                        $openSum =
                                            ($selectedOptions['doorType'] ?? 0) +
                                            ($selectedOptions['doorCondition'] ?? 0) +
                                            ($selectedOptions['windowType'] ?? 0) +
                                            ($selectedOptions['doorwindowFrame'] ?? 0);
                                        $openFill = $openMax > 0 ? ($openSum / $openMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $openFill }}%;">
                                        <span class="text-xs text-white mr-1">{{ round($openSum, 2) }}%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">6.1 What type of doors does
                                        the building
                                        have?
                                        (Ano ang uri ng pinto ang mayroon sa gusali?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['doorType'] ?? 0) / 3) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['doorType'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">6.2 Do the doors swing/slide
                                        properly and
                                        is
                                        it well sealed? (Maayos bang bumubukas/sumasara ang pinto at seyado ba
                                        ito?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['doorCondition'] ?? 0) / 2) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['doorCondition'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">6.3 What type of windows are
                                        installed?
                                        (Anong
                                        uri ng bintana ang nakakabit?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['windowType'] ?? 0) / 3) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['windowType'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">6.4 How secure and anchored
                                        are the
                                        door/window frames? (Matibay at maayos bang nakakabit ang mga frame ng
                                        bintana at
                                        pinto?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['doorwindowFrame'] ?? 0) / 2) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['doorwindowFrame'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="capture-section space-y-6" id="section-7">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">7. Column and Beam System (Sistema
                                    ng mga Haligi
                                    at Biga) </h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 12%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $colMax = 2 + 2 + 2 + 2 + 4;
                                        $colSum =
                                            ($selectedOptions['columnShape'] ?? 0) +
                                            ($selectedOptions['columnMade'] ?? 0) +
                                            ($selectedOptions['beamShape'] ?? 0) +
                                            ($selectedOptions['beamMade'] ?? 0) +
                                            ($selectedOptions['columnbeamCondition'] ?? 0);
                                        $colFill = $colMax > 0 ? ($colSum / $colMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $colFill }}%;">
                                        <span class="text-xs text-white mr-1">{{ $colSum }}%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">7.1 What is the shape of the
                                        columns? (Ano
                                        ang
                                        hugis ng haligi?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['columnShape'] ?? 0) / 2) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['columnShape'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">7.2 What is the material of
                                        the columns?
                                        (Anong materyales ang ginagamit sa haligi?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['columnMade'] ?? 0) / 3) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['columnMade'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">7.3 What is the shape of the
                                        beams? (Ano
                                        ang
                                        hugis ng biga?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['beamShape'] ?? 0) / 2) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['beamShape'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">7.4 What is the material of
                                        the beams?
                                        (Anong
                                        materyales ang ginagamit sa biga?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['beamMade'] ?? 0) / 3) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['beamMade'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">7.5 What is the current
                                        condition of the
                                        coumn/beams? (Ano ang kondisyon ng haligi at beam?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div
                                            class="bg-accent/80 h-3 rounded-lg w-[{{ (($selectedOptions['columnbeamCondition'] ?? 0) / 6) * 100 }}%]">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['columnbeamCondition'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="capture-section space-y-6" id="section-8">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">8. Building Shape & Plan
                                    Configuration (Hugis ng
                                    Gusali at Plano) </h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 8%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $geomMax = 3 + 3 + 2;
                                        $geomSum =
                                            ($selectedOptions['houseShape'] ?? 0) +
                                            ($selectedOptions['houseHeight'] ?? 0) +
                                            ($selectedOptions['houseRatio'] ?? 0);
                                        $geomFill = $geomMax > 0 ? ($geomSum / $geomMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $geomFill }}%;">
                                        <span class="text-xs text-white mr-1">{{ round($geomSum, 2) }}%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">8.1 What is the shape of the
                                        house? (Ano
                                        ang hugis ng bahay?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg relative"
                                            style="width: {{ (($selectedOptions['houseShape'] ?? 0) / 3) * 100 }}%;">
                                            <span class="absolute text-xs -right-0 top-3.5 text-gray-500">
                                                {{ round($selectedOptions['houseShape'], 2) ?? 0 }}%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">8.2 How tall is your house?
                                        (Gaano katas
                                        ang
                                        bahay?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['houseHeight'] ?? 0) / 3) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['houseHeight'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">8.3 What is the aspect ratio
                                        of the house
                                        (Height: Width) (Ano ang proporsyon ng sukat ng taas at lapad ng bahay?)
                                    </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['houseRatio'] ?? 0) / 2) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['houseRatio'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="capture-section space-y-6" id="section-9">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">9. Overhangs & Eaves (Bulada o
                                    Nakausling Bahagi
                                    ng Bubong)</h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 5%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $overMax = 3 + 2; // overhang + eaves
                                        $overSum =
                                            ($selectedOptions['overhang'] ?? 0) + ($selectedOptions['eaves'] ?? 0);
                                        $overFill = $overMax > 0 ? ($overSum / $overMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $overFill }}%;">
                                        <span class="text-xs text-white mr-1">{{ round($overSum, 2) }}%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">9.1 How long is the roof
                                        overhang? (Gaano
                                        kahaba ang bolada o nakausling bahagi ng bubong?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['overhang'] ?? 0) / 3) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['overhang'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">9.2 What is the condition of
                                        the eaves and
                                        soffits of the house? (Ano ang kalagayan ng bolada o nakausli at ilalim
                                        na bahagi ng
                                        bubong?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['eaves'] ?? 0) / 2) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['eaves'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="capture-section space-y-6" id="section-10">
                            <div class="border-l-4 border-accent pl-4">
                                <h2 class="text-lg font-bold text-primary">10. Location / Environmental
                                    Exposure (Lokasyon
                                    at
                                    Kondisyon ng Kapaligiran) </h2>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Total Vulnerability Score: 10%</span>
                                    <span
                                        class="text-xs bg-yellow-500/15 text-yellow-500 px-2 py-1 rounded-full">Medium
                                        Risk</span>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="pb-2">
                                <div class="w-full bg-gray-200 h-4 rounded-lg">
                                    @php
                                        $locMax = 5 + 5; // houseNumber + houseLocation
                                        $locSum =
                                            ($selectedOptions['houseNumber'] ?? 0) +
                                            ($selectedOptions['houseLocation'] ?? 0);
                                        $locFill = $locMax > 0 ? ($locSum / $locMax) * 100 : 0;
                                    @endphp
                                    <div class="bg-accent h-4 rounded-lg flex items-center justify-end"
                                        style="width: {{ $locFill }}%;">
                                        <span class="text-xs text-white mr-1">{{ round($locSum, 2) }}%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sub-questions -->
                            <div class="pl-6 space-y-5 border-l-2 border-gray-100">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">10.1 How would you describe
                                        the number of
                                        houses in your area? (Paano mo ilalarawan ang dami ng bahay sa inyong
                                        lugar/) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width: {{ (($selectedOptions['houseNumber'] ?? 0) / 3) * 100 }}%;">
                                            <span
                                                class="absolute text-xs -right-0 top-3.5 text-gray-500">{{ round($selectedOptions['houseNumber'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700 font-medium">10.2 Where is the location of
                                        your house?
                                        (Saan matatagpuan ang inyong bahay?) </p>
                                    <div class="w-full bg-gray-200 h-3 rounded-lg relative">
                                        <div class="bg-accent/80 h-3 rounded-lg"
                                            style="width:
                                            {{ (($selectedOptions['houseLocation'] ?? 0) / 3) * 100 }}%;">
                                            <span
                                                class="absolute
                                            text-xs -right-0 top-3.5 text-gray-500">
                                                {{ round($selectedOptions['houseLocation'], 2) ?? 0 }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div id="clone-container" style="position: fixed; left: -9999px; top: 0;"></div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-8">
                @if ($currentStep > 1 && $currentStep < $totalSteps)
                    <button type="button" wire:click="prevStep"
                        class="cursor-pointer flex items-center px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        <x-feathericon-chevron-left class="inline" /> Back
                    </button>
                @endif

                @if ($currentStep < $totalSteps)
                    <button type="button" id="next-btn" wire:click="nextStep"
                        class="cursor-pointer flex items-center ml-auto px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                        {{ $currentStep !== $totalSteps - 1 ? 'Next' : 'Submit' }}<x-feathericon-chevron-right
                            class="inline" />
                    </button>
                @endif

                @if ($currentStep === $totalSteps)
                    <div class="flex items-center justify-end w-full">
                        <button wire:click="nextStep" type="button"
                            class="cursor-pointer px-6 py-2 bg-primary text-white rounded-lg">
                            View Result</button>
                    </div>
                @endif

                @if ($currentStep > $totalSteps)
                    <div class="flex items-center justify-end w-full">
                        <button type="button" class="cursor-pointer px-6 py-2 bg-primary text-white rounded-lg">
                            Download</button>
                    </div>
                @endif
            </div>
        </div>
        {{-- <pre class="mt-20 bg-gray-50 p-3 rounded text-xs">
    {{ json_encode($selectedOptions, JSON_PRETTY_PRINT) }}
</pre> --}}
    </div>
</div>

<script src="https://unpkg.com/dom-to-image-more@2.8.0/dist/dom-to-image-more.min.js"></script>
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('show-loading-overlay', () => {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) {
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
                console.log("🟩 Overlay shown before save");
            }
        });

        Livewire.on('triggerSaveAllSectionsToServer', async () => {
            console.log("🟦 Capture trigger received");

            try {
                await saveAllSectionsToServer(@this);
                console.log("✅ Save completed successfully");
            } catch (error) {
                console.error("❌ Error during saveAllSectionsToServer:", error);
            } finally {
                const overlay = document.getElementById('loading-overlay');
                if (overlay) {
                    overlay.classList.add('hidden');
                    overlay.classList.remove('flex');
                    console.log("🟪 Overlay hidden after save");
                }
            }
        });
    });


    async function saveAllSectionsToServer($wire) {
        console.log('🟩 Saving images...');
        await document.fonts.ready;
        await new Promise(r => setTimeout(r, 500)); // let Livewire render fully

        const sections = document.querySelectorAll('.capture-section');
        const cloneContainer = document.getElementById('clone-container');
        const images = [];

        for (let i = 0; i < sections.length; i++) {
            const node = sections[i];
            const clone = node.cloneNode(true);

            // Keep consistent A4 look
            clone.style.fontFamily = "'Poppins', sans-serif";
            clone.style.width = "794px";

            // Force font in clone
            const style = document.createElement("style");
            style.textContent = `
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
                * { font-family: 'Poppins', sans-serif !important; }
            `;
            clone.prepend(style);

            // replace clone container contents
            cloneContainer.innerHTML = '';
            cloneContainer.appendChild(clone);

            try {
                const dataUrl = await domtoimage.toPng(clone, {
                    quality: 1,
                    scale: 2,
                    cacheBust: true,
                    useCORS: true,
                });

                console.log(`✅ Captured section ${i + 1}, length: ${dataUrl.length}`);
                images.push({
                    filename: `assessment_section_${i + 1}.png`,
                    data: dataUrl,
                });

                // give dom-to-image time to clean up
                await new Promise(r => setTimeout(r, 300));
            } catch (error) {
                console.error('❌ Error capturing image for section', i + 1, error);
            }
        }

        if (images.length === 0) {
            console.error("❌ No images captured!");
            return;
        }

        console.log('✅ Sending images to Livewire:', images.length);
        await $wire.saveImagesToStorage(images);
        console.log('✅ All images sent to server');
    }
</script>


<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('scroll-to-top', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>

@push('scripts')
    <script>
        // Global map component factory so x-data can reference it even when step 13 is mounted later
        function pinMapComponent(livewire, existingLat, existingLng) {
            return {
                map: null,
                marker: null,
                boundsLayer: null,

                initMap() {
                    this.$nextTick(() => {
                        const container = document.getElementById('pin-map');
                        if (!container) return;

                        if (this.map) {
                            this.refreshMap();
                            return;
                        }

                        const defaultCenter = [13.4513, 121.8397];
                        const startCoords = (existingLat && existingLng) ? [existingLat, existingLng] :
                            defaultCenter;

                        this.map = L.map(container, {
                            center: startCoords,
                            zoom: 13,
                            zoomSnap: 0.1,
                            zoomDelta: 0.5
                        });

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; OpenStreetMap contributors'
                        }).addTo(this.map);

                        const customIcon = L.icon({
                            iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                            iconSize: [35, 35],
                            iconAnchor: [17, 34],
                            popupAnchor: [0, -30],
                        });

                        const boacBounds = [
                            [13.3800, 121.7900],
                            [13.4900, 121.9300]
                        ];

                        this.boundsLayer = L.rectangle(boacBounds, {
                            color: "#00BFFF",
                            weight: 2,
                            fillColor: "#ADD8E6",
                            fillOpacity: 0.15
                        }).addTo(this.map);

                        if (!existingLat || !existingLng) {
                            this.map.fitBounds(boacBounds, {
                                padding: [20, 20]
                            });
                        }

                        if (existingLat && existingLng) {
                            this.marker = L.marker(startCoords, {
                                    icon: customIcon,
                                    interactive: false
                                })
                                .addTo(this.map)
                                .bindPopup('Your selected location');
                        }

                        this.map.on('click', e => {
                            const {
                                lat,
                                lng
                            } = e.latlng;
                            const inside = lat >= boacBounds[0][0] && lat <= boacBounds[1][0] && lng >=
                                boacBounds[0][1] && lng <= boacBounds[1][1];
                            if (!inside) {
                                alert('Please select a location within Boac, Marinduque.');
                                return;
                            }
                            if (this.marker) this.map.removeLayer(this.marker);
                            this.marker = L.marker([lat, lng], {
                                    icon: customIcon,
                                    interactive: false
                                })
                                .addTo(this.map)
                                .bindPopup('Your selected location')
                                .openPopup();
                            livewire.set('latitude', lat);
                            livewire.set('longitude', lng);
                        });

                        this.map.on('zoom', () => {
                            if (this.marker) {
                                const latlng = this.marker.getLatLng();
                                this.marker.setLatLng(latlng);
                            }
                        });

                        setTimeout(() => this.refreshMap(), 400);
                    });
                },

                refreshMap() {
                    if (!this.map) return;
                    const center = this.map.getCenter();
                    this.map.invalidateSize();
                    this.map.panTo(center, {
                        animate: false
                    });
                }
            }
        }

        // When Livewire updates the DOM, try to initialize the map if the container is present.
        document.addEventListener('livewire:load', function() {
            function tryInitMap() {
                const container = document.getElementById('pin-map');
                if (!container) return false;

                // If Alpine has already initialized, call its initMap
                if (container.__x && container.__x.$data && typeof container.__x.$data.initMap === 'function') {
                    try {
                        container.__x.$data.initMap();
                    } catch (e) {
                        /* ignore */
                    }
                    return true;
                }

                return false;
            }

            // Try to init right away (covers page loads where step 13 is first)
            tryInitMap();

            // After any Livewire DOM update, retry a few times to handle transitions and Alpine mount timing
            Livewire.hook('afterDomUpdate', () => {
                let attempts = 0;
                const interval = setInterval(() => {
                    attempts++;
                    if (tryInitMap() || attempts > 6) clearInterval(interval);
                }, 250);
            });
        });
    </script>
@endpush
