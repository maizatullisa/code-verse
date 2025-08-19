    // Search functionality
    document.getElementById('searchKelas').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        filterKelas();
    });

    // Category filter
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('.category-btn').forEach(b => {
                b.classList.remove('bg-p2', 'text-white');
                b.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-300');
            });
            
            // Add active class to clicked button
            this.classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-300');
            this.classList.add('bg-p2', 'text-white');
            
            filterKelas();
        });
    });

    // Toggle filter panel
    function toggleFilter() {
        const filterPanel = document.getElementById('filterPanel');
        filterPanel.classList.toggle('hidden');
    }

    // Apply filters
    function applyFilters() {
        filterKelas();
        document.getElementById('filterPanel').classList.add('hidden');
    }

    // Reset filters
    function resetFilters() {
        document.getElementById('levelFilter').value = '';
        document.getElementById('priceFilter').value = '';
        document.getElementById('sortFilter').value = 'newest';
        document.getElementById('searchKelas').value = '';
        
        // Reset category to "Semua"
        document.querySelectorAll('.category-btn').forEach(b => {
            b.classList.remove('bg-p2', 'text-white');
            b.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-300');
        });
        document.querySelector('[data-category="all"]').classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-300');
        document.querySelector('[data-category="all"]').classList.add('bg-p2', 'text-white');
        
        filterKelas();
    }

    // Main filter function
    function filterKelas() {
        const searchTerm = document.getElementById('searchKelas').value.toLowerCase();
        const selectedCategory = document.querySelector('.category-btn.bg-p2').dataset.category;
        const selectedLevel = document.getElementById('levelFilter').value;
        const selectedPrice = document.getElementById('priceFilter').value;
        const sortBy = document.getElementById('sortFilter').value;
        
        const kelasCards = document.querySelectorAll('.kelas-card');
        let visibleCount = 0;
        
        kelasCards.forEach(card => {
            const title = card.querySelector('h4').textContent.toLowerCase();
            const category = card.dataset.category;
            const level = card.dataset.level;
            const price = parseInt(card.dataset.price);
            
            let shouldShow = true;
            
            // Search filter
            if (searchTerm && !title.includes(searchTerm)) {
                shouldShow = false;
            }
            
            // Category filter
            if (selectedCategory !== 'all' && category !== selectedCategory) {
                shouldShow = false;
            }
            
            // Level filter
            if (selectedLevel && level !== selectedLevel) {
                shouldShow = false;
            }
            
            // Price filter
            if (selectedPrice === 'free' && price !== 0) {
                shouldShow = false;
            } else if (selectedPrice === 'paid' && price === 0) {
                shouldShow = false;
            }
            
            if (shouldShow) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        // Update result count
        document.getElementById('totalResults').textContent = visibleCount;
        
        // Sort if needed
        if (sortBy !== 'newest') {
            sortKelas(sortBy);
        }
    }

    // Sort function
    function sortKelas(sortBy) {
        const container = document.getElementById('kelasList');
        const cards = Array.from(container.children).filter(card => card.style.display !== 'none');
        
        cards.sort((a, b) => {
            switch(sortBy) {
                case 'popular':
                    const studentsA = parseInt(a.querySelector('.ph-users-three').nextElementSibling.textContent);
                    const studentsB = parseInt(b.querySelector('.ph-users-three').nextElementSibling.textContent);
                    return studentsB - studentsA;
                
                case 'rating':
                    const ratingA = parseFloat(a.querySelector('.ph-star-fill').nextElementSibling.textContent);
                    const ratingB = parseFloat(b.querySelector('.ph-star-fill').nextElementSibling.textContent);
                    return ratingB - ratingA;
                
                case 'price_low':
                    const priceA = parseInt(a.dataset.price);
                    const priceB = parseInt(b.dataset.price);
                    return priceA - priceB;
                
                case 'price_high':
                    const priceA2 = parseInt(a.dataset.price);
                    const priceB2 = parseInt(b.dataset.price);
                    return priceB2 - priceA2;
                
                default:
                    return 0;
            }
        });
        
        // Re-append sorted cards
        cards.forEach(card => container.appendChild(card));
    }

    // View toggle
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
    }

    // COMMENT DULU
    // function goToDetailKelas(kelasId) {
    //     window.location.href = `/desktop/kelas-pendaftaran${kelasId}`;
    // }

    // function previewKelas(kelasId) {
    //     // Open preview modal or redirect to preview page
    //     window.open(`/desktop/kelas-pendaftaran${kelasId}/preview`, '_blank');
    // }

    // function previewKelas(kelasId) {
    //     window.open('/desktop/kelas-previews');
    // }

    // Load more functionality
    document.getElementById('loadMoreBtn').addEventListener('click', function() {
        // Simulate loading more content
        this.textContent = 'Memuat...';
        this.disabled = true;
        
        setTimeout(() => {
            this.textContent = 'Muat Lebih Banyak';
            this.disabled = false;
            // Add logic to load more courses
        }, 1500);
    });

    // Initialize filters on page load
    document.addEventListener('DOMContentLoaded', function() {
        filterKelas();
    });