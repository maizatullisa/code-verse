<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Code Verse - Landing Page</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/custom/landing.css') }}">
    <style>
        /* Custom responsive styles */
        @media (max-width: 640px) {
            .blur-orb {
                width: 80px !important;
                height: 80px !important;
            }
            .floating-icon {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .orbiting-element {
                width: 48px !important;
                height: 48px !important;
            }
            .orbiting-element img {
                width: 32px !important;
                height: 32px !important;
            }
        }
        
        .slide-content {
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }
        
        .slide-content:not(.active) {
            opacity: 0;
            transform: translateX(20px);
        }
        
        .slide-content.active {
            opacity: 1;
            transform: translateX(0);
        }
        
        .pagination-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(156, 163, 175, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .pagination-dot.active {
            background: #8b5cf6;
            transform: scale(1.2);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
        }
        
        .blur-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.6;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-icon {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        /* Hide scrollbar but allow scrolling */
        body {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        body::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-white dark:bg-black dark:text-white overflow-hidden">
    <div class="min-h-screen relative">
        <!-- Background Blur Orbs -->
        <div class="blur-orb bg-purple-400 w-24 h-24 sm:w-32 sm:h-32 lg:w-40 lg:h-40 top-0 left-0" style="animation-delay: 0s;"></div>
        <div class="blur-orb bg-cyan-400 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 top-20 sm:top-40 right-0" style="animation-delay: 2s;"></div>
        <div class="blur-orb bg-purple-600 w-28 h-28 sm:w-36 sm:h-36 lg:w-48 lg:h-48 top-40 sm:top-80 right-20 sm:right-40" style="animation-delay: 4s;"></div>
        <div class="blur-orb bg-purple-400 w-24 h-24 sm:w-32 sm:h-32 lg:w-40 lg:h-40 bottom-0 right-0" style="animation-delay: 1s;"></div>

        <!-- Floating Icons - Hidden on mobile -->
        <div class="floating-icon absolute left-4 sm:left-8 bottom-1/2 z-10 hidden sm:block" style="animation-delay: 0.5s;">
            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-orange-400 rounded-full flex items-center justify-center shadow-lg">
                <i class="ph ph-code text-white text-lg sm:text-2xl"></i>
            </div>
        </div>
        <div class="floating-icon absolute right-4 sm:right-8 bottom-1/3 z-10 hidden sm:block" style="animation-delay: 1.5s;">
            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-purple-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="ph ph-lightning text-white text-lg sm:text-2xl"></i>
            </div>
        </div>
        <div class="floating-icon absolute top-1/4 left-1/4 z-10 hidden lg:block" style="animation-delay: 2.5s;">
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-cyan-400 rounded-full flex items-center justify-center shadow-lg">
                <i class="ph ph-star text-white text-sm sm:text-lg"></i>
            </div>
        </div>

        <!-- Main Content Container -->
        <div class="flex items-center justify-center min-h-screen relative z-20 px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center max-w-7xl mx-auto w-full">
                
                <!-- Left Side - Illustration -->
                <div class="relative order-2 lg:order-1">
                    <div class="relative z-10 flex items-center justify-center">
                        <!-- Main Illustration Circle -->
                        <div class="relative w-64 h-64 sm:w-80 sm:h-80 md:w-96 md:h-96 lg:w-[500px] lg:h-[500px]">
                            <!-- Central Planet -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-48 h-48 sm:w-64 sm:h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-full gradient-bg flex items-center justify-center shadow-2xl">
                                    <div class="text-center text-white">
                                        <div class="text-3xl sm:text-4xl md:text-6xl lg:text-8xl font-bold mb-2 lg:mb-4">CV</div>
                                        <div class="text-sm sm:text-base md:text-xl lg:text-2xl font-semibold">Code Verse</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Orbiting Elements -->
                            <div class="absolute inset-0 animate-spin" style="animation-duration: 20s;">
                                <!-- Laravel Logo -->
                                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <div class="orbiting-element w-12 h-12 sm:w-16 sm:h-16 lg:w-20 lg:h-20 rounded-full bg-white shadow-lg overflow-hidden border-2 border-white flex items-center justify-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="laravel" class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 object-contain">
                                    </div>
                                </div>

                                <!-- Orange Diamond -->
                                <div class="absolute top-1/4 right-0 transform translate-x-4 sm:translate-x-6 lg:translate-x-8 -translate-y-1/2">
                                    <div class="orbiting-element w-12 h-12 sm:w-16 sm:h-16 lg:w-20 lg:h-20 bg-orange-400 rounded-lg flex items-center justify-center shadow-lg">
                                        <i class="ph ph-diamond text-white text-sm sm:text-lg lg:text-xl"></i>
                                    </div>
                                </div>
                                
                                <!-- PostgreSQL -->
                                <div class="absolute bottom-1/4 right-0 transform translate-x-4 sm:translate-x-6 lg:translate-x-8 translate-y-1/2">
                                    <div class="orbiting-element w-10 h-10 sm:w-12 sm:h-12 lg:w-16 lg:h-16 rounded-full bg-white shadow-lg overflow-hidden flex items-center justify-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/29/Postgresql_elephant.svg" alt="postgresql" class="w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10 object-contain">
                                    </div>
                                </div>

                                <!-- Purple Crown -->
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-4 sm:translate-y-6 lg:translate-y-8">
                                    <div class="orbiting-element w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                        <i class="ph ph-crown text-white text-sm sm:text-lg lg:text-xl"></i>
                                    </div>
                                </div>
                                
                                <!-- React -->
                                <div class="absolute bottom-1/4 left-0 transform -translate-x-4 sm:-translate-x-6 lg:-translate-x-8 translate-y-1/2">
                                    <div class="orbiting-element w-12 h-12 sm:w-16 sm:h-16 lg:w-20 lg:h-20 rounded-full bg-white shadow-lg overflow-hidden border-2 border-white flex items-center justify-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg" alt="react" class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 object-contain">
                                    </div>
                                </div>
                                
                                <!-- Cyan Lightning -->
                                <div class="absolute top-1/4 left-0 transform -translate-x-4 sm:-translate-x-6 lg:-translate-x-8 -translate-y-1/2">
                                    <div class="orbiting-element w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-cyan-400 rounded-full flex items-center justify-center shadow-lg">
                                        <i class="ph ph-lightning text-white text-sm sm:text-lg lg:text-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Content -->
                <div class="text-center lg:text-left order-1 lg:order-2">
                    <!-- Slide Content Container -->
                    <div class="relative min-h-[300px] sm:min-h-[400px] flex flex-col justify-center">
                        
                        <!-- Slide 1 -->
                        <div id="slide-1" class="slide-content active">
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-bold mb-4 sm:mb-6">
                                Code Verse On <span class="text-purple-600">Go</span>
                            </h1>
                            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-600 dark:text-gray-300 mb-6 sm:mb-8 leading-relaxed">
                                Selamat Datang Para Calon Developer 🙌🏻
                            </p>
                        </div>

                        <!-- Slide 2 -->
                        <div id="slide-2" class="slide-content absolute inset-0 flex flex-col justify-center">
                            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-6xl font-bold mb-4 sm:mb-6">
                                Tahu Engga sih?? Kalau Di <span class="text-purple-600">CODE VERSE</span> tuh gratis
                            </h1>
                            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-600 dark:text-gray-300 mb-6 sm:mb-8 leading-relaxed">
                                Temukan Beberapa Materi dengan gratis
                            </p>
                        </div>

                        <!-- Slide 3 -->
                        <div id="slide-3" class="slide-content absolute inset-0 flex flex-col justify-center">
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-bold mb-4 sm:mb-6">
                                Siapp<span class="text-purple-600">????</span>
                            </h1>
                            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-600 dark:text-gray-300 mb-6 sm:mb-8 leading-relaxed">
                                YUKSS KLIK MULAI 🙌🏻
                            </p>
                        </div>

                        <!-- Pagination Dots - Desktop -->
                        <div class="hidden lg:flex justify-center lg:justify-start items-center gap-3 sm:gap-4 mb-8 sm:mb-12">
                            <div class="pagination-dot active" data-slide="1"></div>
                            <div class="pagination-dot" data-slide="2"></div>
                            <div class="pagination-dot" data-slide="3"></div>
                        </div>

                        <!-- Navigation Buttons - Desktop -->
                        <div class="hidden lg:flex justify-between items-center">
                            <button class="skip-btn text-purple-600 dark:text-purple-400 font-bold text-base sm:text-lg hover:underline">
                              <a href="{{ url('/desktop/lorek-desktop') }}"></a>
                                Skip
                            </button>
                            <button onclick="nextSlide()"
                            id="nextBtn" class="next-btn bg-purple-600 text-white rounded-full p-3 sm:p-4 text-xl sm:text-2xl shadow-lg hover:bg-purple-700 transition-colors">
                                <i class="ph ph-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Bottom Navigation -->
        <div class="lg:hidden fixed bottom-4 sm:bottom-8 left-4 right-4 sm:left-6 sm:right-6 z-30">
            <div class="glass-effect rounded-2xl p-4 sm:p-6">
                <div class="flex justify-center items-center gap-3 sm:gap-4 mb-4 sm:mb-6">
                    <div class="pagination-dot active" data-slide="1"></div>
                    <div class="pagination-dot" data-slide="2"></div>
                    <div class="pagination-dot" data-slide="3"></div>
                </div>
                <div class="flex justify-between items-center">
                    <button class="skip-btn text-purple-600 dark:text-purple-400 font-bold text-sm sm:text-base">
                        <a href="{{ url('/desktop/lorek-desktop') }}">Skip</a>
                    </button>
                    <button onclick="nextSlide()" class="next-btn bg-purple-600 text-white rounded-full p-2 sm:p-3 text-lg sm:text-xl hover:bg-purple-700 transition-colors">
                        <i class="ph ph-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/custom/landing-desk.js') }}"></script>
</body>
</html>