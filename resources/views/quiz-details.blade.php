<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from softivuslab.com/html/quizio/live-demo/quiz-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:36 GMT -->
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
    <title>Quiz Details - Quizio PWA HTML Template</title>
  <link href="style.css" rel="stylesheet"></head>
  <body class="">
    <div
      class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1"
    >
      <!-- Absolute Items Start -->
      <img
        src="assets/images/header-bg-1.png"
        alt=""
        class="absolute top-0 left-0 right-0 -mt-12"
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
            <h2 class="text-2xl font-semibold text-white">Quiz Details</h2>
          </div>
          <div class="flex justify-start items-center gap-2">
            <div
              class="text-white border border-color24 p-2 rounded-full flex justify-center items-center bg-color24"
            >
              <i class="ph ph-paper-plane-tilt"></i>
            </div>
            <div class="relative">
              <button
                class="border border-color24 p-2 rounded-full flex justify-center items-center bg-color24 relative quizDetailsMoreOptionsModalOpenButton"
              >
                <i class="ph ph-dots-three text-white"></i>
              </button>
              <div
                class="absolute top-12 right-0 z-40 modalClose duration-500 bg-white dark:bg-color9 p-5 rounded-xl shadow6 quizDetailsMoreOptionsModal"
              >
                <div
                  class="flex justify-start items-center gap-3 pb-3 border-b border-dashed border-color21"
                >
                  <div
                    class="text-p2 border dark:text-white dark:bg-color24 dark:border-color18 border-color16 p-2 rounded-full flex justify-center items-center bg-color14 text-sm"
                  >
                    <i class="ph ph-paper-plane-tilt"></i>
                  </div>
                  <p class="text-sm">Share</p>
                </div>
                <a
                  href="generate-qr-code.html"
                  class="flex justify-start items-center gap-3 pt-3"
                >
                  <div
                    class="text-p2 border dark:text-white dark:bg-color24 dark:border-color18 border-color16 p-2 rounded-full flex justify-center items-center bg-color14 text-sm"
                  >
                    <i class="ph ph-paper-plane-tilt"></i>
                  </div>
                  <p class="text-sm text-nowrap">Generate PIN & QR Code</p>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Page Title End -->
        <div class="rounded-2xl overflow-hidden shadow2 mt-16">
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
                  <p class="font-semibold text-xs">English Language Quiz</p>
                  <p class="text-xs">Language - English</p>
                </div>
              </div>
              <div class="flex justify-start items-center gap-1">
                <p
                  class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                >
                  05
                </p>
                <p class="text-p2 text-base font-semibold dark:text-p1">:</p>
                <p
                  class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                >
                  14
                </p>
                <p class="text-p2 text-base font-semibold dark:text-p1">:</p>
                <p
                  class="text-p2 text-[10px] py-0.5 px-1 bg-p2 bg-opacity-20 dark:text-p1 dark:bg-color24 rounded-md"
                >
                  20
                </p>
              </div>
            </div>

            <div
              class="flex justify-between items-center gap-2 text-xs py-3 text-nowrap mt-2"
            >
              <p>30 left</p>
              <div
                class="relative bg-p2 dark:bg-p1 dark:bg-opacity-10 bg-opacity-10 h-1 w-full rounded-full after:absolute after:h-1 after:w-[40%] after:bg-p2 after:dark:bg-p1 after:rounded-full"
              ></div>
              <p>100 spots</p>
            </div>
            <button
              class="py-3 text-center bg-p2 rounded-full text-sm font-semibold text-white block confirmationModalOpenButton w-full"
            >
              Join Now $20
            </button>

            <div
              class="pt-5 flex justify-between items-center border-t border-dashed border-black dark:border-color24 border-opacity-10 mt-5"
            >
              <div class="flex justify-start items-center gap-1">
                <i class="ph ph-trophy text-p1"></i>
                <p class="text-xs">1st Price - $2,499</p>
              </div>
              <div class="flex justify-start items-center gap-2">
                <i class="ph ph-share-network"></i>
                <button class="setReminderModalOpenButton">
                  <i class="ph ph-bell-ringing"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div
          class="py-4 px-5 rounded-2xl border border-color21 bg-white mt-8 dark:bg-color11 quiz-details"
        >
          <p
            class="font-semibold pb-3 border-b border-dashed border-color21 dark:border-color24"
          >
            Quiz Details
          </p>
          <div class="flex justify-start items-center gap-2 pt-3">
            <div
              class="flex justify-center items-center text-white bg-p1 p-2 rounded-full dark:bg-p1 icon"
            >
              <i class="ph ph-scroll"></i>
            </div>
            <p class="text-sm text-color5 dark:text-bgColor5 detailsShort">
              Challenge your of historical events, figures, and milestones with
              our
              <button
                class="text-p2 underline dark:text-p1 quizDetailsShowButton"
              >
                More
              </button>
            </p>
            <div class="text-sm flex-col gap-2 details">
              <p class="">
                When creating a quiz description or brief overview for your app
                UI page, aim to provide concise yet informative details about
                the quiz. Here's an example of a quiz description: Quiz Title:
                History Buffs Trivia
              </p>
              <p class="">
                Description: Challenge your knowledge of historical events,
                figures, and milestones with our History Buffs Trivia quiz! Test
                yourself with a variety of thought-provoking questions spanning
                different eras, civilizations, and key moments in history.
                Whether you're a history enthusiast or looking to learn
                something new, dive into this quiz for an engaging and
                enlightening experience.
              </p>
              <p>
                Description: Challenge your knowledge of historical events,
                figures, and milestones with our History Buffs Trivia quiz! Test
                yourself with a variety of thought-provoking questions spanning
                different eras, civilizations, and key moments in history.
                Whether you're a history enthusiast or looking to learn
                something new, dive into this quiz for an engaging and
                enlightening experience.
              </p>
              <p class="font-semibold">Quiz Details:</p>
              <ul class="list-disc ml-4">
                <li>Number of Questions: 30</li>
                <li>Difficulty Level: Moderate</li>
                <li>
                  Categories: World History, Famous Figures, Events & Dates
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="quizDetailsTab pt-8">
          <ul
            class="flex justify-start items-center tab-button text-center font-semibold"
          >
            <li id="tabOne" class="tabButton activeTabButton cursor-pointer">
              Winning
            </li>
            <li id="tabTwo" class="tabButton cursor-pointer">Leaderboard</li>
          </ul>

          <div class="pt-8">
            <div class="tab-content activeTab" id="tabOne_data">
              <div class="text-sm font-semibold">
                <div
                  class="flex justify-between items-center py-2 px-5 bg-p2 text-white rounded-t-2xl"
                >
                  <p>Rank</p>
                  <p>Winning</p>
                </div>
                <div
                  class="flex justify-between items-center py-3 border-b border-dashed border-color21 dark:border-color24 mx-5"
                >
                  <div class="flex justify-start items-center gap-1">
                    <i class="ph ph-trophy text-p1 text-lg"></i>
                    <p>1</p>
                  </div>
                  <p>$2499</p>
                </div>
                <div
                  class="flex justify-between items-center py-3 border-b border-dashed border-color21 dark:border-color24 mx-5"
                >
                  <div class="flex justify-start items-center gap-1">
                    <i class="ph ph-trophy text-p1 text-lg"></i>
                    <p>2</p>
                  </div>
                  <p>$2300</p>
                </div>
                <div
                  class="flex justify-between items-center py-3 border-b border-dashed border-color21 dark:border-color24 mx-5"
                >
                  <div class="flex justify-start items-center gap-1">
                    <i class="ph ph-trophy text-p1 text-lg"></i>
                    <p>3</p>
                  </div>
                  <p>$2150</p>
                </div>
                <div
                  class="flex justify-between items-center py-3 border-b border-dashed border-color21 dark:border-color24 mx-5"
                >
                  <div class="flex justify-start items-center gap-1">
                    <i class="ph ph-trophy text-p1 text-lg"></i>
                    <p>4</p>
                  </div>
                  <p>$1900</p>
                </div>
                <div
                  class="flex justify-between items-center py-3 border-b border-dashed border-color21 dark:border-color24 mx-5"
                >
                  <div class="flex justify-start items-center gap-1">
                    <i class="ph ph-trophy text-p1 text-lg"></i>
                    <p>5</p>
                  </div>
                  <p>$1800</p>
                </div>
              </div>
            </div>
            <div class="tab-content hiddenTab" id="tabTwo_data">
              <table class="text-sm font-semibold w-full text-center">
                <tr class="bg-p2 text-white w-full">
                  <th class="rounded-tl-xl text-start">
                    <p class="py-2 pl-5">Name</p>
                  </th>
                  <th class="">
                    <p class="py-2 text-nowrap">Final Marks</p>
                  </th>
                  <th class="">
                    <p class="py-2">Rank</p>
                  </th>
                  <th class="rounded-tr-xl">
                    <p class="py-2">Winnding</p>
                  </th>
                </tr>
                <tr
                  class="w-full border-b border-color21 dark:border-color24 border-dashed"
                >
                  <td>
                    <div class="flex justify-start items-center gap-2 py-3">
                      <img
                        src="assets/images/user-img-1.png"
                        alt=""
                        class="size-8 rounded-full object-cover"
                      />
                      <p>Lunar Fang</p>
                    </div>
                  </td>
                  <td>
                    <p class="py-3">40</p>
                  </td>
                  <td><p class="py-3">1</p></td>
                  <td><p class="py-3">$226</p></td>
                </tr>
                <tr
                  class="w-full border-b border-color21 dark:border-color24 border-dashed"
                >
                  <td>
                    <div class="flex justify-start items-center gap-2 py-3">
                      <img
                        src="assets/images/user-img-2.png"
                        alt=""
                        class="size-8 rounded-full object-cover"
                      />
                      <p>Lunar Fang</p>
                    </div>
                  </td>
                  <td>
                    <p class="py-3">40</p>
                  </td>
                  <td><p class="py-3">2</p></td>
                  <td><p class="py-3">$226</p></td>
                </tr>
                <tr
                  class="w-full border-b border-color21 dark:border-color24 border-dashed"
                >
                  <td>
                    <div class="flex justify-start items-center gap-2 py-3">
                      <img
                        src="assets/images/user-img-3.png"
                        alt=""
                        class="size-8 rounded-full object-cover"
                      />
                      <p>Lunar Fang</p>
                    </div>
                  </td>
                  <td>
                    <p class="py-3">40</p>
                  </td>
                  <td><p class="py-3">3</p></td>
                  <td><p class="py-3">$226</p></td>
                </tr>
              </table>
              <a
                href="leader-board.html"
                class="text-center pt-3 block font-semibold text-p2 dark:text-p1"
                >See All</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden inset-0 z-40 confirmationModal">
      <div
        class="container bg-black dark:bg-white dark:bg-opacity-30 bg-opacity-40 flex justify-center items-center h-full px-6"
      >
        <div
          class="bg-white dark:bg-color10 p-5 rounded-xl w-full dark:text-white"
        >
          <div class="flex justify-between items-center pb-4">
            <p class="text-lg font-semibold">Confirmation</p>
            <button
              class="p-2 flex justify-center items-center rounded-full border border-color16 confirmationModalCloseButton dark:border-bgColor16"
            >
              <i class="ph ph-x"></i>
            </button>
          </div>
          <div
            class="py-4 border-y border-dashed border-color21 dark:border-color24"
          >
            <div class="flex justify-between items-center">
              <p class="text-color5 dark:text-bgColor5">Entry Fee :</p>
              <p class="font-semibold">Rs. 25.00</p>
            </div>
            <div class="flex justify-between items-center pt-3">
              <p class="text-color5 dark:text-bgColor5">Joining Offer :</p>
              <p class="font-semibold">Rs. 15.00</p>
            </div>
          </div>
          <div class="flex justify-between items-end py-4">
            <div class="">
              <p class="font-semibold">To Pay :</p>
              <p class="text-xs text-color5 dark:text-bgColor5">
                inclusive of taxes
              </p>
            </div>
            <p class="text-sm font-semibold text-p2 dark:text-p1">Rs. 15.00</p>
          </div>
          <a
            href="quiz-1.html"
            class="py-3 text-center bg-p2 rounded-full text-sm font-semibold text-white block w-full dark:bg-p1"
          >
            Join Now $20
          </a>
          <div class="flex justify-start items-start gap-2 pt-2">
            <div class="text-lg">
              <i class="ph ph-check-square"></i>
            </div>
            <p class="text-xs text-color5 dark:text-bgColor5">
              You agree to all terms & conditions and also agree to be contacted
              by company and their pertners
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden inset-0 z-40 setReminderModal">
      <div
        class="container bg-black dark:bg-white dark:bg-opacity-30 bg-opacity-40 flex justify-center items-center h-full px-6"
      >
        <div
          class="bg-white dark:bg-color10 p-5 rounded-xl w-full dark:text-white"
        >
          <div
            class="flex justify-between items-center pb-4 border-b border-dashed border-color21 dark:border-color24"
          >
            <p class="text-lg font-semibold">Set Reminder</p>
            <button
              class="p-2 flex justify-center items-center rounded-full border border-color16 setReminderModalCloseButton dark:border-bgColor16"
            >
              <i class="ph ph-x"></i>
            </button>
          </div>

          <p class="text-xs text-color5 dark:text-bgColor5 py-4">
            You agree to all terms & conditions and also agree to be contacted
            by company and their pertners
          </p>

          <div class="flex justify-between items-center gap-3">
            <button
              class="py-3 text-center border-color16 bg-color14 rounded-full text-sm font-semibold text-p2 dark:text-p1 block w-full dark:border-bgColor16 dark:bg-bgColor14"
            >
              Later
            </button>
            <button
              class="py-3 text-center bg-p2 rounded-full text-sm font-semibold text-white block w-full dark:bg-p1"
            >
              Set Now
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Javascript Dependecies -->
    <script src="assets/js/main.js"></script>
  <script defer src="index.js"></script></body>

<!-- Mirrored from softivuslab.com/html/quizio/live-demo/quiz-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Jul 2025 05:04:37 GMT -->
</html>
