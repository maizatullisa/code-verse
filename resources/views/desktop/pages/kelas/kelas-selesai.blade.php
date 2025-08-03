@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Selesai - Code Verse')

@section('page-title', 'Kelas Selesai')

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
                <a href="kelas-ditawarkan" class="text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-white/20 transition-all">
                    Ditawarkan
                </a>
                <a href="kelas-selesai" class="bg-p1 text-white px-6 py-3 rounded-full font-semibold text-sm transition-all">
                    Selesai
                </a>
            </div>
        </div>
    </div>

    <!-- Achievement Summary -->
    <div class="px-6 mb-12">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-r from-p2 to-p3 p-6 rounded-2xl text-white mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Selamat! 🎉</h3>
                        <p class="text-white/90">Kamu telah menyelesaikan 5 kelas dengan nilai rata-rata</p>
                        <div class="flex items-center gap-2 mt-2">
                            <div class="flex items-center">
                                <i class="ph-fill ph-star text-yellow-300 text-xl"></i>
                                <i class="ph-fill ph-star text-yellow-300 text-xl"></i>
                                <i class="ph-fill ph-star text-yellow-300 text-xl"></i>
                                <i class="ph-fill ph-star text-yellow-300 text-xl"></i>
                                <i class="ph ph-star text-yellow-300 text-xl"></i>
                            </div>
                            <span class="text-2xl font-bold">4.2/5.0</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="ph-fill ph-trophy text-yellow-300 text-4xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter and Sort -->
    <div class="px-6 mb-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <select class="bg-white border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-p2">
                        <option>Semua Kategori</option>
                        <option>Web Development</option>
                        <option>Mobile Development</option>
                        <option>Database</option>
                        <option>AI/ML</option>
                    </select>
                    <select class="bg-white border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-p2">
                        <option>Terbaru</option>
                        <option>Rating Tertinggi</option>
                        <option>Durasi Terpendek</option>
                        <option>Durasi Terpanjang</option>
                    </select>
                </div>
                <div class="text-sm text-gray-500">
                    Menampilkan 5 dari 5 kelas selesai
                </div>
            </div>
        </div>
    </div>

    <!-- Completed Classes List -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-4">
                <!-- Kelas 1 - HTML -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all border-l-4 border-green-500">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img1.png" 
                                 alt="Kelas HTML" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-green-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Completed
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Kelas HTML</h4>
                                <div class="flex items-center bg-green-100 px-2 py-1 rounded-full">
                                    <i class="ph-fill ph-certificate text-green-600 text-sm mr-1"></i>
                                    <span class="text-green-600 text-xs font-medium">Certified</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Capaian
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                100%
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>289 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-calendar"></i>
                                    <span>Selesai: 15 Jan 2024</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow-400"></i>
                                    <span class="font-medium">5.0</span>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                Download Sertifikat
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                Review
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kelas 2 - CSS -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all border-l-4 border-green-500">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img2.png" 
                                 alt="Kelas CSS" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-green-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Completed
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Kelas CSS</h4>
                                <div class="flex items-center bg-green-100 px-2 py-1 rounded-full">
                                    <i class="ph-fill ph-certificate text-green-600 text-sm mr-1"></i>
                                    <span class="text-green-600 text-xs font-medium">Certified</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Capaian
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                100%
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>132 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-calendar"></i>
                                    <span>Selesai: 28 Jan 2024</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow-400"></i>
                                    <span class="font-medium">4.8</span>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                Download Sertifikat
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                Review
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kelas 3 - JavaScript -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all border-l-4 border-green-500">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img3.png" 
                                 alt="Kelas JavaScript" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-green-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Completed
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Kelas JAVASCRIPT</h4>
                                <div class="flex items-center bg-green-100 px-2 py-1 rounded-full">
                                    <i class="ph-fill ph-certificate text-green-600 text-sm mr-1"></i>
                                    <span class="text-green-600 text-xs font-medium">Certified</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Capaian
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                100%
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>132 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-calendar"></i>
                                    <span>Selesai: 10 Feb 2024</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow-400"></i>
                                    <span class="font-medium">4.5</span>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                Download Sertifikat
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                Review
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kelas 4 - PHP Dasar -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all border-l-4 border-green-500">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img4.png" 
                                 alt="Kelas PHP Dasar" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-green-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Completed
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Kelas PHP DASAR</h4>
                                <div class="flex items-center bg-green-100 px-2 py-1 rounded-full">
                                    <i class="ph-fill ph-certificate text-green-600 text-sm mr-1"></i>
                                    <span class="text-green-600 text-xs font-medium">Certified</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Capaian
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                100%
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>132 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-calendar"></i>
                                    <span>Selesai: 25 Feb 2024</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow-400"></i>
                                    <span class="font-medium">4.2</span>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                Download Sertifikat
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                Review
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kelas 5 - Database -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all border-l-4 border-green-500">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img1.png" 
                                 alt="Kelas Database" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-green-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Completed
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Kelas BASISDATA</h4>
                                <div class="flex items-center bg-green-100 px-2 py-1 rounded-full">
                                    <i class="ph-fill ph-certificate text-green-600 text-sm mr-1"></i>
                                    <span class="text-green-600 text-xs font-medium">Certified</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Capaian
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                100%
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>123 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-calendar"></i>
                                    <span>Selesai: 15 Mar 2024</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph-fill ph-star text-yellow-400"></i>
                                    <span class="font-medium">3.8</span>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                Download Sertifikat
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                Review
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Achievement Stats -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-r from-green-400 to-green-600 p-6 rounded-xl text-white text-center">
                    <i class="ph-fill ph-trophy text-4xl mb-3"></i>
                    <h4 class="text-2xl font-bold">5</h4>
                    <p class="text-sm opacity-90">Kelas Selesai</p>
                </div>
                <div class="bg-gradient-to-r from-blue-400 to-blue-600 p-6 rounded-xl text-white text-center">
                    <i class="ph-fill ph-certificate text-4xl mb-3"></i>
                    <h4 class="text-2xl font-bold">5</h4>
                    <p class="text-sm opacity-90">Sertifikat Earned</p>
                </div>
                <div class="bg-gradient-to-r from-purple-400 to-purple-600 p-6 rounded-xl text-white text-center">
                    <i class="ph-fill ph-clock text-4xl mb-3"></i>
                    <h4 class="text-2xl font-bold">120</h4>
                    <p class="text-sm opacity-90">Jam Belajar</p>
                </div>
            </div>
        </div>
    </div>
@endsection