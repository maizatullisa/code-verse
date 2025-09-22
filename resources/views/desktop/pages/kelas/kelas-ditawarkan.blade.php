@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Yang Ditawarkan - Code Verse')

@section('page-title', 'Kelas Yang Ditawarkan')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
    <!-- Search Box -->
    <div class="flex justify-center items-center gap-2 sm:gap-4 px-4 sm:px-6 relative z-20 max-w-4xl mx-auto mb-6 sm:mb-8">
        <form action="{{ route('kelas.ditawarkan') }}" method="GET" class="flex justify-start items-center gap-2 sm:gap-4 bg-color24 border border-color24 p-3 sm:p-4 rounded-full text-white w-full">
            <i class="ph ph-magnifying-glass text-lg sm:text-xl"></i>
            <input 
                type="text" 
                name="search" 
                id="searchKelas" 
                placeholder="Cari kelas yang ingin dipelajari..." 
                value="{{ request('search') }}" 
                class="bg-transparent outline-none placeholder:text-white w-full text-sm sm:text-base" 
            />
        </form>
        <button class="bg-color24 border border-color24 p-3 sm:p-4 rounded-full text-white hover:bg-white/20 transition-all" onclick="toggleFilter()">
            <i class="ph ph-sliders-horizontal text-lg sm:text-xl"></i>
        </button>
    </div>

    <!-- Filter Panel (Hidden by default) -->
    <div id="filterPanel" class="hidden px-4 sm:px-6 mb-4 sm:mb-6">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl p-4 sm:p-6 shadow-lg border">
            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4">Filter Kelas</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                <div>
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Level</label>
                    <select id="levelFilter" class="w-full px-2 sm:px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-p2 focus:border-p2">
                        <option value="">Semua Level</option>
                        <option value="beginner">Pemula</option>
                        <option value="intermediate">Menengah</option>
                        <option value="advanced">Lanjutan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <select id="priceFilter" class="w-full px-2 sm:px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-p2 focus:border-p2">
                        <option value="">Semua Harga</option>
                        <option value="free">Gratis</option>
                        <option value="paid">Berbayar</option>
                    </select>
                </div>
                <div class="sm:col-span-2 md:col-span-1">
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Urutkan</label>
                    <select id="sortFilter" class="w-full px-2 sm:px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-p2 focus:border-p2">
                        <option value="newest">Terbaru</option>
                        <option value="popular">Terpopuler</option>
                        <option value="rating">Rating Tertinggi</option>
                        <option value="price_low">Harga Terendah</option>
                        <option value="price_high">Harga Tertinggi</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-3 sm:mt-4 gap-2 sm:gap-3">
                <button onclick="resetFilters()" class="px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Reset
                </button>
                <button onclick="applyFilters()" class="px-3 sm:px-4 py-2 text-xs sm:text-sm bg-p2 text-white rounded-lg hover:bg-p2/90">
                    Terapkan Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Filter Kategori -->
    <div class="px-4 sm:px-6 mb-4 sm:mb-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center gap-2 sm:gap-3 overflow-x-auto pb-2 scrollbar-hide">
                <a href="{{ route('kelas.ditawarkan', ['kategori' => 'all', 'search' => request('search')]) }}"
                   class="category-btn {{ request('kategori') == 'all' || !request('kategori') ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all">
                    Semua
                </a>

                <a href="{{ route('kelas.ditawarkan', ['kategori' => 'programming', 'search' => request('search')]) }}"
                   class="category-btn {{ request('kategori') == 'programming' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all">
                    Programming
                </a>

                <a href="{{ route('kelas.ditawarkan', ['kategori' => 'web', 'search' => request('search')]) }}"
                   class="category-btn {{ request('kategori') == 'web' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all">
                    Web Development
                </a>

                <a href="{{ route('kelas.ditawarkan', ['kategori' => 'design', 'search' => request('search')]) }}"
                   class="category-btn {{ request('kategori') == 'design' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all">
                    UI/UX Design
                </a>

                <a href="{{ route('kelas.ditawarkan', ['kategori' => 'mobile', 'search' => request('search')]) }}"
                   class="category-btn {{ request('kategori') == 'mobile' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all">
                    Mobile Development 
                </a>

                <a href="{{ route('kelas.ditawarkan', ['kategori' => 'ai', 'search' => request('search')]) }}"
                   class="category-btn {{ request('kategori') == 'ai' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all">
                    AI
                </a>

                <a href="{{ route('kelas.ditawarkan', ['kategori' => 'data', 'search' => request('search')]) }}"
                   class="category-btn {{ request('kategori') == 'data' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all">
                   Data Science
                </a>

                <a href="{{ route('kelas.ditawarkan', ['kategori' => 'marketing', 'search' => request('search')]) }}"
                   class="category-btn {{ request('kategori') == 'marketing' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all">
                    Marketing
                </a>

                <a href="{{ route('kelas.ditawarkan', ['kategori' => 'business', 'search' => request('search')]) }}"
                   class="category-btn {{ request('kategori') == 'business' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all">
                   Business
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Info -->
    <div class="px-4 sm:px-6 mb-4 sm:mb-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                <p class="text-white text-sm sm:text-base">
                   Menampilkan {{ $kelasList->firstItem() }}-{{ $kelasList->lastItem() }} dari {{ $kelasList->total() }} kelas tersedia
                </p>
                <div class="flex items-center gap-2">
                    <!-- View toggle buttons (if needed) -->
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="max-w-4xl mx-auto px-4 sm:px-6 mb-4">
        <div class="p-3 sm:p-4 bg-green-500 text-white rounded-lg shadow-lg">
            <div class="flex items-center">
                <i class="ph ph-check-circle text-lg sm:text-xl mr-2"></i>
                <span class="text-sm sm:text-base">{{ session('success') }}</span>
            </div>
        </div>
    </div>
    @endif

    @if(session('info'))
    <div class="max-w-4xl mx-auto px-4 sm:px-6 mb-4">
        <div class="p-3 sm:p-4 bg-blue-500 text-white rounded-lg shadow-lg">
            <div class="flex items-center">
                <i class="ph ph-info text-lg sm:text-xl mr-2"></i>
                <span class="text-sm sm:text-base">{{ session('info') }}</span>
            </div>
        </div>
    </div>
    @endif

<!-- Kelas List with Fixed Structure -->
<div class="px-4 sm:px-6 mb-16 sm:mb-20">
    <div class="max-w-4xl mx-auto">
        <div id="kelasList" class="space-y-3 sm:space-y-4">
            @if ($kelasList->count())
                @foreach ($kelasList as $kelas)
                <!-- Mobile-Optimized Card -->
                <div class="kelas-card bg-white text-black rounded-xl shadow-md hover:shadow-lg transition-shadow duration-200" 
                     data-category="programming" 
                     data-level="beginner" 
                     data-price="{{ $kelas->harga }}">
                    
                    <!-- Mobile Layout: Stacked Design -->
                    <div class="block sm:hidden">
                        <!-- Image and Title Row -->
                        <div class="flex gap-3 p-3">
                            <div class="relative rounded-lg overflow-hidden flex-shrink-0">
                                @if($kelas->cover_image)
                                <img src="{{ asset('storage/' . $kelas->cover_image) }}" 
                                     alt="{{ $kelas->nama_kelas }}" 
                                     class="h-16 w-20 object-cover rounded-lg" />
                                <p class="text-white bg-orange-500 absolute bottom-0.5 right-0.5 text-[8px] px-1 py-0.5 rounded">
                                    {{ $kelas->materis->first()?->created_at?->format('d M') ?? 'New' }}
                                </p>
                                @else
                                <div class="h-16 w-20 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="ph ph-image text-gray-400 text-lg"></i>
                                </div>
                                @endif
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-sm leading-tight line-clamp-2 mb-1">{{ $kelas->nama_kelas }}</h4>
                                <p class="text-gray-500 text-xs flex items-center gap-1 mb-1">
                                    <i class="ph ph-user text-xs"></i>
                                    <span class="truncate">{{ $kelas->pengajar->first_name ?? $kelas->pengajar->name ?? 'Instructor' }}</span>
                                </p>
                                
                                <!-- Mobile Price -->
                                <div class="flex items-center gap-1">
                                    @if($kelas->harga > 0)
                                        <span class="text-green-600 font-bold text-sm">
                                            Rp {{ number_format($kelas->harga, 0, ',', '.') }}K
                                        </span>
                                        <span class="text-gray-400 line-through text-xs">
                                            Rp {{ number_format($kelas->harga * 1.67, 0, ',', '.') }}
                                        </span>
                                    @else
                                        <span class="text-green-600 font-bold text-sm">GRATIS</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Mobile Stats -->
                        <div class="flex items-center justify-between px-3 pb-2">
                            <div class="flex items-center gap-3 text-xs text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="ph ph-users-three"></i>{{ $kelas->siswa_count ?? 0 }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="ph ph-book-open"></i>{{ $kelas->materis_count }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Mobile Action Buttons -->
                        <div class="flex gap-2 p-3 pt-0">
                            @auth
                                @if(in_array($kelas->id, $enrolledClassIds))
                                    <span class="flex-1 bg-green-100 text-green-700 py-2 rounded-lg text-xs font-medium text-center border border-green-200">
                                        ✓ Terdaftar
                                    </span>
                                @else
                                    <button class="flex-1 bg-p2 text-white py-2 rounded-lg text-xs font-medium hover:bg-p2/90 transition-colors" 
                                        onclick="event.stopPropagation(); window.location.href='{{ route('desktop.pages.kelas.kelas-pendaftaran', $kelas->id) }}'">
                                        Daftar
                                    </button>
                                @endif
                            @else
                                <button class="flex-1 bg-p2 text-white py-2 rounded-lg text-xs font-medium hover:bg-p2/90 transition-colors" 
                                    onclick="event.stopPropagation(); window.location.href='{{ route('desktop.pages.kelas.kelas-pendaftaran', $kelas->id) }}'">
                                    Daftar
                                </button>
                            @endauth

                            <a href="{{ route('kelas.preview', ['kelas' => $kelas->id]) }}"
                                class="flex-1 border border-p2 text-p2 py-2 rounded-lg text-xs font-medium hover:bg-p2/10 transition-colors text-center">
                                Detail
                            </a>
                        </div>
                    </div>

                    <!-- Desktop Layout: Original Horizontal Design -->
                    <div class="hidden sm:block">
                        <div class="flex items-center gap-4 p-4">
                            <!-- Course Image -->
                            <div class="relative rounded-lg overflow-hidden flex-shrink-0">
                                @if($kelas->cover_image)
                                <img src="{{ asset('storage/' . $kelas->cover_image) }}" 
                                     alt="{{ $kelas->nama_kelas }}" 
                                     class="h-[100px] w-[140px] object-cover rounded-lg" />
                                <p class="text-white bg-orange-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                    {{ $kelas->materis->first()?->created_at?->format('d M') ?? 'New' }}
                                </p>
                                @else
                                <div class="h-[100px] w-[140px] bg-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="ph ph-image text-gray-400 text-2xl"></i>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Course Content -->
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-lg leading-tight line-clamp-2 mb-2">{{ $kelas->nama_kelas }}</h4>
                                
                                <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                    <i class="ph ph-user text-sm"></i>
                                    <span class="truncate">{{ $kelas->pengajar->first_name ?? $kelas->pengajar->name ?? 'Pengajar belum ada' }}</span>
                                </p>
                                
                                <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                    <div class="flex items-center gap-1">
                                        <i class="ph ph-users-three text-xs"></i>
                                        <span>{{ $kelas->siswa_count ?? 0 }}</span>
                                    </div>
                                    <!-- <div class="flex items-center gap-1">
                                        <i class="ph ph-clock text-xs"></i>
                                        <span>{{ $kelas->durasi ?? '8 minggu' }}</span>
                                    </div> -->
                                    <div class="flex items-center gap-1">
                                        <i class="ph ph-book-open text-xs"></i>
                                        <span>{{ $kelas->materis_count }} materi</span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-2">
                                    @if($kelas->harga > 0)
                                        <span class="text-green-600 font-bold text-base">
                                            Rp {{ number_format($kelas->harga, 0, ',', '.') }}K
                                        </span>
                                        @php
                                            $harga_original = $kelas->harga * 1.67;
                                            $diskon = round((($harga_original - $kelas->harga) / $harga_original) * 100);
                                        @endphp
                                        <span class="text-gray-400 line-through text-sm">
                                            Rp {{ number_format($harga_original, 0, ',', '.') }}
                                        </span>
                                        <span class="bg-red-100 text-red-600 text-[10px] px-1 py-0.5 rounded-full">
                                            {{ $diskon }}% OFF
                                        </span>
                                    @else
                                        <span class="text-green-600 font-bold text-base">GRATIS</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Desktop Action Buttons with Enhanced Hover -->
                            <div class="flex flex-col gap-2 flex-shrink-0">
                                @auth
                                    @if(in_array($kelas->id, $enrolledClassIds))
                                        <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm font-medium cursor-not-allowed text-center border border-green-200 group-hover:bg-green-200 group-hover:border-green-300 transition-all duration-300">
                                            ✓ Sudah Terdaftar
                                        </span>
                                    @else
                                        <button class="bg-p2 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-p2/90 hover:scale-105 hover:shadow-lg transition-all duration-300 whitespace-nowrap transform" 
                                            onclick="event.stopPropagation(); window.location.href='{{ route('desktop.pages.kelas.kelas-pendaftaran', $kelas->id) }}'">
                                            Daftar
                                        </button>
                                    @endif
                                @else
                                    <button class="bg-p2 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-p2/90 hover:scale-105 hover:shadow-lg transition-all duration-300 whitespace-nowrap transform" 
                                        onclick="event.stopPropagation(); window.location.href='{{ route('desktop.pages.kelas.kelas-pendaftaran', $kelas->id) }}'">
                                        Daftar
                                    </button>
                                @endauth

                                <a href="{{ route('kelas.preview', ['kelas' => $kelas->id]) }}"
                                    class="inline-flex items-center justify-center border border-p2 text-p2 px-4 py-2 rounded-lg text-sm font-medium hover:bg-p2 hover:text-white hover:scale-105 hover:shadow-lg transition-all duration-300 whitespace-nowrap transform">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="flex flex-col items-center">
                        <i class="ph ph-books text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-400 text-lg italic">Belum ada kelas dengan materi yang dipublikasikan.</p>
                        <p class="text-gray-300 text-sm mt-2">Silakan kembali lagi nanti untuk melihat kelas terbaru</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

    <!-- Pagination -->
    @if ($kelasList->hasPages())
    <div class="flex justify-center mb-16 sm:mb-20 px-4">
        {{ $kelasList->links() }}
    </div>
    @endif

    <!-- Custom CSS for scrollbar hide -->
    <style>
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

@push('scripts')
<script>
// Toggle Filter Panel
function toggleFilter() {
    const panel = document.getElementById('filterPanel');
    panel.classList.toggle('hidden');
}

// Reset Filters
function resetFilters() {
    document.getElementById('levelFilter').value = '';
    document.getElementById('priceFilter').value = '';
    document.getElementById('sortFilter').value = 'newest';
    
    // Reset category buttons
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('bg-p2', 'text-white');
        btn.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-300');
    });
    
    // Set "Semua" as active
    document.querySelector('[data-category="all"]').classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-300');
    document.querySelector('[data-category="all"]').classList.add('bg-p2', 'text-white');
}

// Apply Filters (Dummy)
function applyFilters() {
    alert('Filter akan diterapkan. Fitur dalam pengembangan.');
    toggleFilter(); // Hide panel after apply
}

// Toggle View (Grid/List)
function toggleView(viewType) {
    const gridBtn = document.getElementById('gridView');
    const listBtn = document.getElementById('listView');
    
    if (viewType === 'grid') {
        gridBtn.classList.add('bg-p2', 'text-white');
        gridBtn.classList.remove('text-gray-400');
        listBtn.classList.remove('bg-p2', 'text-white');
        listBtn.classList.add('text-gray-400');
    } else {
        listBtn.classList.add('bg-p2', 'text-white');
        listBtn.classList.remove('text-gray-400');
        gridBtn.classList.remove('bg-p2', 'text-white');
        gridBtn.classList.add('text-gray-400');
    }
    
    // View toggle functionality akan dikembangkan
    console.log('Switched to ' + viewType + ' view');
}

// Category Filter
document.querySelectorAll('.category-btn').forEach(button => {
    button.addEventListener('click', function() {
        // Remove active state from all buttons
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.classList.remove('bg-p2', 'text-white');
            btn.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-300');
        });
        
        // Add active state to clicked button
        this.classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-300');
        this.classList.add('bg-p2', 'text-white');
        
        const category = this.getAttribute('data-category');
        console.log('Selected category:', category);
        
        // Category filtering akan dikembangkan
    });
});

// Search functionality (Dummy)
document.getElementById('searchKelas').addEventListener('input', function() {
    const searchTerm = this.value;
    console.log('Searching for:', searchTerm);
    // Search functionality akan dikembangkan
});
</script>
@endpush

@endsection
