@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 p-4 md:p-8">

  <!-- Header -->
  <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 md:p-8 mb-8 shadow-xl shadow-black/5">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
      <div class="flex items-center gap-6">
        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center text-3xl shadow-lg shadow-green-500/25">
          👥
        </div>
        <div>
          <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-2">
            Daftar Siswa
          </h1>
          <p class="text-gray-600 text-base md:text-lg leading-relaxed">
            Siswa dalam Kelas Anda
          </p>
        </div>
      </div>
    
      <!-- Search Bar -->
            <form method="GET" action="{{ route('pengajar.siswa') }}" class="relative w-full sm:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" 
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari siswa..." 
                    class="w-full pl-10 pr-4 py-3 bg-white/70 backdrop-blur-sm border-2 border-blue-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </form>
    </div>
  </div>

  <!-- Students List -->
  <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 md:p-8 shadow-xl shadow-black/5">
    <div class="mb-6">
      <h2 class="text-xl font-bold text-gray-900 mb-2">Daftar Siswa</h2>
      <p class="text-gray-600">Semua siswa yang terdaftar dalam kelas Anda</p>
    </div>

    <div class="space-y-4">
    @foreach($siswa as $index => $item)
    <!-- Card Siswa -->
    <div class="flex items-center justify-between p-4 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/30 hover:shadow-lg hover:shadow-black/5 transition-all duration-300">
      
      <!-- Bagian kiri: Avatar + Nama -->
      <div class="flex items-center gap-4">
        <!-- Nomor urut -->
        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
          {{ ($siswa->currentPage() - 1) * $siswa->perPage() + $index + 1 }}
        </div>
        <!-- Avatar Foto / Fallback Inisial -->
        <div class="w-12 h-12 rounded-full flex items-center justify-center overflow-hidden font-semibold text-white">
          @if(!empty($item['foto']))
            <!-- Jika foto ada, tampilkan gambar -->
            <img src="{{ asset('storage/' . $item['foto']) }}" alt="{{ $item['nama'] }}" class="w-full h-full object-cover">
          @else
            <!-- Jika foto tidak ada, tampilkan inisial dengan gradient -->
            <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
              {{ strtoupper(substr($item['nama'],0,1)) }}{{ strtoupper(substr(explode(' ', $item['nama'])[1] ?? '',0,1)) }}
            </div>
          @endif
        </div>

        <!-- Nama Siswa -->
        <h3 class="font-semibold text-gray-900">{{ $item['nama'] }}</h3>
      </div>

       <!-- Bagian kanan: Info Kelas (desain badge) -->
      <div class="text-sm text-gray-700 bg-white/40 backdrop-blur-sm px-3 py-1 rounded-full border border-white/30 font-medium">
        {{ implode(' • ', $item['kelas']) }} • Kelas diambil: {{ $item['jumlah_kelas'] }}
      </div>

    </div>
  @endforeach
</div>


    <!-- Pagination -->
    <div class="flex items-center justify-center mt-8 pt-6 border-t border-gray-200">
      {{ $siswa->withQueryString()->links() }}
    </div>
  </div>

</div>
@endsection
