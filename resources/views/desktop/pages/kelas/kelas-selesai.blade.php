@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Selesai - Code Verse')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('page-title', 'Kelas Selesai')

@section('content')
    <!-- Hero Section with Background -->
    <div class="bg-blue-700 relative overflow-hidden mb-6 sm:mb-8 rounded-xl mx-4 sm:mx-0">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0">
            <div class="absolute top-4 sm:top-10 left-4 sm:left-10 w-16 sm:w-32 h-16 sm:h-32 bg-white/10 rounded-full blur-xl"></div>
            <div class="absolute bottom-4 sm:bottom-10 right-4 sm:right-10 w-12 sm:w-24 h-12 sm:h-24 bg-pink-300/20 rounded-full blur-lg"></div>
            <div class="absolute top-1/2 left-1/3 w-8 sm:w-16 h-8 sm:h-16 bg-yellow-300/15 rounded-full blur-md"></div>
        </div>
        
        <div class="relative z-10 py-8 sm:py-12 px-4 sm:px-6 flex flex-col space-y-4 sm:space-y-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-2xl sm:text-3xl font-bold mb-2 sm:mb-4">Kelas yang Telah Diselesaikan</h1>
                <p class="text-base sm:text-lg opacity-90">Lihat kembali pencapaian pembelajaran Anda</p>
            </div>

            <!-- Tab Navigation -->
            <div class="px-0 sm:px-6 mb-6 sm:mb-8">
                <div class="max-w-4xl mx-auto">
                    <div class="flex justify-center items-center gap-1 sm:gap-2 bg-white rounded-xl sm:rounded-2xl p-1 sm:p-2 shadow-lg border border-gray-100">
                        <a href="{{ route('kelas.index') }}" 
                           class="text-gray-600 px-4 sm:px-8 py-2 sm:py-3 rounded-lg sm:rounded-xl font-semibold text-xs sm:text-sm hover:bg-gray-50 transition-all flex-1 sm:flex-none text-center">
                            <span class="hidden sm:inline"> </span>Diambil
                        </a>
                        <a href="{{ route('kelas.selesai') }}"  
                           class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 sm:px-8 py-2 sm:py-3 rounded-lg sm:rounded-xl font-semibold text-xs sm:text-sm transition-all shadow-md flex-1 sm:flex-none text-center">
                            <span class="hidden sm:inline"> </span>Selesai
                        </a>
                    </div>
                </div>
            </div>

            <!-- Completed Classes List -->
            <div class="px-4 sm:px-6 mb-12 sm:mb-20">
                <div class="max-w-4xl mx-auto">
                    <div class="space-y-3 sm:space-y-4" id="completed-kelas-container">
                        @if(isset($kelasList) && count($kelasList) > 0)
                            @foreach($kelasList as $kelas)
                                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg sm:shadow-xl border border-gray-100 hover:shadow-xl sm:hover:shadow-2xl transition-all duration-300 border-l-4 border-green-500">
                                    <!-- Mobile Layout -->
                                    <div class="flex flex-col sm:hidden gap-4">
                                        <!-- Course Image and Status -->
                                        <div class="relative">
                                            <img src="{{ $kelas->cover_image ? asset('storage/'.$kelas->cover_image) : 'https://via.placeholder.com/300x180?text=Course' }}" 
                                                alt="{{ $kelas->nama_kelas }}" 
                                                class="w-full h-40 object-cover rounded-xl" />
                                            <div class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">
                                                Completed
                                            </div>
                                            <div class="absolute top-2 left-2 bg-green-100 px-2 py-1 rounded-full flex items-center gap-1">
                                                <i class="ph-fill ph-certificate text-green-600 text-sm"></i>
                                                <span class="text-green-600 text-xs font-medium">Certified</span>
                                            </div>
                                        </div>

                                        <!-- Course Info -->
                                        <div>
                                            <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $kelas->nama_kelas }}</h4>
                                            
                                            <!-- Progress Info -->
                                            <div class="flex items-center gap-2 mb-3">
                                                <span class="text-gray-600 text-sm">Capaian:</span>
                                                <span class="text-green-600 font-semibold text-sm">100%</span>
                                                <i class="ph-fill ph-dot-outline text-green-500"></i>
                                            </div>

                                            <!-- Course Stats -->
                                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                                                <div class="flex items-center gap-1">
                                                    <i class="ph ph-users-three"></i>
                                                    <span>{{$kelas->total_siswa ?? 0}} siswa</span>
                                                </div>
                                                <div class="flex items-center gap-1">
                                                    <i class="ph ph-check-circle"></i>
                                                    <span>Selesai</span>
                                                </div>
                                            </div>

                                            <!-- Progress Bar -->
                                            <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex gap-2">
                                            <a href="{{ route('desktop.pages.sertifikat.form-sertif', $kelas->id) }}" 
                                               class="bg-green-500  text-white px-4 py-2 rounded-lg text-sm font-semibold flex-1 text-center">
                                                <span class="hidden sm:inline"></span>Sertifikat
                                            </a>
                                            <a href="{{ route('student.course.materi', $kelas->id) }}"
                                               class="border-2 border-gray-200 text-gray-600 px-4 py-2 rounded-lg text-sm font-semibold flex-1 text-center">
                                                <span class="sm:hidden"></span>
                                                <span class="hidden sm:inline"></span>Lihat Kelas
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Desktop Layout -->
                                    <div class="hidden sm:flex items-center gap-6">
                                        <!-- Course Image -->
                                        <div class="relative flex-shrink-0 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 group">
                                            <img src="{{ $kelas->cover_image ? asset('storage/'.$kelas->cover_image) : 'https://via.placeholder.com/140x100?text=Course' }}" 
                                                alt="{{ $kelas->nama_kelas }}" 
                                                class="w-36 h-24 object-cover rounded-2xl" />
                                            <div class="absolute -top-2 -right-2 bg-green-500 text-white text-xs px-3 py-1 rounded-full">
                                                Completed
                                            </div>
                                        </div>

                                        <!-- Course Info -->
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-2">
                                                <h4 class="font-bold text-xl text-gray-800">{{ $kelas->nama_kelas }}</h4>
                                                <div class="flex items-center bg-green-100 px-2 py-1 rounded-full">
                                                    <i class="ph-fill ph-certificate text-green-600 text-sm mr-1"></i>
                                                    <span class="text-green-600 text-xs font-medium">Certified</span>
                                                </div>
                                            </div>
                                            
                                            <div class="flex items-center gap-2 mb-3">
                                                <span class="text-gray-600 text-sm">Capaian:</span>
                                                <span class="text-green-600 font-semibold text-sm">100%</span>
                                                <i class="ph-fill ph-dot-outline text-green-500"></i>
                                            </div>
                                            
                                             <!-- Course Stats -->
                                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                                                <div class="flex items-center gap-1">
                                                    <i class="ph ph-users-three"></i>
                                                    <span>{{$kelas->total_siswa ?? 0}} siswa</span>
                                                </div>
                                                <div class="flex items-center gap-1">
                                                    <i class="ph ph-check-circle"></i>
                                                    <span>Selesai</span>
                                                </div>
                                            </div>

                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex gap-3 flex-shrink-0">
                                            <a href="{{ route('desktop.pages.sertifikat.form-sertif', $kelas->id) }}" 
                                               class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                Download Sertifikat
                                            </a>
                                            <a href="{{ route('student.course.materi', $kelas->id) }}"
                                               class="border-2 border-gray-200 text-gray-600 px-6 py-3 rounded-xl text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                Lihat Kelas
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-12 sm:py-16">
                                <div class="mb-4">
                                    <i class="ph ph-trophy text-4xl sm:text-6xl text-gray-300"></i>
                                </div>
                                <p class="text-gray-400 text-base sm:text-lg italic">Belum ada kelas yang diselesaikan.</p>
                                <p class="text-gray-300 text-sm mt-2">Selesaikan kelas pertama Anda untuk mendapatkan sertifikat!</p>
                                <a href="{{ route('kelas.index') }}" 
                                   class="inline-block mt-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                                    Lihat Kelas Tersedia
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
@media (max-width: 640px) {
    .hero-bg-elements {
        transform: scale(0.5);
    }
}

/* Enhanced card hover effects */
.course-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.course-card:hover {
    transform: translateY(-2px);
}

@media (min-width: 640px) {
    .course-card:hover {
        transform: translateY(-4px) scale(1.01);
    }
}

/* Completed class specific styling */
.completed-card {
    border-left: 4px solid #10b981;
}

.completed-card:hover {
    border-left-width: 6px;
}

/* Smooth animations for mobile */
@media (max-width: 640px) {
    .course-card {
        transform: translateZ(0);
        backface-visibility: hidden;
    }
}

/* Certificate badge animation */
.certificate-badge {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.8;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add loading animation to completed course cards
    const completedCards = document.querySelectorAll('#completed-kelas-container > div');
    completedCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-fadeInUp', 'course-card', 'completed-card');
    });

    // Add certificate badge animation
    const certificateBadges = document.querySelectorAll('.certificate-badge');
    certificateBadges.forEach(badge => {
        badge.classList.add('certificate-badge');
    });

    // Smooth scroll to top when navigating between tabs
    const tabLinks = document.querySelectorAll('a[href*="kelas"]');
    tabLinks.forEach(link => {
        link.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
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
    
    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }
        100% {
            background-position: 1000px 0;
        }
    }
    
    .shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 1000px 100%;
        animation: shimmer 2s infinite;
    }
`;
document.head.appendChild(style);
</script>
@endsection