@extends('desktop.layout.master-desktop')

@section('title', 'Roadmap - Code Verse')

@section('page-title', 'Roadmap')

@section('content')
@php
    $roadmaps = [
        [
            'title' => 'Frontend Developer',
            'description' => 'Master modern web interfaces with React, Vue, and cutting-edge technologies. Build stunning user experiences.',
            'slug' => 'frontend-developer',
            'icon' => '🎨',
            'color' => 'from-blue-500 to-cyan-500',
            'level' => 'Beginner Friendly',
            'duration' => '4-6 months',
            'salary' => 'Rp 6-20 juta',
            'skills' => ['HTML/CSS', 'JavaScript', 'React/Vue', 'Responsive Design'],
            'popularity' => 95,
            'jobs' => '2,847'
        ],
        [
            'title' => 'Backend Developer',
            'description' => 'Build robust server-side applications with Node.js, Python, and database management systems.',
            'slug' => 'backend-developer',
            'icon' => '⚙️',
            'color' => 'from-green-500 to-emerald-500',
            'level' => 'Intermediate',
            'duration' => '5-8 months',
            'salary' => 'Rp 8-25 juta',
            'skills' => ['Node.js/Python', 'Databases', 'APIs', 'Server Management'],
            'popularity' => 88,
            'jobs' => '1,923'
        ],
        [
            'title' => 'Fullstack Developer',
            'description' => 'Combine frontend and backend expertise to become a versatile full-stack engineer.',
            'slug' => 'fullstack-developer',
            'icon' => '🚀',
            'color' => 'from-purple-500 to-pink-500',
            'level' => 'Advanced',
            'duration' => '8-12 months',
            'salary' => 'Rp 12-35 juta',
            'skills' => ['Frontend + Backend', 'DevOps', 'System Design', 'Architecture'],
            'popularity' => 92,
            'jobs' => '3,156'
        ],
        [
            'title' => 'UI/UX Designer',
            'description' => 'Design intuitive user experiences with Figma, user research, and design thinking principles.',
            'slug' => 'ui-ux-designer',
            'icon' => '✨',
            'color' => 'from-orange-500 to-red-500',
            'level' => 'Creative',
            'duration' => '3-5 months',
            'salary' => 'Rp 5-18 juta',
            'skills' => ['Figma/Sketch', 'User Research', 'Prototyping', 'Design Systems'],
            'popularity' => 85,
            'jobs' => '1,445'
        ],
        [
            'title' => 'DevOps Engineer',
            'description' => 'Automate deployment pipelines, manage cloud infrastructure, and ensure system reliability.',
            'slug' => 'devops-engineer',
            'icon' => '🔧',
            'color' => 'from-indigo-500 to-purple-600',
            'level' => 'Expert',
            'duration' => '6-10 months',
            'salary' => 'Rp 15-40 juta',
            'skills' => ['Docker/K8s', 'AWS/Azure', 'CI/CD', 'Monitoring'],
            'popularity' => 78,
            'jobs' => '987'
        ],
        [
            'title' => 'Data Scientist',
            'description' => 'Extract insights from data using Python, machine learning, and statistical analysis.',
            'slug' => 'data-scientist',
            'icon' => '📊',
            'color' => 'from-teal-500 to-blue-600',
            'level' => 'Advanced',
            'duration' => '7-12 months',
            'salary' => 'Rp 10-30 juta',
            'skills' => ['Python/R', 'Machine Learning', 'Statistics', 'Data Visualization'],
            'popularity' => 82,
            'jobs' => '1,234'
        ]
    ];
@endphp

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 relative overflow-hidden">
    {{-- Background Decorations --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/20 to-purple-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-green-400/20 to-blue-600/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-purple-400/10 to-pink-600/10 rounded-full blur-3xl"></div>
    </div>

    {{-- Hero Section --}}
    <div class="relative">
        <div class="container mx-auto px-4 pt-20 pb-16">
            <div class="text-center max-w-5xl mx-auto">
                {{-- Animated Badge --}}
                <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm border border-white/20 rounded-full px-6 py-2 mb-8 shadow-lg">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-sm font-medium text-gray-700">{{ count($roadmaps) }} Career Paths Available</span>
                </div>

                <h1 class="text-6xl md:text-7xl font-extrabold mb-8 leading-tight">
                    <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">
                        Your Journey
                    </span>
                    <br>
                    <span class="text-gray-800">Starts Here</span>
                </h1>
                
                <p class="text-xl md:text-2xl text-gray-600 mb-12 leading-relaxed max-w-4xl mx-auto">
                    Choose your path and master in-demand skills with our structured learning roadmaps. 
                    <span class="font-semibold text-gray-800">From zero to hero</span> in your dream tech career.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
                    <button class="group px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl transform transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                        <span class="flex items-center gap-2">
                            <span>Explore Roadmaps</span>
                            <svg class="w-5 h-5 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </button>
                    <button class="px-8 py-4 bg-white/80 backdrop-blur-sm border border-white/20 text-gray-700 font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        Take Assessment
                    </button>
                </div>

                {{-- Stats Row --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-white/20 shadow-lg">
                        <div class="text-3xl font-bold text-blue-600 mb-2">50K+</div>
                        <div class="text-gray-600 font-medium">Students Learning</div>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-white/20 shadow-lg">
                        <div class="text-3xl font-bold text-green-600 mb-2">95%</div>
                        <div class="text-gray-600 font-medium">Success Rate</div>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-white/20 shadow-lg">
                        <div class="text-3xl font-bold text-purple-600 mb-2">12K+</div>
                        <div class="text-gray-600 font-medium">Jobs Landed</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter Section --}}
    <div class="container mx-auto px-4 mb-12">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="filter-btn active px-6 py-3 bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl font-semibold text-gray-700 hover:bg-white transition-all duration-300" data-filter="all">
                All Paths
            </button>
            <button class="filter-btn px-6 py-3 bg-white/60 backdrop-blur-sm border border-white/20 rounded-xl font-medium text-gray-600 hover:bg-white/80 transition-all duration-300" data-filter="beginner">
                Beginner
            </button>
            <button class="filter-btn px-6 py-3 bg-white/60 backdrop-blur-sm border border-white/20 rounded-xl font-medium text-gray-600 hover:bg-white/80 transition-all duration-300" data-filter="intermediate">
                Intermediate
            </button>
            <button class="filter-btn px-6 py-3 bg-white/60 backdrop-blur-sm border border-white/20 rounded-xl font-medium text-gray-600 hover:bg-white/80 transition-all duration-300" data-filter="advanced">
                Advanced
            </button>
        </div>
    </div>

    {{-- Roadmap Cards Grid --}}
    <div class="container mx-auto px-4 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 max-w-7xl mx-auto" id="roadmap-grid">
            @foreach($roadmaps as $index => $roadmap)
                <div class="roadmap-card group relative bg-white/70 backdrop-blur-sm border border-white/30 rounded-3xl overflow-hidden hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 hover:-translate-y-3 transform" 
                     data-level="{{ strtolower(explode(' ', $roadmap['level'])[0]) }}"
                     style="animation-delay: {{ $index * 0.1 }}s">
                    
                    {{-- Card Glow Effect --}}
                    <div class="absolute inset-0 bg-gradient-to-br {{ $roadmap['color'] }} opacity-0 group-hover:opacity-10 transition-opacity duration-500 rounded-3xl"></div>
                    
                    {{-- Popularity Badge --}}
                    <div class="absolute top-6 right-6 z-10">
                        <div class="flex items-center gap-1 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold">
                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span class="text-gray-700">{{ $roadmap['popularity'] }}%</span>
                        </div>
                    </div>

                    {{-- Card Content --}}
                    <div class="relative p-8 h-full flex flex-col">
                        {{-- Icon & Level --}}
                        <div class="flex items-start justify-between mb-6">
                            <div class="text-5xl mb-2 transform group-hover:scale-110 transition-transform duration-300">
                                {{ $roadmap['icon'] }}
                            </div>
                            <div class="px-4 py-2 bg-gradient-to-r {{ $roadmap['color'] }} text-white text-xs font-bold rounded-full shadow-lg">
                                {{ $roadmap['level'] }}
                            </div>
                        </div>

                        {{-- Title & Description --}}
                        <h2 class="text-2xl font-bold mb-4 text-gray-800 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:{{ $roadmap['color'] }} group-hover:bg-clip-text transition-all duration-300">
                            {{ $roadmap['title'] }}
                        </h2>
                        
                        <p class="text-gray-600 mb-6 leading-relaxed flex-grow">
                            {{ $roadmap['description'] }}
                        </p>

                        {{-- Stats Grid --}}
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-gray-50/80 rounded-lg p-3">
                                <div class="text-xs text-gray-500 mb-1">Duration</div>
                                <div class="font-semibold text-gray-800">{{ $roadmap['duration'] }}</div>
                            </div>
                            <div class="bg-gray-50/80 rounded-lg p-3">
                                <div class="text-xs text-gray-500 mb-1">Avg Salary</div>
                                <div class="font-semibold text-green-600">{{ $roadmap['salary'] }}</div>
                            </div>
                        </div>

                        {{-- Skills Tags --}}
                        <div class="mb-6">
                            <div class="text-xs text-gray-500 mb-3">Key Skills:</div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($roadmap['skills'] as $skill)
                                    <span class="px-3 py-1 bg-gray-100/80 text-gray-600 text-xs rounded-full font-medium">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        {{-- Job Market Info --}}
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                </svg>
                                <span>{{ $roadmap['jobs'] }} jobs</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span>High demand</span>
                            </div>
                        </div>

                        {{-- CTA Button --}}
                        <a href="{{ url('/roadmap/' . $roadmap['slug']) }}"
                           class="group/btn relative w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r {{ $roadmap['color'] }} text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105 overflow-hidden">
                            <span class="absolute inset-0 w-0 bg-white/20 transition-all duration-500 ease-out group-hover/btn:w-full"></span>
                            <span class="relative flex items-center gap-2">
                                <span>Start Learning Journey</span>
                                <svg class="w-5 h-5 transform transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- No results message --}}
        <div id="no-results" class="text-center py-12 hidden">
            <div class="text-gray-400 mb-4">
                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">No roadmaps found</h3>
            <p class="text-gray-500">Try selecting a different filter or browse all available paths.</p>
        </div>
    </div>

    {{-- Bottom CTA Section --}}
    <div class="container mx-auto px-4 pb-20">
        <div class="text-center">
            <div class="bg-gradient-to-r from-blue-600/10 to-purple-600/10 backdrop-blur-sm border border-white/20 rounded-3xl p-12 max-w-4xl mx-auto shadow-2xl">
                <div class="text-4xl mb-4">🤔</div>
                <h3 class="text-3xl font-bold text-gray-800 mb-6">
                    Not Sure Which Path to Choose?
                </h3>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Take our comprehensive career assessment to get personalized roadmap recommendations based on your interests and goals.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Take Career Assessment
                        </span>
                    </button>
                    <button class="px-8 py-4 bg-white/80 backdrop-blur-sm border border-white/20 text-gray-700 font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        Browse All Resources
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Interactive JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const roadmapCards = document.querySelectorAll('.roadmap-card');
    const noResults = document.getElementById('no-results');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-white/80', 'font-semibold');
                btn.classList.add('bg-white/60', 'font-medium');
            });
            button.classList.add('active', 'bg-white/80', 'font-semibold');
            button.classList.remove('bg-white/60', 'font-medium');

            const filter = button.dataset.filter;
            let visibleCount = 0;

            roadmapCards.forEach(card => {
                const cardLevel = card.dataset.level;
                if (filter === 'all' || cardLevel === filter || 
                    (filter === 'beginner' && cardLevel === 'beginner') ||
                    (filter === 'intermediate' && cardLevel === 'intermediate') ||
                    (filter === 'advanced' && cardLevel === 'advanced')) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.5s ease forwards';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    });

    // Stagger animation for cards on load
    roadmapCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
            card.style.transition = 'all 0.5s ease';
        }, index * 100);
    });

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    roadmapCards.forEach(card => {
        observer.observe(card);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>

<style>
/* Custom Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-in {
    animation: fadeInUp 0.6s ease forwards;
}

/* Filter button active state */
.filter-btn.active {
    background: rgba(255, 255, 255, 0.9) !important;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

/* Roadmap card hover effects */
.roadmap-card:hover {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
}

/* Enhanced glassmorphism */
.roadmap-card {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

/* Progress bar animation */
@keyframes progress-bar {
    from { width: 0%; }
    to { width: var(--progress-width); }
}

.progress-bar {
    animation: progress-bar 1.5s ease-out;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .roadmap-card {
        transform: none;
        transition: transform 0.3s ease;
    }
    
    .roadmap-card:hover {
        transform: translateY(-8px);
    }
}

/* Enhanced button effects */
.group/btn:hover {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Smooth transitions for all interactive elements */
* {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
</style>
@endsection