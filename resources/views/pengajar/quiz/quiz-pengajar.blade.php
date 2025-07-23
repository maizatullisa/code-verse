@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        animation: {
          'fade-in': 'fadeIn 0.5s ease-in-out',
          'slide-up': 'slideUp 0.3s ease-out',
          'bounce-gentle': 'bounceGentle 0.6s ease-in-out',
        },
        keyframes: {
          fadeIn: {
            '0%': { opacity: '0', transform: 'translateY(10px)' },
            '100%': { opacity: '1', transform: 'translateY(0)' }
          },
          slideUp: {
            '0%': { transform: 'translateY(10px)', opacity: '0' },
            '100%': { transform: 'translateY(0)', opacity: '1' }
          },
          bounceGentle: {
            '0%, 100%': { transform: 'translateY(0)' },
            '50%': { transform: 'translateY(-5px)' }
          }
        }
      }
    }
  }
</script>

<!-- Phosphor Icons CDN -->
<script src="https://unpkg.com/@phosphor-icons/web"></script>

<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 py-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Header Section -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 mb-8 shadow-xl border border-white/20 animate-fade-in">
      <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
        <div class="flex items-center space-x-4">
          <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
            <i class="ph-fill ph-question text-white text-2xl"></i>
          </div>
          <div class="text-center sm:text-left">
            <h1 class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
              Kelola Kuis
            </h1>
            <p class="text-gray-600 mt-1 text-sm sm:text-base">Buat dan kelola kuis yang sudah Anda publikasikan</p>
          </div>
        </div>
        
        <!-- Add New Quiz Button -->
        <button class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 flex items-center space-x-2">
          <i class="ph-fill ph-plus-circle text-lg"></i>
          <span>Buat Kuis Baru</span>
        </button>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
      <div class="bg-white/70 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-white/30 hover:shadow-xl transition-all duration-200 animate-slide-up">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Total Kuis</p>
            <p class="text-2xl font-bold text-gray-800">3</p>
          </div>
          <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-blue-600 rounded-xl flex items-center justify-center">
            <i class="ph-fill ph-books text-white text-lg"></i>
          </div>
        </div>
      </div>
      
      <div class="bg-white/70 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-white/30 hover:shadow-xl transition-all duration-200 animate-slide-up" style="animation-delay: 0.1s">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Total Soal</p>
            <p class="text-2xl font-bold text-gray-800">23</p>
          </div>
          <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-green-600 rounded-xl flex items-center justify-center">
            <i class="ph-fill ph-list-checks text-white text-lg"></i>
          </div>
        </div>
      </div>
      
      <div class="bg-white/70 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-white/30 hover:shadow-xl transition-all duration-200 animate-slide-up" style="animation-delay: 0.2s">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Aktif</p>
            <p class="text-2xl font-bold text-green-600">3</p>
          </div>
          <div class="w-12 h-12 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center">
            <i class="ph-fill ph-check-circle text-white text-lg"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Quiz Cards -->
    <div class="space-y-6">
      
      <!-- Quiz Card 1: HTML Dasar -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group">
        <div class="flex flex-col lg:flex-row items-start justify-between gap-6">
          <div class="flex items-start space-x-4 flex-1">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-400 to-purple-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:animate-bounce-gentle">
              <i class="ph-fill ph-code text-white text-2xl"></i>
            </div>
            <div class="flex-1 min-w-0">
              <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">
                Kuis: HTML Dasar
              </h3>
              <div class="flex flex-wrap items-center gap-2 mb-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                  <i class="ph-fill ph-hash mr-1"></i>5 Soal
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                  <i class="ph-fill ph-list-bullets mr-1"></i>Pilihan Ganda
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                  <i class="ph-fill ph-check-circle mr-1"></i>Aktif
                </span>
              </div>
              <p class="text-gray-600 text-sm leading-relaxed">
                Kuis untuk menguji pemahaman dasar HTML siswa meliputi tag, atribut, dan struktur dokumen
              </p>
              <div class="flex items-center space-x-4 mt-3 text-xs text-gray-500">
                <span class="flex items-center">
                  <i class="ph ph-calendar mr-1"></i>Dibuat: 15 Jan 2025
                </span>
                <span class="flex items-center">
                  <i class="ph ph-users mr-1"></i>25 Peserta
                </span>
              </div>
            </div>
          </div>
          
          <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full lg:w-auto">
            <a href="#" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="ph ph-eye mr-2"></i>Lihat Detail
            </a>
            <a href="#" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white rounded-xl font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="ph ph-pencil mr-2"></i>Edit
            </a>
            <button class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-red-400 to-red-500 hover:from-red-500 hover:to-red-600 text-white rounded-xl font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="ph ph-trash mr-2"></i>Hapus
            </button>
          </div>
        </div>
      </div>

      <!-- Quiz Card 2: CSS Styling -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group" style="animation-delay: 0.1s">
        <div class="flex flex-col lg:flex-row items-start justify-between gap-6">
          <div class="flex items-start space-x-4 flex-1">
            <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-blue-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:animate-bounce-gentle">
              <i class="ph-fill ph-brackets-curly text-white text-2xl"></i>
            </div>
            <div class="flex-1 min-w-0">
              <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors">
                Kuis: CSS Styling
              </h3>
              <div class="flex flex-wrap items-center gap-2 mb-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                  <i class="ph-fill ph-hash mr-1"></i>8 Soal
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 border border-indigo-200">
                  <i class="ph-fill ph-stack mr-1"></i>Mixed
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                  <i class="ph-fill ph-check-circle mr-1"></i>Aktif
                </span>
              </div>
              <p class="text-gray-600 text-sm leading-relaxed">
                Evaluasi pemahaman styling CSS dan layouting dengan berbagai jenis soal interaktif
              </p>
              <div class="flex items-center space-x-4 mt-3 text-xs text-gray-500">
                <span class="flex items-center">
                  <i class="ph ph-calendar mr-1"></i>Dibuat: 18 Jan 2025
                </span>
                <span class="flex items-center">
                  <i class="ph ph-users mr-1"></i>32 Peserta
                </span>
              </div>
            </div>
          </div>
          
          <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full lg:w-auto">
            <a href="#" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="ph ph-eye mr-2"></i>Lihat Detail
            </a>
            <a href="#" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white rounded-xl font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="ph ph-pencil mr-2"></i>Edit
            </a>
            <button class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-red-400 to-red-500 hover:from-red-500 hover:to-red-600 text-white rounded-xl font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="ph ph-trash mr-2"></i>Hapus
            </button>
          </div>
        </div>
      </div>

      <!-- Quiz Card 3: JavaScript Basics -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group" style="animation-delay: 0.2s">
        <div class="flex flex-col lg:flex-row items-start justify-between gap-6">
          <div class="flex items-start space-x-4 flex-1">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:animate-bounce-gentle">
              <i class="ph-fill ph-function text-white text-2xl"></i>
            </div>
            <div class="flex-1 min-w-0">
              <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-purple-600 transition-colors">
                Kuis: JavaScript Basics
              </h3>
              <div class="flex flex-wrap items-center gap-2 mb-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-rose-100 text-rose-800 border border-rose-200">
                  <i class="ph-fill ph-hash mr-1"></i>10 Soal
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                  <i class="ph-fill ph-list-bullets mr-1"></i>Pilihan Ganda
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                  <i class="ph-fill ph-check-circle mr-1"></i>Aktif
                </span>
              </div>
              <p class="text-gray-600 text-sm leading-relaxed">
                Kuis dasar JavaScript untuk pemula meliputi variabel, fungsi, dan manipulasi DOM
              </p>
              <div class="flex items-center space-x-4 mt-3 text-xs text-gray-500">
                <span class="flex items-center">
                  <i class="ph ph-calendar mr-1"></i>Dibuat: 20 Jan 2025
                </span>
                <span class="flex items-center">
                  <i class="ph ph-users mr-1"></i>18 Peserta
                </span>
              </div>
            </div>
          </div>
          
          <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full lg:w-auto">
            <a href="#" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="ph ph-eye mr-2"></i>Lihat Detail
            </a>
            <a href="#" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white rounded-xl font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="ph ph-pencil mr-2"></i>Edit
            </a>
            <button class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-red-400 to-red-500 hover:from-red-500 hover:to-red-600 text-white rounded-xl font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="ph ph-trash mr-2"></i>Hapus
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Empty State (when no quizzes) - Hidden by default -->
    <div class="hidden bg-white/80 backdrop-blur-xl rounded-3xl p-12 text-center shadow-xl border border-white/20">
      <div class="w-24 h-24 bg-gradient-to-r from-gray-200 to-gray-300 rounded-full flex items-center justify-center mx-auto mb-6">
        <i class="ph ph-question text-gray-500 text-3xl"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Kuis</h3>
      <p class="text-gray-600 mb-6">Mulai buat kuis pertama Anda untuk siswa</p>
      <button class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
        Buat Kuis Sekarang
      </button>
    </div>

  </div>
</div>

@endsection