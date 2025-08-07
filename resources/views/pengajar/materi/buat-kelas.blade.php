@extends('pengajar.layouts.navbar-pengajar')

@section('content')
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
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-2">Buat Kelas Baru</h1>
        <p class="text-gray-600 text-lg">Mulai perjalanan pembelajaran dengan membuat kelas</p>
      </div>
    </div>
    
    <a href="{{ route('/pengajar/dashboard') }}" 
       class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-6 py-3 rounded-2xl font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
      </svg>
      <span>Kembali</span>
    </a>
  </div>
</div>

<!-- Main Form -->
<div class="max-w-4xl mx-auto">
  <form action="{{ route('pengajar.kelas.store') }}" method="POST" enctype="multipart/form-data" id="createClassForm">
    @csrf
    
    <!-- Step Progress -->
    <div class="mb-8">
      <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-4">
          <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full flex items-center justify-center font-bold step-indicator active" data-step="1">
            1
          </div>
          <div class="hidden sm:block w-16 h-1 bg-gray-200 step-line"></div>
          <div class="w-10 h-10 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-bold step-indicator" data-step="2">
            2
          </div>
          <div class="hidden sm:block w-16 h-1 bg-gray-200 step-line"></div>
          <div class="w-10 h-10 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-bold step-indicator" data-step="3">
            3
          </div>
        </div>
        <div class="text-sm text-gray-500">
          Step <span id="currentStep">1</span> of 3
        </div>
      </div>
      <div class="text-center">
        <h2 id="stepTitle" class="text-xl font-semibold text-gray-800">Informasi Dasar Kelas</h2>
        <p id="stepDescription" class="text-gray-600 mt-1">Isi informasi dasar tentang kelas yang akan Anda buat</p>
      </div>
    </div>

    <!-- Step 1: Basic Information -->
    <div class="step-content active" id="step1">
      <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-3xl p-8 shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          
          <!-- Nama Kelas -->
          <div class="md:col-span-2">
            <label for="nama_kelas" class="block text-sm font-semibold text-gray-700 mb-3">
              <span class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <span>Nama Kelas *</span>
              </span>
            </label>
            <input type="text" 
                   id="nama_kelas" 
                   name="nama_kelas" 
                   required
                   class="w-full px-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300 text-gray-800 placeholder-gray-400"
                   placeholder="Contoh: Web Development Fundamentals">
          </div>

          <!-- Kategori -->
          <div>
            <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-3">
              <span class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                <span>Kategori *</span>
              </span>
            </label>
            <select id="kategori" 
                    name="kategori" 
                    required
                    class="w-full px-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition-all duration-300 text-gray-800">
              <option value="">Pilih Kategori</option>
              <option value="programming">💻 Programming</option>
              <option value="design">🎨 Design</option>
              <option value="web">🌐 Web Development</option>
              <option value="mobile">📱 Mobile Development</option>
              <option value="data">📊 Data Science</option>
              <option value="ai">🤖 Artificial Intelligence</option>
              <option value="marketing">📈 Digital Marketing</option>
              <option value="business">💼 Business</option>
            </select>
          </div>

          <!-- Level -->
          <div>
            <label for="level" class="block text-sm font-semibold text-gray-700 mb-3">
              <span class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
                <span>Level *</span>
              </span>
            </label>
            <select id="level" 
                    name="level" 
                    required
                    class="w-full px-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-green-500 focus:ring-4 focus:ring-green-500/20 transition-all duration-300 text-gray-800">
              <option value="">Pilih Level</option>
              <option value="beginner">🟢 Pemula</option>
              <option value="intermediate">🟡 Menengah</option>
              <option value="advanced">🔴 Lanjutan</option>
            </select>
          </div>

          <!-- Deskripsi -->
          <div class="md:col-span-2">
            <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-3">
              <span class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                </svg>
                <span>Deskripsi Kelas *</span>
              </span>
            </label>
            <textarea id="deskripsi" 
                      name="deskripsi" 
                      rows="4" 
                      required
                      class="w-full px-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 transition-all duration-300 text-gray-800 placeholder-gray-400 resize-none"
                      placeholder="Jelaskan apa yang akan dipelajari dalam kelas ini, tujuan pembelajaran, dan manfaat yang akan didapat oleh peserta..."></textarea>
          </div>

        </div>
      </div>
    </div>

    <!-- Step 2: Additional Details -->
    <div class="step-content" id="step2">
      <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-3xl p-8 shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          
          <!-- Durasi -->
          <div>
            <label for="durasi" class="block text-sm font-semibold text-gray-700 mb-3">
              <span class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Durasi Kelas</span>
              </span>
            </label>
            <input type="text" 
                   id="durasi" 
                   name="durasi" 
                   class="w-full px-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-orange-500 focus:ring-4 focus:ring-orange-500/20 transition-all duration-300 text-gray-800 placeholder-gray-400"
                   placeholder="Contoh: 8 minggu, 20 jam">
          </div>

          <!-- Kapasitas -->
          <div>
            <label for="kapasitas" class="block text-sm font-semibold text-gray-700 mb-3">
              <span class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                </svg>
                <span>Kapasitas Maksimal</span>
              </span>
            </label>
            <input type="number" 
                   id="kapasitas" 
                   name="kapasitas" 
                   min="1"
                   class="w-full px-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-pink-500 focus:ring-4 focus:ring-pink-500/20 transition-all duration-300 text-gray-800 placeholder-gray-400"
                   placeholder="Contoh: 30">
          </div>

          <!-- Harga -->
          <div>
            <label for="harga" class="block text-sm font-semibold text-gray-700 mb-3">
              <span class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                </svg>
                <span>Harga</span>
              </span>
            </label>
            <div class="relative">
              <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">Rp</span>
              <input type="number" 
                     id="harga" 
                     name="harga" 
                     min="0"
                     class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-yellow-500 focus:ring-4 focus:ring-yellow-500/20 transition-all duration-300 text-gray-800 placeholder-gray-400"
                     placeholder="0">
            </div>
            <p class="text-xs text-gray-500 mt-2">Kosongkan atau isi 0 jika kelas gratis</p>
          </div>

          <!-- Status -->
          <div>
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-3">
              <span class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Status Publikasi</span>
              </span>
            </label>
            <select id="status" 
                    name="status"
                    class="w-full px-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all duration-300 text-gray-800">
              <option value="draft">✏️ Draft</option>
              <option value="published">📚 Published</option>
            </select>
          </div>

          <!-- Cover Image -->
          <div class="md:col-span-2">
            <label for="cover_image" class="block text-sm font-semibold text-gray-700 mb-3">
              <span class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Cover Kelas</span>
              </span>
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center hover:border-indigo-400 transition-colors duration-300">
              <input type="file" 
                     id="cover_image" 
                     name="cover_image" 
                     accept="image/*"
                     class="hidden">
              <div id="imagePreview" class="mb-4"></div>
              <label for="cover_image" class="cursor-pointer">
                <div class="flex flex-col items-center space-y-2">
                  <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                  </svg>
                  <span class="text-gray-600 font-medium">Click to upload cover image</span>
                  <span class="text-gray-400 text-sm">PNG, JPG up to 2MB</span>
                </div>
              </label>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Step 3: Preview & Confirm -->
    <div class="step-content" id="step3">
      <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-3xl p-8 shadow-lg">
        <div class="text-center mb-8">
          <h3 class="text-2xl font-bold text-gray-800 mb-2">Preview Kelas</h3>
          <p class="text-gray-600">Periksa kembali informasi kelas sebelum disimpan</p>
        </div>
        
        <div id="classPreview" class="space-y-6">
          <!-- Preview will be populated by JavaScript -->
        </div>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-between items-center mt-8">
      <button type="button" 
              id="prevBtn" 
              class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-2xl font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
              disabled>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        <span>Sebelumnya</span>
      </button>

      <div class="flex space-x-4">
        <button type="button" 
                id="nextBtn" 
                class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-6 py-3 rounded-2xl font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
          <span>Selanjutnya</span>
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
          </svg>
        </button>

        <button type="submit" 
                id="submitBtn" 
                class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-6 py-3 rounded-2xl font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 hidden">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
          </svg>
          <span>Buat Kelas</span>
        </button>
      </div>
    </div>

  </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentStep = 1;
    const totalSteps = 3;
    
    const stepTitles = {
        1: 'Informasi Dasar Kelas',
        2: 'Detail Tambahan',
        3: 'Preview & Konfirmasi'
    };
    
    const stepDescriptions = {
        1: 'Isi informasi dasar tentang kelas yang akan Anda buat',
        2: 'Tambahkan detail lainnya untuk melengkapi kelas Anda',
        3: 'Periksa kembali informasi kelas sebelum disimpan'
    };

    function updateStepUI() {
        // Update step indicators
        document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
            const stepNum = index + 1;
            if (stepNum === currentStep) {
                indicator.className = 'w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full flex items-center justify-center font-bold step-indicator active';
            } else if (stepNum < currentStep) {
                indicator.className = 'w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center font-bold step-indicator completed';
                indicator.innerHTML = '✓';
            } else {
                indicator.className = 'w-10 h-10 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-bold step-indicator';
                indicator.innerHTML = stepNum;
            }
        });

        // Update step content
        document.querySelectorAll('.step-content').forEach((content, index) => {
            content.classList.toggle('active', index + 1 === currentStep);
        });

        // Update title and description
        document.getElementById('currentStep').textContent = currentStep;
        document.getElementById('stepTitle').textContent = stepTitles[currentStep];
        document.getElementById('stepDescription').textContent = stepDescriptions[currentStep];

        // Update buttons
        document.getElementById('prevBtn').disabled = currentStep === 1;
        document.getElementById('nextBtn').style.display = currentStep === totalSteps ? 'none' : 'flex';
        document.getElementById('submitBtn').style.display = currentStep === totalSteps ? 'flex' : 'none';

        // Update step lines
        document.querySelectorAll('.step-line').forEach((line, index) => {
            if (index + 1 < currentStep) {
                line.className = 'hidden sm:block w-16 h-1 bg-green-500 step-line';
            } else {
                line.className = 'hidden sm:block w-16 h-1 bg-gray-200 step-line';
            }
        });

        // Generate preview if on step 3
        if (currentStep === 3) {
            generatePreview();
        }
    }

    function generatePreview() {
        const formData = new FormData(document.getElementById('createClassForm'));
        const previewContainer = document.getElementById('classPreview');
        
        const namaKelas = formData.get('nama_kelas') || 'Nama Kelas Belum Diisi';
        const kategori = formData.get('kategori') || 'Kategori Belum Dipilih';
        const level = formData.get('level') || 'Level Belum Dipilih';
        const deskripsi = formData.get('deskripsi') || 'Deskripsi belum diisi';
        const durasi = formData.get('durasi') || 'Tidak ditentukan';
        const kapasitas = formData.get('kapasitas') || 'Tidak terbatas';
        const harga = formData.get('harga') || '0';
        const status = formData.get('status') || 'draft';

        const kategoriLabels = {
            'programming': '💻 Programming',
            'design': '🎨 Design',
            'web': '🌐 Web Development',
            'mobile': '📱 Mobile Development',
            'data': '📊 Data Science',
            'ai': '🤖 Artificial Intelligence',
            'marketing': '📈 Digital Marketing',
            'business': '💼 Business'
        };

        const levelLabels = {
            'beginner': '🟢 Pemula',
            'intermediate': '🟡 Menengah',
            'advanced': '🔴 Lanjutan'
        };

        const statusLabels = {
            'draft': '✏️ Draft',
            'published': '📚 Published'
        };

        previewContainer.innerHTML = `
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-6 border-2 border-indigo-200">
                <h4 class="text-xl font-bold text-gray-800 mb-4">${namaKelas}</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div class="space-y-2">
                        <p><span class="font-semibold">Kategori:</span> ${kategoriLabels[kategori] || kategori}</p>
                        <p><span class="font-semibold">Level:</span> ${levelLabels[level] || level}</p>
                        <p><span class="font-semibold">Durasi:</span> ${durasi}</p>
                        <p><span class="font-semibold">Kapasitas:</span> ${kapasitas} orang</p>
                    </div>
                    <div class="space-y-2">
                        <p><span class="font-semibold">Harga:</span> ${harga == '0' ? 'Gratis' : 'Rp ' + new Intl.NumberFormat('id-ID').format(harga)}</p>
                        <p><span class="font-semibold">Status:</span> ${statusLabels[status] || status}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="font-semibold mb-2">Deskripsi:</p>
                    <p class="text-gray-600 leading-relaxed">${deskripsi}</p>
                </div>
            </div>
        `;
    }

    // Event listeners
    document.getElementById('nextBtn').addEventListener('click', function() {
        if (currentStep < totalSteps) {
            currentStep++;
            updateStepUI();
        }
    });

    document.getElementById('prevBtn').addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            updateStepUI();
        }
    });

    // Image preview
    document.getElementById('cover_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <div class="relative">
                        <img src="${e.target.result}" alt="Preview" class="w-full h-48 object-cover rounded-xl">
                        <button type="button" onclick="removeImage()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove image function
    window.removeImage = function() {
        document.getElementById('cover_image').value = '';
        document.getElementById('imagePreview').innerHTML = '';
    };

    // Form submission with redirect to index-materi
    document.getElementById('createClassForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Memproses...
        `;
        submitBtn.disabled = true;

        // Simulate form submission (replace with actual form submission)
        setTimeout(() => {
            // Show success notification
            showNotification('Kelas berhasil dibuat!', 'success');
            
            // Redirect to index-materi after 2 seconds
            setTimeout(() => {
                window.location.href = "{{ route('pengajar.materi.index') }}";
            }, 2000);
        }, 1500);
    });

    // Notification function
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-2xl shadow-lg transform transition-all duration-500 ${
            type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
        }`;
        notification.innerHTML = `
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    ${type === 'success' 
                        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>'
                        : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>'
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
                document.body.removeChild(notification);
            }, 500);
        }, 3000);
    }

    // Initialize
    updateStepUI();

    // Add some nice animations
    const style = document.createElement('style');
    style.textContent = `
        .step-content {
            display: none;
            animation: fadeInUp 0.5s ease-out;
        }
        
        .step-content.active {
            display: block;
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
        
        .step-indicator {
            transition: all 0.3s ease;
        }
        
        .step-line {
            transition: all 0.3s ease;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
        }
        
        .form-group {
            position: relative;
        }
        
        .floating-label {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            padding: 0 8px;
            color: #6b7280;
            transition: all 0.2s ease;
            pointer-events: none;
        }
        
        input:focus + .floating-label,
        input:not(:placeholder-shown) + .floating-label,
        select:focus + .floating-label,
        textarea:focus + .floating-label,
        textarea:not(:placeholder-shown) + .floating-label {
            top: 0;
            font-size: 12px;
            color: #4f46e5;
        }
    `;
    document.head.appendChild(style);
});
</script>

@endsection