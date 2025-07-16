<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/players.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:37 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/logo.png"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="assets/css/swiper.min.css" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="manifest.json" />
    <title>Players - Quizio PWA HTML Template</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-black"
    >
      <!-- Absolute Items Start -->
      <img
        src="assets/images/header-bg-1.png"
        alt=""
        class="absolute top-0 left-0 right-0 -mt-24"
      />
      <div
        class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px]"
      ></div>
      <div
        class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px]"
      ></div>
      <div
        class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px]"
      ></div>
      <div
        class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px]"
      ></div>
      <!-- Absolute Items End -->

      <!-- Page Title Start -->
      <div class="relative z-10">
        <div class="flex justify-start items-center gap-4 px-6">
          <h2 class="text-2xl font-semibold text-white">Players</h2>
        </div>
        <!-- Page Title End -->

        <!-- Search Box Start -->
        <div class="flex justify-between items-center gap-3 pt-8 px-6">
          <div
            class="flex justify-start items-center gap-3 bg-color24 border border-color24 p-4 rounded-full text-white w-full"
          >
            <i class="ph ph-magnifying-glass"></i>
            <input
              type="text"
              placeholder="Search Players.."
              class="bg-transparent outline-none placeholder:text-white w-full text-xs"
            />
          </div>
          <div
            class="bg-color24 border border-color24 p-4 rounded-full text-white flex justify-center items-center"
          >
            <i class="ph ph-sliders-horizontal"></i>
          </div>
        </div>
        <!-- Search Box End -->

        <div class="px-6 pt-16">
          <p class="text-xl font-semibold">Players List</p>
          <div class="grid grid-cols-2 gap-4 pt-5">
            <div
              class="p-4 rounded-xl border border-black border-opacity-10 bg-white shadow2 swiper-slide dark:bg-color9 dark:border-color24"
            >
              <div
                class="flex justify-between items-center pb-3 border-b border-dashed border-black border-opacity-10"
              >
                <div
                  class="bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 flex justify-start items-center gap-1 rounded-full dark:bg-bgColor14 dark:border-bgColor16"
                >
                  <i class="ph-fill ph-trophy text-p1"></i>
                  <p class="text-xs font-semibold text-p2 dark:text-white">
                    #1
                  </p>
                </div>
                <img src="assets/images/Flags1.png" alt="" />
              </div>
              <div class="flex flex-col justify-center items-center pt-4">
                <div class="relative size-24 flex justify-center items-center">
                  <img
                    src="assets/images/user-img-1.png"
                    alt=""
                    class="size-[68px] rounded-full"
                  />
                  <img
                    src="assets/images/user-progress.svg"
                    alt=""
                    class="absolute top-0 left-0"
                  />
                  <img
                    src="assets/images/medal1.svg"
                    alt=""
                    class="absolute -bottom-1.5 left-9 size-7"
                  />
                </div>
                <a
                  href="user-profile.html"
                  class="text-xs font-semibold text-color8 dark:text-white pt-4"
                >
                  ShadowStriker
                </a>
                <p class="text-color8 pt-1 pb-4 dark:text-white text-xs">
                  1060 XP
                </p>
                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
            </div>
            <div
              class="p-4 rounded-xl border border-black border-opacity-10 bg-white shadow2 swiper-slide dark:bg-color9 dark:border-color24"
            >
              <div
                class="flex justify-between items-center pb-3 border-b border-dashed border-black border-opacity-10"
              >
                <div
                  class="bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 flex justify-start items-center gap-1 rounded-full dark:bg-bgColor14 dark:border-bgColor16"
                >
                  <i class="ph-fill ph-trophy text-p1"></i>
                  <p class="text-xs font-semibold text-p2 dark:text-white">
                    #2
                  </p>
                </div>
                <img src="assets/images/Flags2.png" alt="" />
              </div>
              <div class="flex flex-col justify-center items-center pt-4">
                <div class="relative size-24 flex justify-center items-center">
                  <img
                    src="assets/images/user-img-2.png"
                    alt=""
                    class="size-[68px] rounded-full"
                  />
                  <img
                    src="assets/images/user-progress.svg"
                    alt=""
                    class="absolute top-0 left-0"
                  />
                  <img
                    src="assets/images/medal2.svg"
                    alt=""
                    class="absolute -bottom-1.5 left-9 size-7"
                  />
                </div>
                <a
                  href="user-profile.html"
                  class="text-xs font-semibold text-color8 dark:text-white pt-4"
                >
                  BlazeKnight
                </a>
                <p class="text-color8 pt-1 pb-4 dark:text-white text-xs">
                  660 XP
                </p>
                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
            </div>
            <div
              class="p-4 rounded-xl border border-black border-opacity-10 bg-white shadow2 swiper-slide dark:bg-color9 dark:border-color24"
            >
              <div
                class="flex justify-between items-center pb-3 border-b border-dashed border-black border-opacity-10"
              >
                <div
                  class="bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 flex justify-start items-center gap-1 rounded-full dark:bg-bgColor14 dark:border-bgColor16"
                >
                  <i class="ph-fill ph-trophy text-p1"></i>
                  <p class="text-xs font-semibold text-p2 dark:text-white">
                    #3
                  </p>
                </div>
                <img src="assets/images/GB.png" alt="" />
              </div>
              <div class="flex flex-col justify-center items-center pt-4">
                <div class="relative size-24 flex justify-center items-center">
                  <img
                    src="assets/images/user-img-3.png"
                    alt=""
                    class="size-[68px] rounded-full"
                  />
                  <img
                    src="assets/images/user-progress.svg"
                    alt=""
                    class="absolute top-0 left-0"
                  />
                  <img
                    src="assets/images/medal3.svg"
                    alt=""
                    class="absolute -bottom-1.5 left-9 size-7"
                  />
                </div>
                <a
                  href="user-profile.html"
                  class="text-xs font-semibold text-color8 dark:text-white pt-4"
                >
                  ShadowStriker
                </a>
                <p class="text-color8 pt-1 pb-4 dark:text-white text-xs">
                  2060 XP
                </p>
                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
            </div>
            <div
              class="p-4 rounded-xl border border-black border-opacity-10 bg-white shadow2 swiper-slide dark:bg-color9 dark:border-color24"
            >
              <div
                class="flex justify-between items-center pb-3 border-b border-dashed border-black border-opacity-10"
              >
                <div
                  class="bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 flex justify-start items-center gap-1 rounded-full dark:bg-bgColor14 dark:border-bgColor16"
                >
                  <i class="ph-fill ph-trophy text-p1"></i>
                  <p class="text-xs font-semibold text-p2 dark:text-white">
                    #4
                  </p>
                </div>
                <img src="assets/images/Flags1.png" alt="" />
              </div>
              <div class="flex flex-col justify-center items-center pt-4">
                <div class="relative size-24 flex justify-center items-center">
                  <img
                    src="assets/images/user-img-4.png"
                    alt=""
                    class="size-[68px] rounded-full"
                  />
                  <img
                    src="assets/images/user-progress.svg"
                    alt=""
                    class="absolute top-0 left-0"
                  />
                  <img
                    src="assets/images/medal1.svg"
                    alt=""
                    class="absolute -bottom-1.5 left-9 size-7"
                  />
                </div>
                <a
                  href="user-profile.html"
                  class="text-xs font-semibold text-color8 dark:text-white pt-4"
                >
                  ShadowStriker
                </a>
                <p class="text-color8 pt-1 pb-4 dark:text-white text-xs">
                  1060 XP
                </p>
                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ==== js dependencies start ==== -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/players.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:37 GMT -->
</html>
