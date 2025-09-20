@extends('mobile.layout.master')

@section('title', 'Detail Roadmap - Code Verse')

@section('content')
<!-- BACKGROUND ELEMENTS START -->
<img src="{{ asset('assets/images/header-bg-1.png') }}" alt="" class="absolute top-0 left-0 right-0 -mt-6" />
<div class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px]"></div>
<div class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px]"></div>
<div class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px]"></div>
<div class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px]"></div>
<!-- BACKGROUND ELEMENTS END -->

<!-- Header -->
<div class="relative z-10 pb-4 ">
    <div class="flex justify-between items-center px-6">
        <div class="flex items-center gap-3">
            <a href="{{ url('/roadmap-mobile') }}" class="text-2xl text-white">
                <i class="ph ph-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-lg font-bold text-white" id="roadmap-title">Frontend Developer</h1>
                <p class="text-xs text-white/70">Learning Roadmap</p>
            </div>
        </div>
        <button class="text-white bg-color24 p-2.5 rounded-full">
            <i class="ph ph-bookmark text-sm"></i>
        </button>
    </div>
</div>

<!-- Roadmap Stats -->
<div class="px-6 pb-6 relative z-20">
    <div class="bg-white dark:bg-color10 rounded-2xl p-4 border border-black/10 dark:border-color24">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-r from-orange-400 to-orange-600 rounded-xl flex items-center justify-center" id="roadmap-icon">
                    <i class="ph ph-code text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="font-bold text-base" id="roadmap-name">Frontend Developer</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400" id="roadmap-tech">HTML, CSS, JavaScript, React</p>
                </div>
            </div>
            <div class="text-right">
                <div class="text-p2 font-bold text-sm" id="roadmap-duration">6-8 Bulan</div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Estimasi</div>
            </div>
        </div>
        
        <!-- Progress -->
        <div class="bg-gray-50 dark:bg-color24 rounded-xl p-3">
            <div class="flex justify-between text-xs mb-2">
                <span class="font-medium">Progress Pembelajaran</span>
                <span class="text-p2 font-bold">3/15 selesai</span>
            </div>
            <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                <div class="bg-gradient-to-r from-p2 to-p3 h-2 rounded-full transition-all" style="width: 20%"></div>
            </div>
        </div>
    </div>
</div>

<!-- Interactive Roadmap -->
<div class="px-6 pb-8 relative z-20">
    <div class="bg-white dark:bg-color10 rounded-2xl border border-black/10 dark:border-color24 overflow-hidden">
        <!-- Roadmap Header -->
        <div class="p-4 border-b border-gray-100 dark:border-color24">
            <h3 class="font-bold text-base">Interactive Learning Path</h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Tap pada topik untuk melihat detail</p>
        </div>
        
        <!-- Roadmap Flow -->
        <div class="p-4">
            <div class="roadmap-container">
                
                <!-- START -->
                <div class="roadmap-step">
                    <div class="step-connector start"></div>
                    <div class="roadmap-node completed start-node" data-topic="start">
                        <div class="node-content">
                            <div class="node-icon">🚀</div>
                            <div class="node-title">START</div>
                        </div>
                        <div class="node-badge completed">✓</div>
                    </div>
                </div>

                <!-- BASICS -->
                <div class="roadmap-step">
                    <div class="step-label">Fundamentals</div>
                    <div class="step-nodes">
                        <div class="roadmap-node completed" data-topic="html">
                            <div class="node-content">
                                <div class="node-icon">📝</div>
                                <div class="node-title">HTML</div>
                                <div class="node-subtitle">Structure</div>
                            </div>
                            <div class="node-badge completed">✓</div>
                        </div>
                        
                        <div class="roadmap-node completed" data-topic="css">
                            <div class="node-content">
                                <div class="node-icon">🎨</div>
                                <div class="node-title">CSS</div>
                                <div class="node-subtitle">Styling</div>
                            </div>
                            <div class="node-badge completed">✓</div>
                        </div>
                        
                        <div class="roadmap-node current" data-topic="javascript">
                            <div class="node-content">
                                <div class="node-icon">⚡</div>
                                <div class="node-title">JavaScript</div>
                                <div class="node-subtitle">Programming</div>
                            </div>
                            <div class="node-badge current">📖</div>
                        </div>
                    </div>
                    <div class="step-connector"></div>
                </div>

                <!-- TOOLS -->
                <div class="roadmap-step">
                    <div class="step-label">Development Tools</div>
                    <div class="step-nodes single">
                        <div class="roadmap-node pending" data-topic="git">
                            <div class="node-content">
                                <div class="node-icon">📋</div>
                                <div class="node-title">Git & GitHub</div>
                                <div class="node-subtitle">Version Control</div>
                            </div>
                            <div class="node-badge pending">🔒</div>
                        </div>
                    </div>
                    <div class="step-connector"></div>
                </div>

                <!-- ADVANCED CSS -->
                <div class="roadmap-step">
                    <div class="step-label">Advanced Styling</div>
                    <div class="step-nodes">
                        <div class="roadmap-node pending" data-topic="flexbox">
                            <div class="node-content">
                                <div class="node-icon">📐</div>
                                <div class="node-title">Flexbox</div>
                                <div class="node-subtitle">Layout</div>
                            </div>
                            <div class="node-badge pending">🔒</div>
                        </div>
                        
                        <div class="roadmap-node pending" data-topic="grid">
                            <div class="node-content">
                                <div class="node-icon">⬜</div>
                                <div class="node-title">CSS Grid</div>
                                <div class="node-subtitle">Grid Layout</div>
                            </div>
                            <div class="node-badge pending">🔒</div>
                        </div>
                        
                        <div class="roadmap-node pending" data-topic="responsive">
                            <div class="node-content">
                                <div class="node-icon">📱</div>
                                <div class="node-title">Responsive</div>
                                <div class="node-subtitle">Mobile First</div>
                            </div>
                            <div class="node-badge pending">🔒</div>
                        </div>
                    </div>
                    <div class="step-connector"></div>
                </div>

                <!-- JS ADVANCED -->
                <div class="roadmap-step">
                    <div class="step-label">JavaScript Mastery</div>
                    <div class="step-nodes">
                        <div class="roadmap-node pending" data-topic="dom">
                            <div class="node-content">
                                <div class="node-icon">🌐</div>
                                <div class="node-title">DOM API</div>
                                <div class="node-subtitle">Manipulation</div>
                            </div>
                            <div class="node-badge pending">🔒</div>
                        </div>
                        
                        <div class="roadmap-node pending" data-topic="async">
                            <div class="node-content">
                                <div class="node-icon">⏱️</div>
                                <div class="node-title">Async JS</div>
                                <div class="node-subtitle">Promises</div>
                            </div>
                            <div class="node-badge pending">🔒</div>
                        </div>
                    </div>
                    <div class="step-connector"></div>
                </div>

                <!-- FRAMEWORKS -->
                <div class="roadmap-step">
                    <div class="step-label">Choose Framework</div>
                    <div class="step-nodes framework-choice">
                        <div class="roadmap-node pending framework" data-topic="react">
                            <div class="node-content">
                                <div class="node-icon">⚛️</div>
                                <div class="node-title">React</div>
                                <div class="node-subtitle">Facebook</div>
                            </div>
                            <div class="node-badge pending">🔒</div>
                        </div>
                        
                        <div class="choice-or">OR</div>
                        
                        <div class="roadmap-node pending framework" data-topic="vue">
                            <div class="node-content">
                                <div class="node-icon">💚</div>
                                <div class="node-title">Vue.js</div>
                                <div class="node-subtitle">Progressive</div>
                            </div>
                            <div class="node-badge pending">🔒</div>
                        </div>
                    </div>
                    <div class="step-connector"></div>
                </div>

                <!-- DEPLOYMENT -->
                <div class="roadmap-step">
                    <div class="step-label">Production Ready</div>
                    <div class="step-nodes single">
                        <div class="roadmap-node pending" data-topic="deployment">
                            <div class="node-content">
                                <div class="node-icon">🚀</div>
                                <div class="node-title">Deployment</div>
                                <div class="node-subtitle">Go Live!</div>
                            </div>
                            <div class="node-badge pending">🔒</div>
                        </div>
                    </div>
                    <div class="step-connector end"></div>
                </div>

                <!-- FINISH -->
                <div class="roadmap-step">
                    <div class="roadmap-node pending finish-node" data-topic="finish">
                        <div class="node-content">
                            <div class="node-icon">🎉</div>
                            <div class="node-title">FINISH</div>
                        </div>
                        <div class="node-badge pending">🏆</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Current Learning -->
<div class="px-6 pb-20 relative z-20">
    <div class="bg-white dark:bg-color10 rounded-2xl p-4 border border-black/10 dark:border-color24">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                <span class="text-lg">⚡</span>
            </div>
            <div>
                <h4 class="font-bold text-sm">Sedang Belajar: JavaScript</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400">Progress: 3/5 lessons completed</p>
            </div>
        </div>
        
        <div class="space-y-2 mb-4">
            <div class="flex items-center gap-2 p-2 bg-green-50 dark:bg-green-900/20 rounded-lg">
                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                    <i class="ph ph-check text-white text-xs"></i>
                </div>
                <span class="text-sm flex-1">Variables & Data Types</span>
                <span class="text-xs text-green-600 dark:text-green-400 font-medium">Done</span>
            </div>
            
            <div class="flex items-center gap-2 p-2 bg-green-50 dark:bg-green-900/20 rounded-lg">
                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                    <i class="ph ph-check text-white text-xs"></i>
                </div>
                <span class="text-sm flex-1">Functions & Scope</span>
                <span class="text-xs text-green-600 dark:text-green-400 font-medium">Done</span>
            </div>
            
            <div class="flex items-center gap-2 p-2 bg-orange-50 dark:bg-orange-900/20 rounded-lg border border-orange-200 dark:border-orange-800">
                <div class="w-5 h-5 bg-orange-500 rounded-full flex items-center justify-center">
                    <i class="ph ph-play text-white text-xs"></i>
                </div>
                <span class="text-sm flex-1 font-medium">Loops & Conditionals</span>
                <span class="text-xs text-orange-600 dark:text-orange-400 font-medium">Active</span>
            </div>
            
            <div class="flex items-center gap-2 p-2 bg-gray-50 dark:bg-gray-800/50 rounded-lg opacity-60">
                <div class="w-5 h-5 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center">
                    <i class="ph ph-lock text-white text-xs"></i>
                </div>
                <span class="text-sm flex-1">Objects & Arrays</span>
                <span class="text-xs text-gray-500 font-medium">Locked</span>
            </div>
        </div>
        
        <button class="w-full bg-gradient-to-r from-p2 to-p3 text-white py-3 rounded-xl font-bold text-sm hover:opacity-90 transition-opacity">
            Continue Learning
        </button>
    </div>
</div>

<style>
.roadmap-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0;
    position: relative;
}

.roadmap-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    position: relative;
}

.step-label {
    font-size: 11px;
    font-weight: 600;
    color: #6B7280;
    text-align: center;
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.step-nodes {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 16px;
}

.step-nodes.single {
    justify-content: center;
}

.step-nodes.framework-choice {
    align-items: center;
    gap: 16px;
}

.choice-or {
    font-size: 10px;
    font-weight: bold;
    color: #9CA3AF;
    background: #F3F4F6;
    padding: 4px 8px;
    rounded: 6px;
    border-radius: 6px;
}

.dark .choice-or {
    background: #374151;
    color: #6B7280;
}

.roadmap-node {
    background: #F9FAFB;
    border: 2px solid #E5E7EB;
    border-radius: 12px;
    padding: 12px;
    min-width: 85px;
    max-width: 90px;
    text-align: center;
    position: relative;
    cursor: pointer;
    transition: all 0.2s ease;
}

.dark .roadmap-node {
    background: #374151;
    border-color: #4B5563;
}

.roadmap-node.completed {
    background: linear-gradient(135deg, #10B981, #059669);
    border-color: #059669;
    color: white;
    transform: scale(1.02);
}

.roadmap-node.current {
    background: linear-gradient(135deg, #F59E0B, #D97706);
    border-color: #D97706;
    color: white;
    transform: scale(1.05);
    box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.2);
    animation: pulse-current 2s infinite;
}

.roadmap-node.pending {
    background: #F9FAFB;
    border-color: #E5E7EB;
    color: #9CA3AF;
}

.dark .roadmap-node.pending {
    background: #374151;
    border-color: #4B5563;
    color: #6B7280;
}

.roadmap-node.framework {
    border-style: dashed;
    border-width: 2px;
}

.roadmap-node.start-node,
.roadmap-node.finish-node {
    min-width: 95px;
    max-width: 100px;
}

.roadmap-node.start-node {
    background: linear-gradient(135deg, #8B5CF6, #7C3AED);
    border-color: #7C3AED;
    color: white;
}

.node-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
}

.node-icon {
    font-size: 18px;
    margin-bottom: 2px;
}

.node-title {
    font-size: 11px;
    font-weight: 700;
    line-height: 1.1;
}

.node-subtitle {
    font-size: 9px;
    opacity: 0.8;
    line-height: 1;
}

.node-badge {
    position: absolute;
    top: -6px;
    right: -6px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    border: 2px solid white;
}

.node-badge.completed {
    background: #059669;
    color: white;
}

.node-badge.current {
    background: #D97706;
    color: white;
}

.node-badge.pending {
    background: #E5E7EB;
    color: #9CA3AF;
}

.dark .node-badge.pending {
    background: #4B5563;
    color: #6B7280;
}

.step-connector {
    width: 2px;
    height: 24px;
    background: linear-gradient(to bottom, #10B981 0%, #10B981 30%, #E5E7EB 30%, #E5E7EB 100%);
    margin: 8px 0;
}

.step-connector.start {
    height: 16px;
    background: #8B5CF6;
    margin-bottom: 12px;
    margin-top: 0;
}

.step-connector.end {
    height: 16px;
    background: linear-gradient(to bottom, #E5E7EB, #9CA3AF);
    margin-top: 8px;
    margin-bottom: 0;
}

.roadmap-node:hover {
    transform: translateY(-1px) scale(1.02);
}

.roadmap-node.current:hover {
    transform: translateY(-1px) scale(1.05);
}

@keyframes pulse-current {
    0%, 100% {
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.2);
    }
    50% {
        box-shadow: 0 0 0 8px rgba(245, 158, 11, 0.1);
    }
}

/* Mobile responsiveness */
@media (max-width: 400px) {
    .step-nodes {
        gap: 8px;
    }
    
    .roadmap-node {
        min-width: 75px;
        max-width: 80px;
        padding: 10px 8px;
    }
    
    .node-icon {
        font-size: 16px;
    }
    
    .node-title {
        font-size: 10px;
    }
    
    .node-subtitle {
        font-size: 8px;
    }
}
</style>

<script>
// Roadmap configurations
const roadmapConfigs = {
    frontend: {
        title: 'Frontend Developer',
        name: 'Frontend Developer',
        tech: 'HTML, CSS, JavaScript, React',
        duration: '6-8 Bulan',
        icon: 'ph-code',
        iconBg: 'from-orange-400 to-orange-600'
    },
    backend: {
        title: 'Backend Developer',
        name: 'Backend Developer', 
        tech: 'Node.js, Python, Database, APIs',
        duration: '8-10 Bulan',
        icon: 'ph-database',
        iconBg: 'from-blue-400 to-blue-600'
    },
    mobile: {
        title: 'Mobile Developer',
        name: 'Mobile Developer',
        tech: 'Flutter, React Native, Swift, Kotlin', 
        duration: '7-9 Bulan',
        icon: 'ph-device-mobile',
        iconBg: 'from-purple-400 to-purple-600'
    },
    devops: {
        title: 'DevOps Engineer',
        name: 'DevOps Engineer',
        tech: 'Docker, Kubernetes, AWS, CI/CD',
        duration: '10-12 Bulan', 
        icon: 'ph-gear',
        iconBg: 'from-green-400 to-green-600'
    },
    fullstack: {
        title: 'Fullstack Developer',
        name: 'Fullstack Developer',
        tech: 'Frontend + Backend + Database',
        duration: '12-15 Bulan',
        icon: 'ph-stack', 
        iconBg: 'from-pink-400 to-pink-600'
    },
    'ai-ml': {
        title: 'AI/ML Engineer',
        name: 'AI/ML Engineer',
        tech: 'Python, TensorFlow, PyTorch, Data Science',
        duration: '15-18 Bulan',
        icon: 'ph-brain',
        iconBg: 'from-indigo-400 to-indigo-600'
    }
};

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    // Get roadmap type from URL
    const pathArray = window.location.pathname.split('/');
    const roadmapType = pathArray[pathArray.length - 1];
    const config = roadmapConfigs[roadmapType] || roadmapConfigs.frontend;
    
    // Update page content dynamically
    document.getElementById('roadmap-title').textContent = config.title;
    document.getElementById('roadmap-name').textContent = config.name;
    document.getElementById('roadmap-tech').textContent = config.tech;
    document.getElementById('roadmap-duration').textContent = config.duration;
    
    // Update icon
    const iconElement = document.querySelector('#roadmap-icon i');
    iconElement.className = `ph ${config.icon} text-white text-xl`;
    document.getElementById('roadmap-icon').className = `w-12 h-12 bg-gradient-to-r ${config.iconBg} rounded-xl flex items-center justify-center`;
    
    // Node click handlers
    document.querySelectorAll('.roadmap-node[data-topic]').forEach(node => {
        node.addEventListener('click', function() {
            const topic = this.getAttribute('data-topic');
            
            if (this.classList.contains('current')) {
                // Continue current lesson
                console.log('Continue learning:', topic);
            } else if (this.classList.contains('pending')) {
                // Show locked message
                const message = 'Selesaikan topik sebelumnya untuk membuka ini!';
                alert(message);
            } else if (this.classList.contains('completed')) {
                // Review completed topic  
                console.log('Review topic:', topic);
            }
        });
    });
});
</script>
@endsection