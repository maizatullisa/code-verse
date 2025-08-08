@extends('desktop.layout.master-desktop')

@section('title', 'Roadmap - Code Verse')

@section('page-title', 'Roadmap')

@section('content')
@php
    $roadmaps = [
        [
            'title' => 'Frontend Developer',
            'description' => 'Pelajari dasar-dasar pengembangan antarmuka web seperti HTML, CSS, dan JavaScript.',
            'slug' => 'frontend-developer'
        ],
        [
            'title' => 'Backend Developer',
            'description' => 'Bangun logika di balik layar dengan Node.js, PHP, Laravel, dan lainnya.',
            'slug' => 'backend-developer'
        ],
        [
            'title' => 'Fullstack Developer',
            'description' => 'Gabungkan frontend dan backend untuk menjadi developer yang komplet.',
            'slug' => 'fullstack-developer'
        ],
        [
            'title' => 'UI/UX Designer',
            'description' => 'Pahami desain pengalaman pengguna, wireframe, dan prototyping.',
            'slug' => 'ui-ux-designer'
        ],
        [
            'title' => 'DevOps Engineer',
            'description' => 'Otomatisasi, deployment, CI/CD, dan monitoring sistem.',
            'slug' => 'devops-engineer'
        ],
    ];
@endphp

<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8 text-center">Pilih Roadmap Pembelajaran</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($roadmaps as $roadmap)
            <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-xl transition duration-300">
                <h2 class="text-2xl font-semibold mb-2">{{ $roadmap['title'] }}</h2>
                <p class="text-gray-600 mb-4">{{ $roadmap['description'] }}</p>
                <a href="{{ url('/roadmap/' . $roadmap['slug']) }}"
                   class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Lihat Roadmap →
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
