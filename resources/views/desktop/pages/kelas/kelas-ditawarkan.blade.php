@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Yang Ditawarkan - Code Verse')

@section('page-title', 'Kelas Yang Ditawarkan')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
    <!-- Search Box -->
    <div class="flex justify-center items-center gap-4 px-6 relative z-20 max-w-4xl mx-auto mb-8">
    <form action="{{ route('kelas.ditawarkan') }}" method="GET" class="flex justify-start items-center gap-4 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
        <i class="ph ph-magnifying-glass text-xl"></i>
        <input 
            type="text" 
            name="search" 
            id="searchKelas" 
            placeholder="Cari kelas yang ingin dipelajari..." 
            value="{{ request('search') }}" 
            class="bg-transparent outline-none placeholder:text-white w-full text-base" 
        />
    </form>
    <button class="bg-color24 border border-color24 p-4 rounded-full text-white hover:bg-white/20 transition-all" onclick="toggleFilter()">
        <i class="ph ph-sliders-horizontal text-xl"></i>
    </button>
    </div>


    <!-- Filter Panel (Hidden by default) -->
    <div id="filterPanel" class="hidden px-6 mb-6">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl p-6 shadow-lg border">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Filter Kelas</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Level</label>
                    <select id="levelFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-p2 focus:border-p2">
                        <option value="">Semua Level</option>
                        <option value="beginner">Pemula</option>
                        <option value="intermediate">Menengah</option>
                        <option value="advanced">Lanjutan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <select id="priceFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-p2 focus:border-p2">
                        <option value="">Semua Harga</option>
                        <option value="free">Gratis</option>
                        <option value="paid">Berbayar</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Urutkan</label>
                    <select id="sortFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-p2 focus:border-p2">
                        <option value="newest">Terbaru</option>
                        <option value="popular">Terpopuler</option>
                        <option value="rating">Rating Tertinggi</option>
                        <option value="price_low">Harga Terendah</option>
                        <option value="price_high">Harga Tertinggi</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-4 gap-3">
                <button onclick="resetFilters()" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Reset
                </button>
                <button onclick="applyFilters()" class="px-4 py-2 bg-p2 text-white rounded-lg hover:bg-p2/90">
                    Terapkan Filter
                </button>
            </div>
        </div>
    </div>

   <!-- Filter Kategori -->
<div class="px-6 mb-6">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center gap-3 overflow-x-auto pb-2">
            <a href="{{ route('kelas.ditawarkan', ['kategori' => 'all', 'search' => request('search')]) }}"
               class="category-btn {{ request('kategori') == 'all' || !request('kategori') ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all">
                Semua
            </a>

            <a href="{{ route('kelas.ditawarkan', ['kategori' => 'programming', 'search' => request('search')]) }}"
               class="category-btn {{ request('kategori') == 'programming' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all">
                Programming
            </a>

            <a href="{{ route('kelas.ditawarkan', ['kategori' => 'web', 'search' => request('search')]) }}"
               class="category-btn {{ request('kategori') == 'web' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all">
                Web Development
            </a>
             <a href="{{ route('kelas.ditawarkan', ['kategori' => 'design', 'search' => request('search')]) }}"
               class="category-btn {{ request('kategori') == 'design' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all">
                UI/UX Design
            </a>
              <a href="{{ route('kelas.ditawarkan', ['kategori' => 'mobile', 'search' => request('search')]) }}"
               class="category-btn {{ request('kategori') == 'mobile' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all">
                Mobile Development 
            </a>
              <a href="{{ route('kelas.ditawarkan', ['kategori' => 'ai', 'search' => request('search')]) }}"
               class="category-btn {{ request('kategori') == 'ai' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all">
                AI
            </a>
              <a href="{{ route('kelas.ditawarkan', ['kategori' => 'data', 'search' => request('search')]) }}"
               class="category-btn {{ request('kategori') == 'data' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all">
               Data Science
            </a>
              <a href="{{ route('kelas.ditawarkan', ['kategori' => 'marketing', 'search' => request('search')]) }}"
               class="category-btn {{ request('kategori') == 'marketing' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all">
                Marketing
            </a>
            <a href="{{ route('kelas.ditawarkan', ['kategori' => 'business', 'search' => request('search')]) }}"
               class="category-btn {{ request('kategori') == 'business' ? 'bg-p2 text-white' : 'bg-white text-gray-600 border border-gray-300' }} px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all">
               Business
            </a>
        </div>
    </div>
</div>

    <!-- Stats Info -->
    <div class="px-6 mb-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center">
                <p class="text-gray-600">
                   Menampilkan {{ $kelasList->firstItem() }}-{{ $kelasList->lastItem() }} dari {{ $kelasList->total() }} kelas tersedia
                </p>
                <div class="flex items-center gap-2">
                    <!-- <button onclick="toggleView('grid')" id="gridView" class="p-2 rounded-lg bg-p2 text-white">
                        <i class="ph ph-squares-four text-lg"></i>
                    </button>
                    <button onclick="toggleView('list')" id="listView" class="p-2 rounded-lg text-gray-400 hover:text-gray-600">
                        <i class="ph ph-list text-lg"></i>
                    </button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="max-w-4xl mx-auto px-6 mb-4">
        <div class="p-4 bg-green-500 text-white rounded-lg shadow-lg">
            <div class="flex items-center">
                <i class="ph ph-check-circle text-xl mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif

    @if(session('info'))
    <div class="max-w-4xl mx-auto px-6 mb-4">
        <div class="p-4 bg-blue-500 text-white rounded-lg shadow-lg">
            <div class="flex items-center">
                <i class="ph ph-info text-xl mr-2"></i>
                {{ session('info') }}
            </div>
        </div>
    </div>
    @endif

    <!-- Kelas List -->
    <div class="px-6 mb-20">
        <div class="max-w-4xl mx-auto">
            <div id="kelasList" class="space-y-4">
                @if ($kelasList->count())
                    @foreach ($kelasList as $kelas)
                    <div class="kelas-card bg-white text-black p-4 rounded-xl shadow2 hover:transform hover:scale-[1.02] transition-all cursor-pointer" 
                         data-category="programming" 
                         data-level="beginner" 
                         data-price="299000">
                        <div class="flex items-center gap-4">
                            <!-- Dummy Image with Date Badge -->
                            <div class="relative rounded-lg overflow-hidden">
                                 @if($kelas->cover_image)
                               <img src="{{ asset('storage/' . $kelas->cover_image) }}" 
                                     alt="{{ $kelas->nama_kelas }}" 
                                     class="h-[100px] w-[140px] object-cover rounded-lg" />
                                <p class="text-white bg-orange-500 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                    {{ $kelas->materis->first()?->created_at?->format('d M') ?? 'New' }}
                                </p>
                                 @endif
                            </div>
                            
                            <div class="flex-1">
                                <!-- Class Name & Badge -->
                                <div class="flex items-center gap-2 mb-2">
                                    <h4 class="font-semibold text-lg">{{ $kelas->nama_kelas }}</h4>
                                </div>
                                
                                <!-- Instructor Name -->
                                <p class="text-gray-600 text-sm flex items-center gap-1 mb-3">
                                    <i class="ph ph-user"></i>
                                    {{ $kelas->pengajar->first_name ?? $kelas->pengajar->name ?? 'Pengajar belum ada' }}
                                </p>
                                
                                <!-- Course Stats -->
                                <div class="flex items-center gap-4 text-xs text-gray-500 mb-2">
                                    <div class="flex items-center gap-1">
                                        <i class="ph ph-users-three"></i>
                                   <span>{{ $kelas->siswa_count ?? 0 }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <i class="ph ph-clock"></i>
                                        <span>{{ $kelas->durasi ?? '8 minggu' }}</span>
                                    </div>
                                   
                                    <div class="flex items-center gap-1">
                                        <i class="ph ph-book-open"></i>
                                        <span>{{ $kelas->materis_count }} materi</span>
                                    </div>
                                </div>
                                
                                <!-- Pricing (Dummy)
                                <div class="flex items-center gap-2">
                                 <span class="text-p2 font-bold text-lg">Rp 299.000</span>
                                 <span class="text-gray-400 line-through text-sm">Rp 499.000</span>
                                  <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">40% OFF</span>
                                  </div>
                                    </div>
                                     <div class="flex items-center gap-1 sm:gap-2"> -->
                                                @if($kelas->harga > 0)
                                                    <!-- Jika ada harga - warna hijau -->
                                                    <span class="text-green-600 font-bold text-sm sm:text-base">
                                                        Rp {{ number_format($kelas->harga, 0, ',', '.') }}K
                                                    </span>
                                                    <!-- Simulasi harga diskon -->
                                                    @php
                                                        $harga_original = $kelas->harga * 1.67;
                                                        $diskon = round((($harga_original - $kelas->harga) / $harga_original) * 100);
                                                    @endphp
                                                    <span class="text-gray-400 line-through text-xs sm:text-sm">
                                                        Rp {{ number_format($harga_original, 0, ',', '.') }}K
                                                    </span>
                                                    <span class="bg-red-100 text-red-600 text-[8px] sm:text-[10px] px-1 py-0.5 rounded-full">
                                                        {{ $diskon }}% OFF
                                                    </span>
                                                @else
                                                    <!-- Jika gratis -->
                                                    <span class="text-green-600 font-bold text-sm sm:text-base">GRATIS</span>
                                                @endif
                                            </div>
                            <!-- Action Buttons -->
                            <div class="flex flex-col gap-2">
                                <!-- Dummy Daftar Button -->
                              <button class="bg-p2 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/90 transition-all" 
                                onclick="event.stopPropagation(); window.location.href='{{ route('desktop.pages.kelas.kelas-pendaftaran', $kelas->id) }}'">
                                 Daftar
                            </button>
                                
                                <!-- Dummy Preview Button -->
                                <button class="border border-p2 text-p2 px-4 py-2 rounded-full text-sm font-medium hover:bg-p2/10 transition-all" 
                                        onclick="event.stopPropagation(); alert('Preview kelas: {{ $kelas->nama_kelas }}')">
                                    Preview
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
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
    <div class="flex justify-center mb-20">
        {{ $kelasList->links() }}
    </div>
    @endif
    @endsection

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