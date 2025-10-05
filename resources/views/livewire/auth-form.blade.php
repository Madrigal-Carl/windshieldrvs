<main class="flex-grow flex items-center pt-16 pb-12">
    <!-- Navigation -->
    <a href="/" class="cursor-pointer w-14 h-14 absolute top-3 left-3 flex items-center justify-center">
        <x-feathericon-arrow-left class="w-8 h-8 text-primary" />
    </a>

    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row rounded-xl overflow-hidden shadow-xl max-w-6xl mx-auto">
            <!-- Form Panel -->
            <div class="w-full lg:w-1/2 bg-white p-8 md:p-12">
                <div class="max-w-md mx-auto">
                    <!-- Logo & Heading -->
                    <div class="text-center mb-8">
                        <a href="/" class="text-primary text-3xl font-bold inline-block">WindShield<span
                                class="text-accent">RVS</span></a>
                        <p class="text-gray-500 mt-2">Scientific wind vulnerability assessment</p>
                    </div>

                    <h1 class="text-2xl font-bold text-primary mb-6">Welcome to WindShield RVS — Sign in to your
                        account</h1>

                    <!-- Login Form -->
                    <form wire:submit.prevent="login" class="space-y-6">
                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-feathericon-mail class="h-5 w-5 text-gray-400" />
                                </div>
                                <input type="text" id="email" name="email" autocomplete="email"
                                    wire:model.live="email"
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent transition"
                                    aria-describedby="email-error">
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <a href="#" class="text-sm text-secondary hover:text-primary transition">Forgot
                                    password?</a>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-feathericon-lock class="h-5 w-5 text-gray-400" />
                                </div>
                                <input type="password" id="password" name="password" autocomplete="current-password"
                                    wire:model.live="password"
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent transition"
                                    aria-describedby="password-error">
                            </div>
                        </div>

                        <!-- Remember Me & Submit -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" wire:model="remember"
                                    class="h-4 w-4 text-secondary focus:ring-secondary border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember
                                    me</label>
                            </div>

                            <button type="submit"
                                class="bg-accent text-white px-6 py-2 rounded-lg font-medium hover:bg-orange-600 transition w-auto focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                                Log In
                            </button>
                        </div>
                    </form>

                    <!-- Social Login (Non-functional) -->
                    <div class="mt-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <a href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                                <x-feathericon-facebook class="h-5 w-5 text-blue-600" />
                                <span class="ml-2">Facebook</span>
                            </a>

                            <a href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                                <x-feathericon-twitter class="h-5 w-5 text-blue-600" />
                                <span class="ml-2">Twitter</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block lg:w-1/2 bg-gradient-to-br from-dark via-primary to-secondary relative">
                <div class="absolute inset-0 flex items-center justify-center p-12">
                    <div class="text-center text-white max-w-md">
                        <img src="http://static.photos/technology/640x360/123" alt="WindShield RVS Illustration"
                            class="rounded-lg shadow-xl mb-8 mx-auto w-full h-auto">
                        <h2 class="text-2xl font-bold mb-4">Assess Your Home's Wind Vulnerability</h2>
                        <p class="opacity-90">Sign in to access your assessment dashboard and view your property's
                            risk profile.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
