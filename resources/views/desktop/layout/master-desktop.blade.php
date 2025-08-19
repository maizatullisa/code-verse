<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>@yield('title', 'Code Verse - Desktop')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'p1': '#FF710F',
                        'p2': '#7C3AED',
                        'p3': '#8B5CF6',
                        'color24': 'rgba(255, 255, 255, 0.1)',
                        'color10': '#1F2937',
                        'color9': '#374151',
                        'color8': '#6B7280',
                        'color5': '#9CA3AF',
                        'color21': '#E5E7EB'
                    }
                }
            }
        }
    </script>
    <style>
        .shadow2 {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.0), 0 2px 4px -1px rgba(0, 0, 0, 0.0);
        }
        .quiz-category-item {
            transition: transform 0.3s ease;
        }
        .quiz-category-item:hover {
            transform: scale(1.1);
        }
        .hidden {
            display: none;
        }
        @yield('additional-styles')
    </style>
    @yield('head-scripts')
</head>
<body class="bg-gradient-to-b from-purple-600 via-purple-100 to-white text-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto min-h-screen relative overflow-hidden py-8 px-4">
        
        <!-- Background Blur Elements -->
        <div class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px] opacity-50"></div>
        <div class="absolute top-40 right-0 bg-cyan-400 blur-[150px] h-[174px] w-[91px] opacity-50"></div>
        <div class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px] opacity-50"></div>
        <div class="absolute bottom-20 right-0 bg-p3 blur-[220px] h-[174px] w-[149px] opacity-50"></div>

        <!-- Header Section -->
        <div class="relative z-10 pb-8">
            <div class="flex justify-between items-center gap-4 px-6 relative z-20 mb-6">
                <div class="flex justify-start items-center gap-4">
                    
                    
                    {{-- Back button khusus untuk halaman user-desktop --}}
                    @if(Request::is('desktop/user-desktop') || Request::is('desktop/user-desktop/*'))
                    <a href="{{ url('/desktop/home-desktop') }}" class="text-white hover:text-gray-300 transition-colors duration-200 mr-2">
                        <i class="ph ph-arrow-left text-3xl"></i>
                    </a>
                    @endif
                    
                    <h2 class="text-3xl font-semibold text-white">@yield('page-title', 'Code Verse')</h2>
                </div>
                <div class="flex justify-start items-center gap-4">
                    @if(!Request::is('desktop/user-desktop') && !Request::is('desktop/user-desktop/*'))
                    <a href="{{ url('/desktop/user-desktop') }}" class="text-white border border-color24 p-3 rounded-full bg-color24 hover:bg-white/20 transition-colors duration-200">
                        <i class="ph ph-user text-xl"></i>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Content Section -->
            @yield('content')
        </div>
    </div>

    <!-- Include Bottom Navigation -->
    @include('desktop.layout.navbar-bawah-desktop')

    <!-- Sidebar Modal -->


    <script>
    @yield('scripts')
</body>
</html>