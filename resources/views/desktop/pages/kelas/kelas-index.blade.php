@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Saya - Code Verse')

@section('page-title', 'Kelas Saya')

@section('content')
    <!-- Hero Section with Background -->
    <div class="bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700 relative overflow-hidden mb-8">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
            <div class="absolute bottom-10 right-10 w-24 h-24 bg-pink-300/20 rounded-full blur-lg"></div>
            <div class="absolute top-1/2 left-1/3 w-16 h-16 bg-yellow-300/15 rounded-full blur-md"></div>
        </div>
        
        <div class="relative z-10 py-12 px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-3xl font-bold mb-4">Kelola Pembelajaran Anda</h1>
                <p class="text-lg opacity-90">Lanjutkan perjalanan coding Anda dengan kelas-kelas terbaik</p>
            </div>
            
            <!-- Search Box -->
            <div class="flex justify-center items-center gap-4 max-w-4xl mx-auto mt-8">
                <div class="flex justify-start items-center gap-4 bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-2xl text-white w-full shadow-lg">
                    <i class="ph ph-magnifying-glass text-xl text-white/80"></i>
                    <input type="text" placeholder="Cari kelas favorit Anda..." 
                           class="bg-transparent outline-none placeholder:text-white/70 w-full text-base text-white" />
                </div>
                <button class="bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-2xl text-white hover:bg-white/20 transition-all shadow-lg">
                    <i class="ph ph-sliders-horizontal text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="px-6 mb-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-center items-center gap-2 bg-white rounded-2xl p-2 shadow-lg border border-gray-100">
                <a href="kelas-index" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-8 py-3 rounded-xl font-semibold text-sm transition-all shadow-md">
                    📚 Diambil
                </a>
                <a href="kelas-selesai" class="text-gray-600 px-8 py-3 rounded-xl font-semibold text-sm hover:bg-gray-50 transition-all">
                    ✅ Selesai
                </a>
            </div>
        </div>
    </div>

    <!-- Kelas Diambil List -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                <!-- Kelas Card Component 1 -->
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 group">
                    <div class="flex items-center gap-6">
                        <!-- Course Image with Status -->
                        <div class="relative flex-shrink-0">
                            <div class="w-36 h-24 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-2xl overflow-hidden shadow-lg">
                                <img src="assets/images/library-favourite-img1.png" 
                                     alt="React JS Fundamental" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-all duration-300" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            </div>
                            <div class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs px-3 py-1 rounded-full font-medium shadow-lg">
                                🔄 Berlangsung
                            </div>
                        </div>

                        <!-- Course Info -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-3">
                                <h4 class="font-bold text-xl text-gray-800 group-hover:text-indigo-600 transition-colors">
                                    React JS Fundamental
                                </h4>
                                <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs px-3 py-1 rounded-full font-medium shadow-sm">
                                    ⭐ Premium
                                </span>
                            </div>
                            
                            <div class="flex items-center gap-2 text-gray-600 text-sm mb-4">
                                <div class="w-8 h-8 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs font-semibold">JD</span>
                                </div>
                                <span class="font-medium">John Doe</span>
                                <div class="w-1 h-1 bg-gray-400 rounded-full"></div>
                                <span class="text-gray-500">Senior Developer</span>
                            </div>
                            
                            <div class="flex items-center gap-6 text-xs text-gray-500 mb-4">
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full">
                                    <i class="ph ph-clock text-indigo-500"></i>
                                    <span>8 minggu</span>
                                </div>
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full">
                                    <i class="ph ph-calendar text-green-500"></i>
                                    <span>15 Jan 2025</span>
                                </div>
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span class="font-medium">4.8 (124)</span>
                                </div>
                            </div>
                            
                            <!-- Progress Section -->
                            <div class="bg-gradient-to-r from-gray-50 to-indigo-50 p-3 rounded-xl">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-700">Progress Pembelajaran</span>
                                    <span class="text-sm font-bold text-indigo-600">65%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 shadow-inner">
                                    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-3 rounded-full transition-all duration-500 shadow-sm" style="width: 65%"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 mt-1">
                                    <span>13/20 materi</span>
                                    <span>~3 minggu lagi</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col gap-3 flex-shrink-0">
                            <a href="{{ url('/desktop/kelas-materi') }}"
                               class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:from-indigo-600 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                🚀 Lanjut Belajar
                            </a>
                            <button class="border-2 border-gray-200 text-gray-600 px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-50 hover:border-gray-300 transition-all">
                                📋 Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kelas Card Component 2 -->
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 group">
                    <div class="flex items-center gap-6">
                        <!-- Course Image with Status -->
                        <div class="relative flex-shrink-0">
                            <div class="w-36 h-24 bg-gradient-to-br from-green-400 to-emerald-600 rounded-2xl overflow-hidden shadow-lg">
                                <img src="assets/images/library-favourite-img3.png" 
                                     alt="Python for Data Science" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-all duration-300" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            </div>
                            <div class="absolute -top-2 -right-2 bg-green-500 text-white text-xs px-3 py-1 rounded-full font-medium shadow-lg">
                                🌱 Baru Dimulai
                            </div>
                        </div>

                        <!-- Course Info -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-3">
                                <h4 class="font-bold text-xl text-gray-800 group-hover:text-green-600 transition-colors">
                                    Python for Data Science
                                </h4>
                                <span class="bg-gradient-to-r from-green-400 to-emerald-500 text-white text-xs px-3 py-1 rounded-full font-medium shadow-sm">
                                    🔰 Beginner
                                </span>
                            </div>
                            
                            <div class="flex items-center gap-2 text-gray-600 text-sm mb-4">
                                <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs font-semibold">AC</span>
                                </div>
                                <span class="font-medium">Dr. Alex Chen</span>
                                <div class="w-1 h-1 bg-gray-400 rounded-full"></div>
                                <span class="text-gray-500">Data Scientist</span>
                            </div>
                            
                            <div class="flex items-center gap-6 text-xs text-gray-500 mb-4">
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full">
                                    <i class="ph ph-clock text-indigo-500"></i>
                                    <span>10 minggu</span>
                                </div>
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full">
                                    <i class="ph ph-calendar text-green-500"></i>
                                    <span>1 Feb 2025</span>
                                </div>
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span class="font-medium">4.7 (189)</span>
                                </div>
                            </div>
                            
                            <!-- Progress Section -->
                            <div class="bg-gradient-to-r from-gray-50 to-green-50 p-3 rounded-xl">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-700">Progress Pembelajaran</span>
                                    <span class="text-sm font-bold text-green-600">15%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 shadow-inner">
                                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-3 rounded-full transition-all duration-500 shadow-sm" style="width: 15%"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 mt-1">
                                    <span>3/20 materi</span>
                                    <span>~9 minggu lagi</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col gap-3 flex-shrink-0">
                            <button class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:from-green-600 hover:to-emerald-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                🚀 Lanjut Belajar
                            </button>
                            <button class="border-2 border-gray-200 text-gray-600 px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-50 hover:border-gray-300 transition-all">
                                📋 Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kelas Card Component 3 -->
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 group opacity-75">
                    <div class="flex items-center gap-6">
                        <!-- Course Image with Status -->
                        <div class="relative flex-shrink-0">
                            <div class="w-36 h-24 bg-gradient-to-br from-orange-400 to-red-500 rounded-2xl overflow-hidden shadow-lg">
                                <img src="assets/images/library-favourite-img2.png" 
                                     alt="Laravel Advanced" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-all duration-300" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            </div>
                            <div class="absolute -top-2 -right-2 bg-orange-500 text-white text-xs px-3 py-1 rounded-full font-medium shadow-lg">
                                ⏳ Akan Dimulai
                            </div>
                        </div>

                        <!-- Course Info -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-3">
                                <h4 class="font-bold text-xl text-gray-800 group-hover:text-orange-600 transition-colors">
                                    Laravel Advanced
                                </h4>
                                <span class="bg-gradient-to-r from-blue-400 to-indigo-500 text-white text-xs px-3 py-1 rounded-full font-medium shadow-sm">
                                    ⚡ Intermediate
                                </span>
                            </div>
                            
                            <div class="flex items-center gap-2 text-gray-600 text-sm mb-4">
                                <div class="w-8 h-8 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs font-semibold">JS</span>
                                </div>
                                <span class="font-medium">Jane Smith</span>
                                <div class="w-1 h-1 bg-gray-400 rounded-full"></div>
                                <span class="text-gray-500">Laravel Expert</span>
                            </div>
                            
                            <div class="flex items-center gap-6 text-xs text-gray-500 mb-4">
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full">
                                    <i class="ph ph-clock text-indigo-500"></i>
                                    <span>12 minggu</span>
                                </div>
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full">
                                    <i class="ph ph-calendar text-green-500"></i>
                                    <span>15 Feb 2025</span>
                                </div>
                                <div class="flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span class="font-medium">4.9 (67)</span>
                                </div>
                            </div>
                            
                            <!-- Progress Section -->
                            <div class="bg-gradient-to-r from-gray-50 to-orange-50 p-3 rounded-xl">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-700">Progress Pembelajaran</span>
                                    <span class="text-sm font-bold text-gray-400">0%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 shadow-inner">
                                    <div class="bg-gray-300 h-3 rounded-full transition-all duration-500" style="width: 0%"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 mt-1">
                                    <span>0/24 materi</span>
                                    <span>Dimulai 15 Feb</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col gap-3 flex-shrink-0">
                            <button class="bg-gray-400 text-white px-6 py-3 rounded-xl text-sm font-semibold cursor-not-allowed opacity-60" disabled>
                                🔒 Belum Dimulai
                            </button>
                            <button class="border-2 border-gray-200 text-gray-600 px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-50 hover:border-gray-300 transition-all">
                                📋 Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="text-center pt-12">
                    <button class="bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500 text-white px-10 py-4 rounded-2xl font-bold text-lg hover:from-indigo-600 hover:via-purple-700 hover:to-pink-600 transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                        ✨ Load More Kelas
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection