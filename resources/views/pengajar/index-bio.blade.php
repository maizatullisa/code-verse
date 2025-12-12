@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="min-h-screen bg-blue-50 to-indigo-100 p-4 md:p-8">
    <!-- Header Section -->
    <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 md:p-8 mb-8 shadow-xl shadow-black/5">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4"> 
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-1">Kelola Biodata</h1>
                    <p class="text-gray-600 text-sm md:text-base">Kelola informasi profil dan biodata pengajar</p>
                </div>
            </div>
            
           <!-- Ganti bagian <div class="flex gap-3"> ini -->

<div class="flex gap-3 flex-wrap">
    <a href="/pengajar/dashboard" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali
    </a>
    
    @if(!$profile)
        <!-- Tombol Edit/Tambah Profile - muncul jika profile BELUM ada -->
        <button onclick="openEditModal()" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-xl transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit Profile
        </button>
    @else
        <!-- Tombol Hapus Profile - hanya muncul jika profile SUDAH ada -->
        <form method="POST" action="{{ route('pengajar.destroy-profile') }}" onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus profile ini?');" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Hapus Profile
            </button>
        </form>
    @endif
</div>
        </div>
    </div>

     @if($profile)
    <!-- Profile Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-8 shadow-xl shadow-black/5">
                <div class="text-center">
                    <div class="relative inline-block mb-6">
                        @if($profile->photo)
                         <img src="{{ asset($profile->photo) }}" alt="Profile Photo" class="w-32 h-32 rounded-full object-cover shadow-lg shadow-blue-500/25 mx-auto">
                        @else
                        <div class="w-32 h-32 bg-blue-500 rounded-full flex items-center justify-center text-4xl shadow-lg shadow-blue-500/25 mx-auto">
                            <span class="text-white">{{ $profile->gender }}</span>
                        </div>
                           <span class="text-white">{{ strtoupper(substr($profile->full_name, 0, 1)) }}</span>
                            </div>
                        @endif
                        <button onclick="openPhotoModal()" class="absolute -bottom-2 -right-2 w-10 h-10 bg-blue-500 hover:bg-blue-600 text-white rounded-full flex items-center justify-center transition shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </button>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $profile->full_name }}</h3>
                    <p class="text-blue-600 font-medium mb-2">{{ ucfirst(str_replace('_', ' ', $profile->academic_position ?? '')) }}</p>
                    <p class="text-gray-600 text-sm">{{ $profile->expertise ?? 'Belum diisi' }}</p>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="text-sm text-gray-600 space-y-2">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                
                            </div>
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ $profile->personal_email ?? 'Belum diisi' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Information Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Information -->
            <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-8 shadow-xl shadow-black/5">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">📋</div>
                        Informasi Personal
                    </h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                            <p class="text-gray-900 font-medium">{{ $profile->full_name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                            <p class="text-gray-900 font-medium">{{ $profile->personal_email ?? 'Belum diisi' }}</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">No. Telepon</label>
                            <p class="text-gray-900 font-medium">{{ $profile->phone ?? 'Belum diisi' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Academic Information -->
            <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-8 shadow-xl shadow-black/5">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">🎓</div>
                        Informasi Akademik
                    </h3>
                    
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Jabatan Akademik</label>
                            <p class="text-gray-900 font-medium">{{ ucfirst(str_replace('_', ' ', $profile->academic_position ?? '')) ?: 'Belum diisi' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Bidang Keahlian</label>
                            <p class="text-gray-900 font-medium">{{ $profile->expertise ?? 'Belum diisi' }}</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Fakultas</label>
                            <p class="text-gray-900 font-medium">{{ $profile->faculty ?? 'Belum diisi' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Prodi</label>
                            <p class="text-gray-900 font-medium">{{  $profile->study_program ?? 'Belum diisi' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Education History -->
    <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-8 shadow-xl shadow-black/5 mb-8">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">📚</div>
                Riwayat Pendidikan
            </h3>
            <button onclick="openEducationModal('create')" class="px-3 py-2 bg-green-600 text-white rounded-lg">
                Tambah Riwayat
            </button>
        </div>
        </div>
      
            <!-- Education Item 1 -->
           <div class="space-y-4" id="educationList">
            @foreach($profile->riwayatPendidikan ?? [] as $edu)
            <div class="border border-gray-200 rounded-2xl p-6 hover:border-purple-200 transition" 
                id="education-{{ $edu->id }}"
                data-jenjang="{{ e($edu->jenjang) }}"
                data-jurusan="{{ e($edu->jurusan) }}"
                data-institusi="{{ e($edu->institusi) }}"
                data-tahun="{{ e($edu->tahun_lulus) }}">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">🎓</div>
                    <div>
                    <h4 class="font-bold text-gray-900">{{ $edu->jenjang }} — {{ $edu->jurusan }}</h4>
                    <p class="text-purple-600 font-medium">{{ $edu->institusi }}</p>
                    </div>
                </div>
                <div class="ml-15 space-y-1">
                    <p class="text-gray-600 text-sm">Tahun: {{ $edu->tahun_lulus ?? '-' }}</p>
                </div>
                </div>

                <div class="flex gap-2">
                <!-- Edit: buka modal pendidikan -->
                <button onclick="openEducationModal('edit', {{ $edu->id }})" class="text-blue-600 hover:text-blue-700 p-2 rounded-lg hover:bg-blue-50 transition" title="Edit data pendidikan ini">
                    <!-- icon edit -->
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </button>

                <!-- Hapus: form submit DELETE -->
                <form method="POST" action="{{ route('pengajar.delete-riwayat', $edu->id) }}" onsubmit="return confirm('Hapus riwayat pendidikan ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition" title="Hapus data pendidikan ini">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    </button>
                </form>
                </div>
            </div>
            </div>
        @endforeach
        </div>
         @endif

        </div>

            <!-- Include Form Modals -->
            @include('pengajar.form-bio')
            <!-- Education Modal (untuk tambah / edit riwayat pendidikan) -->
            <div id="educationModal" class="fixed inset-0 bg-black/50 hidden z-[10000] flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl w-full max-w-2xl overflow-hidden shadow-2xl">
                <div class="bg-indigo-600 p-4 text-white flex justify-between items-center">
                <h3 id="educationModalTitle" class="text-lg font-bold">Tambah Riwayat Pendidikan</h3>
                <button onclick="closeModal('educationModal')" class="hover:bg-white/20 p-2 rounded-lg">✕</button>
                </div>

                <form id="educationForm" method="POST" action="{{ route('pengajar.store-riwayat') }}" class="p-6">
                @csrf
                <input type="hidden" name="_method" id="educationFormMethod" value="POST">
                <input type="hidden" name="profile_pengajar_id" value="{{ $profile->id ?? '' }}">
                <input type="hidden" name="education_id" id="education_id">

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                    <label class="block text-sm font-medium mb-1">Jenjang (contoh: S1)</label>
                    <input type="text" name="jenjang" id="input_jenjang" required class="w-full p-3 border rounded-lg">
                    </div>

                    <div>
                    <label class="block text-sm font-medium mb-1">Jurusan</label>
                    <input type="text" name="jurusan" id="input_jurusan" required class="w-full p-3 border rounded-lg">
                    </div>

                    <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">Institusi</label>
                    <input type="text" name="institusi" id="input_institusi" required class="w-full p-3 border rounded-lg">
                    </div>

                    <div>
                    <label class="block text-sm font-medium mb-1">Tahun Lulus</label>
                    <input type="text" name="tahun_lulus" id="input_tahun" placeholder="2019" class="w-full p-3 border rounded-lg">
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeModal('educationModal')" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
                </form>
            </div>
            </div>


<script>
// Photo upload functionality
function openPhotoModal() {
    showNotification('Fitur upload foto akan segera tersedia', 'info');
}
 
document.addEventListener('DOMContentLoaded', function() { 
    const cards = document.querySelectorAll('.backdrop-blur-xl');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
     
    const educationItems = document.querySelectorAll('#educationList > div');
    educationItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.classList.add('shadow-lg', 'transform', 'scale-[1.02]');
        });
        
        item.addEventListener('mouseleave', function() {
            this.classList.remove('shadow-lg', 'transform', 'scale-[1.02]');
        });
    });
     
    const addButton = document.querySelector('button[onclick="openAddEducationModal()"]');
    if (addButton) {
        setInterval(() => {
            addButton.classList.add('animate-pulse');
            setTimeout(() => {
                addButton.classList.remove('animate-pulse');
            }, 1000);
        }, 5000);
    }
});
 
function showNotification(message, type = 'info', duration = 4000) { 
    const existingNotifications = document.querySelectorAll('.page-notification');
    existingNotifications.forEach(notification => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => notification.remove(), 300);
    });
    
    const notification = document.createElement('div');
    notification.className = `page-notification fixed top-4 right-4 z-[60] p-4 rounded-2xl shadow-2xl transform translate-x-full transition-all duration-300 max-w-sm`;
    
    const colors = {
        success: 'bg-gradient-to-r from-green-500 to-emerald-600 text-white',
        error: 'bg-gradient-to-r from-red-500 to-rose-600 text-white',
        info: 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white',
        warning: 'bg-gradient-to-r from-yellow-500 to-orange-600 text-white'
    };
    
    const icons = {
        success: `<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>`,
        error: `<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>`,
        info: `<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
               </svg>`,
        warning: `<svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                  </svg>`
    };
    
    notification.className += ` ${colors[type]}`;
    notification.innerHTML = `
        <div class="flex items-start gap-3">
            ${icons[type]}
            <div class="flex-1">
                <span class="font-medium text-sm leading-relaxed">${message}</span>
            </div>
            <button onclick="this.closest('.page-notification').style.transform='translateX(100%)'; setTimeout(() => this.closest('.page-notification').remove(), 300);" 
                    class="text-white/80 hover:text-white transition p-1 rounded-lg hover:bg-white/10 flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    `;
    
    document.body.appendChild(notification);
     
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
     
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 300);
        }
    }, duration);
}

function refreshEducationList() {
    const educationList = document.getElementById('educationList');
    educationList.style.opacity = '0.5';
    
    setTimeout(() => {
        educationList.style.opacity = '1';
        showNotification('Data riwayat pendidikan berhasil diperbarui!', 'success');
    }, 1000);
}

function initializeEducationFilters() {
    const searchInput = document.createElement('input');
    searchInput.type = 'text';
    searchInput.placeholder = 'Cari riwayat pendidikan...';
    searchInput.className = 'hidden'; 
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const educationItems = document.querySelectorAll('#educationList > div');
        
        educationItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                item.style.display = 'block';
                item.style.animation = 'fadeIn 0.3s ease';
            } else {
                item.style.display = 'none';
            }
        });
    });
}
document.addEventListener('DOMContentLoaded', initializeEducationFilters);

document.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
        e.preventDefault();
        openEditModal();
    }
    
    if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
        e.preventDefault();
        openAddEducationModal();
    }
});

function initializeTooltips() {
    const buttons = document.querySelectorAll('button[onclick]');
    buttons.forEach(button => {
        if (!button.title) {
            const onclick = button.getAttribute('onclick');
            if (onclick.includes('editEducation')) {
                button.title = 'Edit data pendidikan ini';
            } else if (onclick.includes('deleteEducation')) {
                button.title = 'Hapus data pendidikan ini';
            } else if (onclick.includes('openEditModal')) {
                button.title = 'Edit biodata pengajar (Shortcut: Ctrl+E)';
            } else if (onclick.includes('openAddEducationModal')) {
                button.title = 'Tambah riwayat pendidikan baru (Shortcut: Ctrl+N)';
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', initializeTooltips);
</script>
@endsection