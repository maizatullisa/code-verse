<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/otp-verification.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:28 GMT -->
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
    <title>OTP Verification - Quizio PWA HTML Template</title>
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
        <a
          href="forgot-password.html"
          class="bg-white p-2 rounded-full flex justify-center items-center text-xl dark:bg-color10"
        >
          <i class="ph ph-caret-left"></i>
        </a>
        <h2 class="text-2xl font-semibold text-white">OTP Verification</h2>
      </div>
      <!-- Page Title End -->

      <!-- Sign In Form Start -->
      <form action="#" class="relative z-10 otp-form">
        <div class="bg-white py-8 px-6 rounded-xl mt-12 dark:bg-color10">
          <div class="flex flex-col gap-3 text-center">
            <h3 class="text-xl font-semibold">Enter OTP</h3>
            <p class="text-bgColor18 text-sm dark:text-color18">
              Input the verification code that already sent to
              <span class="text-p1">example@gmail.com</span>
            </p>
          </div>

          <div
            class="flex justify-between items-center gap-3 px-10 max-w-[380px] mx-auto py-6"
          >
            <input type="text" class="item otp-form-item" maxlength="1" />
            <input type="text" class="item otp-form-item" maxlength="1" />
            <input type="text" class="item otp-form-item" maxlength="1" />
            <input type="text" class="item otp-form-item" maxlength="1" />
          </div>
          <p class="text-bgColor18 text-sm dark:text-white pt-2 text-center">
            Didn't receive email?
            <a class="text-p1">Resend</a>
          </p>
        </div>

        <a
          href="create-password.html"
          class="bg-p2 rounded-full py-3 text-white text-sm font-semibold text-center block mt-12 dark:bg-p1"
          >Confirm</a
        >
      </form>

      <!-- Sign In Form End -->
    </div>

    <!-- Javacript Dependecy -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/plugins/opt-form.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/otp-verification.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:29 GMT -->
</html>
