@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Selesai - Code Verse')

@section('page-title', 'Kelas Selesai')

@section('content')
    <!-- Search Box -->
    <div class="bg-blue-700 relative overflow-hidden mb-8 rounded-xl">

<div class="py-10px  flex justify-center items-center gap-4 px-6 relative z-20 max-w-4xl mx-auto mb-8">
        <div class="flex justify-start items-center gap-4 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
            <i class="ph ph-magnifying-glass text-xl"></i>
            <input type="text" placeholder="Search Contest" class="bg-transparent outline-none placeholder:text-white w-full text-base" />
        </div>
        <button class="bg-color24 border border-color24 p-4 rounded-full text-white hover:bg-white/20">
            <i class="ph ph-sliders-horizontal text-xl"></i>
        </button>
    </div>

    <!-- Tab Navigation -->
    <!-- <div class="px-6 mb-8">
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
    </div> -->

    <!-- Achievement Summary -->
    <div class="px-6 mb-12">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-r from-p2 to-p3 p-6 rounded-2xl text-white mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Selamat! 🎉</h3>
                        <p class="text-white/90">Kamu telah menyelesaikan {{ $totalCompletedKelas }} kelas dengan nilai tertinggi {{ $highestScore }} </p>
                        <div class="flex items-center gap-2 mt-2">
                            <!-- <div class="flex items-center">
                                <i class="ph-fill ph-star text-yellow-300 text-xl"></i>
                                <i class="ph-fill ph-star text-yellow-300 text-xl"></i>
                                <i class="ph-fill ph-star text-yellow-300 text-xl"></i>
                                <i class="ph-fill ph-star text-yellow-300 text-xl"></i>
                                <i class="ph ph-star text-yellow-300 text-xl"></i>
                            </div>
                            <span class="text-2xl font-bold">4.2/5.0</span> -->
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
                    Menampilkan {{ $totalCompletedKelas }} dari {{ $totalCompletedKelas }} kelas selesai
                </div>
            </div>
        </div>
    </div>

    <!-- Completed Classes List -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-4">
                @foreach($kelasList as $kelas)
                <!-- Kelas 1 - HTML -->
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all border-l-4 border-green-500">
                    <div class="flex items-center gap-4">
                        <div class="relative rounded-lg overflow-hidden">
                                <img src="{{ $kelas->cover_image ? asset('storage/' . $kelas->cover_image) : asset('images/default-cover.jpg') }}" 
                                 alt="Kelas {{ $kelas->nama_kelas }}" 
                                 class="h-[100px] w-[140px] object-cover rounded-lg" />
                            <p class="text-white bg-green-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                Completed
                            </p>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h4 class="font-semibold text-lg">{{ $kelas->nama_kelas }}</h4>
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
                                    <span>{{$totalSiswa}} siswa</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <!-- <i class="ph ph-calendar"></i> -->
                                    <span>Selesai</span>
                                </div>
                                <div class="flex items-center gap-1">

                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                           <a href="{{ route('desktop.pages.sertifikat.form-sertif', $kelas->id) }}"  class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                Download Sertifikat
                            </a>
                            <a href="{{ route('student.course.materi', $kelas->id) }}" class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                               Lihat Kelas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
               
           
        </div>
    </div>

    </div>

    
@endsection