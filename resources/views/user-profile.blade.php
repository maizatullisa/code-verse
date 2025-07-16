<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:37 GMT -->
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
    <title>User Profile - Quizio PWA HTML Template</title>
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
      <div class="relative z-10">
        <div class="flex justify-between items-center gap-4 px-6">
          <div class="flex justify-start items-center gap-4">
            <a
              href="home.html"
              class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10"
            >
              <i class="ph ph-caret-left"></i>
            </a>
            <h2 class="text-2xl font-semibold text-white">User Profile</h2>
          </div>
          <div class="flex justify-start items-center gap-2">
            <div
              class="text-white border border-color24 p-2 rounded-full flex justify-center items-center bg-color21"
            >
              <i class="ph ph-paper-plane-tilt"></i>
            </div>
            <div
              class="text-white border border-color24 p-2 rounded-full flex justify-center items-center bg-color21"
            >
              <i class="ph ph-medal-military"></i>
            </div>
          </div>
        </div>
        <!-- Page Title End -->

        <!-- User Profile Image Start -->
        <div class="px-6 flex justify-center items-end pt-16 gap-8">
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
        <div
          class="mx-6 flex justify-center items-center pt-5 flex-col pb-5 border-b border-color21 border-dashed dark:border-color24"
        >
          <div class="flex justify-start items-center gap-1 text-2xl">
            <p class="font-semibold">Frost Phoenix</p>
            <i class="ph-fill ph-seal-check text-p1"></i>
          </div>
          <p class="text-color5 pt-1 dark:text-bgColor20">United Kingdom</p>
          <div class="flex justify-center items-center gap-3 pt-4">
            <div class="flex justify-start items-center gap-1">
              <p class="text-sm font-semibold text-p2 dark:text-p1">325</p>
              <p class="text-xs">Followers</p>
            </div>
            <div class="flex justify-start items-center gap-1">
              <p class="text-sm font-semibold text-p2 dark:text-p1">432</p>
              <p class="text-xs">Following</p>
            </div>
          </div>
          <div class="flex justify-center items-center gap-4 pt-4">
            <div
              class="flex justify-center items-center p-2 rounded-full border-black border-opacity-20 border dark:border-color7"
            >
              <i class="ph ph-chat-text text-p2 dark:text-p1"></i>
            </div>
            <button
              class="text-sm font-semibold py-2 px-6 text-white bg-p2 rounded-full dark:bg-p1"
            >
              Follow
            </button>
            <div
              class="flex justify-center items-center p-2 rounded-full border-black border-opacity-20 border dark:border-color7"
            >
              <i class="ph ph-share-network text-p2 dark:text-p1"></i>
            </div>
          </div>
        </div>

        <!-- Statistics Start -->
        <div
          class="grid grid-cols-3 gap-2 mx-6 py-5 border-b border-color21 border-dashed dark:border-color24"
        >
          <div
            class="flex flex-col gap-2 p-4 justify-center items-center border border-color12 rounded-xl"
          >
            <p class="text-xs font-semibold">Quizio</p>
            <p class="font-semibold py-1 px-8 bg-color12 rounded-full">280</p>
          </div>
          <div
            class="flex flex-col gap-2 p-4 justify-center items-center border border-color12 rounded-xl dark:border-color24"
          >
            <p class="text-xs font-semibold">Plays</p>
            <p
              class="font-semibold py-1 px-8 bg-color14 rounded-full dark:bg-color7"
            >
              14m
            </p>
          </div>
          <div
            class="flex flex-col gap-2 p-4 justify-center items-center border border-color12 rounded-xl dark:border-color24"
          >
            <p class="text-xs font-semibold">Players</p>
            <p
              class="font-semibold py-1 px-8 bg-color14 rounded-full dark:bg-color7"
            >
              320m
            </p>
          </div>
        </div>
        <div
          class="grid grid-cols-3 gap-2 mx-6 py-5 border-b border-color21 border-dashed dark:border-color24"
        >
          <div
            class="flex flex-col gap-2 p-4 justify-center items-center border border-color12 rounded-xl"
          >
            <p class="text-xs font-semibold">Connection</p>
            <p class="font-semibold py-1 px-8 bg-color12 rounded-full">60m</p>
          </div>
          <div
            class="flex flex-col gap-2 p-4 justify-center items-center border border-color12 rounded-xl dark:border-color24"
          >
            <p class="text-xs font-semibold">Followers</p>
            <p
              class="font-semibold py-1 px-8 bg-color14 rounded-full dark:bg-color7"
            >
              154.2k
            </p>
          </div>
          <div
            class="flex flex-col gap-2 p-4 justify-center items-center border border-color12 rounded-xl dark:border-color24"
          >
            <p class="text-xs font-semibold">Following</p>
            <p
              class="font-semibold py-1 px-8 bg-color14 rounded-full dark:bg-color7"
            >
              160
            </p>
          </div>
        </div>
        <!-- Statistics End -->

        <div class="userProfileTab pt-5 px-6">
          <ul class="flex justify-start items-center gap-3 tab-button">
            <li id="tabOne" class="tabButton activeTabButton cursor-pointer">
              MY Quizio
            </li>
            <li id="tabTwo" class="tabButton cursor-pointer">Collection</li>
            <li id="tabThree" class="tabButton cursor-pointer">Recent</li>
            <li id="tabFour" class="tabButton cursor-pointer">About</li>
          </ul>

          <div class="pt-8">
            <div class="tab-content activeTab" id="tabOne_data">
              <div class="swiper upcoming-contest-slider">
                <div class="swiper-wrapper">
                  <div class="rounded-2xl overflow-hidden shadow2 swiper-slide">
                    <div class="p-5 bg-white dark:bg-color10">
                      <div class="flex justify-between items-center">
                        <div class="flex justify-start items-center gap-2">
                          <div
                            class="py-1 px-2 text-white bg-p2 rounded-lg dark:bg-p1 dark:text-black"
                          >
                            <p class="font-semibold text-xs">19 Jun</p>
                            <p class="text-[10px]">04.32</p>
                          </div>
                          <div class="">
                            <p class="font-semibold text-xs">
                              English Language Quiz
                            </p>
                            <p class="text-xs">Language - English</p>
                          </div>
                        </div>
                        <div class="flex justify-start items-center gap-1">
                          <p
                            class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                          >
                            05
                          </p>
                          <p
                            class="text-p2 text-base font-semibold dark:text-p1"
                          >
                            :
                          </p>
                          <p
                            class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                          >
                            14
                          </p>
                          <p
                            class="text-p2 text-base font-semibold dark:text-p1"
                          >
                            :
                          </p>
                          <p
                            class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                          >
                            20
                          </p>
                        </div>
                      </div>
                      <div
                        class="flex justify-between items-center text-xs pt-5"
                      >
                        <div class="flex gap-2">
                          <p>Max Time</p>
                          <p class="font-semibold">- 5 min</p>
                        </div>
                        <div class="flex gap-3">
                          <p>Max Ques</p>
                          <p class="font-semibold">- 20</p>
                        </div>
                      </div>
                      <div
                        class="flex justify-between items-center gap-2 text-xs py-3 text-nowrap"
                      >
                        <p>30 left</p>
                        <div
                          class="relative bg-p2 dark:bg-p1 dark:bg-opacity-10 bg-opacity-10 h-1 w-full rounded-full after:absolute after:h-1 after:w-[40%] after:bg-p2 after:dark:bg-p1 after:rounded-full"
                        ></div>
                        <p>100 spots</p>
                      </div>
                      <div
                        class="border-b border-dashed border-black dark:border-color24 border-opacity-10 pb-5 flex justify-between items-center text-xs"
                      >
                        <div class="flex justify-start items-center gap-2">
                          <div
                            class="text-white flex justify-center items-center p-2 bg-p1 rounded-full"
                          >
                            <i class="ph ph-trophy"></i>
                          </div>
                          <div class="">
                            <p>Price Pool</p>
                            <p class="font-semibold">$100</p>
                          </div>
                        </div>
                        <div class="flex justify-start items-center gap-2">
                          <button
                            class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                          >
                            Join Now
                          </button>
                          <div class="">
                            <p>Entry</p>
                            <p class="font-semibold">$2.00</p>
                          </div>
                        </div>
                      </div>
                      <div class="pt-5 flex justify-between items-center">
                        <div class="flex justify-start items-center gap-1">
                          <i class="ph ph-brain text-p2"></i>
                          <p class="text-xs">Trivia Quiz</p>
                        </div>
                        <div class="flex justify-start items-center gap-2">
                          <i class="ph ph-bell-ringing"></i>
                          <i class="ph ph-share-network"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="rounded-2xl overflow-hidden shadow2 swiper-slide">
                    <div class="p-5 bg-white dark:bg-color10">
                      <div class="flex justify-between items-center">
                        <div class="flex justify-start items-center gap-2">
                          <div
                            class="py-1 px-2 text-white bg-p2 rounded-lg dark:bg-p1 dark:text-black"
                          >
                            <p class="font-semibold text-xs">20 Jun</p>
                            <p class="text-[10px]">05.25</p>
                          </div>
                          <div class="">
                            <p class="font-semibold text-xs">
                              China Language Quiz
                            </p>
                            <p class="text-xs">Language - English</p>
                          </div>
                        </div>
                        <div class="flex justify-start items-center gap-1">
                          <p
                            class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                          >
                            03
                          </p>
                          <p
                            class="text-p2 text-base font-semibold dark:text-p1"
                          >
                            :
                          </p>
                          <p
                            class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                          >
                            12
                          </p>
                          <p
                            class="text-p2 text-base font-semibold dark:text-p1"
                          >
                            :
                          </p>
                          <p
                            class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                          >
                            16
                          </p>
                        </div>
                      </div>
                      <div
                        class="flex justify-between items-center text-xs pt-5"
                      >
                        <div class="flex gap-2">
                          <p>Max Time</p>
                          <p class="font-semibold">- 5 min</p>
                        </div>
                        <div class="flex gap-3">
                          <p>Max Ques</p>
                          <p class="font-semibold">- 20</p>
                        </div>
                      </div>
                      <div
                        class="flex justify-between items-center gap-2 text-xs py-3 text-nowrap"
                      >
                        <p>45 left</p>
                        <div
                          class="relative bg-p2 dark:bg-p1 dark:bg-opacity-10 bg-opacity-10 h-1 w-full rounded-full after:absolute after:h-1 after:w-[40%] after:bg-p2 after:dark:bg-p1 after:rounded-full"
                        ></div>
                        <p>100 spots</p>
                      </div>
                      <div
                        class="border-b border-dashed border-black dark:border-color24 border-opacity-10 pb-5 flex justify-between items-center text-xs"
                      >
                        <div class="flex justify-start items-center gap-2">
                          <div
                            class="text-white flex justify-center items-center p-2 bg-p1 rounded-full"
                          >
                            <i class="ph ph-trophy"></i>
                          </div>
                          <div class="">
                            <p>Price Pool</p>
                            <p class="font-semibold">$100</p>
                          </div>
                        </div>
                        <div class="flex justify-start items-center gap-2">
                          <button
                            class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                          >
                            Join Now
                          </button>
                          <div class="">
                            <p>Entry</p>
                            <p class="font-semibold">$5.00</p>
                          </div>
                        </div>
                      </div>
                      <div class="pt-5 flex justify-between items-center">
                        <div class="flex justify-start items-center gap-1">
                          <i class="ph ph-brain text-p2"></i>
                          <p class="text-xs">Language Quiz</p>
                        </div>
                        <div class="flex justify-start items-center gap-2">
                          <i class="ph ph-bell-ringing"></i>
                          <i class="ph ph-share-network"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-content hiddenTab" id="tabTwo_data">
              <div class="grid grid-cols-2 gap-5">
                <div
                  class="flex justify-start items-start gap-2 bg-white px-3 pt-3 pb-6 rounded-xl dark:bg-color9"
                >
                  <img src="assets/images/icon1.png" alt="" class="size-12" />
                  <div class="">
                    <p class="text-sm font-semibold">Music Quiz</p>
                    <p class="text-xs text-p2 pt-1 dark:text-p1">Que: 150</p>
                  </div>
                </div>
                <div
                  class="flex justify-start items-start gap-2 bg-white px-3 pt-3 pb-6 rounded-xl dark:bg-color9"
                >
                  <img src="assets/images/icon2.png" alt="" class="size-12" />
                  <div class="">
                    <p class="text-sm font-semibold">Picture Quiz</p>
                    <p class="text-xs text-p2 pt-1 dark:text-p1">Que: 150</p>
                  </div>
                </div>
                <div
                  class="flex justify-start items-start gap-2 bg-white px-3 pt-3 pb-6 rounded-xl dark:bg-color9"
                >
                  <img src="assets/images/icon3.png" alt="" class="size-12" />
                  <div class="">
                    <p class="text-sm font-semibold">Music Quiz</p>
                    <p class="text-xs text-p2 pt-1 dark:text-p1">Que: 150</p>
                  </div>
                </div>
                <div
                  class="flex justify-start items-start gap-2 bg-white px-3 pt-3 pb-6 rounded-xl dark:bg-color9"
                >
                  <img src="assets/images/icon4.png" alt="" class="size-12" />
                  <div class="">
                    <p class="text-sm font-semibold">Science Quiz</p>
                    <p class="text-xs text-p2 pt-1 dark:text-p1">Que: 150</p>
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
            <div class="tab-content hiddenTab" id="tabFour_data">
              <p
                class="text-xl font-semibold pb-5 border-b border-dashed border-color21 dark:border-color24"
              >
                Bio Data
              </p>
              <div
                class="flex flex-col gap-5 text-color5 text-xs pt-5 dark:text-bgColor5"
              >
                <p>
                  Passionate learner and quiz enthusiast exploring the world of
                  knowledge, one question at a time. An avid fan of diverse
                  topics including technology, history, and pop culture.
                  Dedicated to continuous learning and sharing insights gained
                  from the fascinating world of trivia. Join me on this journey
                  of curiosity and discovery through engaging quizzes
                </p>
                <p>
                  Enthusiastic quiz aficionado passionate about exploring
                  diverse subjects. Curiosity drives me to delve into tech,
                  history, and culture. Committed to sharing insights gained
                  from the quiz universe. Join me in the quest for knowledge
                </p>
                <p>
                  Curious quiz enthusiast exploring technology, history, and
                  culture. Eager to share insights gained from the quiz journey.
                  Join me in discovery!
                </p>
                <p>
                  Curious quiz enthusiast exploring technology, history, and
                  culture. Eager to share insights gained from the quiz journey.
                  Join me in discovery!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Javascript Dependecies -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/plugins/plugins.js"></script>
    <script src="assets/js/plugins/plugin-custom.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:37 GMT -->
</html>
