@extends('mobile.layout.master')

@section('title', 'Roadmap - Code Verse')

@section('content')
<!-- BACKGROUND ELEMENTS START -->
<img src="assets/images/header-bg-1.png" alt="" class="absolute top-0 left-0 right-0 -mt-6" />
<div class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px]"></div>
<div class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px]"></div>
<div class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px]"></div>
<div class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px]"></div>
<!-- BACKGROUND ELEMENTS END -->

<!-- Page Title Start -->
<div class="relative z-10 pb-20">
    <div class="flex justify-between items-center gap-4 px-6 relative z-20">
        <div class="flex justify-start items-center gap-2">
            <a href="{{ url('/') }}" class="text-2xl text-white !leading-none">
                <i class="ph ph-arrow-left"></i>
            </a>
            <h2 class="text-2xl font-semibold text-white">Learning Roadmap</h2>
        </div>
        <div class="flex justify-start items-center gap-2">
            <a href="#" class="text-white border border-color24 p-2 rounded-full flex justify-center items-center bg-color24">
                <i class="ph ph-bell"></i>
            </a>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Search Box Start -->
    <div class="flex justify-between items-center gap-3 pt-8 px-6 relative z-20">
        <div class="flex justify-start items-center gap-3 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
            <i class="ph ph-magnifying-glass"></i>
            <input type="text" placeholder="Cari Roadmap..." class="bg-transparent text-white placeholder-white w-full text-xs outline-none" />
        </div>
        <div class="bg-color24 border border-color24 p-4 rounded-full text-white flex justify-center items-center">
            <i class="ph ph-sliders-horizontal"></i>
        </div>
    </div>
    <!-- Search Box End -->

    <!-- Hero Section -->
    <div class="px-6 pt-8">
        <div class="text-center text-white">
            <h3 class="text-lg font-semibold mb-2">Pilih Path Learning Anda</h3>
            <p class="text-sm opacity-80">Temukan roadmap pembelajaran yang sesuai dengan tujuan karir Anda</p>
        </div>
    </div>

    <!-- Categories -->
    <div class="px-6 pt-8">
        <div class="flex gap-3 overflow-x-auto pb-4">
            <button class="bg-p2 text-white px-4 py-2 rounded-full text-xs whitespace-nowrap font-semibold">Semua</button>
            <button class="bg-color24 text-white px-4 py-2 rounded-full text-xs whitespace-nowrap">Frontend</button>
            <button class="bg-color24 text-white px-4 py-2 rounded-full text-xs whitespace-nowrap">Backend</button>
            <button class="bg-color24 text-white px-4 py-2 rounded-full text-xs whitespace-nowrap">Mobile</button>
            <button class="bg-color24 text-white px-4 py-2 rounded-full text-xs whitespace-nowrap">DevOps</button>
        </div>
    </div>

    <!-- Roadmap Cards -->
    <div class="px-6 pt-6">
        <div class="grid gap-4">
            <!-- Frontend Roadmap -->
            <a href="{{ url('/detail-roadmap-mobile/frontend') }}" class="bg-white dark:bg-color10 rounded-2xl p-5 shadow2 border border-black border-opacity-10 dark:border-color24">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-orange-400 to-orange-600 p-3 rounded-xl">
                        <i class="ph ph-code text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-lg mb-1">Frontend Developer</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">HTML, CSS, JavaScript, React, Vue</p>
                        <div class="flex items-center gap-4 text-xs">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-clock text-p2"></i>
                                <span>6-8 Bulan</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-users text-p2"></i>
                                <span>2.4k Learners</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-400 px-2 py-1 rounded-full text-xs font-medium">
                        Beginner
                    </div>
                </div>
            </a>

            <!-- Backend Roadmap -->
            <a href="{{ url('/detail-roadmap-mobile/backend') }}" class="bg-white dark:bg-color10 rounded-2xl p-5 shadow2 border border-black border-opacity-10 dark:border-color24">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-blue-400 to-blue-600 p-3 rounded-xl">
                        <i class="ph ph-database text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-lg mb-1">Backend Developer</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Node.js, Python, Java, Databases</p>
                        <div class="flex items-center gap-4 text-xs">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-clock text-p2"></i>
                                <span>8-10 Bulan</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-users text-p2"></i>
                                <span>1.8k Learners</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-400 px-2 py-1 rounded-full text-xs font-medium">
                        Intermediate
                    </div>
                </div>
            </a>

            <!-- Mobile Developer Roadmap -->
            <a href="{{ url('/detail-roadmap-mobile/mobile') }}" class="bg-white dark:bg-color10 rounded-2xl p-5 shadow2 border border-black border-opacity-10 dark:border-color24">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-purple-400 to-purple-600 p-3 rounded-xl">
                        <i class="ph ph-device-mobile text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-lg mb-1">Mobile Developer</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Flutter, React Native, Swift, Kotlin</p>
                        <div class="flex items-center gap-4 text-xs">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-clock text-p2"></i>
                                <span>7-9 Bulan</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-users text-p2"></i>
                                <span>1.2k Learners</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-400 px-2 py-1 rounded-full text-xs font-medium">
                        Beginner
                    </div>
                </div>
            </a>

            <!-- DevOps Roadmap -->
            <a href="{{ url('/detail-roadmap-mobile/devops') }}" class="bg-white dark:bg-color10 rounded-2xl p-5 shadow2 border border-black border-opacity-10 dark:border-color24">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-green-400 to-green-600 p-3 rounded-xl">
                        <i class="ph ph-gear text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-lg mb-1">DevOps Engineer</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Docker, Kubernetes, AWS, CI/CD</p>
                        <div class="flex items-center gap-4 text-xs">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-clock text-p2"></i>
                                <span>10-12 Bulan</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-users text-p2"></i>
                                <span>890 Learners</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-400 px-2 py-1 rounded-full text-xs font-medium">
                        Advanced
                    </div>
                </div>
            </a>

            <!-- Fullstack Roadmap -->
            <a href="{{ url('/detail-roadmap-mobile/fullstack') }}" class="bg-white dark:bg-color10 rounded-2xl p-5 shadow2 border border-black border-opacity-10 dark:border-color24">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-pink-400 to-pink-600 p-3 rounded-xl">
                        <i class="ph ph-stack text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-lg mb-1">Fullstack Developer</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Frontend + Backend + Database</p>
                        <div class="flex items-center gap-4 text-xs">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-clock text-p2"></i>
                                <span>12-15 Bulan</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-users text-p2"></i>
                                <span>3.1k Learners</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-400 px-2 py-1 rounded-full text-xs font-medium">
                        Intermediate
                    </div>
                </div>
            </a>

            <!-- AI/ML Roadmap -->
            <a href="{{ url('/detail-roadmap-mobile/ai-ml') }}" class="bg-white dark:bg-color10 rounded-2xl p-5 shadow2 border border-black border-opacity-10 dark:border-color24">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-r from-indigo-400 to-indigo-600 p-3 rounded-xl">
                        <i class="ph ph-brain text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-lg mb-1">AI/ML Engineer</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Python, TensorFlow, PyTorch, Data Science</p>
                        <div class="flex items-center gap-4 text-xs">
                            <div class="flex items-center gap-1">
                                <i class="ph ph-clock text-p2"></i>
                                <span>15-18 Bulan</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="ph ph-users text-p2"></i>
                                <span>750 Learners</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-400 px-2 py-1 rounded-full text-xs font-medium">
                        Advanced
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Popular Tags -->
    <div class="px-6 pt-8">
        <h4 class="text-white font-semibold mb-4">Tags Populer</h4>
        <div class="flex flex-wrap gap-2">
            <span class="bg-color24 text-white px-3 py-1 rounded-full text-xs">JavaScript</span>
            <span class="bg-color24 text-white px-3 py-1 rounded-full text-xs">Python</span>
            <span class="bg-color24 text-white px-3 py-1 rounded-full text-xs">React</span>
            <span class="bg-color24 text-white px-3 py-1 rounded-full text-xs">Node.js</span>
            <span class="bg-color24 text-white px-3 py-1 rounded-full text-xs">Docker</span>
            <span class="bg-color24 text-white px-3 py-1 rounded-full text-xs">AWS</span>
            <span class="bg-color24 text-white px-3 py-1 rounded-full text-xs">Flutter</span>
            <span class="bg-color24 text-white px-3 py-1 rounded-full text-xs">Vue.js</span>
        </div>
    </div>
</div>
@endsection