@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Yang Diambil - Code Verse')

@section('page-title', 'Kelas Yang di Ambil')

@section('content')
    <!-- Search Box -->
    <div class="flex justify-center items-center gap-4 px-6 relative z-20 max-w-4xl mx-auto mb-8">
        <div class="flex justify-start items-center gap-4 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
            <i class="ph ph-magnifying-glass text-xl"></i>
            <input type="text" placeholder="Search Contest" class="bg-transparent outline-none placeholder:text-white w-full text-base" />
        </div>
        <button class="bg-color24 border border-color24 p-4 rounded-full text-white hover:bg-white/20">
            <i class="ph ph-sliders-horizontal text-xl"></i>
        </button>
    </div>

    <!-- Tab Navigation -->
    <div class="px-6 mb-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-center items-center gap-6 bg-color24 p-2 rounded-full">
                <a href="kelas-diambil" class="bg-p1 text-white px-6 py-3 rounded-full font-semibold text-sm transition-all">
                    Diambil
                </a>
                <a href="kelas-ditawarkan" class="text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-white/20 transition-all">
                    Ditawarkan
                </a>
                <a href="kelas-selesai" class="text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-white/20 transition-all">
                    Selesai
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="px-6 mb-12">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-green-600 rounded-full flex items-center justify-center">
                            <i class="ph ph-graduation-cap text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold">Kelulusan</p>
                            <p class="text-xs text-p2 pt-1">Lulus 70%</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                            <i class="ph ph-chart-line-up text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold">Hasil Belajar</p>
                            <p class="text-xs text-p2 pt-1">naik 20%</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-r from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                            <i class="ph ph-check-circle text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold">Materi Selesai</p>
                            <p class="text-xs text-p2 pt-1">2</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-r from-red-400 to-red-600 rounded-full flex items-center justify-center">
                            <i class="ph ph-clock text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold">Belum Selesai</p>
                            <p class="text-xs text-p2 pt-1">Que: 150</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kelas List -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-4">
                @if(isset($materis) && $materis->count())
                    @foreach($materis as $index => $materi)
                        <div class="bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-105 transition-all">
                            <div class="flex items-center gap-4">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="assets/images/library-favourite-img{{ ($index % 5) + 1 }}.png" 
                                         alt="{{ $materi->judul }}" 
                                         class="h-[100px] w-[140px] object-cover rounded-lg" />
                                    <p class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                        {{ $materi->pivot->status ?? 'Active' }}
                                    </p>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-lg mb-2">{{ $materi->judul }}</h4>
                                    <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                        Pengajar
                                        <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                        {{ $materi->pengajar->name ?? 'Tidak diketahui' }}
                                    </p>
                                    <div class="flex items-center gap-2 text-xs text-gray-500">
                                        <div class="flex items-center">
                                            <div class="rounded-full bg-white p-0.5 border-2 border-white">
                                                <img src="assets/images/user-img-1.png" alt="" class="w-6 h-6 object-cover rounded-full" />
                                            </div>
                                            <div class="rounded-full bg-white p-0.5 border-2 border-white -ml-2">
                                                <img src="assets/images/user-img-2.png" alt="" class="w-6 h-6 object-cover rounded-full" />
                                            </div>
                                            <div class="rounded-full bg-white p-0.5 border-2 border-white -ml-2">
                                                <img src="assets/images/user-img-3.png" alt="" class="w-6 h-6 object-cover rounded-full" />
                                            </div>
                                            <div class="rounded-full bg-white p-0.5 border-2 border-white -ml-2">
                                                <img src="assets/images/user-img-4.png" alt="" class="w-6 h-6 object-cover rounded-full" />
                                            </div>
                                            <div class="rounded-full bg-white p-0.5 border-2 border-white -ml-2">
                                                <img src="assets/images/user-img-5.png" alt="" class="w-6 h-6 object-cover rounded-full" />
                                            </div>
                                        </div>
                                        <span>Public</span>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                        Lanjutkan
                                    </button>
                                    <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                        Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-16">
                        <div class="w-32 h-32 bg-gradient-to-r from-p2 to-p3 rounded-full flex items-center justify-center mx-auto mb-6 opacity-50">
                            <i class="ph ph-book-open text-white text-4xl"></i>
                        </div>
                        <p class="text-gray-400 text-lg italic">Belum ada kelas yang diambil.</p>
                        <p class="text-gray-500 text-sm mt-2">Jelajahi kelas yang tersedia dan mulai belajar!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection