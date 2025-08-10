@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        backdropBlur: {
          xs: '2px',
        }
      }
    }
  }
</script>

<!-- Header Section -->
<div class="bg-gradient-to-br from-purple-50 to-indigo-100 rounded-3xl p-8 shadow-xl border border-white/20 backdrop-blur-sm mb-8">
  <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
    <div class="flex items-center space-x-4">
      <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
        </svg>
      </div>
      <div>
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-2">Kelas Saya</h1>
        <p class="text-gray-600 text-lg">Kelola dan pantau semua kelas yang telah Anda buat</p>
      </div>
    </div>
    
    <div class="flex items-center space-x-4">
      <a href="/pengajar/buat-kelas" 
         class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-6 py-3 rounded-2xl font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        <span>Buat Kelas</span>
      </a>
      
      <a href="/pengajar/dashboard" 
         class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-6 py-3 rounded-2xl font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        <span>Dashboard</span>
      </a>
    </div>
  </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
  <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-600 text-sm font-medium">Total Kelas</p>
        <p class="text-2xl font-bold text-gray-800" id="totalKelas">{{ $kelas->count() }}</p>
      </div>
      <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
        </svg>
      </div>
    </div>
  </div>

  <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-600 text-sm font-medium">Kelas Aktif</p>
        <p class="text-2xl font-bold text-green-600" id="kelasAktif">{{ $kelas->where('status', 'published')->count() }}</p>
      </div>
      <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
      </div>
    </div>
  </div>

  <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-600 text-sm font-medium">Total Peserta</p>
        <p class="text-2xl font-bold text-orange-600" id="totalPeserta">247</p>
      </div>
      <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
        </svg>
      </div>
    </div>
  </div>

  <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-600 text-sm font-medium">Pendapatan</p>
        <p class="text-2xl font-bold text-purple-600" id="totalPendapatan">Rp 15.2M</p>
      </div>
      <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
        </svg>
      </div>
    </div>
  </div>
</div>

<!-- Filter and Search -->
<div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg mb-8">
  <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
    <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
      <div class="relative w-full sm:w-80">
        <input type="text" 
               id="searchInput" 
               placeholder="Cari kelas..." 
               class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300 text-gray-800 placeholder-gray-400">
        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
      </div>
      
      <select id="filterStatus" class="px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300 text-gray-800">
        <option value="">Semua Status</option>
        <option value="published">📚 Published</option>
        <option value="draft">✏️ Draft</option>
      </select>

      <select id="filterKategori" class="px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300 text-gray-800">
        <option value="">Semua Kategori</option>
        <option value="programming">💻 Programming</option>
        <option value="design">🎨 Design</option>
        <option value="web">🌐 Web Development</option>
        <option value="mobile">📱 Mobile Development</option>
        <option value="data">📊 Data Science</option>
        <option value="ai">🤖 AI</option>
        <option value="marketing">📈 Marketing</option>
        <option value="business">💼 Business</option>
      </select>
    </div>

    <div class="flex items-center gap-2">
      <button id="viewGrid" class="p-3 rounded-xl bg-indigo-500 text-white shadow-lg hover:bg-indigo-600 transition-all duration-300">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
        </svg>
      </button>
      <button id="viewList" class="p-3 rounded-xl bg-gray-200 text-gray-600 shadow-lg hover:bg-gray-300 transition-all duration-300">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>
</div>

<!-- Classes Grid -->
<div id="classesContainer" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
  <!-- Dynamic Classes dari Database -->
  @forelse($kelas as $kelasItem)
    <div class="class-card bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300" 
         data-status="{{ $kelasItem->status }}" 
         data-kategori="{{ $kelasItem->kategori }}">
      
      <div class="relative">
        @if($kelasItem->cover_image)
          <img src="{{ asset('storage/' . $kelasItem->cover_image) }}" alt="Cover" class="h-32 w-full object-cover">
        @else
          <div class="h-32 bg-gradient-to-br from-blue-400 to-purple-600 flex items-center justify-center">
            <svg class="w-8 h-8 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19V6l6 6-6 7z"/>
            </svg>
          </div>
        @endif
        
        <div class="absolute top-2 left-2">
          <span class="bg-{{ $kelasItem->status == 'published' ? 'green' : 'orange' }}-500 text-white text-xs font-bold px-2 py-1 rounded-full">
            {{ $kelasItem->status == 'published' ? '📚 Published' : '✏️ Draft' }}
          </span>
        </div>
        
        <div class="absolute top-2 right-2">
          <div class="bg-white/90 backdrop-blur-sm rounded-lg p-1">
            <button class="text-gray-600 hover:text-red-500 transition-colors" onclick="deleteClass({{ $kelasItem->id }})">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
      
      <div class="p-4">
        <div class="flex items-center gap-1 mb-2">
          <span class="text-xs font-semibold px-2 py-1 bg-blue-100 text-blue-800 rounded-md">
            🌐 {{ ucfirst($kelasItem->kategori) }}
          </span>
          <span class="text-xs font-semibold px-2 py-1 bg-green-100 text-green-800 rounded-md">🟢 Pemula</span>
        </div>
        
        <h3 class="text-sm font-bold text-gray-800 mb-2 hover:text-indigo-600 transition-colors cursor-pointer line-clamp-2">
          {{ $kelasItem->nama_kelas }}
        </h3>
        
        <p class="text-gray-600 text-xs mb-3 line-clamp-2">
          {{ Str::limit($kelasItem->deskripsi, 80) }}
        </p>
        
        <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
          <div class="flex items-center space-x-2">
            <span class="flex items-center space-x-1">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
              </svg>
              <span>0</span>
            </span>
            <span class="flex items-center space-x-1">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <span>{{ $kelasItem->durasi ?? '8' }}w</span>
            </span>
          </div>
          <span class="font-bold text-green-600 text-xs">
            {{ $kelasItem->harga ? 'Rp ' . number_format($kelasItem->harga/1000, 0) . 'K' : 'Gratis' }}
          </span>
        </div>
        
        <div class="flex items-center gap-1">
          <a href="{{ route('pengajar.kelas.edit', $kelasItem) }}" 
             class="flex-1 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white text-center py-1.5 px-2 rounded-lg font-semibold text-xs transition-all duration-300 transform hover:scale-105">
            Edit
          </a>
          <a href="{{ route('pengajar.kelas.show', $kelasItem->id) }}"
             class="flex-1 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white text-center py-1.5 px-2 rounded-lg font-semibold text-xs transition-all duration-300 transform hover:scale-105">
            Kelola
          </a>
        </div>
      </div>
    </div>
  @empty
    <!-- Empty State (shown when no classes exist) -->
    <div class="col-span-full text-center py-16">
      <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
        </svg>
      </div>
      <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Kelas</h3>
      <p class="text-gray-600 mb-6">Anda belum membuat kelas. Mari buat kelas pertama Anda!</p>
      <a href="/pengajar/buat-kelas" 
         class="inline-flex items-center space-x-2 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        <span>Buat Kelas Pertama</span>
      </a>
    </div>
  @endforelse
</div>

<!-- Empty State for Filter Results -->
<div id="emptyState" class="hidden text-center py-16">
  <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
    </svg>
  </div>
  <h3 class="text-2xl font-bold text-gray-800 mb-2">Tidak Ada Kelas yang Cocok</h3>
  <p class="text-gray-600 mb-6">Tidak ada kelas yang sesuai dengan filter yang dipilih.</p>
  <button onclick="clearFilters()" 
          class="inline-flex items-center space-x-2 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
    </svg>
    <span>Reset Filter</span>
  </button>
</div>

<!-- Pagination -->
<div class="mt-8 flex justify-center">
  <div class="flex items-center space-x-2">
    <button class="px-4 py-2 bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
      </svg>
    </button>
    
    <button class="px-4 py-2 bg-indigo-500 text-white rounded-xl font-medium">1</button>
    <button class="px-4 py-2 bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all duration-300">2</button>
    <button class="px-4 py-2 bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all duration-300">3</button>
    
    <button class="px-4 py-2 bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all duration-300">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
      </svg>
    </button>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterStatus = document.getElementById('filterStatus');
    const filterKategori = document.getElementById('filterKategori');
    const viewGrid = document.getElementById('viewGrid');
    const viewList = document.getElementById('viewList');
    const classesContainer = document.getElementById('classesContainer');
    const emptyState = document.getElementById('emptyState');
    const classCards = document.querySelectorAll('.class-card');
    
    let currentView = 'grid';

    // Search and Filter functionality
    function filterClasses() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusFilter = filterStatus.value;
        const kategoriFilter = filterKategori.value;
        
        let visibleCards = 0;

        classCards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('p').textContent.toLowerCase();
            const status = card.dataset.status;
            const kategori = card.dataset.kategori;
            
            const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
            const matchesStatus = !statusFilter || status === statusFilter;
            const matchesKategori = !kategoriFilter || kategori === kategoriFilter;
            
            if (matchesSearch && matchesStatus && matchesKategori) {
                card.style.display = 'block';
                visibleCards++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide empty state
        if (visibleCards === 0 && classCards.length > 0) {
            classesContainer.style.display = 'none';
            emptyState.style.display = 'block';
        } else {
            classesContainer.style.display = 'grid';
            emptyState.style.display = 'none';
        }
    }

    // View toggle functionality
    function toggleView(view) {
        currentView = view;
        
        if (view === 'grid') {
            viewGrid.className = 'p-3 rounded-xl bg-indigo-500 text-white shadow-lg hover:bg-indigo-600 transition-all duration-300';
            viewList.className = 'p-3 rounded-xl bg-gray-200 text-gray-600 shadow-lg hover:bg-gray-300 transition-all duration-300';
            classesContainer.className = 'grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4';
        } else {
            viewGrid.className = 'p-3 rounded-xl bg-gray-200 text-gray-600 shadow-lg hover:bg-gray-300 transition-all duration-300';
            viewList.className = 'p-3 rounded-xl bg-indigo-500 text-white shadow-lg hover:bg-indigo-600 transition-all duration-300';
            classesContainer.className = 'grid grid-cols-1 gap-4';
        }
    }

    // Clear filters functionality
    window.clearFilters = function() {
        searchInput.value = '';
        filterStatus.value = '';
        filterKategori.value = '';
        filterClasses();
    };

    // Delete class functionality
    window.deleteClass = function(classId) {
        if (confirm('Apakah Anda yakin ingin menghapus kelas ini?')) {
            // Show loading notification
            showNotification('Menghapus kelas...', 'info');
            
            // Here you would typically make an AJAX call to delete the class
            // For now, we'll just simulate the deletion
            setTimeout(() => {
                // Find and remove the card
                const cardToRemove = document.querySelector(`[onclick="deleteClass(${classId})"]`).closest('.class-card');
                if (cardToRemove) {
                    cardToRemove.style.transform = 'scale(0)';
                    cardToRemove.style.opacity = '0';
                    
                    setTimeout(() => {
                        cardToRemove.remove();
                        filterClasses(); // Re-check if empty state should be shown
                        showNotification('Kelas berhasil dihapus!', 'success');
                        
                        // Update statistics
                        updateStatistics();
                    }, 300);
                }
            }, 1000);
        }
    };

    // Update statistics
    function updateStatistics() {
        const totalClasses = document.querySelectorAll('.class-card').length;
        const publishedClasses = document.querySelectorAll('[data-status="published"]').length;
        
        document.getElementById('totalKelas').textContent = totalClasses;
        document.getElementById('kelasAktif').textContent = publishedClasses;
    }

    // Notification function
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        const colors = {
            'success': 'bg-green-500 text-white',
            'error': 'bg-red-500 text-white',
            'info': 'bg-blue-500 text-white',
            'warning': 'bg-yellow-500 text-black'
        };
        
        notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-2xl shadow-lg transform transition-all duration-500 ${colors[type]}`;
        notification.innerHTML = `
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    ${type === 'success' 
                        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>'
                        : type === 'error'
                        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>'
                        : type === 'info'
                        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>'
                        : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>'
                    }
                </svg>
                <span class="font-medium">${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 500);
        }, 3000);
    }

    // Event listeners
    searchInput.addEventListener('input', filterClasses);
    filterStatus.addEventListener('change', filterClasses);
    filterKategori.addEventListener('change', filterClasses);
    viewGrid.addEventListener('click', () => toggleView('grid'));
    viewList.addEventListener('click', () => toggleView('list'));

    // Initialize
    toggleView('grid');
    
    // Add custom styles for enhanced animations and responsive design
    const style = document.createElement('style');
    style.textContent = `
        /* Enhanced card animations */
        .class-card {
            transition: all 0.3s ease;
            will-change: transform;
            min-height: 280px;
        }
        
        .class-card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Staggered animations */
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
        
        .class-card {
            animation: fadeInUp 0.4s ease-out;
        }
        
        .class-card:nth-child(1) { animation-delay: 0.05s; }
        .class-card:nth-child(2) { animation-delay: 0.1s; }
        .class-card:nth-child(3) { animation-delay: 0.15s; }
        .class-card:nth-child(4) { animation-delay: 0.2s; }
        .class-card:nth-child(5) { animation-delay: 0.25s; }
        .class-card:nth-child(6) { animation-delay: 0.3s; }
        .class-card:nth-child(7) { animation-delay: 0.35s; }
        .class-card:nth-child(8) { animation-delay: 0.4s; }
        .class-card:nth-child(9) { animation-delay: 0.45s; }
        .class-card:nth-child(10) { animation-delay: 0.5s; }
        
        /* List view styles */
        .grid-cols-1 .class-card {
            display: flex;
            flex-direction: row;
            min-height: 140px;
            max-width: none;
        }
        
        .grid-cols-1 .class-card .relative {
            width: 180px;
            flex-shrink: 0;
        }
        
        .grid-cols-1 .class-card .h-32 {
            height: 140px;
        }
        
        .grid-cols-1 .class-card .p-4 {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        /* Enhanced button hover effects */
        .class-card a {
            position: relative;
            overflow: hidden;
        }
        
        .class-card a:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: left 0.5s;
        }
        
        .class-card a:hover:before {
            left: 100%;
        }
        
        /* Responsive improvements */
        @media (max-width: 768px) {
            .grid-cols-1 .class-card {
                flex-direction: column;
            }
            
            .grid-cols-1 .class-card .relative {
                width: 100%;
            }
            
            .grid-cols-1 .class-card .h-48 {
                height: 200px;
            }
            
            .class-card .p-6 {
                padding: 1rem;
            }
            
            .class-card h3 {
                font-size: 1rem;
            }
        }
        
        /* Smooth transitions for filters */
        .class-card {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .class-card[style*="display: none"] {
            transform: scale(0.8);
            opacity: 0;
        }
        
        /* Enhanced backdrop effects */
        .backdrop-blur-sm {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    `;
    document.head.appendChild(style);
});
</script>

@endsection
</div>