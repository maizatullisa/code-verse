@extends('desktop.layout.master-desktop')

@section('title', 'Code Verse - Profil Saya')

@section('page-title', 'Profil Saya')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="min-h-screen relative z-10">
    
    <!-- Profile Header -->
    <div class="bg-gray-900/95 backdrop-blur-md rounded-2xl p-8 mb-8 shadow-2xl border border-gray-700">
        <div class="flex flex-col lg:flex-row items-start lg:items-center space-y-6 lg:space-y-0 lg:space-x-8">
            
            <!-- Avatar -->
            <div class="flex-shrink-0">
            <div class="w-24 h-24 rounded-full overflow-hidden shadow-lg relative">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Foto Profil" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-p1 to-p2 flex items-center justify-center text-white text-2xl font-bold">
                        {{ strtoupper(substr($user->first_name, 0, 1)) }}
                    </div>
                @endif
                <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
            </div>
        </div>


            <!-- User Info -->
            <div class="flex-1">  
                <h2 class="text-3xl font-bold text-white mb-2">{{$user->first_name }}</h2>
                <p class="text-gray-300 mb-1">{{ $user->email }}</p>
                <p class="text-gray-400 text-sm mb-4">Bergabung sejak: {{ $user->created_at->format('d M Y') }}</p>
                
                <div class="flex flex-wrap gap-3">
                    <span class="bg-blue-600/90 text-blue-100 border border-blue-500 px-3 py-1 rounded-full text-sm font-medium backdrop-blur-sm">
                        <i class="ph ph-star mr-1"></i>Level: {{-- User level --}}
                    </span>
                    <a href="{{ url('/games/pilih-game') }}" 
                        class="bg-red-600/90 text-red-100 border border-red-500 px-3 py-1 rounded-full text-sm font-medium backdrop-blur-sm inline-flex items-center hover:bg-red-600 transition-colors">
                            <i class="ph ph-fire mr-1"></i> Game
                    </a>

                    <a href="{{ route('user.profile.edit') }}"
                    class="bg-green-600/90 text-green-100 border border-green-500 px-3 py-1 rounded-full text-sm font-medium backdrop-blur-sm inline-flex items-center hover:bg-green-700 transition-colors">
                    <i class="ph ph-pencil mr-1"></i> Edit Profil
                    </a>
                        

                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 w-full lg:w-auto">
                <div class="text-center p-4 bg-blue-700/90 backdrop-blur-sm rounded-lg border border-blue-600">
                    <div class="text-2xl font-bold text-blue-100">{{-- Total classes --}}</div>
                    <div class="text-sm text-gray-300">Kelas</div>
                </div>
                <div class="text-center p-4 bg-green-700/90 backdrop-blur-sm rounded-lg border border-green-600">
                    <div class="text-2xl font-bold text-green-100">{{-- Total certificates --}}</div>
                    <div class="text-sm text-gray-300">Sertifikat</div>
                </div>
                <div class="text-center p-4 bg-yellow-700/90 backdrop-blur-sm rounded-lg border border-yellow-600">
                    <div class="text-2xl font-bold text-yellow-100">{{-- Total badges --}}</div>
                    <div class="text-sm text-gray-300">Lencana</div>
                </div>
                <div class="text-center p-4 bg-purple-700/90 backdrop-blur-sm rounded-lg border border-purple-600">
                    <div class="text-2xl font-bold text-purple-100">{{-- Total hours --}}</div>
                    <div class="text-sm text-gray-300">Jam</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid lg:grid-cols-3 gap-8">
        
        <!-- Progress Kelas -->
        <div class="lg:col-span-2 bg-gray-900/95 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-gray-700">
            <div class="flex items-center mb-6">
                <i class="ph ph-chart-line text-blue-400 mr-3 text-xl"></i>
                <h3 class="text-xl font-bold text-white">Progress Kelas</h3>
            </div>
            
            <div class="space-y-4">
                {{-- Loop through user enrolled classes --}}
                {{-- @foreach($enrolledClasses as $class) --}}
                <div class="bg-blue-800/90 backdrop-blur-sm p-4 rounded-xl border border-blue-600">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-semibold text-white">{{-- $class->name --}}</h4>
                        <span class="text-blue-200 font-bold">{{-- $class->progress_percentage --}}%</span>
                    </div>
                    <div class="w-full bg-blue-900/80 rounded-full h-2 mb-2">
                        <div class="bg-gradient-to-r from-blue-400 to-blue-500 h-2 rounded-full progress-bar" data-width="{{-- $class->progress_percentage --}}%"></div>
                    </div>
                    <div class="flex justify-between text-sm text-gray-300">
                        <span>Estimasi: {{-- $class->estimated_remaining_hours --}} jam lagi</span>
                        <span>Modul {{-- $class->completed_modules --}}/{{-- $class->total_modules --}}</span>
                    </div>
                </div>
                {{-- @endforeach --}}

                {{-- If no enrolled classes --}}
                {{-- @if($enrolledClasses->isEmpty()) --}}
                <div class="text-center py-8">
                    <i class="ph ph-book text-gray-400 text-4xl mb-4"></i>
                    <p class="text-gray-300">Belum ada kelas yang diambil</p>
                    <a href="{{-- route('classes.index') --}}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                        Jelajahi Kelas
                    </a>
                </div>
                {{-- @endif --}}
            </div>
        </div>

        <!-- Sertifikat -->
        <div class="bg-gray-900/95 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-gray-700">
            <div class="flex items-center mb-6">
                <i class="ph ph-certificate text-green-400 mr-3 text-xl"></i>
                <h3 class="text-xl font-bold text-white">Sertifikat</h3>
            </div>

            <div class="space-y-3">
                {{-- Loop through user certificates --}}
                {{-- @foreach($certificates as $certificate) --}}
                <div class="bg-green-800/90 backdrop-blur-sm p-4 rounded-lg border border-green-600 hover:bg-green-700/90 transition-all duration-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-semibold text-white text-sm">{{-- $certificate->course_name --}}</h4>
                            <p class="text-gray-300 text-xs">{{-- $certificate->issued_date --}}</p>
                            <p class="text-green-200 text-xs font-medium">Durasi: {{-- $certificate->duration --}}</p>
                        </div>
                        <a href="{{-- route('certificates.download', $certificate->id) --}}" class="text-green-300 cursor-pointer hover:text-green-200">
                            <i class="ph ph-download"></i>
                        </a>
                    </div>
                </div>
                {{-- @endforeach --}}

                {{-- If no certificates --}}
                {{-- @if($certificates->isEmpty()) --}}
                <div class="text-center py-8">
                    <i class="ph ph-certificate text-gray-400 text-3xl mb-4"></i>
                    <p class="text-gray-300 text-sm">Belum ada sertifikat</p>
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>

    <!-- Lencana & Achievement -->
    <div class="mt-8 bg-gray-900/95 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-gray-700">
        <div class="flex items-center mb-6">
            <i class="ph-fill ph-trophy text-yellow-400 mr-3 text-xl"></i>
            <h3 class="text-xl font-bold text-white">Lencana & Pencapaian</h3>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
            {{-- Loop through user badges --}}
            {{-- @foreach($badges as $badge) --}}
            <div class="bg-gradient-to-br from-{{-- $badge->color --}}-500 to-{{-- $badge->color --}}-600 p-4 rounded-xl text-center text-white shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 cursor-pointer border border-{{-- $badge->color --}}-400"> 
                <i class="ph ph-{{-- $badge->icon --}} text-2xl mb-2"></i>
                <div class="font-semibold text-xs">{{-- $badge->name --}}</div>
                <div class="text-xs opacity-90">{{-- $badge->description --}}</div>
            </div>
            {{-- @endforeach --}}

            {{-- If no badges --}}
            {{-- @if($badges->isEmpty()) --}}
            <div class="col-span-full text-center py-8">
                <i class="ph ph-trophy text-gray-400 text-4xl mb-4"></i>
                <p class="text-gray-300">Belum ada lencana yang diperoleh</p>
            </div>
            {{-- @endif --}}
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-8 flex flex-wrap justify-center gap-4">
        <a href="{{-- route('dashboard') --}}" class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2 border border-blue-600">
            <i class="ph ph-house"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{-- route('classes.index') --}}" class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2 border border-green-600">
            <i class="ph ph-book"></i>
            <span>Jelajahi Kelas</span>
        </a>
        <a href="{{-- route('profile.edit') --}}" class="bg-purple-700 hover:bg-purple-800 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2 border border-purple-600">
            <i class="ph ph-gear"></i>
            <span>Edit Profil</span>
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const progressBars = document.querySelectorAll('.progress-bar');
        
        setTimeout(() => {
            progressBars.forEach(bar => {
                const width = bar.getAttribute('data-width');
                bar.style.width = width;
            });
        }, 500);
    });
</script>
@endsection