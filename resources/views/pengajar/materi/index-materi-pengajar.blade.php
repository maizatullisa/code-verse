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
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-3xl p-8 shadow-xl border border-white/20 backdrop-blur-sm mb-8">
  <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
    <div class="flex items-center space-x-4">
      <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
      </div>
      <div>
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-2">Daftar Materi</h1>
        <p class="text-gray-600 text-lg">Kelola semua materi pembelajaran Anda</p>
      </div>
    </div>
    
    <a href="{{ route('pengajar.materi.create', $kelas->id ) }}" 
      class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-6 py-3 rounded-2xl font-semibold inline-flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        <span>Tambah Materi</span>
    </a>

    <a href="{{ route('pengajar.quiz.listquiz') }}" 
      class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 flex items-center space-x-2">
      <i class="ph-fill ph-bookmarks text-lg"></i>
      <span>Quiz</span>
  </a>



  </div>
</div>

<!-- Materials List -->
<div class="space-y-6">
  @forelse($materis as $materi)
  <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-3xl p-6 shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
    <div class="flex flex-col lg:flex-row items-start justify-between gap-6">
      <div class="flex items-start space-x-4 flex-1">
        <div class="w-16 h-16 bg-gradient-to-br 
          @if($materi->kategori == 'programming') from-orange-400 to-pink-500
          @elseif($materi->kategori == 'design') from-blue-400 to-purple-500  
          @elseif($materi->kategori == 'web') from-green-400 to-teal-500
          @else from-gray-400 to-gray-500
          @endif
          rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
          @if($materi->kategori == 'programming')
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
            </svg>
          @elseif($materi->kategori == 'design')
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4 4 4 0 004-4V5z"/>
            </svg>
          @else
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
          @endif
        </div>
        <div class="flex-1">
          <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $materi->judul }}</h3>
          <div class="flex flex-wrap items-center gap-3 mb-4">
            @if($materi->status == 'published')
              <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium border border-green-200">
                📚 Published
              </span>
            @else
              <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium border border-yellow-200">
                ✏️ Draft
              </span>
            @endif
            
            @if($materi->level)
              <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-medium">
                @if($materi->level == 'beginner') 🟢 Pemula
                @elseif($materi->level == 'intermediate') 🟡 Menengah  
                @else 🔴 Lanjutan
                @endif
              </span>
            @endif
            
            @if($materi->kategori)
              <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-medium">
                {{ ucfirst($materi->kategori) }}
              </span>
            @endif
            
            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs">
              🕒 {{ $materi->updated_at->diffForHumans() }}
            </span>
            
            @if($materi->file_size)
              <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-xs">
                📎 {{ $materi->formatted_file_size }}
              </span>
            @endif
          </div>
          <p class="text-gray-600 leading-relaxed">
            {{ Str::limit($materi->deskripsi, 150) }}
          </p>
        </div>
      </div>
      
      <div class="flex items-center space-x-3 lg:flex-shrink-0">
        <a href="{{ route('materi.preview', $materi->id) }}"
           class="bg-gradient-to-r from-green-400 to-emerald-400 hover:from-green-500 hover:to-emerald-500 text-white px-4 py-2 rounded-xl font-medium flex items-center space-x-2 shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
          </svg>
          <span>Detail</span>
        </a>
          <a href="{{ route('pengajar.quiz.create', $materi) }}" 
           class="bg-gradient-to-r from-green-400 to-emerald-400 hover:from-green-500 hover:to-emerald-500 text-white px-4 py-2 rounded-xl font-medium flex items-center space-x-2 shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
          </svg>
          <span>Quiz</span>
        </a>
        <form action="{{ route('pengajar.materi.destroy', $materi) }}" method="POST" class="inline" 
              onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
          @csrf
          @method('DELETE')
          <button type="submit" 
                  class="bg-gradient-to-r from-red-400 to-pink-400 hover:from-red-500 hover:to-pink-500 text-white px-4 py-2 rounded-xl font-medium flex items-center space-x-2 shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
            <span>Hapus</span>
          </button>
        </form>
      </div>
    </div>
  </div>
  @empty
  <!-- Empty State -->
  <div class="text-center py-16">
    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
      <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
      </svg>
    </div>
    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada materi</h3>
    <p class="text-gray-600 mb-6">Mulai dengan menambahkan materi pembelajaran pertama Anda</p>
    <a href="{{ route('pengajar.materi.create', $kelas->id) }}" 
      class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-6 py-3 rounded-2xl font-semibold inline-flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
      </svg>
      <span>Tambah Materi Pertama</span>
    </a>

  </div>
 @endforelse
</div>

@endsection