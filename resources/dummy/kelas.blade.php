<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="manifest.json" />
    <title>Kelas Saya</title>
    <link href="style.css" rel="stylesheet">
</head>
<body class="">
    <div class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1">
        <!-- Absolute Items Start -->
        <img src="assets/images/header-bg-1.png" alt="" class="absolute top-0 left-0 right-0 -mt-20" />
        <div class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px]"></div>
        <div class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px]"></div>
        <div class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px]"></div>
        <div class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px]"></div>
        <!-- Absolute Items End -->

        <!-- Page Title Start -->
        <div class="relative z-10 mb-20">
            <div class="flex justify-between items-center gap-4 px-6">
                <div class="flex justify-start items-center gap-4">
                    <a href="{{ route('materi') }}" class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10">
                        <i class="ph ph-caret-left"></i>
                    </a>
                    <h2 class="text-2xl font-semibold text-white">Kelas Yang di Ambil</h2>
                </div>
            </div>
            <!-- Page Title End -->
            
            <!-- Search Box Start -->
            <div class="flex justify-between items-center gap-3 pt-8 px-6">
                <div class="flex justify-start items-center gap-3 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
                    <i class="ph ph-magnifying-glass"></i>
                    <input type="text" placeholder="Cari Materi" class="bg-transparent outline-none placeholder:text-white w-full text-xs" />
                </div>
                <div class="bg-color24 border border-color24 p-4 rounded-full text-white flex justify-center items-center">
                    <i class="ph ph-sliders-horizontal"></i>
                </div>
            </div>
            <!-- Search Box End -->
            
            <div class="userProfileTab pt-24 px-6">
                <ul class="flex justify-start items-center gap-3 tab-button">
                    <li id="tabOne" class="tabButton activeTabButton cursor-pointer">Capaian</li>
                    <li id="tabTwo" class="tabButton cursor-pointer">Selesai</li>
                    <li id="tabThree" class="tabButton cursor-pointer">Belajar</li>
                    <li id="tabFour" class="tabButton cursor-pointer">Kelas Saya</li>
                </ul>

                <div class="pt-8">
                    <!-- Tab Capaian -->
                    <div class="tab-content activeTab" id="tabOne_data">
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex justify-start items-start gap-2 bg-white px-3 pt-3 pb-6 rounded-xl dark:bg-color9">
                                <img src="assets/images/icon1.png" alt="" class="size-12" />
                                <div class="">
                                    <p class="text-sm font-semibold">Kelulusan</p>
                                    <p class="text-xs text-p2 pt-1 dark:text-p1">Lulus 70%</p>
                                </div>
                            </div>
                            <div class="flex justify-start items-start gap-2 bg-white px-3 pt-3 pb-6 rounded-xl dark:bg-color9">
                                <img src="assets/images/icon2.png" alt="" class="size-12" />
                                <div class="">
                                    <p class="text-sm font-semibold">Hail Belajar</p>
                                    <p class="text-xs text-p2 pt-1 dark:text-p1">naik 20%</p>
                                </div>
                            </div>
                            <div class="flex justify-start items-start gap-2 bg-white px-3 pt-3 pb-6 rounded-xl dark:bg-color9">
                                <img src="assets/images/icon3.png" alt="" class="size-12" />
                                <div class="">
                                    <p class="text-sm font-semibold">Materi Selesai</p>
                                    <p class="text-xs text-p2 pt-1 dark:text-p1">2</p>
                                </div>
                            </div>
                            <div class="flex justify-start items-start gap-2 bg-white px-3 pt-3 pb-6 rounded-xl dark:bg-color9">
                                <img src="assets/images/icon4.png" alt="" class="size-12" />
                                <div class="">
                                    <p class="text-sm font-semibold">Materi Belum Selesai</p>
                                    <p class="text-xs text-p2 pt-1 dark:text-p1">Que: 150</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Selesai -->
                    <div class="tab-content hiddenTab" id="tabTwo_data">
                        <div class="flex flex-col gap-5">
                            <div class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="assets/images/library-favourite-img1.png" alt="" class="h-[100px] w-[140px] object-cover" />
                                    <p class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">10</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Kelas HTML</p>
                                    <p class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18">
                                        Capaian 
                                        <i class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"></i>
                                        100%
                                    </p>
                                    <p class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18">
                                        <i class="ph ph-users-three text-base !leading-none"></i>
                                        289 siswa
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="assets/images/library-favourite-img2.png" alt="" class="h-[100px] w-[140px] object-cover" />
                                    <p class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">10 Qs</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Kelas CSS</p>
                                    <p class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18">
                                        Capaian
                                        <i class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"></i>
                                        100%
                                    </p>
                                    <p class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18">
                                        <i class="ph ph-users-three text-base !leading-none"></i>
                                        132 siswa
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="assets/images/library-favourite-img1.png" alt="" class="h-[100px] w-[140px] object-cover" />
                                    <p class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">10 Qs</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Kelas JAVASCRIPT</p>
                                    <p class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18">
                                        Capaian
                                        <i class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"></i>
                                        100%
                                    </p>
                                    <p class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18">
                                        <i class="ph ph-users-three text-base !leading-none"></i>
                                        132 siswa
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="assets/images/library-favourite-img3.png" alt="" class="h-[100px] w-[140px] object-cover" />
                                    <p class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">10 Qs</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Kelas PHP DASAR</p>
                                    <p class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18">
                                        Capaian
                                        <i class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"></i>
                                        100%
                                    </p>
                                    <p class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18">
                                        <i class="ph ph-users-three text-base !leading-none"></i>
                                        132 siswa
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="assets/images/library-favourite-img4.png" alt="" class="h-[100px] w-[140px] object-cover" />
                                    <p class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">10 Qs</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">Kelas BASISDATA</p>
                                    <p class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18">
                                        Capaian 
                                        <i class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"></i>
                                        100%
                                    </p>
                                    <p class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18">
                                        <i class="ph ph-users-three text-base !leading-none"></i>
                                        123 siswa
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Belajar -->
                    <div class="tab-content hiddenTab" id="tabThree_data">
                        <div class="flex flex-col gap-5">
                            @if ($materis->count())
                                @foreach ($materis as $index => $materi)
                                    <div class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7">
                                        <div class="relative rounded-lg overflow-hidden">
                                            <img src="assets/images/library-favourite-img{{ ($index % 5) + 1 }}.png" alt="" class="h-[100px] w-[140px] object-cover" />
                                            <p class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md">
                                                {{ $materi->pivot->status }}
                                            </p>
                                        </div>
                                        <div class="">
                                            <p class="font-semibold">{{ $materi->judul }}</p>
                                            <p class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18">
                                                Pengajar
                                                <i class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"></i>
                                                {{ $materi->pengajar->name ?? 'Tidak diketahui' }}
                                            </p>
                                        <div class="text-xs text-color5 flex justify-start items-center gap-2 dark:text-color18">
                                    <div class="flex justify-start items-center">
                                        <div class="rounded-full bg-white p-0.5">
                                        <img
                                            src="assets/images/user-img-1.png"
                                            alt=""
                                            class="size-6 object-cover rounded-full"
                                        />
                                        </div>
                                        <div class="rounded-full bg-white p-0.5 -ml-2">
                                        <img
                                            src="assets/images/user-img-2.png"
                                            alt=""
                                            class="size-6 object-cover rounded-full"
                                        />
                                        </div>
                                        <div class="rounded-full bg-white p-0.5 -ml-2">
                                        <img
                                            src="assets/images/user-img-3.png"
                                            alt=""
                                            class="size-6 object-cover rounded-full"
                                        />
                                        </div>
                                        <div class="rounded-full bg-white p-0.5 -ml-2">
                                        <img
                                            src="assets/images/user-img-4.png"
                                            alt=""
                                            class="size-6 object-cover rounded-full"
                                        />
                                        </div>
                                        <div class="rounded-full bg-white p-0.5 -ml-2">
                                        <img
                                            src="assets/images/user-img-5.png"
                                            alt=""
                                            class="size-6 object-cover rounded-full"
                                        />
                                        </div>
                                    </div>
                                    <p>Public</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-400 text-md italic">Belum ada materi dalam daftar belajar kamu.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Tab Kelas Saya (New) -->
                    <div class="tab-content hiddenTab" id="tabFour_data">
                        <div class="flex flex-col gap-5">
                           @if ($kelasDiambil->count())
                            @foreach ($kelasDiambil as $kelas)
                                <a href="{{ route('daftar-belajar.pembelajaran', $kelas->id) }}" class="block">
                                    <div class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7 hover:shadow-lg transition-all duration-300">
                                        <div class="relative rounded-lg overflow-hidden flex-shrink-0">
                                            <img src="{{ $kelas->cover_image ? asset('storage/' . $kelas->cover_image) : asset('assets/images/library-favourite-img2.png') }}" 
                                                alt="Cover Image" 
                                                class="h-[100px] w-[140px] object-cover rounded-lg" />
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <p class="font-semibold">{{ $kelas->nama_kelas }}</p>
                                            <p class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18">
                                                Capaian
                                                <i class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"></i>
                                                {{ $kelas->progress ?? '100%' }}
                                            </p>
                                            <p class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18">
                                                <i class="ph ph-users-three text-base !leading-none"></i>
                                                {{ $kelas->jumlah_siswa ?? '0' }} siswa
                                            </p>
                                        </div>
                                        <div class="ml-auto flex items-center">
                                            <span class="text-white text-xs bg-p2 py-1.5 px-3 rounded-full dark:bg-p1">
                                                Belajar
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="text-center py-12">
                                <p class="text-gray-400 text-lg italic">Anda belum mengambil kelas apapun.</p>
                                <a href="{{ route('materi') }}" class="text-p1 underline mt-2 inline-block">Lihat Materi Tersedia</a>
                            </div>
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Tab Buttons Start -->
    <div class="fixed bottom-0 left-0 right-0 z-40">
        <div class="container bg-p2 px-6 py-3 rounded-t-2xl flex justify-around items-center dark:bg-p1">
            <a href="{{ url('/home') }}" class="flex justify-center items-center text-center flex-col gap-1">
                <div class="flex justify-center items-center p-3 rounded-full bg-white dark:bg-color10">
                    <i class="ph ph-house text-xl !leading-none dark:text-white"></i>
                </div>
                <p class="text-xs text-white font-semibold dark:text-color10">Beranda</p>
            </a>
            <a href="{{ url('/library') }}" class="flex justify-center items-center text-center flex-col gap-1">
                <div class="flex justify-center items-center p-3 rounded-full bg-p1 dark:bg-p2">
                    <i class="ph ph-squares-four text-xl !leading-none text-white"></i>
                </div>
                <p class="text-xs text-white font-semibold dark:text-color10">Library</p>
            </a>
            <a href="{{ url(path: '/kelas') }}" class="flex justify-center items-center text-center flex-col gap-1">
                <div class="flex justify-center items-center p-3 rounded-full bg-white dark:bg-color10">
                    <i class="ph ph-users-three text-xl !leading-none dark:text-white"></i>
                </div>
                <p class="text-xs text-white font-semibold dark:text-color10">Kelas</p>
            </a>
            <a href="{{ url(path: '/box') }}" class="flex justify-center items-center text-center flex-col gap-1">
                <div class="flex justify-center items-center p-3 rounded-full bg-white dark:bg-color10">
                    <i class="ph ph-users-three text-xl !leading-none dark:text-white"></i>
                </div>
                <p class="text-xs text-white font-semibold dark:text-color10">Help AI</p>
            </a>
        </div>
    </div>
    <!-- Bottom Tab Buttons End -->

    <!-- Javascript Dependencies -->
    <script src="assets/js/main.js"></script>
    <script defer src="index.js"></script>

    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tabButton');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('activeTabButton'));
                    tabContents.forEach(content => {
                        content.classList.remove('activeTab');
                        content.classList.add('hiddenTab');
                    });

                    // Add active class to clicked button and corresponding content
                    this.classList.add('activeTabButton');
                    const targetTab = document.getElementById(this.id + '_data');
                    if (targetTab) {
                        targetTab.classList.add('activeTab');
                        targetTab.classList.remove('hiddenTab');
                    }
                });
            });
        });
    </script>
</body>
</html>