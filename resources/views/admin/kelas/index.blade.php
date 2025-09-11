@extends('admin.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">
                            Manajemen Kelas
                        </h1>
                        <p class="text-gray-600 mt-1">Kelola dan monitor kelas pembelajaran</p>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-6 pt-6">
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
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
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
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
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Kelas</p>
                        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalKelas ?? 0 }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Siswa</p>
                        <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalSiswa ?? 0 }}</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Pengajar</p>
                        <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalPengajar ?? 0 }}</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Kelas Aktif</p>
                        <p class="text-3xl font-bold text-orange-600 mt-2">{{ $kelasAktif ?? 0 }}</p>
                    </div>
                    <div class="bg-orange-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-8">
            <form method="GET" action="{{ url()->current() }}">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-4 items-end">
                    <!-- Search Input -->
                    <div class="lg:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Cari kelas..." 
                                   class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                        </div>
                    </div>

                    <!-- Kategori Filter -->
                     <div class="lg:col-span-2">
                        <div class="lg:col-span-2"></div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select name="kategori" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 bg-white">
                        <option value="">Semua Kategori</option>
                        <option value="programming" {{ request('kategori') == 'programming' ? 'selected' : '' }}>Programming</option>
                        <option value="design" {{ request('kategori') == 'design' ? 'selected' : '' }}>Design</option>
                        <option value="web" {{ request('kategori') == 'web' ? 'selected' : '' }}>Web</option>
                        <option value="mobile" {{ request('kategori') == 'mobile' ? 'selected' : '' }}>Mobile</option>
                        <option value="data" {{ request('kategori') == 'data' ? 'selected' : '' }}>Data</option>
                        <option value="ai" {{ request('kategori') == 'ai' ? 'selected' : '' }}>AI</option>
                        <option value="marketing" {{ request('kategori') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="business" {{ request('kategori') == 'business' ? 'selected' : '' }}>Business</option>
                            
                        </select>
                    </div>
                    <div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
                    <div class="text-sm text-gray-600">
                        Menampilkan hasil pencarian dan filter
                    </div>
                    <div class="flex items-center space-x-3">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Cari
                        </button>
                     <a href="{{ url()->current() }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-200 font-medium">
                        Reset
                           </a>
                            <a href="{{ route('admin.kelas.download', request()->query()) }}" 
                                class="inline-flex items-center justify-center p-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-200"
                                title="Download Data">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8"></path>
                                    </svg>
                                </a>
                        </div>
                    </div>
                </form>
            </div>

        <!-- Class Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if ($kelasList->count())
                @foreach ($kelasList as $kelas)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200 overflow-hidden">
                    <!-- Status Indicator Bar -->
                    <div class="h-1 
                        @if($kelas->status == 'aktif') bg-green-500
                        @elseif($kelas->status == 'draft') bg-yellow-500
                        @else bg-red-500
                        @endif"></div>
                    
                    <div class="p-6">
                        <!-- Header Section -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="font-bold text-xl text-gray-900 mb-2 hover:text-blue-600 transition-colors duration-200">
                                    {{ $kelas->nama_kelas }}
                                </h3>
                                <div class="flex items-center space-x-2 text-sm text-gray-600 mb-3">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>{{ $kelas->pengajar->first_name ?? $kelas->pengajar->name ?? 'Belum ada pengajar' }}</span>
                                </div>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium rounded-full
                                @if($kelas->status == 'aktif') bg-green-100 text-green-800
                                @elseif($kelas->status == 'draft') bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ ucfirst($kelas->status ?? 'Draft') }}
                            </span>
                        </div>
                        
                        <!-- Class Info Tags -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">
                                {{ ucfirst($kelas->kategori ?? 'Umum') }}
                            </span>
                            @if($kelas->level)
                            <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded">
                                {{ ucfirst($kelas->level) }}
                            </span>
                            @endif
                            @if($kelas->durasi)
                            <span class="bg-gray-100 text-gray-600 text-xs font-medium px-2 py-1 rounded">
                                {{ $kelas->durasi }}
                            </span>
                            @endif
                        </div>
                        
                        <!-- Stats Grid -->
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <div class="bg-blue-50 rounded-lg p-3 text-center border border-blue-100">
                                <p class="text-xl font-bold text-blue-600">{{ $kelas->enrollments_count ?? 0 }}</p>
                                <p class="text-xs text-blue-600 font-medium">Siswa Terdaftar</p>
                            </div>
                            <div class="bg-green-50 rounded-lg p-3 text-center border border-green-100">
                                <p class="text-xl font-bold text-green-600">{{ $kelas->materis_count ?? 0 }}</p>
                                <p class="text-xs text-green-600 font-medium">Materi</p>
                            </div>
                        </div>
                        
                        <!-- Progress Section -->
                        <div class="mb-6">
                            <div class="flex justify-between text-sm text-gray-700 mb-2">
                                <span class="font-medium">Progress Pembelajaran</span>
                                <span class="font-semibold text-blue-600">{{ $kelas->progress ?? 0 }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full transition-all duration-300" 
                                    style="width: {{ $kelas->progress ?? 0 }}%"></div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-2">
                            <div class="grid grid-cols-2 gap-2">
                                <a href="{{route('admin.lihat.kelas', $kelas->id)}} "class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium text-center">
                                    Lihat Detail
                                </a>
                            </div>
                            
                            <!-- Dropdown Menu -->
                            <div class="relative" x-data="{ open: false }">
                                <form action="{{ route('admin.kelas.destroy', $kelas->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kelas ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm font-medium">
                                        Hapus Kelas
                                    </button>
                                </form>
                                <div class="absolute left-0  rounded-lg shadow-lg border border-gray-200 py-2 z-10"> 
                                </div>
                            </div>
                        </div>

                        <!-- Description Section -->
                        @if($kelas->deskripsi)
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600 leading-relaxed">
                                {{ Str::limit($kelas->deskripsi, 100) }}
                            </p>
                        </div>
                        @endif

                        <!-- Meta Information -->
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <div class="grid grid-cols-2 gap-2 text-xs text-gray-500">
                                <div>
                                    <span class="block">Dibuat:</span>
                                    <span class="font-medium">{{ $kelas->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="text-right">
                                    <span class="block">Update:</span>
                                    <span class="font-medium">{{ $kelas->updated_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Empty State -->
                <div class="col-span-full bg-white rounded-lg border border-gray-200 py-12">
                    <div class="text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Kelas</h3>
                        <p class="text-gray-600 text-sm mb-6">Mulai dengan membuat kelas pembelajaran pertama Anda.</p>
                        <a href="#" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Buat Kelas Baru
                        </a>
                    </div>
                </div>
            @endif
        </div>
         
        <!-- Pagination -->
        @if(method_exists($kelasList, 'hasPages') && $kelasList->hasPages())
        <div class="mt-8 bg-white rounded-lg border border-gray-200 p-4">
            {{ $kelasList->appends(request()->query())->links() }}
        </div>
        @else
        <div class="mt-8 bg-white rounded-lg border border-gray-200 p-4">
            <div class="text-center text-sm text-gray-600">
                Menampilkan <span class="font-semibold">{{ $kelasList->count() }}</span> dari <span class="font-semibold">{{ $kelasList->count() }}</span> kelas
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Alpine.js for dropdown functionality -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection