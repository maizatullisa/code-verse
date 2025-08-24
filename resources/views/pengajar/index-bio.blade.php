@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 p-4 md:p-8">
    <!-- Header Section -->
    <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 md:p-8 mb-8 shadow-xl shadow-black/5">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-2xl shadow-lg shadow-blue-500/25">
                    👤
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-1">Kelola Biodata</h1>
                    <p class="text-gray-600 text-sm md:text-base">Kelola informasi profil dan biodata pengajar</p>
                </div>
            </div>
            
            <div class="flex gap-3">
                <a href="/dashboard-pengajar" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
                <button onclick="openEditModal()" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-xl transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Profile
                </button>
            </div>
        </div>
    </div>

    <!-- Profile Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-8 shadow-xl shadow-black/5">
                <div class="text-center">
                    <div class="relative inline-block mb-6">
                        <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-4xl shadow-lg shadow-blue-500/25 mx-auto">
                            <span class="text-white">P</span>
                        </div>
                        <button onclick="openPhotoModal()" class="absolute -bottom-2 -right-2 w-10 h-10 bg-blue-500 hover:bg-blue-600 text-white rounded-full flex items-center justify-center transition shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </button>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Andi Prasetyo</h3>
                    <p class="text-blue-600 font-medium mb-2">Lektor</p>
                    <p class="text-gray-600 text-sm">Security Expert</p>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="text-sm text-gray-600 space-y-2">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>NIP: 000000002</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span>andi.prasetyo@univ.ac.id</span>
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
                    <button onclick="openEditModal('personal')" class="text-blue-600 hover:text-blue-700 p-2 rounded-lg hover:bg-blue-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                            <p class="text-gray-900 font-medium">Andi Prasetyo, S.Kom., M.Kom.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">NIP/NIDN</label>
                            <p class="text-gray-900 font-medium">000000002</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                            <p class="text-gray-900 font-medium">andi.prasetyo@univ.ac.id</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">No. Telepon</label>
                            <p class="text-gray-900 font-medium">+62 812-3456-7890</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Lahir</label>
                            <p class="text-gray-900 font-medium">15 Januari 1985</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Alamat</label>
                            <p class="text-gray-900 font-medium">Jl. Pendidikan No. 123, Jakarta</p>
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
                    <button onclick="openEditModal('academic')" class="text-green-600 hover:text-green-700 p-2 rounded-lg hover:bg-green-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Jabatan Akademik</label>
                            <p class="text-gray-900 font-medium">Lektor</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Bidang Keahlian</label>
                            <p class="text-gray-900 font-medium">Security Expert</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Fakultas</label>
                            <p class="text-gray-900 font-medium">Teknik Informatika</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Prodi</label>
                            <p class="text-gray-900 font-medium">Sistem Informasi</p>
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
            <button onclick="openAddEducationModal()" class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-xl transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah
            </button>
        </div>
        
        <div class="space-y-4">
            <!-- Education Item -->
            <div class="border border-gray-200 rounded-2xl p-6 hover:border-purple-200 transition">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">🎓</div>
                            <div>
                                <h4 class="font-bold text-gray-900">S1. Sistem Informasi</h4>
                                <p class="text-purple-600 font-medium">Universitas Gadjah Mada</p>
                            </div>
                        </div>
                        <div class="ml-15 space-y-1">
                            <p class="text-gray-600 text-sm">Tahun: 2019</p>
                            <p class="text-gray-600 text-sm">IPK: 3.85</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="editEducation(1)" class="text-blue-600 hover:text-blue-700 p-2 rounded-lg hover:bg-blue-50 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                        <button onclick="deleteEducation(1)" class="text-red-600 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Another Education Item -->
            <div class="border border-gray-200 rounded-2xl p-6 hover:border-purple-200 transition">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">🎓</div>
                            <div>
                                <h4 class="font-bold text-gray-900">S2. Cyber Security</h4>
                                <p class="text-purple-600 font-medium">Institut Teknologi Bandung</p>
                            </div>
                        </div>
                        <div class="ml-15 space-y-1">
                            <p class="text-gray-600 text-sm">Tahun: 2022</p>
                            <p class="text-gray-600 text-sm">IPK: 3.92</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="editEducation(2)" class="text-blue-600 hover:text-blue-700 p-2 rounded-lg hover:bg-blue-50 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                        <button onclick="deleteEducation(2)" class="text-red-600 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-3xl p-8 w-full max-w-2xl shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Edit Biodata</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <form id="bioForm" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Depan</label>
                        <input type="text" name="first_name" value="Andi" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Belakang</label>
                        <input type="text" name="last_name" value="Prasetyo" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">NIP/NIDN</label>
                        <input type="text" name="nip" value="000000002" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="andi.prasetyo@univ.ac.id" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                        <input type="tel" name="phone" value="+62 812-3456-7890" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="birth_date" value="1985-01-15" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea name="address" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">Jl. Pendidikan No. 123, Jakarta</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jabatan Akademik</label>
                        <select name="academic_position" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            <option value="Asisten Ahli">Asisten Ahli</option>
                            <option value="Lektor" selected>Lektor</option>
                            <option value="Lektor Kepala">Lektor Kepala</option>
                            <option value="Guru Besar">Guru Besar</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bidang Keahlian</label>
                        <input type="text" name="expertise" value="Security Expert" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                </div>
                
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeEditModal()" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-xl transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Education Modal -->
<div id="addEducationModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-3xl p-8 w-full max-w-lg shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Tambah Pendidikan</h3>
                <button onclick="closeAddEducationModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <form id="educationForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tingkat Pendidikan</label>
                    <select name="degree" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                        <option value="">Pilih Tingkat</option>
                        <option value="S1">S1 - Sarjana</option>
                        <option value="S2">S2 - Magister</option>
                        <option value="S3">S3 - Doktor</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jurusan/Program Studi</label>
                    <input type="text" name="major" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Universitas</label>
                    <input type="text" name="university" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Lulus</label>
                    <input type="number" name="graduation_year" min="1990" max="2030" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">IPK</label>
                    <input type="number" name="gpa" step="0.01" min="0" max="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>
                
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeAddEducationModal()" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-3 bg-purple-500 hover:bg-purple-600 text-white rounded-xl transition">
                        Tambah Pendidikan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Modal Functions
function openEditModal(section = 'all') {
    document.getElementById('editModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function openAddEducationModal() {
    document.getElementById('addEducationModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeAddEducationModal() {
    document.getElementById('addEducationModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function openPhotoModal() {
    alert('Photo upload functionality will be implemented by backend team');
}

function editEducation(id) {
    alert('Edit education with ID: ' + id + ' - Will be implemented by backend team');
}

function deleteEducation(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data pendidikan ini?')) {
        alert('Delete education with ID: ' + id + ' - Will be implemented by backend team');
    }
}

// Form Submissions
document.getElementById('bioForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    alert('Biodata berhasil diperbarui! (Backend integration needed)');
    closeEditModal();
});

document.getElementById('educationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    if (!formData.get('degree') || !formData.get('major') || !formData.get('university')) {
        alert('Mohon lengkapi semua field yang diperlukan');
        return;
    }
    
    alert('Data pendidikan berhasil ditambahkan! (Backend integration needed)');
    closeAddEducationModal();
    
    this.reset();
});

// Close modals when clicking outside
document.addEventListener('click', function(e) {
    if (e.target.id === 'editModal') {
        closeEditModal();
    }
    if (e.target.id === 'addEducationModal') {
        closeAddEducationModal();
    }
});

// Escape key to close modals
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeEditModal();
        closeAddEducationModal();
    }
});
</script>
@endsection