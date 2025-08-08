@extends('desktop.layout.master-desktop')

@section('title', 'Code Verse - Rekomendasi Materi')

@section('page-title', 'Rekomendasi Materi')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-6 py-8">
            <div class="flex items-center gap-4 mb-4">
                <a href="{{ url()->previous() }}" class="bg-gray-100 p-2 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="ph ph-arrow-left text-xl text-gray-600"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Rekomendasi Materi</h1>
                    <p class="text-gray-600 text-lg">Materi pembelajaran yang direkomendasikan untuk Anda</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="max-w-6xl mx-auto px-6 py-6 text-black">
        <div class="flex flex-wrap items-center gap-4 mb-6">
            <div class="flex items-center gap-2">
                <span class="text-black font-medium">Filter:</span>
                <select class="bg-white border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>Semua Level</option>
                    <option>Pemula</option>
                    <option>Menengah</option>
                    <option>Lanjutan</option>
                </select>
                <select class="bg-white border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>Semua Kategori</option>
                    <option>Web Development</option>
                    <option>Mobile Development</option>
                    <option>Data Science</option>
                    <option>AI/ML</option>
                </select>
            </div>
            <div class="flex-1"></div>
            <div class="flex items-center gap-2">
                <span class="text-gray-600">Urutkan:</span>
                <select class="bg-white border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>Terpopuler</option>
                    <option>Terbaru</option>
                    <option>Rating Tertinggi</option>
                    <option>Durasi Terpendek</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Materials Grid -->
    <div class="max-w-6xl mx-auto px-6 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Material Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 text-white">
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-white bg-opacity-20 px-3 py-1 rounded-full">
                            <span class="text-sm font-semibold">Level 1</span>
                        </div>
                        
                    </div>
                    <h3 class="text-xl font-bold mb-2">Dasar-Dasar HTML & CSS</h3>
                    <p class="text-blue-100 text-sm">Pelajari fondasi web development dengan HTML dan CSS</p>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-3 gap-4 mb-6 text-center">
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Durasi</p>
                            <p class="font-semibold text-gray-800">4 jam</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Video</p>
                            <p class="font-semibold text-gray-800">12</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Quiz</p>
                            <p class="font-semibold text-gray-800">5</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="ph ph-user text-gray-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Budi Santoso</p>
                            <p class="text-gray-500 text-sm">Frontend Developer</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('desktop.pages.materi.belajar-materi') }}" class="block w-full bg-blue-600 text-white text-center py-3 rounded-xl font-semibold hover:bg-blue-700 transition-colors">
                        Mulai Belajar
                    </a>
                </div>
            </div>

            <!-- Material Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 p-6 text-white">
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-white bg-opacity-20 px-3 py-1 rounded-full">
                            <span class="text-sm font-semibold">Level 2</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">JavaScript untuk Pemula</h3>
                    <p class="text-emerald-100 text-sm">Menguasai dasar-dasar JavaScript untuk web interaktif</p>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-3 gap-4 mb-6 text-center">
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Durasi</p>
                            <p class="font-semibold text-gray-800">6 jam</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Video</p>
                            <p class="font-semibold text-gray-800">18</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Quiz</p>
                            <p class="font-semibold text-gray-800">8</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="ph ph-user text-gray-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Andi Pratama</p>
                            <p class="text-gray-500 text-sm">Full Stack Developer</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('desktop.pages.materi.belajar-materi') }}" class="block w-full bg-emerald-600 text-white text-center py-3 rounded-xl font-semibold hover:bg-emerald-700 transition-colors">
                        Mulai Belajar
                    </a>
                </div>
            </div>

            <!-- Material Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-6 text-white">
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-white bg-opacity-20 px-3 py-1 rounded-full">
                            <span class="text-sm font-semibold">Level 3</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">React.js Fundamental</h3>
                    <p class="text-purple-100 text-sm">Bangun aplikasi web modern dengan React.js</p>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-3 gap-4 mb-6 text-center">
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Durasi</p>
                            <p class="font-semibold text-gray-800">8 jam</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Video</p>
                            <p class="font-semibold text-gray-800">24</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Quiz</p>
                            <p class="font-semibold text-gray-800">10</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="ph ph-user text-gray-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Dedi Kurniawan</p>
                            <p class="text-gray-500 text-sm">React Developer</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('desktop.pages.materi.belajar-materi') }}" class="block w-full bg-purple-600 text-white text-center py-3 rounded-xl font-semibold hover:bg-purple-700 transition-colors">
                        Mulai Belajar
                    </a>
                </div>
            </div>

            <!-- Material Card 4 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-6 text-white">
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-white bg-opacity-20 px-3 py-1 rounded-full">
                            <span class="text-sm font-semibold">Level 2</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Python untuk Data Science</h3>
                    <p class="text-orange-100 text-sm">Analisis data dan machine learning dengan Python</p>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-3 gap-4 mb-6 text-center">
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Durasi</p>
                            <p class="font-semibold text-gray-800">10 jam</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Video</p>
                            <p class="font-semibold text-gray-800">30</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Quiz</p>
                            <p class="font-semibold text-gray-800">12</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="ph ph-user text-gray-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Imam Fauzi</p>
                            <p class="text-gray-500 text-sm">Data Scientist</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('desktop.pages.materi.belajar-materi') }}" class="block w-full bg-orange-600 text-white text-center py-3 rounded-xl font-semibold hover:bg-orange-700 transition-colors">
                        Mulai Belajar
                    </a>
                </div>
            </div>

            <!-- Material Card 5 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <div class="bg-gradient-to-br from-red-500 to-red-600 p-6 text-white">
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-white bg-opacity-20 px-3 py-1 rounded-full">
                            <span class="text-sm font-semibold">Level 3</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Node.js & Express</h3>
                    <p class="text-red-100 text-sm">Backend development dengan Node.js dan Express</p>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-3 gap-4 mb-6 text-center">
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Durasi</p>
                            <p class="font-semibold text-gray-800">7 jam</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Video</p>
                            <p class="font-semibold text-gray-800">20</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Quiz</p>
                            <p class="font-semibold text-gray-800">9</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="ph ph-user text-gray-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Rudi Hermawan</p>
                            <p class="text-gray-500 text-sm">Backend Developer</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('desktop.pages.materi.belajar-materi') }}" class="block w-full bg-red-600 text-white text-center py-3 rounded-xl font-semibold hover:bg-red-700 transition-colors">
                        Mulai Belajar
                    </a>
                </div>
            </div>

            <!-- Material Card 6 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-6 text-white">
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-white bg-opacity-20 px-3 py-1 rounded-full">
                            <span class="text-sm font-semibold">Level 4</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Machine Learning Basics</h3>
                    <p class="text-teal-100 text-sm">Pengenalan konsep dan praktik machine learning</p>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-3 gap-4 mb-6 text-center">
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Durasi</p>
                            <p class="font-semibold text-gray-800">12 jam</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Video</p>
                            <p class="font-semibold text-gray-800">35</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs mb-1">Quiz</p>
                            <p class="font-semibold text-gray-800">15</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="ph ph-user text-gray-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Sari Dewi</p>
                            <p class="text-gray-500 text-sm">ML Engineer</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('desktop.pages.materi.belajar-materi') }}" class="block w-full bg-teal-600 text-white text-center py-3 rounded-xl font-semibold hover:bg-teal-700 transition-colors">
                        Mulai Belajar
                    </a>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="flex justify-center mt-12">
            <button class="bg-white border-2 border-gray-200 px-8 py-3 rounded-xl text-gray-700 font-semibold hover:border-blue-300 hover:text-blue-600 transition-all">
                <i class="ph ph-arrow-clockwise mr-2"></i>
                Muat Lebih Banyak
            </button>
        </div>
    </div>
</div>
@endsection