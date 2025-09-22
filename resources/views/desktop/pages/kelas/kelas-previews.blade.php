
@extends('desktop.layout.master-desktop')

@section('title', 'React JS Fundamental - Code Verse')

@section('page-title', 'Detail Kelas')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
    <!-- Hero Section -->
    <div class="px-6 mb-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white from-p2 to-p3 rounded-2xl p-8 text-black">
                <div class="flex items-center gap-6">
                    <div class="relative rounded-xl overflow-hidden">
                        <img src="{{ $kelas->cover_image ? asset('storage/' . $kelas->cover_image) : 'https://via.placeholder.com/140x100?text=Course' }}" 
                             alt="{{ $kelas->nama_kelas }}" 
                             class="h-[160px] w-[220px] object-cover rounded-xl" />
                        <p class="text-white bg-green-500 absolute bottom-3 right-3 text-sm px-3 py-1 rounded-md font-medium">
                           {{  $kelas->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <h1 class="font-bold text-3xl">{{ $kelas->nama_kelas }}</h1>
                            <span class="bg-yellow-400 text-yellow-900 text-sm px-3 py-1 rounded-full font-semibold">Gratis</span>
                        </div>
                        <p class="text-black/90 text-lg flex items-center gap-2 mb-4">
                            Pengajar
                            <i class="ph-fill ph-dot-outline text-xl"></i>
                            {{ $kelas->pengajar->name ?? $kelas->pengajar->first_name ?? 'Pengajar' }}
                        
                        </p>
                        <div class="flex items-center gap-6 text-black/80 mb-4">
                            <div class="flex items-center gap-2">
                                <i class="ph ph-users-three text-xl"></i>
                                <span>{{ $courseData['enrollment_count'] }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <!-- <i class="ph ph-clock text-xl"></i> -->
                                <!-- <span>{{ $kelas->durasi }}</span> -->
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
                <button class="tab-btn active bg-yellow-400 text-white px-6 py-3 rounded-full font-semibold text-sm transition-all" data-tab="overview">
                    Overview
                </button>
                <!-- <button class="tab-btn text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-white/20 transition-all" data-tab="curriculum">
                    Kurikulum
                </button> -->
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
                              {{ $kelas->deskripsi}}
                            </p>
                            
                        </div>

                        <div class="bg-white rounded-xl p-6 shadow2">
                            <h3 class="font-bold text-xl mb-4 text-gray-800">Persyaratan</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-dot text-p1 text-xl"></i>
                                    Semangat dan komitmen untuk belajar
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-dot text-p1 text-xl"></i>
                                    Laptop/PC dengan koneksi internet stabil
                                </li>
                                 <li class="flex items-center gap-2">
                                    <i class="ph ph-dot text-p1 text-xl"></i>
                                    Perangkat (laptop/PC) dengan minimal RAM 4GB
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="ph ph-dot text-p1 text-xl"></i>
                                    Text editor (VS Code recommended)
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Curriculum Tab -->
                    <!-- <div class="tab-content hidden" id="curriculum">
                        <div class="bg-white rounded-xl p-6 shadow2">
                            <h3 class="font-bold text-xl mb-6 text-gray-800">Kurikulum Pembelajaran</h3>
                            <div class="space-y-4"> -->
                                <!-- Week 1 -->
                                <!-- <div class="border border-gray-200 rounded-lg p-4">
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
                                </div> -->

                                <!-- Week 2 -->
                                <!-- <div class="border border-gray-200 rounded-lg p-4">
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
                                </div> -->

                                <!-- Continue for other weeks... -->
                                <!-- <div class="text-center py-4">
                                    <span class="text-gray-500">... dan 6 minggu pembelajaran lainnya</span>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Instructor Tab -->
                    <div class="tab-content hidden" id="instructor">
                        <div class="bg-white rounded-xl p-6 shadow2">
                            <div class="flex items-center gap-4 mb-6">
                               <img src="{{ $courseData['pengajar_avatar'] }}" alt="Foto Pengajar" class="w-24 h-24 rounded-full">
                                <div>
                                    <h3 class="text-xl font-bold">{{ $courseData['pengajar_nama'] }}</h3>
                                    @if($courseData['pengajar_jabatan'])
                                    <p class="text-sm text-gray-600">{{ $courseData['pengajar_jabatan'] }}</p>
                                @endif
                                    <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
                                        <span>👥 {{ $courseData['total_siswa_pengajar'] }}</span>
                                        <span>🎓 {{ $courseData['total_kelas_pengajar'] }}</span>
                                    </div>
                                </div>
                            </div>
                  <h4 class="text-lg font-semibold mt-6 mb-2">Riwayat Pendidikan</h4>
                    <ul class="list-disc ml-6 text-gray-700">
                        @forelse ($courseData['riwayat_pendidikan'] as $edu)
                            <li>
                                {{ $edu->jenjang }} - {{ $edu->jurusan }}, {{ $edu->institusi }}
                                @if($edu->tahun_lulus)
                                    (Lulus {{ $edu->tahun_lulus }})
                                @endif
                            </li>
                        @empty
                            <li>Belum ada riwayat pendidikan</li>
                        @endforelse
                    </ul>
                    @if($kelasLainDariPengajar->isNotEmpty())
                    <div class="mt-12">
                        <h3 class="text-xl font-bold mb-4">Kelas Lain dari Pengajar Ini</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            @foreach($kelasLainDariPengajar as $kelasItem)
                                <a href="{{ route('kelas.detail', $kelasItem->id) }}" class="block bg-white shadow rounded-lg overflow-hidden hover:shadow-md transition">
                                    <img src="{{ $kelasItem->cover_image ? asset('storage/' . $kelasItem->cover_image) : asset('assets/images/library-favourite-img1.png') }}" alt="{{ $kelasItem->nama_kelas }}" class="w-full h-40 object-cover">
                                    <div class="p-4">
                                        <h4 class="text-lg font-semibold">{{ $kelasItem->nama_kelas }}</h4>
                                        <p class="text-sm text-gray-600">{{ ucfirst($kelasItem->kategori) }} · {{ ucfirst($kelasItem->level) }}</p>
                                    </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        </div>
                        
                    </div>
                </div>

                <!-- Sidebar - Registration Form -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl p-6 shadow2 sticky top-4">
                        

                        <!-- <button class="w-full bg-gradient-to-r from-p2 to-p3 text-white py-3 rounded-full font-bold text-lg mb-4 hover:opacity-90 transition-all">
                            <a href="{{ url('/desktop/pages/kelas/kelas-pendaftaran') }}"</a>
                            Daftar Sekarang
                        </button> -->

                        <!-- <button class="w-full border-2 border-p2 text-p2 py-3 rounded-full font-semibold mb-6 hover:bg-p2/10 transition-all">
                            Preview Gratis
                        </button> -->

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
                            Belajar 100% Gratis
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph ph-check-circle text-green-500"></i>
                            Materi terstruktur dan bertahap
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph ph-check-circle text-green-500"></i>
                            Komunitas belajar aktif
                        </div>

                        </div>

                       <div class="mt-6 pt-6 border-t border-gray-200">
                        <p class="text-xs text-gray-500 text-center">
                            🚀 Mulai belajar kapan saja, tanpa biaya<br>
                            🧠 Tingkatkan skill tanpa batasan
                        </p>
                    </div>
                    </div>
                    <div class="mt-6">
                        @if($isEnrolled)
                            <span class="flex items-center justify-between px-6 py-3 bg-green-500 text-white rounded-full font-semibold w-48">
                                <span>Sudah Terdaftar</span>
                                <i class="ph ph-check-circle text-white"></i>
                            </span>
                        @else
                            <a href="{{ route('desktop.pages.kelas.kelas-pendaftaran', $kelas->id) }}"
                            class="flex items-center justify-between px-6 py-3 bg-yellow-400 text-white rounded-full font-semibold w-48 transition-all">
                                <span>Daftar Kelas</span>
                                <i class="ph ph-arrow-right text-white"></i>
                            </a>
                        @endif
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