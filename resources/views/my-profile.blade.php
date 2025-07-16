<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:29 GMT -->
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
    <title>My Profile - Quizio PWA HTML Template</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1"
    >
      <!-- Absolute Items Start -->
      <img
        src="assets/images/header-bg-1.png"
        alt=""
        class="absolute top-0 left-0 right-0 -mt-20"
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
            <h2 class="text-2xl font-semibold text-white">My Profile</h2>
          </div>
          <div class="flex justify-start items-center gap-2">
            <div class="relative">
              <button
                class="border border-color24 p-2 rounded-full flex justify-center items-center bg-color24 relative quizDetailsMoreOptionsModalOpenButton"
              >
                <i class="ph ph-dots-three text-white"></i>
              </button>
              <div
                class="absolute top-12 right-0 z-40 min-w-48 modalClose duration-500 bg-white dark:bg-color9 p-5 rounded-xl shadow6 quizDetailsMoreOptionsModal"
              >
                <div
                  class="flex justify-start items-center gap-3 pb-3 cursor-pointer"
                >
                  <div
                    class="text-p2 dark:text-white dark:bg-color24 dark:border-color18 border border-color16 p-2 rounded-full flex justify-center items-center bg-color14 text-sm"
                  >
                    <i class="ph ph-user"></i>
                  </div>
                  <p class="text-sm">Edit Profile</p>
                </div>
                <div
                  class="flex justify-start items-center gap-3 pt-3 border-y border-dashed border-color21 dark:border-color24 pb-3 cursor-pointer"
                >
                  <div
                    class="text-p2 dark:text-white dark:bg-color24 dark:border-color18 border border-color16 p-2 rounded-full flex justify-center items-center bg-color14 text-sm"
                  >
                    <i class="ph ph-gear"></i>
                  </div>
                  <p class="text-sm text-nowrap">Settings</p>
                </div>
                <div
                  class="flex justify-start items-center gap-3 py-3 cursor-pointer"
                >
                  <div
                    class="text-p2 dark:text-white dark:bg-color24 dark:border-color18 border border-color16 p-2 rounded-full flex justify-center items-center bg-color14 text-sm"
                  >
                    <i class="ph ph-scroll"></i>
                  </div>
                  <p class="text-sm text-nowrap">Privacy Policy</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Page Title End -->

        <!-- User Profile Image Start -->
        <div class="flex justify-center items-end pt-16 gap-8">
          <div
            class="flex justify-center items-center gap-1 bg-p2 bg-opacity-10 px-3 py-1 rounded-full border border-p2 border-opacity-20 mb-6 dark:bg-bgColor14 dark:border-bgColor16"
          >
            <i class="ph-fill text-p1 ph-heart"></i>
            <p class="text-sm text-p2 dark:text-white">200</p>
          </div>
          <div class="relative size-40 flex justify-center items-center">
            <img
              src="assets/images/user-img.png"
              alt=""
              class="size-32 bg-[#B190B6] rounded-full overflow-hidden"
            />
            <img
              src="assets/images/user-progress.svg"
              alt=""
              class="absolute top-0 left-0 right-0"
            />
            <img
              src="assets/images/badge1.png"
              alt=""
              class="absolute -bottom-2 left-[60px]"
            />
          </div>
          <div
            class="flex justify-center items-center gap-1 bg-p2 bg-opacity-10 px-3 py-1 rounded-full border border-p2 border-opacity-20 mb-6 dark:bg-bgColor14 dark:border-bgColor16"
          >
            <i class="ph text-p1 ph-trophy"></i>
            <p class="text-sm text-p2 font-semibold dark:text-white">#1</p>
          </div>
        </div>
        <!-- User Profile Image End -->
        <div class="flex justify-center items-center pt-5 flex-col pb-5">
          <div class="flex justify-start items-center gap-1 text-2xl">
            <p class="font-semibold">Frost Phoenix</p>
            <i class="ph-fill ph-seal-check text-p1"></i>
          </div>
          <p class="text-color5 pt-1 dark:text-bgColor20 font-semibold">
            Frend come on, play with me
          </p>
        </div>

        <div
          class="flex justify-between items-center gap-6 bg-white py-3 px-5 border border-color21 dark:border-color24 rounded-2xl dark:bg-color9"
        >
          <div class="">
            <p class="text-p2 font-semibold dark:text-p1">820.00$</p>
            <p class="text-xs text-nowrap">Total Earning</p>
          </div>
          <div
            class="border-t border-color21 border-dashed dark:border-color24 w-full"
          ></div>
          <a
            href="my-wallet.html"
            class="flex justify-start items-center gap-2"
          >
            <p class="text-p2 font-semibold text-sm text-nowrap dark:text-p1">
              View Wallet
            </p>
            <div
              class="text-p2 dark:text-p1 dark:border-bgColor16 dark:bg-bgColor14 border border-color14 p-2 rounded-full flex justify-center items-center bg-color16"
            >
              <i class="ph ph-caret-right"></i>
            </div>
          </a>
        </div>
        <div
          class="p-5 mt-8 bg-p2 dark:bg-p1 flex justify-between items-center rounded-2xl relative after:absolute after:h-full after:left-2 after:right-2 after:bg-p2 after:dark:bg-p1 after:mt-6 after:opacity-30 after:rounded-2xl after:-z-10 before:absolute before:h-full before:bg-p2 before:dark:bg-p1 before:mt-12 before:opacity-30 before:rounded-2xl before:-z-10 before:left-4 before:right-4"
        >
          <div class="flex flex-col justify-center items-center">
            <div
              class="flex justify-center items-center text-p2 dark:text-p1 bg-white p-2 rounded-full text-xl"
            >
              <i class="ph ph-star"></i>
            </div>
            <p class="text-sm font-semibold text-white pt-2">Points</p>
            <p class="font-semibold text-white">95200</p>
          </div>
          <img src="assets/images/bg-vector.png" alt="" />
          <div class="flex flex-col justify-center items-center">
            <div
              class="flex justify-center items-center text-p2 dark:text-p1 bg-white p-2 rounded-full text-xl"
            >
              <i class="ph ph-users-three"></i>
            </div>
            <p class="text-sm font-semibold text-white pt-2">Referred users</p>
            <p class="font-semibold text-white">12</p>
          </div>
          <img src="assets/images/bg-vector.png" alt="" />
          <div class="flex flex-col justify-center items-center">
            <div
              class="flex justify-center items-center text-p2 dark:text-p1 bg-white p-2 rounded-full text-xl"
            >
              <i class="ph ph-bank"></i>
            </div>
            <p class="text-sm font-semibold text-white pt-2">Withdrawals</p>
            <p class="font-semibold text-white">$62</p>
          </div>
        </div>
        <div class="userProfileTab pt-16">
          <ul
            class="flex justify-between items-center gap-3 tab-button text-center"
          >
            <li
              id="tabOne"
              class="tabButton activeTabButton w-full cursor-pointer"
            >
              Badge
            </li>
            <li id="tabTwo" class="tabButton w-full cursor-pointer">Stats</li>
            <li id="tabThree" class="tabButton w-full cursor-pointer">
              Details
            </li>
          </ul>

          <div class="pt-8">
            <div class="tab-content activeTab" id="tabOne_data">
              <div
                class="bg-white dark:bg-color9 dark:border-bgColor16 p-5 rounded-2xl border border-color16"
              >
                <div
                  class="flex justify-between items-center border-b border-dashed border-color21 dark:border-color24 pb-3"
                >
                  <div class="flex justify-start items-center gap-1 text-xl">
                    <i class="ph-fill ph-seal-check text-p1"></i>
                    <p class="text-xs font-semibold">Medals 1</p>
                  </div>
                  <a
                    href="medal-details.html"
                    class="flex justify-start items-center gap-1"
                  >
                    <p class="text-xs">Details</p>
                    <i class="ph ph-caret-right text-p1"></i>
                  </a>
                </div>
                <div
                  class="flex justify-start items-center gap-3 py-3 overflow-y-hidden overflow-x-scroll vertical-scrollbar"
                >
                  <img src="assets/images/medal1.svg" alt="" class="" />
                  <img src="assets/images/medal2.svg" alt="" />
                  <img src="assets/images/medal3.svg" alt="" />
                  <img src="assets/images/medal4.svg" alt="" />
                  <img src="assets/images/medal5.svg" alt="" />
                  <img src="assets/images/medal1.svg" alt="" class="" />
                  <img src="assets/images/medal2.svg" alt="" />
                  <img src="assets/images/medal3.svg" alt="" />
                  <img src="assets/images/medal4.svg" alt="" />
                  <img src="assets/images/medal5.svg" alt="" />
                </div>
              </div>
            </div>
            <div class="tab-content hiddenTab" id="tabTwo_data">
              <div
                class="bg-white dark:bg-color9 rounded-2xl border border-color16 p-5"
              >
                <div class="flex justify-between items-start">
                  <div class="flex justify-start items-start gap-3">
                    <div class="">
                      <div class="flex justify-start items-start">
                        <p class="font-semibold">216</p>
                        <p class="text-xs">th</p>
                      </div>
                      <p class="text-xs pt-2">Ranking</p>
                    </div>
                    <div class="">
                      <div
                        class="flex justify-start items-center text-p2 dark:text-p1"
                      >
                        <i class="ph ph-arrow-up text-sm"></i>
                        <p class="text-xs">28</p>
                      </div>
                      <p class="text-xs pt-3">Points</p>
                    </div>
                  </div>
                  <button
                    class="bg-color14 py-1 px-2 rounded-lg text-xs flex gap-1 justify-start items-center"
                  >
                    <span>This Week</span>
                    <i class="ph-fill ph-caret-down text-p1 text-base"></i>
                  </button>
                </div>
                <div class="customer_impression"></div>
              </div>
              <div class="grid grid-cols-2 gap-4 mt-6">
                <div class="p-3 bg-white dark:bg-color9 rounded-xl">
                  <div class="flex justify-between items-center">
                    <div class="">
                      <p class="text-lg font-bold">68%</p>
                      <p class="text-xs">Correcto Meter</p>
                    </div>
                    <button
                      class="bg-color14 py-1 px-2 rounded-lg text-xs flex gap-1 justify-start items-center"
                    >
                      <span>All</span>
                      <i class="ph-fill ph-caret-down text-p1 text-base"></i>
                    </button>
                  </div>
                  <div class="meter1 pt-3 relative"></div>
                  <div class="flex flex-col text-center justify-center -mt-12">
                    <p class="text-p1 text-lg font-semibold dark:text-white">
                      244
                    </p>
                    <p class="text-xs">Total Que</p>
                  </div>
                  <div class="flex justify-between items-center pt-6">
                    <div class="">
                      <div class="h-1 w-8 rounded-full bg-p2"></div>
                      <p class="text-xs text-color5 pt-1 dark:text-white">
                        Correct
                      </p>
                    </div>
                    <div class="">
                      <div class="h-1 w-8 rounded-full bg-p1"></div>
                      <p class="text-xs text-color5 pt-1 dark:text-white">
                        Wrong
                      </p>
                    </div>
                    <div class="">
                      <div class="h-1 w-8 rounded-full bg-p3"></div>
                      <p class="text-xs text-color5 pt-1 dark:text-white">
                        Skip
                      </p>
                    </div>
                  </div>
                </div>
                <div class="p-3 bg-white dark:bg-color9 rounded-xl">
                  <div class="flex justify-between items-center">
                    <div class="">
                      <p class="text-lg font-bold">68%</p>
                      <p class="text-xs">Correcto Meter</p>
                    </div>
                    <button
                      class="bg-color14 py-1 px-2 rounded-lg text-xs flex gap-1 justify-start items-center"
                    >
                      <span>All</span>
                      <i class="ph-fill ph-caret-down text-p1 text-base"></i>
                    </button>
                  </div>
                  <div class="meter2 pt-3 relative"></div>
                  <div class="-mt-12 flex flex-col text-center justify-center">
                    <p class="text-p1 text-lg font-semibold">48</p>
                    <p class="text-xs dark:text-white">Quiz played</p>
                  </div>
                  <div class="flex justify-between items-center pt-6">
                    <div class="">
                      <div class="h-1 w-8 rounded-full bg-p2"></div>
                      <p class="text-xs text-color5 pt-1 dark:text-white">
                        Correct
                      </p>
                    </div>
                    <div class="">
                      <div class="h-1 w-8 rounded-full bg-p1"></div>
                      <p class="text-xs text-color5 pt-1 dark:text-white">
                        Wrong
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-content hiddenTab" id="tabThree_data">
              <div class="flex flex-col gap-4">
                <div
                  class="flex justify-between items-center py-4 px-5 border border-color21 rounded-xl bg-white dark:bg-color9 dark:border-color7"
                >
                  <div class="relative border-2 border-p1 p-1 rounded-full">
                    <img
                      src="assets/images/user-img-2.png"
                      alt=""
                      class="size-12 rounded-full bg-color8"
                    />
                    <img
                      src="assets/images/GB.png"
                      alt=""
                      class="absolute -right-2.5 bottom-1"
                    />
                    <img
                      src="assets/images/badge1.png"
                      alt=""
                      class="absolute -top-2.5 left-[18px] size-5"
                    />
                  </div>
                  <div class="flex justify-center items-center flex-col">
                    <p class="font-semibold pb-1">VS</p>
                    <p
                      class="text-xs text-p2 bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 rounded-full dark:text-p1 dark:bg-bgColor14 dark:border-bgColor16"
                    >
                      -200 POINT
                    </p>
                  </div>
                  <div class="relative border-2 border-p1 p-1 rounded-full">
                    <img
                      src="assets/images/user-img-1.png"
                      alt=""
                      class="size-12 rounded-full bg-color8"
                    />
                    <img
                      src="assets/images/GB.png"
                      alt=""
                      class="absolute -left-2.5 bottom-1"
                    />
                    <img
                      src="assets/images/badge1.png"
                      alt=""
                      class="absolute -top-2.5 left-[18px] size-5"
                    />
                  </div>
                </div>
                <div
                  class="flex justify-between items-center py-4 px-5 border border-color21 rounded-xl bg-white dark:bg-color9 dark:border-color7"
                >
                  <div class="relative border-2 border-p1 p-1 rounded-full">
                    <img
                      src="assets/images/user-img-3.png"
                      alt=""
                      class="size-12 rounded-full bg-color8"
                    />
                    <img
                      src="assets/images/GB.png"
                      alt=""
                      class="absolute -right-2.5 bottom-1"
                    />
                    <img
                      src="assets/images/badge1.png"
                      alt=""
                      class="absolute -top-2.5 left-[18px] size-5"
                    />
                  </div>
                  <div class="flex justify-center items-center flex-col">
                    <p class="font-semibold pb-1">VS</p>
                    <p
                      class="text-xs text-p2 bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 rounded-full dark:text-p1 dark:bg-bgColor14 dark:border-bgColor16"
                    >
                      -200 POINT
                    </p>
                  </div>
                  <div class="relative border-2 border-p1 p-1 rounded-full">
                    <img
                      src="assets/images/user-img-4.png"
                      alt=""
                      class="size-12 rounded-full bg-color8"
                    />
                    <img
                      src="assets/images/GB.png"
                      alt=""
                      class="absolute -left-2.5 bottom-1"
                    />
                    <img
                      src="assets/images/badge1.png"
                      alt=""
                      class="absolute -top-2.5 left-[18px] size-5"
                    />
                  </div>
                </div>
                <div
                  class="flex justify-between items-center py-4 px-5 border border-color21 rounded-xl bg-white dark:bg-color9 dark:border-color7"
                >
                  <div class="relative border-2 border-p1 p-1 rounded-full">
                    <img
                      src="assets/images/user-img-5.png"
                      alt=""
                      class="size-12 rounded-full bg-color8"
                    />
                    <img
                      src="assets/images/GB.png"
                      alt=""
                      class="absolute -right-2.5 bottom-1"
                    />
                    <img
                      src="assets/images/badge1.png"
                      alt=""
                      class="absolute -top-2.5 left-[18px] size-5"
                    />
                  </div>
                  <div class="flex justify-center items-center flex-col">
                    <p class="font-semibold pb-1">VS</p>
                    <p
                      class="text-xs text-p2 bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 rounded-full dark:text-p1 dark:bg-bgColor14 dark:border-bgColor16"
                    >
                      -200 POINT
                    </p>
                  </div>
                  <div class="relative border-2 border-p1 p-1 rounded-full">
                    <img
                      src="assets/images/user-img-6.png"
                      alt=""
                      class="size-12 rounded-full bg-color8"
                    />
                    <img
                      src="assets/images/GB.png"
                      alt=""
                      class="absolute -left-2.5 bottom-1"
                    />
                    <img
                      src="assets/images/badge1.png"
                      alt=""
                      class="absolute -top-2.5 left-[18px] size-5"
                    />
                  </div>
                </div>
                <div
                  class="flex justify-between items-center py-4 px-5 border border-color21 rounded-xl bg-white dark:bg-color9 dark:border-color7"
                >
                  <div class="relative border-2 border-p1 p-1 rounded-full">
                    <img
                      src="assets/images/user-img-7.png"
                      alt=""
                      class="size-12 rounded-full bg-color8"
                    />
                    <img
                      src="assets/images/GB.png"
                      alt=""
                      class="absolute -right-2.5 bottom-1"
                    />
                    <img
                      src="assets/images/badge1.png"
                      alt=""
                      class="absolute -top-2.5 left-[18px] size-5"
                    />
                  </div>
                  <div class="flex justify-center items-center flex-col">
                    <p class="font-semibold pb-1">VS</p>
                    <p
                      class="text-xs text-p2 bg-p2 bg-opacity-10 border border-p2 border-opacity-20 py-1 px-3 rounded-full dark:text-p1 dark:bg-bgColor14 dark:border-bgColor16"
                    >
                      -200 POINT
                    </p>
                  </div>
                  <div class="relative border-2 border-p1 p-1 rounded-full">
                    <img
                      src="assets/images/user-img-8.png"
                      alt=""
                      class="size-12 rounded-full bg-color8"
                    />
                    <img
                      src="assets/images/GB.png"
                      alt=""
                      class="absolute -left-2.5 bottom-1"
                    />
                    <img
                      src="assets/images/badge1.png"
                      alt=""
                      class="absolute -top-2.5 left-[18px] size-5"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Javascript Dependecies -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/plugins/apexcharts.min.js"></script>
    <script src="assets/js/plugins/apex-custom.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:34 GMT -->
</html>
