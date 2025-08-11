<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
    <title>Materi</title>
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
                            <a href="{{ route('materi.showByPengajar', $kelas->pengajar_id) }}" class="rounded-2xl overflow-hidden shadow2">
                                <div class="p-6 bg-white dark:bg-color10 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                                    <div class="flex justify-between items-center">
                                        <div class="flex gap-3 items-center">
                                            {{-- Tanggal publish materi terbaru --}}
                                            <div class="py-2 px-3 text-white bg-p2 rounded-xl dark:bg-p1 dark:text-black text-center shadow-sm">
                                                <p class="font-semibold text-sm leading-none">
                                                    {{ $kelas->materis->first()?->created_at?->format('d M') ?? '-' }}
                                                </p>
                                                <p class="text-[11px] leading-tight">
                                                    {{ $kelas->materis->first()?->created_at?->format('H:i') ?? '' }}
                                                </p>
                                            </div>

                                            <div>
                                                {{-- Nama pengajar --}}
                                                <p class="font-bold text-sm text-gray-800 dark:text-white tracking-wide">
                                                    <i class="ph ph-user"></i> {{ $kelas->pengajar->first_name ?? $kelas->pengajar->name ?? 'Pengajar belum ada' }}
                                                </p>
                                                {{-- Nama kelas --}}
                                                <p class="text-[13px] italic text-gray-600 dark:text-gray-300 truncate max-w-[200px]">
                                                    {{ $kelas->nama_kelas }}
                                                </p>
                                                {{-- Jumlah materi --}}
                                                <p class="text-xs text-gray-500 mt-1">
                                                    📚 {{ $kelas->materis_count }} MATERI TERSEDIA
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex gap-2">
                                            <!-- Form untuk tambah kelas ke daftar belajar -->
                                            <form action="{{ route('daftar-belajar.simpan') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                                                <button type="submit" class="text-white text-xs bg-green-600 py-1.5 px-3 rounded-full hover:bg-green-700 transition">
                                                    <i class="ph ph-check text-xs"></i> Ambil
                                                </button>
                                            </form>
                                            
                                            <a href="{{ route('materi.showByPengajar', $kelas->pengajar_id) }}" class="text-white text-xs bg-p2 py-1.5 px-4 rounded-full dark:bg-p1 hover:opacity-90 transition">
                                                Lihat Semua
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        @else
                            <div class="text-center py-12">
                                <p class="text-gray-400 text-lg italic">Belum ada kelas dengan materi yang dipublikasikan.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==== js dependencies start ==== -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script defer src="{{ asset('index.js') }}"></script>
</body>
</html>