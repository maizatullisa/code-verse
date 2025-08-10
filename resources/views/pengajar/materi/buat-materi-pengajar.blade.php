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
<div class="bg-gradient-to-br from-green-50 to-blue-100 rounded-3xl p-8 shadow-xl border border-white/20 backdrop-blur-sm mb-8">
  <div class="flex items-center space-x-4">
    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
      <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
      </svg>
    </div>
    <div>
      <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-2">Tambah Materi Baru</h1>
      <p class="text-gray-600 text-lg">Lengkapi informasi untuk membuat materi pembelajaran</p>
    </div>
  </div>
</div>

<!-- Form Section -->
<div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-3xl p-8 shadow-xl">
  <form action="#" method="POST" enctype="multipart/form-data" class="space-y-8">
    @csrf
    @if($kelas)
    <!-- Jika dari kelas tertentu, hidden input -->
    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
    <div class="mb-4 p-4 bg-blue-50 rounded-lg">
        <p class="text-blue-800">Membuat materi untuk kelas: <strong>{{ $kelas->nama_kelas }}</strong></p>
    </div>
    @else
        <!-- Jika tidak, dropdown pilihan -->
        <select name="kelas_id" class="...">
            <option value="">Pilih Kelas (Opsional)</option>
            @foreach($allKelas as $kelasOption)
                <option value="{{ $kelasOption->id }}">{{ $kelasOption->nama_kelas }}</option>
            @endforeach
        </select>
    @endif
    <!-- Judul Materi -->
    <div class="space-y-3">
      <label class="block text-sm font-semibold text-gray-700 mb-2">
        📚 Judul Materi
        <span class="text-red-500">*</span>
      </label>
      <input 
        type="text" 
        name="judul" 
        class="w-full p-4 border border-gray-200 rounded-2xl bg-white/70 backdrop-blur-sm focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300 placeholder-gray-400"
        placeholder="Contoh: Pengenalan HTML untuk Pemula"
        required
      >
      <p class="text-xs text-gray-500">💡 Gunakan judul yang jelas dan deskriptif</p>
    </div>

    <!-- Kategori -->
    <div class="space-y-3">
      <label class="block text-sm font-semibold text-gray-700 mb-2">
        🏷️ Kategori
      </label>
      <select name="kategori" class="w-full p-4 border border-gray-200 rounded-2xl bg-white/70 backdrop-blur-sm focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300">
        <option value="">Pilih kategori materi...</option>
        <option value="programming">💻 Programming</option>
        <option value="design">🎨 Design</option>
        <option value="data">📊 Data Science</option>
        <option value="mobile">📱 Mobile Development</option>
        <option value="web">🌐 Web Development</option>
        <option value="other">🔧 Lainnya</option>
      </select>
    </div>

    <!-- Deskripsi -->
    <div class="space-y-3">
      <label class="block text-sm font-semibold text-gray-700 mb-2">
        📝 Deskripsi Materi
        <span class="text-red-500">*</span>
      </label>
      <textarea 
        name="deskripsi" 
        rows="6"
        class="w-full p-4 border border-gray-200 rounded-2xl bg-white/70 backdrop-blur-sm focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300 resize-none placeholder-gray-400"
        placeholder="Jelaskan apa yang akan dipelajari siswa, tujuan pembelajaran, dan hal-hal penting lainnya..."
        required
      ></textarea>
      <p class="text-xs text-gray-500">💡 Jelaskan dengan detail agar siswa memahami isi materi</p>
    </div>

    <!-- Level Kesulitan -->
    <div class="space-y-3">
      <label class="block text-sm font-semibold text-gray-700 mb-2">
        📈 Level Kesulitan
      </label>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <label class="relative">
          <input type="radio" name="level" value="beginner" class="peer sr-only">
          <div class="p-4 border-2 border-gray-200 rounded-2xl text-center cursor-pointer peer-checked:border-green-400 peer-checked:bg-green-50 hover:bg-gray-50 transition-all duration-300">
            <div class="text-2xl mb-2">🟢</div>
            <div class="font-semibold text-gray-800">Pemula</div>
            <div class="text-xs text-gray-500">Cocok untuk yang baru belajar</div>
          </div>
        </label>
        <label class="relative">
          <input type="radio" name="level" value="intermediate" class="peer sr-only">
          <div class="p-4 border-2 border-gray-200 rounded-2xl text-center cursor-pointer peer-checked:border-yellow-400 peer-checked:bg-yellow-50 hover:bg-gray-50 transition-all duration-300">
            <div class="text-2xl mb-2">🟡</div>
            <div class="font-semibold text-gray-800">Menengah</div>
            <div class="text-xs text-gray-500">Butuh pengetahuan dasar</div>
          </div>
        </label>
        <label class="relative">
          <input type="radio" name="level" value="advanced" class="peer sr-only">
          <div class="p-4 border-2 border-gray-200 rounded-2xl text-center cursor-pointer peer-checked:border-red-400 peer-checked:bg-red-50 hover:bg-gray-50 transition-all duration-300">
            <div class="text-2xl mb-2">🔴</div>
            <div class="font-semibold text-gray-800">Lanjutan</div>
            <div class="text-xs text-gray-500">Untuk yang sudah berpengalaman</div>
          </div>
        </label>
      </div>
    </div>

    <!-- Upload File -->
    <div class="space-y-3">
      <label class="block text-sm font-semibold text-gray-700 mb-2">
        📎 File Materi
      </label>
      <div class="relative">
        <div class="border-2 border-dashed border-blue-300 rounded-2xl p-8 text-center bg-blue-50/50 hover:bg-blue-50 transition-all duration-300" id="dropZone">
          <div class="mb-4">
            <svg class="w-12 h-12 text-blue-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
            </svg>
          </div>
          <input 
            type="file" 
            name="file" 
            id="fileInput"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
            accept=".pdf,.doc,.docx,.ppt,.pptx,.mp4,.avi,.mkv"
            onchange="handleFileSelect(this)"
          >
          <div id="uploadText">
            <p class="text-lg font-semibold text-gray-700 mb-2">🎯 Drop file di sini atau klik untuk browse</p>
            <p class="text-sm text-gray-500">
              📄 Support: PDF, DOC, DOCX, PPT, PPTX, MP4, AVI, MKV<br>
              📏 Maksimal ukuran file: 50MB
            </p>
          </div>
          <div id="filePreview" class="hidden">
            <div class="bg-white rounded-xl p-4 border border-gray-200 inline-block">
              <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                  <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                  </svg>
                </div>
                <div class="text-left">
                  <div class="font-medium text-gray-800" id="fileName"></div>
                  <div class="text-sm text-gray-500" id="fileSize"></div>
                </div>
                <button type="button" onclick="removeFile()" class="text-red-500 hover:text-red-700">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Status -->
    <div class="space-y-3">
      <label class="block text-sm font-semibold text-gray-700 mb-2">
        🚀 Status Publikasi
      </label>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <label class="relative">
          <input type="radio" name="status" value="draft" class="peer sr-only" checked>
          <div class="p-4 border-2 border-gray-200 rounded-2xl cursor-pointer peer-checked:border-yellow-400 peer-checked:bg-yellow-50 hover:bg-gray-50 transition-all duration-300">
            <div class="flex items-center space-x-3">
              <div class="text-2xl">📝</div>
              <div>
                <div class="font-semibold text-gray-800">Draft</div>
                <div class="text-xs text-gray-500">Simpan sebagai draft</div>
              </div>
            </div>
          </div>
        </label>
        <label class="relative">
          <input type="radio" name="status" value="published" class="peer sr-only">
          <div class="p-4 border-2 border-gray-200 rounded-2xl cursor-pointer peer-checked:border-green-400 peer-checked:bg-green-50 hover:bg-gray-50 transition-all duration-300">
            <div class="flex items-center space-x-3">
              <div class="text-2xl">🚀</div>
              <div>
                <div class="font-semibold text-gray-800">Publish</div>
                <div class="text-xs text-gray-500">Langsung terbitkan</div>
              </div>
            </div>
          </div>
        </label>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8 border-t border-gray-200">
      <a href="{{ route('pengajar.materi.index', $kelas->id) }}"
         class="w-full sm:w-auto px-6 py-3 border border-gray-300 text-gray-700 rounded-2xl font-semibold hover:bg-gray-50 transition-all duration-300 text-center">
        ← Kembali ke Daftar
      </a>
      
      <div class="flex gap-3 w-full sm:w-auto">
        <button type="submit" name="action" value="save_draft"
                class="flex-1 sm:flex-none px-6 py-3 bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center space-x-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
          </svg>
          <span>Simpan Draft</span>
        </button>
        
        <button type="submit" name="action" value="publish"
                class="flex-1 sm:flex-none px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center space-x-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
          </svg>
          <span>Publish Sekarang</span>
        </button>
      </div>
    </div>
  </form>
</div>

<!-- JavaScript for file handling -->
<script>
  function handleFileSelect(input) {
    const file = input.files[0];
    const uploadText = document.getElementById('uploadText');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    
    if (file) {
      // Hide upload text and show preview
      uploadText.classList.add('hidden');
      filePreview.classList.remove('hidden');
      
      // Set file info
      fileName.textContent = file.name;
      fileSize.textContent = formatFileSize(file.size);
      
      // Change border color to indicate file selected
      document.getElementById('dropZone').classList.remove('border-blue-300');
      document.getElementById('dropZone').classList.add('border-green-400', 'bg-green-50');
    }
  }
  
  function removeFile() {
    const input = document.getElementById('fileInput');
    const uploadText = document.getElementById('uploadText');
    const filePreview = document.getElementById('filePreview');
    const dropZone = document.getElementById('dropZone');
    
    // Clear input
    input.value = '';
    
    // Show upload text and hide preview
    uploadText.classList.remove('hidden');
    filePreview.classList.add('hidden');
    
    // Reset border color
    dropZone.classList.remove('border-green-400', 'bg-green-50');
    dropZone.classList.add('border-blue-300');
  }
  
  function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
  }
  
  // Drag and drop functionality
  const dropZone = document.getElementById('dropZone');
  
  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
  });
  
  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }
  
  ['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, highlight, false);
  });
  
  ['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, unhighlight, false);
  });
  
  function highlight(e) {
    dropZone.classList.add('border-blue-500', 'bg-blue-100');
  }
  
  function unhighlight(e) {
    dropZone.classList.remove('border-blue-500', 'bg-blue-100');
  }
  
  dropZone.addEventListener('drop', handleDrop, false);
  
  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    
    if (files.length > 0) {
      document.getElementById('fileInput').files = files;
      handleFileSelect(document.getElementById('fileInput'));
    }
  }
</script>

@endsection