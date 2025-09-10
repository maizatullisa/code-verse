@extends('desktop.layout.master-desktop')

@section('title', 'Hasil Quiz')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="max-w-3xl mx-auto py-10 px-6">
    <div class="bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Hasil Quiz: {{ $quiz->judul }}</h1>
        <p class="text-lg text-gray-700 mb-2">Skor kamu: <span class="font-bold text-p2">{{ $score }}/100</span></p>
        <p class="text-sm text-gray-600 mb-6">Jawaban benar: {{ $correctCount }} dari {{ $totalQuestions }} soal</p>

        <hr class="my-6">

        @foreach ($quiz->questions as $index => $question)
            <div class="mb-6">
                <p class="font-semibold text-gray-800">Soal {{ $index + 1 }}: {{ $question->pertanyaan }}</p>
                <p class="text-sm text-gray-600">Jawaban kamu: 
                    @php
                        $userAnswer = $answers[$question->id] ?? '-';
                        $isCorrect = strtolower($userAnswer) === strtolower($question->jawaban_benar);
                    @endphp
                    <span class="{{ $isCorrect ? 'text-green-600' : 'text-red-600' }}">
                        {{ strtoupper($userAnswer) }}
                        ({{ $isCorrect ? 'Benar' : 'Salah' }})
                    </span>
                </p>
                <p class="text-sm text-gray-600">Jawaban benar: <strong>{{ strtoupper($question->jawaban_benar) }}</strong></p>
            </div>
        @endforeach

       <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id, 'materiId' => $materi->id]) }}" class="inline-block mt-4 bg-p2 text-white px-4 py-2 rounded hover:bg-p2/80">
        Kembali ke Materi
    </a>


    </div>
</div>
@endsection
