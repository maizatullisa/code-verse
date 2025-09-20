@extends('admin.layouts.master')

@section('content')
<h2 class="text-2xl font-bold mb-4">Sertifikat</h2>

<!-- Search and Filter Form -->
<form method="GET" action="{{ route('admin.sertifikat.index') }}" id="filterForm">
    <div class="mb-6 bg-white p-4 rounded-lg shadow">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Cari Siswa</label>
                <input 
                    type="text" 
                    id="search" 
                    name="search"
                    value="{{ $filters['search'] ?? '' }}"
                    placeholder="Cari berdasarkan nama siswa atau kelas..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>
            <div class="w-full md:w-48">
                <label for="status_filter" class="block text-sm font-medium text-gray-700 mb-2">Filter Status</label>
                <select 
                    id="status_filter" 
                    name="status_filter"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Semua Status</option>
                    <option value="completed" {{ ($filters['status_filter'] ?? '') === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="belum" {{ ($filters['status_filter'] ?? '') === 'belum' ? 'selected' : '' }}>Belum</option>
                </select>
            </div>
            <div class="w-full md:w-32">
                <label for="per_page" class="block text-sm font-medium text-gray-700 mb-2">Per Halaman</label>
                <select 
                    id="per_page" 
                    name="per_page"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="10" {{ ($filters['per_page'] ?? 10) == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ ($filters['per_page'] ?? 10) == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ ($filters['per_page'] ?? 10) == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ ($filters['per_page'] ?? 10) == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Filter
                </button>
                <a href="{{ route('admin.sertifikat.index') }}" class="ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Reset
                </a>
            </div>
        </div>
    </div>
</form>

<!-- Table -->
<div class="bg-white shadow rounded-lg">
    <table class="min-w-full">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 px-4 text-left font-semibold">No</th>
                <th class="py-3 px-4 text-left font-semibold">Nama Siswa</th>
                <th class="py-3 px-4 text-left font-semibold">Kelas</th>
                <th class="py-3 px-4 text-left font-semibold">Status Progress</th>

                <th class="py-3 px-4 text-left font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $pagination['from'] + $index }}</td>
                    <td class="py-3 px-4 font-medium">{{ $item['user_name'] }}</td>
                    <td class="py-3 px-4">{{ $item['kelas_name'] }}</td>
                    <td class="py-3 px-4">
                        @if($item['progress_completed'])
                            <span class="text-green-600 font-semibold">Completed</span>
                        @else
                            <span class="text-red-600 font-semibold">Belum</span>
                        @endif
                    </td>

                    <td class="py-3 px-4">
                        <button 
                            onclick="showStudentModal({{ $item['user_id'] }})"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm transition duration-200"
                        >
                            Detail
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">
                        Tidak ada data yang ditemukan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination Info and Controls -->
@if($pagination['total'] > 0)
<div class="mt-6 flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded-lg shadow">
    <div class="mb-4 md:mb-0">
        <span class="text-sm text-gray-700">
            Menampilkan {{ $pagination['from'] }} sampai {{ $pagination['to'] }} dari {{ $pagination['total'] }} data
        </span>
    </div>
    
    @if($pagination['last_page'] > 1)
    <nav class="flex space-x-2">
        {{-- Previous Button --}}
        @if($pagination['current_page'] > 1)
            <a href="{{ request()->fullUrlWithQuery(['page' => $pagination['current_page'] - 1]) }}" 
               class="px-3 py-2 text-sm bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 rounded-md">
                Previous
            </a>
        @endif

        {{-- Page Numbers --}}
        @php
            $start = max(1, $pagination['current_page'] - 2);
            $end = min($pagination['last_page'], $pagination['current_page'] + 2);
        @endphp

        @if($start > 1)
            <a href="{{ request()->fullUrlWithQuery(['page' => 1]) }}" 
               class="px-3 py-2 text-sm bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 rounded-md">
                1
            </a>
            @if($start > 2)
                <span class="px-2 py-2 text-gray-500">...</span>
            @endif
        @endif

        @for($i = $start; $i <= $end; $i++)
            @if($i == $pagination['current_page'])
                <span class="px-3 py-2 text-sm bg-blue-500 text-white border border-gray-300 rounded-md">
                    {{ $i }}
                </span>
            @else
                <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}" 
                   class="px-3 py-2 text-sm bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 rounded-md">
                    {{ $i }}
                </a>
            @endif
        @endfor

        @if($end < $pagination['last_page'])
            @if($end < $pagination['last_page'] - 1)
                <span class="px-2 py-2 text-gray-500">...</span>
            @endif
            <a href="{{ request()->fullUrlWithQuery(['page' => $pagination['last_page']]) }}" 
               class="px-3 py-2 text-sm bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 rounded-md">
                {{ $pagination['last_page'] }}
            </a>
        @endif

        {{-- Next Button --}}
        @if($pagination['current_page'] < $pagination['last_page'])
            <a href="{{ request()->fullUrlWithQuery(['page' => $pagination['current_page'] + 1]) }}" 
               class="px-3 py-2 text-sm bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 rounded-md">
                Next
            </a>
        @endif
    </nav>
    @endif
</div>
@endif

<!-- Modal -->
<div id="studentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <!-- Modal Header -->
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-xl font-bold text-gray-900">Detail Siswa</h3>
                <button onclick="closeModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Loading State -->
            <div id="modalLoading" class="text-center py-8">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                <p class="mt-2 text-gray-600">Memuat data siswa...</p>
            </div>
            
            <!-- Modal Content -->
            <div id="modalContent" class="hidden">
                <!-- Modal Body -->
                <div class="flex flex-col md:flex-row">
                   <!-- Student Photo -->
                    <div class="mb-4 md:mb-0 md:mr-6 flex-shrink-0">
                        <div class="w-32 h-32 sm:w-36 sm:h-36 rounded-full shadow-lg relative mx-auto">
                            <div id="studentPhotoWrapper">
                                <!-- Ini akan diisi lewat JS -->
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-5 h-5 sm:w-6 sm:h-6 bg-green-500 rounded-full border-2 border-white"></div>
                        </div>
                    </div>

                    
                    <!-- Student Info -->
                    <div class="flex-1">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama</label>
                            <p id="studentName" class="mt-1 text-lg font-semibold text-gray-900"></p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <p id="studentEmail" class="mt-1 text-gray-900"></p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Gender</label>
                            <p id="studentGender" class="mt-1 text-gray-900"></p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Kelas yang Diikuti</label>
                            <div id="studentClasses" class="mt-2 space-y-2">
                                <!-- Classes will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div class="flex justify-end pt-4 border-t">
                    <button onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Get grouped users data for modal
const groupedUsers = @json($groupedUsers);

// Auto-submit form on select change
document.getElementById('search').addEventListener('keyup', function(e) {
    if (e.key === 'Enter') {
        document.getElementById('filterForm').submit();
    }
});

document.getElementById('status_filter').addEventListener('change', function() {
    document.getElementById('filterForm').submit();
});

document.getElementById('per_page').addEventListener('change', function() {
    document.getElementById('filterForm').submit();
});

// Modal functions
function showStudentModal(userId) {
    // Show modal and loading state
    document.getElementById('studentModal').classList.remove('hidden');
    document.getElementById('modalLoading').classList.remove('hidden');
    document.getElementById('modalContent').classList.add('hidden');
    
    // Find student data
    const student = groupedUsers.find(user => user.user_id == userId);
    
    if (!student) {
        alert('Data siswa tidak ditemukan');
        closeModal();
        return;
    }
    
    // Simulate loading delay (remove this in production if not needed)
    setTimeout(() => {
        populateModal(student);
    }, 500);
}

function populateModal(student) {
    // Populate modal with student data
    document.getElementById('studentName').textContent = student.user_name;
    document.getElementById('studentEmail').textContent = student.user_email || 'Email tidak tersedia';
    document.getElementById('studentGender').textContent = getGenderText(student.user_gender);

    // Student photo or initials
        const photoWrapper = document.getElementById('studentPhotoWrapper');
        photoWrapper.innerHTML = '';

        if (student.user_photo) {
            // Jika ada foto
            photoWrapper.innerHTML = `
                <img src="${student.user_photo}" alt="Foto Profil" class="w-full h-full object-cover rounded-full">
            `;
        } else {
            // Jika tidak ada foto, pakai inisial
            const inisial = student.user_name ? student.user_name.charAt(0).toUpperCase() : '?';
            photoWrapper.innerHTML = `
                <div class="text-black w-full h-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center text-3xl font-bold rounded-full">
                    ${inisial}
                </div>
            `;
        }

    
    // Populate classes
    const classesContainer = document.getElementById('studentClasses');
    classesContainer.innerHTML = '';
    
    student.kelas_info.forEach(kelas => {
        const classDiv = document.createElement('div');
        classDiv.className = 'flex justify-between items-center p-3 bg-gray-50 rounded border';
        
        let statusClass = '';
        let statusText = '';
        let certificateButton = '';
        
        if (kelas.progress_completed) {
            statusClass = 'text-green-600 font-semibold';
            statusText = 'Completed';
            
            if (kelas.certificate) {
                certificateButton = `
                    <span class="ml-2 text-green-600 text-xs font-semibold">✓ Sertifikat Tersedia</span>
                `;
            } else {
                certificateButton = '<span class="ml-2 text-yellow-600 text-xs">Sertifikat sedang diproses</span>';
            }
        } else {
            statusClass = 'text-red-600 font-semibold';
            statusText = 'Belum Selesai';
        }
        
        classDiv.innerHTML = `
            <div class="flex-1">
                <span class="text-gray-900 font-medium block">${kelas.kelas_name}</span>
                <div class="flex items-center mt-1">
                    <span class="${statusClass} text-sm">${statusText}</span>
                    ${certificateButton}
                </div>
            </div>
        `;
        
        classesContainer.appendChild(classDiv);
    });
    
    // Hide loading and show content
    document.getElementById('modalLoading').classList.add('hidden');
    document.getElementById('modalContent').classList.remove('hidden');
}

function getGenderText(gender) {
    switch(gender) {
        case 'male': return 'Laki-laki';
        case 'female': return 'Perempuan';
        default: return 'Tidak diketahui';
    }
}

function closeModal() {
    document.getElementById('studentModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('studentModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>
@endsection