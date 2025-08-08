<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi - React JS Fundamental</title>
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
                            <h1 class="font-bold text-slate-800 text-lg">React JS Fundamental</h1>
                            <p class="text-sm text-slate-500">Forum Diskusi Kelas</p>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <!-- Progress Badge - Hidden on mobile -->
                    <div class="hidden md:flex items-center space-x-2 bg-white/90 backdrop-blur-sm rounded-xl px-4 py-2 border border-slate-200/50 shadow-sm">
                        <i class="ph ph-chart-line text-emerald-600"></i>
                        <span class="text-sm font-medium text-slate-700">Progress: 45%</span>
                    </div>

                    <!-- User Profile -->
                    <div class="flex items-center space-x-3">
                        <div class="w-9 h-9 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center shadow-md">
                            <span class="text-white font-semibold text-sm">A</span>
                        </div>
                        <span class="hidden sm:block text-sm font-medium text-slate-700">Ahmad Siswa</span>
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
                                <span class="font-medium">67 Siswa Aktif</span>
                            </div>
                            <div class="flex items-center space-x-2 bg-white/20 rounded-lg px-3 py-1">
                                <i class="ph ph-chat-circle"></i>
                                <span class="font-medium">24 Diskusi Hari Ini</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ url('/desktop/kelas-materi') }}" class="inline-flex items-center space-x-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 border border-white/20">
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
                
                <!-- Quick Actions -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-slate-200/50 animate-slide-up">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center">
                            <i class="ph-fill ph-lightning text-white text-lg"></i>
                        </div>
                        <h3 class="font-semibold text-slate-800 text-lg">Quick Actions</h3>
                    </div>
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                        <button class="group bg-blue-50 hover:bg-blue-100 text-blue-700 p-4 rounded-xl transition-all duration-200 flex flex-col items-center space-y-2 hover:scale-105">
                            <i class="ph ph-question text-2xl group-hover:animate-bounce-gentle"></i>
                            <span class="text-sm font-medium">Tanya Pengajar</span>
                        </button>
                        <button class="group bg-emerald-50 hover:bg-emerald-100 text-emerald-700 p-4 rounded-xl transition-all duration-200 flex flex-col items-center space-y-2 hover:scale-105">
                            <i class="ph ph-lightbulb text-2xl group-hover:animate-bounce-gentle"></i>
                            <span class="text-sm font-medium">Share Tips</span>
                        </button>
                        <button class="group bg-purple-50 hover:bg-purple-100 text-purple-700 p-4 rounded-xl transition-all duration-200 flex flex-col items-center space-y-2 hover:scale-105">
                            <i class="ph ph-code text-2xl group-hover:animate-bounce-gentle"></i>
                            <span class="text-sm font-medium">Review Code</span>
                        </button>
                        <button class="group bg-orange-50 hover:bg-orange-100 text-orange-700 p-4 rounded-xl transition-all duration-200 flex flex-col items-center space-y-2 hover:scale-105">
                            <i class="ph ph-users-three text-2xl group-hover:animate-bounce-gentle"></i>
                            <span class="text-sm font-medium">Study Group</span>
                        </button>
                    </div>
                </div>

                <!-- New Discussion Form -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-slate-200/50 animate-slide-up">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center shadow-md">
                            <span class="text-white font-bold text-lg">A</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800 text-lg">Mulai Diskusi Baru</h3>
                            <p class="text-slate-600 text-sm">Bagikan pertanyaan atau pengalaman belajar Anda</p>
                        </div>
                    </div>

                    <form class="space-y-6">
                        <div class="relative">
                            <textarea 
                                class="w-full bg-white/90 backdrop-blur-sm border border-slate-200 rounded-xl p-4 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 placeholder-slate-400 text-slate-700" 
                                rows="4"
                                placeholder="Mau tanya apa nih? Jangan ragu untuk berbagi pengalaman belajar..."
                            ></textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-slate-400 flex items-center space-x-1">
                                <i class="ph ph-smiley"></i>
                                <span>Gunakan bahasa yang sopan</span>
                            </div>
                        </div>
                        
                        <!-- Category & Tags Row -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="sm:w-1/2">
                                <select class="w-full bg-white/90 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-700">
                                    <option>💡 Pertanyaan</option>
                                    <option>🔥 Tips & Tricks</option>
                                    <option>🐛 Bug/Error</option>
                                    <option>📝 Review Code</option>
                                    <option>💬 Diskusi Umum</option>
                                </select>
                            </div>
                            <div class="sm:w-1/2">
                                <input type="text" placeholder="Tag (pisahkan dengan koma)" 
                                       class="w-full bg-white/90 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-700">
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <button type="button" class="p-3 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-xl transition-all duration-200" title="Attach file">
                                    <i class="ph ph-paperclip text-lg"></i>
                                </button>
                                <button type="button" class="p-3 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-xl transition-all duration-200" title="Code snippet">
                                    <i class="ph ph-code text-lg"></i>
                                </button>
                                <button type="button" class="p-3 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-xl transition-all duration-200" title="Image">
                                    <i class="ph ph-image text-lg"></i>
                                </button>
                            </div>
                            
                            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                                <span>Posting</span>
                                <i class="ph-fill ph-paper-plane-right text-lg"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Discussion Threads -->
                <div class="space-y-6">
                    
                    <!-- Pinned Discussion from Teacher -->
                    <div class="bg-gradient-to-br from-amber-50 to-yellow-50 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border-2 border-amber-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 animate-fade-in">
                        <div class="flex items-start space-x-4">
                            <div class="relative flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="ph-fill ph-crown text-white text-xl"></i>
                                </div>
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-md">
                                    <i class="ph-fill ph-push-pin text-white text-xs"></i>
                                </div>
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h4 class="font-semibold text-slate-800 text-lg">John Doe</h4>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                            <i class="ph ph-chalkboard-teacher mr-1"></i>
                                            Pengajar
                                        </span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                            <i class="ph ph-push-pin mr-1"></i>
                                            Pinned
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2 text-sm text-slate-500">
                                        <i class="ph ph-clock"></i>
                                        <span>2 jam yang lalu</span>
                                    </div>
                                </div>
                                
                                <div class="prose prose-slate max-w-none mb-6">
                                    <p class="text-slate-700 leading-relaxed text-base">
                                        <strong class="text-slate-800">📚 Selamat datang di Minggu 3 - Component Lifecycle!</strong>
                                    </p>
                                    <p class="text-slate-700 leading-relaxed">
                                        Halo semua! Kita akan mempelajari tentang lifecycle methods di React. Ini adalah topik yang sangat penting untuk memahami bagaimana component bekerja.
                                    </p>
                                    <p class="text-slate-700 leading-relaxed mb-4">
                                        <strong>Materi yang akan kita bahas:</strong><br>
                                        • ComponentDidMount & useEffect<br>
                                        • State management dalam lifecycle<br>
                                        • Best practices untuk cleanup
                                    </p>
                                    <p class="text-slate-700">
                                        Jangan ragu bertanya jika ada yang kurang jelas! 💪
                                    </p>
                                </div>
                                
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center space-x-6">
                                        <button class="flex items-center space-x-2 text-slate-500 hover:text-blue-500 hover:bg-blue-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-chat-circle text-lg"></i>
                                            <span class="font-medium">15 Balasan</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-slate-500 hover:text-red-500 hover:bg-red-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph-fill ph-heart text-red-500 text-lg"></i>
                                            <span class="font-medium">32 Suka</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-slate-500 hover:text-amber-500 hover:bg-amber-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-bookmark-simple text-lg"></i>
                                            <span class="font-medium">Simpan</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Latest Replies Preview -->
                                <div class="space-y-3">
                                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-4 border border-white/50">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-medium text-sm">B</span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-2 mb-1">
                                                    <span class="font-medium text-slate-800">Budi Santoso</span>
                                                    <span class="text-xs text-slate-500">30 menit yang lalu</span>
                                                </div>
                                                <p class="text-slate-700 text-sm leading-relaxed">
                                                    Terima kasih pak! Kapan kita akan praktek langsung membuat component dengan lifecycle?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="text-blue-600 hover:text-blue-700 font-medium hover:underline text-sm">
                                        Lihat semua balasan →
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student Discussion -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-slate-200/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group">
                        <div class="flex items-start space-x-4">
                            <div class="relative flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:animate-bounce-gentle">
                                    <span class="text-white font-bold text-xl">S</span>
                                </div>
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-emerald-500 rounded-full border-2 border-white"></div>
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h4 class="font-semibold text-slate-800 text-lg group-hover:text-blue-600 transition-colors">Sarah Dewi</h4>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                            Siswa
                                        </span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                            💡 Pertanyaan
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-3 text-sm text-slate-500">
                                        <div class="flex items-center space-x-1">
                                            <i class="ph ph-clock"></i>
                                            <span>1 jam yang lalu</span>
                                        </div>
                                        <div class="w-1 h-1 bg-slate-400 rounded-full"></div>
                                        <div class="flex items-center space-x-1">
                                            <i class="ph ph-eye"></i>
                                            <span>23 views</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="prose prose-slate max-w-none mb-6">
                                    <p class="text-slate-700 leading-relaxed text-base">
                                        Halo teman-teman! Saya masih bingung dengan perbedaan antara componentDidMount dan useEffect. 
                                        Kapan sebaiknya kita pakai yang mana ya? Dan kenapa useEffect lebih direkomendasikan untuk functional components?
                                    </p>
                                    <p class="text-slate-700">
                                        Mohon bantuannya dong 🙏
                                    </p>
                                </div>
                                
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center space-x-6">
                                        <button class="flex items-center space-x-2 text-slate-500 hover:text-blue-500 hover:bg-blue-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-chat-circle text-lg"></i>
                                            <span class="font-medium">8 Balasan</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-slate-500 hover:text-red-500 hover:bg-red-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-heart text-lg"></i>
                                            <span class="font-medium">12 Suka</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-slate-500 hover:text-amber-500 hover:bg-amber-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-bookmark-simple text-lg"></i>
                                            <span class="font-medium">Simpan</span>
                                        </button>
                                    </div>
                                    
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-xl transition-all duration-200" title="Share">
                                            <i class="ph ph-share-network text-lg"></i>
                                        </button>
                                        <button class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-xl transition-all duration-200" title="More options">
                                            <i class="ph ph-dots-three-vertical text-lg"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Recent Replies -->
                                <div class="space-y-3">
                                    <div class="bg-slate-50/80 backdrop-blur-sm rounded-xl p-4 border border-slate-200/50">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-medium text-sm">R</span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-2 mb-2">
                                                    <span class="font-medium text-slate-800">Rudi Pratama</span>
                                                    <span class="text-xs text-slate-500">45 menit yang lalu</span>
                                                </div>
                                                <p class="text-slate-700 text-sm leading-relaxed mb-3">
                                                    Hai Sarah! useEffect itu lebih flexible karena bisa handle multiple lifecycle events dalam satu function. 
                                                    ComponentDidMount cuma bisa handle mount aja, sedangkan useEffect bisa mount, update, dan unmount 😊
                                                </p>
                                                <div class="flex items-center space-x-4">
                                                    <button class="text-xs text-slate-500 hover:text-blue-500 flex items-center space-x-1 transition-colors">
                                                        <i class="ph ph-heart"></i>
                                                        <span>3</span>
                                                    </button>
                                                    <button class="text-xs text-slate-500 hover:text-blue-500 transition-colors">Balas</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reply Form -->
                                    <div class="bg-slate-50/60 rounded-xl p-4 border border-slate-200/50">
                                        <div class="flex space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-medium text-sm">A</span>
                                            </div>
                                            <div class="flex-1">
                                                <textarea 
                                                    class="w-full bg-white/90 border border-slate-200 rounded-xl p-3 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 placeholder-slate-400"
                                                    rows="2"
                                                    placeholder="Tulis balasan Anda..."
                                                ></textarea>
                                                <div class="flex justify-between items-center mt-3">
                                                    <div class="flex items-center space-x-2">
                                                        <button class="text-slate-400 hover:text-slate-600 p-1 transition-colors">
                                                            <i class="ph ph-code"></i>
                                                        </button>
                                                        <button class="text-slate-400 hover:text-slate-600 p-1 transition-colors">
                                                            <i class="ph ph-image"></i>
                                                        </button>
                                                    </div>
                                                    <button class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-4 py-2 text-sm rounded-xl font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                                        Kirim
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Code Review Discussion -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-slate-200/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group">
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:animate-bounce-gentle">
                                <span class="text-white font-bold text-xl">M</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h4 class="font-semibold text-slate-800 text-lg group-hover:text-blue-600 transition-colors">Michael Chen</h4>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                            Siswa
                                        </span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                            📝 Review Code
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2 text-sm text-slate-500">
                                        <i class="ph ph-clock"></i>
                                        <span>3 jam yang lalu</span>
                                    </div>
                                </div>
                                
                                <div class="prose prose-slate max-w-none mb-6">
                                    <p class="text-slate-700 leading-relaxed text-base">
                                        Guys, bisa tolong review code component Counter saya? Kayaknya ada yang salah dengan state management-nya.
                                        Counter-nya nggak mau update dengan benar 😅
                                    </p>
                                </div>

                                <!-- Code Block -->
                                <div class="bg-slate-900 rounded-xl overflow-hidden mb-6 shadow-lg">
                                    <div class="flex items-center justify-between px-4 py-3 bg-slate-800 border-b border-slate-700">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                        </div>
                                        <span class="text-slate-400 text-sm font-mono">Counter.jsx</span>
                                    </div>
                                    <div class="p-4 overflow-x-auto">
                                        <pre class="text-emerald-400 text-sm font-mono leading-relaxed"><code>import React, { useState } from 'react';

                                            function Counter() {
                                            const [count, setCount] = useState(0);
                                            
                                            const increment = () => {
                                                setCount(count + 1);
                                                setCount(count + 1); // Double increment?
                                            };
                                            
                                            return (
                                                &lt;div&gt;
                                                &lt;p&gt;Count: {count}&lt;/p&gt;
                                                &lt;button onClick={increment}&gt;+&lt;/button&gt;
                                                &lt;/div&gt;
                                            );
                                            }</code></pre>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-6">
                                        <button class="flex items-center space-x-2 text-slate-500 hover:text-blue-500 hover:bg-blue-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-chat-circle text-lg"></i>
                                            <span class="font-medium">5 Balasan</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-slate-500 hover:text-red-500 hover:bg-red-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-heart text-lg"></i>
                                            <span class="font-medium">8 Suka</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-slate-500 hover:text-amber-500 hover:bg-amber-50 px-3 py-2 rounded-xl transition-all duration-200">
                                            <i class="ph ph-bookmark-simple text-lg"></i>
                                            <span class="font-medium">Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Load More Button -->
                <div class="text-center mt-8">
                    <button class="bg-white/80 backdrop-blur-sm hover:bg-white/90 text-slate-700 font-semibold py-4 px-8 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 border border-slate-200/50 group">
                        <i class="ph ph-arrow-down mr-2 group-hover:animate-bounce"></i>
                        Muat Diskusi Lainnya
                    </button>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="xl:col-span-1 space-y-6">
                
                <!-- Course Progress Card -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-slate-200/50 sticky top-24">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center">
                            <i class="ph-fill ph-chart-line text-white text-lg"></i>
                        </div>
                        <h3 class="font-semibold text-slate-800 text-lg">Progress Belajar</h3>
                    </div>
                    
                    <div class="space-y-6">
                        <!-- Overall Progress -->
                        <div>
                            <div class="flex justify-between text-sm mb-3">
                                <span class="text-slate-600 font-medium">Overall Progress</span>
                                <span class="font-bold text-slate-800">45%</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-emerald-400 to-teal-500 h-3 rounded-full transition-all duration-500 animate-pulse-gentle" style="width: 45%"></div>
                            </div>
                        </div>
                        
                        <!-- Progress Stats -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50 rounded-xl p-4 text-center border border-blue-100">
                                <div class="text-2xl font-bold text-blue-600 mb-1">12/24</div>
                                <div class="text-xs text-blue-700 font-medium">Video Selesai</div>
                            </div>
                            <div class="bg-emerald-50 rounded-xl p-4 text-center border border-emerald-100">
                                <div class="text-2xl font-bold text-emerald-600 mb-1">8/15</div>
                                <div class="text-xs text-emerald-700 font-medium">Materi Dibaca</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Online Students -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-slate-200/50">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center">
                                <i class="ph-fill ph-users text-white text-lg"></i>
                            </div>
                            <h3 class="font-semibold text-slate-800 text-lg">Siswa Online</h3>
                        </div>
                        <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm font-bold border border-emerald-200">23</span>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 p-2 hover:bg-slate-50 rounded-xl transition-colors">
                            <div class="relative flex-shrink-0">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-md">
                                    <span class="text-white font-semibold text-sm">S</span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-slate-800 text-sm">Sarah Dewi</div>
                                <div class="text-xs text-slate-500">Aktif 2 menit lalu</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3 p-2 hover:bg-slate-50 rounded-xl transition-colors">
                            <div class="relative flex-shrink-0">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center shadow-md">
                                    <span class="text-white font-semibold text-sm">B</span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-slate-800 text-sm">Budi Santoso</div>
                                <div class="text-xs text-slate-500">Aktif 5 menit lalu</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3 p-2 hover:bg-slate-50 rounded-xl transition-colors">
                            <div class="relative flex-shrink-0">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center shadow-md">
                                    <span class="text-white font-semibold text-sm">M</span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white animate-pulse"></div>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-slate-800 text-sm">Michael Chen</div>
                                <div class="text-xs text-emerald-600 font-medium">Aktif sekarang</div>
                            </div>
                        </div>
                        
                        <button class="w-full text-center text-blue-600 hover:text-blue-700 text-sm font-medium py-3 hover:bg-blue-50 rounded-xl transition-all duration-200 border border-blue-100 hover:border-blue-200">
                            Lihat semua siswa online
                        </button>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-slate-200/50">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="ph-fill ph-bookmark text-white text-lg"></i>
                        </div>
                        <h3 class="font-semibold text-slate-800 text-lg">Quick Links</h3>
                    </div>
                    
                    <div class="space-y-2">
                        <a href="#" class="flex items-center space-x-3 p-3 hover:bg-blue-50 rounded-xl transition-all duration-200 group border border-transparent hover:border-blue-100">
                            <div class="w-8 h-8 bg-blue-100 group-hover:bg-blue-200 rounded-lg flex items-center justify-center transition-colors">
                                <i class="ph-fill ph-play-circle text-blue-600 text-lg"></i>
                            </div>
                            <span class="text-slate-700 group-hover:text-slate-800 font-medium">Video Pembelajaran</span>
                        </a>
                        
                        <a href="#" class="flex items-center space-x-3 p-3 hover:bg-emerald-50 rounded-xl transition-all duration-200 group border border-transparent hover:border-emerald-100">
                            <div class="w-8 h-8 bg-emerald-100 group-hover:bg-emerald-200 rounded-lg flex items-center justify-center transition-colors">
                                <i class="ph-fill ph-file-text text-emerald-600 text-lg"></i>
                            </div>
                            <span class="text-slate-700 group-hover:text-slate-800 font-medium">Materi Bacaan</span>
                        </a>
                        
                        <a href="#" class="flex items-center space-x-3 p-3 hover:bg-purple-50 rounded-xl transition-all duration-200 group border border-transparent hover:border-purple-100">
                            <div class="w-8 h-8 bg-purple-100 group-hover:bg-purple-200 rounded-lg flex items-center justify-center transition-colors">
                                <i class="ph-fill ph-code text-purple-600 text-lg"></i>
                            </div>
                            <span class="text-slate-700 group-hover:text-slate-800 font-medium">Code Examples</span>
                        </a>
                        
                        <a href="#" class="flex items-center space-x-3 p-3 hover:bg-orange-50 rounded-xl transition-all duration-200 group border border-transparent hover:border-orange-100">
                            <div class="w-8 h-8 bg-orange-100 group-hover:bg-orange-200 rounded-lg flex items-center justify-center transition-colors">
                                <i class="ph-fill ph-certificate text-orange-600 text-lg"></i>
                            </div>
                            <span class="text-slate-700 group-hover:text-slate-800 font-medium">Quiz & Assignment</span>
                        </a>
                    </div>
                </div>

                <!-- Announcement -->
                <div class="bg-gradient-to-br from-blue-50 to-purple-50 backdrop-blur-sm rounded-2xl lg:rounded-3xl p-6 shadow-lg border border-blue-200/50">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center animate-pulse-gentle">
                            <i class="ph-fill ph-megaphone text-white text-lg"></i>
                        </div>
                        <h3 class="font-semibold text-slate-800 text-lg">Pengumuman</h3>
                    </div>
                    
                    <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4 border border-white/50 mb-4">
                        <div class="text-slate-700 leading-relaxed">
                            <div class="font-semibold text-slate-800 mb-2">Live Session Besok! 🔥</div>
                            <p class="text-sm">
                                Jangan lupa join live session "Advanced React Patterns" besok jam 19:00 WIB. 
                                Link akan dibagikan 30 menit sebelum dimulai.
                            </p>
                        </div>
                    </div>
                    
                    <button class="text-blue-600 hover:text-blue-700 font-medium hover:underline text-sm transition-colors">
                        Selengkapnya →
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/costum/forum-siswa.js') }}"></script>
</body>
</html>