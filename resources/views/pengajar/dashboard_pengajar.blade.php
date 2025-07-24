@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 p-4 md:p-8">
  <!-- Welcome Header -->
  <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 md:p-8 mb-8 shadow-xl shadow-black/5">
    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
      <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-3xl shadow-lg shadow-blue-500/25">
        👋
      </div>
      <div class="flex-1">
        <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-2">
          Hai, {{ Auth::user()->first_name ?? 'siapapun itu' }}!
        </h1>
        <p class="text-gray-600 text-base md:text-lg leading-relaxed">
          Selamat datang di dashboard pengajar. Mari berbagi ilmu dan inspirasi kepada siswa-siswa kita! 🌟
        </p>
      </div>
    </div>
  </div>

  <!-- Quick Stats -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 border border-white/30">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-gray-600 mb-1">Total Materi</p>
          <p class="text-2xl font-bold text-gray-900">24</p>
        </div>
        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
          📚
        </div>
      </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 border border-white/30">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-gray-600 mb-1">Quiz Aktif</p>
          <p class="text-2xl font-bold text-gray-900">12</p>
        </div>
        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
          📝
        </div>
      </div>
    </div>
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 border border-white/30">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-gray-600 mb-1">Diskusi Baru</p>
          <p class="text-2xl font-bold text-gray-900">8</p>
        </div>
        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
          💬
        </div>
      </div>
    </div>
  </div>

  <!-- Main Features -->
  <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
    <!-- Materi Card -->
    <a href="{{ route('pengajar.materi.index') }}" 
       class="group bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-8 shadow-xl shadow-black/5 hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 hover:-translate-y-2 block">
      <div class="flex items-center justify-between mb-6">
        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center text-2xl shadow-lg shadow-blue-500/25">
          📚
        </div>
        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:rotate-45">
          <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H7M17 7V17"/>
          </svg>
        </div>
      </div>
      <h3 class="text-xl font-bold text-gray-900 mb-3">Kelola Materi</h3>
      <p class="text-gray-600 leading-relaxed mb-4">
        Upload dan atur semua materi pembelajaran dengan mudah. Dukungan berbagai format file.
      </p>
      <div class="flex items-center text-blue-600 font-medium group-hover:text-blue-700">
        <span class="mr-2">Kelola Sekarang</span>
        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </div>
    </a>

    <!-- Quiz Card -->
    <a href="{{ route('pengajar.quiz.index') }}" 
       class="group bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-8 shadow-xl shadow-black/5 hover:shadow-2xl hover:shadow-green-500/10 transition-all duration-500 hover:-translate-y-2 block">
      <div class="flex items-center justify-between mb-6">
        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center text-2xl shadow-lg shadow-green-500/25">
          📝
        </div>
        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:rotate-45">
          <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H7M17 7V17"/>
          </svg>
        </div>
      </div>
      <h3 class="text-xl font-bold text-gray-900 mb-3">Kelola Quiz</h3>
      <p class="text-gray-600 leading-relaxed mb-4">
        Buat quiz interaktif untuk mengukur pemahaman siswa terhadap materi pembelajaran.
      </p>
      <div class="flex items-center text-green-600 font-medium group-hover:text-green-700">
        <span class="mr-2">Buat Quiz</span>
        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </div>
    </a>

    <!-- Forum Card -->
    <a href="{{ route('pengajar.forum.index') }}" 
       class="group bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-8 shadow-xl shadow-black/5 hover:shadow-2xl hover:shadow-purple-500/10 transition-all duration-500 hover:-translate-y-2 block lg:col-span-2 xl:col-span-1">
      <div class="flex items-center justify-between mb-6">
        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center text-2xl shadow-lg shadow-purple-500/25">
          💬
        </div>
        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:rotate-45">
          <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H7M17 7V17"/>
          </svg>
        </div>
      </div>
      <h3 class="text-xl font-bold text-gray-900 mb-3">Forum Diskusi</h3>
      <p class="text-gray-600 leading-relaxed mb-4">
        Berinteraksi langsung dengan siswa melalui forum diskusi real-time.
      </p>
      <div class="flex items-center text-purple-600 font-medium group-hover:text-purple-700">
        <span class="mr-2">Mulai Diskusi</span>
        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </div>
    </a>
  </div>

  <!-- Quick Actions -->
  <div class="mt-8 bg-white/60 backdrop-blur-sm rounded-3xl p-6 border border-white/30">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
    <div class="flex flex-wrap gap-3">
      <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-medium transition-colors duration-200 flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Materi
      </button>
      <button class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-xl font-medium transition-colors duration-200 flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        Buat Quiz Baru
      </button>
      <button class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-xl font-medium transition-colors duration-200 flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
        </svg>
        Lihat Pesan
      </button>
    </div>
  </div>
</div>
@endsection