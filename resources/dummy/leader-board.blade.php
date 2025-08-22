<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/leader-board.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:44 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/logo.png"
      type="image/x-icon"
    />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="manifest.json" />
    <title>Leaderboard - Quizio PWA HTML Template</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container min-h-dvh relative overflow-hidden py-8 px-6 dark:text-white dark:bg-color1"
    >
      <!-- Absolute Items Start -->
      <img
        src="assets/images/header-bg-2.png"
        alt=""
        class="absolute top-0 left-0 right-0"
      />
      <div
        class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px] z-10"
      ></div>
      <div
        class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px] z-10"
      ></div>
      <div
        class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px] z-10"
      ></div>
      <div
        class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px] z-10"
      ></div>
      <!-- Absolute Items End -->
      <img
        src="assets/images/leader-bg.png"
        alt=""
        class="fixed top-0 left-0 right-0 w-full -mt-44"
      />

      <!-- Page Title Start -->
      <div class="relative z-20">
        <div class="flex justify-between items-center gap-4">
          <div class="flex justify-start items-center gap-4 relative">
            <a
              href="quiz-details.html"
              class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10"
            >
              <i class="ph ph-caret-left"></i>
            </a>
            <h2 class="text-2xl font-semibold text-white">Leaderboard</h2>
          </div>
        </div>
        <!-- Page Title End -->
        <div class="pt-8">
          <ul class="flex justify-start items-center gap-4">
            <li
              class="text-white text-sm font-semibold px-4 py-2 rounded-lg bg-p1"
            >
              Today
            </li>
            <li
              class="bg-white text-sm font-semibold px-4 py-2 rounded-lg dark:bg-color9"
            >
              Weekly
            </li>
            <li
              class="bg-white text-sm font-semibold px-4 py-2 rounded-lg dark:bg-color9"
            >
              All Time
            </li>
          </ul>
        </div>
        <div class="relative">
          <div class="absolute left-0 top-16">
            <div class="relative size-[110px] p-3.5">
              <img
                src="assets/images/user-img-1.png"
                alt=""
                class="rounded-full"
              />
              <img
                src="assets/images/leader-img-bg.png"
                alt=""
                class="absolute top-0 left-0"
              />
              <p
                class="bg-white size-[30px] rounded-full absolute left-11 -bottom-2.5 flex justify-center items-center"
              >
                <span
                  class="text-white text-sm font-semibold bg-p3 !leading-none flex justify-center items-center rounded-full size-6"
                >
                  2</span
                >
              </p>
            </div>
          </div>
          <div class="absolute left-[120px] top-8">
            <div class="relative size-[145px] p-4">
              <img
                src="assets/images/user-img-2.png"
                alt=""
                class="rounded-full"
              />
              <img
                src="assets/images/leader-img-bg.png"
                alt=""
                class="absolute top-0 left-0"
              />
              <img
                src="assets/images/leader-crown.svg"
                alt=""
                class="absolute -top-7 left-2"
              />

              <div class="absolute left-14 -bottom-3.5">
                <div class="relative size-10 flex justify-center items-center">
                  <img
                    src="assets/images/leader-illus.svg"
                    alt=""
                    class="absolute left-0 top-0"
                  />
                  <span
                    class="text-white text-sm font-semibold !leading-none flex justify-center items-center rounded-full size-6 relative z-10"
                  >
                    1</span
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="absolute right-0 top-16">
            <div class="relative size-[110px] p-3.5">
              <img
                src="assets/images/user-img-3.png"
                alt=""
                class="rounded-full"
              />
              <img
                src="assets/images/leader-img-bg.png"
                alt=""
                class="absolute top-0 right-0"
              />
              <p
                class="bg-white size-[30px] rounded-full absolute right-10 -bottom-2.5 flex justify-center items-center"
              >
                <span
                  class="text-white text-sm font-semibold bg-p2 !leading-none flex justify-center items-center rounded-full size-6"
                >
                  3</span
                >
              </p>
            </div>
          </div>
        </div>
        <div class="flex justify-between items-center pt-44 px-4">
          <div
            class="flex flex-col justify-center items-center gap-2 pt-5 font-semibold"
          >
            <p>Lunar Fang</p>
            <div
              class="flex justify-center items-center gap-1 bg-p3 rounded-full px-4 py-1.5 text-white"
            >
              <i class="ph ph-sketch-logo"></i>
              <p class="text-xs">160</p>
            </div>
          </div>
          <div
            class="flex flex-col justify-center items-center gap-2 pt-5 font-semibold"
          >
            <p>Nova Blaze</p>
            <div
              class="flex justify-center items-center gap-1 bg-p1 rounded-full px-4 py-1.5 text-white"
            >
              <i class="ph ph-sketch-logo"></i>
              <p class="text-xs">160</p>
            </div>
          </div>
          <div
            class="flex flex-col justify-center items-center gap-2 pt-5 font-semibold"
          >
            <p>Moana</p>
            <div
              class="flex justify-center items-center gap-1 bg-p2 rounded-full px-4 py-1.5 text-white"
            >
              <i class="ph ph-sketch-logo"></i>
              <p class="text-xs">160</p>
            </div>
          </div>
        </div>

        <div class="flex flex-col gap-4 pt-8">
          <div
            class="flex justify-between items-center bg-p2 dark:bg-p1 py-4 px-5 rounded-2xl"
          >
            <div class="flex justify-start items-center gap-3">
              <p class="text-xs font-semibold text-white">1</p>
              <img
                src="assets/images/user-img-1.png"
                alt=""
                class="size-10 rounded-full"
              />
              <p
                class="text-xs font-semibold text-white flex justify-start items-center gap-1"
              >
                FrostPhoenix....
                <i class="ph-fill ph-trophy text-p1 text-base"></i>
              </p>
            </div>
            <div
              class="flex justify-center items-center gap-2 bg-white py-1.5 px-4 rounded-full"
            >
              <i class="ph ph-sketch-logo text-p1"></i>
              <p class="text-xs font-semibold dark:text-color9">150</p>
            </div>
          </div>
          <div
            class="flex justify-between items-center bg-color13 dark:bg-color12 py-4 px-5 rounded-2xl"
          >
            <div class="flex justify-start items-center gap-3">
              <p class="text-xs font-semibold text-white">2</p>
              <img
                src="assets/images/user-img-2.png"
                alt=""
                class="size-10 rounded-full"
              />
              <p
                class="text-xs font-semibold text-white flex justify-start items-center gap-1"
              >
                StealthGamer...
                <i class="ph-fill ph-trophy text-p1 text-base"></i>
              </p>
            </div>
            <div
              class="flex justify-center items-center gap-2 bg-white py-1.5 px-4 rounded-full"
            >
              <i class="ph ph-sketch-logo text-p1"></i>
              <p class="text-xs font-semibold dark:text-color9">144</p>
            </div>
          </div>
          <div
            class="flex justify-between items-center bg-color16 dark:bg-bgColor16 py-4 px-5 rounded-2xl"
          >
            <div class="flex justify-start items-center gap-3">
              <p class="text-xs font-semibold text-white">3</p>
              <img
                src="assets/images/user-img-3.png"
                alt=""
                class="size-10 rounded-full"
              />
              <p
                class="text-xs font-semibold text-white flex justify-start items-center gap-1"
              >
                StealthGamer...
                <i class="ph-fill ph-trophy text-p1 text-base"></i>
              </p>
            </div>
            <div
              class="flex justify-center items-center gap-2 bg-white py-1.5 px-4 rounded-full"
            >
              <i class="ph ph-sketch-logo text-p1"></i>
              <p class="text-xs font-semibold dark:text-color9">140</p>
            </div>
          </div>
          <div
            class="flex justify-between items-center bg-white dark:bg-color9 py-4 px-5 rounded-2xl"
          >
            <div class="flex justify-start items-center gap-3">
              <p class="text-xs font-semibold">4</p>
              <img
                src="assets/images/user-img-4.png"
                alt=""
                class="size-10 rounded-full"
              />
              <p
                class="text-xs font-semibold flex justify-start items-center gap-1"
              >
                StealthGamer...
                <i class="ph-fill ph-trophy text-p1 text-base"></i>
              </p>
            </div>
            <div
              class="flex justify-center items-center gap-2 bg-color16 dark:bg-bgColor14 py-1.5 px-4 rounded-full"
            >
              <i class="ph ph-sketch-logo text-p1"></i>
              <p class="text-xs font-semibold">140</p>
            </div>
          </div>
          <div
            class="flex justify-between items-center bg-white dark:bg-color9 py-4 px-5 rounded-2xl"
          >
            <div class="flex justify-start items-center gap-3">
              <p class="text-xs font-semibold">5</p>
              <img
                src="assets/images/user-img-5.png"
                alt=""
                class="size-10 rounded-full"
              />
              <p
                class="text-xs font-semibold flex justify-start items-center gap-1"
              >
                StealthGamer...
                <i class="ph-fill ph-trophy text-p1 text-base"></i>
              </p>
            </div>
            <div
              class="flex justify-center items-center gap-2 bg-color16 dark:bg-bgColor14 py-1.5 px-4 rounded-full"
            >
              <i class="ph ph-sketch-logo text-p1"></i>
              <p class="text-xs font-semibold">140</p>
            </div>
          </div>
          <a
            href="quiz-details.html"
            class="py-3 text-center bg-p2 dark:bg-p1 rounded-full text-sm font-semibold text-white block confirmationModalOpenButton w-full"
          >
            Join Now $20
          </a>
        </div>
      </div>
    </div>
    <!-- ==== js dependencies start ==== -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/leader-board.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:45 GMT -->
</html>
