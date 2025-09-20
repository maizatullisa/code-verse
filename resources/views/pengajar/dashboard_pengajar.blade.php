@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 py-8 space-y-8">
        <!-- Welcome Section -->
        <div class="bg-blue-600 rounded-3xl p-8 text-white shadow-md">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Hai, {{ Auth::user()->first_name ?? 'siapapun itu' }}! 👋</h1>
                    <p class="text-blue-100 text-lg">Selamat datang di dashboard pengajar. Mari berbagi ilmu dan inspirasi kepada siswa-siswa kita! 🌟</p>
                </div>
                <div class="hidden md:block"> <!--BISA DI GANTI-->
                    <a href="/bio-pengajar" class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center shadow-md hover:bg-blue-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke-width="1.5" 
                             stroke="currentColor" 
                             class="w-8 h-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0v.75H4.5v-.75z" />
                        </svg>
                    </a>
                </div>
            </div>
            
             
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Kelas Card -->
            <div class="bg-white p-6 rounded-3xl shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">{{ $totalKelas }}</div>
                        <div class="text-sm text-gray-500">Kelas aktif</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Kelas </h3>
                    <p class="text-sm text-gray-500">Kelas yang anda ajar</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Active</span>
                    </div>
                </div>
            </div>
            
            <!-- Total Quiz Card -->
            <div class="bg-white p-6 rounded-3xl shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">{{ $totalSiswa }}</div>
                        <div class="text-sm text-gray-500">Siswa </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Siswa</h3>
                    <p class="text-sm text-gray-500">Siswa terdaftar dalam semua kelas</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Available</span>
                    </div>
                </div>
            </div>
            
            <!-- Total Diskusi Card -->
             
            <div class="bg-white p-6 rounded-3xl shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4"> 
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">{{ $total_quiz }}</div>
                        <div class="text-sm text-gray-500">Quiz</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1"> Total Quiz </h3>
                    <p class="text-sm text-gray-500">Quiz yang anda buat</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Active</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Quick Actions -->
            <div class="bg-white p-6 rounded-3xl shadow-md border border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
                </div>
                
                <div class="space-y-4">
                    <a href="{{ route('pengajar.materi.index-kelas-pengajar') }}" 
                       class="flex items-center space-x-3 p-3 rounded-2xl bg-blue-50 hover:bg-blue-100 transition-colors duration-200 cursor-pointer">
                        <div class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-700">Kelola Kelas</p>
                            <p class="text-xs text-gray-500">Upload dan atur semua materi pembelajaran</p>
                        </div> 
                    </a>
                 <a href="{{ route('pengajar.siswa.index') }}" class="block">
                    <div class="flex items-center space-x-3 p-3 rounded-2xl bg-green-50 hover:bg-green-100 transition-colors duration-200 cursor-pointer">
                        <div class="w-2 h-2 bg-green-500 rounded-full flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-700">Lihat Siswa</p>
                            <p class="text-xs text-gray-500">Lihat Siswa Kelas Anda</p>
                        </div>
                    </div>
                </a>
                  
                </div>
            </div>

            <!-- Teaching Stats -->
            <div class="bg-white p-6 rounded-3xl shadow-md border border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Teaching Stats</h3>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-2xl bg-green-50 border border-green-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-green-500 rounded-full flex-shrink-0"></div>
                            <span class="text-sm font-medium text-gray-700">Total Kelas Aktif</span>
                        </div>
                        <span class="text-lg font-bold text-green-600">{{ $totalKelas }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 rounded-2xl bg-blue-50 border border-blue-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-blue-500 rounded-full flex-shrink-0"></div>
                            <span class="text-sm font-medium text-gray-700">Total Siswa Aktif</span>
                        </div>
                        <span class="text-lg font-bold text-blue-600">{{ $totalSiswa }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection