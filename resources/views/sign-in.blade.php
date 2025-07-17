<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:13 GMT -->
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
    <title>Sign In - Quizio PWA HTML Template</title>
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
          href="index-2.html"
          class="bg-white p-2 rounded-full flex justify-center items-center text-xl dark:bg-color10"
        >
          <i class="ph ph-caret-left"></i>
        </a>
        <h2 class="text-2xl font-semibold text-white">Sign In</h2>
      </div>
      <!-- Page Title End -->

      <!-- Sign In Form Start -->
      <form action="{{ route('login') }}" method="POST" class="relative z-10">
      @csrf
        <div class="bg-white py-8 px-6 rounded-xl mt-12 dark:bg-color10">
          <div class="flex justify-between items-center">
            <a
              href="#"
              class="text-center text-xl font-semibold text-p2 border-b-2 pb-2 border-p2 w-full dark:text-p1 dark:border-p1"
              >Sign In</a
            >
            <a
              href="sign-up.blade.php"
              class="text-center text-xl font-semibold text-bgColor18 border-b-2 pb-2 border-bgColor18 w-full dark:text-color18 dark:border-color18"
              >Sign Up</a
            >
          </div>

          <div class="pt-8">
            <p class="text-sm font-semibold pb-2">Email</p>
            <div
              class="flex justify-between items-center py-3 px-4 border border-color21 rounded-xl dark:border-color18 gap-3"
            >
              <input
                type="email"
                name="email"
                placeholder="Enter Email"
                class="outline-none bg-transparent text-n600 text-sm placeholder:text-sm w-full placeholder:text-bgColor18 dark:text-color18 dark:placeholder:text-color18"
              />
              <i
                class="ph ph-envelope-simple text-xl text-bgColor18 !leading-none"
              ></i>
            </div>
          </div>
          <div class="pt-4">
            <p class="text-sm font-semibold pb-2">Password</p>
            <div
              class="flex justify-between items-center py-3 px-4 border border-color21 rounded-xl dark:border-color18 gap-3"
            >
              <input
                type="password"
                name="password"
                placeholder="*****"
                class="outline-none bg-transparent text-n600 text-sm placeholder:text-sm w-full placeholder:text-bgColor18 dark:text-color18 dark:placeholder:text-color18 passwordField"
              />
              <i
                class="ph ph-eye-slash text-xl text-bgColor18 !leading-none passowordShow cursor-pointer dark:text-color18"
              ></i>
            </div>
          </div>
          <a
            href="forgot-password.html"
            class="text-end text-p2 text-sm font-semibold block pt-2 dark:text-p1"
            >Forgot password?</a
          >
        </div>

        <button type="submit" class="bg-p2 rounded-full py-3 text-white text-sm font-semibold text-center block mt-12 dark:bg-p1 w-full">
          Sign In
        </button>

      </form>
      <div class="relative z-10">
        <div class="flex justify-center items-center my-8 gap-2">
          <div class="border-b border-color21 w-full dark:border-color18"></div>
          <p class="text-sm text-color1 text-nowrap dark:text-white">
            Or Continue With
          </p>
          <div class="border-b border-color21 w-full dark:border-color18"></div>
        </div>
        <div class="flex flex-col gap-4">
               <a
              href="/auth/google"
              class="flex justify-center items-center gap-3 py-3 border border-color21 text-sm font-semibold rounded-full bg-white dark:bg-color11 dark:border-color21"
            >
            <img src="assets/images/google.png" alt="" />
            <p>Continue With</p>
            </a>
          <button
            class="flex justify-center items-center gap-3 py-3 border border-color21 text-sm font-semibold rounded-full bg-white dark:bg-color11 dark:border-color21"
          >
            <img src="assets/images/AppleLogo.png" alt="" />
            <p>Continue With</p>
          </button>
        </div>

        <p class="text-sm font-semibold text-center pt-5">
          Don’t have an account?
          <a href="{{ url('sign-up') }}" class="text-p2 dark:text-p1">Sign Up</a> here
        </p>
      </div>
      <!-- Sign In Form End -->
    </div>

    <!-- Javascript Dependencies -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:15 GMT -->
</html>
