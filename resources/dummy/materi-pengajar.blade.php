@extends('layouts.app')

@section('content')
<div class="p-4">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">
        Materi oleh: {{ $pengajar->first_name }}
    </h2>

    @if ($materis->isEmpty())
        <p class="text-gray-500">Belum ada materi yang diambil dari pengajar ini.</p>
    @else
        <div class="grid grid-cols-1 gap-4">
            @foreach ($materis as $materi)
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-bold">{{ $materi->judul }}</h3>
                    <p class="text-sm text-gray-600">{{ $materi->created_at->translatedFormat('d F Y') }}</p>
                    <a href="{{ route('materi.show', $materi->id) }}" class="text-blue-500 text-sm mt-2 inline-block">Lihat Materi</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
