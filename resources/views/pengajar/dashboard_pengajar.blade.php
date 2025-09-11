@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 py-8 space-y-8">
        <!-- Welcome Section -->
        <div class="bg-blue-600 rounded-lg p-8 text-white shadow-md">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Hai, {{ Auth::user()->first_name ?? 'siapapun itu' }}! 👋</h1>
                    <p class="text-blue-100 text-lg">Selamat datang di dashboard pengajar. Mari berbagi ilmu dan inspirasi kepada siswa-siswa kita! 🌟</p>
                </div>
                <div class="hidden md:block">
                    <a href="/bio-pengajar" class="w-16 h-16 bg-blue-500 rounded-lg flex items-center justify-center shadow-md hover:bg-blue-400 transition">
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
            
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 space-y-2 sm:space-y-0">
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-sm">System Status: All Good</span>
                </div>
                <div class="text-sm">
                    <span class="text-blue-200">Last updated:</span>
                    <span class="font-medium">Just now</span>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Kelas Card -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">{{ $totalKelas }}</div>
                        <div class="text-sm text-gray-500">active classes</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Kelas 📚</h3>
                    <p class="text-sm text-gray-500">Your teaching classes</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Active</span>
                    </div>
                </div>
            </div>
            
            <!-- Total Quiz Card -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        {{--<div class="text-2xl font-bold text-gray-800">{{ $total_quiz }}</div>--}}
                        <div class="text-2xl font-bold text-gray-800">-</div>
                        <div class="text-sm text-gray-500">created today</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Siswa📝</h3>
                    <p class="text-sm text-gray-500">Assessment tools</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Available</span>
                    </div>
                </div>
            </div>
            
            <!-- Total Diskusi Card -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        {{--<div class="text-2xl font-bold text-gray-800">{{ $totalDiskusi }}</div>--}}
                        <div class="text-2xl font-bold text-gray-800">-</div>
                        <div class="text-sm text-gray-500">discussions</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1"> 💬</h3>
                    <p class="text-sm text-gray-500">Student interactions</p>
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
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <a href="{{ route('pengajar.materi.index-kelas-pengajar') }}" 
                       class="flex items-center space-x-3 p-3 rounded-lg bg-blue-50 hover:bg-blue-100 transition-colors duration-200 cursor-pointer">
                        <div class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-700">Kelola Kelas</p>
                            <p class="text-xs text-gray-500">Upload dan atur semua materi pembelajaran</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                 <a href="{{ route('pengajar.siswa') }}" class="block">
                    <div class="flex items-center space-x-3 p-3 rounded-lg bg-green-50 hover:bg-green-100 transition-colors duration-200 cursor-pointer">
                        <div class="w-2 h-2 bg-green-500 rounded-full flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-700">Lihat Siswa</p>
                            <p class="text-xs text-gray-500">Lihat Siswa Kelas Anda</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>
                  
                </div>
            </div>

            <!-- Teaching Stats -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Teaching Stats</h3>
                    <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-lg bg-green-50 border border-green-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-green-500 rounded-full flex-shrink-0"></div>
                            <span class="text-sm font-medium text-gray-700">Total Kelas Aktif</span>
                        </div>
                        <span class="text-lg font-bold text-green-600">{{ $totalKelas }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 rounded-lg bg-blue-50 border border-blue-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-blue-500 rounded-full flex-shrink-0"></div>
                            <span class="text-sm font-medium text-gray-700">Total Siswa Aktif</span>
                        </div>
                        <span class="text-lg font-bold text-blue-600">{{ $totalSiswaAktif ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection