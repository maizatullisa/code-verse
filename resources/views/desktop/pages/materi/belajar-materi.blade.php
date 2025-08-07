@extends('desktop.layout.master-desktop')

@section('title', 'Code Verse - Belajar Materi')

@section('page-title', 'Belajar Materi')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header Navigation -->
    <div class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ url()->previous() }}" class="bg-gray-100 p-2 rounded-lg hover:bg-gray-200 transition-colors">
                        <i class="ph ph-arrow-left text-xl text-gray-600"></i>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Dasar-Dasar HTML & CSS</h1>
                        <p class="text-gray-600 text-sm">oleh Budi Santoso</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="bg-green-100 px-4 py-2 rounded-lg">
                        <span class="text-green-700 font-semibold text-sm">Progress: 25%</span>
                    </div>
                    <button class="bg-gray-100 p-2 rounded-lg hover:bg-gray-200 transition-colors">
                        <i class="ph ph-bookmark text-xl text-gray-600"></i>
                    </button>
                    <button class="bg-gray-100 p-2 rounded-lg hover:bg-gray-200 transition-colors">
                        <i class="ph ph-share-network text-xl text-gray-600"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Main Content Area -->
            <div class="lg:col-span-2">
                <!-- Video Player -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                    <div class="aspect-video bg-gray-900 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 cursor-pointer hover:bg-blue-700 transition-colors">
                                    <i class="ph-fill ph-play text-3xl text-white"></i>
                                </div>
                                <p class="text-lg font-semibold">Video: Pengenalan HTML</p>
                                <p class="text-gray-300">Durasi: 15:30</p>
                            </div>
                        </div>
                        <!-- Video Controls -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                            <div class="flex items-center gap-4 text-white">
                                <button class="hover:text-blue-400 transition-colors">
                                    <i class="ph-fill ph-play text-2xl"></i>
                                </button>
                                <div class="flex-1 bg-gray-600 rounded-full h-1">
                                    <div class="bg-blue-500 h-1 rounded-full" style="width: 25%"></div>
                                </div>
                                <span class="text-sm">3:52 / 15:30</span>
                                <button class="hover:text-blue-400 transition-colors">
                                    <i class="ph ph-speaker-high text-xl"></i>
                                </button>
                                <button class="hover:text-blue-400 transition-colors">
                                    <i class="ph ph-arrows-out text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lesson Info -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center">
                            <i class="ph-fill ph-play-circle text-blue-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Pengenalan HTML</h2>
                            <p class="text-gray-600 mb-4">Dalam video ini, kita akan mempelajari dasar-dasar HTML (HyperText Markup Language), termasuk struktur dokumen HTML, tag-tag penting, dan cara membuat halaman web sederhana.</p>
                            
                            <div class="flex items-center gap-6 text-sm text-gray-500 mb-6">
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-clock"></i>
                                    <span>15:30 menit</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-eye"></i>
                                    <span>1,234 dilihat</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-heart"></i>
                                    <span>89 suka</span>
                                </div>
                            </div>

                            <!-- Video Navigation -->
                            <div class="flex items-center gap-4">
                                <button class="bg-gray-100 px-6 py-3 rounded-xl text-gray-700 font-medium hover:bg-gray-200 transition-colors">
                                    <i class="ph ph-caret-left mr-2"></i>
                                    Video Sebelumnya
                                </button>
                                <button class="bg-blue-600 px-6 py-3 rounded-xl text-white font-medium hover:bg-blue-700 transition-colors">
                                    Video Selanjutnya
                                    <i class="ph ph-caret-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Practice Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="ph ph-code text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Latihan Praktik</h3>
                            <p class="text-gray-600">Coba praktikkan apa yang telah Anda pelajari</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <h4 class="font-semibold text-gray-800 mb-3">Tugas: Buat halaman HTML sederhana</h4>
                        <p class="text-gray-600 mb-4">Buatlah sebuah halaman HTML yang berisi:</p>
                        <ul class="text-gray-600 space-y-2 mb-6">
                            <li class="flex items-start gap-2">
                                <i class="ph ph-check-circle text-green-500 mt-1"></i>
                                <span>Judul halaman dengan tag &lt;title&gt;</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="ph ph-check-circle text-green-500 mt-1"></i>
                                <span>Heading utama dengan tag &lt;h1&gt;</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="ph ph-check-circle text-green-500 mt-1"></i>
                                <span>Paragraf dengan tag &lt;p&gt;</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="ph ph-check-circle text-green-500 mt-1"></i>
                                <span>Daftar tidak berurutan dengan tag &lt;ul&gt;</span>
                            </li>
                        </ul>
                        
                        <button class="bg-green-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-green-700 transition-colors">
                            <i class="ph ph-code mr-2"></i>
                            Mulai Praktik
                        </button>
                    </div>
                </div>

                <!-- Notes Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <i class="ph ph-note text-yellow-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Catatan Saya</h3>
                            <p class="text-gray-600">Tulis catatan untuk video ini</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <textarea class="w-full border border-gray-200 rounded-xl p-4 resize-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="4" placeholder="Tulis catatan Anda di sini..."></textarea>
                    </div>
                    
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                        <i class="ph ph-floppy-disk mr-2"></i>
                        Simpan Catatan
                    </button>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Course Progress -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="ph ph-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Progress Kursus</h3>
                            <p class="text-gray-600 text-sm">3 dari 12 video selesai</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Progress</span>
                            <span>25%</span>
                        </div>
                        <div class="bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 25%"></div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="bg-blue-50 rounded-xl p-4">
                            <p class="text-2xl font-bold text-blue-600">12</p>
                            <p class="text-blue-600 text-sm font-medium">Total Video</p>
                        </div>
                        <div class="bg-green-50 rounded-xl p-4">
                            <p class="text-2xl font-bold text-green-600">3</p>
                            <p class="text-green-600 text-sm font-medium">Selesai</p>
                        </div>
                    </div>
                </div>

                <!-- Lesson List -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <i class="ph ph-list text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Daftar Materi</h3>
                            <p class="text-gray-600 text-sm">12 video pembelajaran</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <!-- Lesson 1 - Current -->
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                                    <i class="ph-fill ph-play text-white text-sm"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-blue-900">1. Pengenalan HTML</h4>
                                    <p class="text-blue-700 text-sm">15:30 • Sedang ditonton</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lesson 2 - Completed -->
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4 cursor-pointer hover:bg-green-100 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                                    <i class="ph-fill ph-check text-white text-sm"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-green-900">2. Struktur Dokumen HTML</h4>
                                    <p class="text-green-700 text-sm">12:45 • Selesai</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lesson 3 - Completed -->
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4 cursor-pointer hover:bg-green-100 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                                    <i class="ph-fill ph-check text-white text-sm"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-green-900">3. Tag HTML Dasar</h4>
                                    <p class="text-green-700 text-sm">18:20 • Selesai</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lesson 4 - Next -->
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer hover:bg-gray-100 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gray-300 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-sm font-semibold">4</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900">4. Atribut HTML</h4>
                                    <p class="text-gray-600 text-sm">14:15 • Belum ditonton</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lesson 5 -->
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer hover:bg-gray-100 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gray-300 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-sm font-semibold">5</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900">5. Form HTML</h4>
                                    <p class="text-gray-600 text-sm">22:30 • Belum ditonton</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lesson 6 -->
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer hover:bg-gray-100 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gray-300 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-sm font-semibold">6</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900">6. Pengenalan CSS</h4>
                                    <p class="text-gray-600 text-sm">16:45 • Belum ditonton</p>
                                </div>
                            </div>
                        </div>

                        <!-- Show More Button -->
                        <button class="w-full bg-gray-100 border border-gray-200 rounded-xl p-3 text-gray-700 font-medium hover:bg-gray-200 transition-colors">
                            <i class="ph ph-caret-down mr-2"></i>
                            Lihat 6 materi lainnya
                        </button>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mt-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Aksi Cepat</h3>
                    <div class="space-y-3">
                        <button class="w-full bg-blue-50 border border-blue-200 rounded-xl p-3 text-blue-700 font-medium hover:bg-blue-100 transition-colors text-left">
                            <i class="ph ph-question mr-3"></i>
                            Tanya Instruktur
                        </button>
                        <button class="w-full bg-yellow-50 border border-yellow-200 rounded-xl p-3 text-yellow-700 font-medium hover:bg-yellow-100 transition-colors text-left">
                            <i class="ph ph-users mr-3"></i>
                            Forum Diskusi
                        </button>
                        <button class="w-full bg-green-50 border border-green-200 rounded-xl p-3 text-green-700 font-medium hover:bg-green-100 transition-colors text-left">
                            <i class="ph ph-download-simple mr-3"></i>
                            Download Materi
                        </button>
                        <button class="w-full bg-red-50 border border-red-200 rounded-xl p-3 text-red-700 font-medium hover:bg-red-100 transition-colors text-left">
                            <i class="ph ph-flag mr-3"></i>
                            Laporkan Masalah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection