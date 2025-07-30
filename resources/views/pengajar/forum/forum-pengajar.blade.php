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
          'pulse-gentle': 'pulseGentle 2s ease-in-out infinite',
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
          },
          pulseGentle: {
            '0%, 100%': { opacity: '1' },
            '50%': { opacity: '0.8' }
          }
        }
      }
    }
  }
</script>

<!-- Phosphor Icons CDN -->
<script src="https://unpkg.com/@phosphor-icons/web"></script>

<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-cyan-50 py-8">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Header Section -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 mb-8 shadow-xl border border-white/20 animate-fade-in">
      <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
        <div class="flex items-center space-x-4">
          <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
            <i class="ph-fill ph-chat-circle text-white text-2xl"></i>
          </div>
          <div className="text-center sm:text-left">
            <h1 class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
              Forum Diskusi
            </h1>
            <p class="text-gray-600 mt-1 text-sm sm:text-base">Diskusikan materi dengan siswa melalui forum interaktif</p>
          </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="flex items-center space-x-4 text-center">
          <div class="bg-white/70 backdrop-blur-lg rounded-xl p-3 shadow-lg border border-white/30">
            <div class="text-lg font-bold text-gray-800">{{ isset($materi) ? $materi->diskusi->count() : 0 }}</div>
            <div class="text-xs text-gray-600">Diskusi Aktif</div>
          </div>
          <div class="bg-white/70 backdrop-blur-lg rounded-xl p-3 shadow-lg border border-white/30">
            <div class="text-lg font-bold text-green-600">{{ isset($materi) ? $materi->diskusi->where('created_at', '>=', now()->startOfDay())->count() : 0 }}</div>
            <div class="text-xs text-gray-600">Hari Ini</div>
          </div>
        </div>
      </div>
    </div>

    <!-- New Discussion Form -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 mb-8 shadow-xl border border-white/20 animate-slide-up">
      <div class="flex items-center space-x-3 mb-4">
        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
          <i class="ph-fill ph-plus text-white text-lg"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Mulai Diskusi Baru</h3>
      </div>

      <form action="{{ isset($materi) ? route('diskusi.store', $materi->id) : '#' }}" method="POST" class="space-y-4">
        @csrf
        <div class="relative">
          <textarea 
            name="konten"
            class="w-full bg-white/90 backdrop-blur-lg border border-white/30 rounded-2xl p-4 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500/50 transition-all duration-200 placeholder-gray-500" 
            rows="4"
            placeholder="Bagikan pertanyaan, materi, atau topik diskusi untuk siswa..."
            required
          ></textarea>
          <div class="absolute bottom-3 right-3 text-xs text-gray-400">
            <i class="ph ph-info mr-1"></i>
            Gunakan bahasa yang mudah dipahami
          </div>
        </div>
        
        <!-- Additional Options -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
          <div class="flex flex-wrap items-center gap-3">
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="checkbox" class="w-4 h-4 text-blue-600 bg-white/80 border-gray-300 rounded focus:ring-blue-500 transition-colors">
              <span class="text-sm text-gray-600">Pin diskusi</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="checkbox" class="w-4 h-4 text-green-600 bg-white/80 border-gray-300 rounded focus:ring-green-500 transition-colors">
              <span class="text-sm text-gray-600">Kirim notifikasi</span>
            </label>
          </div>
          
          <div class="flex items-center space-x-3">
            <button type="button" class="px-4 py-2 text-gray-600 hover:text-gray-800 font-medium rounded-xl hover:bg-gray-100/50 transition-all duration-200">
              Batal
            </button>
            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-6 py-2 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
              <span>Posting</span>
              <i class="ph-fill ph-paper-plane-right"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Filter & Sort Options -->
    <div class="bg-white/70 backdrop-blur-lg rounded-2xl p-4 mb-6 shadow-lg border border-white/30">
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center space-x-3">
          <span class="text-sm font-medium text-gray-700">Filter:</span>
          <select class="bg-white/80 border border-white/30 rounded-lg px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20">
            <option>Semua Diskusi</option>
            <option>Diskusi Terbaru</option>
            <option>Paling Populer</option>
            <option>Belum Dijawab</option>
          </select>
        </div>
        <div class="flex items-center space-x-2">
          <button class="p-2 hover:bg-white/50 rounded-lg transition-colors" title="Refresh">
            <i class="ph ph-arrow-clockwise text-gray-600"></i>
          </button>
          <button class="p-2 hover:bg-white/50 rounded-lg transition-colors" title="Grid View">
            <i class="ph ph-squares-four text-gray-600"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Discussion Threads -->
    <div class="space-y-6">
      
      @forelse(isset($materi) && $materi->diskusi ? $materi->diskusi : [] as $diskusi)
      <!-- Thread -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 animate-fade-in group">
        <div class="flex items-start space-x-4">
          <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:animate-bounce-gentle relative">
            <span class="text-white font-bold text-lg">{{ strtoupper(substr($diskusi->user->name, 0, 1)) }}</span>
            <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
              <div class="flex items-center space-x-3">
                <h4 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">{{ $diskusi->user->name }}</h4>
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                  Siswa
                </span>
              </div>
              <div class="flex items-center space-x-2 text-xs text-gray-500">
                <i class="ph ph-clock"></i>
                <span>{{ $diskusi->created_at->diffForHumans() }}</span>
                <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                <i class="ph ph-eye"></i>
                <span>12 views</span>
              </div>
            </div>
            
            <p class="text-gray-700 leading-relaxed mb-4 text-sm sm:text-base">
              {{ $diskusi->konten }}
            </p>
            
            <!-- Actions -->
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-4">
                <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-500 hover:bg-blue-50 px-3 py-1 rounded-lg transition-all duration-200">
                  <i class="ph ph-chat-circle"></i>
                  <span class="text-sm font-medium">Balas ({{ $diskusi->balasan->count() }})</span>
                </button>
                <a href="{{ route('forum.diskusi.like', $diskusi) }}" class="flex items-center space-x-2 text-gray-500 hover:text-red-500 hover:bg-red-50 px-3 py-1 rounded-lg transition-all duration-200">
                  <i class="ph ph-heart"></i>
                  <span class="text-sm font-medium">Suka {{ $diskusi->diskusiSukas->count() }}</span>
                </button>
                <button class="flex items-center space-x-2 text-gray-500 hover:text-amber-500 hover:bg-amber-50 px-3 py-1 rounded-lg transition-all duration-200">
                  <i class="ph ph-bookmark-simple"></i>
                  <span class="text-sm font-medium">Simpan</span>
                </button>
              </div>
              
              <div class="flex items-center space-x-2">
                <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" title="Share">
                  <i class="ph ph-share-network"></i>
                </button>
                <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" title="More options">
                  <i class="ph ph-dots-three-vertical"></i>
                </button>
              </div>
            </div>

            <!-- Replies Section -->
            @if($diskusi->balasan->count() > 0)
            <div class="mt-6 border-t border-gray-200 pt-4">
              @foreach($diskusi->balasan as $balasan)
              <div class="bg-gray-50/80 backdrop-blur-lg rounded-2xl p-4 mb-3 border border-gray-100">
                <div class="flex items-start space-x-3">
                  <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-emerald-500 rounded-xl flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-medium text-sm">{{ strtoupper(substr($balasan->user->name, 0, 1)) }}</span>
                  </div>
                  <div class="flex-1 min-w-0">
                    <div class="flex items-center space-x-2 mb-2">
                      <h5 class="font-medium text-gray-800 text-sm">{{ $balasan->user->name }}</h5>
                      <span class="text-xs text-gray-500">{{ $balasan->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-700 text-sm leading-relaxed">{{ $balasan->konten }}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            @endif

            <!-- Reply Form -->
            <div class="mt-4">
              <form action="{{ route('balasan.store', $diskusi->id) }}" method="POST">
                @csrf
                <div class="flex space-x-3">
                  <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-pink-500 rounded-xl flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-medium text-sm">{{ Auth::check() ? strtoupper(substr(Auth::user()->name, 0, 1)) : 'A' }}</span>
                  </div>
                  <div class="flex-1">
                    <textarea 
                      name="konten"
                      class="w-full bg-white/90 border border-gray-200 rounded-xl p-3 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500/50 transition-all duration-200 placeholder-gray-400"
                      rows="3"
                      placeholder="Tulis balasan Anda..."
                      required
                    ></textarea>
                    <div class="flex justify-end mt-2">
                      <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-4 py-2 text-sm rounded-lg font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        Kirim Balasan
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @empty
      <!-- Empty State (when no discussions) -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-12 text-center shadow-xl border border-white/20">
        <div class="w-24 h-24 bg-gradient-to-r from-gray-200 to-gray-300 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="ph ph-chat-circle text-gray-500 text-3xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Diskusi</h3>
        <p class="text-gray-600 mb-6">Mulai diskusi pertama untuk mengajak siswa berinteraksi</p>
        <button class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
          Buat Diskusi Pertama
        </button>
      </div>
      @endforelse

    </div>

    <!-- Load More Button -->
    <div class="text-center mt-8">
      <button class="bg-white/80 backdrop-blur-lg hover:bg-white/90 text-gray-700 font-semibold py-3 px-8 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 border border-white/30">
        <i class="ph ph-arrow-down mr-2"></i>
        Muat Diskusi Lainnya
      </button>
    </div>

  </div>
</div>

@endsection