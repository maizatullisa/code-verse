@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black rounded-2xl p-8 border border-gray-700/50 shadow-xl">
        <div class="flex justify-between items-center mb-4">
          <a href="{{ route('pengajar.materi.index-kelas-pengajar') }}" class="text-gray-400 hover:text-blue-400 flex items-center">
                <i class="ph ph-arrow-left mr-2"></i> Kembali ke daftar kelas
            </a>
        </div>

        <h1 class="text-3xl font-bold text-white mb-2">{{ $materi->judul }}</h1>
        <p class="text-gray-400 mb-4">{{ $materi->deskripsi }}</p>

        <div class="text-sm text-gray-500 mb-6">
            <span><i class="ph ph-calendar mr-1"></i> Diunggah: {{ $materi->created_at->format('d M Y') }}</span> |
            <span><i class="ph ph-users mr-1"></i> Kelas: {{ $materi->kelas->nama_kelas ?? '-' }}</span> |
            <span><i class="ph ph-chart-bar mr-1"></i> Status: <span class="text-white">{{ ucfirst($materi->status) }}</span></span>
        </div>

             {{-- VIDEO YOUTUBE --}}
                @if($materi->video_url)
                    <div class="mb-6">
                       <div class="relative w-full" style="padding-bottom: 56.25%;">
                         <iframe width="560" height="315" src="{{$materi->video_url}}" 
                                 title="YouTube video player" 
                                 frameborder="0" 
                                 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                 referrerpolicy="strict-origin-when-cross-origin" 
                                 allowfullscreen>
                        </iframe>
                        </div>
                    </div>
                @endif

        @if($materi->file_name)
            @php
                $ext = strtolower(pathinfo($materi->file_name, PATHINFO_EXTENSION));
                $fileUrl = asset('storage/' . $materi->file_path);
            @endphp

            {{-- PREVIEW VIDEO --}}
            @if(in_array($ext, ['mp4', 'webm']))
                <div class="mb-6">
                    <video controls class="w-full rounded-xl shadow-lg">
                        <source src="{{ $fileUrl }}" type="video/{{ $ext }}">
                        Browser tidak mendukung video.
                    </video>
                </div> 

            {{-- PREVIEW PDF --}}
            @elseif($ext === 'pdf')
                <div class="mb-6">
                    <iframe src="{{ $fileUrl }}" class="w-full h-[600px] border rounded-lg" frameborder="0"></iframe>
                </div>

            {{-- TAMPILKAN LINK DOWNLOAD JIKA BUKAN VIDEO / PDF --}}
            @else
                <p class="text-gray-400 mb-2">File tidak dapat dipreview langsung.</p>
                <a href="{{ $fileUrl }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition" target="_blank">
                    <i class="ph ph-download-simple mr-2"></i> Download File
                </a>
            @endif
        @else
            <p class="text-red-400 mt-4">Tidak ada file terlampir.</p>
        @endif

    </div>
</div>
@endsection
