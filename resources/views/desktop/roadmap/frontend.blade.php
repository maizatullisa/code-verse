@extends('desktop.layout.master-desktop')

@section('title', 'Frontend Developer Roadmap')

@section('page-title', 'Frontend Developer Roadmap')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')

<style>
    .roadmap-container {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        position: relative;
        overflow-x: auto;
    }
    
    .roadmap-path {
        position: absolute;
        width: 4px;
        background: linear-gradient(to bottom, #f97316, #ea580c, #dc2626);
        left: 50%;
        transform: translateX(-50%);
        top: 120px;
        height: calc(100% - 120px);
        z-index: 1;
    }
    
    .roadmap-item {
        position: relative;
        z-index: 2;
        margin-bottom: 3rem;
    }
    
    .roadmap-node {
        background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        border: 4px solid #fff;
        box-shadow: 0 8px 25px rgba(249, 115, 22, 0.3);
        transition: all 0.3s ease;
        position: relative;
    }
    
    .roadmap-node:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 35px rgba(249, 115, 22, 0.5);
    }
    
    .skill-badge {
        background: linear-gradient(135deg, #374151 0%, #1f2937 100%);
        border: 2px solid #4b5563;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    
    .skill-badge:hover {
        background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
        border-color: #f97316;
        transform: translateY(-2px);
    }
    
    .floating-icon {
        position: absolute;
        width: 20px;
        height: 20px;
        background: #f97316;
        border-radius: 50%;
        opacity: 0.6;
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
    
    .progress-indicator {
        position: absolute;
        right: -15px;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        background: #10b981;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
    }
</style>

<div class="roadmap-container min-h-screen p-8 text-white">
    {{-- Header --}}
    <div class="text-center mb-12 relative">
        <div class="floating-icon" style="top: 20px; left: 10%;"></div>
        <div class="floating-icon" style="top: 60px; right: 15%; animation-delay: -2s;"></div>
        <div class="floating-icon" style="top: 40px; left: 80%; animation-delay: -4s;"></div>
        
        <h1 class="text-5xl font-bold bg-gradient-to-r from-orange-400 to-red-500 bg-clip-text text-transparent mb-4">
            Frontend Developer Roadmap
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">
            Jalur pembelajaran lengkap untuk menjadi Frontend Developer profesional
        </p>
    </div>

    {{-- Roadmap Path --}}
    <div class="roadmap-path"></div>

    <div class="flex flex-col items-center space-y-8 relative">
        
        {{-- HTML --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center">
                <div class="text-2xl font-bold">🌐 HTML</div>
                <div class="text-sm mt-1">HyperText Markup Language</div>
            </div>
            <div class="progress-indicator">✓</div>
        </div>

        {{-- CSS --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">🎨 CSS</div>
                <div class="text-sm mt-1">Cascading Style Sheets</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-2xl">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    📝 Basic CSS
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    📐 Layout (Flexbox, Grid)
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    📱 Responsive Design
                </div>
            </div>
            <div class="progress-indicator">✓</div>
        </div>

        {{-- JavaScript --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">⚡ JavaScript</div>
                <div class="text-sm mt-1">Programming Language</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-2xl">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🔤 Basic JavaScript
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🌳 DOM Manipulation
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🔄 Fetch API / Ajax
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🎯 ES6+ Features
                </div>
            </div>
            <div class="progress-indicator">⏳</div>
        </div>

        {{-- Version Control --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">🔄 Version Control</div>
                <div class="text-sm mt-1">Code Management</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-lg">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🌿 Git Commands
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🔀 Branching & Merging
                </div>
            </div>
            <div class="progress-indicator">⏳</div>
        </div>

        {{-- VCS Hosting --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">☁️ VCS Hosting</div>
                <div class="text-sm mt-1">Remote Repositories</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-lg">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🦊 GitLab
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🐙 GitHub
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🪣 Bitbucket
                </div>
            </div>
            <div class="progress-indicator">📋</div>
        </div>

        {{-- Package Manager --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">📦 Package Manager</div>
                <div class="text-sm mt-1">Dependency Management</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-lg">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    📦 NPM
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    ⚡ PNPM
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🧶 YARN
                </div>
            </div>
            <div class="progress-indicator">📋</div>
        </div>

        {{-- CSS Frameworks --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">🎯 CSS Frameworks</div>
                <div class="text-sm mt-1">Styling Libraries</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-2xl">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🌊 Tailwind CSS
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🥾 Bootstrap
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🎨 Material UI
                </div>
            </div>
            <div class="progress-indicator">📋</div>
        </div>

        {{-- JavaScript Frameworks --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">⚛️ JS Frameworks</div>
                <div class="text-sm mt-1">Frontend Libraries</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-3xl">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    ⚛️ React.js
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    💚 Vue.js
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🅰️ Angular
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🧱 Solid.js
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    ⚡ Qwik
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🔥 Svelte
                </div>
            </div>
            <div class="progress-indicator">📋</div>
        </div>

        {{-- Build Tools --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">🔧 Build Tools</div>
                <div class="text-sm mt-1">Development Tools</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-3xl">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    ⚡ Vite
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    💄 Prettier
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🔍 ESLint
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🚀 esbuild
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    📦 Webpack
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    📦 Parcel
                </div>
            </div>
            <div class="progress-indicator">📋</div>
        </div>

        {{-- Testing --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">🧪 Testing</div>
                <div class="text-sm mt-1">Quality Assurance</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-2xl">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    ⚡ Vitest
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🃏 Jest
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🧪 Testing Library
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🎭 Playwright
                </div>
            </div>
            <div class="progress-indicator">📋</div>
        </div>

        {{-- Deployment --}}
        <div class="roadmap-item">
            <div class="roadmap-node px-8 py-4 rounded-xl text-center mb-4">
                <div class="text-2xl font-bold">🚀 Deployment</div>
                <div class="text-sm mt-1">Going Live</div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-2xl">
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    ▲ Vercel
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🌐 Netlify
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    🔄 GitHub Pages
                </div>
                <div class="skill-badge px-4 py-2 rounded-lg text-sm font-medium">
                    ☁️ AWS S3
                </div>
            </div>
            <div class="progress-indicator">📋</div>
        </div>

    </div>

    {{-- Footer --}}
    <div class="text-center mt-16 pb-8">
        <div class="text-gray-400 text-sm mb-4">
            💡 Tips: Fokus pada satu teknologi dalam satu waktu dan praktik secara konsisten!
        </div>
        <div class="text-gray-500 text-xs">
            Roadmap ini dapat disesuaikan dengan kebutuhan dan tren teknologi terbaru
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scrolling animation for roadmap items
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    // Apply animation to roadmap items
    document.querySelectorAll('.roadmap-item').forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(50px)';
        item.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(item);
    });

    // Add click interaction for skill badges
    document.querySelectorAll('.skill-badge').forEach(badge => {
        badge.addEventListener('click', function() {
            this.classList.add('ring-2', 'ring-orange-400', 'ring-offset-2', 'ring-offset-gray-900');
            setTimeout(() => {
                this.classList.remove('ring-2', 'ring-orange-400', 'ring-offset-2', 'ring-offset-gray-900');
            }, 1000);
        });
    });
});
</script>

@endsection