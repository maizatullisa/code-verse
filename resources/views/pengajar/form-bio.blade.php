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
            <form id="editProfileForm">
                <!-- Personal Tab -->
                <div id="content-personal" class="tab-content">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium mb-1">Nama Lengkap *</label>
                            <input type="text" name="full_name" value="Andi Prasetyo, S.Kom., M.Kom." class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500"></div>
                        <div><label class="block text-sm font-medium mb-1">NIP/NIDN *</label>
                            <input type="text" name="nip" value="000000002" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500"></div>
                        <div><label class="block text-sm font-medium mb-1">Tanggal Lahir</label>
                            <input type="date" name="birth_date" value="1985-01-15" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500"></div>
                        <div><label class="block text-sm font-medium mb-1">Jenis Kelamin</label>
                            <select name="gender" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="L" selected>Laki-laki</option><option value="P">Perempuan</option></select></div>
                        <div class="md:col-span-2"><label class="block text-sm font-medium mb-1">Alamat</label>
                            <textarea name="address" rows="2" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">Jl. Pendidikan No. 123, Jakarta</textarea></div>
                    </div>
                </div>

                <!-- Academic Tab -->
                <div id="content-academic" class="tab-content hidden">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium mb-1">Jabatan Akademik *</label>
                            <select name="academic_position" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                                <option value="lektor" selected>Lektor</option><option value="asisten_ahli">Asisten Ahli</option></select></div>
                        <div><label class="block text-sm font-medium mb-1">Bidang Keahlian</label>
                            <input type="text" name="expertise" value="Security Expert" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500"></div>
                        <div><label class="block text-sm font-medium mb-1">Fakultas *</label>
                            <input type="text" name="faculty" value="Teknik Informatika" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500"></div>
                        <div><label class="block text-sm font-medium mb-1">Program Studi *</label>
                            <input type="text" name="study_program" value="Sistem Informasi" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500"></div>
                    </div>
                </div>

                <!-- Contact Tab -->
                <div id="content-contact" class="tab-content hidden">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium mb-1">Email Institusi *</label>
                            <input type="email" name="institutional_email" value="andi.prasetyo@univ.ac.id" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500"></div>
                        <div><label class="block text-sm font-medium mb-1">No. Telepon *</label>
                            <input type="tel" name="phone" value="+62 812-3456-7890" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500"></div>
                        <div><label class="block text-sm font-medium mb-1">Email Pribadi</label>
                            <input type="email" name="personal_email" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500"></div>
                        <div><label class="block text-sm font-medium mb-1">WhatsApp</label>
                            <input type="tel" name="whatsapp" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500"></div>
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

<!-- Add Education Modal -->
<div id="addEducationModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[9999] hidden flex items-center justify-center p-4" style="margin-left: 0 !important;">
    <div class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl">
        <div class="bg-gradient-to-r from-purple-500 to-pink-600 p-4 text-white flex justify-between items-center rounded-t-2xl">
            <h2 class="text-lg font-bold">Tambah Riwayat Pendidikan</h2>
            <button onclick="closeModal('addEducationModal')" class="hover:bg-white/20 p-2 rounded-lg">✕</button>
        </div>
        <div class="p-6">
            <form id="addEducationForm">
                <div class="grid md:grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Jenjang *</label>
                        <select name="degree_level" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">Pilih jenjang</option><option value="S1">S1 - Sarjana</option><option value="S2">S2 - Magister</option><option value="S3">S3 - Doktor</option></select></div>
                    <div><label class="block text-sm font-medium mb-1">Program Studi *</label>
                        <input type="text" name="study_program" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500"></div>
                    <div class="md:col-span-2"><label class="block text-sm font-medium mb-1">Universitas *</label>
                        <input type="text" name="university" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500"></div>
                    <div><label class="block text-sm font-medium mb-1">Tahun Lulus *</label>
                        <input type="number" name="graduation_year" required min="1950" max="2024" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500"></div>
                    <div><label class="block text-sm font-medium mb-1">IPK</label>
                        <input type="number" name="gpa" step="0.01" min="0" max="4" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-500"></div>
                </div>
                <div class="flex justify-end gap-3 mt-6 pt-4 border-t">
                    <button type="button" onclick="closeModal('addEducationModal')" class="px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                    <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Education Modal -->
<div id="editEducationModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[9999] hidden flex items-center justify-center p-4" style="margin-left: 0 !important;">
    <div class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl">
        <div class="bg-gradient-to-r from-blue-500 to-teal-600 p-4 text-white flex justify-between items-center rounded-t-2xl">
            <h2 class="text-lg font-bold">Edit Riwayat Pendidikan</h2>
            <button onclick="closeModal('editEducationModal')" class="hover:bg-white/20 p-2 rounded-lg">✕</button>
        </div>
        <div class="p-6">
            <form id="editEducationForm">
                <input type="hidden" name="education_id" id="edit_education_id">
                <div class="grid md:grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Jenjang *</label>
                        <select name="degree_level" id="edit_degree_level" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="S1">S1 - Sarjana</option><option value="S2">S2 - Magister</option></select></div>
                    <div><label class="block text-sm font-medium mb-1">Program Studi *</label>
                        <input type="text" name="study_program" id="edit_study_program" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500"></div>
                    <div class="md:col-span-2"><label class="block text-sm font-medium mb-1">Universitas *</label>
                        <input type="text" name="university" id="edit_university" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500"></div>
                    <div><label class="block text-sm font-medium mb-1">Tahun Lulus *</label>
                        <input type="number" name="graduation_year" id="edit_graduation_year" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500"></div>
                    <div><label class="block text-sm font-medium mb-1">IPK</label>
                        <input type="number" name="gpa" id="edit_gpa" step="0.01" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500"></div>
                </div>
                <div class="flex justify-end gap-3 mt-6 pt-4 border-t">
                    <button type="button" onclick="closeModal('editEducationModal')" class="px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteEducationModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[9999] hidden flex items-center justify-center p-4" style="margin-left: 0 !important;">
    <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl">
        <div class="bg-gradient-to-r from-red-500 to-rose-600 p-4 text-white rounded-t-2xl">
            <h2 class="text-lg font-bold">Konfirmasi Hapus</h2>
        </div>
        <div class="p-6 text-center">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <h3 class="text-lg font-bold mb-2">Hapus Riwayat Pendidikan?</h3>
            <p class="text-gray-600 mb-6">Data yang sudah dihapus tidak dapat dikembalikan.</p>
            <div class="flex justify-center gap-3">
                <button onclick="closeModal('deleteEducationModal')" class="px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                <button onclick="confirmDeleteEducation()" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
let currentEducationId = null;

// Modal functions
function openEditModal() { showModal('editProfileModal'); }
function openAddEducationModal() { showModal('addEducationModal'); }

function editEducation(id) {
    currentEducationId = id;
    const data = { 1: {degree_level: 'S1', study_program: 'Sistem Informasi', university: 'Universitas Gadjah Mada', graduation_year: 2019, gpa: 3.85}, 
                   2: {degree_level: 'S2', study_program: 'Cyber Security', university: 'Institut Teknologi Bandung', graduation_year: 2022, gpa: 3.92} }[id];
    if (data) {
        Object.keys(data).forEach(key => {
            const el = document.getElementById(`edit_${key}`);
            if (el) el.value = data[key];
        });
    }
    showModal('editEducationModal');
}

function deleteEducation(id) { currentEducationId = id; showModal('deleteEducationModal'); }

function showModal(id) { 
    const modal = document.getElementById(id);
    modal.classList.remove('hidden'); 
    modal.style.marginLeft = '0';
    modal.style.width = '100vw';
    modal.style.left = '0';
    document.body.style.overflow = 'hidden'; 
}
function closeModal(id) { document.getElementById(id).classList.add('hidden'); document.body.style.overflow = 'auto'; }

function switchTab(tab) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('[id^="tab-"]').forEach(el => el.className = 'flex-1 py-3 px-4 font-medium text-gray-600 hover:text-gray-900');
    document.getElementById(`content-${tab}`).classList.remove('hidden');
    document.getElementById(`tab-${tab}`).className = 'flex-1 py-3 px-4 font-medium bg-white border-b-2 border-blue-500 text-blue-600';
}

function confirmDeleteEducation() {
    if (!currentEducationId) return;
    const item = document.getElementById(`education-${currentEducationId}`);
    if (item) item.remove();
    closeModal('deleteEducationModal');
    showNotification('Riwayat pendidikan berhasil dihapus!', 'success');
}

// Form submissions
['editProfileForm', 'addEducationForm', 'editEducationForm'].forEach(formId => {
    document.getElementById(formId).addEventListener('submit', function(e) {
        e.preventDefault();
        const modal = this.closest('[id$="Modal"]').id;
        closeModal(modal);
        showNotification('Data berhasil disimpan!', 'success');
    });
});

// Close on outside click
document.addEventListener('click', function(e) {
    if (e.target.id && e.target.id.includes('Modal')) closeModal(e.target.id);
});

// ESC key to close
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        ['editProfileModal', 'addEducationModal', 'editEducationModal', 'deleteEducationModal'].forEach(closeModal);
    }
});
</script>