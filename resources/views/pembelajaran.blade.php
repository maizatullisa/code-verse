<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
    <title>{{ $kelas->nama_kelas }}</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <style>
        /* Override untuk action buttons */
        .action-btn {
            color: white !important;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .action-btn-blue {
            background-color: #2563eb !important;
        }
        
        .action-btn-blue:hover {
            background-color: #1d4ed8 !important;
        }
        
        .action-btn-green {
            background-color: #16a34a !important;
        }
        
        .action-btn-green:hover {
            background-color: #15803d !important;
        }
        
        .action-btn-gray {
            background-color: #4b5563 !important;
        }
        
        .action-btn-gray:hover {
            background-color: #374151 !important;
        }
    </style>
</head>
<body>
    <div class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1">
        <!-- Absolute Effects -->
        <img src="{{ asset('assets/images/header-bg-1.png') }}" alt="" class="absolute top-0 left-0 right-0 -mt-16" />
        <div class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px]"></div>
        <div class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px]"></div>
        <div class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px]"></div>

        <!-- Header -->
        <div class="relative z-10">
            <div class="flex justify-between items-center gap-4 px-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('daftar-belajar.kelas-saya') }}" class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10">
                        <i class="ph ph-caret-left"></i>
                    </a>
                    <div>
                        <h2 class="text-lg font-semibold text-white">{{ $kelas->nama_kelas }}</h2>
                        <p class="text-xs text-gray-300">{{ $kelas->pengajar->first_name ?? $kelas->pengajar->name }}</p>
                    </div>
                </div>
            </div>

            <!-- Progress Overview -->
            <div class="pt-8 px-6">
                <div class="bg-white dark:bg-color10 rounded-2xl p-4 shadow-lg">
                    @php
                        $totalMateri = $kelas->materis->count();
                        $selesaiMateri = $kelas->materis->where('pivot.status', 'selesai')->count();
                        $progress = $totalMateri > 0 ? ($selesaiMateri / $totalMateri) * 100 : 0;
                    @endphp
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-700 dark:text-white">Progress Kelas</span>
                        <span class="text-sm text-gray-500">{{ $selesaiMateri }}/{{ $totalMateri }}</span>
                    </div>
                    <div class="bg-gray-200 rounded-full h-3">
                        <div class="bg-blue-600 h-3 rounded-full transition-all duration-300" style="width: {{ $progress }}%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">{{ number_format($progress, 1) }}% Selesai</p>
                </div>
            </div>

            <!-- Daftar Materi -->
            <div class="pt-6 px-6">
                <h3 class="text-lg font-semibold text-black mb-4">Daftar Materi</h3>
                
                <div class="space-y-3">
                    @foreach ($kelas->materis as $index => $materi)
                    <div class="bg-white dark:bg-color10 rounded-xl p-4 shadow-lg">
                        <div class="flex items-center gap-4">
                            <!-- Status Icon -->
                            <div class="flex-shrink-0">
                                @if(optional($materi->pivot)->status == 'selesai')
                                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                        <i class="ph ph-check text-white text-sm"></i>
                                    </div>
                                @elseif($materi->pivot->status == 'belum')
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                        <i class="ph ph-play text-white text-sm"></i>
                                    </div>
                                @else
                                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                        <i class="ph ph-circle text-gray-600 text-sm"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Materi Info -->
                            <div class="flex-1">
                                <h4 class="font-semibold text-sm text-gray-800 dark:text-white">
                                    {{ $index + 1 }}. {{ $materi->judul }}
                                </h4>
                                @if($materi->deskripsi)
                                <p class="text-xs text-gray-600 dark:text-gray-300 mt-1">
                                    {{ \Illuminate\Support\Str::limit($materi->deskripsi, 80) }}
                                </p>
                                @endif
                                <div class="flex items-center gap-2 mt-2">
                                    <span class="text-xs px-2 py-1 bg-gray-100 dark:bg-gray-700 rounded">
                                        @if(str_contains($materi->file_name, '.mp4') || str_contains($materi->file_name, '.avi') || str_contains($materi->file_name, '.mkv'))
                                            <i class="ph ph-video"></i> Video
                                        @else
                                            <i class="ph ph-file"></i> Dokumen
                                        @endif
                                    </span>
                                    <span class="text-xs text-gray-500">{{ $materi->pivot->progress }}</span>
                                </div>
                            </div>
                            
                             
                            <!-- Action Buttons - FIXED -->
                            <div class="flex gap-2 ml-4">
                                @if($materi->pivot->status != 'selesai')
                                <a href="{{ route('pembelajaran.view-materi', [$kelas->id, $materi->id]) }}" class="action-btn action-btn-blue">
                                    @if($materi->pivot->status == 'belum')
                                        Lanjutkan
                                    @else
                                        Mulai
                                    @endif
                                </a>
                                @else
                                <a href="{{ route('pembelajaran.view-materi', [$kelas->id, $materi->id]) }}" class="action-btn action-btn-green">
                                    Lihat Lagi
                                </a>
                                @endif
                                <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank" class="action-btn action-btn-gray">
                                    <i class="ph ph-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
    function startLearning(materiId) {
        // Update status ke 'sedang'
        fetch(`/daftar-belajar/update-progress/${materiId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({
                status: 'belum',
                progress: 10
            })
        }).then(() => {
            location.reload();
        });
    }

    function completeLesson(materiId) {
        // Update status ke 'selesai'
        fetch(`/daftar-belajar/update-progress/${materiId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({
                status: 'selesai',
                progress: 100
            })
        }).then(() => {
            location.reload();
        });
    }
    </script>

    <!-- ==== js dependencies start ==== -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script defer src="{{ asset('index.js') }}"></script>
</body>
</html>