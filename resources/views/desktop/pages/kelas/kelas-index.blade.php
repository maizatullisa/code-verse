@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Saya - Code Verse')

@section('page-title', 'Kelas Saya')

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
                <h1 class="text-2xl sm:text-3xl font-bold mb-2 sm:mb-4">Kelola Pembelajaran Anda</h1>
                <p class="text-base sm:text-lg opacity-90">Lanjutkan perjalanan coding Anda dengan kelas-kelas terbaik</p>
            </div>

            <!-- Tab Navigation -->
            <div class="px-0 sm:px-6 mb-6 sm:mb-8">
                <div class="max-w-4xl mx-auto">
                    <div class="flex justify-center items-center gap-1 sm:gap-2 bg-white rounded-xl sm:rounded-2xl p-1 sm:p-2 shadow-lg border border-gray-100">
                        <a href="{{ route('kelas.index') }}" 
                           class="bg-sky-800  text-white px-4 sm:px-8 py-2 sm:py-3 rounded-lg sm:rounded-xl font-semibold text-xs sm:text-sm transition-all shadow-md flex-1 sm:flex-none text-center">
                            <span class="hidden sm:inline">📚 </span>Diambil
                        </a>
                        <a href="{{ route('kelas.selesai') }}"  
                           class="text-gray-600 px-4 sm:px-8 py-2 sm:py-3 rounded-lg sm:rounded-xl font-semibold text-xs sm:text-sm hover:bg-gray-50 transition-all flex-1 sm:flex-none text-center">
                            <span class="hidden sm:inline">✅ </span>Selesai
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kelas Diambil List -->
            <div class="px-4 sm:px-6 mb-12 sm:mb-20">
                <div class="max-w-4xl mx-auto">
                    <div class="space-y-3 sm:space-y-4" id="kelas-container">
                        @if(isset($enrollments) && $enrollments->count())
                            @foreach($enrollments as $enrollment)
                                @php $kelas = $enrollment->kelas; @endphp
                                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg sm:shadow-xl border border-gray-100 hover:shadow-xl sm:hover:shadow-2xl transition-all duration-300">
                                    <!-- Mobile Layout -->
                                    <div class="flex flex-col sm:hidden gap-4">
                                        <!-- Course Image and Status -->
                                        <div class="relative">
                                            <img src="{{ $kelas->cover_image ? asset('storage/'.$kelas->cover_image) : 'https://via.placeholder.com/300x180?text=Course' }}" 
                                                alt="{{ $kelas->nama_kelas }}" 
                                                class="w-full h-40 object-cover rounded-xl" />
                                            <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
                                                {{ ucfirst($enrollment->status) }}
                                            </div>
                                        </div>

                                        <!-- Course Info -->
                                        <div>
                                            <h4 class="font-bold text-lg text-gray-800 mb-1">{{ $kelas->nama_kelas }}</h4>
                                            <p class="text-gray-600 text-sm mb-1">Pengajar: {{ $kelas->pengajar->first_name ?? 'Pengajar' }}</p>
                                            <p class="text-gray-500 text-sm">Durasi: {{ $kelas->durasi ?? '-' }}</p>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex gap-2">
                                            <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id]) }}" 
                                               class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold flex-1 text-center">
                                                <span class="hidden sm:inline"></span>Lanjut Belajar
                                            </a>
                                            <a href="{{ route('kelas.detail', ['kelas' => $kelas->id]) }}"
                                               class="border-2 border-gray-200 text-gray-600 px-4 py-2 rounded-lg text-sm font-semibold flex-1 text-center">
                                                <span class="sm:hidden"></span>
                                                <span class="hidden sm:inline"> </span>Detail
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
                                            <div class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs px-3 py-1 rounded-full">
                                                {{ ucfirst($enrollment->status) }}
                                            </div>
                                        </div>

                                        <!-- Course Info -->
                                        <div class="flex-1">
                                            <h4 class="font-bold text-xl text-gray-800">{{ $kelas->nama_kelas }}</h4>
                                            <p class="text-gray-600 text-sm">Pengajar: {{ $kelas->pengajar->first_name ?? 'Pengajar' }}</p>
                                            <p class="text-gray-500 text-sm">Durasi: {{ $kelas->durasi ?? '-' }}</p>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex gap-3 flex-shrink-0">
                                            <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id]) }}" 
                                               class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                🚀 Lanjut Belajar
                                            </a>
                                            <a href="{{ route('kelas.detail', ['kelas' => $kelas->id]) }}"
                                               class="border-2 border-gray-200 text-gray-600 px-6 py-3 rounded-xl text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                📋 Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-12 sm:py-16">
                                <div class="mb-4">
                                    <i class="ph ph-book-open text-4xl sm:text-6xl text-gray-300"></i>
                                </div>
                                <p class="text-gray-400 text-base sm:text-lg italic">Belum ada kelas yang diambil.</p>
                                <p class="text-gray-300 text-sm mt-2">Mulai eksplorasi kelas-kelas menarik di CodeVerse!</p>
                            </div>
                        @endif
                    </div>

                    <!-- Load More Button -->
                    @if($enrollments->hasMorePages())
                    <div class="text-center pt-8 sm:pt-12">
                        <button id="load-more-btn" 
                                data-page="{{ $enrollments->currentPage() + 1 }}" 
                                class="bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500 text-white px-6 sm:px-10 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-bold text-base sm:text-lg hover:from-indigo-600 hover:via-purple-700 hover:to-pink-600 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1 w-full sm:w-auto">
                            <span class="hidden sm:inline">✨ </span>Load More Kelas
                        </button>
                    </div>
                    @endif
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

/* Loading state */
.loading {
    opacity: 0.6;
    pointer-events: none;
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

/* Smooth animations for mobile */
@media (max-width: 640px) {
    .course-card {
        transform: translateZ(0);
        backface-visibility: hidden;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('load-more-btn');
    
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const page = this.getAttribute('data-page');
            
            // Loading state
            this.innerHTML = '<span class="hidden sm:inline">⏳ </span>Loading...';
            this.disabled = true;
            this.classList.add('loading');
            
            fetch(`{{ route('kelas.load-more') }}?page=${page}`)
                .then(response => response.json())
                .then(data => {
                    data.enrollments.forEach(enrollment => {
                        const kelas = enrollment.kelas;
                        const html = `
                        <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg sm:shadow-xl border border-gray-100 hover:shadow-xl sm:hover:shadow-2xl transition-all duration-300 course-card">
                            <!-- Mobile Layout -->
                            <div class="flex flex-col sm:hidden gap-4">
                                <div class="relative">
                                    <img src="${kelas.cover_image ? '/storage/' + kelas.cover_image : 'https://via.placeholder.com/300x180?text=Course'}" 
                                        alt="${kelas.nama_kelas}" 
                                        class="w-full h-40 object-cover rounded-xl" />
                                    <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
                                        ${enrollment.status.charAt(0).toUpperCase() + enrollment.status.slice(1)}
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg text-gray-800 mb-1">${kelas.nama_kelas}</h4>
                                    <p class="text-gray-600 text-sm mb-1">Pengajar: ${kelas.pengajar ? kelas.pengajar.first_name : 'Pengajar'}</p>
                                    <p class="text-gray-500 text-sm">Durasi: ${kelas.durasi || '-'}</p>
                                </div>
                                <div class="flex gap-2">
                                    <a href="/desktop/kelas-materi/${kelas.id}" 
                                       class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-semibold flex-1 text-center">
                                        🚀 Lanjut Belajar
                                    </a>
                                    <a href="/desktop/kelas/${kelas.id}"
                                       class="border-2 border-gray-200 text-gray-600 px-4 py-2 rounded-lg text-sm font-semibold flex-1 text-center">
                                        📋 Detail
                                    </a>
                                </div>
                            </div>

                            <!-- Desktop Layout -->
                            <div class="hidden sm:flex items-center gap-6">
                                <div class="relative flex-shrink-0 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 group">
                                    <img src="${kelas.cover_image ? '/storage/' + kelas.cover_image : 'https://via.placeholder.com/140x100?text=Course'}" 
                                        alt="${kelas.nama_kelas}" 
                                        class="w-36 h-24 object-cover rounded-2xl" />
                                    <div class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs px-3 py-1 rounded-full">
                                        ${enrollment.status.charAt(0).toUpperCase() + enrollment.status.slice(1)}
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-xl text-gray-800">${kelas.nama_kelas}</h4>
                                    <p class="text-gray-600 text-sm">Pengajar: ${kelas.pengajar ? kelas.pengajar.first_name : 'Pengajar'}</p>
                                    <p class="text-gray-500 text-sm">Durasi: ${kelas.durasi || '-'}</p>
                                </div>
                                <div class="flex gap-3 flex-shrink-0">
                                    <a href="/desktop/kelas-materi/${kelas.id}" 
                                       class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                        🚀 Lanjut Belajar
                                    </a>
                                    <a href="/desktop/kelas/${kelas.id}"
                                       class="border-2 border-gray-200 text-gray-600 px-6 py-3 rounded-xl text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                        📋 Detail
                                    </a>
                                </div>
                            </div>
                        </div>`;
                        document.getElementById('kelas-container').insertAdjacentHTML('beforeend', html);
                    });
                    
                    if (data.hasMore) {
                        this.setAttribute('data-page', parseInt(page) + 1);
                        this.innerHTML = '<span class="hidden sm:inline">✨ </span>Load More Kelas';
                        this.disabled = false;
                        this.classList.remove('loading');
                    } else {
                        this.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.innerHTML = '<span class="hidden sm:inline">❌ </span>Error Loading';
                    this.classList.remove('loading');
                    
                    // Reset after 3 seconds
                    setTimeout(() => {
                        this.innerHTML = '<span class="hidden sm:inline">✨ </span>Try Again';
                        this.disabled = false;
                    }, 3000);
                });
        });
    }

    // Add loading animation to existing course cards
    const courseCards = document.querySelectorAll('.course-card');
    courseCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-fadeInUp');
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
`;
document.head.appendChild(style);
</script>
@endsection