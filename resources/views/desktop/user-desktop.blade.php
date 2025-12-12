@extends('desktop.layout.master-desktop')

@section('title', 'Code Verse - Profil Saya')

@section('page-title', 'Profil Saya')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="min-h-screen relative z-10 px-4 sm:px-6 lg:px-8">
    
    <!-- Profile Header -->
    <div class="bg-sky-100 backdrop-blur-md rounded-2xl p-4 sm:p-6 lg:p-8 mb-6 lg:mb-8 shadow-2xl border border-sky-100">
        <div class="flex flex-col lg:flex-row items-center lg:items-start space-y-4 sm:space-y-6 lg:space-y-0 lg:space-x-8">
            
            <!-- Avatar -->
            <div class="flex-shrink-0">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full shadow-lg relative">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Foto Profil" class="w-full h-full object-cover rounded-full">
                    @else
                    <div class="text-black w-full h-full bg-gradient-to-r from-p1 to-p2 flex items-center justify-center text-xl sm:text-2xl font-bold rounded-full">
                            {{ strtoupper(substr($user->first_name, 0, 1)) }}
                        </div>
                    @endif
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 sm:w-6 sm:h-6 bg-green-500 rounded-full border-2 border-white"></div>
                </div>
            </div>

            <!-- User Info -->
            <div class="flex-1 text-center lg:text-left">  
                <h2 class="text-2xl sm:text-3xl font-bold text-black mb-2">{{$user->first_name }}</h2>
                <p class="text-black mb-1 text-sm sm:text-base">{{ $user->email }}</p>
                <p class="text-black text-xs sm:text-sm mb-4">Bergabung sejak: {{ $user->created_at->format('d M Y') }}</p> 
                
                <div class="flex flex-wrap justify-center lg:justify-start gap-2 sm:gap-3">
                    <a href="{{ url('/games/pilih-game') }}" 
                        class="bg-red-600/90 text-red-100 border border-red-500 px-3 py-1 rounded-full text-xs sm:text-sm font-medium backdrop-blur-sm inline-flex items-center hover:bg-red-600 transition-colors">
                            <i class="ph ph-fire mr-1"></i> Game
                    </a>

                    <a href="{{ route('user.profile.edit') }}"
                    class="bg-green-600/90 text-green-100 border border-green-500 px-3 py-1 rounded-full text-xs sm:text-sm font-medium backdrop-blur-sm inline-flex items-center hover:bg-green-700 transition-colors">
                    <i class="ph ph-pencil mr-1"></i> Edit Profil
                    </a>
                </div>
            </div>

            <!-- Quick Stats - Hidden for now -->
            <div class="hidden grid-cols-2 lg:grid-cols-4 gap-4 w-full lg:w-auto">
                <!-- Stats content commented out in original -->
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid lg:grid-cols-3 gap-6 lg:gap-8">
        
        <!-- Progress Kelas -->
        <div class="lg:col-span-2 bg-sky-100 backdrop-blur-md rounded-2xl p-4 sm:p-6 shadow-2xl border border-sky-100">
            <div class="flex items-center mb-4 sm:mb-6">
                <i class="ph ph-chart-line text-blue-400 mr-3 text-lg sm:text-xl"></i>
                <h3 class="text-lg sm:text-xl font-bold text-black">Progress Kelas</h3>
            </div>
            
            <div class="space-y-3 sm:space-y-4">
            @forelse($kelasList as $kelas)
                @php
                    $materiIds = $kelas->materis->pluck('id');
                    $completedCount = \App\Models\UserMateriProgress::where('user_id', $user->id)
                        ->whereIn('materi_id', $materiIds)
                        ->where('status', 'completed')
                        ->count();
                    $totalCount = $materiIds->count();
                    $progress = $totalCount > 0 ? round(($completedCount / $totalCount) * 100) : 0;
                @endphp

                <div class="bg-blue-800/90 backdrop-blur-sm p-3 sm:p-4 rounded-xl border border-blue-600">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-semibold text-white text-sm sm:text-base">{{ $kelas->nama_kelas }}</h4>
                        <span class="text-blue-200 font-bold text-sm sm:text-base">{{ $progress }}%</span>
                    </div>

                    <div class="w-full bg-blue-900/80 rounded-full h-2 mb-2">
                        <div class="bg-gradient-to-r from-blue-400 to-blue-500 h-2 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:justify-between text-xs sm:text-sm text-gray-300 space-y-1 sm:space-y-0">
                        <span>Modul {{ $completedCount }}/{{ $totalCount }}</span>
                    </div>
                </div>
            @empty
                <div class="text-center py-6 sm:py-8">
                    <i class="ph ph-book text-black text-3xl sm:text-4xl mb-4"></i>
                    <p class="text-black text-sm sm:text-base mb-4">Belum ada kelas yang diambil</p>
                    <a href="{{ route('kelas.ditawarkan') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors text-sm sm:text-base">
                        Jelajahi Kelas
                    </a>
                </div>
            @endforelse
            </div>
        </div>

        <!-- Sertifikat -->
        <div class="bg-sky-100 backdrop-blur-md rounded-2xl p-4 sm:p-6 shadow-2xl border border-sky-100">
            <div class="flex items-center mb-4 sm:mb-6">
                <i class="ph ph-certificate text-black mr-3 text-lg sm:text-xl"></i>
                <h3 class="text-lg sm:text-xl font-bold text-black">Sertifikat</h3>
            </div>

            <div class="space-y-3">
            @forelse ($certificates as $certificate)
                <div class="bg-green-800/90 backdrop-blur-sm p-3 sm:p-4 rounded-lg border border-green-600 hover:bg-green-700/90 transition-all duration-200">
                    <div class="flex justify-between items-start">
                        <div class="flex-1 pr-2">
                            <h4 class="font-semibold text-white text-xs sm:text-sm leading-tight">
                                {{ $certificate->kelas->nama_kelas ?? '-' }}
                            </h4>
                            <p class="text-green-200 text-xs mt-1">
                                No: {{ $certificate->certificate_number }}
                            </p>
                        </div>
                        <a href="{{ route('desktop.pages.sertifikat.form-sertif', $certificate->kelas->id) }}', $certificate->filename) }}"
                        class="text-green-300 hover:text-green-100 flex-shrink-0">
                            <i class="ph ph-download text-lg"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center py-6 sm:py-8">
                    <i class="ph ph-certificate text-gray-400 text-2xl sm:text-3xl mb-4"></i>
                    <p class="text-black text-xs sm:text-sm">Belum ada sertifikat</p>
                </div>
            @endforelse
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 lg:mt-8 flex flex-col sm:flex-row justify-center gap-3 sm:gap-4">
        <a href="{{route('desktop.dashboard-user-desktop')}}" class="bg-blue-700 hover:bg-blue-800 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center space-x-2 border border-blue-600 text-sm sm:text-base">
            <i class="ph ph-house"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{route('kelas.ditawarkan')}}" class="bg-green-700 hover:bg-green-800 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center space-x-2 border border-green-600 text-sm sm:text-base">
            <i class="ph ph-book"></i>
            <span>Jelajahi Kelas</span>
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