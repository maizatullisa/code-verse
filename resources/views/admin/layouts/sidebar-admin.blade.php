<div class="w-72 bg-white h-screen border-r border-gray-200 shadow-sm">
    <div class="bg-blue-950  h-full flex flex-col">
        <!-- Logo Section -->
        <div class="p-6 border-b border-gray-700">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white">Admin</h2>
            </div>
            <p class="text-sm text-gray-300 ml-13">Management Portal</p>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2">
            @php
                if (!function_exists('activeSidebar')) {
                    function activeSidebar($routeName) {
                        return request()->routeIs($routeName) ? 'bg-blue-600 text-white font-semibold shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
                    }
                }
            @endphp

            <a href="{{ route('admin.dashboard') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 {{ activeSidebar('admin.dashboard') }}">
                <div class="w-8 h-8 bg-gray-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('admin.user.index') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 {{ activeSidebar('admin.user.index') }}">
                <div class="w-8 h-8 bg-gray-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
                <span class="font-medium">Users</span>
            </a>

            <a href="{{ route('admin.pengajar.index') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 {{ activeSidebar('admin.pengajar.index') }}">
                <div class="w-8 h-8 bg-gray-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="font-medium">Pengajar</span>
            </a>

            <a href="{{ route('admin.kelas.index') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 {{ activeSidebar('admin.kelas.index') }}">
                <div class="w-8 h-8 bg-gray-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <span class="font-medium">Kelas</span>
            </a>

            <a href="{{ route('admin.quiz.index') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 {{ activeSidebar('admin.quiz.index') }}">
                <div class="w-8 h-8 bg-gray-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
                <span class="font-medium">Quiz</span>
            </a>

            <a href="{{ route('admin.sertifikat.index') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-200 {{ activeSidebar('admin.sertifikat.index') }}">
                <div class="w-8 h-8 bg-gray-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <span class="font-medium">Sertifikat</span>
            </a>
        </nav>

        <!-- Bottom Section -->
        <div class="mt-auto p-4 border-t border-gray-700">
            
        </div>
    </div>
</div>