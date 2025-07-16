<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/my-wallet.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:40 GMT -->
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
    <title>My Wallet - Quizio PWA HTML Template</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1"
    >
      <!-- Absolute Items Start -->
      <img
        src="assets/images/header-bg-1.png"
        alt=""
        class="absolute top-0 left-0 right-0 -mt-32"
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
            <a
              href="my-profile.html"
              class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10"
            >
              <i class="ph ph-caret-left"></i>
            </a>
            <h2 class="text-2xl font-semibold text-white">My Wallet</h2>
          </div>
        </div>
        <!-- Page Title End -->
        <div
          class="p-5 mt-8 bg-p1 flex justify-between items-center rounded-2xl relative after:absolute after:h-full after:left-2 after:right-2 after:bg-p1 after:mt-6 after:opacity-30 after:rounded-2xl after:-z-10 before:absolute before:h-full before:bg-p1 before:mt-12 before:opacity-30 before:rounded-2xl before:-z-10 before:left-4 before:right-4"
        >
          <div class="flex justify-start items-start gap-3">
            <div
              class="size-12 bg-white rounded-full flex justify-center items-center text-color9 text-xl"
            >
              <i class="ph ph-bank"></i>
            </div>
            <div class="">
              <p class="text-2xl font-semibold text-white">$60.00</p>
              <p class="text-xs text-bgColor5">Current Balance</p>
            </div>
          </div>
          <button
            class="bg-white text-color9 py-2 px-5 rounded-xl font-semibold text-xs withdrawModalOpenButton"
          >
            Add Money
          </button>
        </div>

        <div
          class="p-6 bg-white border-color21 dark:border-color24 dark:bg-color10 rounded-2xl flex flex-col gap-5 mt-14"
        >
          <div
            class="flex justify-start items-center gap-3 pb-5 border-b border-color21 dark:border-color24 border-dashed"
          >
            <div
              class="flex justify-center items-center p-3.5 rounded-full bg-color16 border-color14 dark:bg-bgColor14 dark:border-bgColor16 border text-p2 dark:text-p1 text-2xl !leading-none"
            >
              <i class="ph ph-currency-circle-dollar"></i>
            </div>
            <div class="">
              <p class="text-sm font-semibold">Amount Added (Un-utilised)</p>
              <p class="text-2xl font-semibold text-p2">$64</p>
            </div>
          </div>
          <div
            class="flex justify-between items-center pb-5 border-b border-color21 dark:border-color24 border-dashed"
          >
            <div class="flex justify-start items-center gap-3">
              <div
                class="flex justify-center items-center p-3.5 rounded-full bg-color16 border-color14 dark:bg-bgColor14 dark:border-bgColor16 border text-p2 dark:text-p1 text-2xl !leading-none"
              >
                <i class="ph ph-currency-circle-dollar"></i>
              </div>
              <div class="">
                <p class="text-sm font-semibold">Winning</p>
                <p class="text-2xl font-semibold text-p2">$6</p>
              </div>
            </div>
            <a
              href="request-withdrew.html"
              class="py-2 px-5 rounded-md text-white bg-p2 dark:bg-p1 text-xs font-semibold"
              >Withdraw</a
            >
          </div>
          <div
            class="flex justify-start items-center gap-3 pb-5 border-b border-color21 dark:border-color24 border-dashed"
          >
            <div
              class="flex justify-center items-center p-3.5 rounded-full bg-color16 border-color14 dark:bg-bgColor14 dark:border-bgColor16 border text-p2 dark:text-p1 text-2xl !leading-none"
            >
              <i class="ph ph-currency-circle-dollar"></i>
            </div>
            <div class="">
              <p class="text-sm font-semibold">Bonus</p>
              <p class="text-2xl font-semibold text-p2">$4</p>
            </div>
          </div>
          <div
            class="flex justify-start items-center gap-3 pb-5 border-b border-color21 dark:border-color24 border-dashed"
          >
            <div
              class="flex justify-center items-center p-3.5 rounded-full bg-color16 border-color14 dark:bg-bgColor14 dark:border-bgColor16 border text-p2 dark:text-p1 text-2xl !leading-none"
            >
              <i class="ph ph-coins"></i>
            </div>
            <div class="">
              <p class="text-sm font-semibold">Coin</p>
              <p class="text-2xl font-semibold text-p2">$32</p>
            </div>
          </div>
        </div>
        <div
          class="p-6 bg-white border-color21 dark:border-color24 dark:bg-color10 rounded-2xl flex flex-col gap-5 mt-8"
        >
          <div
            class="flex justify-between items-center border-b border-color21 dark:border-color24 border-dashed pb-5"
          >
            <div class="flex justify-start items-center gap-3">
              <div
                class="flex justify-center items-center p-3.5 rounded-full bg-color16 border-color14 dark:bg-bgColor14 dark:border-bgColor16 border text-p2 dark:text-p1 text-2xl !leading-none"
              >
                <i class="ph ph-currency-circle-dollar"></i>
              </div>
              <p class="text-sm font-semibold">My Transection</p>
            </div>
            <a
              href="#"
              class="p-2 bg-color16 border-color14 dark:bg-bgColor14 dark:border-bgColor16 border flex justify-center items-center rounded-full"
            >
              <i class="ph ph-caret-right"></i>
            </a>
          </div>
          <div class="flex justify-between items-center gap-4">
            <div class="flex justify-start items-center gap-3">
              <div
                class="flex justify-center items-center p-3.5 rounded-full bg-color16 border-color14 dark:bg-bgColor14 dark:border-bgColor16 border text-p2 dark:text-p1 text-2xl !leading-none"
              >
                <i class="ph ph-currency-circle-dollar"></i>
              </div>
              <div class="">
                <p class="text-sm font-semibold">Refer & Earn</p>
                <p class="text-xs pt-1">
                  Invite 40 friends and collect bonous upto $50
                </p>
              </div>
            </div>
            <a
              href="#"
              class="p-2 bg-color16 border-color14 dark:bg-bgColor14 dark:border-bgColor16 border flex justify-center items-center rounded-full"
            >
              <i class="ph ph-caret-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden inset-0 z-50 withdrawModal">
      <div class="bg-black opacity-40 absolute inset-0 container"></div>
      <div class="flex justify-end items-end flex-col h-full">
        <div class="container relative">
          <img
            src="assets/images/modal-bg-white.png"
            alt=""
            class="dark:hidden"
          />
          <img
            src="assets/images/modal-bg-black.png"
            alt=""
            class="hidden dark:block"
          />
          <div class="bg-white dark:bg-color1 relative z-40 overflow-auto pb-8">
            <div class="flex justify-between items-center px-6 pt-10">
              <p class="text-2xl text-color9 font-semibold dark:text-white">
                Add Money
              </p>
              <button
                class="p-2 rounded-full border flex justify-center items-center withdrawModalCloseButton dark:text-white"
              >
                <i class="ph ph-x"></i>
              </button>
            </div>
            <div
              class="mt-6 mx-6 flex justify-start items-center gap-2 bg-p1 py-3 px-4 rounded-xl"
            >
              <div
                class="flex justify-center items-center p-2 bg-white rounded-full text-p1"
              >
                <i class="ph ph-wallet"></i>
              </div>
              <p class="text-white">
                Wallet Balance : <span class="font-semibold">$100</span>
              </p>
            </div>
            <div class="px-6 pt-5">
              <p class="pb-2 dark:text-white">Select Amount to added</p>
              <div class="py-3 px-4 bg-white rounded-xl border border-color21">
                <input
                  type="text"
                  placeholder="$50"
                  class="outline-none bg-transparent w-full placeholder:text-color9 font-bold"
                />
              </div>
            </div>
            <div class="px-6 pt-5">
              <p class="pb-2 dark:text-white">Recommended</p>
              <div class="flex justify-start items-center gap-2">
                <div class="py-2 px-4 rounded-xl text-white bg-p2 text-sm">
                  $200
                </div>
                <div
                  class="py-2 px-4 rounded-xl text-sm bg-white border border-color21"
                >
                  $200
                </div>
                <div
                  class="py-2 px-4 rounded-xl bg-white text-sm border border-color21"
                >
                  $200
                </div>
              </div>
            </div>

            <div class="pt-5 px-6">
              <a
                href="home.html"
                class="bg-p2 rounded-full py-3 text-white text-sm font-semibold text-center block dark:bg-p1"
                >Add $50</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Javascript Dependencies -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/my-wallet.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:40 GMT -->
</html>
