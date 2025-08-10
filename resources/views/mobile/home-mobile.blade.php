@extends('mobile.layout.master')

@section('title', 'Home - Code Verse')

@section('content')
<!-- ITEM MULAI -->
<img src="assets/images/header-bg-1.png" alt="" class="absolute top-0 left-0 right-0 -mt-6" />
<div class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px]"></div>
<div class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px]"></div>
<div class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px]"></div>
<div class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px]"></div>
<!-- ITEM SELESAI -->

<!-- Page Title Start -->
<div class="relative z-10 pb-20">
    <div class="flex justify-between items-center gap-4 px-6 relative z-20">
        <div class="flex justify-start items-center gap-2">
            <button class="sidebarModalOpenButton text-2xl text-white !leading-none">
                <i class="ph ph-list"></i>
            </button>
            <h2 class="text-2xl font-semibold text-white">Code Verse</h2>
        </div>
        <div class="flex justify-start items-center gap-2">
            <a href="#" class="text-white border border-color24 p-2 rounded-full flex justify-center items-center bg-color24">
                <i class="ph ph-bell"></i>
            </a>
            <a href="{{ url('/...') }}" class="text-white border border-color24 p-2 rounded-full flex justify-center items-center bg-color24">
                <i class="ph ph-user"></i>
            </a>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Search Box Start -->
    <div class="flex justify-between items-center gap-3 pt-8 px-6 relative z-20">
        <a href="{{ url('/search-result') }}" class="flex justify-start items-center gap-3 bg-color24 border border-color24 p-4 rounded-full text-white w-full">
            <i class="ph ph-magnifying-glass"></i>
            <span class="text-white w-full text-xs">
                <span>Cari Materi</span>
            </span>
        </a>
        <div class="bg-color24 border border-color24 p-4 rounded-full text-white flex justify-center items-center">
            <i class="ph ph-sliders-horizontal"></i>
        </div>
    </div>
    <!-- Search Box End -->
    
    <div class="relative">
        <p class="text-white text-center pt-5 text-sm font-semibold">
            Platform Pembelajaran Online Untuk Para Coder
        </p>
        <div class="absolute -left-[53%] -top-[620px] min-[370px]:-top-[650px] min-[380px]:-top-[680px] min-[400px]:-top-[720px] min-[420px]:-top-[750px]">
            <div class="flex justify-around items-center rounded-full relative rotate-0 circleSliders duration-700 max-[430px]:size-[209vw] size-[900px]">
                <a href="#" class="flex flex-col justify-center items-center text-center gap-3 absolute -left-[1%] bottom-[35%] rotate-[58deg]">
                    <img src="assets/images/icon1.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Puzzle Quiz</p>
                </a>
                <div class="flex flex-col justify-center items-center text-center gap-3 absolute left-[2%] bottom-[24%] rotate-[58deg]">
                    <img src="assets/images/icon2.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Music Quiz</p>
                </div>
                <div class="flex flex-col justify-center items-center text-center gap-3 absolute left-[7%] bottom-[14.5%] rotate-[58deg]">
                    <img src="assets/images/icon3.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Language Quiz</p>
                </div>
                <div class="flex flex-col justify-center items-center text-center gap-3 absolute left-[15.5%] bottom-[7.5%] rotate-[58deg]">
                    <img src="assets/images/icon4.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Picture Quiz</p>
                </div>

                <div class="flex flex-col justify-center items-center text-center gap-3 absolute left-[29%] bottom-0">
                    <img src="assets/images/icon1.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Music Quiz</p>
                </div>
                <div class="flex flex-col justify-center items-center text-center gap-3 absolute left-[39.5%] -bottom-[3%]">
                    <img src="assets/images/icon3.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Puzzle Quiz</p>
                </div>
                <div class="flex flex-col justify-center items-center text-center gap-3 absolute right-[40.5%] -bottom-[3%]">
                    <img src="assets/images/icon4.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Language Quiz</p>
                </div>
                <div class="flex flex-col justify-center items-center text-center gap-3 absolute right-[31%] bottom-0">
                    <img src="assets/images/icon2.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Picture Quiz</p>
                </div>

                <div class="flex flex-col justify-center items-center text-center gap-3 absolute right-[16.5%] bottom-[6.5%] rotate-[-58deg]">
                    <img src="assets/images/icon2.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Puzzle Quiz</p>
                </div>
                <div class="flex flex-col justify-center items-center text-center gap-3 absolute right-[8%] bottom-[13%] rotate-[-58deg]">
                    <img src="assets/images/icon4.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Music Quiz</p>
                </div>
                <div class="flex flex-col justify-center items-center text-center gap-3 absolute right-[2%] bottom-[23.5%] rotate-[-58deg]">
                    <img src="assets/images/icon2.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Picture Quiz</p>
                </div>
                <div class="flex flex-col justify-center items-center text-center gap-3 absolute right-0 bottom-[34%] rotate-[-58deg]">
                    <img src="assets/images/icon1.png" alt="" class="" />
                    <p class="text-xs font-semibold dark:text-white">Puzzle Quiz</p>
                </div>
            </div>
        </div>
        
        <div class="flex justify-start items-center gap-1 flex-col pt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="202" height="202">
                <path d="M76.388 165.94C75.9671 167.043 74.7305 167.599 73.6407 167.145C70.8225 165.972 68.0826 164.618 65.4379 163.094C64.4153 162.504 64.1052 161.184 64.7252 160.18V160.18C65.3453 159.175 66.6606 158.867 67.6844 159.454C70.0989 160.84 72.5974 162.074 75.1655 163.149C76.2544 163.605 76.8088 164.837 76.388 165.94V165.94Z" fill="#141414" fill-opacity="0.16" id="itemLeft" />
                <path d="M124.225 166.48C124.629 167.59 124.057 168.82 122.936 169.19C110.033 173.452 96.1783 173.936 83.0093 170.584C81.8653 170.293 81.2096 169.106 81.535 167.971V167.971C81.8604 166.836 83.0434 166.184 84.1878 166.473C96.4884 169.579 109.42 169.127 121.474 165.171C122.595 164.803 123.821 165.371 124.225 166.48V166.48Z" fill="#FF710F" id="itemCenter" />
                <path d="M141.502 157.326C142.203 158.276 142.002 159.617 141.031 160.288C138.52 162.024 135.9 163.597 133.187 164.996C132.138 165.537 130.86 165.084 130.35 164.02V164.02C129.84 162.955 130.291 161.682 131.339 161.139C133.811 159.858 136.2 158.424 138.493 156.845C139.465 156.176 140.802 156.376 141.502 157.326V157.326Z" fill="#141414" fill-opacity="0.16" id="itemRight" />
            </svg>
        </div>
    </div>

    <div class="px-6">
        <div class="px-4 bg-p2 flex justify-between items-center rounded-2xl relative after:absolute after:h-full after:left-2 after:right-2 after:bg-p2 after:mt-6 after:opacity-30 after:rounded-2xl after:-z-10 before:absolute before:h-full before:bg-p2 before:mt-12 before:opacity-30 before:rounded-2xl before:-z-10 before:left-4 before:right-4">
            <div class="text-white font-semibold !leading-none pl-2">
                <p class="">Ajak Temanmu</p>
                <p class="text-[36px] py-2 pl-2">20%</p>
                <p class="pl-7">dapatkan diskon</p>
            </div>
            <div class="">
                <img src="assets/images/invite_illus.png" alt="" />
            </div>
        </div>
    </div>

    <div class="pt-12 px-6">
        <div class="flex justify-between items-center">
            <div class="flex justify-start items-center gap-2">
                <i class="ph-fill text-xl ph-trophy text-p1"></i>
                <h3 class="text-xl font-semibold">Rekomendasi Materi</h3>
            </div>
            <a href="{{ url('/materi') }}" class="text-p1 font-semibold text-sm">Lihat Semua</a>
        </div>
        <div class="pt-5">
            <a href="{{ url('/detail') }}" class="rounded-2xl overflow-hidden shadow2 block">
                <div class="flex justify-between items-center py-3.5 px-5 bg-p2 bg-opacity-20 dark:bg-bgColor16">
                    <div class="flex justify-start items-center gap-3">
                        <p class="font-medium"> mulai</p>
                        <div class="flex justify-start items-center gap-1">
                            <p class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md">05</p>
                            <p class="text-p2 text-base font-semibold dark:text-white">:</p>
                            <p class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md">14</p>
                            <p class="text-p2 text-base font-semibold dark:text-white">:</p>
                            <p class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md">20</p>
                        </div>
                    </div>
                    <p class="text-xs text-p1"> Baca Instruksi</p>
                </div>
                <div class="p-5 bg-white dark:bg-color10">
                    <div class="flex justify-start items-center gap-2">
                        <div class="py-1 px-2 text-white bg-p2 rounded-lg dark:bg-p1 dark:text-black">
                            <p class="font-semibold text-xs">19 Jun</p>
                            <p class="text-[10px]">04.32</p>
                        </div>
                        <div class="">
                            <p class="font-semibold text-sm">Quiz</p>
                            <p class="text-xs">Dasar Dasar Pemrograman</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center text-xs py-5 border-b border-dashed border-black border-opacity-10 dark:border-color24">
                        <div class="">
                            <p>Waktu Mksimal</p>
                            <p class="font-semibold">5 min</p>
                        </div>
                        <div class="">
                            <p>Soal</p>
                            <p class="font-semibold">5</p>
                        </div>
                        <div class="">
                            <p>No of Contest</p>
                            <p class="font-semibold">1</p>
                        </div>
                    </div>
                    <div class="pt-5 flex justify-between items-center">
                        <div class="flex justify-start items-center gap-1">
                            <i class="ph ph-brain text-p2"></i>
                            <p class="text-xs">Trivia Quiz</p>
                        </div>
                        <div class="flex justify-start items-center gap-2">
                            <i class="ph ph-bell-ringing"></i>
                            <i class="ph ph-share-network"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="pt-12 pl-6">
        <div class="flex justify-between items-center pr-6">
            <div class="flex justify-start items-center gap-2">
                <i class="ph-fill text-xl ph-trophy text-p1"></i>
                <h3 class="text-xl font-semibold">Pengajar Terbaik</h3>
            </div>
            <a href="{{ url('/pengajar') }}" class="text-p1 font-semibold text-sm">Lihat Semua</a>
        </div>
        <div class="pt-5 swiper best-player-slider">
            <div class="swiper-wrapper">
                <div class="p-4 rounded-xl border border-black border-opacity-10 bg-white shadow2 swiper-slide dark:bg-color9 dark:border-color24">
                    <div class="flex justify-between items-center pb-3 border-b border-dashed border-black border-opacity-10">
                        <div class="bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 flex justify-start items-center gap-1 rounded-full dark:bg-bgColor14 dark:border-bgColor16">
                            <i class="ph-fill ph-trophy text-p1"></i>
                            <p class="text-xs font-semibold text-p2 dark:text-white">#1</p>
                        </div>
                        <img src="assets/images/Flags1.png" alt="" />
                    </div>
                    <div class="flex flex-col justify-center items-center pt-4">
                        <div class="relative size-24 flex justify-center items-center">
                            <img src="assets/images/user-img-1.png" alt="" class="size-[68px] rounded-full" />
                            <img src="assets/images/user-progress.svg" alt="" class="absolute top-0 left-0" />
                            <img src="assets/images/medal1.svg" alt="" class="absolute -bottom-1.5 left-9 size-7" />
                        </div>
                        <a href="user-profile.html" class="text-xs font-semibold text-color8 dark:text-white pt-4">Budi</a>
                        <p class="text-color8 pt-1 pb-4 dark:text-white text-xs">Fullstack Developer</p>
                        <button class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1">Follow</button>
                    </div>
                </div>
                
                <div class="p-4 rounded-xl border border-black border-opacity-10 bg-white shadow2 swiper-slide dark:bg-color9 dark:border-color24">
                    <div class="flex justify-between items-center pb-3 border-b border-dashed border-black border-opacity-10">
                        <div class="bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 flex justify-start items-center gap-1 rounded-full dark:bg-bgColor14 dark:border-bgColor16">
                            <i class="ph-fill ph-trophy text-p1"></i>
                            <p class="text-xs font-semibold text-p2 dark:text-white">#2</p>
                        </div>
                        <img src="assets/images/Flags2.png" alt="" />
                    </div>
                    <div class="flex flex-col justify-center items-center pt-4">
                        <div class="relative size-24 flex justify-center items-center">
                            <img src="assets/images/user-img-2.png" alt="" class="size-[68px] rounded-full" />
                            <img src="assets/images/user-progress.svg" alt="" class="absolute top-0 left-0" />
                            <img src="assets/images/medal2.svg" alt="" class="absolute -bottom-1.5 left-9 size-7" />
                        </div>
                        <a href="user-profile.html" class="text-xs font-semibold text-color8 dark:text-white pt-4">Andi</a>
                        <p class="text-color8 pt-1 pb-4 dark:text-white text-xs">AI Enginner</p>
                        <button class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1">Follow</button>
                    </div>
                </div>
                
                <div class="p-4 rounded-xl border border-black border-opacity-10 bg-white shadow2 swiper-slide dark:bg-color9 dark:border-color24">
                    <div class="flex justify-between items-center pb-3 border-b border-dashed border-black border-opacity-10">
                        <div class="bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 flex justify-start items-center gap-1 rounded-full dark:bg-bgColor14 dark:border-bgColor16">
                            <i class="ph-fill ph-trophy text-p1"></i>
                            <p class="text-xs font-semibold text-p2 dark:text-white">#3</p>
                        </div>
                        <img src="assets/images/GB.png" alt="" />
                    </div>
                    <div class="flex flex-col justify-center items-center pt-4">
                        <div class="relative size-24 flex justify-center items-center">
                            <img src="assets/images/user-img-3.png" alt="" class="size-[68px] rounded-full" />
                            <img src="assets/images/user-progress.svg" alt="" class="absolute top-0 left-0" />
                            <img src="assets/images/medal3.svg" alt="" class="absolute -bottom-1.5 left-9 size-7" />
                        </div>
                        <a href="user-profile.html" class="text-xs font-semibold text-color8 dark:text-white pt-4">Dedi</a>
                        <p class="text-color8 pt-1 pb-4 dark:text-white text-xs">Security Enginner</p>
                        <button class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1">Follow</button>
                    </div>
                </div>
                
                <div class="p-4 rounded-xl border border-black border-opacity-10 bg-white shadow2 swiper-slide dark:bg-color9 dark:border-color24">
                    <div class="flex justify-between items-center pb-3 border-b border-dashed border-black border-opacity-10">
                        <div class="bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 flex justify-start items-center gap-1 rounded-full dark:bg-bgColor14 dark:border-bgColor16">
                            <i class="ph-fill ph-trophy text-p1"></i>
                            <p class="text-xs font-semibold text-p2 dark:text-white">#1</p>
                        </div>
                        <img src="assets/images/Flags1.png" alt="" />
                    </div>
                    <div class="flex flex-col justify-center items-center pt-4">
                        <div class="relative size-24 flex justify-center items-center">
                            <img src="assets/images/user-img-1.png" alt="" class="size-[68px] rounded-full" />
                            <img src="assets/images/user-progress.svg" alt="" class="absolute top-0 left-0" />
                            <img src="assets/images/medal1.svg" alt="" class="absolute -bottom-1.5 left-9 size-7" />
                        </div>
                        <a href="user-profile.html" class="text-xs font-semibold text-color8 dark:text-white pt-4">Imam</a>
                        <p class="text-color8 pt-1 pb-4 dark:text-white text-xs">Network Engineer</p>
                        <button class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1">Follow</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection