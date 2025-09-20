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
    <header class="bg-white border-b sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4">
            <div class="flex items-center gap-4">
                <a href="{{ url('/desktop/home-desktop') }}" class="text-gray-500 hover:text-gray-700 p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Career Roadmap</h1>
                    <p class="text-gray-600 text-sm">Panduan langkah demi langkah untuk karir tech</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <div class="bg-white border-b">
        <div class="max-w-6xl mx-auto px-4 py-12 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Pilih Jalur Karir Anda</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Roadmap terstruktur untuk membantu mencapai karir impian di dunia teknologi
            </p>
        </div>
    </div>

    <!-- Roadmaps -->
    <main class="max-w-6xl mx-auto px-4 py-12">
        <div class="grid gap-12">
            @foreach($roadmaps as $roadmap)
                <div class="bg-white rounded-xl shadow-sm border">
                    <!-- Roadmap Header -->
                    <div class="p-8 border-b bg-gradient-to-r from-{{ $roadmap['color'] }}-50 to-{{ $roadmap['color'] }}-100">
                        <div class="flex items-start gap-6">
                            <div class="text-5xl">{{ $roadmap['icon'] }}</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $roadmap['title'] }}</h3>
                                <p class="text-gray-600 mb-6">{{ $roadmap['description'] }}</p>
                                
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                                    <div class="bg-white rounded-lg p-3 border">
                                        <div class="font-semibold text-gray-900">Durasi</div>
                                        <div class="text-{{ $roadmap['color'] }}-600">{{ $roadmap['duration'] }}</div>
                                    </div>
                                    <div class="bg-white rounded-lg p-3 border">
                                        <div class="font-semibold text-gray-900">Level</div>
                                        <div class="text-{{ $roadmap['color'] }}-600">{{ $roadmap['level'] }}</div>
                                    </div>
                                    <div class="bg-white rounded-lg p-3 border">
                                        <div class="font-semibold text-gray-900">Prerequisite</div>
                                        <div class="text-{{ $roadmap['color'] }}-600">{{ $roadmap['prerequisite'] }}</div>
                                    </div>
                                    <div class="bg-white rounded-lg p-3 border">
                                        <div class="font-semibold text-gray-900">Gaji</div>
                                        <div class="text-{{ $roadmap['color'] }}-600">{{ $roadmap['career_salary'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Learning Path -->
                    <div class="p-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-6">Learning Path ({{ count($roadmap['steps']) }} Steps)</h4>
                        
                        <div class="relative">
                            <!-- Progress Line -->
                            <div class="absolute left-8 top-12 bottom-12 w-0.5 bg-{{ $roadmap['color'] }}-200"></div>
                            
                            <!-- Steps -->
                            <div class="space-y-8">
                                @foreach($roadmap['steps'] as $index => $step)
                                    <div class="relative flex gap-6">
                                        <!-- Step Number & Icon -->
                                        <div class="relative z-10 flex items-center justify-center w-16 h-16 bg-{{ $roadmap['color'] }}-100 border-4 border-white rounded-full shadow-sm">
                                            <span class="text-2xl">{{ $step['icon'] }}</span>
                                        </div>

                                        <!-- Step Content -->
                                        <div class="flex-1 min-w-0">
                                            <div class="bg-gray-50 rounded-lg p-6 border-l-4 border-{{ $roadmap['color'] }}-400">
                                                <div class="flex items-start justify-between mb-3">
                                                    <h5 class="text-lg font-bold text-gray-900">
                                                        Step {{ $index + 1 }}: {{ $step['title'] }}
                                                    </h5>
                                                    <span class="text-sm font-medium text-{{ $roadmap['color'] }}-600 bg-{{ $roadmap['color'] }}-100 px-3 py-1 rounded-full">
                                                        {{ $step['duration'] }}
                                                    </span>
                                                </div>
                                                
                                                <p class="text-gray-600 mb-4">{{ $step['description'] }}</p>
                                                
                                                <!-- Topics -->
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                                    @foreach($step['topics'] as $topic)
                                                        <div class="flex items-center gap-2 text-sm">
                                                            <div class="w-2 h-2 bg-{{ $roadmap['color'] }}-400 rounded-full"></div>
                                                            <span class="text-gray-700">{{ $topic }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Completion Badge -->
                            <div class="relative z-10 flex items-center justify-center w-16 h-16 bg-green-100 border-4 border-white rounded-full shadow-sm ml-0 mt-8">
                                <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>

        <!-- Final CTA -->
         
    </main>
</div>

<style>
/* Smooth transitions */
* {
    transition: all 0.2s ease;
}

/* Card hover effects */
.roadmap-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
}

/* Step animations */
.step-item {
    opacity: 0;
    transform: translateX(-20px);
    animation: slideIn 0.6s forwards;
}

@keyframes slideIn {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .progress-line {
        left: 1.5rem;
    }
    
    .step-content {
        margin-left: 0.5rem;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }
    
    /* Mobile specific adjustments */
    .roadmap-card {
        margin: 0 -0.5rem;
        border-radius: 0.5rem;
    }
    
    .step-timeline {
        padding-left: 0;
    }
    
    .step-item {
        margin-left: 0;
    }
    
    /* Adjust text sizes for mobile */
    h1 {
        font-size: 1.25rem;
    }
    
    h2 {
        font-size: 1.5rem;
    }
    
    h3 {
        font-size: 1.25rem;
    }
    
    /* Better touch targets */
    button, a {
        min-height: 44px;
    }
}

@media (max-width: 640px) {
    /* Extra small screens */
    .container-padding {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .progress-line {
        left: 1.25rem;
    }
    
    .step-icon {
        width: 3rem;
        height: 3rem;
    }
    
    .step-icon span {
        font-size: 1.25rem;
    }
}

/* Button states */
button:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Focus states for accessibility */
button:focus, a:focus {
    outline: 2px solid #3B82F6;
    outline-offset: 2px;
}

/* Clean progress indicators */
.progress-dot {
    transition: all 0.3s ease;
}

.progress-dot:hover {
    transform: scale(1.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
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

    // Animate steps on scroll
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateX(0)';
                }, index * 100);
            }
        });
    }, observerOptions);

    // Observe all step items
    document.querySelectorAll('.step-item').forEach(step => {
        step.style.opacity = '0';
        step.style.transform = 'translateX(-20px)';
        observer.observe(step);
    });

    // Add loading animation for roadmap cards
    document.querySelectorAll('.roadmap-card').forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 200);
    });
});
</script>
@endsection