@extends('admin.layouts.master')

@section('head')
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    {{-- Tombol Kembali --}}
                    <a href="{{ route('admin.kelas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-200 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali
                    </a>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">
                            Detail Kelas
                        </h1>
                        <p class="text-gray-600 mt-1">Informasi lengkap dan materi pembelajaran</p>
                    </div>
                </div> 
            </div>
        </div>
    </div>
 <div class="max-w-7xl mx-auto px-6 py-8">
        {{-- Info Kelas --}}
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200 p-6 mb-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="flex-1">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Kelas : {{ $kelas->nama_kelas }}</h2>
                            <div class="flex items-center space-x-2 text-sm text-gray-600">
                                <svg class="w-4 h-4 flex-shrink-0 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Pengajar: <span class="font-medium text-gray-800">{{ $kelas->pengajar->first_name }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- Stats Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                <div class="bg-indigo-50 rounded-lg p-4 text-center border border-indigo-100">
                    <p class="text-2xl font-bold text-indigo-600">{{ $totalMateri }}</p>
                    <p class="text-sm text-indigo-600 font-medium">Total Materi</p>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center border border-green-100">
                    <p class="text-2xl font-bold text-green-600">{{ $totalQuiz }}</p>
                    <p class="text-sm text-green-600 font-medium">Total Quiz</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center border border-gray-100">
                    <p class="text-2xl font-bold text-gray-600">{{ $totalItems }}</p>
                    <p class="text-sm text-gray-600 font-medium">Total Item</p>
                </div>
                <div class="bg-yellow-50 rounded-lg p-4 text-center border border-yellow-100">
                    <p class="text-2xl font-bold text-yellow-600">{{ $kelas->siswa->count() }}</p>
                    <p class="text-sm text-yellow-600 font-medium">Total Siswa</p>
                </div>
            </div>
        </div>

        <!-- Section Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Daftar Materi Pembelajaran</h3>
                <p class="text-gray-600 text-sm">Materi dan quiz yang tersedia dalam kelas ini</p>
            </div>
        </div>

         {{-- Daftar Materi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($materis as $index => $materi)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200 overflow-hidden 
                    @if($materi->quiz) ring-1 ring-green-200 
                    @elseif($materi->file_path) ring-1 ring-blue-200 
                    @else ring-1 ring-purple-200 @endif">
                    <!-- Status Indicator Bar -->
                    <div class="h-1 
                        @if($materi->quiz) bg-gradient-to-r from-green-500 to-emerald-600
                        @elseif($materi->file_path) bg-gradient-to-r from-blue-500 to-indigo-600
                        @else bg-gradient-to-r from-purple-500 to-violet-600
                        @endif"></div>
                    
                    <div class="p-6">
                        <!-- Header Section -->
                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-semibold px-2 py-1 rounded-full 
                                    @if($materi->quiz) bg-green-100 text-green-700
                                    @elseif($materi->file_path) bg-blue-100 text-blue-700
                                    @else bg-purple-100 text-purple-700
                                    @endif">
                                    @if($materi->quiz)
                                        <svg class="w-3 h-3 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Quiz
                                    @elseif($materi->file_path)
                                        <svg class="w-3 h-3 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        Materi
                                    @else
                                        <svg class="w-3 h-3 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                        Konten
                                    @endif
                                </span>
                                <div class="w-2 h-2 rounded-full 
                                    @if($materi->quiz) bg-green-400
                                    @elseif($materi->file_path) bg-blue-400
                                    @else bg-purple-400
                                    @endif"></div>
                            </div>
                            <h4 class="font-bold text-xl mb-2 hover:transition-colors duration-200
                                @if($materi->quiz) text-green-800 hover:text-green-600
                                @elseif($materi->file_path) text-blue-800 hover:text-blue-600
                                @else text-purple-800 hover:text-purple-600
                                @endif">
                                Materi {{ $index + 1 }} / {{ $materi->judul }}
                            </h4>
                            <div class="text-sm mb-3
                                @if($materi->quiz) text-green-600
                                @elseif($materi->file_path) text-blue-600
                                @else text-purple-600
                                @endif">
                                {{ $materi->kategori ?? 'Umum' }} | {{ $materi->level ?? '-' }}
                            </div>
                        </div>
                        
                        <!-- Description -->
                        @if($materi->deskripsi)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 leading-relaxed line-clamp-3">
                                {{ $materi->deskripsi }}
                            </p>
                        </div>
                        @endif

                   <!-- PDF Preview  -->
                        @if($materi->file_path && Str::endsWith(strtolower($materi->file_name), '.pdf'))
                            <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank" class="inline-block mb-2">
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow font-bold flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" ...></svg>
                                    PDF
                                </button>
                            </a>
                            <div class="w-full mt-2 rounded-lg overflow-hidden border" style="height:140px; max-width:260px;">
                                <iframe src="{{ asset('storage/' . $materi->file_path) }}"
                                        width="100%" height="100%" style="min-height:120px; border:0; border-radius:8px;"></iframe>
                            </div>
                        @endif

                        <!-- Youtube Video -->
                        @if($materi->video_url)
                            <div class="mb-4">
                                <iframe src="{{ $materi->video_url }}"
                                    style="width:100%; aspect-ratio:16/9; border-radius:12px;"
                                    frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        @endif
                        
                        <!-- Tags Section -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($materi->quiz)
                                <span class="bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg">
                                    <svg class="w-3 h-3 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Quiz Tersedia
                                </span>
                            @endif
                            @if($materi->file_path)
                                <span class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg border border-blue-200">
                                    <svg class="w-3 h-3 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    {{ strtoupper(pathinfo($materi->file_name, PATHINFO_EXTENSION)) }}
                                </span>
                            @else
                                @if(!$materi->quiz)
                                <span class="bg-gradient-to-r from-purple-500 to-violet-600 text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg">
                                    <svg class="w-3 h-3 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    Konten Pembelajaran
                                </span>
                                @endif
                            @endif
                        </div>

                        <!-- Meta Information -->
                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex justify-between text-xs text-gray-500">
                                <div>
                                    <span class="block">Dibuat:</span>
                                    <span class="font-medium">{{ $materi->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="text-right">
                                    <span class="block">Update:</span>
                                    <span class="font-medium">{{ $materi->updated_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State jika tidak ada materi -->
        @if($materis->isEmpty())
        <div class="bg-white rounded-lg border border-gray-200 py-12">
            <div class="text-center">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Materi</h3>
                <p class="text-gray-600 text-sm mb-6">Kelas ini belum memiliki materi pembelajaran.</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection