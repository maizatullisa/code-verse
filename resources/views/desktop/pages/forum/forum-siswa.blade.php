<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi - {{$kelas->id}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom/forum-sis.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <style>
        /* Custom scrollbar untuk mobile */
        ::-webkit-scrollbar {
            width: 4px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Touch-friendly tap targets */
        button, a {
            min-height: 44px;
            min-width: 44px;
        }
        
        /* Better text wrapping */
        .break-words {
            word-wrap: break-word;
            word-break: break-word;
        }
    </style>
</head>
<body class="min-h-screen bg-blue-50 ">
    
    <!-- Navigation Header -->
    <nav class="bg-white/80 backdrop-blur-xl border-b border-slate-200/50 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8">
            <div class="flex items-center justify-between h-14 sm:h-16">
                <!-- Left Section -->
                <div class="flex items-center space-x-2 sm:space-x-4 flex-1 min-w-0">
                    <button onclick="history.back()" class="p-2 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all duration-200 flex-shrink-0">
                        <i class="ph ph-arrow-left text-lg sm:text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-2 sm:space-x-3 min-w-0 flex-1">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
                            <i class="ph-fill ph-student text-white text-sm sm:text-lg"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                            <h1 class="font-bold text-slate-800 text-sm sm:text-lg truncate">{{ $kelas->nama_kelas }}</h1>
                            <p class="text-xs sm:text-sm text-slate-500 hidden sm:block">Forum Diskusi Kelas</p>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="flex items-center space-x-2 sm:space-x-4 flex-shrink-0">

                    <!-- User Profile -->
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        @php
                            $user = auth()->user();
                        @endphp
                        <div class="w-8 h-8 sm:w-9 sm:h-9 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center shadow-md">
                            <span class="text-white font-semibold text-xs sm:text-sm">{{ strtoupper(substr($user->email, 0, 1)) }}</span>
                        </div>
                        <span class="hidden md:block text-sm font-medium text-slate-700">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-6 lg:py-8">
        
        <!-- Welcome Banner -->
        <div class="bg-blue-600 via-purple-600 to-indigo-700 rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 mb-4 sm:mb-6 lg:mb-8 text-white shadow-xl animate-fade-in relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent"></div>
            <div class="absolute top-0 right-0 w-20 sm:w-32 h-20 sm:h-32 bg-white/5 rounded-full -translate-y-10 sm:-translate-y-16 translate-x-10 sm:translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-16 sm:w-24 h-16 sm:h-24 bg-white/5 rounded-full translate-y-8 sm:translate-y-12 -translate-x-8 sm:-translate-x-12"></div>
            
            <div class="relative z-10">
                <div class="flex flex-col space-y-4 sm:space-y-6">
                    <div>
                        <div class="flex items-center space-x-2 mb-2 sm:mb-3">
                            <i class="ph-fill ph-chat-circle text-xl sm:text-2xl animate-bounce-gentle"></i>
                            <h2 class="text-lg sm:text-2xl lg:text-3xl font-bold">Selamat Datang di Forum Diskusi!</h2>
                        </div>
                        <p class="text-blue-100 text-sm sm:text-base lg:text-lg leading-relaxed">
                            Tempat berbagi dan berdiskusi tentang materi {{ $kelas->nama_kelas }} bersama teman-teman sekelas. Mari berkolaborasi dan saling membantu!
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-6">
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4 text-xs sm:text-sm">
                            <div class="flex items-center space-x-2 bg-white/20 rounded-lg px-2 sm:px-3 py-1">
                                <i class="ph ph-users text-sm"></i>
                                <span class="font-medium">{{ isset($kelas->siswa) ? $kelas->siswa->count() : 0 }} Siswa Aktif</span>
                            </div>
                            <div class="flex items-center space-x-2 bg-white/20 rounded-lg px-2 sm:px-3 py-1">
                                <i class="ph ph-chat-circle text-sm"></i>
                                <span class="font-medium">{{ isset($forumPosts) ? $forumPosts->where('created_at', '>=', now()->startOfDay())->count() : 0 }} Diskusi Hari Ini</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-full sm:w-auto">
                            <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id]) }}" class="inline-flex items-center justify-center space-x-2 sm:space-x-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl font-semibold transition-all duration-200 border border-white/20 w-full sm:w-auto text-sm sm:text-base">
                                <i class="ph ph-book-open text-lg sm:text-xl"></i>
                                <span>Lihat Materi</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Layout Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
            
            <!-- Main Content Column -->
            <div class="xl:col-span-3 flex justify-center">
            <div class="w-full max-w-3xl space-y-4 sm:space-y-6">


                <!-- New Discussion Form -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 shadow-lg border border-slate-200/50 animate-slide-up">
                    <div class="flex items-center space-x-3 sm:space-x-4 mb-4 sm:mb-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                            <span class="text-white font-bold text-sm sm:text-lg">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-slate-800 text-base sm:text-lg">Mulai Diskusi Baru</h3>
                            <p class="text-slate-600 text-xs sm:text-sm">Bagikan pertanyaan atau pengalaman belajar Anda</p>
                        </div>
                    </div>

                    <form action="{{ route('forum.siswa.store', $kelas->id) }}" method="POST" class="space-y-4 sm:space-y-6">
                        @csrf
                        <div class="relative">
                            <textarea 
                                name="konten"
                                class="w-full bg-white/90 backdrop-blur-sm border border-slate-200 rounded-xl p-3 sm:p-4 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 placeholder-slate-400 text-slate-700 text-sm sm:text-base" 
                                rows="4"
                                placeholder="Mau tanya apa nih? Jangan ragu untuk berbagi pengalaman belajar..."
                                required
                            ></textarea>
                            <div class="absolute bottom-2 sm:bottom-3 right-2 sm:right-3 text-xs text-slate-400 flex items-center space-x-1">
                                <i class="ph ph-smiley"></i>
                                <span class="hidden sm:inline">Gunakan bahasa yang sopan</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500  hover:from-blue-600 hover:to-purple-700 text-white px-6 sm:px-8 py-2.5 sm:py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2 text-sm sm:text-base">
                                <span>Posting</span>
                                <i class="ph-fill ph-paper-plane-right text-base sm:text-lg"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Discussion Threads -->
                <div class="space-y-4 sm:space-y-6">
                    
                    @forelse($forumPosts as $diskusi)
                    <!-- Discussion Thread -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl sm:rounded-2xl lg:rounded-3xl p-4 sm:p-6 shadow-lg border border-slate-200/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group @if($diskusi->user->isPengajar()) bg-gradient-to-br from-amber-50 to-yellow-50 border-2 border-amber-200 @endif">
                        <div class="flex items-start space-x-3 sm:space-x-4">
                            <div class="relative flex-shrink-0">
                                <div class="w-12 h-12 sm:w-14 sm:h-14 @if($diskusi->user->isPengajar()) bg-gradient-to-br from-amber-400 to-orange-500 @else bg-gradient-to-br from-purple-400 to-pink-500 @endif rounded-2xl flex items-center justify-center shadow-lg group-hover:animate-bounce-gentle">
                                    @if($diskusi->user->isPengajar())
                                        <i class="ph-fill ph-crown text-white text-lg sm:text-xl"></i>
                                    @else
                                        <span class="text-white font-bold text-sm sm:text-xl">{{ strtoupper(substr($diskusi->user->email, 0, 1)) }}</span>
                                    @endif
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 sm:w-5 sm:h-5 bg-emerald-500 rounded-full border-2 border-white"></div>
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col space-y-2 sm:space-y-0 sm:flex-row sm:items-center justify-between gap-2 sm:gap-3 mb-3 sm:mb-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h4 class="font-semibold text-slate-800 text-sm sm:text-lg group-hover:text-blue-600 transition-colors break-words">{{ $diskusi->user->email }}</h4>
                                        @if($diskusi->user->isPengajar())
                                            <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                <i class="ph ph-chalkboard-teacher mr-1"></i>
                                                Pengajar
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                <i class="ph ph-student mr-1"></i>
                                                Siswa
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-3 text-xs sm:text-sm text-slate-500">
                                        <div class="flex items-center space-x-1">
                                            <i class="ph ph-clock"></i>
                                            <span>{{ $diskusi->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="prose prose-slate max-w-none mb-4 sm:mb-6">
                                    <p class="text-slate-700 leading-relaxed text-sm sm:text-base break-words">
                                        {{ $diskusi->konten }}
                                    </p>
                                </div>
                                
                                <div class="flex items-center justify-between mb-3 sm:mb-4">
                                    <div class="flex items-center space-x-3 sm:space-x-6">
                                        <button onclick="toggleReplies({{ $diskusi->id }})" class="flex items-center space-x-1 sm:space-x-2 text-slate-500 hover:text-blue-500 hover:bg-blue-50 px-2 sm:px-3 py-2 rounded-xl transition-all duration-200 text-xs sm:text-sm">
                                            <i class="ph ph-chat-circle text-base sm:text-lg"></i>
                                            <span class="font-medium">{{ $diskusi->balasan->count() }} Balasan</span>
                                        </button>
                                        <a href="{{ route('forum.siswa.like', $diskusi->id) }}" class="flex items-center space-x-1 sm:space-x-2 text-slate-500 hover:text-red-500 hover:bg-red-50 px-2 sm:px-3 py-2 rounded-xl transition-all duration-200 text-xs sm:text-sm">
                                            <i class="ph-fill ph-heart text-red-500 text-base sm:text-lg"></i>
                                            <span class="font-medium">{{ $diskusi->diskusiSukas->count() ?? 0 }} Suka</span>
                                        </a>
                                        <button onclick="showReplyForm({{ $diskusi->id }})" class="flex items-center space-x-1 sm:space-x-2 text-slate-500 hover:text-blue-500 hover:bg-blue-50 px-2 sm:px-3 py-2 rounded-xl transition-all duration-200 text-xs sm:text-sm">
                                            <i class="ph ph-arrow-bend-up-left text-base sm:text-lg"></i>
                                            <span class="font-medium">Balas</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Replies Section -->
                                @if($diskusi->balasan->count() > 0)
                                <div id="replies-{{ $diskusi->id }}" class="mt-4 sm:mt-6 border-t border-slate-200 pt-3 sm:pt-4 space-y-3">
                                    @foreach($diskusi->balasan as $balasan)
                                    <div class="bg-slate-50/80 backdrop-blur-sm rounded-xl p-3 sm:p-4 border border-slate-200/50">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-medium text-xs sm:text-sm">{{ strtoupper(substr($balasan->user->email, 0, 1)) }}</span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-2 mb-2">
                                                    <span class="font-medium text-slate-800 text-xs sm:text-sm break-words">{{ $balasan->user->email }}</span>
                                                    @if($balasan->user->isPengajar())
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-600">
                                                            Pengajar
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                            Siswa
                                                        </span>
                                                    @endif
                                                    <span class="text-xs text-slate-500">{{ $balasan->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="text-slate-700 text-xs sm:text-sm leading-relaxed break-words">{{ $balasan->konten }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                <!-- Reply Form -->
                                <div id="reply-form-{{ $diskusi->id }}" class="mt-3 sm:mt-4 hidden">
                                    <form action="{{ route('forum.siswa.balas', $diskusi->id) }}" method="POST">
                                        @csrf
                                        <div class="flex space-x-3">
                                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-medium text-xs sm:text-sm">{{ strtoupper(substr(auth()->user()->email, 0, 1)) }}</span>
                                            </div>
                                            <div class="flex-1">
                                                <textarea 
                                                    name="konten"
                                                    class="w-full bg-white/90 border border-slate-200 rounded-xl p-3 text-xs sm:text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 placeholder-slate-400"
                                                    rows="3"
                                                    placeholder="Tulis balasan Anda..."
                                                    required
                                                ></textarea>
                                                <div class="flex justify-between items-center mt-3">
                                                    <button type="button" onclick="hideReplyForm({{ $diskusi->id }})" class="text-slate-500 hover:text-slate-700 text-xs sm:text-sm px-2 py-1">
                                                        Batal
                                                    </button>
                                                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-xl font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                                        Kirim Balasan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- Empty State -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl sm:rounded-2xl lg:rounded-3xl p-8 sm:p-12 text-center shadow-lg border border-slate-200/50">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-slate-200 to-slate-300 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                            <i class="ph ph-chat-circle text-slate-500 text-2xl sm:text-3xl"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-2">Belum Ada Diskusi</h3>
                        <p class="text-slate-600 mb-4 sm:mb-6 text-sm sm:text-base">Jadilah yang pertama memulai diskusi di kelas ini!</p>
                    </div>
                    @endforelse

                </div>

                <!-- Load More Button -->
                <div class="text-center mt-6 sm:mt-8">
                    <button class="bg-white/80 backdrop-blur-sm hover:bg-white/90 text-slate-700 font-semibold py-3 sm:py-4 px-6 sm:px-8 rounded-xl sm:rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 border border-slate-200/50 group text-sm sm:text-base">
                        <i class="ph ph-arrow-down mr-2 group-hover:animate-bounce"></i>
                        Muat Diskusi Lainnya
                    </button>
                </div>
            </div>

        </div>
    </div>

<script>
    function showReplyForm(diskusiId) {
        const form = document.getElementById(`reply-form-${diskusiId}`);
        form.classList.remove('hidden');
        form.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function hideReplyForm(diskusiId) {
        const form = document.getElementById(`reply-form-${diskusiId}`);
        form.classList.add('hidden');
    }

    function toggleReplies(diskusiId) {
        const replies = document.getElementById(`replies-${diskusiId}`);
        if (replies) {
            replies.classList.toggle('hidden');
        }
    }

    // Auto hide success messages
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }, 3000);
        });
        
        // Auto-resize textarea
        const textareas = document.querySelectorAll('textarea');
        textareas.forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = Math.min(this.scrollHeight, 200) + 'px';
            });
        });
    });
</script>

<script src="{{ asset('assets/js/costum/forum-siswa.js') }}"></script>
</body>
</html>