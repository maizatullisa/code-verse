@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 p-4 md:p-8">

  <!-- Header -->
  <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 md:p-8 mb-8 shadow-xl shadow-black/5">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
      <div class="flex items-center gap-6"> 
        <div>
          <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-2">
            Daftar Kelas
          </h1>
          <p class="text-gray-600 text-base md:text-lg leading-relaxed">
            Lihat siswa dalam Kelas yang Anda Ajar
          </p>
        </div>
      </div>
    
        <!-- Search Bar -->
      <form method="GET" class="relative w-full sm:w-80">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </div>
        <input type="text" 
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari kelas..." 
            class="w-full pl-10 pr-4 py-3 bg-white/70 backdrop-blur-sm border-2 border-blue-300 rounded-2xl 
                  focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
      </form>

    </div>
  </div>

 
  <!-- Class Cards -->
  <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 md:p-8 shadow-xl shadow-black/5">

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      @foreach($kelas as $item)
      <div class="bg-white/60 backdrop-blur-sm rounded-2xl border border-white/30 hover:shadow-lg hover:shadow-black/5 transition-all duration-300 p-6">
                <!-- Cover Kelas -->
        @if($item->cover_image)
            <img src="{{ asset('storage/' . $item->cover_image) }}" 
                alt="Cover Kelas" 
                class="h-32 w-full object-cover">
        @else
            <div class="h-32 w-full bg-gradient-to-r from-blue-200 to-indigo-300 flex items-center justify-center text-gray-700 text-sm">
                Tidak ada cover
            </div>
        @endif
        <!-- Nama kelas -->
        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $item->nama_kelas }}</h3>
        
        <!-- Deskripsi kelas (opsional) -->
        <p class="text-gray-600 text-sm mb-4">
          {{ $item->deskripsi ?? 'Tidak ada deskripsi' }}
        </p>
        
        <!-- Jumlah siswa -->
        <div class="space-y-2">
          <div class="flex items-center justify-between text-sm">
            <span class="text-gray-600">Jumlah Siswa</span>
            <span class="font-semibold text-gray-900">
              {{ $item->enrollments->count() }} siswa
            </span>
          </div>
        </div>
        
        <!-- Button lihat siswa -->
        <a href="{{ route('pengajar.siswa.show', $item->id) }}" 
           class="block w-full mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl text-center transition-all duration-300">
          Lihat Siswa
        </a>
      </div>
      @endforeach
    </div>

    <!-- Pagination (dummy structure) -->
    <div class="flex items-center justify-center mt-8 pt-6 border-t border-gray-200">
       {{ $kelas->links() }}
    </div>
  </div>

</div>
@endsection