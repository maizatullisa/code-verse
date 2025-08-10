<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="assets/css/swiper.min.css" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="manifest.json" />
    <title>@yield('title', 'Code Verse')</title>
    <link href="style.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="-z-20">
    <div class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-black">
        
        @yield('content')
        
        @include('mobile.layout.navbarbawah')
        
        <!-- SIDEBAR MULAI -->
        <div class="hidden sidebarModal inset-0 z-50">
            <div class="container bg-black bg-opacity-80 h-full overflow-y-auto">
                <div class="w-[330px] bg-slate-50 relative">
                    <button class="sidebarModalCloseButton absolute top-3 right-3 border rounded-full border-p1 flex justify-center items-center p-1 text-white">
                        <i class="ph ph-x"></i>
                    </button>
                    <div class="bg-p2 text-white pt-8 pb-4 px-5">
                        <div class="flex justify-start items-center gap-3 pb-6 border-b border-color24 border-dashed">
                            <img src="assets/images/user_sidebar.png" alt="" />
                            {{--
                            <div class="">
                                <p class="text-2xl font-semibold">
                                {{ $user->first_name }}<i class="ph-fill ph-seal-check text-p1"></i>
                                </p>
                                <p class="text-xs">
                                    <span class="font-semibold">ID :</span>{{ $user->id }}
                                </p>
                            </div> --}}
                        </div>
                        <div class="flex justify-between items-center pt-6">
                            <div class="flex justify-start items-start gap-2">
                                <div class="flex justify-center items-center text-white rounded-full bg-p1 p-1.5">
                                    <i class="ph-fill ph-chart-bar"></i>
                                </div>
                                <div class="">
                                    <p class="text-xs">Rank</p>
                                    <p class="text-base font-semibold">420</p>
                                </div>
                            </div>
                            <div class="h-8 w-px bg-[linear-gradient(180deg,rgba(255,255,255,0.00)_0%,rgba(255,255,255,0.99)_49.48%,rgba(255,255,255,0.00)_100%)]"></div>
                            <div class="flex justify-start items-start gap-2">
                                <div class="flex justify-center items-center text-white rounded-full bg-p1 p-1.5">
                                    <i class="ph-fill ph-coins"></i>
                                </div>
                                <div class="">
                                    <p class="text-xs">Code Verse Coin Earned</p>
                                    <p class="text-base font-semibold">20</p>
                                </div>
                            </div>
                        </div>
                        <p class="pt-5 text-end text-xs">
                            <span class="text-p1">* </span>Berjalan Bulan
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <a href="upgrade-premium.html" class="flex justify-between items-center py-3 px-4 bg-p1 text-white">
                            <div class="flex justify-center items-center rounded-full">
                                <i class="ph ph-arrow-right"></i>
                            </div>
                        </a>
                        <a href="{{ url('/profile') }}">
                            <div class="flex justify-start items-center gap-3 cursor-pointer">
                                <div class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1">
                                    <i class="ph ph-user"></i>
                                </div>
                                <p class="font-semibold dark:text-white">Saya</p>
                            </div>
                        </a>
                        
                        <a href="earn-rewards.html" class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24">
                            <div class="flex justify-start items-center gap-3">
                                <div class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1">
                                    <i class="ph ph-users-three"></i>
                                </div>
                                <p class="font-semibold dark:text-white">Forum Diskusi</p>
                            </div>
                        </a>
                        
                        <a href="{{ url('/notification') }}" class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24">
                            <div class="flex justify-start items-center gap-3">
                                <div class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1">
                                    <i class="ph ph-bell"></i>
                                </div>
                                <p class="font-semibold dark:text-white">Notifikasi</p>
                            </div>
                            <div class="flex justify-center items-center rounded-full text-p2 dark:text-p1">
                                <i class="ph ph-arrow-right"></i>
                            </div>
                        </a>

                        <a href="{{ url('/settings') }}" class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24">
                            <div class="flex justify-start items-center gap-3">
                                <div class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1">
                                    <i class="ph ph-gear-six"></i>
                                </div>
                                <p class="font-semibold dark:text-white">Pengaturan</p>
                            </div>
                            <div class="flex justify-center items-center rounded-full text-p2 dark:text-p1">
                                <i class="ph ph-arrow-right"></i>
                            </div>
                        </a>
                        
                        <a href="{{ url('/games/pilih-game') }}" class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24">
                            <div class="flex justify-start items-center gap-3">
                                <div class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1">
                                    <i class="ph ph-medal"></i>
                                </div>
                                <p class="font-semibold dark:text-white">Game</p>
                            </div>
                            <div class="flex justify-center items-center rounded-full text-p2 dark:text-p1">
                                <i class="ph ph-arrow-right"></i>
                            </div>
                        </a>
                        <a href="help-center.html" class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24">
                            <div class="flex justify-start items-center gap-3">
                                <div class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1">
                                    <i class="ph ph-seal-question"></i>
                                </div>
                                <p class="font-semibold dark:text-white">Hubungi Kami</p>
                            </div>
                            <div class="flex justify-center items-center rounded-full text-p2 dark:text-p1">
                                <i class="ph ph-arrow-right"></i>
                            </div>
                        </a>
                        
                        <button class="flex justify-between items-center py-3 px-4 dark:bg-color1 withdrawModalOpenButton">
                            <div class="flex justify-start items-center gap-3">
                                <div class="flex justify-center items-center p-2 rounded-full border text-lg !leading-none bg-bgColor14 border-bgColor16 text-p1">
                                    <i class="ph ph-sign-out"></i>
                                </div>
                                <p class="font-semibold text-p1">Logout</p>
                            </div>
                            <div class="flex justify-center items-center rounded-full text-p1">
                                <i class="ph ph-arrow-right"></i>
                            </div>
                        </button>
                    </div>
                    <div class="flex justify-between items-center p-4 bg-p2 dark:bg-p1 text-white">
                        <p class="text-sm">Rate this App</p>
                        <div class="flex justify-start items-center gap-1 text-yellow-400 dark:text-white">
                            <i class="ph-fill ph-star-half"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar End -->

        <!-- Logout Modal Start -->
        <div class="hidden inset-0 withdrawModal z-50">
            <div class="bg-black opacity-40 absolute inset-0 container"></div>
            <div class="flex justify-end items-end flex-col h-full">
                <div class="container relative">
                    <img src="assets/images/modal-bg-white.png" alt="" class="dark:hidden" />
                    <img src="assets/images/modal-bg-black.png" alt="" class="hidden dark:block" />
                    <div class="bg-white dark:bg-color1 relative z-40 overflow-auto pb-8">
                        <div class="px-6 pt-8 border-b border-color21 dark:border-color24 border-dashed pb-5 mx-6">
                            <p class="text-2xl text-p1 text-center font-semibold">Keluar</p>
                        </div>
                        <div class="pt-5 px-6">
                            <p class="text-color5 dark:text-white pb-8 text-center">
                                Apakah Kamu Yakin Ingin Keluar?
                            </p>
                            <div class="flex justify-between items-center gap-3">
                                <button class="withdrawModalCloseButton border border-color16 bg-color14 rounded-full py-3 text-p2 text-sm font-semibold text-center block dark:border-p1 w-full dark:text-white">
                                    Batal
                                </button>
                                <a href="masuk" class="bg-p2 rounded-full py-3 text-white text-sm font-semibold text-center block dark:bg-p1 w-full">
                                    Ya, Saya Yakakin
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Logout Modal End -->
    </div>

    <!-- Js Dependencies -->
    <script src="assets/js/plugins/plugins.js"></script>
    <script src="assets/js/plugins/plugin-custom.js"></script>
    <script src="assets/js/plugins/circle-slider.js"></script>
    <script src="assets/js/main.js"></script>
    <script defer src="index.js"></script>
    @stack('scripts')
</body>
</html>