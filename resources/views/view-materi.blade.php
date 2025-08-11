<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
    <title>{{ $materi->judul }} - {{ $kelas->nama_kelas }}</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <style>
        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
        }
        .video-container video,
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
        }
        .document-viewer {
            width: 100%;
            height: 70vh;
            border-radius: 12px;
            border: none;
        }
        .course-header-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            padding: 24px;
            color: white;
            margin-bottom: 24px;
        }
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 24px;
        }
        .progress-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: conic-gradient(#10b981 var(--progress), #e5e7eb var(--progress));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .progress-circle::before {
            content: '';
            width: 44px;
            height: 44px;
            background: white;
            border-radius: 50%;
            position: absolute;
        }
        .progress-text {
            position: relative;
            z-index: 1;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }
        .instructor-info {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 12px;
            padding: 16px;
            border-left: 4px solid #3b82f6;
        }
        .dark .course-header-card {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }
        .dark .content-card {
            background: #1f2937;
            color: #f9fafb;
        }
        .dark .instructor-info {
            background: linear-gradient(135deg, #374151 0%, #4b5563 100%);
            color: #f9fafb;
        }
        .dark .progress-circle::before {
            background: #1f2937;
        }
        .dark .progress-text {
            color: #f9fafb;
        }
    </style>
</head>
<body>
    <div class="container min-h-dvh relative overflow-hidden py-6 bg-gray-50 dark:text-white dark:bg-color1">
        
        <!-- Back Button -->
        <div class="px-6 mb-4">
            <a href="{{ route('daftar-belajar.pembelajaran', $kelas->id) }}" 
               class="inline-flex items-center gap-2 text-gray-600 dark:text-gray-300 hover:text-blue-600 transition">
                <i class="ph ph-caret-left text-lg"></i>
                <span class="text-sm font-medium">Kembali ke Kelas</span>
            </a>
        </div>

        <!-- Course Header Card -->
        <div class="px-6">
            <div class="course-header-card">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold mb-2">{{ $kelas->nama_kelas }}</h1>
                        <p class="text-white/80 text-lg">{{ $materi->judul }}</p>
                    </div>
                    @php
                        $progressValue = intval($materi->pivot->progress);
                    @endphp
                    <div class="progress-circle" style="--progress: {{ $progressValue * 3.6 }}deg;">
                        <span class="progress-text">{{ $progressValue }}%</span>
                    </div>
                </div>
                
                <!-- <div class="flex items-center justify-between">
                    <div class="instructor-info">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="ph ph-user text-white text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Pengajar:</p>
                                <p class="font-semibold text-gray-800 dark:text-white">{{ $kelas->pengajar->first_name ?? $kelas->pengajar->name }}</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="flex items-center justify-between">
                     <div style="width: 160px; height: 56px;"></div>
                    
                    <div class="text-right">
                        <p class="text-white/80 text-sm">Progress Materi</p>
                        <p class="text-xl font-bold">{{ $currentIndex + 1 }} / {{ $allMateris->count() }} materi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="px-6">
            <div class="content-card">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2 dark:text-white">Konten Kelas</h2>
                    <div class="w-12 h-1 bg-blue-500 rounded-full"></div>
                </div>
                
                @php
                    $fileExtension = strtolower(pathinfo($materi->file_name, PATHINFO_EXTENSION));
                    $videoExtensions = ['mp4', 'avi', 'mkv', 'mov', 'wmv'];
                    $isVideo = in_array($fileExtension, $videoExtensions);
                @endphp

                @if($isVideo)
                    <!-- Video Player -->
                    <div class="video-container mb-6">
                        <video 
                            id="myVideo"
                            controls 
                            width="600" 
                            preload="metadata"
                            loop
                        >
                            <source src="{{ asset('storage/' . $materi->file_path) }}" type="video/mp4">
                            Browser Anda tidak mendukung video.
                        </video>
                    </div>
                    
                    <!-- Video Controls -->
                    <div class="flex justify-center gap-3 mb-6">
                        <button id="btnSkipBack" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition flex items-center gap-2">
                            <i class="ph ph-skip-back"></i>
                            <span class="text-sm">10 detik</span>
                        </button>
                        <button id="btnSkipForward" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition flex items-center gap-2">
                            <i class="ph ph-skip-forward"></i>
                            <span class="text-sm">10 detik</span>
                        </button>
                        <button id="btnRestart" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition flex items-center gap-2">
                            <i class="ph ph-arrow-clockwise"></i>
                            <span class="text-sm">Ulang</span>
                        </button>
                    </div>
                @else
                    <!-- Document Viewer -->
                    <div class="mb-6">
                        @if($fileExtension === 'pdf')
                            <iframe src="{{ asset('storage/' . $materi->file_path) }}" class="document-viewer"></iframe>
                        @else
                            <div class="text-center py-12 bg-gray-50 dark:bg-gray-800 rounded-2xl">
                                <i class="ph ph-file text-6xl text-gray-400 mb-4"></i>
                                <p class="text-lg font-semibold mb-2 dark:text-white">{{ $materi->file_name }}</p>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">Klik tombol di bawah untuk mengunduh dan membuka file</p>
                                <a href="{{ asset('storage/' . $materi->file_path) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition"
                                   onclick="updateProgress(50)">
                                    <i class="ph ph-download"></i>
                                    Unduh & Buka File
                                </a>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Material Description -->
                <div class="border-t border-gray-200 dark:border-gray-600 pt-6">
                    <h3 class="text-lg font-semibold mb-3 dark:text-white flex items-center gap-2">
                        <i class="ph ph-book-open text-blue-500"></i>
                        Tentang Materi
                    </h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $materi->deskripsi }}</p>
                    
                    @if($materi->rangkuman)
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-xl mt-4 border-l-4 border-blue-500">
                        <h4 class="font-semibold text-blue-800 dark:text-blue-200 mb-2 flex items-center gap-2">
                            <i class="ph ph-note"></i>
                            Rangkuman
                        </h4>
                        <p class="text-blue-700 dark:text-blue-300">{{ $materi->rangkuman }}</p>
                    </div>
                    @endif
                </div>

                <!-- Mark as Complete Button -->
                @if($materi->pivot->status !== 'selesai')
                <div class="border-t border-gray-200 dark:border-gray-600 pt-6 mt-6">
                    <button onclick="completeLesson()" class="w-full bg-green-600 text-white py-4 px-6 rounded-xl hover:bg-green-700 transition font-semibold flex items-center justify-center gap-2 shadow-lg">
                        <i class="ph ph-check-circle text-xl"></i>
                        Tandai Selesai
                    </button>
                </div>
                @endif
            </div>
        </div>

        <!-- Navigation -->
        <div class="fixed bottom-0 left-0 right-0 bg-white dark:bg-color10 border-t shadow-xl">
            <div class="container flex justify-between items-center py-4 px-6">
                @if($previousMateri)
                    <a href="{{ route('pembelajaran.view-materi', [$kelas->id, $previousMateri->id]) }}" 
                       class="flex items-center gap-3 text-blue-600 hover:text-blue-700 transition group">
                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition">
                            <i class="ph ph-caret-left"></i>
                        </div>
                        <div class="text-left">
                            <div class="text-xs text-gray-500">Sebelumnya</div>
                            <div class="font-semibold text-sm">{{ \Illuminate\Support\Str::limit($previousMateri->judul, 25) }}</div>
                        </div>
                    </a>
                @else
                    <div></div>
                @endif

                @if($nextMateri)
                    <a href="{{ route('pembelajaran.view-materi', [$kelas->id, $nextMateri->id]) }}" 
                       class="flex items-center gap-3 text-blue-600 hover:text-blue-700 transition group">
                        <div class="text-right">
                            <div class="text-xs text-gray-500">Selanjutnya</div>
                            <div class="font-semibold text-sm">{{ \Illuminate\Support\Str::limit($nextMateri->judul, 25) }}</div>
                        </div>
                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition">
                            <i class="ph ph-caret-right"></i>
                        </div>
                    </a>
                @else
                    <a href="{{ route('daftar-belajar.pembelajaran', $kelas->id) }}" 
                       class="flex items-center gap-3 text-gray-600 hover:text-gray-700 transition group">
                        <div class="text-right">
                            <div class="font-semibold text-sm">Kembali ke Daftar Materi</div>
                        </div>
                        <div class="w-8 h-8 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center group-hover:bg-gray-200 transition">
                            <i class="ph ph-list"></i>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <script>
        let video;
        let videoWatched = 0;

        document.addEventListener('DOMContentLoaded', () => {
            video = document.getElementById('myVideo');

            if (video) {
                video.addEventListener('loadedmetadata', () => {
                    video.playbackRate = 1;
                });

                document.getElementById('btnSkipBack').addEventListener('click', () => skip(-10));
                document.getElementById('btnSkipForward').addEventListener('click', () => skip(10));
                document.getElementById('btnRestart').addEventListener('click', restartVideo);

                video.addEventListener('timeupdate', trackVideoProgress);
                video.addEventListener('ended', () => {
                    updateProgress(100);
                });
            }

            @if($materi->pivot->status === 'belum')
                updateProgress(10);
            @endif
        });

        function skip(seconds) {
            if (video) {
                video.currentTime += seconds;
            }
        }

        function restartVideo() {
            if (video) {
                video.currentTime = 0;
                video.play();
            }
        }

        function updateProgress(progressPercentage) {
            fetch(`/daftar-belajar/update-progress/{{ $materi->id }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    status: progressPercentage >= 100 ? 'selesai' : 'belum',
                    progress: progressPercentage
                })
            });
        }

        function trackVideoProgress() {
            if(video && video.duration > 0){
                const progress = Math.floor((video.currentTime / video.duration) * 100);
                if(progress > videoWatched){
                    videoWatched = progress;
                    if(progress >= 25 && progress < 50){
                        updateProgress(25);
                    } else if(progress >= 50 && progress < 75){
                        updateProgress(50);
                    } else if(progress >= 75 && progress < 100){
                        updateProgress(75);
                    } else if(progress >= 100){
                        updateProgress(100);
                    }
                }
            }
        }

        function completeLesson(){
            if(confirm('Apakah Anda yakin ingin menandai materi ini sebagai selesai?')){
                updateProgress(100);
                setTimeout(() => {
                    @if($nextMateri)
                        window.location.href = "{{ route('pembelajaran.view-materi', [$kelas->id, $nextMateri->id]) }}";
                    @else
                        window.location.href = "{{ route('daftar-belajar.pembelajaran', $kelas->id) }}";
                    @endif
                }, 1000);
            }
        }
    </script>

    <!-- ==== js dependencies start ==== -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script defer src="{{ asset('index.js') }}"></script>
</body>
</html>