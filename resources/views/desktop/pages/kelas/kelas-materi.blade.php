<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verse-Materi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        p2: '#3B82F6',
                        p3: '#1D4ED8'
                    }
                }
            }
        }
    </script>
    <style>
        .shadow2 {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header with Dynamic Progress -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-30">
        <div class="max-w-6xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-4">
                    <button onclick="history.back()" class="text-gray-600 hover:text-p2 transition-colors">
                        <i class="ph ph-arrow-left text-xl"></i>
                    </button>
                    <div>
                        <h1 class="font-bold text-lg text-gray-800" id="courseTitle">React JS Fundamental</h1>
                        <p class="text-sm text-gray-600" id="weekInfo">Week 1: Introduction to React</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-sm text-gray-600">
                        <span class="font-semibold" id="completed-count">1</span> / <span id="total-count">15</span> materi
                    </div>
                    <div class="w-32 bg-gray-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-p2 to-p3 h-2 rounded-full transition-all duration-500" id="progress-bar" style="width: 7%"></div>
                    </div>
                    <span class="text-sm font-semibold text-p2" id="progress-text">7%</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Dynamic Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow2 sticky top-24">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="font-bold text-gray-800">Konten Kelas</h3>
                        <p class="text-xs text-gray-500 mt-1">Pengajar: <span id="instructor-name">John Doe</span></p>
                    </div>
                    <div class="max-h-96 overflow-y-auto" id="course-content">
                        <!-- Dynamic content will be loaded here -->
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-3">
                <!-- Material Header -->
                <div class="bg-white rounded-xl shadow2 mb-6">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h2 class="font-bold text-xl text-gray-800 mb-1" id="material-title">Loading...</h2>
                                <p class="text-gray-600 text-sm" id="material-info">Loading...</p>
                            </div>
                            <div class="text-sm text-gray-500">
                                <span id="material-type-badge" class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full">Video</span>
                            </div>
                        </div>

                        <!-- Content Display Area -->
                        <div id="content-display" class="mb-6">
                            <!-- Dynamic content based on material type -->
                        </div>
                    </div>
                </div>

                <!-- Navigation Controls -->
                <div class="flex items-center justify-between">
                    <button id="prevBtn" class="flex items-center gap-2 text-gray-600 hover:text-p2 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="ph ph-arrow-left"></i>
                        <span>Materi Sebelumnya</span>
                    </button>
                    
                    <div class="flex items-center gap-3">
                        <button id="markCompleteBtn" class="bg-gray-100 text-gray-700 px-6 py-2 rounded-full font-semibold hover:bg-gray-200 transition-all">
                            <i class="ph ph-bookmark mr-2"></i>
                            <span id="complete-text">Tandai Selesai</span>
                        </button>
                        <button id="nextBtn" class="bg-gradient-to-r from-p2 to-p3 text-white px-6 py-2 rounded-full font-semibold hover:opacity-90 transition-all">
                            <span id="next-text">Lanjut ke Materi</span>
                            <i class="ph ph-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Backend Integration Panel (for demo purposes) -->
    <div class="fixed top-1/2 -translate-y-1/2 right-4 bg-white rounded-xl shadow-2xl border p-4 w-80 z-40">
        <h4 class="font-bold text-gray-800 mb-3">🔧 Backend Integration Guide</h4>
        <div class="space-y-3 text-sm">
            <div class="bg-blue-50 p-3 rounded-lg">
                <strong>URL Structure:</strong><br>
                <code class="text-xs">/course/{course_id}/material/{material_id}</code>
            </div>
            <div class="bg-green-50 p-3 rounded-lg">
                <strong>API Endpoints:</strong><br>
                <code class="text-xs">GET /api/courses/{id}/materials</code><br>
                <code class="text-xs">POST /api/materials/{id}/complete</code>
            </div>
            <div class="bg-yellow-50 p-3 rounded-lg">
                <strong>Database Tables:</strong><br>
                • courses<br>
                • materials<br>
                • user_progress<br>
                • instructors
            </div>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="mt-3 text-xs text-gray-500 hover:text-gray-700">Close Guide</button>
    </div>

    <script src="{{ asset('assets/js/custom/kelas-materi.js') }}"></script>
</body>
</html>