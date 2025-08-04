<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Code Verse - Landing Page</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/custom/landing.css') }}">
</head>
<body class="bg-white dark:bg-black dark:text-white overflow-hidden">
    <div class="min-h-screen relative">
        <!-- Background Blur Orbs -->
        <div class="blur-orb bg-purple-400 w-40 h-40 top-0 left-0" style="animation-delay: 0s;"></div>
        <div class="blur-orb bg-cyan-400 w-32 h-32 top-40 right-0" style="animation-delay: 2s;"></div>
        <div class="blur-orb bg-purple-600 w-48 h-48 top-80 right-40" style="animation-delay: 4s;"></div>
        <div class="blur-orb bg-purple-400 w-40 h-40 bottom-0 right-0" style="animation-delay: 1s;"></div>

        <!-- Floating Icons -->
        <div class="floating-icon absolute left-8 bottom-1/2 z-10" style="animation-delay: 0.5s;">
            <div class="w-16 h-16 bg-orange-400 rounded-full flex items-center justify-center shadow-lg">
                <i class="ph ph-code text-white text-2xl"></i>
            </div>
        </div>
        <div class="floating-icon absolute right-8 bottom-1/3 z-10" style="animation-delay: 1.5s;">
            <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="ph ph-lightning text-white text-2xl"></i>
            </div>
        </div>
        <div class="floating-icon absolute top-1/4 left-1/4 z-10" style="animation-delay: 2.5s;">
            <div class="w-12 h-12 bg-cyan-400 rounded-full flex items-center justify-center shadow-lg">
                <i class="ph ph-star text-white text-lg"></i>
            </div>
        </div>

        <!-- Main Content Container -->
        <div class="flex items-center justify-center min-h-screen relative z-20">
            <div class="grid lg:grid-cols-2 gap-16 items-center max-w-7xl mx-auto px-8">
                
                <!-- Left Side - Illustration -->
                <div class="relative">
                    <div class="relative z-10 flex items-center justify-center">
                        <!-- Main Illustration Circle -->
                        <div class="relative w-96 h-96 lg:w-[500px] lg:h-[500px]">
                            <!-- Central Planet -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-80 h-80 lg:w-96 lg:h-96 rounded-full gradient-bg flex items-center justify-center shadow-2xl">
                                    <div class="text-center text-white">
                                        <div class="text-6xl lg:text-8xl font-bold mb-4">CV</div>
                                        <div class="text-xl lg:text-2xl font-semibold">Code Verse</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Orbiting Elements -->
                            <div class="absolute inset-0 animate-spin" style="animation-duration: 20s;">
                                <!-- User Avatars and Icons around the circle -->
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8">
                                    <div class="w-16 h-16 rounded-full bg-white shadow-lg overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=64&h=64&fit=crop&crop=face" alt="User" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                
                                <div class="absolute top-1/4 right-0 transform translate-x-8 -translate-y-1/2">
                                    <div class="w-12 h-12 bg-orange-400 rounded-lg flex items-center justify-center shadow-lg">
                                        <i class="ph ph-diamond text-white text-xl"></i>
                                    </div>
                                </div>
                                
                                <div class="absolute bottom-1/4 right-0 transform translate-x-8 translate-y-1/2">
                                    <div class="w-16 h-16 rounded-full bg-white shadow-lg overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b789?w=64&h=64&fit=crop&crop=face" alt="User" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-8">
                                    <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                        <i class="ph ph-crown text-white text-xl"></i>
                                    </div>
                                </div>
                                
                                <div class="absolute bottom-1/4 left-0 transform -translate-x-8 translate-y-1/2">
                                    <div class="w-16 h-16 rounded-full bg-white shadow-lg overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=64&h=64&fit=crop&crop=face" alt="User" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                
                                <div class="absolute top-1/4 left-0 transform -translate-x-8 -translate-y-1/2">
                                    <div class="w-12 h-12 bg-cyan-400 rounded-full flex items-center justify-center shadow-lg">
                                        <i class="ph ph-lightning text-white text-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Content -->
                <div class="text-center lg:text-left">
                    <!-- Slide Content Container -->
                    <div class="relative min-h-[400px] flex flex-col justify-center">
                        
                        <!-- Slide 1 -->
                        <div id="slide-1" class="slide-content active">
                            <h1 class="text-5xl lg:text-7xl font-bold mb-6">
                                Code Verse On <span class="text-p1">Go</span>
                            </h1>
                            <p class="text-xl lg:text-2xl text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                                Selamat Datang Para Calon Developer 🙌🏻
                            </p>
                        </div>

                        <!-- Slide 2 -->
                        <div id="slide-2" class="slide-content absolute inset-0 flex flex-col justify-center">
                            <h1 class="text-4xl lg:text-6xl font-bold mb-6">
                                Tahu Engga sih?? Kalau Di <span class="text-p1">CODE VERSE</span> tuh gratis
                            </h1>
                            <p class="text-xl lg:text-2xl text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                                Temukan Beberapa Materi dengan gratis
                            </p>
                        </div>

                        <!-- Slide 3 -->
                        <div id="slide-3" class="slide-content absolute inset-0 flex flex-col justify-center">
                            <h1 class="text-5xl lg:text-7xl font-bold mb-6">
                                Siapp<span class="text-p1">????</span>
                            </h1>
                            <p class="text-xl lg:text-2xl text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                                YUKSS KLIK MULAI 🙌🏻
                            </p>
                        </div>

                        <!-- Pagination Dots -->
                        <div class="flex justify-center lg:justify-start items-center gap-4 mb-12">
                            <div class="pagination-dot active" data-slide="1"></div>
                            <div class="pagination-dot" data-slide="2"></div>
                            <div class="pagination-dot" data-slide="3"></div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex justify-between items-center">
                            <button class="skip-btn text-p2 dark:text-p1 font-bold text-lg hover:underline">
                              <a href="{{ url('/desktop/lorek-desktop') }}"></a>
                                Skip
                            </button>
                            <button id="nextBtn" class="next-btn bg-p2 text-white rounded-full p-4 text-2xl shadow-lg">
                                <i class="ph ph-arrow-right"></i>
                                <a href="{{ url('/desktop/lorek-desktop') }}"></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Bottom Navigation (Hidden on Desktop) -->
        <div class="lg:hidden fixed bottom-8 left-0 right-0 px-6">
            <div class="glass-effect rounded-2xl p-6">
                <div class="flex justify-center items-center gap-4 mb-6">
                    <div class="pagination-dot active" data-slide="1"></div>
                    <div class="pagination-dot" data-slide="2"></div>
                    <div class="pagination-dot" data-slide="3"></div>
                </div>
                <div class="flex justify-between items-center">
                    <button class="skip-btn text-p2 dark:text-p1 font-bold">Skip</button>
                    <button class="next-btn bg-p2 text-white rounded-full p-3 text-xl">
                        <i class="ph ph-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/custom/landing-desk.js') }}"></script>
</body>
</html>