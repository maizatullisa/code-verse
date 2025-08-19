@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 py-12 px-4">
  <div class="max-w-4xl mx-auto">
    
    <!-- Main Card with Glass Effect -->
    <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/20 relative overflow-hidden">
      
      <!-- Decorative Elements -->
      <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-pink-400/20 to-purple-600/20 rounded-full blur-3xl"></div>
      <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-blue-400/20 to-cyan-600/20 rounded-full blur-3xl"></div>
      
      <!-- Header Section -->
      <div class="relative z-10 text-center mb-10">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl mb-6 shadow-lg">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg>
        </div>
        <h1 class="text-4xl font-bold text-white mb-3 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
          Buat Kuis Baru
        </h1>
        <p class="text-white/70 text-lg">Lengkapi detail kuis di bawah ini untuk membuat kuis yang menarik</p>
      </div>

      <!-- Form Container -->
      <div class="relative z-10">
        <form action="{{ route('pengajar.quiz.question.store') }}" method="POST" class="space-y-8">
          @csrf

          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Left Column -->
            <div class="space-y-6">
              
              <!-- Judul Kuis -->
              <div hidden class="group">
                <label for="judul" class="block text-sm font-semibold text-white/90 mb-3 group-focus-within:text-blue-400 transition-colors">
                  <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Judul Kuis
                  </span>
                </label>
                <input type="text" name="materi_id" id="materi_id" value="{{ $materi->id }}"
                       class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-white/50 focus:bg-white/20 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-300" 
                       placeholder="Masukkan judul kuis yang menarik..." required>
              </div>

                    <!-- Judul Kuis -->
              <div class="group">
                <label for="judul" class="block text-sm font-semibold text-white/90 mb-3 group-focus-within:text-blue-400 transition-colors">
                  <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Judul Kuis
                  </span>
                </label>
                <input type="text" name="judul" id="judul" 
                       class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-white/50 focus:bg-white/20 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-300" 
                       placeholder="Masukkan judul kuis yang menarik..." required>
              </div>


              <!-- Jumlah Soal -->
              <div class="group">
                <label for="jumlah_soal" class="block text-sm font-semibold text-white/90 mb-3 group-focus-within:text-green-400 transition-colors">
                  <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                    </svg>
                    Jumlah Soal
                  </span>
                </label>
                <input type="number" name="jumlah_soal" id="jumlah_soal" 
                       class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-white/50 focus:bg-white/20 focus:border-green-400 focus:outline-none focus:ring-2 focus:ring-green-400/50 transition-all duration-300" 
                       placeholder="10" min="1" required>
              </div>

              <!-- Tipe Soal -->
              <div class="group">
                <label for="tipe_soal" class="block text-sm font-semibold text-white/90 mb-3 group-focus-within:text-purple-400 transition-colors">
                  <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                    Tipe Soal
                  </span>
                </label>
                <select name="tipe_soal" id="tipe_soal" 
                        class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-2xl text-white focus:bg-white/20 focus:border-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-400/50 transition-all duration-300" required>
                  <option value="" class="bg-gray-800 text-white">Pilih tipe soal...</option>
                  <option value="pilihan_ganda" class="bg-gray-800 text-white">📝 Pilihan Ganda</option>
                  <option value="Isian" class="bg-gray-800 text-white">✏️ Isian</option>
                </select>
              </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
              
              <!-- Deskripsi -->
              <div class="group">
                <label for="deskripsi" class="block text-sm font-semibold text-white/90 mb-3 group-focus-within:text-pink-400 transition-colors">
                  <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg>
                    Deskripsi Kuis
                  </span>
                </label>
                <textarea name="deskripsi" id="deskripsi" rows="6" 
                          class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-white/50 focus:bg-white/20 focus:border-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-400/50 transition-all duration-300 resize-none" 
                          placeholder="Jelaskan detail tentang kuis ini, tujuan pembelajaran, dan hal-hal penting lainnya..." required></textarea>
              </div>

              <!-- Status -->
              <div class="group">
                <label for="status" class="block text-sm font-semibold text-white/90 mb-3 group-focus-within:text-emerald-400 transition-colors">
                  <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Status Kuis
                  </span>
                </label>
                <select name="status" id="status" 
                        class="w-full px-4 py-4 bg-white/10 border border-white/20 rounded-2xl text-white focus:bg-white/20 focus:border-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400/50 transition-all duration-300" required>
                  <option value="" class="bg-gray-800 text-white">Pilih status...</option>
                  <option value="aktif" class="bg-gray-800 text-white">✅ Aktif</option>
                  <option value="tdk aktif" class="bg-gray-800 text-white">⏸️ Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="pt-8">
            <!-- <a href="{{ route('pengajar.quiz.soal.create') }}"> -->
            <button type="submit" 
                    class="w-full group relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 hover:from-blue-700 hover:via-purple-700 hover:to-pink-700 text-white font-bold py-5 px-8 rounded-2xl shadow-2xl transform hover:scale-[1.02] transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-purple-400/50">
              
              <span class="relative z-10 flex items-center justify-center text-lg">
                <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                </svg>
                Buat Kuis Sekarang
              </span>
              <!-- </a> -->
              
              <!-- Hover Effect -->
              <div class="absolute inset-0 bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </button>
          </div>

        </form>
      </div>
    </div>

    <!-- Additional Info Cards -->

  </div>
</div>

<style>
  /* Custom scrollbar untuk textarea */
  textarea::-webkit-scrollbar {
    width: 8px;
  }
  
  textarea::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
  }
  
  textarea::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
  }
  
  textarea::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
  }

  /* Select option styling */
  select option {
    background-color: #1f2937 !important;
    color: white !important;
  }
</style>
@endsection