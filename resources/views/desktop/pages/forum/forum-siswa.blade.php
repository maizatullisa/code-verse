<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi - {{$kelas->id}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom/forum-sis.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'bounce-gentle': 'bounceGentle 0.6s ease-in-out',
                        'pulse-gentle': 'pulseGentle 2s ease-in-out infinite',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        bounceGentle: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-8px)' }
                        },
                        pulseGentle: {
                            '0%, 100%': { opacity: '1', transform: 'scale(1)' },
                            '50%': { opacity: '0.9', transform: 'scale(1.02)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    
    <!-- Navigation Header -->
    <nav class="bg-white/80 backdrop-blur-xl border-b border-slate-200/50 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Left Section -->
                <div class="flex items-center space-x-4">
                    <button onclick="history.back()" class="p-2 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all duration-200">
                        <i class="ph ph-arrow-left text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="ph-fill ph-student text-white text-lg"></i>
                        </div>
                        <div>
                            <h1 class="font-bold text-slate-800 text-lg">{{ $kelas->nama_kelas }}</h1>
                            <p class="text-sm text-slate-500">Forum Diskusi Kelas</p>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                 <!-- Progress Badge -->
                <div id="progress-badge" data-kelas-id="{{ $kelas->id }}"
                    class="hidden md:flex items-center space-x-2 bg-white/90 backdrop-blur-sm rounded-xl px-4 py-2 border border-slate-200/50 shadow-sm">
                    <i class="ph ph-chart-line text-emerald-600"></i>
                    <span class="text-sm font-medium text-slate-700 progress-value">Progress: ...</span>
                </div>

                    <!-- User Profile -->
                    <div class="flex items-center space-x-3">
                         @php
                            $user = auth()->user();
                        @endphp
                        <div class="w-9 h-9 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center shadow-md">
                            <span class="text-white font-semibold text-sm">{{ strtoupper(substr($user->email, 0, 1)) }}</span>
                        </div>
                        <span class="hidden sm:block text-sm font-medium text-slate-700">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-8">
        
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 rounded-2xl lg:rounded-3xl p-6 lg:p-8 mb-6 lg:mb-8 text-white shadow-xl animate-fade-in relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-16 translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full translate-y-12 -translate-x-12"></div>
            
            <div class="relative z-10">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                    <div class="flex-1">
                        <div class="flex items-center space-x-2 mb-3">
                            <i class="ph-fill ph-chat-circle text-2xl animate-bounce-gentle"></i>
                            <h2 class="text-2xl lg:text-3xl font-bold">Selamat Datang di Forum Diskusi!</h2>
                        </div>
                        <p class="text-blue-100 mb-6 text-lg leading-relaxed max-w-2xl">
                            Tempat berbagi dan berdiskusi tentang materi React JS bersama teman-teman sekelas. Mari berkolaborasi dan saling membantu!
                        </p>
                            <div class="flex flex-wrap items-center gap-4 text-sm">
                                <div class="flex items-center space-x-2 bg-white/20 rounded-lg px-3 py-1">
                                    <i class="ph ph-users"></i>
                                    <span class="font-medium">{{ isset($kelas->siswa) ? $kelas->siswa->count() : 0 }} Siswa Aktif</span>
                                </div>
                                <div class="flex items-center space-x-2 bg-white/20 rounded-lg px-3 py-1">
                                    <i class="ph ph-chat-circle"></i>
                                    <span class="font-medium">{{ isset($forumPosts) ? $forumPosts->where('created_at', '>=', now()->startOfDay())->count() : 0 }} Diskusi Hari Ini</span>
                                </div>
                            </div>
                    </div>
                    <div class="flex-shrink-0">
                      <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id]) }}" class="inline-flex items-center space-x-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 border border-white/20">
                            <i class="ph ph-book-open text-xl"></i>
                            <span>Lihat Materi</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Layout Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 lg:gap-8">
            
            <!-- Main Content Column -->
            <div class="xl:col-span-3 space-y-6">

                <!-- New Discussion Form -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-slate-200/50 animate-slide-up">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center shadow-md">
                            <span class="text-white font-bold text-lg">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800 text-lg">Mulai Diskusi Baru</h3>
                            <p class="text-slate-600 text-sm">Bagikan pertanyaan atau pengalaman belajar Anda</p>
                        </div>
                    </div>

                    <form action="{{ route('forum.siswa.store', $kelas->id) }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="relative">
                            <textarea 
                                name="konten"
                                class="w-full bg-white/90 backdrop-blur-sm border border-slate-200 rounded-xl p-4 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 placeholder-slate-400 text-slate-700" 
                                rows="4"
                                placeholder="Mau tanya apa nih? Jangan ragu untuk berbagi pengalaman belajar..."
                                required
                            ></textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-slate-400 flex items-center space-x-1">
                                <i class="ph ph-smiley"></i>
                                <span>Gunakan bahasa yang sopan</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                                <span>Posting</span>
                                <i class="ph-fill ph-paper-plane-right text-lg"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Discussion Threads -->
                <div class="space-y-6">
                    
                    @forelse($forumPosts as $diskusi)
                    <!-- Discussion Thread -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-slate-200/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group @if($diskusi->user->isPengajar()) bg-gradient-to-br from-amber-50 to-yellow-50 border-2 border-amber-200 @endif">
                        <div class="flex items-start space-x-4">
                            <div class="relative flex-shrink-0">
                                <div class="w-14 h-14 @if($diskusi->user->isPengajar()) bg-gradient-to-br from-amber-400 to-orange-500 @else bg-gradient-to-br from-purple-400 to-pink-500 @endif rounded-2xl flex items-center justify-center shadow-lg group-hover:animate-bounce-gentle">
                                    @if($diskusi->user->isPengajar())
                                        <i class="ph-fill ph-crown text-white text-xl"></i>
                                    @else
                                        <span class="text-white font-bold text-xl">{{ strtoupper(substr($diskusi->user->email, 0, 1)) }}</span>
                                    @endif
                                </div>
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-emerald-500 rounded-full border-2 border-white"></div>
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h4 class="font-semibold text-slate-800 text-lg group-hover:text-blue-600 transition-colors">{{ $diskusi->user->email }}</h4>
                                        @if($diskusi->user->isPengajar())
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                <i class="ph ph-chalkboard-teacher mr-1"></i>
                                                Pengajar
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                <i class="ph ph-student mr-1"></i>
                                                Siswa
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-3 text-sm text-slate-500">
                                        <div class="flex items-center space-x-1">
                                            <i class="ph ph-clock"></i>
                                            <span>{{ $diskusi->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="prose prose-slate max-w-none mb-6">
                                    <p class="text-slate-700 leading-relaxed text-base">
                                        {{ $diskusi->konten }}
                                    </p>
                                </div>
                                
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center space-x-6">
                                        <button onclick="toggleReplies({{ $diskusi->id }})" class="flex items-center space-x-2 text-slate-500 hover:text-blue-500 hover:bg-blue-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-chat-circle text-lg"></i>
                                            <span class="font-medium">{{ $diskusi->balasan->count() }} Balasan</span>
                                        </button>
                                        <a href="{{ route('forum.siswa.like', $diskusi->id) }}" class="flex items-center space-x-2 text-slate-500 hover:text-red-500 hover:bg-red-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph-fill ph-heart text-red-500 text-lg"></i>
                                            <span class="font-medium">{{ $diskusi->diskusiSukas->count() ?? 0 }} Suka</span>
                                        </a>
                                        <button onclick="showReplyForm({{ $diskusi->id }})" class="flex items-center space-x-2 text-slate-500 hover:text-blue-500 hover:bg-blue-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-arrow-bend-up-left text-lg"></i>
                                            <span class="font-medium">Balas</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Replies Section -->
                                @if($diskusi->balasan->count() > 0)
                                <div id="replies-{{ $diskusi->id }}" class="mt-6 border-t border-slate-200 pt-4 space-y-3">
                                    @foreach($diskusi->balasan as $balasan)
                                    <div class="bg-slate-50/80 backdrop-blur-sm rounded-xl p-4 border border-slate-200/50">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-medium text-sm">{{ strtoupper(substr($balasan->user->email, 0, 1)) }}</span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-2 mb-2">
                                                    <span class="font-medium text-slate-800 text-sm">{{ $balasan->user->email }}</span>
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
                                                <p class="text-slate-700 text-sm leading-relaxed">{{ $balasan->konten }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                     <div id="reply-form-{{ $diskusi->id }}" class="mt-4 hidden">
                    <form action="{{ route('forum.siswa.balas', $diskusi->id) }}" method="POST">
                        @csrf
                        <div class="flex space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-medium text-sm">{{ strtoupper(substr(auth()->user()->email, 0, 1)) }}</span>
                            </div>
                            <div class="flex-1">
                                <textarea 
                                    name="konten"
                                    class="w-full bg-white/90 border border-slate-200 rounded-xl p-3 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 placeholder-slate-400"
                                    rows="3"
                                    placeholder="Tulis balasan Anda..."
                                    required
                                ></textarea>
                                <div class="flex justify-between items-center mt-3">
                                    <button type="button" onclick="hideReplyForm({{ $diskusi->id }})" class="text-slate-500 hover:text-slate-700 text-sm">
                                        Batal
                                    </button>
                                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-4 py-2 text-sm rounded-xl font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
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
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-12 text-center shadow-lg border border-slate-200/50">
                        <div class="w-24 h-24 bg-gradient-to-br from-slate-200 to-slate-300 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="ph ph-chat-circle text-slate-500 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Diskusi</h3>
                        <p class="text-slate-600 mb-6">Jadilah yang pertama memulai diskusi di kelas ini!</p>
                    </div>
                    @endforelse

                </div>

                <!-- Load More Button -->
                <div class="text-center mt-8">
                    <button class="bg-white/80 backdrop-blur-sm hover:bg-white/90 text-slate-700 font-semibold py-4 px-8 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 border border-slate-200/50 group">
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
    });
</script>

<script src="{{ asset('assets/js/costum/forum-siswa.js') }}"></script>
</body>
</html>
