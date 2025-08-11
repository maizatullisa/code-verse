<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
    <title>Detail Materi</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1">
        <!-- Absolute Effects -->
        <img src="{{ asset('assets/images/header-bg-1.png') }}" alt="" class="absolute top-0 left-0 right-0 -mt-16" />
        <div class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px]"></div>
        <div class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px]"></div>
        <div class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px]"></div>
        <div class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px]"></div>

        <!-- Header -->
        <div class="relative z-10">
            <div class="flex justify-between items-center gap-4 px-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('materi') }}" class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10">
                        <i class="ph ph-caret-left"></i>
                    </a>
                    <h2 class="text-2xl font-semibold text-white">Materi Pengajar</h2>
                </div>
            </div>

            <!-- Nama Pengajar -->
            <div class="pt-12 px-6">
                <h3 class="text-xl font-bold text-white">
                    <i class="ph ph-user"></i> {{ $pengajar->first_name ?? $pengajar->name ?? 'Pengajar' }}
                </h3>
            </div>

            <!-- Materi List -->
            <div class="pt-6 px-6">
                @php
                    $allMateris = collect();
                    foreach ($kelasList as $kelas) {
                        $allMateris = $allMateris->merge($kelas->materis);
                    }
                    $allMateris = $allMateris->sortByDesc('created_at');
                @endphp

                @if ($allMateris->count())
                    <div class="grid gap-5 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
                        @foreach ($allMateris as $materi)
                        <div class="p-6 bg-white dark:bg-color10 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3 items-center">
                                    <div class="py-2 px-3 text-white bg-p2 rounded-xl text-center shadow-sm">
                                        <p class="font-semibold text-sm leading-none">
                                            {{ $materi->created_at->format('d M') }}
                                        </p>
                                        <p class="text-[11px] leading-tight">
                                            {{ $materi->created_at->format('H:i') }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="font-bold text-sm text-gray-800 dark:text-white tracking-wide">
                                            {{ $materi->judul }}
                                        </p>
                                        <!-- Tampilkan nama kelas sebagai konteks -->
                                        <p class="text-xs text-blue-600 font-medium mb-1">
                                            {{ $materi->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}
                                        </p>
                                        @if ($materi->deskripsi)
                                        <p class="text-[13px] italic text-gray-600 dark:text-gray-300 truncate max-w-[200px]">
                                            {{ \Illuminate\Support\Str::limit($materi->deskripsi, 100) }}
                                        </p>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <a href="#" class="text-white text-xs bg-green-500 py-1.5 px-4 rounded-full hover:bg-green-600 transition">
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-gray-400 text-lg italic">Belum ada materi yang dipublikasikan.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- ==== js dependencies start ==== -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script defer src="{{ asset('index.js') }}"></script>
</body>
</html>