<x-app>
    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="fixed w-full bg-primary/90 backdrop-blur-md z-50 shadow-lg p-2 md:p-0">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/logo_white.png') }}" alt="logo.png" class="w-8">
                <p class="text-white text-2xl font-bold">WindShield<span class="text-accent">RVS</span></p>
            </a>

            <!-- Desktop Links -->
            <div class="hidden md:flex space-x-8">
                <a href="#home" class="text-white hover:text-accent transition">Home</a>
                <a href="#about" class="text-white hover:text-accent transition">About</a>
                <a href="#features" class="text-white hover:text-accent transition">Features</a>
                <a href="#map" class="text-white hover:text-accent transition">GIS Map</a>
                <a href="#contact" class="text-white hover:text-accent transition">Contact</a>
            </div>

            <!-- Desktop Login -->
            <a href="/login"
                class="hidden md:block bg-accent text-white px-6 py-2 rounded-full font-medium hover:bg-orange-600 transition">
                Login
            </a>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                <x-feathericon-menu />
            </button>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu"
            class="hidden flex-col font-medium items-center space-y-4 bg-primary/95 px-6 py-4 md:hidden shadow-lg border-t border-white/10">
            <a href="#home" class="text-white hover:text-accent transition">Home</a>
            <a href="#about" class="text-white hover:text-accent transition">About</a>
            <a href="#features" class="text-white hover:text-accent transition">Features</a>
            <a href="#map" class="text-white hover:text-accent transition">GIS Map</a>
            <a href="#contact" class="text-white hover:text-accent transition">Contact</a>
            <a href="/login"
                class="bg-accent w-full text-white px-6 py-2 rounded-sm font-medium hover:bg-orange-600 transition text-center">
                Login
            </a>
        </div>
    </nav>


    <!-- Hero Section -->
    <section id="home"
        class="relative min-h-screen flex items-center bg-gradient-to-br from-dark via-primary to-secondary text-white overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1000')] bg-cover bg-center opacity-15 mix-blend-overlay">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-dark/90 to-transparent z-0"></div>

        <div class="absolute inset-0 grid grid-cols-12 grid-rows-6 z-0">
            <!-- Floating particles -->
            <div class="col-start-2 row-start-2 w-3 h-3 bg-accent rounded-full animate-float opacity-80"
                style="--delay: 0s"></div>
            <div class="col-start-10 row-start-3 w-4 h-4 bg-white rounded-full animate-float opacity-70"
                style="--delay: 1.5s"></div>
            <div class="col-start-5 row-start-5 w-2 h-2 bg-secondary rounded-full animate-float opacity-90"
                style="--delay: 2.3s"></div>
            <div class="col-start-8 row-start-2 w-3 h-3 bg-accent rounded-full animate-float opacity-80"
                style="--delay: 3.1s"></div>
            <div class="col-start-11 row-start-5 w-2 h-2 bg-white rounded-full animate-float opacity-60"
                style="--delay: 1s"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col items-center text-center py-32">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight max-w-4xl">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-white">WindShield</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-accent">RVS</span>
                </h1>
                <p class="text-xl md:text-2xl mb-10 max-w-2xl backdrop-blur-sm bg-white/5 px-6 py-3 rounded-full">
                    <span class="text-accent font-medium">Scientific</span> wind vulnerability assessment for safer
                    homes
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/assessment"
                        class="relative group bg-accent hover:bg-orange-600 text-white px-8 py-4 rounded-full font-medium transition-all shadow-lg hover:shadow-xl">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <x-feathericon-clipboard class="w-5 h-5" />
                            Start Assessment
                        </span>
                        <div
                            class="absolute inset-0 rounded-full bg-white/10 group-hover:bg-white/20 backdrop-blur-sm scale-0 group-hover:scale-100 transition-transform duration-300">
                        </div>
                    </a>
                    <a href="#about"
                        class="relative group border-2 border-white/20 hover:border-accent text-white px-8 py-4 rounded-full font-medium transition-all">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <x-feathericon-book-open class="w-5 h-5" />
                            Learn More
                        </span>
                        <div
                            class="absolute inset-0 rounded-full bg-accent/0 group-hover:bg-accent/10 backdrop-blur-sm scale-0 group-hover:scale-100 transition-transform duration-300">
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
            <a href="#about" class="text-white">
                <x-feathericon-chevron-down class="w-8 h-8" />
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-16 text-primary">About The Project</h2>
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <div class="rounded-xl overflow-hidden shadow-lg">
                        <img src="http://static.photos/people/640x360/23" alt="Research team" class="w-full h-auto">
                    </div>
                </div>
                <div class="md:w-1/2">
                    <h3 class="text-2xl font-semibold mb-4 text-dark">Understanding Wind Vulnerability</h3>
                    <p class="mb-6 text-gray-700">This Rapid Visual Screening (RVS) tool is designed specifically for
                        one-storey concrete houses in Boac, Marinduque. Our research aims to develop a standardized
                        methodology for assessing wind vulnerability using visual indicators.</p>
                    <p class="mb-8 text-gray-700">The tool follows guidelines from FEMA P-2062, National Structural Code
                        of the Philippines (NSCP), and National Building Code (NBC) to provide reliable risk assessments
                        that can inform community preparedness strategies.</p>
                    <a href="#features" class="text-accent font-medium flex items-center hover:text-orange-600">
                        Read More
                        <x-feathericon-arrow-right class="ml-2 w-4 h-4" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-4 text-primary">Key Features</h2>
            <p class="text-center text-gray-600 mb-16 max-w-2xl mx-auto">Comprehensive wind vulnerability assessment
                with user-friendly interface</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <x-feathericon-map class="w-8 h-8 text-accent" />
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">GIS Mapping Integration</h3>
                    <p class="text-gray-600">View and analyze assessed locations across Boac, Marinduque with our
                        interactive GIS mapping system.</p>
                </div>
                <!-- Feature 2 -->
                <div
                    class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <x-feathericon-home class="w-8 h-8 text-accent" />
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">Structural Assessment</h3>
                    <p class="text-gray-600">Evaluate critical components including roofs, walls, foundations, and
                        openings for wind resistance.</p>
                </div>
                <!-- Feature 3 -->
                <div
                    class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <x-feathericon-bar-chart-2 class="w-8 h-8 text-accent" />
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">Risk Scoring System</h3>
                    <p class="text-gray-600">Automated scoring ranks houses from Very Low Risk to Very High Risk based
                        on structural characteristics.</p>
                </div>
                <!-- Feature 4 -->
                <div
                    class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <x-feathericon-shield class="w-8 h-8 text-accent" />
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">Data Privacy Compliant</h3>
                    <p class="text-gray-600">Adheres to RA 10173 (Data Privacy Act of 2012) ensuring all collected data
                        is securely handled.</p>
                </div>
                <!-- Feature 5 -->
                <div
                    class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <x-feathericon-book class="w-8 h-8 text-accent" />
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">Standards-Based</h3>
                    <p class="text-gray-600">Follows FEMA P-2062, NSCP, and NBC guidelines for reliable and
                        standardized
                        assessments.</p>
                </div>
                <!-- Feature 6 -->
                <div
                    class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <x-feathericon-cloud-rain class="w-8 h-8 text-accent" />
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">Disaster Preparedness</h3>
                    <p class="text-gray-600">Contributes to resilient housing strategies and community disaster
                        preparedness planning.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section id="map" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-4 text-primary">Explore Wind Vulnerability Data</h2>
            <p class="text-center text-gray-600 mb-16 max-w-2xl mx-auto">Visualize assessed houses across Boac,
                Marinduque to guide community preparedness</p>
            <livewire:map-view />
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="process" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-16 text-primary">How The Assessment Works</h2>
            <div class="flex flex-col md:flex-row justify-between items-center md:items-start space-y-12 md:space-y-0">
                <!-- Step 1 -->
                <div class="flex flex-col items-center text-center w-full md:w-1/4 px-4">
                    <div
                        class="bg-white w-20 h-20 rounded-full shadow-md flex items-center justify-center mb-6 text-accent">
                        <span class="text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">Consent & Introduction</h3>
                    <p class="text-gray-600">Participants agree to join the assessment and understand the process.</p>
                </div>
                <!-- Step 2 -->
                <div class="flex flex-col items-center text-center w-full md:w-1/4 px-4">
                    <div
                        class="bg-white w-20 h-20 rounded-full shadow-md flex items-center justify-center mb-6 text-accent">
                        <span class="text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">House Information</h3>
                    <p class="text-gray-600">Basic details including address, assessor name, and assessment date.</p>
                </div>
                <!-- Step 3 -->
                <div class="flex flex-col items-center text-center w-full md:w-1/4 px-4">
                    <div
                        class="bg-white w-20 h-20 rounded-full shadow-md flex items-center justify-center mb-6 text-accent">
                        <span class="text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">Structural Assessment</h3>
                    <p class="text-gray-600">Evaluation of roof, walls, foundation, openings, and other structural
                        elements.</p>
                </div>
                <!-- Step 4 -->
                <div class="flex flex-col items-center text-center w-full md:w-1/4 px-4">
                    <div
                        class="bg-white w-20 h-20 rounded-full shadow-md flex items-center justify-center mb-6 text-accent">
                        <span class="text-2xl font-bold">4</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-dark">Risk Scoring</h3>
                    <p class="text-gray-600">System generates vulnerability score and recommendations.</p>
                </div>
            </div>
            <div class="text-center mt-16">
                <a href="/assessment"
                    class="bg-accent text-white px-8 py-3 rounded-full font-medium hover:bg-orange-600 transition inline-block">Start
                    Your Assessment</a>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gradient-to-br from-primary to-dark text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Meet The Research Team</h2>
                <p class="text-lg text-white/80 max-w-2xl mx-auto">Connect with our dedicated researchers for inquiries
                    about the WindShield RVS methodology</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Researcher 1 -->
                <div
                    class="bg-white/5 p-8 rounded-2xl backdrop-blur-sm border border-white/10 hover:border-accent/50 transition-all transform hover:-translate-y-2 shadow-lg hover:shadow-xl">
                    <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white/10 mx-auto mb-6">
                        <img src="http://static.photos/people/200x200/1" alt="Researcher"
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-semibold text-center mb-2 min-h-14">Wilmer Anjaneya D. Imperio IV</h3>
                    <div class="flex flex-col space-y-3 text-white/80">
                        <div class="flex items-center">
                            <x-feathericon-mail class="w-4 h-4 mr-2 flex-shrink-0" />
                            <span class="text-xs break-all">imperiowadi@gmail.com</span>
                        </div>
                        <div class="flex items-center">
                            <x-feathericon-phone class="w-4 h-4 mr-2 flex-shrink-0" />
                            <span class="text-xs">09453045255</span>
                        </div>
                    </div>
                </div>
                <!-- Researcher 2 -->
                <div
                    class="bg-white/5 p-8 rounded-2xl backdrop-blur-sm border border-white/10 hover:border-accent/50 transition-all transform hover:-translate-y-2 shadow-lg hover:shadow-xl">
                    <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white/10 mx-auto mb-6">
                        <img src="http://static.photos/people/200x200/2" alt="Researcher"
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-semibold text-center mb-2 min-h-14">Denielle Marie V. Peñaroyo</h3>
                    <div class="flex flex-col space-y-3 text-white/80">
                        <div class="flex items-center">
                            <x-feathericon-mail class="w-4 h-4 mr-2 flex-shrink-0" />
                            <span class="text-xs break-all">penaroyodeniellemarie09@gmail.com</span>
                        </div>
                        <div class="flex items-center">
                            <x-feathericon-phone class="w-4 h-4 mr-2 flex-shrink-0" />
                            <span class="text-xs">09776219505</span>
                        </div>
                    </div>
                </div>
                <!-- Researcher 3 -->
                <div
                    class="bg-white/5 p-8 rounded-2xl backdrop-blur-sm border border-white/10 hover:border-accent/50 transition-all transform hover:-translate-y-2 shadow-lg hover:shadow-xl">
                    <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white/10 mx-auto mb-6">
                        <img src="http://static.photos/people/200x200/3" alt="Researcher"
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-semibold text-center mb-2 min-h-14">Art Heaverleen R. Ricohermoso</h3>
                    <div class="flex flex-col space-y-3 text-white/80">
                        <div class="flex items-center">
                            <x-feathericon-mail class="w-4 h-4 mr-2 flex-shrink-0" />
                            <span class="text-xs break-all">artheaverleenricohermoso@gmail.com</span>
                        </div>
                        <div class="flex items-center">
                            <x-feathericon-phone class="w-4 h-4 mr-2 flex-shrink-0" />
                            <span class="text-xs">09561501511</span>
                        </div>
                    </div>
                </div>
                <!-- Researcher 4 -->
                <div
                    class="bg-white/5 p-8 rounded-2xl backdrop-blur-sm border border-white/10 hover:border-accent/50 transition-all transform hover:-translate-y-2 shadow-lg hover:shadow-xl">
                    <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white/10 mx-auto mb-6">
                        <img src="http://static.photos/people/200x200/4" alt="Researcher"
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-semibold text-center mb-2 min-h-14">Samuel V. Valdepeña</h3>
                    <div class="flex flex-col space-y-3 text-white/80">
                        <div class="flex items-center">
                            <x-feathericon-mail class="w-4 h-4 mr-2 flex-shrink-0" />
                            <span class="text-xs break-all">samvaldepena003@gmail.com</span>
                        </div>
                        <div class="flex items-center">
                            <x-feathericon-phone class="w-4 h-4 mr-2 flex-shrink-0" />
                            <span class="text-xs">09389484323</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-dark text-white py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-8 md:mb-0">
                    <h3 class="text-2xl font-bold mb-4">WindShield<span class="text-accent">RVS</span></h3>
                    <p class="text-gray-400 max-w-md">Marinduque State University<br>Civil Engineering Department</p>
                </div>
                <div class="mb-8 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition">About</a></li>
                        <li><a href="#features" class="text-gray-400 hover:text-white transition">Features</a></li>
                        <li><a href="#map" class="text-gray-400 hover:text-white transition">GIS Map</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-accent transition">
                            <x-feathericon-facebook class="w-5 h-5" />
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-accent transition">
                            <x-feathericon-twitter class="w-5 h-5" />
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-accent transition">
                            <x-feathericon-linkedin class="w-5 h-5" />
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-accent transition">
                            <x-feathericon-youtube class="w-5 h-5" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>© 2025 The Researchers. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Assessment CTA Floating Button -->
    <div id="assess" class="fixed bottom-6 right-6 z-50">
        <a href="/assessment"
            class="bg-accent text-white p-4 rounded-full shadow-xl hover:bg-orange-600 transition transform hover:scale-110 flex items-center justify-center">
            <x-feathericon-clipboard class="w-6 h-6" />
            <span class="ml-2 font-medium hidden sm:inline">Assess Now</span>
        </a>
    </div>
</x-app>
