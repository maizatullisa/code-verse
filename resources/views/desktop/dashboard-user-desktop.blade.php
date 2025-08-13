@extends('desktop.layout.master-desktop')

@section('title', 'Code Verse - Dashboard Desktop')

@section('page-title', 'Code Verse')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-6 py-8">
            <h1 class="text-4xl font-bold text-gray-900 text-center mb-2">Code Verse</h1>
            <p class="text-gray-600 text-center text-lg">
                Platform Pembelajaran Online Untuk Para Coder
            </p>
        </div>
    </div>

    <!-- Search Box -->
    
    <!-- Coba jelajahi -->
    <div class="max-w-6xl mx-auto px-6 mb-16 top-10px">
        <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center">Coba Jelajahi</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer group">
                <div class="w-20 h-20 bg-emerald-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-music-note text-white text-3xl"></i>
                </div>
                <p class="text-sm font-semibold text-gray-700 group-hover:text-emerald-600 transition-colors">Music Quiz</p>
            </div>
                <a href="{{ url('/games/pilih-game') }}" class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer group">
                    <div class="w-20 h-20 bg-orange-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                        <i class="ph ph-puzzle-piece text-white text-3xl"></i>
                    </div>
                    <p class="text-sm font-semibold text-gray-700 group-hover:text-orange-600 transition-colors">Games</p>
                </a>


            <div class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer group">
                <div class="w-20 h-20 bg-blue-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-translate text-white text-3xl"></i>
                </div>
                <p class="text-sm font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">Language Quiz</p>
            </div>

            <div class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer group">
                <div class="w-20 h-20 bg-purple-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-image text-white text-3xl"></i>
                </div>
                <p class="text-sm font-semibold text-gray-700 group-hover:text-purple-600 transition-colors">Picture Quiz</p>
            </div>
        </div>

        <!-- Decorative Element -->
        <div class="flex justify-center items-center mt-12">
            <div class="flex space-x-2">
                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                <div class="w-3 h-3 bg-emerald-500 rounded-full"></div>
                <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
            </div>
        </div>
    </div>

    <!-- banner -->
    <div class="max-w-6xl mx-auto px-6 mb-16">
        <div class="bg-blue-600 rounded-3xl p-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white bg-opacity-10 rounded-full -translate-y-16 translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white bg-opacity-10 rounded-full translate-y-12 -translate-x-12"></div>
            <div class="relative flex justify-between items-center">
                <div class="text-white">
                    <p class="text-xl mb-2 font-medium">nanti bisa dikasih apa yng kita mau</p>
                    <p class="text-6xl font-bold mb-2">disini%</p>
                    <p class="text-xl font-medium">dan disini</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-40 h-32 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center">
                        <i class="ph ph-users text-white text-4xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommended Materials -->
    <div class="max-w-6xl mx-auto px-6 mb-16 top-10px">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <!-- Timer Header -->
                <div class="bg-blue-50 px-8 py-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <span class="text-gray-600 font-medium text-2xl">Rekomendasi kelas</span>
                        </div>
                        <a href="{{ url('/desktop/kelas-ditawarkan') }}" 
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Lihat Semua
                        </a>

                    </div>
                </div>

                <!-- Quiz Content -->
            </div>
        </div>
    </div>

    <!-- Best Teachers -->
    <div class="max-w-6xl mx-auto px-6 mb-20">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center gap-3">
                <i class="ph-fill ph-trophy text-2xl text-blue-600"></i>
                <h3 class="text-2xl font-semibold text-gray-800">Pengajar Terbaik</h3>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Teacher 1 -->
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div class="bg-yellow-100 border border-yellow-200 px-3 py-2 rounded-xl flex items-center gap-2">
                        <i class="ph-fill ph-trophy text-yellow-600"></i>
                        <span class="text-sm font-bold text-yellow-800">#1</span>
                    </div>
                    <img src="https://flagcdn.com/w40/id.png" alt="Flag" class="w-6 rounded" />
                </div>
                <div class="text-center">
                    <div class="relative inline-block mb-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
                            <i class="ph ph-user text-gray-400 text-2xl"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center">
                            <i class="ph-fill ph-medal text-xs text-white"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-1">Budi</h4>
                    <p class="text-gray-500 text-sm mb-4">Fullstack Developer</p>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors w-full">
                        Follow
                    </button>
                </div>
            </div>

            <!-- Teacher 2 -->
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div class="bg-gray-100 border border-gray-200 px-3 py-2 rounded-xl flex items-center gap-2">
                        <i class="ph-fill ph-trophy text-gray-500"></i>
                        <span class="text-sm font-bold text-gray-700">#2</span>
                    </div>
                    <img src="https://flagcdn.com/w40/id.png" alt="Flag" class="w-6 rounded" />
                </div>
                <div class="text-center">
                    <div class="relative inline-block mb-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
                            <i class="ph ph-user text-gray-400 text-2xl"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-gray-500 rounded-full flex items-center justify-center">
                            <i class="ph-fill ph-medal text-xs text-white"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-1">Andi</h4>
                    <p class="text-gray-500 text-sm mb-4">AI Engineer</p>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors w-full">
                        Follow
                    </button>
                </div>
            </div>

            <!-- Teacher 3 -->
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div class="bg-orange-100 border border-orange-200 px-3 py-2 rounded-xl flex items-center gap-2">
                        <i class="ph-fill ph-trophy text-orange-500"></i>
                        <span class="text-sm font-bold text-orange-700">#3</span>
                    </div>
                    <img src="https://flagcdn.com/w40/gb.png" alt="Flag" class="w-6 rounded" />
                </div>
                <div class="text-center">
                    <div class="relative inline-block mb-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
                            <i class="ph ph-user text-gray-400 text-2xl"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center">
                            <i class="ph-fill ph-medal text-xs text-white"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-1">Dedi</h4>
                    <p class="text-gray-500 text-sm mb-4">Security Engineer</p>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors w-full">
                        Follow
                    </button>
                </div>
            </div>

            <!-- Teacher 4 -->
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div class="bg-green-100 border border-green-200 px-3 py-2 rounded-xl flex items-center gap-2">
                        <i class="ph-fill ph-trophy text-green-500"></i>
                        <span class="text-sm font-bold text-green-700">#4</span>
                    </div>
                    <img src="https://flagcdn.com/w40/id.png" alt="Flag" class="w-6 rounded" />
                </div>
                <div class="text-center">
                    <div class="relative inline-block mb-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
                            <i class="ph ph-user text-gray-400 text-2xl"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                            <i class="ph-fill ph-medal text-xs text-white"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-1">Imam</h4>
                    <p class="text-gray-500 text-sm mb-4">Network Engineer</p>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors w-full">
                        Follow
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection