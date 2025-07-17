<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/contest-search-result.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:34 GMT -->
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
    <title>Pencarian</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container bg-white dark:bg-color1 p-6 min-h-screen dark:text-white relative overflow-hidden"
    >
      <!-- Absolute Items Start -->
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
      <div class="flex justify-start items-center gap-3 relative z-10">
        <a href="{{ url('/home') }}"
          class="border border-color16 p-3 rounded-full flex justify-center items-center dark:border-bgColor16 dark:bg-bgColor14 text-xl"
        >
          <i class="ph ph-caret-left"></i>
        </a>
        <div
          class="flex justify-start items-center gap-3 bg-color14 border border-color16 p-4 rounded-full w-full dark:border-bgColor16 dark:bg-bgColor14"
        >
          <i class="ph ph-magnifying-glass"></i>
          <input
            type="text"
            placeholder="Search Contest"
            class="bg-transparent outline-none placeholder:text-color1 w-full text-xs dark:text-white dark:placeholder:text-white"
          />
        </div>
      </div>

      <div class="searchContestResultTab pt-5 relative z-10">
        <ul class="flex justify-start items-center gap-3 tab-button">
          <li id="tabOne" class="tabButton activeTabButton cursor-pointer">
            Quiz
          </li>
          <li id="tabTwo" class="tabButton cursor-pointer">Pengajar</li>
        </ul>

        <div class="pt-8">
          <div class="tab-content activeTab" id="tabOne_data">
            <div class="">
              <div class="flex flex-col gap-4">
                <div class="rounded-2xl overflow-hidden shadow2">
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
                        <p class="text-p2 text-base font-semibold dark:text-p1">
                          :
                        </p>
                        <p
                          class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                        >
                          14
                        </p>
                        <p class="text-p2 text-base font-semibold dark:text-p1">
                          :
                        </p>
                        <p
                          class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                        >
                          20
                        </p>
                      </div>
                    </div>
                    <div class="flex justify-between items-center text-xs pt-5">
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
                <div class="rounded-2xl overflow-hidden shadow2">
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
                        <p class="text-p2 text-base font-semibold dark:text-p1">
                          :
                        </p>
                        <p
                          class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                        >
                          12
                        </p>
                        <p class="text-p2 text-base font-semibold dark:text-p1">
                          :
                        </p>
                        <p
                          class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                        >
                          16
                        </p>
                      </div>
                    </div>
                    <div class="flex justify-between items-center text-xs pt-5">
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
                        class="relative bg-p2 dark:bg-p1 dark:bg-opacity-10 bg-opacity-10 h-1 w-full rounded-full after:absolute after:h-1 after:w-[20%] after:bg-p2 after:dark:bg-p1 after:rounded-full"
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
                <div class="rounded-2xl overflow-hidden shadow2">
                  <div class="p-5 bg-white dark:bg-color10">
                    <div class="flex justify-between items-center">
                      <div class="flex justify-start items-center gap-2">
                        <div
                          class="py-1 px-2 text-white bg-p2 rounded-lg dark:bg-p1 dark:text-black"
                        >
                          <p class="font-semibold text-xs">23 Jun</p>
                          <p class="text-[10px]">04.32</p>
                        </div>
                        <div class="">
                          <p class="font-semibold text-xs">
                            Swedish Language Quiz
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
                        <p class="text-p2 text-base font-semibold dark:text-p1">
                          :
                        </p>
                        <p
                          class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                        >
                          14
                        </p>
                        <p class="text-p2 text-base font-semibold dark:text-p1">
                          :
                        </p>
                        <p
                          class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                        >
                          20
                        </p>
                      </div>
                    </div>
                    <div class="flex justify-between items-center text-xs pt-5">
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
                        class="relative bg-p2 dark:bg-p1 dark:bg-opacity-10 bg-opacity-10 h-1 w-full rounded-full after:absolute after:h-1 after:w-[60%] after:bg-p2 after:dark:bg-p1 after:rounded-full"
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
                <div class="rounded-2xl overflow-hidden shadow2">
                  <div class="p-5 bg-white dark:bg-color10">
                    <div class="flex justify-between items-center">
                      <div class="flex justify-start items-center gap-2">
                        <div
                          class="py-1 px-2 text-white bg-p2 rounded-lg dark:bg-p1 dark:text-black"
                        >
                          <p class="font-semibold text-xs">16 Jul</p>
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
                        <p class="text-p2 text-base font-semibold dark:text-p1">
                          :
                        </p>
                        <p
                          class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                        >
                          12
                        </p>
                        <p class="text-p2 text-base font-semibold dark:text-p1">
                          :
                        </p>
                        <p
                          class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                        >
                          16
                        </p>
                      </div>
                    </div>
                    <div class="flex justify-between items-center text-xs pt-5">
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
                        class="relative bg-p2 dark:bg-p1 dark:bg-opacity-10 bg-opacity-10 h-1 w-full rounded-full after:absolute after:h-1 after:w-[30%] after:bg-p2 after:dark:bg-p1 after:rounded-full"
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
            <!-- Contest List Start -->
            <div class="flex flex-col gap-4">
              <div
                class="flex justify-between items-center bg-white py-4 px-5 rounded-xl border border-black border-opacity-20 dark:bg-color9 dark:border-color24"
              >
                <div class="flex justify-start items-center gap-3">
                  <div class="rounded-full overflow-hidden">
                    <img
                      src="assets/images/user-img-1.png"
                      alt=""
                      class="size-12"
                    />
                  </div>
                  <div class="">
                    <div class="flex justify-start items-center gap-1">
                      <a href="user-profile.html" class="font-semibold"
                        >David Hughes</a
                      >
                      <i class="ph-fill ph-seal-check text-p1"></i>
                    </div>
                    <p class="text-xs">@example_echo</p>
                  </div>
                </div>

                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
              <div
                class="flex justify-between items-center bg-white py-4 px-5 rounded-xl border border-black border-opacity-20 dark:bg-color9 dark:border-color24"
              >
                <div class="flex justify-start items-center gap-3">
                  <div class="rounded-full overflow-hidden">
                    <img
                      src="assets/images/user-img-2.png"
                      alt=""
                      class="size-12"
                    />
                  </div>
                  <div class="">
                    <div class="flex justify-start items-center gap-1">
                      <a href="user-profile.html" class="font-semibold"
                        >Esther Farmer</a
                      >
                      <i class="ph-fill ph-seal-check text-p1"></i>
                    </div>
                    <p class="text-xs">@example_echo</p>
                  </div>
                </div>

                <button
                  class="text-xs bg-color14 border border-color16 text-p2 dark:text-p1 py-1 px-4 rounded-full dark:border-bgColor16 dark:bg-bgColor14"
                >
                  Following
                </button>
              </div>
              <div
                class="flex justify-between items-center bg-white py-4 px-5 rounded-xl border border-black border-opacity-20 dark:bg-color9 dark:border-color24"
              >
                <div class="flex justify-start items-center gap-3">
                  <div class="rounded-full overflow-hidden">
                    <img
                      src="assets/images/user-img-3.png"
                      alt=""
                      class="size-12"
                    />
                  </div>
                  <div class="">
                    <div class="flex justify-start items-center gap-1">
                      <a href="user-profile.html" class="font-semibold"
                        >Miguel Beck</a
                      >
                      <i class="ph-fill ph-seal-check text-p1"></i>
                    </div>
                    <p class="text-xs">@example_echo</p>
                  </div>
                </div>

                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
              <div
                class="flex justify-between items-center bg-white py-4 px-5 rounded-xl border border-black border-opacity-20 dark:bg-color9 dark:border-color24"
              >
                <div class="flex justify-start items-center gap-3">
                  <div class="rounded-full overflow-hidden">
                    <img
                      src="assets/images/user-img-4.png"
                      alt=""
                      class="size-12"
                    />
                  </div>
                  <div class="">
                    <div class="flex justify-start items-center gap-1">
                      <a href="user-profile.html" class="font-semibold"
                        >Arthur McCoy</a
                      >
                      <i class="ph-fill ph-seal-check text-p1"></i>
                    </div>
                    <p class="text-xs">@example_echo</p>
                  </div>
                </div>

                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
              <div
                class="flex justify-between items-center bg-white py-4 px-5 rounded-xl border border-black border-opacity-20 dark:bg-color9 dark:border-color24"
              >
                <div class="flex justify-start items-center gap-3">
                  <div class="rounded-full overflow-hidden">
                    <img
                      src="assets/images/user-img-5.png"
                      alt=""
                      class="size-12"
                    />
                  </div>
                  <div class="">
                    <div class="flex justify-start items-center gap-1">
                      <a href="user-profile.html" class="font-semibold"
                        >Caroline Graves</a
                      >
                      <i class="ph-fill ph-seal-check text-p1"></i>
                    </div>
                    <p class="text-xs">@example_echo</p>
                  </div>
                </div>

                <button
                  class="text-xs bg-color14 border border-color16 text-p2 dark:text-p1 py-1 px-4 rounded-full dark:border-bgColor16 dark:bg-bgColor14"
                >
                  Following
                </button>
              </div>
              <div
                class="flex justify-between items-center bg-white py-4 px-5 rounded-xl border border-black border-opacity-20 dark:bg-color9 dark:border-color24"
              >
                <div class="flex justify-start items-center gap-3">
                  <div class="rounded-full overflow-hidden">
                    <img
                      src="assets/images/user-img-6.png"
                      alt=""
                      class="size-12"
                    />
                  </div>
                  <div class="">
                    <div class="flex justify-start items-center gap-1">
                      <a href="user-profile.html" class="font-semibold"
                        >Beatrice Cooper</a
                      >
                      <i class="ph-fill ph-seal-check text-p1"></i>
                    </div>
                    <p class="text-xs">@example_echo</p>
                  </div>
                </div>

                <button
                  class="text-xs bg-color14 border border-color16 text-p2 dark:text-p1 py-1 px-4 rounded-full dark:border-bgColor16 dark:bg-bgColor14"
                >
                  Following
                </button>
              </div>
              <div
                class="flex justify-between items-center bg-white py-4 px-5 rounded-xl border border-black border-opacity-20 dark:bg-color9 dark:border-color24"
              >
                <div class="flex justify-start items-center gap-3">
                  <div class="rounded-full overflow-hidden">
                    <img
                      src="assets/images/user-img-7.png"
                      alt=""
                      class="size-12"
                    />
                  </div>
                  <div class="">
                    <div class="flex justify-start items-center gap-1">
                      <a href="user-profile.html" class="font-semibold"
                        >Lelia Pierce</a
                      >
                      <i class="ph-fill ph-seal-check text-p1"></i>
                    </div>
                    <p class="text-xs">@example_echo</p>
                  </div>
                </div>

                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
              <div
                class="flex justify-between items-center bg-white py-4 px-5 rounded-xl border border-black border-opacity-20 dark:bg-color9 dark:border-color24"
              >
                <div class="flex justify-start items-center gap-3">
                  <div class="rounded-full overflow-hidden">
                    <img
                      src="assets/images/user-img-8.png"
                      alt=""
                      class="size-12"
                    />
                  </div>
                  <div class="">
                    <div class="flex justify-start items-center gap-1">
                      <a href="user-profile.html" class="font-semibold"
                        >Scott McBride</a
                      >
                      <i class="ph-fill ph-seal-check text-p1"></i>
                    </div>
                    <p class="text-xs">@example_echo</p>
                  </div>
                </div>

                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
              <div
                class="flex justify-between items-center bg-white py-4 px-5 rounded-xl border border-black border-opacity-20 dark:bg-color9 dark:border-color24"
              >
                <div class="flex justify-start items-center gap-3">
                  <div class="rounded-full overflow-hidden">
                    <img
                      src="assets/images/user-img-9.png"
                      alt=""
                      class="size-12"
                    />
                  </div>
                  <div class="">
                    <div class="flex justify-start items-center gap-1">
                      <a href="user-profile.html" class="font-semibold"
                        >Genevieve Woods</a
                      >
                      <i class="ph-fill ph-seal-check text-p1"></i>
                    </div>
                    <p class="text-xs">@example_echo</p>
                  </div>
                </div>

                <button
                  class="text-white text-xs bg-p2 py-1 px-4 rounded-full dark:bg-p1"
                >
                  Follow
                </button>
              </div>
            </div>
            <!-- Contest List End -->
          </div>
          <div class="tab-content hiddenTab" id="tabThree_data">
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
        </div>
      </div>
    </div>

    <!-- Javascript dependencies -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/contest-search-result.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:34 GMT -->
</html>
