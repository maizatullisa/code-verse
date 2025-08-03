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
<body class="bg-black text-white min-h-screen">
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
                    @if (!View::hasSection('hideSidebar'))
                    <button class="sidebarModalOpenButton text-3xl text-white">
                        <i class="ph ph-list"></i>
                    </button>
                    @endif
                    <h2 class="text-3xl font-semibold text-white">@yield('page-title', 'Code Verse')</h2>
                </div>
                <div class="flex justify-start items-center gap-4">
                    <button class="text-white border border-color24 p-3 rounded-full bg-color24 hover:bg-white/20">
                        <i class="ph ph-bell text-xl"></i>
                    </button>
                    <button class="text-white border border-color24 p-3 rounded-full bg-color24 hover:bg-white/20">
                        <i class="ph ph-user text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Content Section -->
            @yield('content')
        </div>
    </div>

    <!-- Include Bottom Navigation -->
    @include('desktop.layout.navbar-bawah-desktop')

    <!-- Sidebar Modal -->
    <div id="sidebarModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-80">
        <div class="w-80 bg-white h-full overflow-y-auto">
            <div class="bg-p2 text-white p-6">
                <button onclick="closeSidebar()" class="absolute top-4 right-4 text-white hover:bg-white/20 p-2 rounded-full">
                    <i class="ph ph-x text-xl"></i>
                </button>
                <div class="flex items-center gap-3 mb-6 pt-8">
                    <img src="#" 
                         alt="User" class="w-16 h-16 rounded-full" />
                    <div>
                        <h3 class="text-xl font-bold">Budi Santoso</h3>
                        <p class="text-sm opacity-80">ID: 12345</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-white/20">
                    <div class="text-center">
                        <p class="text-sm opacity-80">Rank</p>
                        <p class="text-lg font-bold">420</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm opacity-80">Coins</p>
                        <p class="text-lg font-bold">2,420</p>
                    </div>
                </div>
            </div>
            <div class="p-4 space-y-2 text-black">
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-100 ">
                    <i class="ph ph-user text-xl text-p2"></i>
                    <span class="font-medium">Profile</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-100">
                    <i class="ph ph-bell text-xl text-p2"></i>
                    <span class="font-medium">Notifikasi</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-100">
                    <i class="ph ph-gear-six text-xl text-p2"></i>
                    <span class="font-medium">Pengaturan</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-100">
                    <i class="ph ph-chats-teardrop text-xl text-p2"></i>
                    <span class="font-medium">Chat dengan Mentor</span>
                </a>
                <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-red-50 text-red-600">
                    <i class="ph ph-sign-out text-xl"></i>
                    <span class="font-medium">Logout</span>
                </button>
            </div>
        </div>
    </div>

    <script>
        // Sidebar functionality
        document.querySelector('.sidebarModalOpenButton').addEventListener('click', function() {
            document.getElementById('sidebarModal').classList.remove('hidden');
        });

        function closeSidebar() {
            document.getElementById('sidebarModal').classList.add('hidden');
        }

        // Close sidebar when clicking outside
        document.getElementById('sidebarModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSidebar();
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>