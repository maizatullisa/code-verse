<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/notification-setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:40 GMT -->
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
    <title>Notifikasi</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1"
    >
      <!-- Absolute Items Start -->
      <img
        src="assets/images/header-bg-1.png"
        alt=""
        class="absolute top-0 left-0 right-0 -mt-6"
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
      <div class="relative z-10 px-6">
        <div class="flex justify-between items-center gap-4">
          <div class="flex justify-start items-center gap-4">
            <a href="{{ url('/home') }}"
              class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10"
            >
              <i class="ph ph-caret-left"></i>
            </a>
            <h2 class="text-2xl font-semibold text-white">Notifikasi</h2>
          </div>
        </div>
        <!-- Page Title End -->
        <div
          class="bg-white dark:bg-color10 p-5 flex flex-col gap-4 rounded-2xl mt-12"
        >
          <div
            class="flex justify-between items-center py-4 px-5 rounded-xl bg-white border border-color21 dark:bg-color11 dark:border-color24"
          >
            <div class="flex justify-start items-center gap-3">
              <div
                class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
              >
                <i class="ph-fill ph-bell-ringing"></i>
              </div>
              <p class="font-semibold text-sm">Push Notification</p>
            </div>
            <div class="toggle push-notification">
              <div class="circle"></div>
            </div>
          </div>
          <div
            class="flex justify-between items-center py-4 px-5 rounded-xl bg-white border border-color21 dark:bg-color11 dark:border-color24"
          >
            <div class="flex justify-start items-center gap-3">
              <div
                class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
              >
                <i class="ph-fill ph-users-three"></i>
              </div>
              <p class="font-semibold text-sm">Pengikut Baru</p>
            </div>
            <div class="toggle new-followers">
              <div class="circle"></div>
            </div>
          </div>
          <div
            class="flex justify-between items-center py-4 px-5 rounded-xl bg-white border border-color21 dark:bg-color11 dark:border-color24"
          >
            <div class="flex justify-start items-center gap-3">
              <div
                class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
              >
                <i class="ph-fill ph-thumbs-up"></i>
              </div>
              <p class="font-semibold text-sm">Like baru</p>
            </div>
            <div class="toggle new-likes">
              <div class="circle"></div>
            </div>
          </div>
          <div
            class="flex justify-between items-center py-4 px-5 rounded-xl bg-white border border-color21 dark:bg-color11 dark:border-color24"
          >
            <div class="flex justify-start items-center gap-3">
              <div
                class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
              >
                <i class="ph ph-messenger-logo"></i>
              </div>
              <p class="font-semibold text-sm">Pesan</p>
            </div>
            <div class="toggle phone-messanger">
              <div class="circle"></div>
            </div>
          </div>
          
          <div
            class="flex justify-between items-center py-4 px-5 rounded-xl bg-white border border-color21 dark:bg-color11 dark:border-color24"
          >
            <div class="flex justify-start items-center gap-3">
              <div
                class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
              >
                <i class="ph-fill ph-lightbulb-filament"></i>
              </div>
              <p class="font-semibold text-sm">Tips Baru</p>
            </div>
            <div class="toggle new-tips">
              <div class="circle"></div>
            </div>
          </div>
          <div
            class="flex justify-between items-center py-4 px-5 rounded-xl bg-white border border-color21 dark:bg-color11 dark:border-color24"
          >
            <div class="flex justify-start items-center gap-3">
              <div
                class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
              >
                <i class="ph-fill ph-arrows-counter-clockwise"></i>
              </div>
              <p class="font-semibold text-sm">Applikasi Update</p>
            </div>
            <div class="toggle app-update">
              <div class="circle"></div>
            </div>
          </div>
        </div>

        <div class="pt-12">
          <a href="{{ url('/home') }}"
            class="bg-p2 rounded-full py-3 text-white text-sm font-semibold text-center block dark:bg-p1"
            >Lanjut</a
          >
        </div>
      </div>
    </div>

    <!-- Javascript dependencies -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/notification-setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:40 GMT -->
</html>
