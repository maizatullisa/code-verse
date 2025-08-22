<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
    <title>Kelas</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1">
        <!-- Absolute Items Start -->
        <img src="{{ asset('assets/images/header-bg-1.png') }}" alt="" class="absolute top-0 left-0 right-0 -mt-16" />
        <div class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px]"></div>
        <div class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px]"></div>
        <div class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px]"></div>
        <div class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px]"></div>
        <!-- Absolute Items End -->

        <!-- Page Title Start -->
        <div class="relative z-10">
            <div class="flex justify-between items-center gap-4 px-6">
                <div class="flex justify-start items-center gap-4">
                    <a href="{{ url('/home') }}" class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10">
                        <i class="ph ph-caret-left"></i>
                    </a>
                    <h2 class="text-2xl font-semibold text-white">CODE VERSE</h2>
                </div>
                <a href="create-quiz.html" class="flex justify-center items-center text-white border border-white rounded-full p-1 text-xl">
                    <i class="ph ph-plus"></i>
                </a>
            </div>
            <!-- Page Title End -->

            <!-- Search Box Start -->
            <div class="flex justify-between items-center gap-3 pt-12 px-6">
                <a href="contest-search.html" class="flex justify-start items-center gap-3 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
                    <i class="ph ph-magnifying-glass"></i>
                    <span class="text-white w-full text-xs">Cari materi</span>
                </a>
                <div class="bg-color24 border border-color24 p-4 rounded-full text-white flex justify-center items-center">
                    <i class="ph ph-sliders-horizontal"></i>
                </div>
            </div>
            <!-- Search Box End -->

            <!-- Alert Messages -->
            @if(session('success'))
            <div class="mx-6 mt-4 p-4 bg-green-500 text-white rounded-lg shadow-lg">
                <div class="flex items-center">
                    <i class="ph ph-check-circle text-xl mr-2"></i>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            @if(session('info'))
            <div class="mx-6 mt-4 p-4 bg-blue-500 text-white rounded-lg shadow-lg">
                <div class="flex items-center">
                    <i class="ph ph-info text-xl mr-2"></i>
                    {{ session('info') }}
                </div>
            </div>
            @endif

            <div class="pt-24 px-6">
                <div class="flex justify-between items-center">
                    <div class="flex justify-start items-center gap-2">
                        <h3 class="text-xl font-semibold">Materi Tersedia</h3>
                    </div>
                </div>
                <div class="pt-5">
                    <div class="flex flex-col gap-4">
                        @if ($kelasList->count())
                            @foreach ($kelasList as $kelas)
                            <div class="rounded-2xl overflow-hidden shadow2">
                                <div class="p-4 bg-white dark:bg-color10 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                                    <div class="flex items-center gap-3">
                                        <!-- Cover Image with Date Badge -->
                                        <div class="relative rounded-lg overflow-hidden flex-shrink-0">
                                            @if($kelas->cover_image)
                                                <img src="{{ asset('storage/' . $kelas->cover_image) }}" 
                                                     alt="{{ $kelas->nama_kelas }}" 
                                                     class="h-[75px] w-[100px] object-cover rounded-lg" />
                                            @else
                                                <img src="{{ asset('assets/images/library-favourite-img1.png') }}" 
                                                     alt="{{ $kelas->nama_kelas }}" 
                                                     class="h-[75px] w-[100px] object-cover rounded-lg" />
                                            @endif
                                            <!-- Date Badge -->
                                            <div class="absolute bottom-1 right-1 bg-orange-500 text-white text-[9px] px-1.5 py-0.5 rounded-md shadow-sm font-medium">
                                                {{ $kelas->created_at->format('d M') }}
                                            </div>
                                        </div>
                                        
                                        <div class="flex-1 min-w-0">
                                            <!-- Class Name & Badge -->
                                            <div class="flex items-center gap-1 mb-1">
                                                <h4 class="font-semibold text-sm sm:text-base truncate">{{ $kelas->nama_kelas }}</h4>
                                                <!-- <span class="bg-yellow-100 text-yellow-800 text-[9px] sm:text-[10px] px-1 sm:px-2 py-0.5 rounded-full font-medium whitespace-nowrap">Premium</span> -->
                                            </div>
                                            
                                            <!-- Instructor Name -->
                                            <p class="text-gray-600 text-xs sm:text-sm flex items-center gap-1 mb-2 dark:text-gray-300 truncate">
                                                <i class="ph ph-user flex-shrink-0"></i>
                                                <span class="truncate">{{ $kelas->pengajar->first_name ?? $kelas->pengajar->name ?? 'Pengajar belum ada' }}</span>
                                            </p>
                                            
                                            <!-- Course Stats -->
                                            <div class="flex items-center gap-2 sm:gap-3 text-[10px] sm:text-[11px] text-gray-500 mb-2 flex-wrap">
                                                <!-- Siswa terdaftar (dari relasi enrollments jika ada) -->
                                                <div class="flex items-center gap-1">
                                                    <i class="ph ph-users-three"></i>
                                                    <span>{{ $kelas->enrollments_count }} siswa</span>
                                                </div>
                                                <!-- Durasi dari database -->
                                                @if($kelas->durasi)
                                                <div class="flex items-center gap-1">
                                                    <i class="ph ph-clock"></i>
                                                    <span>{{ $kelas->durasi }}</span>
                                                </div>
                                                @endif
                                                <!-- Jumlah materi -->
                                                <div class="flex items-center gap-1">
                                                    <i class="ph ph-book-open"></i>
                                                    <span>{{ $kelas->materis_count }} Materi tersedia</span>
                                                </div>
                                                <!-- Kategori - sesuai gambar kedua -->
                                                <div class="flex items-center gap-1">
                                                    <i class="ph ph-tag"></i>
                                                    <span class="lowercase">{{ $kelas->kategori }}</span>
                                                </div>
                                            </div>
                                            
                                            <!-- Pricing -->
                                            <div class="flex items-center gap-1 sm:gap-2">
                                                <!-- @if($kelas->harga > 0)
                                                    <!-- Jika ada harga - warna hijau -->
                                                    <!-- <span class="text-green-600 font-bold text-sm sm:text-base">
                                                        Rp {{ number_format($kelas->harga, 0, ',', '.') }}K
                                                    </span> -->
                                                    <!-- Simulasi harga diskon -->
                                                    <!-- @php
                                                        $harga_original = $kelas->harga * 1.67;
                                                        $diskon = round((($harga_original - $kelas->harga) / $harga_original) * 100);
                                                    @endphp -->
                                                    <!-- <span class="text-gray-400 line-through text-xs sm:text-sm">
                                                        Rp {{ number_format($harga_original, 0, ',', '.') }}K
                                                    </span>
                                                    <span class="bg-red-100 text-red-600 text-[8px] sm:text-[10px] px-1 py-0.5 rounded-full">
                                                        {{ $diskon }}% OFF
                                                    </span>
                                                @else -->
                                                    <!-- Jika gratis -->
                                                    <!-- <span class="text-green-600 font-bold text-sm sm:text-base">GRATIS</span>
                                                @endif --> 
                                            </div>
                                        </div>
                                        
                                        <!-- Action Buttons -->
                                        <div class="flex flex-col gap-1 sm:gap-2 flex-shrink-0">
                                            <!-- Daftar Button -->
                                            @if($kelas->harga > 0)
                                                <button onclick="alert('Pembayaran kelas: {{ $kelas->nama_kelas }} - Rp {{ number_format($kelas->harga, 0, ',', '.') }}')" 
                                                        class="bg-p2 text-white px-2 sm:px-3 py-1 rounded-full text-[10px] sm:text-[11px] font-medium hover:bg-p2/90 transition w-full">
                                                    Bayar
                                                </button>
                                            @else
                                                <button onclick="alert('Pendaftaran kelas gratis: {{ $kelas->nama_kelas }}')" 
                                                        class="bg-p2 text-white px-2 sm:px-3 py-1 rounded-full text-[10px] sm:text-[11px] font-medium hover:bg-p2/90 transition w-full">
                                                    Daftar
                                                </button>
                                            @endif
                                            
                                            <!-- Form untuk tambah kelas ke daftar belajar -->
                                            <form action="{{ route('daftar-belajar.simpan') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                                                <button type="submit" class="border border-p2 text-p2 px-2 sm:px-3 py-1 rounded-full text-[10px] sm:text-[11px] font-medium hover:bg-p2/10 transition text-center">
                                                    Ambil
                                                </button>
                                            
                                            </form>
                                            
                                            <!-- Link untuk melihat materi berdasarkan pengajar -->
                                            <a href="{{ route('materi.showByPengajar', $kelas->pengajar_id) }}" 
                                               class="text-white text-[10px] sm:text-[11px] bg-p1 px-2 sm:px-3 py-1 rounded-full dark:bg-p1 hover:opacity-90 transition text-center">
                                                Lihat 
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Course Description (Expandable) -->
                                    @if($kelas->deskripsi)
                                    <div class="mt-3 pt-3 border-t border-gray-100 dark:border-gray-700">
                                        <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                                            <span class="line-clamp-2">{{ Str::limit($kelas->deskripsi, 100) }}</span>
                                            @if(strlen($kelas->deskripsi) > 100)
                                                <button onclick="toggleDescription(this)" 
                                                        class="text-p2 hover:underline ml-1 text-xs">
                                                    Selengkapnya
                                                </button>
                                                <div class="hidden full-description">
                                                    <span>{{ $kelas->deskripsi }}</span>
                                                    <button onclick="toggleDescription(this)" 
                                                            class="text-p2 hover:underline ml-1 text-xs">
                                                        Lebih sedikit
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                            <!-- Pagination jika diperlukan -->
                            @if(method_exists($kelasList, 'hasPages') && $kelasList->hasPages())
                                <div class="mt-6">
                                    {{ $kelasList->links() }}
                                </div>
                            @endif
                        @else
                            <div class="text-center py-12">
                                <div class="mb-4">
                                    <i class="ph ph-book-open text-6xl text-gray-300"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-500 mb-2">Belum Ada Kelas Tersedia</h3>
                                <p class="text-gray-400 text-sm">Belum ada kelas dengan materi yang dipublikasikan.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==== js dependencies start ==== -->
    <script>
        // Function untuk toggle description
        function toggleDescription(button) {
            const container = button.closest('.border-t');
            const shortDesc = container.querySelector('.line-clamp-2').parentElement;
            const fullDesc = container.querySelector('.full-description');
            
            if (fullDesc.classList.contains('hidden')) {
                shortDesc.style.display = 'none';
                fullDesc.classList.remove('hidden');
            } else {
                shortDesc.style.display = 'block';
                fullDesc.classList.add('hidden');
            }
        }

        // Function untuk konfirmasi enrollment
        function confirmEnrollment(kelasNama, harga) {
            if (harga > 0) {
                return confirm(`Apakah Anda yakin ingin mendaftar kelas "${kelasNama}" dengan biaya Rp ${new Intl.NumberFormat('id-ID').format(harga)}?`);
            } else {
                return confirm(`Apakah Anda yakin ingin mendaftar kelas gratis "${kelasNama}"?`);
            }
        }

        // Add to wishlist confirmation
        function confirmWishlist(kelasNama) {
            return confirm(`Tambahkan "${kelasNama}" ke daftar keinginan?`);
        }
    </script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script defer src="{{ asset('index.js') }}"></script>
</body>
</html>