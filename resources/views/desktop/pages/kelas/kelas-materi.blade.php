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
    </style>
</head>
<body data-course-id="{{ $kelas->id }}" class="bg-gray-50">
    <!-- Header with Dynamic Progress -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-30">
        <div class="max-w-6xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-4">
                    <button onclick="history.back()" class="text-gray-600 hover:text-p2 transition-colors">
                        <i class="ph ph-arrow-left text-xl"></i>
                    </button>
                    <div>
                        <h1 class="font-bold text-lg text-gray-800" id="courseTitle">{{ $kelas->nama_kelas  }}</h1>
                        <p class="text-sm text-gray-600" id="weekInfo"> Week {{ $weekNumber ?? '-' }}: {{ $currentMateri->judul ?? 'Materi belum tersedia' }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-between gap-6 mt-4">
                    {{-- Tombol Forum --}}
                    <a href="{{ route('desktop.pages.forum.forum-siswa', $kelas->id) }}" 
                    class="bg-gradient-to-r from-p2 to-p3 text-white px-4 py-2 rounded-xl font-semibold hover:opacity-90 transition-all">
                    Forum Diskusi
                    </a>
                    <div class="flex items-center gap-4">
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold" id="completed-count">{{ $completedCount }}</span> Item / <span id="total-count">{{ $totalMateri }}</span> Materi
                        </div>
                        <div class="w-32 bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-p2 to-p3 h-2 rounded-full transition-all duration-500" id="progress-bar" style="width: {{ $progressPercentage }}%"></div>
                        </div>
                        <span class="text-sm font-semibold text-p2" id="progress-text">{{ $progressPercentage }}%</span>
                    </div>
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
                        <p class="text-xs text-gray-500 mt-1">{{ $kelas->pengajar->first_name }}</p>
                    </div>
                    <div class="max-h-96 overflow-y-auto" id="course-content">
                        {{-- tampilkan hanya 4 materi minggu ini --}}
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
            <div class="lg:col-span-3">
                <!-- Material Header -->
                <div class="bg-white rounded-xl shadow2 mb-6">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h2 class="font-bold text-xl text-gray-800 mb-1" id="material-title">{{ $currentMateri->judul ?? 'Belum ada materi' }}</h2>
                                @if($currentMateri)
                                <p class="text-gray-600 text-sm" id="material-info">
                                    Durasi: {{ $currentMateri->durasi ?? 'N/A' }} menit • {{ ucfirst($currentMateri->tipe ?? 'Materi') }}
                                </p>
                                @endif
                            </div>
                            <div class="text-sm text-gray-500">
                                <span id="material-type-badge" class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full">
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
                                <h3 class="text-lg font-semibold">{{ $currentMateri->judul }}</h3>
                                <p class="text-gray-600 my-2">{{ $currentMateri->deskripsi }}</p>

                                @if($currentMateri->file_path)
                                    @php
                                        $ext = pathinfo($currentMateri->file_path, PATHINFO_EXTENSION);
                                    @endphp
                                    @if(in_array($ext, ['mp4', 'avi', 'mkv']))
                                        <video controls class="w-full rounded-lg">
                                            <source src="{{ asset('storage/' . $currentMateri->file_path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @elseif($ext === 'pdf')
                                        <iframe src="{{ asset('storage/' . $currentMateri->file_path) }}" class="w-full h-96 rounded-lg"></iframe>
                                    @endif
                                @endif

                                {{-- Quiz jika ada --}}
                                @if($currentQuiz)
                                    <div class="mt-6 p-4 border border-gray-300 rounded">
                                        <h4 class="font-semibold text-lg mb-1">Quiz: {{ $currentQuiz->judul }}</h4>
                                        <p class="text-gray-600">{{ $currentQuiz->deskripsi }}</p>

                                        <a href="{{ route('student.quiz.index', [$kelas->id, $currentMateri->id]) }}"
                                        class="inline-block mt-4 bg-p2 text-white px-5 py-2 rounded-lg font-semibold hover:bg-p3 transition-all">
                                        Mulai Quiz
                                        </a>
                                    </div>
                                @endif
                            @else
                                <p class="text-gray-500">Materi belum tersedia.</p>
                            @endif

                            {{-- Tombol Sertifikat --}}
                            @if($canGraduate)
                                <div class="mt-6">
                                    <a href="{{ route('desktop.pages.sertifikat.form-sertif', $kelas->id) }}" 
                                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold transition-all flex items-center gap-2">
                                        <i class="ph ph-certificate"></i>
                                        Download Sertifikat
                                    </a>
                                </div>
                            @else
                                <div class="mt-6 p-4 bg-yellow-100 text-yellow-800 rounded-lg">
                                    Selesaikan semua materi dan quiz minimal 70 untuk mendapatkan sertifikat.
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                <!-- Navigation Controls -->
                <div class="flex items-center justify-between">
                    {{-- Tombol Previous - menggunakan route controller --}}
                    @if($hasPrevious && $prevMateri)
                        <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id, 'materiId' => $prevMateri->id]) }}" 
                           class="flex items-center gap-2 text-gray-600 hover:text-p2 transition-colors">
                            <i class="ph ph-arrow-left"></i>
                            <span>Materi Sebelumnya</span>
                        </a>
                    @else
                        <span class="flex items-center gap-2 text-gray-400 cursor-not-allowed">
                            <i class="ph ph-arrow-left"></i>
                            <span>Materi Sebelumnya</span>
                        </span>
                    @endif
                    
                    <div class="flex items-center gap-3">
                        {{-- Tombol Mark Complete --}}
                        @if($currentMateri)
                        <form id="completeForm" method="POST" action="{{ route('student.materi.complete', [$kelas->id, $currentMateri->id]) }}" class="inline-block">
                            @csrf
                            <button type="submit"
                                class="px-6 py-2 rounded-full font-semibold transition-all
                                    {{ $isCompleted ? 'bg-green-100 text-green-700 cursor-default' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}"
                                {{ $isCompleted ? 'disabled' : '' }}>
                                <i class="ph ph-bookmark mr-2"></i>
                                <span id="complete-text">
                                    {{ $isCompleted ? 'Sudah Selesai' : 'Tandai Selesai' }}
                                </span>
                            </button>
                        </form>
                        @endif

                        {{-- Tombol Next - menggunakan route controller --}}
                        @if($hasNext && $nextMateri && $isCompleted)
                            <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id, 'materiId' => $nextMateri->id]) }}" 
                               class="bg-gradient-to-r from-p2 to-p3 text-white px-6 py-2 rounded-full font-semibold hover:opacity-90 transition-all">
                                <span>Lanjut ke Materi</span>
                                <i class="ph ph-arrow-right ml-2"></i>
                            </a>
                        @elseif($hasNext && $nextMateri)
                            <span class="bg-gradient-to-r from-p2 to-p3 text-white px-6 py-2 rounded-full font-semibold opacity-50 cursor-not-allowed">
                                <span>Lanjut ke Materi</span>
                                <i class="ph ph-arrow-right ml-2"></i>
                            </span>
                        @else
                            <a href="{{ route('student.course.completed', $kelas->id) }}" 
                               class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-2 rounded-full font-semibold hover:opacity-90 transition-all">
                                <span>Selesai</span>
                                <i class="ph ph-check ml-2"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Hanya untuk menangani form submission mark complete dengan loading state
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</body>
</html>