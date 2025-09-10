@extends('desktop.layout.master-desktop')

@section('title', 'React JS Fundamental - Code Verse')

@section('page-title', 'Detail Kelas')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
    <!-- Hero Section -->
    <div class="px-6 mb-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-r from-p2 to-p3 rounded-2xl p-8 text-white">
                <div class="flex items-center gap-6">
                    <div class="relative rounded-xl overflow-hidden">
                        <img src="assets/images/library-favourite-img1.png" 
                             alt="React JS Fundamental" 
                             class="h-[160px] w-[220px] object-cover rounded-xl" />
                        <p class="text-white bg-green-500 absolute bottom-3 right-3 text-sm px-3 py-1 rounded-md font-medium">
                            New
                        </p>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <h1 class="font-bold text-3xl">React JS Fundamental</h1>
                            <span class="bg-yellow-400 text-yellow-900 text-sm px-3 py-1 rounded-full font-semibold">Premium</span>
                        </div>
                        <p class="text-white/90 text-lg flex items-center gap-2 mb-4">
                            Pengajar
                            <i class="ph-fill ph-dot-outline text-xl"></i>
                            John Doe
                        </p>
                        <div class="flex items-center gap-6 text-white/80 mb-4">
                            <div class="flex items-center gap-2">
                                <i class="ph ph-users-three text-xl"></i>
                                <span>156 siswa terdaftar</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="ph ph-clock text-xl"></i>
                                <span>8 minggu pembelajaran</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="px-6 mb-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-center items-center gap-2 bg-color24 p-2 rounded-full">
                <button class="tab-btn active bg-p1 text-white px-6 py-3 rounded-full font-semibold text-sm transition-all" data-tab="overview">
                    Overview
                </button>
                <button class="tab-btn text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-white/20 transition-all" data-tab="curriculum">
                    Kurikulum
                </button>
                <button class="tab-btn text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-white/20 transition-all" data-tab="instructor">
                    Pengajar
                </button>
            </div>
        </div>
    </div>

    <!-- Content Tabs -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Overview Tab -->
                    <div class="tab-content active" id="overview">
                        <div class="bg-white rounded-xl p-6 shadow2 mb-6">
                            <h3 class="font-bold text-xl mb-4 text-gray-800">Deskripsi Kelas</h3>
                            <p class="text-gray-600 leading-relaxed mb-4">
                                Pelajari React JS dari dasar hingga mahir dalam kelas ini. Anda akan memahami konsep fundamental React seperti components, props, state, hooks, dan lifecycle methods. Kelas ini cocok untuk pemula yang ingin memulai karir sebagai Frontend Developer.
                            </p>
                            <p class="text-gray-600 leading-relaxed mb-4">
                                Dengan pendekatan hands-on learning, Anda akan membuat beberapa project nyata yang bisa dijadikan portfolio. Materi disusun secara bertahap dari basic hingga advanced level.
                            </p>
                            
                            <h4 class="font-semibold text-lg mb-3 text-gray-800">Yang Akan Anda Pelajari:</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-check-circle text-green-500"></i>
                                    Fundamental React JS dan JSX
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-check-circle text-green-500"></i>
                                    Components dan Props
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-check-circle text-green-500"></i>
                                    State Management dan Hooks
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-check-circle text-green-500"></i>
                                    Event Handling dan Forms
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-check-circle text-green-500"></i>
                                    API Integration dan HTTP Requests
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-check-circle text-green-500"></i>
                                    Routing dengan React Router
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white rounded-xl p-6 shadow2">
                            <h3 class="font-bold text-xl mb-4 text-gray-800">Persyaratan</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-dot text-p1 text-xl"></i>
                                    Pemahaman dasar HTML, CSS, dan JavaScript
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-dot text-p1 text-xl"></i>
                                    Komputer dengan koneksi internet stabil
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-dot text-p1 text-xl"></i>
                                    Text editor (VS Code recommended)
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Curriculum Tab -->
                    <div class="tab-content hidden" id="curriculum">
                        <div class="bg-white rounded-xl p-6 shadow2">
                            <h3 class="font-bold text-xl mb-6 text-gray-800">Kurikulum Pembelajaran</h3>
                            <div class="space-y-4">
                                <!-- Week 1 -->
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="font-semibold text-lg text-gray-800">Week 1: Introduction to React</h4>
                                        <span class="text-sm text-gray-500">3 materi • 1 quiz</span>
                                    </div>
                                    <ul class="space-y-2 text-gray-600">
                                        <li class="flex items-center gap-2">
                                            <i class="ph ph-play-circle text-p1"></i>
                                            Setup Environment & First Component
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i class="ph ph-file-text text-p1"></i>
                                            Understanding JSX Syntax
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i class="ph ph-play-circle text-p1"></i>
                                            Props and Component Communication
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i class="ph ph-question text-orange-500"></i>
                                            Quiz: React Basics
                                        </li>
                                    </ul>
                                </div>

                                <!-- Week 2 -->
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="font-semibold text-lg text-gray-800">Week 2: State Management</h4>
                                        <span class="text-sm text-gray-500">4 materi • 1 quiz</span>
                                    </div>
                                    <ul class="space-y-2 text-gray-600">
                                        <li class="flex items-center gap-2">
                                            <i class="ph ph-play-circle text-p1"></i>
                                            useState Hook Deep Dive
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i class="ph ph-file-text text-p1"></i>
                                            State vs Props Best Practices
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i class="ph ph-play-circle text-p1"></i>
                                            Event Handling
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i class="ph ph-play-circle text-p1"></i>
                                            Conditional Rendering
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <i class="ph ph-question text-orange-500"></i>
                                            Quiz: State Management
                                        </li>
                                    </ul>
                                </div>

                                <!-- Continue for other weeks... -->
                                <div class="text-center py-4">
                                    <span class="text-gray-500">... dan 6 minggu pembelajaran lainnya</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructor Tab -->
                    <div class="tab-content hidden" id="instructor">
                        <div class="bg-white rounded-xl p-6 shadow2">
                            <div class="flex items-center gap-4 mb-6">
                                <img src="assets/images/instructor-avatar.jpg" alt="John Doe" class="w-20 h-20 rounded-full object-cover" />
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">John Doe</h3>
                                    <p class="text-gray-600">Senior Frontend Developer</p>
                                    <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
                                        <span>👥 1,234 students</span>
                                        <span>🎓 15 courses</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600 leading-relaxed">
                                John adalah Senior Frontend Developer dengan pengalaman 8+ tahun di industri teknologi. 
                                Dia telah bekerja di berbagai startup dan perusahaan besar, mengembangkan aplikasi web modern 
                                menggunakan React, Vue, dan Angular. Passionnya dalam mengajar membuatnya menjadi instruktur 
                                favorit dengan rating tinggi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar - Registration Form -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl p-6 shadow2 sticky top-4">
                        

                        <button class="w-full bg-gradient-to-r from-p2 to-p3 text-white py-3 rounded-full font-bold text-lg mb-4 hover:opacity-90 transition-all">
                            <a href="{{ url('/desktop/pages/kelas/kelas-pendaftaran') }}"</a>
                            Daftar Sekarang
                        </button>

                        <button class="w-full border-2 border-p2 text-p2 py-3 rounded-full font-semibold mb-6 hover:bg-p2/10 transition-all">
                            Preview Gratis
                        </button>

                        <div class="space-y-3 text-sm text-gray-600">
                            <div class="flex items-center gap-2">
                                <i class="ph ph-check-circle text-green-500"></i>
                                Akses seumur hidup
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="ph ph-check-circle text-green-500"></i>
                                Sertifikat completion
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="ph ph-check-circle text-green-500"></i>
                                1:1 mentoring session
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="ph ph-check-circle text-green-500"></i>
                                Project-based learning
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="ph ph-check-circle text-green-500"></i>
                                Komunitas eksklusif
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <p class="text-xs text-gray-500 text-center">
                                💰 30 hari money back guarantee<br>
                                🎯 Dapatkan akses instan setelah pembayaran
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('assets/js/custom/kelas-detail.js') }}"></script>

<style>
.tab-content.active {
    display: block;
}
.tab-content.hidden {
    display: none;
}
</style>
@endsection