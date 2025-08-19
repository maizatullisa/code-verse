@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Yang Ditawarkan - Code Verse')

@section('page-title', 'Kelas Yang Ditawarkan')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
    <!-- Search Box -->
    <div class="flex justify-center items-center gap-4 px-6 relative z-20 max-w-4xl mx-auto mb-8">
        <div class="flex justify-start items-center gap-4 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
            <i class="ph ph-magnifying-glass text-xl"></i>
            <input type="text" id="searchKelas" placeholder="Cari kelas yang ingin dipelajari..." class="bg-transparent outline-none placeholder:text-white w-full text-base" />
        </div>
        <button class="bg-color24 border border-color24 p-4 rounded-full text-white hover:bg-white/20 transition-all" onclick="toggleFilter()">
            <i class="ph ph-sliders-horizontal text-xl"></i>
        </button>
    </div>

    <!-- Filter Panel (Hidden by default) 
    <div id="filterPanel" class="hidden px-6 mb-6">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl p-6 shadow-lg border">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Filter Kelas</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Level</label>
                    <select id="levelFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-p2 focus:border-p2">
                        <option value="">Semua Level</option>
                        <option value="beginner">Pemula</option>
                        <option value="intermediate">Menengah</option>
                        <option value="advanced">Lanjutan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <select id="priceFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-p2 focus:border-p2">
                        <option value="">Semua Harga</option>
                        <option value="free">Gratis</option>
                        <option value="paid">Berbayar</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Urutkan</label>
                    <select id="sortFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-p2 focus:border-p2">
                        <option value="newest">Terbaru</option>
                        <option value="popular">Terpopuler</option>
                        <option value="rating">Rating Tertinggi</option>
                        <option value="price_low">Harga Terendah</option>
                        <option value="price_high">Harga Tertinggi</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-4 gap-3">
                <button onclick="resetFilters()" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Reset
                </button>
                <button onclick="applyFilters()" class="px-4 py-2 bg-p2 text-white rounded-lg hover:bg-p2/90">
                    Terapkan Filter
                </button>
            </div>
        </div>
    </div> -->

    <!-- Filter Kategori 
    <div class="px-6 mb-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center gap-3 overflow-x-auto pb-2">
                <button class="category-btn bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all" data-category="all">
                    Semua
                </button>
                <button class="category-btn bg-white text-gray-600 border border-gray-300 px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap hover:bg-gray-50 transition-all" data-category="programming">
                    Programming
                </button>
                <button class="category-btn bg-white text-gray-600 border border-gray-300 px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap hover:bg-gray-50 transition-all" data-category="web">
                    Web Development
                </button>
                <button class="category-btn bg-white text-gray-600 border border-gray-300 px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap hover:bg-gray-50 transition-all" data-category="mobile">
                    Mobile Development
                </button>
                <button class="category-btn bg-white text-gray-600 border border-gray-300 px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap hover:bg-gray-50 transition-all" data-category="data">
                    Data Science
                </button>
                <button class="category-btn bg-white text-gray-600 border border-gray-300 px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap hover:bg-gray-50 transition-all" data-category="design">
                    UI/UX Design
                </button>
                <button class="category-btn bg-white text-gray-600 border border-gray-300 px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap hover:bg-gray-50 transition-all" data-category="devops">
                    DevOps
                </button>
            </div>
        </div>
    </div> -->

    <!-- Stats Info 
    <div class="px-6 mb-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center">
                <p class="text-gray-600">
                    Menampilkan <span id="totalResults" class="font-semibold text-p2">24</span> kelas tersedia
                </p>
                <div class="flex items-center gap-2">
                    <button onclick="toggleView('grid')" id="gridView" class="p-2 rounded-lg bg-p2 text-white">
                        <i class="ph ph-squares-four text-lg"></i>
                    </button>
                    <button onclick="toggleView('list')" id="listView" class="p-2 rounded-lg text-gray-400 hover:text-gray-600">
                        <i class="ph ph-list text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>-->

    <!-- Kelas List -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div id="kelasList" class="space-y-4">
                <!-- Kelas 1 - React JS -->
                <div class="kelas-card bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all cursor-pointer" 
                     data-category="web" 
                     data-level="beginner" 
                     data-price="299000"
                     onclick="goToDetailKelas('react-js-fundamental')">
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
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-graduation-cap"></i>
                                    <span>Pemula</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 299.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 499.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">40% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href="{{ url('/desktop/kelas-pendaftaran') }}"
                            class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90 transition-all">
                                Daftar
                            </a>

                          <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10 transition-all" 
                                onclick="window.location.href='/desktop/kelas-previews'">
                                Preview
                            </button>

                        </div>

                    </div>
                </div>

                <!-- Kelas 2 - Laravel -->
                <div class="kelas-card bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all cursor-pointer" 
                     data-category="web" 
                     data-level="intermediate" 
                     data-price="599000"
                     onclick="goToDetailKelas('laravel-advanced')">
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
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full font-medium">Premium</span>
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
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-graduation-cap"></i>
                                    <span>Menengah</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 599.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 799.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">25% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href="{{ url('/desktop/kelas-pendaftaran') }}"
                            class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90 transition-all">
                                Daftar
                            </a>

                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10 transition-all" 
                                    onclick="event.stopPropagation(); previewKelas('laravel-advanced')">
                                Preview
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Kelas 3 - Python Data Science -->
                <div class="kelas-card bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all cursor-pointer" 
                     data-category="data" 
                     data-level="beginner" 
                     data-price="399000"
                     onclick="goToDetailKelas('python-data-science')">
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
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-medium">Trending</span>
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
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-graduation-cap"></i>
                                    <span>Pemula</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 399.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 599.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">33% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href="{{ url('/desktop/kelas-pendaftaran') }}"
                            class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90 transition-all">
                                Daftar
                            </a>

                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10 transition-all" 
                                    onclick="event.stopPropagation(); previewKelas('laravel-advanced')">
                                Preview
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Kelas 4 - Mobile Development -->
                <div class="kelas-card bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all cursor-pointer" 
                     data-category="mobile" 
                     data-level="advanced" 
                     data-price="799000"
                     onclick="goToDetailKelas('mobile-development')">
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
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-graduation-cap"></i>
                                    <span>Lanjutan</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 799.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 999.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">20% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href="{{ url('/desktop/kelas-pendaftaran') }}"
                            class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90 transition-all">
                                Daftar
                            </a>

                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10 transition-all" 
                                    onclick="event.stopPropagation(); previewKelas('laravel-advanced')">
                                Preview
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Kelas 5 - Vue.js -->
                <div class="kelas-card bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all cursor-pointer" 
                     data-category="web" 
                     data-level="beginner" 
                     data-price="349000"
                     onclick="goToDetailKelas('vuejs-complete')">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img5.png" 
                                 alt="Vue.js Complete Guide" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-blue-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Updated
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Vue.js Complete Guide</h4>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-medium">Beginner</span>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Pengajar
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                Michael Brown
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>98 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-clock"></i>
                                    <span>9 minggu</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span>4.5 (76)</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-graduation-cap"></i>
                                    <span>Pemula</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 349.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 449.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">22% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href="{{ url('/desktop/kelas-pendaftaran') }}"
                            class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90 transition-all">
                                Daftar
                            </a>

                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10 transition-all" 
                                    onclick="event.stopPropagation(); previewKelas('laravel-advanced')">
                                Preview
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Kelas 6 - Node.js -->
                <div class="kelas-card bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all cursor-pointer" 
                     data-category="web" 
                     data-level="intermediate" 
                     data-price="549000"
                     onclick="goToDetailKelas('nodejs-backend')">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img6.png" 
                                 alt="Node.js Backend Development" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-red-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Limited
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">Node.js Backend Development</h4>
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full font-medium">Intermediate</span>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Pengajar
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                David Wilson
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>45 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-clock"></i>
                                    <span>11 minggu</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span>4.9 (38)</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-graduation-cap"></i>
                                    <span>Menengah</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 549.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 699.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">21% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90 transition-all" onclick="event.stopPropagation(); goToDetailKelas('nodejs-backend')">
                                Lihat Detail
                            </button>
                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10 transition-all" onclick="event.stopPropagation(); previewKelas('nodejs-backend')">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Free Class Example -->
                <div class="kelas-card bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all cursor-pointer" 
                     data-category="programming" 
                     data-level="beginner" 
                     data-price="0"
                     onclick="goToDetailKelas('html-css-basics')">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img7.png" 
                                 alt="HTML & CSS Basics" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-green-600 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Free
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">HTML & CSS Basics</h4>
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-medium">Gratis</span>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Pengajar
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                Emily Davis
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>567 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-clock"></i>
                                    <span>6 minggu</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span>4.4 (234)</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-graduation-cap"></i>
                                    <span>Pemula</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-green-600 font-bold text-lg">Gratis</span>
                                <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">100% Free</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href="{{ url('/desktop/kelas-pendaftaran') }}"
                            class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90 transition-all">
                                Daftar
                            </a>

                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10 transition-all" 
                                    onclick="event.stopPropagation(); previewKelas('laravel-advanced')">
                                Preview
                            </button>
                        </div>

                    </div>
                </div>

                <!-- UI/UX Design Course -->
                <div class="kelas-card bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all cursor-pointer" 
                     data-category="design" 
                     data-level="beginner" 
                     data-price="449000"
                     onclick="goToDetailKelas('uiux-design-fundamentals')">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="assets/images/library-favourite-img8.png" 
                                 alt="UI/UX Design Fundamentals" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-pink-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Creative
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">UI/UX Design Fundamentals</h4>
                                <span class="bg-pink-100 text-pink-800 text-xs px-2 py-1 rounded-full font-medium">Design</span>
                            </div>
                            <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                Pengajar
                                <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                Lisa Anderson
                            </p>
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>
                                    <span>312 siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-clock"></i>
                                    <span>8 minggu</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-star-fill text-yellow-400"></i>
                                    <span>4.7 (198)</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="ph ph-graduation-cap"></i>
                                    <span>Pemula</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-p2 font-bold text-lg">Rp 449.000</span>
                                <span class="text-gray-400 line-through text-sm">Rp 599.000</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">25% OFF</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href="{{ url('/desktop/kelas-pendaftaran') }}"
                            class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90 transition-all">
                                Daftar
                            </a>

                            <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10 transition-all" 
                                    onclick="event.stopPropagation(); previewKelas('laravel-advanced')">
                                Preview
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load More Button -->
    <div class="flex justify-center mb-20">
        <button id="loadMoreBtn" class="bg-p2 text-white px-8 py-3 rounded-full font-medium hover:bg-p2/90 transition-all">
            Muat Lebih Banyak
        </button>
    </div>
@endsection

@push('scripts')

<script src="{{ asset('assets/js/custom/kelas-ditawarkan.js') }}"></script>
@endpush