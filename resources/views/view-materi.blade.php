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
    </style>
</head>
<body>
    <div class="container min-h-dvh relative overflow-hidden py-6 dark:text-white dark:bg-color1">
        <!-- Header -->
        <div class="relative z-10">
            <div class="flex justify-between items-center gap-4 px-6 mb-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('daftar-belajar.pembelajaran', $kelas->id) }}" class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10">
                        <i class="ph ph-caret-left"></i>
                    </a>
                    <div>
                        <h2 class="text-lg font-semibold text-white">{{ $materi->judul }}</h2>
                        <p class="text-xs text-gray-300">{{ $kelas->nama_kelas }} • {{ $kelas->pengajar->first_name ?? $kelas->pengajar->name }}</p>
                    </div>
                </div>
                <div class="text-white text-sm">
                    {{ $currentIndex + 1 }} / {{ $allMateris->count() }}
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="px-6 mb-6">
                <div class="bg-white dark:bg-color10 rounded-lg p-3">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium">Progress Materi</span>
                        <span class="text-sm text-gray-500">{{ $materi->pivot->progress }}</span>
                    </div>
                    @php
                        $progressValue = intval($materi->pivot->progress);
                    @endphp
                    <div class="bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: {{ $progressValue }}%"></div>
                    </div>
                </div>
            </div>

            <!-- Content Viewer -->
            <div class="px-6">
                <div class="bg-white dark:bg-color10 rounded-2xl p-6 shadow-lg">
                    
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
                         <!-- Kontrol tambahan -->
                        <div class="flex justify-center gap-4 mt-2">
                        <button id="btnSkipBack" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">⏪ Ulang 10 detik</button>
                        <button id="btnSkipForward" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">⏩ Skip 10 detik</button>
                        <button id="btnRestart" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">🔄 Ulang dari awal</button>

                        </div>
                        </div>
                    @else
                        <!-- Document Viewer -->
                        <div class="mb-6">
                            @if($fileExtension === 'pdf')
                                <iframe src="{{ asset('storage/' . $materi->file_path) }}" class="document-viewer"></iframe>
                            @else
                                <div class="text-center py-12">
                                    <i class="ph ph-file text-6xl text-gray-400 mb-4"></i>
                                    <p class="text-lg font-semibold mb-2">{{ $materi->file_name }}</p>
                                    <p class="text-gray-600 mb-4">Klik tombol di bawah untuk mengunduh dan membuka file</p>
                                    <a href="{{ asset('storage/' . $materi->file_path) }}" 
                                       target="_blank" 
                                       class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition"
                                       onclick="updateProgress(50)">
                                        <i class="ph ph-download mr-2"></i>
                                        Unduh & Buka File
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Materi Info -->
                    <div class="border-t pt-4">
                        <h3 class="text-lg font-semibold mb-2 dark:text-white">Tentang Materi</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $materi->deskripsi }}</p>
                        
                        @if($materi->rangkuman)
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg mb-4">
                            <h4 class="font-semibold text-blue-800 dark:text-blue-200 mb-2">
                                <i class="ph ph-note mr-1"></i>Rangkuman
                            </h4>
                            <p class="text-blue-700 dark:text-blue-300">{{ $materi->rangkuman }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Mark as Complete Button -->
                    @if($materi->pivot->status !== 'selesai')
                    <div class="border-t pt-4 mt-4">
                        <button onclick="completeLesson()" class="w-full bg-green-600 text-white py-3 px-4 rounded-full hover:bg-green-700 transition font-semibold">
                            <i class="ph ph-check-circle mr-2"></i>
                            Tandai Selesai
                        </button>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Navigation -->
            <div class="fixed bottom-0 left-0 right-0 bg-white dark:bg-color10 border-t shadow-lg">
                <div class="container flex justify-between items-center py-4 px-6">
                    @if($previousMateri)
                        <a href="{{ route('pembelajaran.view-materi', [$kelas->id, $previousMateri->id]) }}" 
                           class="flex items-center gap-2 text-blue-600 hover:text-blue-700 transition">
                            <i class="ph ph-caret-left"></i>
                            <div class="text-left">
                                <div class="text-xs text-gray-500">Sebelumnya</div>
                                <div class="font-semibold text-sm">{{ \Illuminate\Support\Str::limit($previousMateri->judul, 30) }}</div>
                            </div>
                        </a>
                    @else
                        <div></div>
                    @endif

                    @if($nextMateri)
                        <a href="{{ route('pembelajaran.view-materi', [$kelas->id, $nextMateri->id]) }}" 
                           class="flex items-center gap-2 text-blue-600 hover:text-blue-700 transition">
                            <div class="text-right">
                                <div class="text-xs text-gray-500">Selanjutnya</div>
                                <div class="font-semibold text-sm">{{ \Illuminate\Support\Str::limit($nextMateri->judul, 30) }}</div>
                            </div>
                            <i class="ph ph-caret-right"></i>
                        </a>
                    @else
                        <a href="{{ route('daftar-belajar.pembelajaran', $kelas->id) }}" 
                           class="flex items-center gap-2 text-gray-600 hover:text-gray-700 transition">
                            <div class="text-right">
                                <div class="font-semibold text-sm">Kembali ke Daftar Materi</div>
                            </div>
                            <i class="ph ph-list"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        let video;
        let videoWatched = 0;

        document.addEventListener('DOMContentLoaded', () => {
            video = document.getElementById('myVideo');

            video.addEventListener('loadedmetadata', () => {
                video.playbackRate = 1;
            });

            document.getElementById('btnSkipBack').addEventListener('click', () => skip(-10));
            document.getElementById('btnSkipForward').addEventListener('click', () => skip(10));
            document.getElementById('btnRestart').addEventListener('click', restartVideo);

            @if($materi->pivot->status === 'belum')
                updateProgress(10);
            @endif

            video.addEventListener('timeupdate', trackVideoProgress);
            video.addEventListener('ended', () => {
                updateProgress(100);
            });
        });

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
            if(video.duration > 0){
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

        document.addEventListener('DOMContentLoaded', () => {
            @if($materi->pivot->status === 'belum')
                updateProgress(10);
            @endif
        });
    </script>


    <!-- ==== js dependencies start ==== -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script defer src="{{ asset('index.js') }}"></script>
</body>
</html>