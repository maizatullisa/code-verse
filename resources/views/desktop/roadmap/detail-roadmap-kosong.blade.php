@extends('desktop.layout.master-desktop')

@section('title', 'Roadmap Visual - Code Verse')

@section('page-title', 'Visual Roadmap')

@section('content')
{{-- Roadmap Data Structure --}}
@php
    $roadmapData = [
        'title' => 'Frontend Developer Roadmap',
        'description' => 'Complete path to becoming a Frontend Developer',
        'totalSteps' => 12,
        'estimatedTime' => '6-8 months',
        'difficulty' => 'Beginner to Advanced',
        
        'sections' => [
            [
                'id' => 'fundamentals',
                'title' => 'Web Fundamentals',
                'position' => ['x' => 50, 'y' => 10],
                'color' => 'from-blue-500 to-blue-600',
                'items' => [
                    [
                        'id' => 'internet',
                        'title' => 'How Internet Works',
                        'status' => 'available', // available, locked, completed
                        'position' => ['x' => 30, 'y' => 20],
                        'connections' => ['html']
                    ],
                    [
                        'id' => 'html',
                        'title' => 'HTML Basics',
                        'status' => 'available',
                        'position' => ['x' => 50, 'y' => 30],
                        'connections' => ['css']
                    ],
                    [
                        'id' => 'css',
                        'title' => 'CSS Fundamentals',
                        'status' => 'locked',
                        'position' => ['x' => 70, 'y' => 30],
                        'connections' => ['responsive']
                    ],
                    [
                        'id' => 'responsive',
                        'title' => 'Responsive Design',
                        'status' => 'locked',
                        'position' => ['x' => 50, 'y' => 45],
                        'connections' => ['javascript']
                    ]
                ]
            ],
            [
                'id' => 'programming',
                'title' => 'Programming Basics',
                'position' => ['x' => 50, 'y' => 55],
                'color' => 'from-yellow-500 to-orange-500',
                'items' => [
                    [
                        'id' => 'javascript',
                        'title' => 'JavaScript Basics',
                        'status' => 'locked',
                        'position' => ['x' => 30, 'y' => 65],
                        'connections' => ['dom', 'es6']
                    ],
                    [
                        'id' => 'dom',
                        'title' => 'DOM Manipulation',
                        'status' => 'locked',
                        'position' => ['x' => 15, 'y' => 80],
                        'connections' => ['frameworks']
                    ],
                    [
                        'id' => 'es6',
                        'title' => 'ES6+ Features',
                        'status' => 'locked',
                        'position' => ['x' => 45, 'y' => 80],
                        'connections' => ['frameworks']
                    ],
                    [
                        'id' => 'async',
                        'title' => 'Async Programming',
                        'status' => 'locked',
                        'position' => ['x' => 70, 'y' => 65],
                        'connections' => ['frameworks']
                    ]
                ]
            ],
            [
                'id' => 'advanced',
                'title' => 'Advanced Concepts',
                'position' => ['x' => 50, 'y' => 90],
                'color' => 'from-purple-500 to-pink-500',
                'items' => [
                    [
                        'id' => 'frameworks',
                        'title' => 'Choose Framework',
                        'status' => 'locked',
                        'position' => ['x' => 30, 'y' => 100],
                        'connections' => ['react', 'vue', 'tools']
                    ],
                    [
                        'id' => 'react',
                        'title' => 'React.js',
                        'status' => 'locked',
                        'position' => ['x' => 15, 'y' => 115],
                        'connections' => ['tools']
                    ],
                    [
                        'id' => 'vue',
                        'title' => 'Vue.js',
                        'status' => 'locked',
                        'position' => ['x' => 45, 'y' => 115],
                        'connections' => ['tools']
                    ],
                    [
                        'id' => 'tools',
                        'title' => 'Build Tools',
                        'status' => 'locked',
                        'position' => ['x' => 70, 'y' => 100],
                        'connections' => ['testing']
                    ],
                    [
                        'id' => 'testing',
                        'title' => 'Testing',
                        'status' => 'locked',
                        'position' => ['x' => 50, 'y' => 130],
                        'connections' => []
                    ]
                ]
            ]
        ]
    ];
@endphp

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    {{-- Header --}}
    <div class="bg-white/80 backdrop-blur-sm border-b border-white/20 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ url('/roadmap') }}" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            {{ $roadmapData['title'] }}
                        </h1>
                        <p class="text-gray-600 text-sm">{{ $roadmapData['description'] }}</p>
                    </div>
                </div>
                
                {{-- Progress & Actions --}}
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <div class="text-sm font-medium text-gray-700">Progress</div>
                        <div class="text-2xl font-bold text-blue-600">0/{{ $roadmapData['totalSteps'] }}</div>
                    </div>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Download PDF
                        </button>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                            Share
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Roadmap Info Cards --}}
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Duration</div>
                        <div class="text-sm text-gray-600">{{ $roadmapData['estimatedTime'] }}</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Steps</div>
                        <div class="text-sm text-gray-600">{{ $roadmapData['totalSteps'] }} topics</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-purple-100 rounded-lg">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Level</div>
                        <div class="text-sm text-gray-600">{{ $roadmapData['difficulty'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Visual Roadmap Container --}}
        <div class="bg-white/40 backdrop-blur-sm rounded-2xl border border-white/20 p-8 overflow-hidden">
            <div id="roadmap-container" class="relative" style="height: 1400px; background: radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.1) 0%, transparent 50%), radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.1) 0%, transparent 50%);">
                
                {{-- Connection Lines (SVG) --}}
                <svg class="absolute inset-0 w-full h-full pointer-events-none" style="z-index: 1;">
                    <defs>
                        <linearGradient id="connectionGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:0.3" />
                            <stop offset="100%" style="stop-color:#8B5CF6;stop-opacity:0.3" />
                        </linearGradient>
                        <marker id="arrowhead" markerWidth="10" markerHeight="7" refX="9" refY="3.5" orient="auto">
                            <polygon points="0 0, 10 3.5, 0 7" fill="#6366F1" opacity="0.6" />
                        </marker>
                    </defs>
                    
                    {{-- Generate connection lines --}}
                    @foreach($roadmapData['sections'] as $section)
                        @foreach($section['items'] as $item)
                            @foreach($item['connections'] as $connectionId)
                                @php
                                    // Find target item position
                                    $targetItem = null;
                                    foreach($roadmapData['sections'] as $targetSection) {
                                        foreach($targetSection['items'] as $targetCandidate) {
                                            if($targetCandidate['id'] === $connectionId) {
                                                $targetItem = $targetCandidate;
                                                break 2;
                                            }
                                        }
                                    }
                                @endphp
                                @if($targetItem)
                                    <path d="M {{ $item['position']['x'] * 10 + 100 }} {{ $item['position']['y'] * 10 + 50 }} 
                                             Q {{ ($item['position']['x'] + $targetItem['position']['x']) * 5 + 100 }} {{ ($item['position']['y'] + $targetItem['position']['y']) * 5 }} 
                                             {{ $targetItem['position']['x'] * 10 + 100 }} {{ $targetItem['position']['y'] * 10 + 50 }}"
                                          stroke="url(#connectionGradient)" 
                                          stroke-width="2" 
                                          fill="none"
                                          stroke-dasharray="5,5"
                                          marker-end="url(#arrowhead)"
                                          class="connection-line">
                                    </path>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </svg>

                {{-- Roadmap Nodes --}}
                @foreach($roadmapData['sections'] as $sectionIndex => $section)
                    {{-- Section Title --}}
                    <div class="absolute transform -translate-x-1/2 -translate-y-1/2 z-10" 
                         style="left: {{ $section['position']['x'] }}%; top: {{ $section['position']['y'] }}%;">
                        <div class="bg-gradient-to-r {{ $section['color'] }} text-white px-6 py-2 rounded-full shadow-lg font-bold text-sm">
                            {{ $section['title'] }}
                        </div>
                    </div>

                    {{-- Section Items --}}
                    @foreach($section['items'] as $itemIndex => $item)
                        <div class="absolute transform -translate-x-1/2 -translate-y-1/2 z-20 roadmap-node" 
                             style="left: {{ $item['position']['x'] }}%; top: {{ $item['position']['y'] }}%;"
                             data-item-id="{{ $item['id'] }}"
                             data-status="{{ $item['status'] }}">
                            
                            {{-- Node Button --}}
                            <button class="roadmap-item group relative
                                @if($item['status'] === 'completed') bg-gradient-to-r from-green-500 to-emerald-500 shadow-green-200 border-green-300
                                @elseif($item['status'] === 'available') bg-gradient-to-r from-blue-500 to-purple-500 shadow-blue-200 border-blue-300 hover:shadow-xl hover:scale-105
                                @else bg-gray-300 cursor-not-allowed shadow-gray-200 border-gray-400
                                @endif
                                w-32 h-16 rounded-xl shadow-lg border-2 transition-all duration-300 flex items-center justify-center text-white font-semibold text-sm text-center leading-tight
                                {{ $item['status'] === 'available' ? 'hover:shadow-2xl hover:-translate-y-1' : '' }}">
                                
                                {{-- Status Icon --}}
                                <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full flex items-center justify-center text-xs">
                                    @if($item['status'] === 'completed')
                                        <div class="bg-green-500 text-white rounded-full w-full h-full flex items-center justify-center">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    @elseif($item['status'] === 'locked')
                                        <div class="bg-gray-500 text-white rounded-full w-full h-full flex items-center justify-center">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="bg-white/20 text-white rounded-full w-full h-full flex items-center justify-center">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                {{ $item['title'] }}
                            </button>

                            {{-- Tooltip on Hover --}}
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-30">
                                <div class="bg-gray-900 text-white text-xs rounded-lg py-2 px-3 whitespace-nowrap shadow-xl">
                                    {{ $item['title'] }}
                                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-t-gray-900"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

                {{-- Decorative Elements --}}
                <div class="absolute top-4 right-4 opacity-10">
                    <svg class="w-32 h-32 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                
                <div class="absolute bottom-4 left-4 opacity-10">
                    <svg class="w-24 h-24 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Legend --}}
        <div class="mt-6 bg-white/60 backdrop-blur-sm rounded-xl p-6 border border-white/20">
            <h3 class="font-bold text-gray-900 mb-4">Legend</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg"></div>
                    <span class="text-sm text-gray-700">Available to learn</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg"></div>
                    <span class="text-sm text-gray-700">Completed</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gray-300 rounded-lg"></div>
                    <span class="text-sm text-gray-700">Locked (complete prerequisites first)</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Interactive JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add click handlers to roadmap items
    document.querySelectorAll('.roadmap-item').forEach(item => {
        item.addEventListener('click', function() {
            const status = this.closest('.roadmap-node').dataset.status;
            const itemId = this.closest('.roadmap-node').dataset.itemId;
            
            if (status === 'available') {
                // Handle available item click
                console.log('Starting:', itemId);
                // You can add navigation or modal logic here
                // window.location.href = `/learn/${itemId}`;
                
                // Show a simple notification for demo
                showNotification(`Starting: ${itemId.replace('-', ' ').toUpperCase()}`, 'info');
            } else if (status === 'locked') {
                showNotification('Complete prerequisites first!', 'warning');
            } else if (status === 'completed') {
                showNotification('Already completed! Review materials?', 'success');
            }
        });
    });
    
    // Simple notification function
    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'warning' ? 'bg-yellow-500 text-white' :
            'bg-blue-500 text-white'
        }`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Animate out and remove
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Add subtle animations to connection lines
    document.querySelectorAll('.connection-line').forEach((line, index) => {
        line.style.animationDelay = `${index * 0.1}s`;
        line.classList.add('animate-draw-line');
    });
});
</script>

<style>
/* Custom animations */
@keyframes draw-line {
    0% {
        stroke-dasharray: 0, 1000;
    }
    100% {
        stroke-dasharray: 1000, 1000;
    }
}

.animate-draw-line {
    animation: draw-line 2s ease-in-out;
}

/* Roadmap specific styles */
.roadmap-node:hover .connection-line {
    stroke-opacity: 0.8;
    stroke-width: 3;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    #roadmap-container {
        height: 1200px;
        transform: scale(0.8);
        transform-origin: top left;
    }
    
    .roadmap-item {
        width: 28px !important;
        height: 14px !important;
        font-size: 10px !important;
    }
}

/* Hover effects for available items */
.roadmap-item[data-status="available"]:hover {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    transform: translateY(-2px) scale(1.05);
}

/* Pulse animation for available items */
.roadmap-node[data-status="available"] .roadmap-item::before {
    content: '';
    position: absolute;
    top: -4px;
    left: -4px;
    right: -4px;
    bottom: -4px;
    background: inherit;
    border-radius: inherit;
    opacity: 0;
    animation: pulse-ring 2s infinite;
    z-index: -1;
}

@keyframes pulse-ring {
    0% {
        transform: scale(1);
        opacity: 0.3;
    }
    100% {
        transform: scale(1.2);
        opacity: 0;
    }
}
</style>
@endsection