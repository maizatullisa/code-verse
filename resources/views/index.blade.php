<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:15 GMT -->
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
    <title>Landing</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container bg-white h-screen relative dark:bg-black dark:text-white"
    >
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

      <div class="absolute left-0 bottom-[45%]">
        <img src="assets/images/icon-1.png" alt="" />
      </div>
      <div class="absolute right-0 bottom-[35%]">
        <img src="assets/images/icon-2.png" alt="" />
      </div>
      <div class="relative z-10">
        <img src="assets/images/onboarding-img.png" alt="" />
      </div>
      <section class="pt-24">
        <div class="relative">
          <img
            src="assets/images/icon-3.png"
            class="absolute -top-8 left-4"
            alt=""
          />
          <div class="swiper onboarding-steps-slider">
            <div class="swiper-wrapper">
              <div
                class="swiper-slide flex flex-col justify-center items-center text-center px-4"
              >
                <h1 class="text-4xl font-semibold">
                  Code Verse On <span class="text-p1">Go</span>
                </h1>
                <p class="m-body pt-5 opacity-80">
                  Selamat Datang Para Calon Developer
                </p>
              </div>
              <div
                class="swiper-slide flex flex-col justify-center items-center text-center px-4"
              >
                <h1 class="text-4xl font-semibold">Tahu Ngak sih?? Kalau di CODE VERSE TUH gratis</h1>
                <p class="m-body pt-5 opacity-80">
                  Temukan beberapa materi dengan gratis
                </p>
              </div>
              <div
                class="swiper-slide flex flex-col justify-center items-center text-center px-4"
              >
                <h1 class="text-4xl font-semibold">SIAPPPP??</h1>
                <p class="m-body pt-5 opacity-80">
                  kuyyyy kuyyy klik MULAI
                </p>
              </div>
            </div>

            <div class="flex justify-center items-center py-8">
              <div class="onBoardingsliderPagingation swiper-pagination"></div>
            </div>

            <div class="flex justify-between items-center px-6">
              <a href="{{ url(path: 'masuk') }}"
                class="text-p2 font-semibold dark:text-p1"
                >Lanjutkan</a
              >
              <div class="nextButton">
                <div class="ara-next">
                  <button
                    class="text-white flex justify-center items-center bg-p2 rounded-full text-2xl p-3.5"
                  >
                    <i class="ph ph-arrow-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- ==== js dependencies start ==== -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/plugins/plugins.js"></script>
    <script src="assets/js/plugins/plugin-custom.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:15 GMT -->
</html>
