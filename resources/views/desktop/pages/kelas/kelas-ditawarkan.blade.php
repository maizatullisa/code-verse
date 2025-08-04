@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Yang Ditawarkan - Code Verse')

@section('page-title', 'Kelas Yang Ditawarkan')

@section('content')
    <!-- Search Box -->
    <div class="flex justify-center items-center gap-4 px-6 relative z-20 max-w-4xl mx-auto mb-8">
        <div class="flex justify-start items-center gap-4 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
            <i class="ph ph-magnifying-glass text-xl"></i>
            <input type="text" placeholder="Search Contest" class="bg-transparent outline-none placeholder:text-white w-full text-base" />
        </div>
        <button class="bg-color24 border border-color24 p-4 rounded-full text-white hover:bg-white/20">
            <i class="ph ph-sliders-horizontal text-xl"></i>
        </button>
    </div>

    <!-- Tab Navigation -->
    <div class="px-6 mb-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-center items-center gap-6 bg-color24 p-2 rounded-full">
                <a href="kelas-diambil" class="text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-white/20 transition-all">
                    Diambil
                </a>
                <a href="kelas-ditawarkan" class="bg-p1 text-white px-6 py-3 rounded-full font-semibold text-sm transition-all">
                    Ditawarkan
                </a>
                <a href="kelas-selesai" class="text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-white/20 transition-all">
                    Selesai
                </a>
            </div>
        </div>
    </div>

    

    <!-- Kelas List -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-4">
                <!-- Kelas 1 -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img1.png" 
                                 alt="React JS Fundamental" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-green-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                New
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">React JS Fundamental</h4>
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full font-medium">Premium</span>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Pengajar
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                John Doe
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>156 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-clock"></i>
                                    <span>8 minggu</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span>4.8 (124)</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 299.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 499.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">40% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                <a href="{{ url('/desktop/kelas-pendaftaran') }}"</a>
                                Daftar
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kelas 2 -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img2.png" 
                                 alt="Laravel Advanced" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Hot
                            </p>
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
                                    <i class="ph ph-users-three"></i>
                                    <span>89 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-clock"></i>
                                    <span>12 minggu</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span>4.9 (67)</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 599.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 799.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">25% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                Daftar
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kelas 3 -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img3.png" 
                                 alt="Python for Data Science" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-purple-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Popular
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Python for Data Science</h4>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-medium">Beginner</span>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Pengajar
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                Dr. Alex Chen
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>234 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-clock"></i>
                                    <span>10 minggu</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span>4.7 (189)</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 399.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 599.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">33% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                Daftar
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kelas 4 -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img4.png" 
                                 alt="Mobile App Development" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-indigo-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Trending
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Mobile App Development</h4>
                                <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded-full font-medium">Advanced</span>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Pengajar
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                Sarah Johnson
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>178 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-clock"></i>
                                    <span>14 minggu</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span>4.6 (145)</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 799.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 999.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">20% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                Daftar
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                Preview
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