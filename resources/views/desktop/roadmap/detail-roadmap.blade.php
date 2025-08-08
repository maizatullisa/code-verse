@extends('desktop.layout.master-desktop')

@section('title', 'Detail - Code Verse')

@section('page-title', 'Detail Roadmap')

@section('content')
@php
    $roadmap = [
        'title' => 'Fullstack Developer',
        'description' => 'Roadmap ini akan membimbing kamu menjadi Fullstack Developer, mulai dari dasar hingga mahir.',
        'steps' => [
            ['title' => 'HTML & CSS', 'description' => 'Pelajari dasar-dasar membuat halaman web.'],
            ['title' => 'JavaScript', 'description' => 'Kuasi interaktivitas di website.'],
            ['title' => 'Frontend Framework', 'description' => 'Belajar React, Vue, atau lainnya.'],
            ['title' => 'Backend', 'description' => 'Pelajari Node.js, Laravel, atau lainnya.'],
            ['title' => 'Database', 'description' => 'Gunakan MySQL, PostgreSQL, MongoDB, dsb.'],
            ['title' => 'Deployment', 'description' => 'Pelajari cara publish website kamu.'],
        ]
    ];
@endphp

<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-4">{{ $roadmap['title'] }}</h1>
    <p class="text-lg text-gray-700 mb-8">{{ $roadmap['description'] }}</p>

    <div class="space-y-6">
        @foreach($roadmap['steps'] as $index => $step)
            <div class="p-4 bg-white shadow rounded-lg">
                <h2 class="text-xl font-semibold mb-2">Step {{ $index + 1 }}: {{ $step['title'] }}</h2>
                <p class="text-gray-600">{{ $step['description'] }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
