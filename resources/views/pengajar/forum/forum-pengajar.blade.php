@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gray-50 py-6">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Header Section -->
    <div class="bg-white rounded-lg p-6 mb-6 shadow-sm border">
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
          <h1 class="text-2xl font-semibold text-gray-900">Forum Diskusi</h1>
          <p class="text-gray-600 mt-1">Diskusikan materi dengan siswa</p>
        </div>
        
        <!-- Stats -->
        <div class="flex items-center space-x-6 text-sm">
          <div class="text-center">
            <div class="font-semibold text-gray-900">{{ isset($kelas) ? $kelas->diskusi->count() : 0 }}</div>
            <div class="text-gray-500">Total Diskusi</div>
          </div>
          <div class="text-center">
            <div class="font-semibold text-blue-600">{{ isset($kelas) ? $kelas->diskusi->where('created_at', '>=', now()->startOfDay())->count() : 0 }}</div>
            <div class="text-gray-500">Hari Ini</div>
          </div>
        </div>
      </div>
    </div>

    <!-- New Discussion Form -->
    <div class="bg-white rounded-lg p-6 mb-6 shadow-sm border">
      <h3 class="text-lg font-medium text-gray-900 mb-4">Mulai Diskusi Baru</h3>

      <form action="{{ route('diskusi.store', $kelas->id) }}" method="POST">
        @csrf
        <div class="mb-4">
          <textarea 
            name="konten"
            class="w-full border border-gray-300 rounded-lg p-4 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
            rows="4"
            placeholder="Tulis topik diskusi atau pertanyaan untuk siswa..."
            required
          ></textarea>
        </div>
        
        <!-- Options -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
          <div class="flex items-center gap-4">
            <!-- <label class="flex items-center">
              <input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
              <span class="ml-2 text-sm text-gray-700">Pin diskusi</span>
            </label>
            <label class="flex items-center">
              <input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
              <span class="ml-2 text-sm text-gray-700">Kirim notifikasi</span>
            </label> -->
          </div>
          
          <div class="flex items-center gap-3">
            <button type="button" class="px-4 py-2 text-gray-700 hover:text-gray-900 font-medium rounded-lg hover:bg-gray-50 transition-colors">
              Batal
            </button>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
              Posting
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Filter & Sort -->
<form method="GET" action="">
    <div class="bg-white rounded-lg p-4 mb-6 shadow-sm border">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="text-sm font-medium text-gray-700">Filter:</span>
                <select 
                    name="filter"
                    onchange="this.form.submit()"
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="" {{ request('filter') == '' ? 'selected' : '' }}>Semua Diskusi</option>
                    <option value="terbaru" {{ request('filter') == 'terbaru' ? 'selected' : '' }}>Diskusi Terbaru</option>
                    <option value="populer" {{ request('filter') == 'populer' ? 'selected' : '' }}>Paling Populer</option>
                    <option value="belum_dijawab" {{ request('filter') == 'belum_dijawab' ? 'selected' : '' }}>Belum Dijawab</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ url()->current() }}" class="p-2 hover:bg-gray-100 rounded-lg transition-colors text-gray-600" title="Refresh">
                    ↻
                </a>
            </div>
        </div>
    </div>
</form>


    <!-- Discussion Threads -->
    <div class="space-y-4">
      
    @forelse($diskusi as $item)
      <!-- Thread -->
      <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow">
        <div class="p-6">
          <div class="flex items-start gap-4">
            <!-- Avatar -->
            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
              <span class="text-white font-medium text-sm">{{ strtoupper(substr($item->user->name, 0, 1)) }}</span>
            </div>
            
            <div class="flex-1 min-w-0">
              <!-- Header -->
              <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-3">
                  <h4 class="font-medium text-gray-900">{{ $item->user->email }}</h4>
                  @if($item->user->role == 'pengajar')
                    <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-green-100 text-green-800">
                      Pengajar
                    </span>
                  @else
                    <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-blue-100 text-blue-800">
                      Siswa
                    </span>
                  @endif
                </div>
                <span class="text-sm text-gray-500">{{  $item->created_at->diffForHumans() }}</span>
              </div>
              
              <!-- Content -->
              <p class="text-gray-800 leading-relaxed mb-4">
                {{ $item->konten }}
              </p>
              
              <!-- Actions -->
              <div class="flex items-center gap-4 pb-4 border-b border-gray-100">
                <button class="flex items-center gap-2 text-gray-600 hover:text-blue-600 text-sm font-medium transition-colors">
                  Balas ({{  $item->balasan->count() }})
                </button>
                <a href="{{ route('forum.diskusi.like',  $item) }}" class="flex items-center gap-2 text-gray-600 hover:text-red-600 text-sm font-medium transition-colors">
                  Suka ({{  $item->diskusiSukas->count() }})
                </a>
              </div>

              <!-- Replies -->
              @if($item->balasan->count() > 0)
              <div class="mt-4 space-y-3">
                @foreach($item->balasan as $balasan)
                <div class="bg-gray-50 rounded-lg p-4">
                  <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-gray-400 rounded-full flex items-center justify-center flex-shrink-0">
                      <span class="text-white font-medium text-xs">{{ strtoupper(substr($balasan->user->email, 0, 1)) }}</span>
                    </div>
                    <div class="flex-1">
                      <div class="flex items-center gap-2 mb-1">
                        <h5 class="font-medium text-gray-900 text-sm">{{ $balasan->user->email }}</h5>
                        @if($balasan->user->role === 'pengajar')
                          <span class="px-2 py-0.5 text-xs font-medium text-green-700 bg-green-100 rounded">Pengajar</span>
                        @elseif($balasan->user->role === 'siswa')
                          <span class="px-2 py-0.5 text-xs font-medium text-blue-700 bg-blue-100 rounded">Siswa</span>
                        @endif
                        <span class="text-xs text-gray-500">{{ $balasan->created_at->diffForHumans() }}</span>
                      </div>
                      <p class="text-gray-700 text-sm">{{ $balasan->konten }}</p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              @endif

              <!-- Reply Form -->
              <div class="mt-4">
               <form action="{{ route('balasan.store', $item->id) }}" method="POST">
                  @csrf
                  <div class="flex gap-3">
                    <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center flex-shrink-0">
                      <span class="text-white font-medium text-xs">{{ Auth::check() ? strtoupper(substr(Auth::user()->name, 0, 1)) : 'A' }}</span>
                    </div>
                    <div class="flex-1">
                      <textarea 
                        name="konten"
                        class="w-full border border-gray-300 rounded-lg p-3 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        rows="3"
                        placeholder="Tulis balasan..."
                        required
                      ></textarea>
                      <div class="flex justify-end mt-2">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded-lg font-medium transition-colors">
                          Kirim
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <!-- Empty State -->
      <div class="bg-white rounded-lg p-12 text-center shadow-sm border">
        <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
          <span class="text-gray-500 text-2xl">💬</span>
        </div>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Diskusi</h3>
        <p class="text-gray-600 mb-6">Mulai diskusi pertama untuk mengajak siswa berinteraksi</p>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
          Buat Diskusi Pertama
        </button>
      </div>
      @endforelse
    </div>

    <!-- Load More -->
    @if ($diskusi->hasPages())
      <div class="mt-8 text-center">
          {{ $diskusi->links() }}
      </div>
  @endif



  </div>
</div>

@endsection