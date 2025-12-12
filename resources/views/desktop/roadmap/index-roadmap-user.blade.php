@extends('desktop.layout.master-desktop')

@section('title', 'Roadmap Karir - Code Verse')

@section('page-title', 'Roadmap Karir')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)

@section('content')
@php
    $roadmaps = [
        [
            'id' => 'fullstack-developer',
            'title' => 'Full Stack Developer',
            'description' => 'Menjadi developer yang mampu menguasai frontend dan backend development',
            'duration' => '8-12 Bulan',
            'level' => 'Beginner to Advanced',
            'prerequisite' => 'Basic computer knowledge',
            'career_salary' => 'Rp 12-35 juta/bulan',
            'icon' => '💻',
            'color' => 'blue',
            'steps' => [
                [
                    'title' => 'Dasar Pemrograman',
                    'description' => 'Memahami konsep dasar pemrograman, algoritma, dan struktur data.',
                    'duration' => '3-4 minggu',
                    'topics' => ['Algoritma & Logika', 'Struktur Data', 'Problem Solving', 'Clean Code'],
                    'icon' => '🧠',
                ],
                [
                    'title' => 'HTML & CSS',
                    'description' => 'Pelajari dasar-dasar web development dengan HTML dan CSS.',
                    'duration' => '2-3 minggu',
                    'topics' => ['HTML5 Semantic', 'CSS Flexbox & Grid', 'Responsive Design', 'CSS Modern'],
                    'icon' => '🎨',
                ],
                [
                    'title' => 'JavaScript Fundamentals',
                    'description' => 'Kuasai JavaScript sebagai bahasa pemrograman web.',
                    'duration' => '4-6 minggu',
                    'topics' => ['ES6+ Features', 'DOM Manipulation', 'Event Handling', 'Async/Await'],
                    'icon' => '⚡',
                ],
                [
                    'title' => 'Frontend Framework (React)',
                    'description' => 'Pelajari React untuk membangun UI yang dinamis dan interaktif.',
                    'duration' => '6-8 minggu',
                    'topics' => ['JSX & Components', 'Props & State', 'Hooks', 'React Router'],
                    'icon' => '⚛️',
                ],
                [
                    'title' => 'Backend Development (Node.js)',
                    'description' => 'Bangun server-side applications dengan Node.js.',
                    'duration' => '8-10 minggu',
                    'topics' => ['Express.js', 'RESTful APIs', 'Database Design', 'Authentication'],
                    'icon' => '🔧',
                ],
                [
                    'title' => 'Database & DevOps',
                    'description' => 'Pelajari database management dan deployment.',
                    'duration' => '4-6 minggu',
                    'topics' => ['SQL & NoSQL', 'Docker', 'Cloud Services', 'CI/CD'],
                    'icon' => '🚀',
                ]
            ]
        ],
        [
            'id' => 'mobile-developer',
            'title' => 'Mobile App Developer',
            'description' => 'Spesialis dalam pengembangan aplikasi mobile untuk Android dan iOS',
            'duration' => '6-10 Bulan',
            'level' => 'Beginner to Advanced',
            'prerequisite' => 'Basic programming knowledge',
            'career_salary' => 'Rp 10-30 juta/bulan',
            'icon' => '📱',
            'color' => 'green',
            'steps' => [
                [
                    'title' => 'Programming Fundamentals',
                    'description' => 'Dasar-dasar pemrograman dengan fokus pada mobile development.',
                    'duration' => '3-4 minggu',
                    'topics' => ['OOP Concepts', 'Design Patterns', 'Memory Management', 'Data Structures'],
                    'icon' => '📚',
                ],
                [
                    'title' => 'Dart & Flutter Basics',
                    'description' => 'Pelajari bahasa Dart dan framework Flutter untuk cross-platform mobile development.',
                    'duration' => '4-5 minggu',
                    'topics' => ['Dart Syntax', 'Flutter Widgets', 'State Management', 'Navigation'],
                    'icon' => '🎯',
                ],
                [
                    'title' => 'Advanced Flutter',
                    'description' => 'Tingkatkan kemampuan Flutter dengan fitur advanced.',
                    'duration' => '6-8 minggu',
                    'topics' => ['Custom Widgets', 'Animations', 'Platform Channels', 'Testing'],
                    'icon' => '🔥',
                ],
                [
                    'title' => 'Backend Integration',
                    'description' => 'Integrasikan aplikasi mobile dengan backend services.',
                    'duration' => '4-6 minggu',
                    'topics' => ['REST APIs', 'Authentication', 'Database Integration', 'Push Notifications'],
                    'icon' => '🌐',
                ],
                [
                    'title' => 'App Store Deployment',
                    'description' => 'Pelajari cara deploy aplikasi ke Google Play Store dan Apple App Store.',
                    'duration' => '2-3 minggu',
                    'topics' => ['App Store Guidelines', 'App Signing', 'Release Management', 'Analytics'],
                    'icon' => '🏪',
                ]
            ]
        ],
        [
            'id' => 'data-scientist',
            'title' => 'Data Scientist',
            'description' => 'Ahli dalam menganalisis data dan mengembangkan model machine learning',
            'duration' => '10-15 Bulan',
            'level' => 'Intermediate to Advanced',
            'prerequisite' => 'Basic mathematics and statistics',
            'career_salary' => 'Rp 15-45 juta/bulan',
            'icon' => '📊',
            'color' => 'purple',
            'steps' => [
                [
                    'title' => 'Mathematics & Statistics',
                    'description' => 'Fondasi matematika dan statistik yang diperlukan untuk data science.',
                    'duration' => '6-8 minggu',
                    'topics' => ['Linear Algebra', 'Statistics', 'Probability', 'Descriptive Analytics'],
                    'icon' => '📐',
                ],
                [
                    'title' => 'Python for Data Science',
                    'description' => 'Pelajari Python dan libraries yang penting untuk data science.',
                    'duration' => '4-6 minggu',
                    'topics' => ['Python Basics', 'Pandas & NumPy', 'Matplotlib & Seaborn', 'Data Cleaning'],
                    'icon' => '🐍',
                ],
                [
                    'title' => 'Data Analysis & Visualization',
                    'description' => 'Teknik analisis data dan visualisasi untuk mengungkap insights.',
                    'duration' => '6-8 minggu',
                    'topics' => ['Exploratory Data Analysis', 'Statistical Testing', 'Data Visualization', 'Business Intelligence'],
                    'icon' => '📈',
                ],
                [
                    'title' => 'Machine Learning',
                    'description' => 'Pelajari algoritma machine learning dan cara mengimplementasikannya.',
                    'duration' => '8-12 minggu',
                    'topics' => ['Supervised Learning', 'Unsupervised Learning', 'Feature Engineering', 'Model Evaluation'],
                    'icon' => '🤖',
                ],
                [
                    'title' => 'Deep Learning & AI',
                    'description' => 'Masuk ke dunia deep learning dengan neural networks.',
                    'duration' => '10-12 minggu',
                    'topics' => ['Neural Networks', 'TensorFlow/PyTorch', 'Computer Vision', 'NLP'],
                    'icon' => '🧠',
                ]
            ]
        ],
        [
            'id' => 'devops-engineer',
            'title' => 'DevOps Engineer',
            'description' => 'Spesialis dalam automation, deployment, dan infrastructure management',
            'duration' => '6-12 Bulan',
            'level' => 'Intermediate',
            'prerequisite' => 'Basic system administration',
            'career_salary' => 'Rp 15-40 juta/bulan',
            'icon' => '⚙️',
            'color' => 'orange',
            'steps' => [
                [
                    'title' => 'Linux & System Administration',
                    'description' => 'Kuasai Linux operating system dan fundamental system administration.',
                    'duration' => '4-6 minggu',
                    'topics' => ['Linux Commands', 'File Systems', 'Process Management', 'Network Configuration'],
                    'icon' => '🐧',
                ],
                [
                    'title' => 'Version Control & Scripting',
                    'description' => 'Pelajari Git untuk version control dan scripting untuk automation.',
                    'duration' => '3-4 minggu',
                    'topics' => ['Git Advanced', 'Bash Scripting', 'Python Automation', 'Configuration Management'],
                    'icon' => '📝',
                ],
                [
                    'title' => 'Containerization & Orchestration',
                    'description' => 'Docker dan Kubernetes untuk modern application deployment.',
                    'duration' => '6-8 minggu',
                    'topics' => ['Docker Fundamentals', 'Docker Compose', 'Kubernetes Basics', 'Container Security'],
                    'icon' => '🐳',
                ],
                [
                    'title' => 'Cloud Platforms',
                    'description' => 'Pelajari cloud services dari AWS, Google Cloud, atau Azure.',
                    'duration' => '8-10 minggu',
                    'topics' => ['Cloud Architecture', 'Infrastructure as Code', 'Serverless Computing', 'Cloud Security'],
                    'icon' => '☁️',
                ],
                [
                    'title' => 'CI/CD & Monitoring',
                    'description' => 'Implementasi continuous integration/deployment dan monitoring systems.',
                    'duration' => '6-8 minggu',
                    'topics' => ['Jenkins/GitHub Actions', 'Pipeline Design', 'Monitoring Tools', 'Log Management'],
                    'icon' => '🔄',
                ]
            ]
        ]
    ];
@endphp

<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white border-b sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-3">
                    <a href="{{ url('/desktop/home-desktop') }}" 
                       class="text-gray-500 hover:text-gray-700 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Career Roadmap</h1>
                        <p class="text-xs text-gray-600 hidden sm:block">Panduan langkah demi langkah untuk karir tech</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            <div class="text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">
                    Pilih Jalur Karir Anda
                </h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
                    Roadmap terstruktur untuk membantu mencapai karir impian di dunia teknologi
                </p>
            </div>
        </div>
    </div>

    <!-- Roadmaps -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="space-y-8 sm:space-y-12">
            @foreach($roadmaps as $roadmap)
                <div class="bg-white rounded-xl shadow-sm border hover:shadow-md transition-shadow">
                    <!-- Roadmap Header -->
                    <div class="p-4 sm:p-6 border-b bg-gradient-to-r from-{{ $roadmap['color'] }}-50 to-{{ $roadmap['color'] }}-100 rounded-t-xl">
                        <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                            <div class="text-3xl sm:text-4xl flex-shrink-0">{{ $roadmap['icon'] }}</div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2">{{ $roadmap['title'] }}</h3>
                                <p class="text-gray-600 text-sm sm:text-base mb-4">{{ $roadmap['description'] }}</p>
                                
                                <!-- Info Cards -->
                                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-lg p-3 border text-center">
                                        <div class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Durasi</div>
                                        <div class="text-sm font-bold text-{{ $roadmap['color'] }}-600 mt-1">{{ $roadmap['duration'] }}</div>
                                    </div>
                                    <div class="bg-white rounded-lg p-3 border text-center">
                                        <div class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Level</div>
                                        <div class="text-sm font-bold text-{{ $roadmap['color'] }}-600 mt-1">{{ $roadmap['level'] }}</div>
                                    </div>
                                    <div class="bg-white rounded-lg p-3 border text-center col-span-2 lg:col-span-1">
                                        <div class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Prerequisite</div>
                                        <div class="text-sm font-bold text-{{ $roadmap['color'] }}-600 mt-1">{{ $roadmap['prerequisite'] }}</div>
                                    </div>
                                    <div class="bg-white rounded-lg p-3 border text-center col-span-2 lg:col-span-1">
                                        <div class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Gaji</div>
                                        <div class="text-sm font-bold text-{{ $roadmap['color'] }}-600 mt-1">{{ $roadmap['career_salary'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Learning Path -->
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-lg font-semibold text-gray-900">Learning Path</h4>
                            <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                                {{ count($roadmap['steps']) }} Steps
                            </span>
                        </div>
                        
                        <!-- Steps Container -->
                        <div class="space-y-4 sm:space-y-6">
                            @foreach($roadmap['steps'] as $index => $step)
                                <div class="relative">
                                    <!-- Connection Line (except last step) -->
                                    @if($index < count($roadmap['steps']) - 1)
                                        <div class="absolute left-6 sm:left-8 top-16 bottom-0 w-0.5 bg-gray-200 hidden sm:block"></div>
                                    @endif

                                    <!-- Step Card -->
                                    <div class="flex gap-4">
                                        <!-- Step Icon -->
                                        <div class="flex-shrink-0 w-12 h-12 sm:w-16 sm:h-16 bg-{{ $roadmap['color'] }}-100 border-2 border-white rounded-full shadow-sm flex items-center justify-center relative z-10">
                                            <span class="text-lg sm:text-2xl">{{ $step['icon'] }}</span>
                                        </div>

                                        <!-- Step Content -->
                                        <div class="flex-1 min-w-0">
                                            <div class="bg-gray-50 rounded-lg p-4 sm:p-5 border-l-4 border-{{ $roadmap['color'] }}-400">
                                                <!-- Step Header -->
                                                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2 mb-3">
                                                    <h5 class="text-base sm:text-lg font-bold text-gray-900">
                                                        Step {{ $index + 1 }}: {{ $step['title'] }}
                                                    </h5>
                                                    <span class="text-xs sm:text-sm font-medium text-{{ $roadmap['color'] }}-600 bg-{{ $roadmap['color'] }}-100 px-2 sm:px-3 py-1 rounded-full self-start">
                                                        {{ $step['duration'] }}
                                                    </span>
                                                </div>
                                                
                                                <p class="text-sm sm:text-base text-gray-600 mb-4">{{ $step['description'] }}</p>
                                                
                                                <!-- Topics -->
                                                <div class="space-y-2">
                                                    <h6 class="text-sm font-semibold text-gray-700">Yang akan dipelajari:</h6>
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                                        @foreach($step['topics'] as $topic)
                                                            <div class="flex items-center gap-2 text-sm">
                                                                <div class="w-1.5 h-1.5 bg-{{ $roadmap['color'] }}-500 rounded-full flex-shrink-0"></div>
                                                                <span class="text-gray-700">{{ $topic }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Completion Badge -->
                            <div class="flex gap-4 pt-4">
                                <div class="flex-shrink-0 w-12 h-12 sm:w-16 sm:h-16 bg-green-100 border-2 border-white rounded-full shadow-sm flex items-center justify-center">
                                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 flex items-center">
                                    <div class="bg-green-50 rounded-lg p-4 border-l-4 border-green-400 w-full">
                                        <h5 class="text-base sm:text-lg font-bold text-green-800 mb-1">Selamat! 🎉</h5>
                                        <p class="text-sm text-green-700">Anda telah menyelesaikan roadmap {{ $roadmap['title'] }} dan siap berkarir!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center text-gray-600">
                <p class="text-sm">💡 <strong>Tips:</strong> Setiap roadmap dapat disesuaikan dengan pace belajar Anda sendiri</p>
            </div>
        </div>
    </footer>
</div>

<style>
/* Base Styles */
* {
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    line-height: 1.5;
}

/* Smooth transitions */
* {
    transition: all 0.2s ease-in-out;
}

/* Card hover effects */
.bg-white:hover {
    transform: translateY(-1px);
}

/* Focus states for accessibility */
button:focus, 
a:focus {
    outline: 2px solid #3B82F6;
    outline-offset: 2px;
}

/* Touch-friendly buttons */
@media (max-width: 768px) {
    button, a {
        min-height: 44px;
        min-width: 44px;
    }
}

/* Responsive text scaling */
@media (max-width: 640px) {
    html {
        font-size: 14px;
    }
}

@media (min-width: 1024px) {
    html {
        font-size: 16px;
    }
}

/* Loading animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.roadmap-card {
    animation: fadeInUp 0.6s ease-out forwards;
}

/* Progress line responsive behavior */
@media (max-width: 640px) {
    .step-connection-line {
        display: none;
    }
}

/* Improved readability */
.text-gray-600 {
    color: #6B7280;
}

.text-gray-700 {
    color: #374151;
}

.text-gray-900 {
    color: #111827;
}

/* Better spacing on mobile */
@media (max-width: 640px) {
    .space-y-8 > * + * {
        margin-top: 1.5rem;
    }
    
    .space-y-6 > * + * {
        margin-top: 1rem;
    }
}

/* Ensure color variants work */
.border-blue-400 { border-color: #60A5FA; }
.bg-blue-50 { background-color: #EFF6FF; }
.bg-blue-100 { background-color: #DBEAFE; }
.text-blue-600 { color: #2563EB; }
.bg-blue-500 { background-color: #3B82F6; }

.border-green-400 { border-color: #4ADE80; }
.bg-green-50 { background-color: #F0FDF4; }
.bg-green-100 { background-color: #DCFCE7; }
.text-green-600 { color: #16A34A; }
.bg-green-500 { background-color: #22C55E; }

.border-purple-400 { border-color: #A78BFA; }
.bg-purple-50 { background-color: #FAF5FF; }
.bg-purple-100 { background-color: #F3E8FF; }
.text-purple-600 { color: #9333EA; }
.bg-purple-500 { background-color: #A855F7; }

.border-orange-400 { border-color: #FB923C; }
.bg-orange-50 { background-color: #FFF7ED; }
.bg-orange-100 { background-color: #FED7AA; }
.text-orange-600 { color: #EA580C; }
.bg-orange-500 { background-color: #F97316; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Progressive loading animation
    const cards = document.querySelectorAll('.bg-white');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 150);
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

    // Intersection Observer for step animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateX(0)';
            }
        });
    }, observerOptions);

    // Apply animation to step cards
    document.querySelectorAll('.bg-gray-50').forEach(step => {
        step.style.opacity = '0.7';
        step.style.transform = 'translateX(-10px)';
        observer.observe(step);
    });

    // Add click handlers for better mobile interaction
    document.querySelectorAll('.bg-gray-50').forEach(step => {
        step.addEventListener('click', function() {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
});
</script>
@endsection