<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:16 GMT -->
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
    <title>Lupa Password</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container min-h-dvh relative overflow-hidden py-8 px-6 dark:text-white dark:bg-color1"
    >
      <!-- Absolute Items Start -->
      <img
        src="assets/images/header-bg-2.png"
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
      <div class="flex justify-start items-center gap-4 relative z-10">
         <a href="{{ url('/masuk') }}"
          class="bg-white p-2 rounded-full flex justify-center items-center text-xl dark:bg-color10"
        >
          <i class="ph ph-caret-left"></i>
        </a>
        <h2 class="text-2xl font-semibold text-white">Forgot Password</h2>
      </div>
      <!-- Page Title End -->

      <!-- MASUKKAN OTP -->
      <form action="#" class="relative z-10">
        <div class="bg-white py-8 px-6 rounded-xl mt-12 dark:bg-color10">
          <div class="flex flex-col gap-3 text-center">
            <h3 class="text-xl font-semibold">Lupa Pasword</h3>
            <p class="text-bgColor18 text-sm dark:text-color18">
              Atur ulang akses Anda dengan mudah dan dapatkan kembali kendali dengan layanan pemulihan kata sandi kami.
            </p>
          </div>

          <div class="pt-8">
            <p class="text-sm font-semibold pb-2">Email</p>
            <div
              class="flex justify-between items-center py-3 px-4 border border-color21 rounded-xl dark:border-color18 gap-3"
            >
              <input
                type="text"
                placeholder="Enter Email"
                class="outline-none bg-transparent text-n600 text-sm placeholder:text-sm w-full placeholder:text-bgColor18 dark:text-color18 dark:placeholder:text-color18"
              />
              <i
                class="ph ph-envelope-simple text-xl text-bgColor18 !leading-none"
              ></i>
            </div>
          </div>
        </div>

        <a href="{{ url('/otp') }}"
          class="bg-p2 rounded-full py-3 text-white text-sm font-semibold text-center block mt-12 dark:bg-p1"
          >Lanjut</a
        >
      </form>

      <!-- Sign In Form End -->
    </div>
    <!-- ==== js dependencies start ==== -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:16 GMT -->
</html>
