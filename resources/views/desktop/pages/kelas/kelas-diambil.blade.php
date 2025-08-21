@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Yang Diambil - Code Verse')
@section('page-title', 'Kelas Yang di Ambil')

@section('content')
    <!-- Search Box -->
            <div class="flex justify-center items-center gap-4 max-w-4xl mx-auto mt-8">
                <form action="{{ route('kelas.diambil') }}" method="GET" 
                    class="flex justify-start items-center gap-4 bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-2xl text-white w-full shadow-lg">
                    <i class="ph ph-magnifying-glass text-xl text-white/80"></i>
                    <input 
                        type="text" 
                        name="search"
                        placeholder="Cari kelas favorit Anda..." 
                        value="{{ request('search') }}"
                        class="bg-transparent outline-none placeholder:text-white/70 w-full text-base text-white" 
                    />
                </form>
                <button type="button" 
                        class="bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-2xl text-white hover:bg-white/20 transition-all shadow-lg">
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

    <!-- Kelas List -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-4">
                @if(isset($enrollments) && $enrollments->count())
                    @foreach($enrollments as $index => $enrollment)
                        @php $kelas = $enrollment->kelas; @endphp
                        <div class="bg-white text-black p-4 rounded-xl shadow2 hover:scale-105 transition-all">
                            <div class="flex items-center gap-4">
                                
                                <!-- Thumbnail -->
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="{{ $kelas->cover_image ? asset('storage/' . $kelas->cover_image) : 'https://via.placeholder.com/140x100?text=Course' }}" 
                                         alt="{{ $kelas->nama_kelas }}" 
                                         class="h-[100px] w-[140px] object-cover rounded-lg" />
                                    <p class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                        {{ ucfirst($enrollment->status) }}
                                    </p>
                                </div>

                                <!-- Info -->
                                <div class="flex-1">
                                    <h4 class="font-semibold text-lg mb-2">{{ $kelas->nama_kelas }}</h4>
                                    <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                        Pengajar
                                        <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                        {{ $kelas->pengajar->name ?? $kelas->pengajar->first_name ?? 'Pengajar' }}
                                    </p>
                                    <div class="flex items-center gap-2 text-xs text-gray-500">
                                        <span>Durasi: {{ $kelas->durasi ?? '8 minggu' }}</span>
                                        <i class="ph-fill ph-dot-outline text-p1 text-xl"></i>
                                        <span>Kategori: {{ $kelas->kategori ?? '-' }}</span>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="flex flex-col gap-2">
                                     <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id]) }}" class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90">
                                        Lanjutkan
                                    </a>
                                     <a href="{{ route('desktop.pages.kelas.kelas-detail')}}"
                                     class="inline-flex items-center justify-center border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10">
                                        Detail
                                    </a> 
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

            <!-- Pagination -->
        @if($enrollments->hasPages())
            <div class="mt-8 flex justify-center">
                <div class="flex gap-2">
                    {{-- Previous Page Link --}}
                    @if (!$enrollments->onFirstPage())
                        <a href="{{ $enrollments->previousPageUrl() }}" class="bg-p1 text-white px-4 py-2 rounded-full hover:bg-p1/90">
                            ← Sebelumnya
                        </a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($enrollments->hasMorePages())
                        <a href="{{ $enrollments->nextPageUrl() }}" class="bg-p2 text-white px-4 py-2 rounded-full hover:bg-p2/90">
                            Selanjutnya →
                        </a>
                    @endif
                </div>
            </div>
        @endif
        </div>
    </div>
@endsection
