<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:40 GMT -->
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
    <title>Settings - Quizio PWA HTML Template</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1"
    >
      <!-- Absolute Items Start -->
      <img
        src="assets/images/header-bg-1.png"
        alt=""
        class="absolute top-0 left-0 right-0 -mt-8"
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
              href="home.html"
              class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10"
            >
              <i class="ph ph-caret-left"></i>
            </a>
            <h2 class="text-2xl font-semibold text-white">Settings</h2>
          </div>
        </div>
        <!-- Page Title End -->
        <div class="userProfileTab pt-8">
          <ul
            class="flex justify-between items-center gap-3 tab-button text-center"
          >
            <li
              id="tabOne"
              class="tabButton activeTabButton w-full cursor-pointer"
            >
              Account
            </li>
            <li id="tabTwo" class="tabButton w-full cursor-pointer">Billing</li>
            <li id="tabThree" class="tabButton w-full cursor-pointer">
              Others
            </li>
          </ul>

          <div class="pt-8">
            <div class="tab-content activeTab" id="tabOne_data">
              <div class="bg-white dark:bg-color10 p-5 rounded-2xl">
                <p class="text-xl font-semibold">Account</p>
                <div class="flex flex-col gap-5 pt-8">
                  <a
                    href="verify-details.html"
                    class="flex justify-between items-center p-4 border border-color21 rounded-2xl dark:bg-color11 dark:border-color24"
                  >
                    <div class="flex justify-start items-center gap-3">
                      <div
                        class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                      >
                        <i class="ph ph-address-book"></i>
                      </div>
                      <p class="font-semibold text-sm">Verify Details</p>
                    </div>
                    <div
                      class="flex justify-center items-center p-2 rounded-full border border-color14 !leading-none text-p2 text-xl dark:border-bgColor16 dark:text-p1"
                    >
                      <i class="ph ph-caret-right"></i>
                    </div>
                  </a>
                  <a
                    href="create-password.html"
                    class="flex justify-between items-center p-4 border border-color21 rounded-2xl dark:bg-color11 dark:border-color24"
                  >
                    <div class="flex justify-start items-center gap-3">
                      <div
                        class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                      >
                        <i class="ph ph-lock-key"></i>
                      </div>
                      <p class="font-semibold text-sm">Change Password</p>
                    </div>
                    <div
                      class="flex justify-center items-center p-2 rounded-full border border-color14 !leading-none text-p2 text-xl dark:border-bgColor16 dark:text-p1"
                    >
                      <i class="ph ph-caret-right"></i>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="tab-content hiddenTab" id="tabTwo_data">
              <div
                class="p-4 bg-white dark:bg-color10 rounded-2xl flex flex-col gap-4"
              >
                <div
                  class="flex justify-between items-center p-4 border-b border-color21 dark:border-color24 rounded-2xl"
                >
                  <div class="flex justify-start items-center gap-2">
                    <div
                      class="size-12 flex justify-center items-center bg-white shadow-md rounded-full"
                    >
                      <img src="assets/images/master-card.png" alt="" />
                    </div>
                    <p>Master Card</p>
                  </div>
                  <div class="text-xl">
                    <i class="ph ph-radio-button"></i>
                  </div>
                </div>
                <div
                  class="flex justify-between items-center p-4 border-b border-color21 dark:border-color24 rounded-2xl"
                >
                  <div class="flex justify-start items-center gap-2">
                    <div
                      class="size-12 flex justify-center items-center bg-white shadow-md rounded-full"
                    >
                      <img src="assets/images/paypal.png" alt="" />
                    </div>
                    <p>PayPal</p>
                  </div>
                  <div class="text-xl">
                    <i class="ph ph-radio-button"></i>
                  </div>
                </div>

                <div
                  class="flex justify-between items-center p-4 border-b border-color21 dark:border-color24 rounded-2xl"
                >
                  <div class="flex justify-start items-center gap-2">
                    <div
                      class="size-12 flex justify-center items-center bg-white shadow-md rounded-full"
                    >
                      <img src="assets/images/google.png" alt="" />
                    </div>
                    <p>Google Pay</p>
                  </div>
                  <div class="text-xl">
                    <i class="ph ph-radio-button"></i>
                  </div>
                </div>
              </div>
              <div class="bg-white dark:bg-color10 p-6 rounded-2xl mt-8">
                <div class="">
                  <p class="text-sm font-semibold pb-2">Card Number</p>
                  <div
                    class="flex justify-between items-center py-3 px-4 border border-color21 rounded-xl dark:border-color18 gap-3"
                  >
                    <input
                      type="text"
                      placeholder="854326236562"
                      class="outline-none bg-transparent text-n600 text-sm placeholder:text-sm w-full placeholder:text-bgColor18 dark:text-color18 dark:placeholder:text-color18"
                    />
                  </div>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-4">
                  <div class="">
                    <p class="text-sm font-semibold pb-2">CVC</p>
                    <div
                      class="flex justify-between items-center py-3 px-4 border border-color21 rounded-xl dark:border-color18 gap-3"
                    >
                      <input
                        type="text"
                        placeholder="854326236562"
                        class="outline-none bg-transparent text-n600 text-sm placeholder:text-sm w-full placeholder:text-bgColor18 dark:text-color18 dark:placeholder:text-color18"
                      />
                    </div>
                  </div>
                  <div class="">
                    <p class="text-sm font-semibold pb-2">Expired Date</p>
                    <div
                      class="flex justify-between items-center py-3 px-4 border border-color21 rounded-xl dark:border-color18 gap-3"
                    >
                      <input
                        type="date"
                        placeholder="854326236562"
                        class="outline-none bg-transparent text-n600 text-sm placeholder:text-sm w-full placeholder:text-bgColor18 dark:text-color18 dark:placeholder:text-color18"
                      />
                    </div>
                  </div>
                </div>
                <div class="pt-8">
                  <a
                    href="home.html"
                    class="bg-p2 rounded-full py-3 text-white text-sm font-semibold text-center block mt-12 dark:bg-p1"
                    >Continue</a
                  >
                </div>
              </div>
            </div>
            <div class="tab-content hiddenTab" id="tabThree_data">
              <div class="bg-white dark:bg-color10 p-5 rounded-2xl">
                <p class="text-xl font-semibold">Account</p>
                <div class="flex flex-col gap-5 pt-8">
                  <a
                    href="notification-setting.html"
                    class="flex justify-between items-center p-4 border border-color21 rounded-2xl dark:bg-color11 dark:border-color24"
                  >
                    <div class="flex justify-start items-center gap-3">
                      <div
                        class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                      >
                        <i class="ph ph-bell"></i>
                      </div>
                      <p class="font-semibold text-sm">Notification</p>
                    </div>
                    <div
                      class="flex justify-center items-center p-2 rounded-full border border-color14 !leading-none text-p2 text-xl dark:border-bgColor16 dark:text-p1"
                    >
                      <i class="ph ph-caret-right"></i>
                    </div>
                  </a>
                  <a
                    href="music-setting.html"
                    class="flex justify-between items-center p-4 border border-color21 rounded-2xl dark:bg-color11 dark:border-color24"
                  >
                    <div class="flex justify-start items-center gap-3">
                      <div
                        class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                      >
                        <i class="ph ph-music-note-simple"></i>
                      </div>
                      <p class="font-semibold text-sm">Music & Effect</p>
                    </div>
                    <div
                      class="flex justify-center items-center p-2 rounded-full border border-color14 !leading-none text-p2 text-xl dark:border-bgColor16 dark:text-p1"
                    >
                      <i class="ph ph-caret-right"></i>
                    </div>
                  </a>
                  <div
                    class="flex justify-between items-center p-4 border border-color21 rounded-2xl dark:bg-color11 dark:border-color24"
                  >
                    <div class="flex justify-start items-center gap-3">
                      <div
                        class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                      >
                        <i class="ph ph-shield-check"></i>
                      </div>
                      <p class="font-semibold text-sm">Security</p>
                    </div>
                    <div
                      class="flex justify-center items-center p-2 rounded-full border border-color14 !leading-none text-p2 text-xl dark:border-bgColor16 dark:text-p1"
                    >
                      <i class="ph ph-caret-right"></i>
                    </div>
                  </div>
                  <div
                    class="flex justify-between items-center py-4 px-5 rounded-xl bg-white border border-color21 dark:bg-color11 dark:border-color24"
                  >
                    <div class="flex justify-start items-center gap-3">
                      <div
                        class="flex justify-center items-center p-2 rounded-full border bg-color14 border-color16 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                      >
                        <i class="ph-fill ph-sun-dim"></i>
                      </div>
                      <p class="font-semibold text-sm">Dark Mode</p>
                    </div>
                    <div class="toggle choose-mode">
                      <div class="circle"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Javascript Dependencies -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:42 GMT -->
</html>
