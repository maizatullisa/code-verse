@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Saya - Code Verse')

@section('page-title', 'Kelas Saya')

@section('content')
    <!-- Search Box -->
    <div class="flex justify-center items-center gap-4 px-6 relative z-20 max-w-4xl mx-auto mb-8">
        <div class="flex justify-start items-center gap-4 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
            <i class="ph ph-magnifying-glass text-xl"></i>
            <input type="text" placeholder="Search Kelas" class="bg-transparent outline-none placeholder:text-white w-full text-base" />
        </div>
        <button class="bg-color24 border border-color24 p-4 rounded-full text-white hover:bg-white/20">
            <i class="ph ph-sliders-horizontal text-xl"></i>
        </button>
    </div>

    <!-- Tab Navigation -->
    <div class="px-6 mb-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-center items-center gap-6 bg-color24 p-2 rounded-full">
                <a href="kelas-index" class="bg-p1 text-white px-6 py-3 rounded-full font-semibold text-sm transition-all">
                    Diambil
                </a>
                <a href="kelas-selesai" class="text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-white/20 transition-all">
                    Selesai
                </a>
            </div>
        </div>
    </div>

    <!-- Kelas Diambil List -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-4">
                
                <!-- Kelas Diambil 3 -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img2.png" 
                                 alt="Laravel Advanced" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <div class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1 rounded-full">
                                Akan Dimulai
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Laravel Advanced</h4>
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full font-medium">Intermediate</span>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Pengajar
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                Jane Smith
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-clock"></i>
                                    <span>12 minggu</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-calendar"></i>
                                    <span>Dimulai: 15 Feb 2025</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span>4.9 (67)</span>
                                </div>
                            </div>
                            <!-- Progress Bar -->
                            <div class="mb-2">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-xs text-gray-600">Progress</span>
                                    <span class="text-xs text-gray-400 font-semibold">0%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-gray-300 h-2 rounded-full transition-all" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-gray-400 text-white px-4 py-2 rounded-full text-sm font-medium cursor-not-allowed" disabled>
                                Belum Dimulai
                            </button>
                            <button class="border border-gray-300 text-gray-600 px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-50">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="text-center pt-8">
                    <button class="bg-gradient-to-r from-p2 to-p3 text-white px-8 py-3 rounded-full font-semibold hover:opacity-90 transition-all">
                        Load More Kelas
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection