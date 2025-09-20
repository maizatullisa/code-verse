@extends('desktop.layout.master-desktop')

@section('title', 'glosarry')

@section('page-title', 'Glosarry')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-6 sm:py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <!-- Header Section -->
        <div class="text-center mb-8 sm:mb-12">
            <div class="inline-flex items-center justify-center w-12 h-12 sm:w-16 sm:h-16 bg-blue-500 rounded-2xl mb-4">
                <i class="ph ph-book text-white text-xl sm:text-2xl"></i>
            </div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-2 sm:mb-4">Programming Glossary</h1>
            <p class="text-base sm:text-lg text-gray-600 px-4">Kamus istilah pemrograman yang wajib diketahui</p>
        </div>

        <!-- Search Bar -->
        <div class="bg-white rounded-2xl shadow-xl p-4 sm:p-6 mb-6 sm:mb-8">
            <div class="relative">
                <i class="ph ph-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg sm:text-xl"></i>
                <input 
                    type="text" 
                    id="search-input"
                    placeholder="Cari istilah programming..."
                    class="w-full pl-12 pr-4 py-3 sm:py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none text-gray-700 text-sm sm:text-base transition-all"
                    oninput="searchTerms()"
                >
            </div>
        </div>

        <!-- Alphabet Filter -->
        <div class="bg-white rounded-xl shadow-lg p-3 sm:p-4 mb-6 sm:mb-8">
            <div class="flex flex-wrap gap-1 sm:gap-2 justify-center">
                <button onclick="filterByLetter('all')" class="filter-btn active px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">All</button>
                <button onclick="filterByLetter('A')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">A</button>
                <button onclick="filterByLetter('B')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">B</button>
                <button onclick="filterByLetter('C')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">C</button>
                <button onclick="filterByLetter('D')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">D</button>
                <button onclick="filterByLetter('F')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">F</button>
                <button onclick="filterByLetter('G')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">G</button>
                <button onclick="filterByLetter('H')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">H</button>
                <button onclick="filterByLetter('I')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">I</button>
                <button onclick="filterByLetter('J')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">J</button>
                <button onclick="filterByLetter('L')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">L</button>
                <button onclick="filterByLetter('M')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">M</button>
                <button onclick="filterByLetter('N')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">N</button>
                <button onclick="filterByLetter('O')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">O</button>
                <button onclick="filterByLetter('P')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">P</button>
                <button onclick="filterByLetter('R')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">R</button>
                <button onclick="filterByLetter('S')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">S</button>
                <button onclick="filterByLetter('U')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">U</button>
                <button onclick="filterByLetter('V')" class="filter-btn px-2 py-1 sm:px-3 sm:py-2 rounded-lg text-xs sm:text-sm font-medium">V</button>
            </div>
        </div>

        <!-- Glossary Terms -->
        <div id="glossary-container" class="grid gap-3 sm:gap-4 md:gap-6">
            <!-- Terms akan dimuat di sini -->
        </div>

        <!-- No Results -->
        <div id="no-results" class="hidden text-center py-8 sm:py-12">
            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="ph ph-question text-gray-400 text-xl sm:text-2xl"></i>
            </div>
            <h3 class="text-base sm:text-lg font-medium text-gray-600 mb-2">Tidak ada hasil ditemukan</h3>
            <p class="text-sm sm:text-base text-gray-500">Coba dengan kata kunci yang berbeda</p>
        </div>
    </div>
</div>

<style>
.filter-btn {
    background: #f3f4f6;
    color: #6b7280;
    transition: all 0.2s ease;
    min-width: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.filter-btn:hover {
    background: #e5e7eb;
    color: #374151;
    transform: translateY(-1px);
}

.filter-btn.active {
    background: #3b82f6;
    color: white;
    box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
}

.filter-btn:active {
    transform: translateY(0);
}

/* Responsive grid for glossary items */
#glossary-container {
    grid-template-columns: 1fr;
}

@media (min-width: 768px) {
    #glossary-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    #glossary-container {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Card hover effects */
.glossary-card {
    transform: translateY(0);
    transition: all 0.3s ease;
}

.glossary-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

/* Search input focus effects */
#search-input:focus {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Mobile-specific adjustments */
@media (max-width: 640px) {
    .filter-btn {
        min-width: 28px;
        height: 28px;
    }
    
    /* Ensure alphabet filter doesn't overflow */
    .alphabet-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    
    .alphabet-container::-webkit-scrollbar {
        display: none;
    }
}

/* Loading animation */
.loading {
    opacity: 0.6;
    pointer-events: none;
}

/* Smooth transitions for content changes */
#glossary-container .glossary-card {
    animation: fadeInUp 0.3s ease forwards;
}

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
</style>

<script>
const glossaryTerms = [
    { term: "API", definition: "Application Programming Interface - Sekumpulan protokol, tools, dan definisi untuk membangun aplikasi software. Memungkinkan berbagai aplikasi untuk berkomunikasi satu sama lain." },
    { term: "Algorithm", definition: "Serangkaian instruksi atau aturan yang dirancang untuk menyelesaikan masalah tertentu atau melakukan tugas komputasi." },
    { term: "Bug", definition: "Error atau cacat dalam kode program yang menyebabkan hasil yang tidak diinginkan atau tidak terduga." },
    { term: "Cache", definition: "Penyimpanan sementara data yang sering diakses untuk meningkatkan kecepatan akses dan performa aplikasi." },
    { term: "Database", definition: "Koleksi data yang terstruktur dan terorganisir yang dapat diakses, dikelola, dan diperbarui dengan mudah." },
    { term: "Framework", definition: "Kerangka kerja atau struktur dasar yang menyediakan foundation untuk pengembangan aplikasi dengan komponen dan tools yang sudah jadi." },
    { term: "Frontend", definition: "Bagian dari aplikasi web yang berinteraksi langsung dengan pengguna, mencakup user interface dan user experience." },
    { term: "Git", definition: "Sistem version control terdistribusi untuk melacak perubahan dalam source code selama pengembangan software." },
    { term: "HTTP", definition: "HyperText Transfer Protocol - Protokol komunikasi yang digunakan untuk transfer data antara web browser dan web server." },
    { term: "IDE", definition: "Integrated Development Environment - Software aplikasi yang menyediakan fasilitas komprehensif untuk pengembangan software." },
    { term: "JSON", definition: "JavaScript Object Notation - Format pertukaran data yang ringan dan mudah dibaca, sering digunakan untuk API dan konfigurasi." },
    { term: "Library", definition: "Koleksi fungsi dan prosedur yang sudah jadi yang dapat digunakan oleh program lain untuk menghindari pengulangan kode." },
    { term: "Machine Learning", definition: "Cabang dari artificial intelligence yang memungkinkan sistem untuk belajar dan meningkatkan performa dari pengalaman tanpa diprogram secara eksplisit." },
    { term: "Node.js", definition: "Runtime environment JavaScript yang memungkinkan menjalankan JavaScript di server-side, di luar browser." },
    { term: "OOP", definition: "Object-Oriented Programming - Paradigma pemrograman berdasarkan konsep objek yang mengandung data dan method." },
    { term: "Python", definition: "Bahasa pemrograman tingkat tinggi yang dikenal karena sintaksnya yang mudah dibaca dan fleksibilitasnya." },
    { term: "Repository", definition: "Lokasi penyimpanan untuk kode proyek software, biasanya dengan version control seperti Git." },
    { term: "SDK", definition: "Software Development Kit - Sekumpulan tools, libraries, dokumentasi, dan panduan untuk mengembangkan aplikasi pada platform tertentu." },
    { term: "SQL", definition: "Structured Query Language - Bahasa untuk mengakses dan memanipulasi database relational." },
    { term: "UI/UX", definition: "User Interface/User Experience - UI fokus pada tampilan, sedangkan UX fokus pada pengalaman pengguna secara keseluruhan." },
    { term: "Variable", definition: "Nama simbolik untuk lokasi memori yang menyimpan data yang dapat berubah selama eksekusi program." },
    { term: "Version Control", definition: "Sistem untuk melacak perubahan pada file dan koordinasi kerja pada file tersebut di antara beberapa orang." }
];

let filteredTerms = [...glossaryTerms];
let isLoading = false;

function renderGlossary(terms) {
    const container = document.getElementById('glossary-container');
    const noResults = document.getElementById('no-results');
    
    if (terms.length === 0) {
        container.classList.add('hidden');
        noResults.classList.remove('hidden');
        return;
    }
    
    container.classList.remove('hidden');
    noResults.classList.add('hidden');
    
    // Add loading state
    container.classList.add('loading');
    
    setTimeout(() => {
        container.innerHTML = terms.map((item, index) => `
            <div class="glossary-card bg-white rounded-xl shadow-lg p-4 sm:p-6 hover:shadow-xl transition-all" style="animation-delay: ${index * 0.1}s">
                <div class="flex items-start justify-between mb-3">
                    <h3 class="text-lg sm:text-xl font-bold text-blue-600 flex-1 pr-2">${item.term}</h3>
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="ph ph-code text-blue-600 text-sm"></i>
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed text-sm sm:text-base">${item.definition}</p>
            </div>
        `).join('');
        
        container.classList.remove('loading');
    }, 100);
}

function searchTerms() {
    if (isLoading) return;
    
    const searchValue = document.getElementById('search-input').value.toLowerCase().trim();
    
    // Reset active filter button
    document.querySelectorAll('.filter-btn').forEach(btn => {
        if (btn.textContent === 'All') {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });
    
    if (searchValue === '') {
        filteredTerms = [...glossaryTerms];
    } else {
        filteredTerms = glossaryTerms.filter(item => 
            item.term.toLowerCase().includes(searchValue) || 
            item.definition.toLowerCase().includes(searchValue)
        );
    }
    
    renderGlossary(filteredTerms);
}

function filterByLetter(letter) {
    if (isLoading) return;
    
    // Update active button
    document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    if (letter === 'all') {
        filteredTerms = [...glossaryTerms];
    } else {
        filteredTerms = glossaryTerms.filter(item => 
            item.term.charAt(0).toLowerCase() === letter.toLowerCase()
        );
    }
    
    renderGlossary(filteredTerms);
    
    // Clear search
    document.getElementById('search-input').value = '';
}

// Debounce search function
let searchTimeout;
function debouncedSearch() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(searchTerms, 300);
}

// Enhanced search with debouncing
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    
    // Replace oninput with event listener for better control
    searchInput.removeAttribute('oninput');
    searchInput.addEventListener('input', debouncedSearch);
    
    // Add keyboard navigation
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            this.value = '';
            searchTerms();
        }
    });
    
    // Initial render
    renderGlossary(glossaryTerms);
    
    // Add smooth scrolling for mobile
    if (window.innerWidth <= 640) {
        const alphabetContainer = document.querySelector('.bg-white.rounded-xl.shadow-lg');
        if (alphabetContainer) {
            alphabetContainer.classList.add('alphabet-container');
        }
    }
});

// Handle window resize
window.addEventListener('resize', function() {
    // Refresh layout on orientation change
    if (window.innerWidth <= 640) {
        const alphabetContainer = document.querySelector('.bg-white.rounded-xl.shadow-lg');
        if (alphabetContainer) {
            alphabetContainer.classList.add('alphabet-container');
        }
    }
});

// Add loading state management
function setLoadingState(loading) {
    isLoading = loading;
    const container = document.getElementById('glossary-container');
    
    if (loading) {
        container.classList.add('loading');
    } else {
        container.classList.remove('loading');
    }
}
</script>
@endsection