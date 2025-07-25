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
                <a href="{{ route('admin.kelas.create') }}" class="bg-gradient-to-r from-blue-500 to-cyan-600 hover:from-blue-600 hover:to-cyan-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Tambah Kelas Baru</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Kelas</p>
                        <p class="text-3xl font-bold text-blue-600 mt-2">12</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Kelas Aktif</p>
                        <p class="text-3xl font-bold text-green-600 mt-2">10</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Siswa</p>
                        <p class="text-3xl font-bold text-cyan-600 mt-2">324</p>
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
                        <p class="text-gray-600 text-sm font-medium">Pengajar</p>
                        <p class="text-3xl font-bold text-purple-600 mt-2">8</p>
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
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" placeholder="Cari kelas..." class="pl-10 pr-4 py-3 w-80 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                    </div>
                    <select class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white">
                        <option>Semua Tingkat</option>
                        <option>Pemula</option>
                        <option>Menengah</option>
                        <option>Lanjutan</option>
                    </select>
                    <select class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white">
                        <option>Semua Jurusan</option>
                        <option>SEMUA YG TERDAFTAR (CONTOH KLS FULLSTACK) </option>
                        <option>SEMUA YG TERDAFTAR (CONTOH KLS NETWORKING)</option>
                        <option>SEMUA YG TERDAFTAR (CONTOH KLS MACHINE LEARNING)</option>
                    </select>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="p-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                    </button>
                    <button class="p-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Class Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Sample Class Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-r from-blue-500 to-cyan-600 h-2"></div>
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="font-bold text-xl text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-200">
                                Kelas Fullstack
                            </h3>
                            <div class="flex items-center space-x-2 text-sm text-gray-600 mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Ahmad Suhardi</span>
                            </div>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Aktif</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-blue-50 rounded-xl p-4 text-center">
                            <p class="text-2xl font-bold text-blue-600">32</p>
                            <p class="text-xs text-blue-600 font-medium">Siswa</p>
                        </div>
                        <div class="bg-cyan-50 rounded-xl p-4 text-center">
                            <p class="text-2xl font-bold text-cyan-600">8</p>
                            <p class="text-xs text-cyan-600 font-medium">Mata Pelajaran</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between text-sm text-gray-600 mb-6">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h6m6 0a3 3 0 01-3 3H6a3 3 0 01-3-3V10a3 3 0 013-3h12a3 3 0 013 3v7z"></path>
                            </svg>
                            <span>Ruang 101</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>07:00 - 15:00</span>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-6">
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Progress Pembelajaran</span>
                            <span>75%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-blue-500 to-cyan-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-blue-50 text-blue-600 py-2 px-4 rounded-xl hover:bg-blue-100 transition-colors duration-200 text-sm font-semibold">
                            Lihat Detail
                        </button>
                        <button class="flex-1 bg-cyan-50 text-cyan-600 py-2 px-4 rounded-xl hover:bg-cyan-100 transition-colors duration-200 text-sm font-semibold">
                            Edit Kelas
                        </button>
                        <button class="p-2 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sample Class Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 h-2"></div>
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="font-bold text-xl text-gray-900 mb-2 group-hover:text-purple-600 transition-colors duration-200">
                                Kelas Networking
                            </h3>
                            <div class="flex items-center space-x-2 text-sm text-gray-600 mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Andi</span>
                            </div>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Aktif</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-purple-50 rounded-xl p-4 text-center">
                            <p class="text-2xl font-bold text-purple-600">28</p>
                            <p class="text-xs text-purple-600 font-medium">Siswa</p>
                        </div>
                        <div class="bg-pink-50 rounded-xl p-4 text-center">
                            <p class="text-2xl font-bold text-pink-600">6</p>
                            <p class="text-xs text-pink-600 font-medium">Mata Pelajaran</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between text-sm text-gray-600 mb-6">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h6m6 0a3 3 0 01-3 3H6a3 3 0 01-3-3V10a3 3 0 013-3h12a3 3 0 013 3v7z"></path>
                            </svg>
                            <span>Ruang 203</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>07:00 - 15:00</span>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-6">
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Progress Pembelajaran</span>
                            <span>60%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-purple-500 to-pink-600 h-2 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-purple-50 text-purple-600 py-2 px-4 rounded-xl hover:bg-purple-100 transition-colors duration-200 text-sm font-semibold">
                            Lihat Detail
                        </button>
                        <button class="flex-1 bg-pink-50 text-pink-600 py-2 px-4 rounded-xl hover:bg-pink-100 transition-colors duration-200 text-sm font-semibold">
                            Edit Kelas
                        </button>
                        <button class="p-2 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sample Class Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2"></div>
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="font-bold text-xl text-gray-900 mb-2 group-hover:text-green-600 transition-colors duration-200">
                                Kelas Basisdata
                            </h3>
                            <div class="flex items-center space-x-2 text-sm text-gray-600 mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Budi Santoso</span>
                            </div>
                        </div>
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Persiapan UN</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-green-50 rounded-xl p-4 text-center">
                            <p class="text-2xl font-bold text-green-600">25</p>
                            <p class="text-xs text-green-600 font-medium">Siswa</p>
                        </div>
                        <div class="bg-emerald-50 rounded-xl p-4 text-center">
                            <p class="text-2xl font-bold text-emerald-600">7</p>
                            <p class="text-xs text-emerald-600 font-medium">Mata Pelajaran</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between text-sm text-gray-600 mb-6">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h6m6 0a3 3 0 01-3 3H6a3 3 0 01-3-3V10a3 3 0 013-3h12a3 3 0 013 3v7z"></path>
                            </svg>
                            <span>Ruang 305</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>07:00 - 15:00</span>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-6">
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Progress Pembelajaran</span>
                            <span>85%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-green-50 text-green-600 py-2 px-4 rounded-xl hover:bg-green-100 transition-colors duration-200 text-sm font-semibold">
                            Lihat Detail
                        </button>
                        <button class="flex-1 bg-emerald-50 text-emerald-600 py-2 px-4 rounded-xl hover:bg-emerald-100 transition-colors duration-200 text-sm font-semibold">
                            Edit Kelas
                        </button>
                        <button class="p-2 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sample Class Card 4 -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-r from-orange-500 to-red-600 h-2"></div>
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="font-bold text-xl text-gray-900 mb-2 group-hover:text-orange-600 transition-colors duration-200">
                                Kelas UI/UX
                            </h3>
                            <div class="flex items-center space-x-2 text-sm text-gray-600 mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Dewi Anggraeni</span>
                            </div>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Aktif</span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-orange-50 rounded-xl p-4 text-center">
                            <p class="text-2xl font-bold text-orange-600">30</p>
                            <p class="text-xs text-orange-600 font-medium">Siswa</p>
                        </div>
                        <div class="bg-red-50 rounded-xl p-4 text-center">
                            <p class="text-2xl font-bold text-red-600">8</p>
                            <p class="text-xs text-red-600 font-medium">Mata Pelajaran</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between text-sm text-gray-600 mb-6">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h6m6 0a3 3 0 01-3 3H6a3 3 0 01-3-3V10a3 3 0 013-3h12a3 3 0 013 3v7z"></path>
                            </svg>
                            <span>Ruang 102</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>07:00 - 15:00</span>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-6">
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Progress Pembelajaran</span>
                            <span>45%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-orange-500 to-red-600 h-2 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-orange-50 text-orange-600 py-2 px-4 rounded-xl hover:bg-orange-100 transition-colors duration-200 text-sm font-semibold">
                            Lihat Detail
                        </button>
                        <button class="flex-1 bg-red-50 text-red-600 py-2 px-4 rounded-xl hover:bg-red-100 transition-colors duration-200 text-sm font-semibold">
                            Edit Kelas
                        </button>
                        <button class="p-2 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Menampilkan 1-4 dari 12 kelas
            </div>
            <div class="flex items-center space-x-2">
                <button class="p-2 rounded-xl border border-gray-300 text-gray-400 hover:text-gray-600 hover:border-gray-400 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold">1</button>
                <button class="px-4 py-2 rounded-xl border border-gray-300 text-gray-600 hover:bg-gray-50 transition-colors duration-200">2</button>
                <button class="px-4 py-2 rounded-xl border border-gray-300 text-gray-600 hover:bg-gray-50 transition-colors duration-200">3</button>
                <button class="p-2 rounded-xl border border-gray-300 text-gray-600 hover:text-gray-800 hover:border-gray-400 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection