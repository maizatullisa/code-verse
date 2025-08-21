@extends('desktop.layout.master-desktop')

@section('title', 'Kelas Saya - Code Verse')

@section('page-title', 'Kelas Saya')

@section('content')
    <!-- Hero Section with Background -->
    <div class="bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700 relative overflow-hidden mb-8">
        <div class="absolute inset-0 bg-black/20"></div>
            <div class="absolute inset-0">
                <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
                <div class="absolute bottom-10 right-10 w-24 h-24 bg-pink-300/20 rounded-full blur-lg"></div>
                   <div class="absolute top-1/2 left-1/3 w-16 h-16 bg-yellow-300/15 rounded-full blur-md"></div>
            </div>
        
        <div class="relative z-10 py-12 px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-3xl font-bold mb-4">Kelola Pembelajaran Anda</h1>
                <p class="text-lg opacity-90">Lanjutkan perjalanan coding Anda dengan kelas-kelas terbaik</p>
            </div>
            
           <!-- Search Box -->
            <div class="flex justify-center items-center gap-4 max-w-4xl mx-auto mt-8">
                <form action="{{ route('kelas.index') }}" method="GET" 
                    class="flex justify-start items-center gap-4 bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-2xl text-white w-full shadow-lg">
                    <i class="ph ph-magnifying-glass text-xl text-white/80"></i>
                    <input 
                        type="text" 
                        name="search"
                        placeholder="Cari kelas favorit Anda..." 
                        value="{{ request('search') }}"
                        class="bg-transparent outline-none placeholder:text-white/70 w-full text-base text-white" 
                    />
                </form>
                <button type="button" 
                        class="bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-2xl text-white hover:bg-white/20 transition-all shadow-lg">
                    <i class="ph ph-sliders-horizontal text-xl"></i>
                </button>
            </div>


    <!-- Tab Navigation -->
            <div class="px-6 mb-8">
                <div class="max-w-4xl mx-auto">
                    <div class="flex justify-center items-center gap-2 bg-white rounded-2xl p-2 shadow-lg border border-gray-100">
                        <a href="{{ route('kelas.index') }}" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-8 py-3 rounded-xl font-semibold text-sm transition-all shadow-md">
                            📚 Diambil
                        </a>
                        <a href="kelas-selesai" class="text-gray-600 px-8 py-3 rounded-xl font-semibold text-sm hover:bg-gray-50 transition-all">
                            ✅ Selesai
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kelas Diambil List -->
            <div class="px-6 mb-20">
                <div class="max-w-4xl mx-auto">
                    <div class="space-y-4" id="kelas-container">
            @if(isset($enrollments) && $enrollments->count())
                @foreach($enrollments as $enrollment)
                    @php $kelas = $enrollment->kelas; @endphp
                    <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 group">
                        <div class="flex items-center gap-6">
                            <!-- Course Image -->
                            <div class="relative flex-shrink-0">
                                <img src="{{ $kelas->cover_image ? asset('storage/'.$kelas->cover_image) : 'https://via.placeholder.com/140x100?text=Course' }}" 
                                    alt="{{ $kelas->nama_kelas }}" 
                                    class="w-36 h-24 object-cover rounded-2xl" />
                                <div class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs px-3 py-1 rounded-full">
                                    {{ ucfirst($enrollment->status) }}
                                </div>
                            </div>

                            <!-- Course Info -->
                            <div class="flex-1">
                                <h4 class="font-bold text-xl text-gray-800">{{ $kelas->nama_kelas }}</h4>
                                <p class="text-gray-600 text-sm">Pengajar: {{ $kelas->pengajar->name ?? 'Pengajar' }}</p>
                                <p class="text-gray-500 text-sm">Durasi: {{ $kelas->durasi ?? '-' }}</p>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col gap-3 flex-shrink-0">
                               <a href="{{ route('student.course.materi', ['kelasId' => $kelas->id]) }}" 
                                class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-3 rounded-xl text-sm font-semibold">
                                    🚀 Lanjut Belajar
                                </a>
                                 <a href="{{ route('desktop.pages.kelas.kelas-detail')}}" 
                                 class="inline-flex items-center justify-center border-2 border-gray-200 text-gray-600 px-6 py-3 rounded-xl text-sm font-semibold">
                                    📋 Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-16">
                    <p class="text-gray-400 text-lg italic">Belum ada kelas yang diambil.</p>
                </div>
            @endif
        </div>

          
            <!-- Load More Button -->
            @if($enrollments->hasMorePages())
            <div class="text-center pt-12">
                <button id="load-more-btn" data-page="{{ $enrollments->currentPage() + 1 }}" 
                        class="bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500 text-white px-10 py-4 rounded-2xl font-bold text-lg hover:from-indigo-600 hover:via-purple-700 hover:to-pink-600 transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                    ✨ Load More Kelas
                </button>
            </div>
            @endif
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('load-more-btn');
    
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const page = this.getAttribute('data-page');
            
            this.innerHTML = '⏳ Loading...';
            this.disabled = true;
            
            fetch(`{{ route('kelas.load-more') }}?page=${page}`)
                .then(response => response.json())
                .then(data => {
                    data.enrollments.forEach(enrollment => {
                        const kelas = enrollment.kelas;
                        const html = `
                        <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 group">
                            <div class="flex items-center gap-6">
                                <div class="relative flex-shrink-0">
                                    <img src="${kelas.cover_image ? '/storage/' + kelas.cover_image : 'https://via.placeholder.com/140x100?text=Course'}" 
                                        alt="${kelas.nama_kelas}" 
                                        class="w-36 h-24 object-cover rounded-2xl" />
                                    <div class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs px-3 py-1 rounded-full">
                                        ${enrollment.status.charAt(0).toUpperCase() + enrollment.status.slice(1)}
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-xl text-gray-800">${kelas.nama_kelas}</h4>
                                    <p class="text-gray-600 text-sm">Pengajar: ${kelas.pengajar ? kelas.pengajar.name : 'Pengajar'}</p>
                                    <p class="text-gray-500 text-sm">Durasi: ${kelas.durasi || '-'}</p>
                                </div>
                                <div class="flex flex-col gap-3 flex-shrink-0">
                                    <a href="/desktop/kelas-materi/${kelas.id}" 
                                    class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-3 rounded-xl text-sm font-semibold">
                                        🚀 Lanjut Belajar
                                    </a>
                                    <button class="border-2 border-gray-200 text-gray-600 px-6 py-3 rounded-xl text-sm font-semibold">
                                        📋 Detail
                                    </button>
                                </div>
                            </div>
                        </div>`;
                        document.getElementById('kelas-container').innerHTML += html;
                    });
                    
                    if (data.hasMore) {
                        this.setAttribute('data-page', parseInt(page) + 1);
                        this.innerHTML = '✨ Load More Kelas';
                        this.disabled = false;
                    } else {
                        this.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.innerHTML = '❌ Error Loading';
                });
        });
    }
});
</script>
@endsection