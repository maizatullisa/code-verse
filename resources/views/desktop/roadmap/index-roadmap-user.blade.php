@extends('desktop.layout.master-desktop')

@section('title', 'Detail - Code Verse')

@section('page-title', 'Detail Roadmap')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
@php
    $roadmap = [
        'title' => 'Roadmap',
        'description' => '',
        'duration' => '6-12 Bulan',
        'level' => 'Intermediate',
        'prerequisite' => 'Basic programming knowledge',
        'career_salary' => 'Rp 8-25 juta/bulan',
        'steps' => [
            [
                'title' => 'HTML & CSS',
                'description' => 'Learn the basics of web development with HTML and CSS. Understand semantic markup, responsive design, and modern CSS features.',
                'duration' => '2-3 minggu',
                'topics' => ['Semantic HTML5', 'CSS Grid & Flexbox', 'Responsive Design', 'CSS Variables', 'Animations & Transitions'],
                'resources' => [
                    ['title' => 'MDN Web Docs - HTML', 'type' => 'official', 'url' => '#'],
                    ['title' => 'CSS-Tricks Complete Guide', 'type' => 'article', 'url' => '#'],
                    ['title' => 'Flexbox Froggy', 'type' => 'interactive', 'url' => '#'],
                ],
                'color' => 'text-orange-600 bg-orange-50 border-orange-200',
                'icon' => '🎨',
                'status' => 'available'
            ],
            [
                'title' => 'Backend Developer',
                'description' => 'Learn React to build dynamic and interactive user interfaces. Understand component-based architecture and state management.',
                'duration' => '6-8 minggu',
                'topics' => ['JSX & Components', 'Props & State', 'Hooks (useState, useEffect)', 'Context API', 'React Router', 'Form Handling'],
                'resources' => [
                    ['title' => 'React Official Docs', 'type' => 'official', 'url' => '#'],
                    ['title' => 'React Tutorial for Beginners', 'type' => 'video', 'url' => '#'],
                    ['title' => 'React Patterns', 'type' => 'guide', 'url' => '#'],
                ],
                'color' => 'text-blue-600 bg-blue-50 border-blue-200',
                'icon' => '⚛️',
                'status' => 'available'
            ],
            [
                'title' => 'DevOps & Deployment',
                'description' => 'Learn to deploy, monitor, and maintain applications in production environments.',
                'duration' => '3-4 minggu',
                'topics' => ['Git & Version Control', 'Docker Containerization', 'Cloud Services (AWS/Vercel)', 'CI/CD Pipelines', 'Monitoring & Logging'],
                'resources' => [
                    ['title' => 'Docker Getting Started', 'type' => 'tutorial', 'url' => '#'],
                    ['title' => 'AWS Free Tier Guide', 'type' => 'guide', 'url' => '#'],
                    ['title' => 'GitHub Actions', 'type' => 'official', 'url' => '#'],
                ],
                'color' => 'text-indigo-600 bg-indigo-50 border-indigo-200',
                'icon' => '🚀',
                'status' => 'available'
            ],
        ]
    ];
@endphp

<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ url('/desktop/home-desktop') }}" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $roadmap['title'] }}</h1>
                        <p class="text-gray-600 text-sm">{{ $roadmap['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Progress Bar -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                <span>Progress: 0 of {{ count($roadmap['steps']) }} steps</span>
                <span>{{ $roadmap['duration'] }}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full" style="width: 0%"></div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-8">
        <!-- Roadmap Steps -->
        <div class="space-y-6">
            @foreach($roadmap['steps'] as $index => $step)
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <!-- Step Header -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-4">
                                <div class="flex items-center justify-center w-12 h-12 {{ $step['color'] }} rounded-lg font-semibold text-lg">
                                    {{ $step['icon'] }}
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="text-xl font-bold text-gray-900">
                                            {{ $index + 1 }}. {{ $step['title'] }}
                                        </h3>
                                        <span class="px-3 py-1 {{ $step['color'] }} rounded-full text-xs font-medium">
                                            {{ $step['duration'] }}
                                        </span>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">{{ $step['description'] }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 ml-4">
                                <button class="p-2 text-gray-400 hover:text-gray-600 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                                    </svg>
                                </button>
                                <a href="/desktop/detail-roadmap" 
                                        class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors text-sm inline-block">
                                        Mulai Belajar
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Step Content -->
                    <div class="p-6">
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Topics -->
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-3">What you'll learn</h4>
                                <ul class="space-y-2">
                                    @foreach($step['topics'] as $topic)
                                        <li class="flex items-start gap-3">
                                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="text-gray-700">{{ $topic }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Resources -->
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-3">Resources</h4>
                                <div class="space-y-3">
                                    @foreach($step['resources'] as $resource)
                                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                            <div class="flex items-center gap-3">
                                                @if($resource['type'] === 'official')
                                                    <div class="w-6 h-6 bg-blue-100 text-blue-600 rounded flex items-center justify-center">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                @elseif($resource['type'] === 'video')
                                                    <div class="w-6 h-6 bg-red-100 text-red-600 rounded flex items-center justify-center">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M2 6a2 2 0 012-2h6l2 2h6a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="w-6 h-6 bg-green-100 text-green-600 rounded flex items-center justify-center">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                <div>
                                                    <div class="font-medium text-gray-900 text-sm">{{ $resource['title'] }}</div>
                                                    <div class="text-xs text-gray-500 capitalize">{{ $resource['type'] }}</div>
                                                </div>
                                            </div>
                                            <a href="{{ $resource['url'] }}" class="text-blue-600 hover:text-blue-700">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Footer Info -->
        
    </main>
</div>
@endsection