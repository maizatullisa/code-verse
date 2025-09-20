<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verse-Materi</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        
        /* Mobile sidebar overlay */
        .mobile-sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        
        .mobile-sidebar.open {
            transform: translateX(0);
        }
        
        /* Prevent scroll when sidebar is open */
        body.sidebar-open {
            overflow: hidden;
        }
        
        /* Mobile-friendly video */
        video {
            max-width: 100%;
            height: auto;
        }
        
        /* Better mobile text readability */
        @media (max-width: 640px) {
            .mobile-text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem;
            }
        }
    </style>
</head>
<body data-course-id="{{ $kelas->id }}" class="bg-gray-50">
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>
    
    <!-- Header with Dynamic Progress -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-30">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3 sm:py-4">
            <!-- Mobile Header -->
            <div class="flex items-center justify-between mb-3 lg:hidden">
                <div class="flex items-center gap-3">
                    <button onclick="history.back()" class="text-gray-600 hover:text-p2 transition-colors p-1">
                        <i class="ph ph-arrow-left text-lg"></i>
                    </button>
                    <div class="flex-1 min-w-0">
                        <h1 class="font-bold text-base text-gray-800 truncate" id="courseTitle">{{ $kelas->nama_kelas }}</h1>
                        <p class="text-xs text-gray-600 truncate" id="weekInfo">Week {{ $weekNumber ?? '-' }}: {{ $currentMateri->judul ?? 'Materi belum tersedia' }}</p>
                    </div>
                </div>
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-p2 transition-colors p-2">
                    <i class="ph ph-list text-xl"></i>
                </button>
            </div>
            
            <!-- Desktop Header -->
            <div class="hidden lg:flex items-center justify-between mb-3">
                <div class="flex items-center gap-4">
                    <button onclick="history.back()" class="text-gray-600 hover:text-p2 transition-colors">
                        <i class="ph ph-arrow-left text-xl"></i>
                    </button>
                    <div>
                        <h1 class="font-bold text-lg text-gray-800" id="courseTitle">{{ $kelas->nama_kelas }}</h1>
                        <!-- <p class="text-sm text-gray-600" id="weekInfo">Week {{ $weekNumber ?? '-' }}: {{ $currentMateri->judul ?? 'Materi belum tersedia' }}</p> -->
                    </div>
                </div>
            </div>
            
            <!-- Progress Section -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-6">
                <!-- Forum Button -->
                <a href="{{ route('desktop.pages.forum.forum-siswa', $kelas->id) }}" 
                   class="bg-gradient-to-r from-p2 to-p3 text-white px-4 py-2 rounded-xl font-semibold hover:opacity-90 transition-all text-sm w-full sm:w-auto text-center">
                    Forum Diskusi
                </a>
                
                <!-- Progress Info -->
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <div class="text-xs sm:text-sm text-gray-600 whitespace-nowrap">
                        <span class="font-semibold" id="completed-count">{{ $completedCount }}</span> / <span id="total-count">{{ $totalMateri }}</span> Materi
                    </div>
                    <div class="flex-1 sm:w-24 lg:w-32 bg-gray-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-p2 to-p3 h-2 rounded-full transition-all duration-500" id="progress-bar" style="width: {{ $progressPercentage }}%"></div>
                    </div>
                    <span class="text-xs sm:text-sm font-semibold text-p2 whitespace-nowrap" id="progress-text">{{ $progressPercentage }}%</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 sm:py-6">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 lg:gap-6">
            <!-- Mobile Sidebar -->
            <div id="mobile-sidebar" class="fixed inset-y-0 left-0 z-50 w-80 bg-white shadow-xl mobile-sidebar lg:hidden">
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
                    <h3 class="font-bold text-gray-800">Konten Kelas</h3>
                    <button id="close-sidebar" class="text-gray-600 hover:text-p2">
                        <i class="ph ph-x text-xl"></i>
                    </button>
                </div>
                <div class="p-2 border-b border-gray-100">
                    <p class="text-xs text-gray-500">{{ $kelas->pengajar->first_name }}</p>
                </div>
                <div class="max-h-[calc(100vh-140px)] overflow-y-auto" id="mobile-course-content">
                    @foreach($materiMingguIni as $index => $materi)
                        @php
                            $isCompleted = $progressData->has($materi->id) && $progressData[$materi->id]->status === 'completed';
                            $isActive = $currentMateri && $currentMateri->id === $materi->id;
                        @endphp
                        <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id, 'materiId' => $materi->id]) }}" 
                            class="block px-4 py-3 border-b border-gray-100 hover:bg-gray-50 transition
                            {{ $isActive ? 'bg-p2 text-white hover:bg-p2' : 'text-gray-700' }}">
                            <div class="flex items-center gap-2">
                                <span class="text-sm">Materi {{ $index + 1 }} - {{ $materi->judul }}</span>
                                @if($isCompleted)
                                    <i class="ph ph-check-circle text-green-500 ml-auto flex-shrink-0"></i>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Desktop Sidebar -->
            <div class="hidden lg:block lg:col-span-1">
                <div class="bg-white rounded-xl shadow2 sticky top-24">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="font-bold text-gray-800">Konten Kelas</h3>
                        <p class="text-xs text-gray-500 mt-1">{{ $kelas->pengajar->first_name }}</p>
                    </div>
                    <div class="max-h-96 overflow-y-auto" id="course-content">
                        @foreach($materiMingguIni as $index => $materi)
                            @php
                                $isCompleted = $progressData->has($materi->id) && $progressData[$materi->id]->status === 'completed';
                                $isActive = $currentMateri && $currentMateri->id === $materi->id;
                            @endphp
                            <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id, 'materiId' => $materi->id]) }}" 
                                class="block px-4 py-2 border-b border-gray-100 hover:bg-gray-100 rounded transition
                                {{ $isActive ? 'bg-p2 text-white' : 'text-gray-700' }}">
                                <div class="flex items-center gap-2">
                                    <span>Materi {{ $index + 1 }} - {{ $materi->judul }}</span>
                                    @if($isCompleted)
                                        <i class="ph ph-check-circle text-green-500 ml-auto"></i>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-3 w-full min-w-0">
                <!-- Material Header -->
                <div class="bg-white rounded-xl shadow2 mb-4 sm:mb-6">
                    <div class="p-4 sm:p-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-3">
                            <div class="min-w-0 flex-1">
                                <h2 class="font-bold text-lg sm:text-xl text-gray-800 mb-1" id="material-title">{{ $currentMateri->judul ?? 'Belum ada materi' }}</h2>
                                <!-- @if($currentMateri)
                                <p class="text-gray-600 text-sm" id="material-info">
                                    Durasi: {{ $currentMateri->durasi ?? 'N/A' }} menit • {{ ucfirst($currentMateri->tipe ?? 'Materi') }}
                                </p>
                                @endif -->
                            </div>
                            <div class="flex-shrink-0">
                                <span id="material-type-badge" class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs sm:text-sm">
                                    @if($currentMateri)
                                        @if(pathinfo($currentMateri->file_path ?? '', PATHINFO_EXTENSION) === 'pdf')
                                            Artikel
                                        @else
                                            Video
                                        @endif
                                    @endif
                                </span>
                            </div>
                        </div>

                        <!-- Content Display Area -->
                        <div id="content-display" class="mb-6">
                            @if($currentMateri)
                                <h3 class="text-base sm:text-lg font-semibold mb-2">{{ $currentMateri->judul }}</h3>
                                <p class="text-gray-600 mb-4 text-sm sm:text-base">{{ $currentMateri->deskripsi }}</p>

                               @if($currentMateri->file_path)
                                @php
                                    $ext = pathinfo($currentMateri->file_path, PATHINFO_EXTENSION);
                                @endphp

                                {{-- Tampilkan hanya PDF --}}
                                @if($ext === 'pdf')
                                    <div class="w-full">
                                        <iframe src="{{ asset('storage/' . $currentMateri->file_path) }}" class="w-full h-64 sm:h-96 rounded-lg"></iframe>
                                    </div>
                                @endif
                            @endif

                                 {{-- VIDEO YOUTUBE --}}
                                @if($currentMateri->video_url)
                                    <div class="mb-6">
                                        <div class="relative w-full" style="padding-bottom: 56.25%;">
                                            <iframe 
                                                src="{{ $currentMateri->video_url }}" 
                                                title="YouTube video player"
                                                class="absolute top-0 left-0 w-full h-full rounded-xl"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                @endif


                                {{-- Quiz jika ada --}}
                                @if($currentQuiz)
                                    <div class="mt-6 p-4 border border-gray-300 rounded-lg">
                                        <h4 class="font-semibold text-base sm:text-lg mb-1">Quiz: {{ $currentQuiz->judul }}</h4>
                                        <p class="text-gray-600 text-sm sm:text-base mb-3">{{ $currentQuiz->deskripsi }}</p>

                                        <a href="{{ route('student.quiz.index', [$kelas->id, $currentMateri->id]) }}"
                                           class="inline-block bg-p2 text-white px-4 sm:px-5 py-2 rounded-lg font-semibold hover:bg-p3 transition-all text-sm sm:text-base">
                                            Mulai Quiz
                                        </a>
                                    </div>
                                @endif
                            @else
                                <p class="text-gray-500 text-sm sm:text-base">Materi belum tersedia.</p>
                            @endif

                            {{-- Tombol Sertifikat --}}
                            @if($canGraduate)
                                <div class="mt-6">
                                    <a href="{{ route('desktop.pages.sertifikat.form-sertif', $kelas->id) }}" 
                                       class="bg-green-500 hover:bg-green-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-semibold transition-all flex items-center gap-2 w-full sm:w-auto justify-center text-sm sm:text-base">
                                        <i class="ph ph-certificate"></i>
                                        Download Sertifikat
                                    </a>
                                </div>
                            @else
                                <div class="mt-6 p-3 sm:p-4 bg-yellow-100 text-yellow-800 rounded-lg text-sm sm:text-base">
                                    Selesaikan semua materi dan quiz minimal 70 untuk mendapatkan sertifikat.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Navigation Controls -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 sm:gap-0">
                    {{-- Tombol Previous --}}
                    @if($hasPrevious && $prevMateri)
                        <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id, 'materiId' => $prevMateri->id]) }}" 
                           class="flex items-center justify-center gap-2 text-gray-600 hover:text-p2 transition-colors py-2 px-4 border border-gray-300 rounded-lg sm:border-0 sm:p-0 text-sm sm:text-base">
                            <i class="ph ph-arrow-left"></i>
                            <span>Materi Sebelumnya</span>
                        </a>
                    @else
                        <span class="flex items-center justify-center gap-2 text-gray-400 cursor-not-allowed py-2 px-4 border border-gray-200 rounded-lg sm:border-0 sm:p-0 text-sm sm:text-base">
                            <i class="ph ph-arrow-left"></i>
                            <span>Materi Sebelumnya</span>
                        </span>
                    @endif
                    
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        {{-- Tombol Mark Complete --}}
                        @if($currentMateri)
                        <form id="completeForm" method="POST" action="{{ route('student.materi.complete', [$kelas->id, $currentMateri->id]) }}" class="flex-1 sm:flex-none">
                            @csrf
                            <button type="submit"
                                class="w-full sm:w-auto px-4 sm:px-6 py-2 rounded-full font-semibold transition-all text-sm sm:text-base
                                    {{ $isCompleted ? 'bg-green-100 text-green-700 cursor-default' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}"
                                {{ $isCompleted ? 'disabled' : '' }}>
                                <i class="ph ph-bookmark mr-2"></i>
                                <span id="complete-text">
                                    {{ $isCompleted ? 'Sudah Selesai' : 'Tandai Selesai' }}
                                </span>
                            </button>
                        </form>
                        @endif

                        {{-- Tombol Next --}}
                        @if($hasNext && $nextMateri && $isCompleted)
                            <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id, 'materiId' => $nextMateri->id]) }}" 
                               class="bg-gradient-to-r from-p2 to-p3 text-white px-4 sm:px-6 py-2 rounded-full font-semibold hover:opacity-90 transition-all flex items-center justify-center gap-2 text-sm sm:text-base">
                                <span>Lanjut ke Materi</span>
                                <i class="ph ph-arrow-right"></i>
                            </a>
                        @elseif($hasNext && $nextMateri)
                            <span class="bg-gradient-to-r from-p2 to-p3 text-white px-4 sm:px-6 py-2 rounded-full font-semibold opacity-50 cursor-not-allowed flex items-center justify-center gap-2 text-sm sm:text-base">
                                <span>Lanjut ke Materi</span>
                                <i class="ph ph-arrow-right"></i>
                            </span>
                        @else
                            <span class="bg-green-500 text-white px-4 sm:px-6 py-2 rounded-full font-semibold opacity-50 cursor-not-allowed flex items-center justify-center gap-2 text-sm sm:text-base">
                                Semua materi selesai
                                <i class="ph ph-check"></i>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile sidebar functionality
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const closeSidebarBtn = document.getElementById('close-sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const body = document.body;

            function openSidebar() {
                mobileSidebar.classList.add('open');
                sidebarOverlay.classList.remove('hidden');
                body.classList.add('sidebar-open');
            }

            function closeSidebar() {
                mobileSidebar.classList.remove('open');
                sidebarOverlay.classList.add('hidden');
                body.classList.remove('sidebar-open');
            }

            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', openSidebar);
            }

            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', closeSidebar);
            }

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeSidebar);
            }

            // Close sidebar when clicking on a link (mobile)
            const mobileSidebarLinks = document.querySelectorAll('#mobile-course-content a');
            mobileSidebarLinks.forEach(link => {
                link.addEventListener('click', closeSidebar);
            });

            // Handle form submission for mark complete
            const completeForm = document.getElementById('completeForm');
            
            if (completeForm) {
                completeForm.addEventListener('submit', function(e) {
                    const button = this.querySelector('button[type="submit"]');
                    const text = this.querySelector('#complete-text');
                    
                    if (button && !button.disabled) {
                        button.disabled = true;
                        text.textContent = 'Menyimpan...';
                    }
                });
            }

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    closeSidebar();
                }
            });
        });
    </script>
</body>
</html>