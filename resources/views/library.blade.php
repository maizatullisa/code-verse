<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/library.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:37 GMT -->
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
    <title>Library - Quizio PWA HTML Template</title>
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
      <div class="relative z-10 mb-20">
        <div class="flex justify-between items-center gap-4 px-6">
          <div class="flex justify-start items-center gap-4">
            <h2 class="text-2xl font-semibold text-white">Library</h2>
          </div>
        </div>
        <!-- Page Title End -->
        <!-- Search Box Start -->
        <div class="flex justify-between items-center gap-3 pt-8 px-6">
          <div
            class="flex justify-start items-center gap-3 bg-color24 border border-color24 p-4 rounded-full text-white w-full"
          >
            <i class="ph ph-magnifying-glass"></i>
            <input
              type="text"
              placeholder="Search Contest"
              class="bg-transparent outline-none placeholder:text-white w-full text-xs"
            />
          </div>
          <div
            class="bg-color24 border border-color24 p-4 rounded-full text-white flex justify-center items-center"
          >
            <i class="ph ph-sliders-horizontal"></i>
          </div>
        </div>
        <!-- Search Box End -->
        <div class="userProfileTab pt-24 px-6">
          <ul class="flex justify-start items-center gap-3 tab-button">
            <li id="tabOne" class="tabButton activeTabButton cursor-pointer">
              MY Quizio
            </li>
            <li id="tabTwo" class="tabButton cursor-pointer">Favorites</li>
            <li id="tabThree" class="tabButton cursor-pointer">
              Collaboration
            </li>
          </ul>

          <div class="pt-8">
            <div class="tab-content activeTab" id="tabOne_data">
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
            <div class="tab-content hiddenTab" id="tabTwo_data">
              <div class="flex flex-col gap-5">
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img1.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Test Your Knowledge....</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <p
                      class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18"
                    >
                      <i class="ph ph-users-three text-base !leading-none"></i>
                      Public
                    </p>
                  </div>
                </div>
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img2.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Fun Challenges for Your.</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <p
                      class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18"
                    >
                      <i class="ph ph-users-three text-base !leading-none"></i>
                      Public
                    </p>
                  </div>
                </div>
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img1.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Test Your Knowledge....</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <p
                      class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18"
                    >
                      <i class="ph ph-users-three text-base !leading-none"></i>
                      Public
                    </p>
                  </div>
                </div>
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img3.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Unveil Your Knowledge...</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <p
                      class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18"
                    >
                      <i class="ph ph-users-three text-base !leading-none"></i>
                      Public
                    </p>
                  </div>
                </div>
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img4.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Competitive Quizzes for..</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <p
                      class="text-xs text-color5 flex justify-start items-center gap-1 dark:text-color18"
                    >
                      <i class="ph ph-users-three text-base !leading-none"></i>
                      Public
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-content hiddenTab" id="tabThree_data">
              <div class="flex flex-col gap-5">
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img3.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Test Your Knowledge....</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <div
                      class="text-xs text-color5 flex justify-start items-center gap-2 dark:text-color18"
                    >
                      <div class="flex justify-start items-center">
                        <div class="rounded-full bg-white p-0.5">
                          <img
                            src="assets/images/user-img-1.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-2.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-3.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-4.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-5.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                      </div>
                      <p>Public</p>
                    </div>
                  </div>
                </div>
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img1.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Engaging Quizzers for....</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <div
                      class="text-xs text-color5 flex justify-start items-center gap-2 dark:text-color18"
                    >
                      <div class="flex justify-start items-center">
                        <div class="rounded-full bg-white p-0.5">
                          <img
                            src="assets/images/user-img-1.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-2.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-3.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-4.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-5.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                      </div>
                      <p>Public</p>
                    </div>
                  </div>
                </div>
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img5.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Explore, Learn, and...</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <div
                      class="text-xs text-color5 flex justify-start items-center gap-2 dark:text-color18"
                    >
                      <div class="flex justify-start items-center">
                        <div class="rounded-full bg-white p-0.5">
                          <img
                            src="assets/images/user-img-1.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-2.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-3.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-4.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-5.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                      </div>
                      <p>Public</p>
                    </div>
                  </div>
                </div>
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img4.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Dive into Intellectual....</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <div
                      class="text-xs text-color5 flex justify-start items-center gap-2 dark:text-color18"
                    >
                      <div class="flex justify-start items-center">
                        <div class="rounded-full bg-white p-0.5">
                          <img
                            src="assets/images/user-img-1.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-2.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-3.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-4.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-5.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                      </div>
                      <p>Public</p>
                    </div>
                  </div>
                </div>
                <div
                  class="bg-white p-3 rounded-xl flex justify-start items-center gap-4 border border-color21 dark:bg-color9 dark:border-color7"
                >
                  <div class="relative rounded-lg overflow-hidden">
                    <img
                      src="assets/images/library-favourite-img2.png"
                      alt=""
                      class="h-[100px] w-[140px] object-cover"
                    />
                    <p
                      class="text-white bg-p1 absolute bottom-2 right-2 text-xs px-2 py-1 rounded-md"
                    >
                      10 Qs
                    </p>
                  </div>
                  <div class="">
                    <p class="font-semibold">Guess the Name of Riva..</p>
                    <p
                      class="text-bgColor18 text-xs flex justify-start items-center gap-1 pt-3 pb-2 dark:text-color18"
                    >
                      Today
                      <i
                        class="ph-fill ph-dot-outline text-p1 text-xl !leading-none"
                      ></i>
                      600 plays
                    </p>
                    <div
                      class="text-xs text-color5 flex justify-start items-center gap-2 dark:text-color18"
                    >
                      <div class="flex justify-start items-center">
                        <div class="rounded-full bg-white p-0.5">
                          <img
                            src="assets/images/user-img-1.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-2.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-3.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-4.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                        <div class="rounded-full bg-white p-0.5 -ml-2">
                          <img
                            src="assets/images/user-img-5.png"
                            alt=""
                            class="size-6 object-cover rounded-full"
                          />
                        </div>
                      </div>
                      <p>Public</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Tab Buttons Start -->
    <div class="fixed bottom-0 left-0 right-0 z-40">
      <div
        class="container bg-p2 px-6 py-3 rounded-t-2xl flex justify-around items-center dark:bg-p1"
      >
        <a
          href="home.html"
          class="flex justify-center items-center text-center flex-col gap-1"
        >
          <div
            class="flex justify-center items-center p-3 rounded-full bg-white dark:bg-color10"
          >
            <i class="ph ph-house text-xl !leading-none dark:text-white"></i>
          </div>
          <p class="text-xs text-white font-semibold dark:text-color10">Home</p>
        </a>
        <a
          href="library.html"
          class="flex justify-center items-center text-center flex-col gap-1"
        >
          <div
            class="flex justify-center items-center p-3 rounded-full bg-p1 dark:bg-p2"
          >
            <i class="ph ph-squares-four text-xl !leading-none text-white"></i>
          </div>
          <p class="text-xs text-white font-semibold dark:text-color10">
            Library
          </p>
        </a>
        <a
          href="earn-rewards.html"
          class="flex justify-center items-center text-center flex-col gap-1"
        >
          <div
            class="flex justify-center items-center p-3 rounded-full bg-white dark:bg-color10"
          >
            <i
              class="ph ph-users-three text-xl !leading-none dark:text-white"
            ></i>
          </div>
          <p class="text-xs text-white font-semibold dark:text-color10">
            Share & Earn
          </p>
        </a>
        <a
          href="chat.html"
          class="flex justify-center items-center text-center flex-col gap-1"
        >
          <div
            class="flex justify-center items-center p-3 rounded-full bg-white dark:bg-color10"
          >
            <i
              class="ph ph-users-three text-xl !leading-none dark:text-white"
            ></i>
          </div>
          <p class="text-xs text-white font-semibold dark:text-color10">Chat</p>
        </a>
      </div>
    </div>
    <!-- Bottom Tab Buttons End -->

    <!-- Javascript Dependencies -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/library.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:38 GMT -->
</html>
