<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Code Verse - Desktop</title>
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
    </style>
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
                    <button class="sidebarModalOpenButton text-3xl text-white">
                        <i class="ph ph-list"></i>
                    </button>
                    <h2 class="text-3xl font-semibold text-white">Code Verse</h2>
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

            <!-- Search Box -->
            <div class="flex justify-center items-center gap-4 px-6 relative z-20 max-w-4xl mx-auto mb-8">
                <div class="flex justify-start items-center gap-4 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
                    <i class="ph ph-magnifying-glass text-xl"></i>
                    <span class="text-white w-full text-base">Cari Materi</span>
                </div>
                <button class="bg-color24 border border-color24 p-4 rounded-full text-white hover:bg-white/20">
                    <i class="ph ph-sliders-horizontal text-xl"></i>
                </button>
            </div>
            <p class="text-white text-center text-lg font-semibold mb-12">
                Platform Pembelajaran Online Untuk Para Coder
            </p>

            <!-- KATEROGI (BULET BULET) -->
            <div class="mb-16">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
                    <div class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer">
                        <div class="w-20 h-20 bg-gradient-to-r from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-lg">
                            <i class="ph ph-music-note text-white text-3xl"></i>
                        </div>
                        <p class="text-sm font-semibold text-white">Music Quiz</p>
                    </div>

                    <div class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer">
                        <div class="w-20 h-20 bg-gradient-to-r from-orange-400 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                            <i class="ph ph-puzzle-piece text-white text-3xl"></i>
                        </div>
                        <p class="text-sm font-semibold text-white">Puzzle Quiz</p>
                    </div>

                    <div class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                            <i class="ph ph-translate text-white text-3xl"></i>
                        </div>
                        <p class="text-sm font-semibold text-white">Language Quiz</p>
                    </div>

                    <div class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer">
                        <div class="w-20 h-20 bg-gradient-to-r from-purple-400 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                            <i class="ph ph-image text-white text-3xl"></i>
                        </div>
                        <p class="text-sm font-semibold text-white">Picture Quiz</p>
                    </div>
                </div>

                <!-- SVG POTO -->
                <div class="flex justify-center items-center mt-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="202" height="50">
                        <path d="M76.388 35.94C75.9671 37.043 74.7305 37.599 73.6407 37.145C70.8225 35.972 68.0826 34.618 65.4379 33.094C64.4153 32.504 64.1052 31.184 64.7252 30.18V30.18C65.3453 29.175 66.6606 28.867 67.6844 29.454C70.0989 30.84 72.5974 32.074 75.1655 33.149C76.2544 33.605 76.8088 34.837 76.388 35.94V35.94Z" fill="#141414" fill-opacity="0.16" />
                        <path d="M124.225 36.48C124.629 37.59 124.057 38.82 122.936 39.19C110.033 43.452 96.1783 43.936 83.0093 40.584C81.8653 40.293 81.2096 39.106 81.535 37.971V37.971C81.8604 36.836 83.0434 36.184 84.1878 36.473C96.4884 39.579 109.42 39.127 121.474 35.171C122.595 34.803 123.821 35.371 124.225 36.48V36.48Z" fill="#FF710F" />
                        <path d="M141.502 27.326C142.203 28.276 142.002 29.617 141.031 30.288C138.52 32.024 135.9 33.597 133.187 34.996C132.138 35.537 130.86 35.084 130.35 34.02V34.02C129.84 32.955 130.291 31.682 131.339 31.139C133.811 29.858 136.2 28.424 138.493 26.845C139.465 26.176 140.802 26.376 141.502 27.326V27.326Z" fill="#141414" fill-opacity="0.16" />
                    </svg>
                </div>
            </div>

            <!-- KARTU PROMO BISA DI PAKAI / ENGGA -->
            <div class="px-6 mb-12">
                <div class="max-w-4xl mx-auto bg-p2 rounded-2xl p-8 relative overflow-hidden">
                    <div class="absolute inset-0 bg-p2 opacity-30 rounded-2xl transform translate-x-2 translate-y-2"></div>
                    <div class="absolute inset-0 bg-p2 opacity-20 rounded-2xl transform translate-x-4 translate-y-4"></div>
                    <div class="relative flex justify-between items-center">
                        <div class="text-white font-semibold">
                            <p class="text-xl mb-2">Ajak Temanmu</p>
                            <p class="text-5xl font-bold mb-2">20%</p>
                            <p class="text-xl">dapatkan diskon</p>
                        </div>
                        <div>
                            <img src="#" 
                                 alt="Invite Illustration" class="w-40 h-32 object-cover rounded-lg" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- REKOMENDASI MATERI -->
            <div class="px-6 mb-12">
                <div class="max-w-6xl mx-auto">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center gap-3">
                            <i class="ph-fill ph-trophy text-2xl text-p1"></i>
                            <h3 class="text-2xl font-semibold">Rekomendasi Materi</h3>
                        </div>
                        <a href="#" class="text-p1 font-semibold text-lg hover:underline">Lihat Semua</a>
                    </div>
                    
                    <div class="max-w-3xl mx-auto">
                        <div class="rounded-2xl overflow-hidden shadow2 bg-white text-black hover:transform hover:scale-105 transition-all">
                            <div class="flex justify-between items-center py-5 px-8 bg-p2 bg-opacity-20">
                                <div class="flex items-center gap-4">
                                    <p class="font-medium text-lg">mulai</p>
                                    <div class="flex items-center gap-2">
                                        <span class="bg-p2 bg-opacity-20 text-p2 px-3 py-1 rounded-md font-bold">05</span>
                                        <span class="text-p2 font-bold">:</span>
                                        <span class="bg-p2 bg-opacity-20 text-p2 px-3 py-1 rounded-md font-bold">14</span>
                                        <span class="text-p2 font-bold">:</span>
                                        <span class="bg-p2 bg-opacity-20 text-p2 px-3 py-1 rounded-md font-bold">20</span>
                                    </div>
                                </div>
                                <p class="text-p1 font-semibold">Baca Instruksi</p>
                            </div>
                            <div class="p-8">
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="bg-p2 text-white p-3 rounded-lg">
                                        <p class="font-bold text-sm">19 Jun</p>
                                        <p class="text-xs">04.32</p>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg">Quiz</h4>
                                        <p class="text-gray-600">Dasar Dasar Pemrograman</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-8 py-6 border-y border-dashed border-gray-300">
                                    <div class="text-center">
                                        <p class="text-gray-600 text-sm">Waktu Maksimal</p>
                                        <p class="font-bold text-lg">5 min</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-gray-600 text-sm">Soal</p>
                                        <p class="font-bold text-lg">5</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-gray-600 text-sm">No of Contest</p>
                                        <p class="font-bold text-lg">1</p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center pt-6">
                                    <div class="flex items-center gap-2">
                                        <i class="ph ph-brain text-p2 text-xl"></i>
                                        <span class="text-gray-600">Trivia Quiz</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <button class="text-gray-600 hover:text-p2">
                                            <i class="ph ph-bell-ringing text-xl"></i>
                                        </button>
                                        <button class="text-gray-600 hover:text-p2">
                                            <i class="ph ph-share-network text-xl"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PENGAJAR TERBAIK -->
            <div class="px-6 mb-20">
                <div class="max-w-6xl mx-auto">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center gap-3">
                            <i class="ph-fill ph-trophy text-2xl text-p1"></i>
                            <h3 class="text-2xl font-semibold">Pengajar Terbaik</h3>
                        </div>
                        <a href="#" class="text-p1 font-semibold text-lg hover:underline">Lihat Semua</a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- PENGAJAR 1 -->
                        <div class="bg-white text-black p-6 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                            <div class="flex justify-between items-center mb-4 pb-4 border-b border-dashed border-gray-300">
                                <div class="bg-yellow-100 border border-yellow-200 px-3 py-1 rounded-full flex items-center gap-1">
                                    <i class="ph-fill ph-trophy text-p1"></i>
                                    <span class="text-xs font-bold text-p2">#1</span>
                                </div>
                                <img src="https://flagcdn.com/w40/id.png" alt="Flag" class="w-6" />
                            </div>
                            <div class="text-center">
                                <div class="relative inline-block mb-4">
                                    <img src="#" 
                                         alt="Budi" class="w-16 h-16 rounded-full mx-auto" />
                                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center">
                                        <i class="ph-fill ph-medal text-xs"></i>
                                    </div>
                                </div>
                                <h4 class="font-bold mb-1">Budi</h4>
                                <p class="text-gray-600 text-sm mb-4">Fullstack Developer</p>
                                <button class="bg-p2 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                    Follow
                                </button>
                            </div>
                        </div>

                        <!-- PENGAJAR 2 -->
                        <div class="bg-white text-black p-6 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                            <div class="flex justify-between items-center mb-4 pb-4 border-b border-dashed border-gray-300">
                                <div class="bg-gray-100 border border-gray-200 px-3 py-1 rounded-full flex items-center gap-1">
                                    <i class="ph-fill ph-trophy text-gray-500"></i>
                                    <span class="text-xs font-bold text-gray-700">#2</span>
                                </div>
                                <img src="https://flagcdn.com/w40/id.png" alt="Flag" class="w-6" />
                            </div>
                            <div class="text-center">
                                <div class="relative inline-block mb-4">
                                    <img src="#" 
                                         alt="Andi" class="w-16 h-16 rounded-full mx-auto" />
                                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-gray-400 rounded-full flex items-center justify-center">
                                        <i class="ph-fill ph-medal text-xs text-white"></i>
                                    </div>
                                </div>
                                <h4 class="font-bold mb-1">Andi</h4>
                                <p class="text-gray-600 text-sm mb-4">AI Engineer</p>
                                <button class="bg-p2 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                    Follow
                                </button>
                            </div>
                        </div>

                        <!-- PENGAJAR 3 -->
                        <div class="bg-white text-black p-6 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                            <div class="flex justify-between items-center mb-4 pb-4 border-b border-dashed border-gray-300">
                                <div class="bg-orange-100 border border-orange-200 px-3 py-1 rounded-full flex items-center gap-1">
                                    <i class="ph-fill ph-trophy text-orange-500"></i>
                                    <span class="text-xs font-bold text-orange-700">#3</span>
                                </div>
                                <img src="https://flagcdn.com/w40/gb.png" alt="Flag" class="w-6" />
                            </div>
                            <div class="text-center">
                                <div class="relative inline-block mb-4">
                                    <img src="#" 
                                         alt="Dedi" class="w-16 h-16 rounded-full mx-auto" />
                                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-orange-400 rounded-full flex items-center justify-center">
                                        <i class="ph-fill ph-medal text-xs text-white"></i>
                                    </div>
                                </div>
                                <h4 class="font-bold mb-1">Dedi</h4>
                                <p class="text-gray-600 text-sm mb-4">Security Engineer</p>
                                <button class="bg-p2 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                    Follow
                                </button>
                            </div>
                        </div>

                        <!-- PENGAJAR 4 -->
                        <div class="bg-white text-black p-6 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                            <div class="flex justify-between items-center mb-4 pb-4 border-b border-dashed border-gray-300">
                                <div class="bg-green-100 border border-green-200 px-3 py-1 rounded-full flex items-center gap-1">
                                    <i class="ph-fill ph-trophy text-green-500"></i>
                                    <span class="text-xs font-bold text-green-700">#4</span>
                                </div>
                                <img src="https://flagcdn.com/w40/id.png" alt="Flag" class="w-6" />
                            </div>
                            <div class="text-center">
                                <div class="relative inline-block mb-4">
                                    <img src="#" 
                                         alt="Imam" class="w-16 h-16 rounded-full mx-auto" />
                                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                        <i class="ph-fill ph-medal text-xs text-white"></i>
                                    </div>
                                </div>
                                <h4 class="font-bold mb-1">Imam</h4>
                                <p class="text-gray-600 text-sm mb-4">Network Engineer</p>
                                <button class="bg-p2 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                    Follow
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Navigation - Desktop Version -->
    <div class="fixed bottom-0 left-0 right-0 z-40">
        <div class="max-w-4xl mx-auto bg-p2 px-8 py-4 rounded-t-3xl flex justify-around items-center">
            <a href="#" class="flex flex-col items-center gap-2 group">
                <div class="bg-p1 p-4 rounded-full group-hover:scale-110 transition-transform">
                    <i class="ph ph-house text-2xl text-white"></i>
                </div>
                <p class="text-sm text-white font-semibold">Beranda</p>
            </a>
            <a href="#" class="flex flex-col items-center gap-2 group">
                <div class="bg-white p-4 rounded-full group-hover:scale-110 transition-transform">
                    <i class="ph ph-squares-four text-2xl text-black"></i>
                </div>
                <p class="text-sm text-white font-semibold">Library</p>
            </a>
            <a href="#" class="flex flex-col items-center gap-2 group">
                <div class="bg-white p-4 rounded-full group-hover:scale-110 transition-transform">
                    <i class="ph ph-users-three text-2xl text-black"></i>
                </div>
                <p class="text-sm text-white font-semibold">Kelas</p>
            </a>
            <a href="#" class="flex flex-col items-center gap-2 group">
                <div class="bg-white p-4 rounded-full group-hover:scale-110 transition-transform">
                    <i class="ph ph-robot text-2xl text-black"></i>
                </div>
                <p class="text-sm text-white font-semibold">Help AI</p>
            </a>
        </div>
    </div>

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
</body>
</html>