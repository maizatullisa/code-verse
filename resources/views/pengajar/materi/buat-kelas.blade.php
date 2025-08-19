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
    
    <a href="{{ route('pengajar.dashboard') }}" 
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
        
        <!-- Form Section -->
        <div class="md:col-span-2">
          <!-- Alert Messages -->
          @if(session('success'))
          <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl flex items-center space-x-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span>{{ session('success') }}</span>
          </div>
          @endif

          @if($errors->any())
          <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl">
            <div class="flex items-center space-x-3 mb-3">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
              </svg>
              <span class="font-semibold">Terjadi kesalahan:</span>
            </div>
            <ul class="list-disc list-inside space-y-1">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{ route('pengajar.kelas.store') }}" method="POST" enctype="multipart/form-data" id="kelasForm">
            @csrf

            <!-- Basic Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
              
              <!-- Nama Kelas -->
              <div class="lg:col-span-2">
                <label for="nama_kelas" class="block text-sm font-semibold text-gray-800 mb-2">
                  Nama Kelas <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nama_kelas" 
                       name="nama_kelas" 
                       value="{{ old('nama_kelas') }}"
                       placeholder="Contoh: Fullstack Web Development dengan Laravel"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300"
                       required>
                @error('nama_kelas')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- Kategori -->
              <div>
                <label for="kategori" class="block text-sm font-semibold text-gray-800 mb-2">
                  Kategori <span class="text-red-500">*</span>
                </label>
                <select id="kategori" 
                  name="kategori" 
                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300"
                  required>
                  <option value="">Pilih Kategori</option>
                  <option value="programming" {{ old('kategori') == 'programming' ? 'selected' : '' }}>💻 Programming</option>
                  <option value="design" {{ old('kategori') == 'design' ? 'selected' : '' }}>🎨 Design</option>
                  <option value="web" {{ old('kategori') == 'web' ? 'selected' : '' }}>🌐 Web Development</option>
                  <option value="mobile" {{ old('kategori') == 'mobile' ? 'selected' : '' }}>📱 Mobile Development</option>
                  <option value="data" {{ old('kategori') == 'data' ? 'selected' : '' }}>📊 Data Science</option>
                  <option value="ai" {{ old('kategori') == 'ai' ? 'selected' : '' }}>🤖 Artificial Intelligence</option>
                  <option value="marketing" {{ old('kategori') == 'marketing' ? 'selected' : '' }}>📈 Marketing</option>
                  <option value="business" {{ old('kategori') == 'business' ? 'selected' : '' }}>💼 Business</option>
                </select>
                @error('kategori')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- Level -->
              <div>
                <label for="level" class="block text-sm font-semibold text-gray-800 mb-2">
                  Level <span class="text-red-500">*</span>
                </label>
                <select id="level" 
                        name="level" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300"
                        required>
                  <option value="">Pilih Level</option>
                  <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>🟢 Pemula</option>
                  <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>🟡 Menengah</option>
                  <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>🔴 Lanjutan</option>
                </select>
                @error('level')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

            </div>

            <!-- Deskripsi -->
            <div class="mb-8">
              <label for="deskripsi" class="block text-sm font-semibold text-gray-800 mb-2">
                Deskripsi Kelas <span class="text-red-500">*</span>
              </label>
              <textarea id="deskripsi" 
                        name="deskripsi" 
                        rows="4"
                        placeholder="Jelaskan tentang kelas ini, apa yang akan dipelajari, dan tujuan pembelajaran..."
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300 resize-none"
                        required>{{ old('deskripsi') }}</textarea>
              @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Additional Settings -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
              
              <!-- Durasi -->
              <div>
                <label for="durasi" class="block text-sm font-semibold text-gray-800 mb-2">
                  Durasi (Opsional)
                </label>
                <input type="text" 
                       id="durasi" 
                       name="durasi" 
                       value="{{ old('durasi') }}"
                       placeholder="Contoh: 12 minggu"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300">
                @error('durasi')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- Kapasitas -->
              <div>
                <label for="kapasitas" class="block text-sm font-semibold text-gray-800 mb-2">
                  Kapasitas Siswa (Opsional)
                </label>
                <input type="number" 
                       id="kapasitas" 
                       name="kapasitas" 
                       value="{{ old('kapasitas') }}"
                       placeholder="Contoh: 50"
                       min="1"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300">
                <p class="text-xs text-gray-500 mt-1">Kosongkan untuk kapasitas tidak terbatas</p>
                @error('kapasitas')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- Harga -->
              <div>
                <label for="harga" class="block text-sm font-semibold text-gray-800 mb-2">
                  Harga (Opsional)
                </label>
                <input type="number" 
                       id="harga" 
                       name="harga" 
                       value="{{ old('harga') }}"
                       placeholder="Contoh: 150000"
                       min="0"
                       step="1000"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300">
                <p class="text-xs text-gray-500 mt-1">Kosongkan untuk kelas gratis</p>
                @error('harga')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

            </div>

            <!-- Cover Image -->
            <div class="mb-8">
              <label for="cover_image" class="block text-sm font-semibold text-gray-800 mb-2">
                Cover Image (Opsional)
              </label>
              <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-indigo-500 transition-all duration-300" id="dropZone">
                <input type="file" 
                       id="cover_image" 
                       name="cover_image" 
                       accept="image/jpeg,image/png,image/jpg"
                       class="hidden">
                <div id="uploadText">
                  <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                  </svg>
                  <p class="text-gray-600">Klik atau drag & drop gambar cover</p>
                  <p class="text-xs text-gray-500 mt-1">PNG, JPG hingga 2MB</p>
                </div>
                <div id="imagePreview" class="hidden">
                  <img id="previewImg" src="" alt="Preview" class="max-h-48 mx-auto rounded-lg">
                  <p class="text-sm text-gray-600 mt-2" id="fileName"></p>
                  <button type="button" onclick="removeImage()" class="text-red-500 text-sm mt-2 hover:text-red-700">
                    Hapus Gambar
                  </button>
                </div>
              </div>
              @error('cover_image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Status -->
            <div class="mb-8">
              <label for="status" class="block text-sm font-semibold text-gray-800 mb-2">
                Status Kelas <span class="text-red-500">*</span>
              </label>
              <select id="status" 
                      name="status" 
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300"
                      required>
                <option value="">Pilih Status</option>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>✏️ Draft (Belum Dipublikasi)</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>📚 Published (Sudah Dipublikasi)</option>
              </select>
              @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

          </form>
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
      
      <div id="classPreview" class="space-y-6 mb-8">
        <!-- Preview will be populated by JavaScript -->
      </div>

      <!-- Submit Actions di Step 3 -->
      <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-6 border-t border-gray-200">
        <button type="button" 
                onclick="goToPreviousStep()"
                class="bg-gray-400 hover:bg-gray-500 text-white px-8 py-3 rounded-2xl font-semibold transition-all duration-300">
          ← Edit Kembali
        </button>
          <button type="submit"
            id="submitButtonText"
            form="kelasForm"
            class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-8 py-3 rounded-2xl font-semibold transition-all duration-300">
            Buat Kelas
        </button>
      </div>
    </div>
  </div>

  <!-- Navigation Buttons -->
  <div class="flex justify-between items-center mt-8">
    <button type="button"
       id="prevBtn" 
       class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-2xl font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
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

    </div>
  </div>

</div>

<script>
function removeImage() {
    document.getElementById('cover_image').value = '';
    document.getElementById('imagePreview').classList.add('hidden');
    document.getElementById('uploadText').classList.remove('hidden');
}

// PINDAHKAN currentStep ke global scope
let currentStep = 1;
const totalSteps = 3;

function goToPreviousStep() {
    if (currentStep > 1) {
        currentStep--;
        updateStepUI();
    }
}

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

function validateStep1() {
    const requiredFields = ['nama_kelas', 'kategori', 'level', 'deskripsi', 'status'];
    for (let field of requiredFields) {
        const input = document.querySelector(`[name="${field}"]`);
        if (!input || !input.value.trim()) {
            alert(`Field ${field.replace('_', ' ')} harus diisi!`);
            return false;
        }
    }
    return true;
}

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
        console.log('Generating preview...');
        generatePreview();
    }
}

function generatePreview() {
    console.log('=== GENERATE PREVIEW START ===');
    
    const previewContainer = document.getElementById('classPreview');
    
    // Ambil element
    const kategoriElement = document.querySelector('[name="kategori"]');
    const levelElement = document.querySelector('[name="level"]');
    const statusElement = document.querySelector('[name="status"]');
    
    // Debug info
    console.log('Kategori element:', kategoriElement);
    console.log('Kategori value:', kategoriElement?.value);
    console.log('Kategori selectedIndex:', kategoriElement?.selectedIndex);
    console.log('Level element:', levelElement);
    console.log('Level value:', levelElement?.value);
    console.log('Level selectedIndex:', levelElement?.selectedIndex);
    
    // Ambil nilai langsung
    const namaKelas = document.querySelector('[name="nama_kelas"]')?.value || 'Nama Kelas Belum Diisi';
    const deskripsi = document.querySelector('[name="deskripsi"]')?.value || 'Deskripsi belum diisi';
    const durasi = document.querySelector('[name="durasi"]')?.value || 'Tidak ditentukan';
    const kapasitas = document.querySelector('[name="kapasitas"]')?.value || 'Tidak terbatas';
    const harga = document.querySelector('[name="harga"]')?.value || '0';
    
    // Ambil text dengan pengecekan yang lebih ketat
    let kategoriText = 'Kategori Belum Dipilih';
    if (kategoriElement && kategoriElement.selectedIndex > 0) {
        kategoriText = kategoriElement.options[kategoriElement.selectedIndex].text;
    }
    
    let levelText = 'Level Belum Dipilih';
    if (levelElement && levelElement.selectedIndex > 0) {
        levelText = levelElement.options[levelElement.selectedIndex].text;
    }
    
    let statusText = 'Status Belum Dipilih';
    if (statusElement && statusElement.selectedIndex > 0) {
        statusText = statusElement.options[statusElement.selectedIndex].text;
    }
    
    const status = statusElement?.value || '';
    
    console.log('Final values:');
    console.log('Kategori Text:', kategoriText);
    console.log('Level Text:', levelText);
    console.log('Status Text:', statusText);

    // Update submit button text
    const submitBtn = document.getElementById('submitButtonText');
    if (status === 'draft') {
        submitBtn.textContent = 'Simpan sebagai Draft';
    } else if (status === 'published') {
        submitBtn.textContent = 'Buat & Publikasikan';
    } else {
        submitBtn.textContent = 'Buat Kelas';
    }

    previewContainer.innerHTML = `
        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-6 border-2 border-indigo-200">
            <h4 class="text-xl font-bold text-gray-800 mb-4">${namaKelas}</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div class="space-y-2">
                    <p><span class="font-semibold">Kategori:</span> ${kategoriText}</p>
                    <p><span class="font-semibold">Level:</span> ${levelText}</p>
                    <p><span class="font-semibold">Durasi:</span> ${durasi}</p>
                    <p><span class="font-semibold">Kapasitas:</span> ${kapasitas} orang</p>
                </div>
                <div class="space-y-2">
                    <p><span class="font-semibold">Harga:</span> ${harga == '0' ? 'Gratis' : 'Rp ' + new Intl.NumberFormat('id-ID').format(harga)}</p>
                    <p><span class="font-semibold">Status:</span> ${statusText}</p>
                </div>
            </div>
            <div class="mt-4">
                <p class="font-semibold mb-2">Deskripsi:</p>
                <p class="text-gray-600 leading-relaxed">${deskripsi}</p>
            </div>
        </div>
    `;
    
    console.log('=== GENERATE PREVIEW END ===');
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing...');

    // Event listeners
    document.getElementById('nextBtn').addEventListener('click', function() {
        console.log('Next button clicked, current step:', currentStep);
        
        if (currentStep === 1 && !validateStep1()) {
            return;
        }
        
        if (currentStep < totalSteps) {
            currentStep++;
            console.log('Moving to step:', currentStep);
            updateStepUI();
        }
    });

    document.getElementById('prevBtn').addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            updateStepUI();
        }
    });

    // // Test button untuk debug
    // const testBtn = document.createElement('button');
    // testBtn.textContent = 'Test Preview';
    // testBtn.type = 'button';
    // testBtn.className = 'bg-red-500 text-white px-4 py-2 rounded ml-4';
    // testBtn.onclick = function() {
    //     console.log('=== MANUAL TEST ===');
    //     generatePreview();
    // };
    // document.getElementById('nextBtn').parentNode.appendChild(testBtn);

    // Image preview
    document.getElementById('cover_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const uploadText = document.getElementById('uploadText');
        
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
                preview.classList.remove('hidden');
                uploadText.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Click to upload
    document.getElementById('dropZone').addEventListener('click', function() {
        document.getElementById('cover_image').click();
    });

    // Drag and drop
    document.getElementById('dropZone').addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-indigo-500');
    });

    document.getElementById('dropZone').addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-indigo-500');
    });

    document.getElementById('dropZone').addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-indigo-500');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById('cover_image').files = files;
            document.getElementById('cover_image').dispatchEvent(new Event('change'));
        }
    });

    // Initialize
    updateStepUI();

    // CSS
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
    `;
    document.head.appendChild(style);
});
</script>

@endsection