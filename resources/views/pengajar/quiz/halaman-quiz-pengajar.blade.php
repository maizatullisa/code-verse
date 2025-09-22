@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black px-4 py-8 text-gray-100">
    <div class="max-w-4xl mx-auto">

        <!-- Header -->
        <div class="bg-gray-800/80 backdrop-blur-xl rounded-3xl p-8 mb-8 border border-gray-700/50 shadow-2xl animate-fade-in">
            <div class="flex items-center justify-between mb-6">
               <a href="{{ route('pengajar.quiz.listquiz', ['kelas' => $quiz->materi->kelas_id]) }}" class="flex items-center space-x-2 text-gray-400 hover:text-blue-400 transition-colors">
                    <i class="ph ph-arrow-left text-xl"></i>
                    <span>Kembali</span>
                </a>

                <div class="flex items-center space-x-4">
                    <span class="px-4 py-2 bg-green-500/20 text-green-400 rounded-full text-sm font-medium border border-green-500/30">
                        <i class="ph ph-check-circle mr-1"></i> Aktif
                    </span>
                    <span class="px-4 py-2 bg-blue-500/20 text-blue-400 rounded-full text-sm font-medium border border-blue-500/30">
                        <i class="ph ph-pencil mr-1"></i> {{ $quiz->questions->count() }}
                    </span>
                </div>
            </div>

            <div class="flex items-start space-x-6">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg animate-glow">
                    <i class="ph-fill ph-code text-white text-3xl"></i>
                </div>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-white mb-3 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                        {{ $quiz->judul }}
                    </h1>
                    <p class="text-gray-400 text-lg leading-relaxed mb-4">
                        {{ $quiz->deskripsi }}
                    </p>
                    <div class="flex items-center space-x-6 text-sm text-gray-500">
                        <span class="flex items-center">
                            <i class="ph ph-calendar mr-2"></i>
                            Dibuat: {{ $quiz->created_at->format('d M Y') }}
                        </span>
                        <span class="flex items-center">
                            <i class="ph ph-list-bullets mr-2"></i> Pilihan Ganda
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Soal -->
        <div class="space-y-8">
            @foreach($quiz->questions as $index => $q)
                <div class="bg-gray-800/60 backdrop-blur-xl rounded-2xl p-6 border border-gray-700/50 shadow-xl animate-slide-up hover:border-blue-500/30 transition-all duration-300">
                    <div class="flex items-start space-x-4 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center font-bold text-white shadow-lg">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-white mb-4">
                                {{ $q->pertanyaan }}
                            </h3>

                            <div class="space-y-3">
                                @foreach(['a', 'b', 'c', 'd'] as $option)
                                    @php
                                        $jawaban = $q->{'pilihan_'.$option};
                                        $benar = $q->jawaban_benar === strtoupper($option);
                                    @endphp

                                    <div class="flex items-center space-x-3 p-4
                                        {{ $benar ? 'bg-green-500/20 border-2 border-green-500 shadow-lg' : 'bg-gray-700/40 border border-gray-600/50 hover:border-red-500/50 hover:bg-gray-700/60' }}
                                        rounded-xl transition-all cursor-pointer group">

                                        <div class="w-6 h-6
                                            {{ $benar ? 'bg-green-500 border-2 border-green-400 flex items-center justify-center' : 'border-2 border-gray-500 group-hover:border-red-400' }}
                                            rounded-full">
                                            @if($benar)
                                                <i class="ph-fill ph-check text-white text-sm"></i>
                                            @endif
                                        </div>

                                        <span class="text-gray-300 group-hover:text-white transition-colors {{ $benar ? 'text-white font-medium' : '' }}">
                                            {{ strtoupper($option) }}. {{ $jawaban }}
                                        </span>

                                        @if($benar)
                                            <span class="ml-auto px-2 py-1 bg-green-600 text-white text-xs rounded-full">Benar</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Stats -->
        <div class="mt-8 bg-gray-800/40 backdrop-blur-xl rounded-2xl p-6 border border-gray-700/30">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-center">
                <div class="p-4">
                    <div class="text-2xl font-bold text-blue-400 mb-1">{{ $quiz->questions->count() }}</div>
                    <div class="text-sm text-gray-400">Total Soal</div>
                </div>
                <div class="p-4">
                    <div class="text-2xl font-bold text-green-400 mb-1">5</div>
                    <div class="text-sm text-gray-400">Ditampilkan</div>
                </div>
                <div class="p-4">
                    <div class="text-2xl font-bold text-orange-400 mb-1">{{ ucfirst($quiz->status) }}</div>
                    <div class="text-sm text-gray-400">Status</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Tailwind dan Phosphor Icons -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                animation: {
                    'fade-in': 'fadeIn 0.6s ease-out',
                    'slide-up': 'slideUp 0.5s ease-out',
                    'glow': 'glow 2s ease-in-out infinite alternate',
                },
                keyframes: {
                    fadeIn: {
                        '0%': { opacity: '0', transform: 'translateY(20px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' }
                    },
                    slideUp: {
                        '0%': { transform: 'translateY(30px)', opacity: '0' },
                        '100%': { transform: 'translateY(0)', opacity: '1' }
                    },
                    glow: {
                        '0%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.5)' },
                        '100%': { boxShadow: '0 0 30px rgba(59, 130, 246, 0.8)' }
                    }
                }
            }
        }
    }
</script>
@endpush
