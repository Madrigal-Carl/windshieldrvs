<div class="bg-gray-50 w-full">
    <!-- Navigation -->
    <a href="/" class="cursor-pointer w-14 h-14 absolute top-3 md:left-3 flex items-center justify-center">
        <x-feathericon-arrow-left class="w-8 h-8 text-primary" />
    </a>

    <div class="container mx-auto px-4 py-12 max-w-3xl">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex justify-between mb-2 mt-8 md:mt-2">
                <span class="text-primary font-medium">Progress</span>
                <span class="text-primary font-medium">{{ $currentStep }}/{{ $totalSteps }}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div class="h-2.5 rounded-full transition-all duration-500 {{ $currentStep != $totalSteps ? 'bg-primary' : 'bg-accent' }}"
                    style="width: {{ ($currentStep / $totalSteps) * 100 }}%"></div>
            </div>
        </div>

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
                            The purpose of this study is to create a simple, practical, and standards-based tool that
                            can
                            help identify the level of wind vulnerability of residential houses, particularly in areas
                            exposed to typhoons. This tool follows the guidelines set by <b>FEMA P-2062</b>, the
                            <b>National
                                Structural Code of the Philippines (NSCP)</b>, and the <b>National Building Code
                                (NBC)</b>,
                            adapted to the local context of Marinduque.
                        </p>
                        <p>
                            Through this form, we respectfully invite you to take part in the assessment process. You
                            will
                            be asked to provide information about the structural condition of your house (such as roof,
                            walls, foundation, openings, and other features). Each section contains simple questions in
                            both
                            English and Filipino to make it easier to understand. Your responses will be scored based on
                            vulnerability levels ranging from <b>Very Low Risk (Mababa ang Panganib) to Very High Risk
                                (Mataas ang Panganib).</b>
                        </p>
                        <p>
                            By participating in this study, you will play an important role in testing and refining the
                            <b>Rapid Visual Screening (RVS) tool</b> to ensure its accuracy and usefulness. Your
                            involvement
                            will also contribute to the broader efforts of disaster preparedness and resilience in Boac,
                            Marinduque, by providing valuable information that can guide risk reduction strategies. In
                            addition, your participation will support initiatives that aim to develop safer housing
                            designs
                            and preventive measures against wind hazards, ultimately helping to protect communities from
                            the
                            destructive impacts of typhoons.
                        </p>
                        <p>
                            Your participation in this study is entirely voluntary. You may choose to participate or
                            not,
                            and your decision will be respected without any consequence. All information gathered will
                            be
                            treated with the highest level of confidentiality, in compliance with <b>Republic Act No.
                                10173
                                (Data Privacy Act of 2012).</b> The results will only be used for academic purposes and
                            disaster risk reduction planning.
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
                    </div>

                    <div class="mb-8 border-t border-gray-200 pt-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox" wire:model.live='isAccepted'
                                    class="w-4 h-4 rounded-full border border-gray-300 bg-gray-50 focus:ring-3 focus:ring-accent text-accent"
                                    required>
                            </div>
                            <label for="terms" class="ml-2 text-sm font-medium text-gray-700 text-justify">
                                I have read and understood the information above and agree to participate in this study.
                                (Nabasa at naunawaan ko ang impormasyong nasa itaas at ako ay sumasang-ayon na lumahok
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
                            ],
                            [
                                'value' => 'monoslope',
                                'label' => 'Monoslope',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'gable',
                                'label' => 'Gable (dos aguas)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'irregular',
                                'label' => 'Irregular / complex',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'unknown',
                                'label' => 'Unknown framing',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $roofMadeOptions = [
                            [
                                'value' => 'concrete-slab',
                                'label' => 'Concrete slab',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'concrete-tiles',
                                'label' => 'Concrete tiles / heavy tile',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'metal-sheets',
                                'label' => 'Metal sheets with good overlap (yero)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'old-metal',
                                'label' => 'Corrugated thin metal / old metal (lumang yero)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'nipa',
                                'label' => 'Light thatch / nipa or severely degraded material (nipa o pawid)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $roofAnchorOptions = [
                            [
                                'value' => 'proper-bolted',
                                'label' => 'Proper bolted / welded anchors & straps (Maayos at matatag ang pagkakabit)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'embedded-anchors',
                                'label' =>
                                    'Embedded anchors / mechanical anchors in good condition (Maganda ang kalagayan ng pagkakabit)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'some-achors',
                                'label' =>
                                    'Some anchors present but partially corroded (May presensya ng mga anchor ngunit bahagyang kinakalawang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'mostly-nails',
                                'label' =>
                                    'Mostly nails only / weak fasteners (Pako lang ang ginamit/Mahina ang ginamit na pangkabit)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'no-anchor',
                                'label' => 'No anchorage (Walang maayos na pagkakabit)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $roofWallOptions = [
                            [
                                'value' => 'continuous-tied',
                                'label' =>
                                    'Continuous tied load path, straps present (Kumpleto at matibay ang koneksyon at mayroong bracing)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'good-connections',
                                'label' =>
                                    'Good connections, minor deficiencies (Maganda ang koneksyon ngunit mayroong konting mga pagkukulang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'partial-ties',
                                'label' =>
                                    'Partial ties, some missing fasteners (Bahagya lang ang koneksyon at mayroong pagkukulang sa mga fastener)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'weak-joints',
                                'label' =>
                                    'Weak joints, visible gaps (Mahina ang dugtungan at may nakikitang mga puwang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'no-connection',
                                'label' => 'No connection / visibly detached (Walang koneksyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $roofConditionOptions = [
                            [
                                'value' => 'no-corrosion',
                                'label' => 'New / no corrosion (Bago/walang kalawang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'minor-corrosion',
                                'label' =>
                                    'Minor corrosion / with some repairs (Maliit na kalawang/may ilang pag-aayos)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'some-loose-panels',
                                'label' =>
                                    'Some loose panels / patches (May ilang luma at maluluwang na panel/may tinagpiang mga panel)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'many-loose-panels',
                                'label' =>
                                    'Many loose panels / lots of corrosion (Maraming maluluwang na panel/lubhang kinakalawang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'with-holes',
                                'label' => 'With holes / large gaps (Butas-butas/malalaking mga puwang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                    @endphp
                    <livewire:image-question question="1.1 What type of roof does the house have?"
                        subtitle="Ano ang uri ng bubong ng bahay?" :options="$roofTypeOptions" model="roofType"
                        wire:key="roofType-question" />

                    <livewire:image-question question="1.2  What is the roof made of?" subtitle="Saan gawa ang bubong?"
                        :options="$roofMadeOptions" model="roofMade" wire:key="roofMade-question" />

                    <livewire:image-question question="1.3  How is the roof anchored to the structure?"
                        subtitle="Paano nakakabit ang bubong sa istruktura?" :options="$roofAnchorOptions" model="roofAnchor"
                        wire:key="roofAnchor-question" />

                    <livewire:image-question question="1.4   How secure is the roof-to-wall connection?"
                        subtitle="Gaano katibay ang koneksyon ng bubong sa pader?" :options="$roofWallOptions" model="roofWall"
                        wire:key="roofWall-question" />

                    <livewire:image-question question="1.5  What is the current condition of the roof?"
                        subtitle="Ano ang kasalukuyang kondisyon ng bubong?" :options="$roofConditionOptions" model="roofCondition"
                        wire:key="roofCondition-question" />
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
                        <p class="p-8"><b>Roof-to-Wall Connection <i>(Koneksyon ng Bubong at Pader)</i></b></p>
                    </div>

                    @php
                        $roofWallConnectionOptions = [
                            [
                                'value' => 'hurricane-ties',
                                'label' =>
                                    'Hurricane ties / anchor bolts everywhere (Kumpleto at matibay ang koneksyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'mostly-present',
                                'label' => 'Mostly present & correct (Mayroong ties at tama ang pagkakakabit)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'partial-coverage',
                                'label' => 'Partial coverage (Bahagya lang ang sakop ng koneksyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'rarely-present',
                                'label' => 'Rarely present (Madalang ang maayos na koneksyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'absent',
                                'label' => 'Absent (Walang maayos na koneksyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $roofWallFastenerOptions = [
                            [
                                'value' => 'high-quality',
                                'label' =>
                                    'High quality, adequate spacing, corrosion protected (Mataas ang kalidad, may tamang pagitan, walang kalawang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'good-quality',
                                'label' => 'Good quality, minor corrosion (Maganda ang kalidad, may konting kalawan',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'moderate-quality',
                                'label' =>
                                    'Moderate (mixed fasteners) (Pangkaraniwang kalidad, magkahalo ang ginamit na fastener)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'low-quality',
                                'label' =>
                                    'Low quality (nails only, some missing) (Mababa ang kalidad at marami ang kulang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'very-poor',
                                'label' =>
                                    'Very poor or missing fasteners (Sobrang baba ng kalidad, halos walang mga fastener)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                    @endphp
                    <livewire:image-question
                        question="2.1 Are there proper roof-to-wall connections (ties/anchor bolts)?"
                        subtitle="Mayroon bang wastong ties o anchor bolts sa bubong at pader?" :options="$roofWallConnectionOptions"
                        model="roofWallConnection" wire:key="roofWallConnection-question" />

                    <livewire:image-question
                        question="2.2 What is the quality of the roof-to-wall fasteners (nails, screws, bolts)?"
                        subtitle="Ano ang kalidad ng mga fasteners (pako, turnilyo, bolts)?" :options="$roofWallFastenerOptions"
                        model="roofWallFastener" wire:key="roofWallFastener-question" />
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
                        <p class="p-8"><b>Wall Type & Integrity <i>(Uri at Integridad ng Pader)</i></b></p>
                    </div>

                    @php
                        $wallMadeOptions = [
                            [
                                'value' => 'reinforced-concrete',
                                'label' =>
                                    'Reinforced concrete (RC) walls with known reinforcement (Kongkreto na may bakal)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'mixed',
                                'label' =>
                                    'Mixed (RC + CHB well reinforced) (Magkahalong kongkreto, hollowblocks at bakal)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'concrete-hollow',
                                'label' =>
                                    'Concrete hollow block (CHB) with some reinforcement (Hollowblocks na may bakal)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'unreinforced-hollow',
                                'label' => 'Unreinforced CHB / weak masonry (Hollowblocks)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'lightweight',
                                'label' => 'Lightweight / poor materials (highly vulnerable) (Kahoy o pawid)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $wallStructureOptions = [
                            [
                                'value' => 'properly-reinforced',
                                'label' => 'Properly reinforced & supported (Kumpleto ang bakal, matibay ang suporta)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'adequate-reinforcement',
                                'label' => 'Adequate reinforcement with minor concerns (Sapat ang bakal)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'partial-reinforcement',
                                'label' =>
                                    'Partial reinforcement / questionable ties (Ilang parte lang ang may bakal )',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'insufficient-reinforcement',
                                'label' =>
                                    'Insufficient reinforcement / thin walls (Manipis ang mga pader at kulang ang suporta)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'structurally-unsound',
                                'label' => 'Structurally unsound (major risk) (Halos walang suporta)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $wallConditionOptions = [
                            [
                                'value' => 'no-cracks',
                                'label' => 'No cracks / deterioration (Walang mga bitak)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'hairline-cracks',
                                'label' => 'Hairline cracks only (May maliliit na bitak)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'moderate-cracks',
                                'label' =>
                                    'Several moderate cracks / repairs visible (Katamtaman ang laki ng bitak at may mga repairs)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'major-cracks',
                                'label' =>
                                    'Major cracking / spalling (Malalaking mga bitak at may ebidensiya ng spalling)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'severe-damage',
                                'label' =>
                                    'Severe damage / holes / collapse signs (Malubhang pagkasira/May senyales ng pagguho)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                    @endphp
                    <livewire:image-question question="3.1   What type of material are the walls made of?"
                        subtitle="Anong materyales ang ginamit sa pader?" :options="$wallMadeOptions" model="wallMade"
                        wire:key="wallMade-question" />

                    <livewire:image-question question="3.2 How structurally sound are the walls?"
                        subtitle="Gaano katibay at maayos ang pagkakagawa ng pader?" :options="$wallStructureOptions"
                        model="wallStructure" wire:key="wallStructure-question" />

                    <livewire:image-question question="3.3 What is the condition of the walls?"
                        subtitle="Ano ang kondisyon ng pader (bitak, pagkasira)" :options="$wallConditionOptions"
                        model="wallCondition" wire:key="wallCondition-question" />
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
                        <p class="p-8"><b>Wall-to-Foundation Connection <i>(Koneksyon ng Pader sa Pundasyon)</i></b>
                        </p>
                    </div>

                    @php
                        $foundationOptions = [
                            [
                                'value' => 'good-condition',
                                'label' =>
                                    'Visible concrete foundation & anchorage, good condition (Kita at maayos ang pundasyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'minor-issues',
                                'label' => 'Foundation present, minor issues (May pundasyon ngunit may konting sira)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'partial-foundation',
                                'label' => 'Shallow / partial foundation, limited  (Mababa/limitadong pundasyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'weak-foundation',
                                'label' => 'Weak foundation / poor anchorage (Mahinang pundasyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'no-foundation',
                                'label' => 'No proper foundation / floating walls (Walang pundasyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $settlementOptions = [
                            [
                                'value' => 'none',
                                'label' => 'None (Wala)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'minor-settlement',
                                'label' => 'Minor settlement (<10 mm) (Maliit na paglubog)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'moderate-settlement',
                                'label' => 'Moderate settlement / cracking (May bahagyang paglubog at pagbitak)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'noticeable-tilt',
                                'label' => 'Noticeable tilt / separation (Tabingi/Humihiwalay na pader)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'severe-settlement',
                                'label' =>
                                    'Severe settlement / separation (Malubhang paglubog/ Halos bumagsak ang pader)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                    @endphp
                    <livewire:image-question question="4.1 Is there a visible foundation and proper anchorage?"
                        subtitle="Nakikita ba ang pundasyon at maayos ba ang pagkaka-angkla?" :options="$foundationOptions"
                        model="foundation" wire:key="foundation-question" />

                    <livewire:image-question question="4.2 Are there signs of settlement or tilt?"
                        subtitle="Mayroon bang senyales ng paglubog ng lupa o pagtilt ng pader?" :options="$settlementOptions"
                        model="settlement" wire:key="settlement-question" />
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
                            VULNERABILITY ASSESSMENT FORM — RVS (One-Storey Concrete House) </h2>
                        <p class="p-8"><b>Openings — Windows & Doors <i>(Mga Bintana at Pinto)</i></b>
                        </p>
                    </div>

                    @php
                        $doorTypeOptions = [
                            [
                                'value' => 'metal',
                                'label' => 'Solid metal / secure doors (Metal)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'sturdy-wood',
                                'label' => 'Sturdy wooden doors (Matibay na kahoy)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'panel',
                                'label' => 'Panel / flush doors (Panel/Flush door)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'fragile',
                                'label' => 'Fragile doors / glass doors (Salamin na pinto)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'very-week',
                                'label' => 'Very weak / missing doors (Mahina/Walang pinto)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $doorConditionOptions = [
                            [
                                'value' => 'well-fitted',
                                'label' => 'Well-fitted swing / secure sliding (Maayos ang pagbukas at paglapat)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'minor-gaps',
                                'label' =>
                                    'Good operation with minor gaps (Maganda ang kondisyon ngunit may konting puwang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'loose-fittings',
                                'label' =>
                                    'Operational issues / loose fittings (Hindi maayos ang pagbukas at maluwang ang pagkakakabit)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'large-gaps',
                                'label' =>
                                    'Poor seals / large gaps (Hindi pulido ang kabit at may mga malalaking puwang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'detached',
                                'label' => 'Easily blown / detached (Madaling tangayin o matumba)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $windowTypeOptions = [
                            [
                                'value' => 'protected',
                                'label' =>
                                    'Fixed or protected glazing (impact resistant) (Fixed na bintana na mayroong proteksyon sa impact)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'good-frame',
                                'label' => 'Casement with good frame (Bintana na may matibay na frame)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'sliding',
                                'label' => 'Sliding / standard windows (Karaniwang mga bintana)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'single-pane',
                                'label' =>
                                    'Single-pane or weak glazing (Bintanang binubuo ng isang panel at mayroong mahinang proteksyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'missing-shutters',
                                'label' =>
                                    'Large fragile glazing / missing shutters (Malaking mga bintana na walang proteksyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $windowConditionOptions = [
                            [
                                'value' => 'strong-frame',
                                'label' =>
                                    'Strong frames, anchored to structure (Matibay na frame at naka-angkla sa istraktura)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'good-frame',
                                'label' =>
                                    'Good frames, minor gaps (Maayos na frame ngunit mayroong konting mga puwang)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'moderate-anchorage',
                                'label' =>
                                    'Moderate anchorage, signs of looseness (Katamtamang pagkaka-angkla at mayroong senyales ng pagiging maluwag)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'loose-frame',
                                'label' =>
                                    'Loose frames, missing anchors (Maluwag na mga frame at kulang ang pagkaka-angkla sa istraktura)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'frame-detached',
                                'label' => 'Frames detached / vulnerable to blowout (Walang mga frame)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];
                    @endphp
                    <livewire:image-question question="5.1  What type of doors does the building have?"
                        subtitle="Anong uri ng pinto ang mayroon sa gusali?" :options="$doorTypeOptions" model="doorType"
                        wire:key="doorType-question" />

                    <livewire:image-question question="5.2   Do the doors swing/slide properly and seal well?"
                        subtitle="Maayos bang bumubukas/sumasara ang pinto at selyado ito?" :options="$doorConditionOptions"
                        model="doorCondition" wire:key="doorCondition-question" />

                    <livewire:image-question question="5.3 What type of windows are installed?"
                        subtitle="Anong uri ng bintana ang nakakabit?" :options="$windowTypeOptions" model="windowType"
                        wire:key="windowType-question" />

                    <livewire:image-question question="5.4 How secure and anchored are the door/window frames?"
                        subtitle="Matibay at maayos bang nakakabit ang mga frame ng bintana at pinto?"
                        :options="$windowConditionOptions" model="windowCondition" wire:key="windowCondition-question" />
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
                        <p class="p-8"><b>Column & Beam System <i>(Sistema ng mga Haligi at Biga)</i></b>
                        </p>
                    </div>

                    @php
                        $columnShapeOptions = [
                            [
                                'value' => 'rectangular',
                                'label' => 'Proper rectangular / square well-designed (Hugis parisukat o parihaba)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'irregular',
                                'label' =>
                                    'Slightly irregular but adequate (Bahagyang di regular ang hugis ngunit sapat ang disenyo)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'mixed',
                                'label' => 'Mixed / unknown (Magkakaiba ang hugis)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'poor',
                                'label' => 'Poor cross-section / undersized (Maliit ang dimensyon para sa istraktura)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'inadequate',
                                'label' => 'Inadequate columns (Di akmang mga haligi)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $columnMaterialOptions = [
                            [
                                'value' => 'reinforced',
                                'label' =>
                                    'Reinforced concrete with proper detailing (Kongkreto na may sapat na bakal)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'minor-cornern',
                                'label' => 'Reinforced concrete with minor concerns (Kongkreto na may bakal)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'composite',
                                'label' => 'Composite / unknown reinforcement (Magkakahalong materyales)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'steel-only',
                                'label' =>
                                    'Steel only or weak material in poor condition (Nakalantad na bakal/ Materyales na di maganda ang kondisyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'damaged',
                                'label' => 'Weak or damaged material (Mga materyales na may sira o mahina)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $columnConditionOptions = [
                            [
                                'value' => 'no-defects',
                                'label' => 'No visible defects (Walang nakikitang depekto)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'minor-crack',
                                'label' => 'Minor hairline cracks (May mga maliliit na bitak)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'moderate-crack',
                                'label' =>
                                    'Moderate cracks / repairs (May katamtamang bitak at pagsaayos/ni-repair na bitak)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'major-crack',
                                'label' =>
                                    'Major cracks / spalling (Malalaking bitak o may natutuklap na bahagi ng konkreto)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'severe-deterioration',
                                'label' =>
                                    'Severe deterioration / compromised (Matinding pagkasira at hindi na matibay ang estruktura)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];
                    @endphp
                    <livewire:image-question question="6.1  What is the shape of the columns?"
                        subtitle="Ano ang hugis ng haligi?" :options="$columnShapeOptions" model="columnShape"
                        wire:key="columnShape-question" />

                    <livewire:image-question question="6.2  What is the material of the columns?"
                        subtitle="Anong materyales ang ginamit sa haligi?" :options="$columnMaterialOptions" model="columnMaterial"
                        wire:key="columnMaterial-question" />

                    <livewire:image-question question="6.3  What is the current condition of the columns/beams?"
                        subtitle="Ano ang kondisyon ng haligi at beam?" :options="$columnConditionOptions" model="columnCondition"
                        wire:key="columnCondition-question" />
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
                        <p class="p-8"><b>Building Shape & Plan Configuration <i>(Hugis ng Gusali at Plano)</i></b>
                        </p>
                    </div>

                    @php
                        $houseShapeOptions = [
                            [
                                'value' => 'rectangular',
                                'label' => 'Regular rectangular / square plan (Parihaba/parisukat)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'irregular',
                                'label' =>
                                    'Mostly regular with small projections (Karamihan ay regular na may maliit na nakausli)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'mixed',
                                'label' => 'L/T projections (Hugis L/T)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'poor',
                                'label' => 'Irregular plan with re-entrant corners',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'inadequate',
                                'label' => 'Highly irregular complex plan (worst)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $houseRatioOptions = [
                            [
                                'value' => 'reinforced',
                                'label' => 'Low-rise wide base (stable) (Mababa na may malapad na pundasyon)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'minor-cornern',
                                'label' => 'Slightly tall but stable (Medyo mataas pero matatag)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'composite',
                                'label' => 'Moderate slenderness (Katamtamang proporsyon ng taas at lapad ng bahay)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'steel-only',
                                'label' => 'Tall and narrow for a one-storey (Mataas at makitid)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'damaged',
                                'label' => 'Extremely unbalanced (Lubhang hindi balanse)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];
                    @endphp
                    <livewire:image-question question="7.1 What is the shape of the house plan?"
                        subtitle="Ano ang hugis ng plano ng bahay?" :options="$houseShapeOptions" model="houseShape"
                        wire:key="houseShape-question" />

                    <livewire:image-question question="7.1 What is the aspect ratio of the house (height:width)?"
                        subtitle="Ano ang proporsyon ng sukat ng taas at lapad ng bahay?" :options="$houseRatioOptions"
                        model="houseRatio" wire:key="houseRatio-question" />
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
                        <p class="p-8"><b>Overhangs & Eaves</b>
                        </p>
                    </div>

                    @php
                        $roofOverhangOptions = [
                            [
                                'value' => 'minimal',
                                'label' => 'Minimal (≤ 300 mm wood / ≤ 450 mm concrete) (Maiksi)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'moderate',
                                'label' => 'Moderate length (450-500mm) (Katamtamang haba)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'slightly-long',
                                'label' => 'Slightly long (510-600mm) (Medyo mahaba)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'long',
                                'label' => 'Long overhangs (610mm-1m) (Mahaba)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'very-long',
                                'label' => 'Very long / unsupported overhangs (>1m) (Sobrang haba)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $eavesSoffitsOptions = [
                            [
                                'value' => 'well-anchored',
                                'label' =>
                                    'Well anchored, corrosion resistant(Maayos ang pagkakakabit, walang senyales ng pangangalawang/pagkasira)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'minor-corrosion',
                                'label' =>
                                    'Good condition minor corrosion (Maayos ang kondisyon, may kaunting senyales ng pangangalawang/pagkasira)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'moderate-corrosion',
                                'label' =>
                                    'Moderate corrosion / some loose elements (May katamtamang senyales pangangalawang o pagkasira, lumuwag na ang pagkakakabit)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'corroded-fastener',
                                'label' => 'Loose / corroded fasteners (Maluwag/kinakalawang na ang mga turnilyo/pako)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'detached',
                                'label' => 'Detached or falling elements (Humihiwalay/nahuhulog na ang ilang mga parte',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];
                    @endphp
                    <livewire:image-question question="8.1 How long is the roof overhang?"
                        subtitle="Gaano kahaba ang nakausling bahagi ng bubong?" :options="$roofOverhangOptions"
                        model="roofOverhang" wire:key="roofOverhang-question" />

                    <livewire:image-question
                        question="8.2  What is the condition of the eaves and soffits of the houepair?"
                        subtitle="Ano ang kalagayan ng nakausling bahagi ng bubong?" :options="$eavesSoffitsOptions"
                        model="eavesSoffits" wire:key="eavesSoffits-question" />
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
                        <p class="p-8"><b>Building Height <i>(Taas ng Gusali)</i></b>
                        </p>
                    </div>

                    @php
                        $houseHeightOptions = [
                            [
                                'value' => '2.4–3.0',
                                'label' => '2.4–3.0 m',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => '3.1–4.7',
                                'label' => '3.1–4.7 m',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => '4.8–6.0',
                                'label' => '4.8–6.0 m',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => '6.1–7.1',
                                'label' => '6.1–7.1 m',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => '7.2',
                                'label' => '≥ 7.2 m',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];
                    @endphp
                    <livewire:image-question question="9.1 How tall is your house?"
                        subtitle="Gaano kataas ang inyong bahay?" :options="$houseHeightOptions" model="houseHeight"
                        wire:key="houseHeight-question" />
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
                        <p class="p-8"><b>Location / Environmental Exposure — 5% </b>
                        </p>
                    </div>

                    @php
                        $houseLocationOptions = [
                            [
                                'value' => 'sheltered-inland',
                                'label' =>
                                    'Sheltered inland, many obstructions (Panloob na lugar na hindi direktang tinatamaan ng hangin mula sa dagat)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'urban-area',
                                'label' => 'Urban area with surrounding buildings (Bayan na may mga gusali)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'mixed-terrain',
                                'label' => 'Mixed terrain / partial exposure',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'open-terrain',
                                'label' => 'Open terrain (Exposure C) (Kapatagan)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'coastal',
                                'label' => 'Coastal (Baybayin/Tabing dagat)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];

                        $neighborOptions = [
                            [
                                'value' => 'high-density',
                                'label' => 'High density (many obstructions / sheltered)(Marami ang bilang mg bahay)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'medium-density',
                                'label' => 'Medium density (Katamtaman lamang ang bilang ng bahay)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'low-density',
                                'label' => 'Low density (some shelter) (Kaunti lamang ang bahay)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'sparse-isolated',
                                'label' => 'Sparse isolated (less shelter) (Kalat-kalat na magkakahiwalay ang bahay)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                            [
                                'value' => 'isolated',
                                'label' => 'Isolated house in open terrain (Nakahiwalay na bahay sa kapatagan)',
                                'image' => asset('images/unknown_building.png'),
                            ],
                        ];
                    @endphp
                    <livewire:image-question question="10.1 Where is the location of your house?"
                        subtitle="Saan matatagpuan ang inyong bahay?" :options="$houseLocationOptions" model="houseLocation"
                        wire:key="houseLocation-question" />

                    <livewire:image-question question="10.2 How would you describe the number of houses in your area?"
                        subtitle="Paano mo ilalarawan ang dami ng bahay sa inyong lugar?" :options="$neighborOptions"
                        model="neighbor" wire:key="neighbor-question" />
                </div>
            @endif

            @if ($currentStep === 13)
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
                        <p class="p-8"><b>Please pin your house location on the map below. <i>I-pin ang lokasyon ng
                                    iyong bahay sa mapa sa
                                    ibaba</i></b>
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="p-4">
                            <div wire:ignore id="pin-map" class="w-full h-[500px] rounded-lg shadow-md"></div>
                            <div class="mt-4 text-sm text-gray-600 text-center">
                                @if ($latitude && $longitude)
                                    📍 <b>Selected Location:</b> {{ number_format($latitude, 5) }},
                                    {{ number_format($longitude, 5) }}
                                @else
                                    No location selected yet.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @push('scripts')
                    <script>
                        document.addEventListener('livewire:init', () => {
                            const mapElement = document.getElementById('pin-map');
                            if (!mapElement) return; // ✅ Prevents error if map is not on page

                            const map = L.map('pin-map').setView([13.4754, 121.8380], 13);
                            let marker = null;

                            // Add map tiles
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; OpenStreetMap contributors'
                            }).addTo(map);
                            // Handle clicks/taps
                            map.on('click', function(e) {
                                const {
                                    lat,
                                    lng
                                } = e.latlng;

                                if (marker) map.removeLayer(marker);

                                const customIcon = L.icon({
                                    iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                                    iconSize: [35, 35],
                                    iconAnchor: [17, 34],
                                    popupAnchor: [0, -30],
                                });

                                marker = L.marker([lat, lng], {
                                        icon: customIcon
                                    })
                                    .addTo(map)
                                    .bindPopup("Your selected location").openPopup();

                                // Send to Livewire
                                @this.set('latitude', lat);
                                @this.set('longitude', lng);
                            });
                        });
                    </script>
                @endpush
            @endif

            {{-- <div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
                        <h3 class="font-semibold text-primary mb-6">1.1 What type of roof does the house have? <span
                                class="italic">(Ano ang uri ng bubong ng bahay?)</span></h3>

                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input id="option-1" name="security-posture" type="radio"
                                    class="w-4 h-4 text-secondary border-gray-300 focus:ring-secondary">
                                <label for="option-1" class="ml-2 text-gray-700 text-sm">Basic - We have some security
                                    measures
                                    but
                                    no
                                    formal program</label>
                            </div>
                            <div class="flex items-center">
                                <input id="option-2" name="security-posture" type="radio"
                                    class="w-4 h-4 text-secondary border-gray-300 focus:ring-secondary">
                                <label for="option-2" class="ml-2 text-gray-700 text-sm">Developing - We have documented
                                    policies
                                    and
                                    some controls</label>
                            </div>
                            <div class="flex items-center">
                                <input id="option-3" name="security-posture" type="radio"
                                    class="w-4 h-4 text-secondary border-gray-300 focus:ring-secondary">
                                <label for="option-3" class="ml-2 text-gray-700 text-sm">Mature - We have comprehensive
                                    security
                                    measures and regular audits</label>
                            </div>
                            <div class="flex items-center">
                                <input id="option-4" name="security-posture" type="radio"
                                    class="w-4 h-4 text-secondary border-gray-300 focus:ring-secondary">
                                <label for="option-4" class="ml-2 text-gray-700 text-sm">Advanced - We have threat
                                    modeling, red
                                    teaming, and continuous monitoring</label>
                            </div>
                            <div class="flex items-center">
                                <input id="option-5" name="security-posture" type="radio"
                                    class="w-4 h-4 text-secondary border-gray-300 focus:ring-secondary">
                                <label for="option-5" class="ml-2 text-gray-700 text-sm">Not sure - We haven't
                                    evaluated our
                                    security
                                    posture</label>
                            </div>
                        </div>
                    </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative">
                        <input type="radio" id="vector-1" name="threat-vector" class="hidden peer" value="phishing">
                        <label for="vector-1"
                            class="block cursor-pointer rounded-lg border border-gray-200 p-4 hover:border-secondary peer-checked:border-secondary peer-checked:ring-2 peer-checked:ring-secondary transition-all">
                            <img src="http://static.photos/technology/640x360/1" alt="Phishing"
                                class="w-full h-32 object-cover rounded-md mb-2">
                            <span class="text-gray-700 font-medium">Phishing Attacks</span>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" id="vector-2" name="threat-vector" class="hidden peer"
                            value="ransomware">
                        <label for="vector-2"
                            class="block cursor-pointer rounded-lg border border-gray-200 p-4 hover:border-secondary peer-checked:border-secondary peer-checked:ring-2 peer-checked:ring-secondary transition-all">
                            <img src="http://static.photos/technology/640x360/2" alt="Ransomware"
                                class="w-full h-32 object-cover rounded-md mb-2">
                            <span class="text-gray-700 font-medium">Ransomware</span>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" id="vector-3" name="threat-vector" class="hidden peer" value="insider">
                        <label for="vector-3"
                            class="block cursor-pointer rounded-lg border border-gray-200 p-4 hover:border-secondary peer-checked:border-secondary peer-checked:ring-2 peer-checked:ring-secondary transition-all">
                            <img src="http://static.photos/office/640x360/3" alt="Insider Threats"
                                class="w-full h-32 object-cover rounded-md mb-2">
                            <span class="text-gray-700 font-medium">Insider Threats</span>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" id="vector-4" name="threat-vector" class="hidden peer"
                            value="cloud">
                        <label for="vector-4"
                            class="block cursor-pointer rounded-lg border border-gray-200 p-4 hover:border-secondary peer-checked:border-secondary peer-checked:ring-2 peer-checked:ring-secondary transition-all">
                            <img src="http://static.photos/technology/640x360/4" alt="Cloud Misconfig"
                                class="w-full h-32 object-cover rounded-md mb-2">
                            <span class="text-gray-700 font-medium">Cloud Misconfigurations</span>
                        </label>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-primary mb-6">3. What security measures are you currently
                    implementing?</h3>
                <p class="text-gray-600 mb-4">Please describe any security tools, policies, or practices your
                    organization has in place.</p>

                <textarea id="security-measures" rows="5"
                    class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                    placeholder="E.g., We use multi-factor authentication, endpoint protection, and conduct employee training..."></textarea>
            </div> --}}

            <!-- Results -->
            @if ($currentStep === 14)
                <div class="flex flex-col gap-4 bg-white rounded-xl shadow-md overflow-hidden pt-8 px-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-primary mb-2">Assessment Complete!</h2>
                        <p class="text-gray-600">Your security vulnerability score</p>
                    </div>

                    <div class="flex flex-col items-center justify-between gap-8 mb-12">
                        <div class="relative w-48 h-48">
                            <svg class="progress-circle w-full h-full" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="45" fill="none" stroke="#e5e7eb"
                                    stroke-width="6" />
                                <circle cx="50" cy="50" r="45" fill="none" stroke="#f95738"
                                    stroke-width="6" stroke-dasharray="283" stroke-dashoffset="85"
                                    stroke-linecap="round" />
                            </svg>
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-3xl font-bold text-accent" id="score-percentage">Medium</span>
                                <span class="text-sm text-gray-500">Vulnerability Rating</span>
                            </div>
                        </div>

                        <div class="flex-1 text-left">
                            <h3 class="text-xl font-semibold text-primary mb-4 text-center">Moderate Risk</h3>
                            <p class="text-gray-600 mb-4">Your organization shows some security awareness but has
                                significant areas for improvement.</p>

                            <div class="mb-4">
                                <h4 class="font-medium text-primary mb-2">Key Vulnerabilities:</h4>
                                <ul class="list-disc list-inside text-gray-700 space-y-1">
                                    <li>Lack of threat detection capabilities</li>
                                    <li>Insufficient employee security training</li>
                                    <li>Missing multi-factor authentication</li>
                                </ul>
                            </div>

                            <div>
                                <h4 class="font-medium text-primary mb-2">Recommendations:</h4>
                                <ul class="list-disc list-inside text-gray-700 space-y-1">
                                    <li>Implement a Security Awareness Training program</li>
                                    <li>Enable MFA for all privileged accounts</li>
                                    <li>Conduct a penetration test to identify weaknesses</li>
                                    <li>Develop an incident response plan</li>
                                </ul>
                            </div>

                            <div class="mt-8">
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
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-8">
                @if ($currentStep > 1)
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
                {{-- <div id="final-actions" class="w-full flex justify-between">
                    <button type="button" id="back-btn"
                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-secondary">
                        <i data-feather="chevron-left" class="inline"></i> Back to Assessment
                    </button>
                    <div class="space-x-4">
                        <button type="button"
                            class="px-6 py-2 border border-secondary text-secondary rounded-lg hover:bg-secondary hover:text-white focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                            <i data-feather="download" class="inline"></i> Download Report
                        </button>
                        <button type="button"
                            class="px-6 py-2 bg-accent text-white rounded-lg hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-opacity-50">
                            <i data-feather="send" class="inline"></i> Submit Assessment
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

{{-- @livewireScripts --}}
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
