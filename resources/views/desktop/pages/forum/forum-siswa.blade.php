<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi - React JS Fundamental</title>
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
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        bounceGentle: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' }
                        },
                        pulseGentle: {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.8' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-cyan-50">
    
    <!-- Navigation Header -->
    <nav class="bg-white/80 backdrop-blur-xl border-b border-white/20 sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-4">
                    <button onclick="history.back()" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                        <i class="ph ph-arrow-left text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <i class="ph-fill ph-student text-white text-lg"></i>
                        </div>
                        <div>
                            <h1 class="font-bold text-gray-800">React JS Fundamental</h1>
                            <p class="text-sm text-gray-600">Forum Diskusi Kelas</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Course Progress -->
                    <div class="hidden md:flex items-center space-x-2 bg-white/70 backdrop-blur-lg rounded-xl px-4 py-2 border border-white/30">
                        <i class="ph ph-chart-line text-green-600"></i>
                        <span class="text-sm font-medium text-gray-700">Progress: 45%</span>
                    </div>

                    <!-- User Profile -->
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-medium text-sm">A</span>
                        </div>
                        <span class="hidden sm:block text-sm font-medium text-gray-700">Ahmad Siswa</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-3xl p-8 mb-8 text-white shadow-xl animate-fade-in">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold mb-2">Selamat Datang di Forum Diskusi! 🎉</h2>
                    <p class="text-blue-100 mb-4">Tempat berbagi dan berdiskusi tentang materi React JS bersama teman-teman sekelas</p>
                    <div class="flex items-center space-x-4 text-sm">
                        <div class="flex items-center space-x-2">
                            <i class="ph ph-users"></i>
                            <span>67 Siswa Aktif</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="ph ph-chat-circle"></i>
                            <span>24 Diskusi Hari Ini</span>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <button class="bg-white/20 hover:bg-white/30 backdrop-blur-lg text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center space-x-2">
                        <i class="ph ph-book-open"></i>
                        <a href="{{ url('/desktop/kelas-materi') }}"</a>
                        <span>Lihat Materi</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Main Content -->
            <div class="lg:col-span-3 space-y-6">
                
                <!-- Quick Actions -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20 animate-slide-up">
                    <h3 class="font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                        <i class="ph ph-lightning text-yellow-500"></i>
                        <span>Quick Actions</span>
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <button class="bg-blue-50 hover:bg-blue-100 text-blue-700 p-3 rounded-xl transition-all duration-200 flex flex-col items-center space-y-2">
                            <i class="ph ph-question text-xl"></i>
                            <span class="text-xs font-medium">Tanya Pengajar</span>
                        </button>
                        <button class="bg-green-50 hover:bg-green-100 text-green-700 p-3 rounded-xl transition-all duration-200 flex flex-col items-center space-y-2">
                            <i class="ph ph-lightbulb text-xl"></i>
                            <span class="text-xs font-medium">Share Tips</span>
                        </button>
                        <button class="bg-purple-50 hover:bg-purple-100 text-purple-700 p-3 rounded-xl transition-all duration-200 flex flex-col items-center space-y-2">
                            <i class="ph ph-code text-xl"></i>
                            <span class="text-xs font-medium">Review Code</span>
                        </button>
                        <button class="bg-orange-50 hover:bg-orange-100 text-orange-700 p-3 rounded-xl transition-all duration-200 flex flex-col items-center space-y-2">
                            <i class="ph ph-users-three text-xl"></i>
                            <span class="text-xs font-medium">Study Group</span>
                        </button>
                    </div>
                </div>

                <!-- New Discussion Form -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20 animate-slide-up">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-400 to-emerald-500 rounded-xl flex items-center justify-center">
                            <span class="text-white font-medium">A</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Mulai Diskusi Baru</h3>
                            <p class="text-sm text-gray-600">Bagikan pertanyaan atau pengalaman belajar Anda</p>
                        </div>
                    </div>

                    <form class="space-y-4">
                        <div class="relative">
                            <textarea 
                                class="w-full bg-white/90 backdrop-blur-lg border border-white/30 rounded-2xl p-4 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500/50 transition-all duration-200 placeholder-gray-500" 
                                rows="4"
                                placeholder="Mau tanya apa nih? Jangan ragu untuk berbagi..."
                            ></textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                <i class="ph ph-smiley mr-1"></i>
                                Gunakan bahasa yang sopan
                            </div>
                        </div>
                        
                        <!-- Category & Tags -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <select class="bg-white/80 border border-white/30 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                                <option>💡 Pertanyaan</option>
                                <option>🔥 Tips & Tricks</option>
                                <option>🐛 Bug/Error</option>
                                <option>📝 Review Code</option>
                                <option>💬 Diskusi Umum</option>
                            </select>
                            <input type="text" placeholder="Tag (pisahkan dengan koma)" 
                                   class="flex-1 bg-white/80 border border-white/30 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <button type="button" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" title="Attach file">
                                    <i class="ph ph-paperclip"></i>
                                </button>
                                <button type="button" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" title="Code snippet">
                                    <i class="ph ph-code"></i>
                                </button>
                                <button type="button" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" title="Image">
                                    <i class="ph ph-image"></i>
                                </button>
                            </div>
                            
                            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-6 py-2 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                                <span>Posting</span>
                                <i class="ph-fill ph-paper-plane-right"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Discussion Threads -->
                <div class="space-y-6">
                    
                    <!-- Pinned Discussion from Teacher -->
                    <div class="bg-gradient-to-r from-amber-50 to-yellow-50 backdrop-blur-xl rounded-3xl p-6 shadow-xl border-2 border-amber-200 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 animate-fade-in">
                        <div class="flex items-start space-x-4">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-r from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                    <i class="ph-fill ph-crown text-white text-lg"></i>
                                </div>
                                <div class="absolute -top-1 -right-1 w-6 h-6 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <i class="ph-fill ph-push-pin text-white text-xs"></i>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                    <div class="flex items-center space-x-3">
                                        <h4 class="font-semibold text-gray-800">John Doe</h4>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                            <i class="ph ph-chalkboard-teacher mr-1"></i>
                                            Pengajar
                                        </span>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                            <i class="ph ph-push-pin mr-1"></i>
                                            Pinned
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2 text-xs text-gray-500">
                                        <i class="ph ph-clock"></i>
                                        <span>2 jam yang lalu</span>
                                    </div>
                                </div>
                                
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    <strong>📚 Selamat datang di Minggu 3 - Component Lifecycle!</strong><br><br>
                                    Halo semua! Kita akan mempelajari tentang lifecycle methods di React. Ini adalah topik yang sangat penting untuk memahami bagaimana component bekerja.<br><br>
                                    Materi yang akan kita bahas:
                                    <br>• ComponentDidMount & useEffect
                                    <br>• State management dalam lifecycle
                                    <br>• Best practices untuk cleanup
                                    <br><br>
                                    Jangan ragu bertanya jika ada yang kurang jelas! 💪
                                </p>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-500 hover:bg-blue-50 px-3 py-1 rounded-lg transition-all duration-200">
                                            <i class="ph ph-chat-circle"></i>
                                            <span class="text-sm font-medium">15 Balasan</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-gray-500 hover:text-red-500 hover:bg-red-50 px-3 py-1 rounded-lg transition-all duration-200">
                                            <i class="ph-fill ph-heart text-red-500"></i>
                                            <span class="text-sm font-medium">32 Suka</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-gray-500 hover:text-amber-500 hover:bg-amber-50 px-3 py-1 rounded-lg transition-all duration-200">
                                            <i class="ph ph-bookmark-simple"></i>
                                            <span class="text-sm font-medium">Simpan</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Latest Replies Preview -->
                                <div class="mt-4 space-y-3">
                                    <div class="bg-white/60 backdrop-blur-lg rounded-xl p-3 border border-white/30">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-6 h-6 bg-gradient-to-r from-green-400 to-emerald-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-medium text-xs">B</span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-2 mb-1">
                                                    <span class="font-medium text-gray-800 text-sm">Budi Santoso</span>
                                                    <span class="text-xs text-gray-500">30 menit yang lalu</span>
                                                </div>
                                                <p class="text-gray-700 text-sm">Terima kasih pak! Kapan kita akan praktek langsung membuat component dengan lifecycle?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="text-blue-600 hover:text-blue-700 text-sm font-medium hover:underline">
                                        Lihat semua balasan →
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Regular Student Discussion -->
                    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group">
                        <div class="flex items-start space-x-4">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:animate-bounce-gentle">
                                    <span class="text-white font-bold text-lg">S</span>
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                    <div class="flex items-center space-x-3">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">Sarah Dewi</h4>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                            Siswa
                                        </span>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                            💡 Pertanyaan
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2 text-xs text-gray-500">
                                        <i class="ph ph-clock"></i>
                                        <span>1 jam yang lalu</span>
                                        <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                                        <i class="ph ph-eye"></i>
                                        <span>23 views</span>
                                    </div>
                                </div>
                                
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    Halo teman-teman! Saya masih bingung dengan perbedaan antara componentDidMount dan useEffect. 
                                    Kapan sebaiknya kita pakai yang mana ya? Dan kenapa useEffect lebih direkomendasikan untuk functional components?
                                    <br><br>
                                    Mohon bantuannya dong 🙏
                                </p>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-500 hover:bg-blue-50 px-3 py-1 rounded-lg transition-all duration-200">
                                            <i class="ph ph-chat-circle"></i>
                                            <span class="text-sm font-medium">8 Balasan</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-gray-500 hover:text-red-500 hover:bg-red-50 px-3 py-1 rounded-lg transition-all duration-200">
                                            <i class="ph ph-heart"></i>
                                            <span class="text-sm font-medium">12 Suka</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-gray-500 hover:text-amber-500 hover:bg-amber-50 px-3 py-1 rounded-lg transition-all duration-200">
                                            <i class="ph ph-bookmark-simple"></i>
                                            <span class="text-sm font-medium">Simpan</span>
                                        </button>
                                    </div>
                                    
                                    <div class="flex items-center space-x-2">
                                        <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" title="Share">
                                            <i class="ph ph-share-network"></i>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" title="More options">
                                            <i class="ph ph-dots-three-vertical"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Recent Replies -->
                                <div class="mt-4 space-y-3">
                                    <div class="bg-gray-50/80 backdrop-blur-lg rounded-xl p-3 border border-gray-100">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-6 h-6 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-medium text-xs">R</span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-2 mb-1">
                                                    <span class="font-medium text-gray-800 text-sm">Rudi Pratama</span>
                                                    <span class="text-xs text-gray-500">45 menit yang lalu</span>
                                                </div>
                                                <p class="text-gray-700 text-sm leading-relaxed">
                                                    Hai Sarah! useEffect itu lebih flexible karena bisa handle multiple lifecycle events dalam satu function. 
                                                    ComponentDidMount cuma bisa handle mount aja, sedangkan useEffect bisa mount, update, dan unmount 😊
                                                </p>
                                                <div class="flex items-center space-x-3 mt-2">
                                                    <button class="text-xs text-gray-500 hover:text-blue-500 flex items-center space-x-1">
                                                        <i class="ph ph-heart"></i>
                                                        <span>3</span>
                                                    </button>
                                                    <button class="text-xs text-gray-500 hover:text-blue-500">Balas</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reply Form -->
                                    <div class="bg-gray-50/60 rounded-xl p-3 border border-gray-100">
                                        <div class="flex space-x-3">
                                            <div class="w-6 h-6 bg-gradient-to-r from-green-400 to-emerald-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-medium text-xs">A</span>
                                            </div>
                                            <div class="flex-1">
                                                <textarea 
                                                    class="w-full bg-white/90 border border-gray-200 rounded-lg p-2 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500/50 transition-all duration-200 placeholder-gray-400"
                                                    rows="2"
                                                    placeholder="Tulis balasan Anda..."
                                                ></textarea>
                                                <div class="flex justify-between items-center mt-2">
                                                    <div class="flex items-center space-x-2">
                                                        <button class="text-xs text-gray-400 hover:text-gray-600 p-1">
                                                            <i class="ph ph-code"></i>
                                                        </button>
                                                        <button class="text-xs text-gray-400 hover:text-gray-600 p-1">
                                                            <i class="ph ph-image"></i>
                                                        </button>
                                                    </div>
                                                    <button class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-3 py-1 text-xs rounded-lg font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
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
                    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:animate-bounce-gentle">
                                <span class="text-white font-bold text-lg">M</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                    <div class="flex items-center space-x-3">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">Michael Chen</h4>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                            Siswa
                                        </span>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                            📝 Review Code
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2 text-xs text-gray-500">
                                        <i class="ph ph-clock"></i>
                                        <span>3 jam yang lalu</span>
                                    </div>
                                </div>
                                
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    Guys, bisa tolong review code component Counter saya? Kayaknya ada yang salah dengan state management-nya.
                                    Counter-nya nggak mau update dengan benar 😅
                                </p>

                                <!-- Code Block -->
                                <div class="bg-gray-900 rounded-xl p-4 mb-4 overflow-x-auto">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                        </div>
                                        <span class="text-gray-400 text-xs">Counter.jsx</span>
                                    </div>
                                    <pre class="text-green-400 text-sm font-mono">
<code>import React, { useState } from 'react';

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
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-500 hover:bg-blue-50 px-3 py-1 rounded-lg transition-all duration-200">
                                            <i class="ph ph-chat-circle"></i>
                                            <span class="text-sm font-medium">5 Balasan</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-gray-500 hover:text-red-500 hover:bg-red-50 px-3 py-1 rounded-lg transition-all duration-200">
                                            <i class="ph ph-heart"></i>
                                            <span class="text-sm font-medium">8 Suka</span>
                                        </button>
                                        <button class="flex items-center space-x-2 text-gray-500 hover:text-amber-500 hover:bg-amber-50 px-3 py-1 rounded-lg transition-all duration-200">
                                            <i class="ph ph-bookmark-simple"></i>
                                            <span class="text-sm font-medium">Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Load More -->
                <div class="text-center mt-8">
                    <button class="bg-white/80 backdrop-blur-lg hover:bg-white/90 text-gray-700 font-semibold py-3 px-8 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 border border-white/30">
                        <i class="ph ph-arrow-down mr-2"></i>
                        Muat Diskusi Lainnya
                    </button>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- Course Progress -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20 sticky top-24">
                    <h3 class="font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                        <i class="ph ph-chart-line text-green-600"></i>
                        <span>Progress Belajar</span>
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Overall Progress</span>
                                <span class="font-semibold text-gray-800">45%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 text-center">
                            <div class="bg-blue-50 rounded-xl p-3">
                                <div class="text-lg font-bold text-blue-600">12/24</div>
                                <div class="text-xs text-blue-700">Video Selesai</div>
                            </div>
                            <div class="bg-green-50 rounded-xl p-3">
                                <div class="text-lg font-bold text-green-600">8/15</div>
                                <div class="text-xs text-green-700">Materi Dibaca</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Online Students -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20">
                    <h3 class="font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                        <i class="ph ph-users text-green-600"></i>
                        <span>Siswa Online</span>
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">23</span>
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">S</span>
                                </div>
                                <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border border-white"></div>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-800 text-sm">Sarah Dewi</div>
                                <div class="text-xs text-gray-500">Aktif 2 menit lalu</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">B</span>
                                </div>
                                <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border border-white"></div>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-800 text-sm">Budi Santoso</div>
                                <div class="text-xs text-gray-500">Aktif 5 menit lalu</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">M</span>
                                </div>
                                <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border border-white"></div>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-800 text-sm">Michael Chen</div>
                                <div class="text-xs text-gray-500">Aktif sekarang</div>
                            </div>
                        </div>
                        <button class="w-full text-center text-blue-600 hover:text-blue-700 text-sm font-medium py-2 hover:bg-blue-50 rounded-lg transition-all">
                            Lihat semua siswa online
                        </button>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20">
                    <h3 class="font-semibold text-gray-800 mb-4 flex items-center space-x-2">
                        <i class="ph ph-bookmark text-blue-600"></i>
                        <span>Quick Links</span>
                    </h3>
                    <div class="space-y-3">
                        <a href="#" class="flex items-center space-x-3 p-3 hover:bg-blue-50 rounded-xl transition-all group">
                            <i class="ph ph-play-circle text-blue-600 group-hover:text-blue-700"></i>
                            <span class="text-gray-700 group-hover:text-gray-800 text-sm font-medium">Video Pembelajaran</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 p-3 hover:bg-green-50 rounded-xl transition-all group">
                            <i class="ph ph-file-text text-green-600 group-hover:text-green-700"></i>
                            <span class="text-gray-700 group-hover:text-gray-800 text-sm font-medium">Materi Bacaan</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 p-3 hover:bg-purple-50 rounded-xl transition-all group">
                            <i class="ph ph-code text-purple-600 group-hover:text-purple-700"></i>
                            <span class="text-gray-700 group-hover:text-gray-800 text-sm font-medium">Code Examples</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 p-3 hover:bg-orange-50 rounded-xl transition-all group">
                            <i class="ph ph-certificate text-orange-600 group-hover:text-orange-700"></i>
                            <span class="text-gray-700 group-hover:text-gray-800 text-sm font-medium">Quiz & Assignment</span>
                        </a>
                    </div>
                </div>

                <!-- Announcement -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-blue-200">
                    <h3 class="font-semibold text-gray-800 mb-3 flex items-center space-x-2">
                        <i class="ph ph-megaphone text-blue-600"></i>
                        <span>Pengumuman</span>
                    </h3>
                    <div class="text-sm text-gray-700 leading-relaxed">
                        <strong>Live Session Besok!</strong><br>
                        Jangan lupa join live session "Advanced React Patterns" besok jam 19:00 WIB. Link akan dibagikan 30 menit sebelum dimulai.
                    </div>
                    <button class="mt-3 text-blue-600 hover:text-blue-700 text-sm font-medium">
                        Selengkapnya →
                    </button>
                </div>

            </div>
        </div>
    </div>

   <script src="{{ asset('assets/js/custom/forum-siswa.js') }}"></script>

    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Code block styling */
        pre {
            font-family: 'JetBrains Mono', 'Monaco', 'Menlo', monospace;
        }

        /* Animation classes */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        .slide-up {
            animation: slideUp 0.3s ease-out;
        }

        .bounce-gentle {
            animation: bounceGentle 0.6s ease-in-out;
        }

        .pulse-gentle {
            animation: pulseGentle 2s ease-in-out infinite;
        }

        /* Hover effects */
        .hover-lift:hover {
            transform: translateY(-2px);
        }

        /* Focus styles */
        textarea:focus,
        input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Mobile responsive improvements */
        @media (max-width: 640px) {
            .rounded-3xl {
                border-radius: 1.5rem;
            }
            
            .p-8 {
                padding: 1.5rem;
            }
            
            .space-x-4 > * + * {
                margin-left: 0.75rem;
            }
        }

        /* Loading state */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        /* Notification animation */
        .notification-enter {
            transform: translateX(100%);
            opacity: 0;
        }

        .notification-enter-active {
            transform: translateX(0);
            opacity: 1;
            transition: all 0.3s ease-out;
        }

        /* Code syntax highlighting placeholder */
        .hljs-keyword { color: #c792ea; }
        .hljs-string { color: #c3e88d; }
        .hljs-function { color: #82aaff; }
        .hljs-comment { color: #546e7a; }

        /* Print styles */
        @media print {
            .no-print {
                display: none !important;
            }
            
            .print-break {
                page-break-before: always;
            }
        }
    </style>
</body>
</html>