@extends('admin.layouts.master')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-cyan-50">
    <!-- Header Section -->
    <div class="bg-white shadow-lg border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-gradient-to-r from-blue-500 to-cyan-600 p-3 rounded-xl shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">
                            Manajemen Kelas
                        </h1>
                        <p class="text-gray-600 mt-1">Kelola dan monitor kelas pembelajaran</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="#" class="bg-gradient-to-r from-blue-500 to-cyan-600 text-white px-6 py-3 rounded-xl hover:from-blue-600 hover:to-cyan-700 transition-all duration-200 font-semibold shadow-lg">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Kelas
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-6 pt-6">
        <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-4">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-green-700 font-medium">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-7xl mx-auto px-6 pt-6">
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-4">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-red-700 font-medium">{{ session('error') }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Stats Cards -->
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Kelas</p>
                        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalKelas ?? 0 }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between"> -->
                    <!-- <div>
                        <p class="text-gray-600 text-sm font-medium">Kelas Aktif</p>
                        <p class="text-3xl font-bold text-green-600 mt-2">{{ $kelasAktif ?? 0 }}</p>
                    </div> -->
                    <!-- <div class="bg-green-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div> -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Siswa</p>
                        <p class="text-3xl font-bold text-cyan-600 mt-2">{{ $totalSiswa ?? 0 }}</p>
                    </div>
                    <div class="bg-cyan-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Pengajar</p>
                        <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalPengajar ?? 0 }}</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-8">
            <form method="GET" action="{{ url()->current() }}">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Cari kelas..." 
                                   class="pl-10 pr-4 py-3 w-80 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        </div>
                        <select name="tingkat" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white">
                            <option value="">Semua Tingkat</option>
                            <option value="pemula" {{ request('tingkat') == 'pemula' ? 'selected' : '' }}>Pemula</option>
                            <option value="menengah" {{ request('tingkat') == 'menengah' ? 'selected' : '' }}>Menengah</option>
                            <option value="lanjutan" {{ request('tingkat') == 'lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                        </select>
                        <select name="kategori" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white">
                            <option value="">Semua Kategori</option>
                            <option value="programming" {{ request('kategori') == 'programming' ? 'selected' : '' }}>Programming</option>
                            <option value="design" {{ request('kategori') == 'design' ? 'selected' : '' }}>Design</option>
                            <option value="data-science" {{ request('kategori') == 'data-science' ? 'selected' : '' }}>Data Science</option>
                            <option value="networking" {{ request('kategori') == 'networking' ? 'selected' : '' }}>Networking</option>
                        </select>
                        <select name="status" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors duration-200 font-semibold">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Cari
                        </button>
                        <a href="{{ url()->current() }}" class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors duration-200 font-semibold">
                            Reset
                        </a>
                        <button type="button" class="p-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Class Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if ($kelasList->count())
                @foreach ($kelasList as $kelas)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                    <!-- Status Indicator Bar -->
                    <div class="bg-gradient-to-r 
                        @if($kelas->status == 'aktif') from-green-500 to-emerald-600
                        @elseif($kelas->status == 'draft') from-yellow-500 to-orange-600
                        @else from-red-500 to-red-600
                        @endif h-2"></div>
                    
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <!-- Class Image -->
                                <!-- @if($kelas->cover_image)
                                <div class="w-full h-32 mb-4 rounded-lg overflow-hidden bg-gray-100">
                                    <img src="{{ asset('storage/' . $kelas->cover_image) }}" 
                                         alt="{{ $kelas->nama_kelas }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                </div>
                                @endif -->
                                
                                <h3 class="font-bold text-xl text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-200">
                                    {{ $kelas->nama_kelas }}
                                </h3>
                                <div class="flex items-center space-x-2 text-sm text-gray-600 mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>{{ $kelas->pengajar->first_name ?? $kelas->pengajar->name ?? 'Belum ada pengajar' }}</span>
                                </div>
                                
                                <!-- Class Info -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">
                                        {{ ucfirst($kelas->kategori ?? 'Umum') }}
                                    </span>
                                    @if($kelas->tingkat)
                                    <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded-full">
                                        {{ ucfirst($kelas->tingkat) }}
                                    </span>
                                    @endif
                                    @if($kelas->durasi)
                                    <span class="bg-gray-100 text-gray-600 text-xs font-medium px-2 py-1 rounded-full">
                                        {{ $kelas->durasi }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <span class="bg-{{ $kelas->status == 'aktif' ? 'green' : ($kelas->status == 'draft' ? 'yellow' : 'red') }}-100 
                                         text-{{ $kelas->status == 'aktif' ? 'green' : ($kelas->status == 'draft' ? 'yellow' : 'red') }}-800 
                                         text-xs font-semibold px-3 py-1 rounded-full">
                                {{ ucfirst($kelas->status ?? 'Draft') }}
                            </span>
                        </div>
                        
                        <!-- Stats Grid -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-blue-50 rounded-xl p-4 text-center">
                                <p class="text-2xl font-bold text-blue-600">{{ $kelas->enrollments_count ?? 0 }}</p>
                                <p class="text-xs text-blue-600 font-medium">Siswa</p>
                            </div>
                            <div class="bg-cyan-50 rounded-xl p-4 text-center">
                                <p class="text-2xl font-bold text-cyan-600">{{ $kelas->materis_count ?? 0 }}</p>
                                <p class="text-xs text-cyan-600 font-medium">Materi</p>
                            </div>
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="mb-6">
                            <div class="flex justify-between text-sm text-gray-600 mb-2">
                                <span>Progress Pembelajaran</span>
                                <span>{{ $kelas->progress ?? 0 }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-500 to-cyan-600 h-2 rounded-full" 
                                     style="width: {{ $kelas->progress ?? 0 }}%"></div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <a href="#" class="flex-1 bg-blue-50 text-blue-600 py-2 px-4 rounded-xl hover:bg-blue-100 transition-colors duration-200 text-sm font-semibold text-center">
                                Lihat Detail
                            </a>
                            <a href="#" class="flex-1 bg-cyan-50 text-cyan-600 py-2 px-4 rounded-xl hover:bg-cyan-100 transition-colors duration-200 text-sm font-semibold text-center">
                                Edit Kelas
                            </a>
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="p-2 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false" 
                                     class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 py-2 z-10">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Lihat Siswa</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Kelola Materi</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Laporan</a>
                                    <hr class="my-1">
                                    <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                            Hapus Kelas
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Class Description (if exists) -->
                        @if($kelas->deskripsi)
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm text-gray-600 line-clamp-2">
                                {{ Str::limit($kelas->deskripsi, 100) }}
                            </p>
                        </div>
                        @endif

                        <!-- Meta Info -->
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between text-xs text-gray-500">
                                <span>Dibuat: {{ $kelas->created_at->format('d M Y') }}</span>
                                <span>Update: {{ $kelas->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Empty State -->
                <div class="col-span-full text-center py-12">
                    <div class="mb-4">
                        <svg class="w-16 h-16 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-500 mb-2">Belum Ada Kelas</h3>
                    <p class="text-gray-400 text-sm mb-6">Mulai dengan membuat kelas pembelajaran pertama Anda.</p>
                    <a href="#" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors duration-200 font-semibold">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Buat Kelas Baru
                    </a>
                </div>
            @endif
        </div>
         
        <!-- Pagination -->
        @if(method_exists($kelasList, 'hasPages') && $kelasList->hasPages())
        <div class="mt-8">
            {{ $kelasList->appends(request()->query())->links() }}
        </div>
        @else
        <div class="mt-8 flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Menampilkan {{ $kelasList->count() }} dari {{ $kelasList->count() }} kelas
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Alpine.js for dropdown functionality -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection