<!-- Edit Profile Modal -->
<div id="editProfileModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[9999] hidden flex items-center justify-center p-4" style="margin-left: 0 !important;">
    <div class="bg-white rounded-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden shadow-2xl">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-4 text-white flex justify-between items-center">
            <h2 class="text-lg font-bold">Edit Biodata Pengajar</h2>
            <button onclick="closeModal('editProfileModal')" class="hover:bg-white/20 p-2 rounded-lg">✕</button>
        </div>

        <!-- Tabs -->
        <div class="flex bg-gray-50 border-b">
            <button onclick="switchTab('personal')" id="tab-personal" class="flex-1 py-3 px-4 font-medium bg-white border-b-2 border-blue-500 text-blue-600">Personal</button>
            <button onclick="switchTab('academic')" id="tab-academic" class="flex-1 py-3 px-4 font-medium text-gray-600 hover:text-gray-900">Akademik</button>
            <button onclick="switchTab('contact')" id="tab-contact" class="flex-1 py-3 px-4 font-medium text-gray-600 hover:text-gray-900">Kontak</button>
        </div>

        <!-- Form Content -->
        <div class="p-6 overflow-y-auto max-h-96">
            <!-- Form langsung submit ke Laravel Controller -->
            <form action="{{ route('pengajar.store-bio') }}" method="POST" enctype="multipart/form-data" id="editProfileForm">
                @csrf
                <input type="hidden" name="_method" value="POST" id="formMethod">
                
                <!-- Personal Tab -->
                <div id="content-personal" class="tab-content">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Nama Lengkap *</label>
                            <input type="text" name="full_name" id="full_name" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Foto Profile</label>
                            <input type="file" name="photo" id="photo" accept="image/*" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <small class="text-gray-500">Maksimal 2MB, format: JPG, PNG</small>
                            <div id="photoPreview" class="mt-2 hidden">
                                <img id="previewImage" class="w-20 h-20 object-cover rounded-lg">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Academic Tab -->
                <div id="content-academic" class="tab-content hidden">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Jabatan Akademik *</label>
                            <input type="text" name="academic_position" id="academic_position" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Bidang Keahlian</label>
                            <input type="text" name="expertise" id="expertise" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Program Studi *</label>
                            <input type="text" name="study_program" id="study_program" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>
                </div>

                <!--  personal kontak -->
                <div id="content-contact" class="tab-content hidden">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">No. Telepon *</label>
                            <input type="tel" name="phone" id="phone" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email Pribadi</label>
                            <input type="email" name="personal_email" id="personal_email" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500">
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex justify-end gap-3 mt-6 pt-4 border-t">
                    <button type="button" onclick="closeModal('editProfileModal')" class="px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Notification Container -->
<div id="notificationContainer" class="fixed top-4 right-4 z-[10000] space-y-2"></div>

<script>
// Simple JavaScript untuk modal dan basic functionality
let currentProfileId = null;

// Fungsi buka modal
function openEditModal(hasExistingData = false) {
    
    if (hasExistingData) {
        // Mode Edit - ubah ke route update
        document.getElementById('editProfileForm').action = '{{ route("pengajar.update-bio") }}';
        document.getElementById('formMethod').value = 'PUT';
        
        // Data akan di-load dari controller (lewat Blade template)
        // Tidak perlu AJAX karena data sudah ada di view
    } else {
        // Mode Create - form baru
        document.getElementById('editProfileForm').action = '{{ route("pengajar.store-bio") }}';
        document.getElementById('formMethod').value = 'POST';
        clearForm();
    }
    
    showModal('editProfileModal');
}

// base URL (untuk update we will append id)
    const storeRiwayatUrl = '{{ route("pengajar.store-riwayat") }}';
    const baseUpdateUrl = '{{ url("/pengajar/pendidikan") }}'; // will append /{id}

    function openEducationModal(mode = 'create', id = null) {
        const modal = document.getElementById('educationModal');
        const form = document.getElementById('educationForm');
        const methodInput = document.getElementById('educationFormMethod');
        document.getElementById('educationModalTitle').textContent = mode === 'edit' ? 'Edit Riwayat Pendidikan' : 'Tambah Riwayat Pendidikan';

    if (mode === 'edit' && id) {
        // ambil element yang ada di list (data-attributes)
        const el = document.getElementById('education-' + id);
        if (!el) { alert('Data pendidikan tidak ditemukan'); return; }

        const jenjang = el.dataset.jenjang || '';
        const jurusan = el.dataset.jurusan || '';
        const institusi = el.dataset.institusi || '';
        const tahun = el.dataset.tahun || '';

        document.getElementById('input_jenjang').value = jenjang;
        document.getElementById('input_jurusan').value = jurusan;
        document.getElementById('input_institusi').value = institusi;
        document.getElementById('input_tahun').value = tahun;
        document.getElementById('education_id').value = id;

        form.action = baseUpdateUrl + '/' + id; // /pengajar/pendidikan/{id}
        methodInput.value = 'PUT';
    } else {
        // create
        document.getElementById('input_jenjang').value = '';
        document.getElementById('input_jurusan').value = '';
        document.getElementById('input_institusi').value = '';
        document.getElementById('input_tahun').value = '';
        document.getElementById('education_id').value = '';

        form.action = storeRiwayatUrl;
        methodInput.value = 'POST';
    }

    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

// helper yang dipanggil dari tombol edit di list
function editEducation(id) {
    openEducationModal('edit', id);
}

// optional: confirm delete via JS (if you want to use JS form submit instead of inline form)
function deleteEducationByFetch(id) {
    if (!confirm('Yakin ingin menghapus?')) return;
    fetch('{{ url('/pengajar/pendidikan') }}/' + id, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    }).then(r => r.json())
      .then(res => {
          if (res.success) {
            showNotification('Riwayat pendidikan dihapus', 'success');
            // reload page or remove element from DOM
            document.getElementById('education-' + id)?.remove();
          } else {
            showNotification('Gagal menghapus', 'error');
          }
      }).catch(()=> showNotification('Terjadi error', 'error'));
}


// Clear form untuk mode create
function clearForm() {
    document.getElementById('editProfileForm').reset();
    document.getElementById('photoPreview').classList.add('hidden');
}

// Photo preview
document.getElementById('photo').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('photoPreview');
    const previewImage = document.getElementById('previewImage');

    if (file) {
        // Validasi ukuran file (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file maksimal 2MB');
            event.target.value = '';
            preview.classList.add('hidden');
            return;
        }

        // Validasi tipe file
        if (!file.type.startsWith('image/')) {
            alert('File harus berupa gambar');
            event.target.value = '';
            preview.classList.add('hidden');
            return;
        }

        // Show preview
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
    }
});

// Form validation sebelum submit
document.getElementById('editProfileForm').addEventListener('submit', function(e) {
    const requiredFields = ['full_name','expertise', 'academic_position', 'faculty', 'study_program', 'personal_email', 'phone', 'gender'];
    let isValid = true;

    requiredFields.forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (!field.value.trim()) {
            field.classList.add('border-red-500');
            isValid = false;
        } else {
            field.classList.remove('border-red-500');
        }
    });

    if (!isValid) {
        e.preventDefault();
        showNotification('Mohon lengkapi semua field yang wajib diisi', 'error');
    }
});

// Modal functions
function showModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove('hidden');
    modal.style.marginLeft = '0';
    modal.style.width = '100vw';
    modal.style.left = '0';
    document.body.style.overflow = 'hidden';
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Tab switching
function switchTab(tab) {
    // Hide semua tab content
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    
    // Reset semua tab button
    document.querySelectorAll('[id^="tab-"]').forEach(el => {
        el.className = 'flex-1 py-3 px-4 font-medium text-gray-600 hover:text-gray-900';
    });
    
    // Show selected tab dan aktifkan button
    document.getElementById(`content-${tab}`).classList.remove('hidden');
    document.getElementById(`tab-${tab}`).className = 'flex-1 py-3 px-4 font-medium bg-white border-b-2 border-blue-500 text-blue-600';
}

// Notification function
function showNotification(message, type = 'info') {
    const container = document.getElementById('notificationContainer');
    const notification = document.createElement('div');
    
    const bgColor = {
        'success': 'bg-green-500',
        'error': 'bg-red-500',
        'warning': 'bg-yellow-500',
        'info': 'bg-blue-500'
    }[type] || 'bg-gray-500';

    notification.innerHTML = `
        <div class="${bgColor} text-white px-6 py-3 rounded-lg shadow-lg flex items-center justify-between min-w-80">
            <span>${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">✕</button>
        </div>
    `;

    container.appendChild(notification);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}

// Close modal saat click outside
document.addEventListener('click', function(e) {
    if (e.target.id && e.target.id.includes('Modal')) {
        closeModal(e.target.id);
    }
});

// Close modal dengan ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal('editProfileModal');
    }
});
</script>