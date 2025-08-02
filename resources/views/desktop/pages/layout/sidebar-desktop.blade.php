<!--sidebar atas-->
 <div class="hidden sidebarModal inset-0 z-50">
      <div class="container bg-black bg-opacity-80 h-full overflow-y-auto">
        <div class="w-[330px] bg-slate-50 relative">
          <button
            class="sidebarModalCloseButton absolute top-3 right-3 border rounded-full border-p1 flex justify-center items-center p-1 text-white"
          >
            <i class="ph ph-x"></i>
          </button>
          <div class="bg-p2 text-white pt-8 pb-4 px-5">
            <div
              class="flex justify-start items-center gap-3 pb-6 border-b border-color24 border-dashed"
            >
              <img src="assets/images/user_sidebar.png" alt="" />
              {{--
              <div class="">
                <p class="text-2xl font-semibold">
                {{ $user->first_name }}<i class="ph-fill ph-seal-check text-p1"></i>
                </p>
                <p class="text-xs">
                  <span class="font-semibold">ID :</span>{{ $user->id }}
                </p>
              </div> --}}
            </div>
            <div class="flex justify-between items-center pt-6">
              <div class="flex justify-start items-start gap-2">
                <div
                  class="flex justify-center items-center text-white rounded-full bg-p1 p-1.5"
                >
                  <i class="ph-fill ph-chart-bar"></i>
                </div>
                <div class="">
                  <p class="text-xs">Rank</p>
                  <p class="text-base font-semibold">420</p>
                </div>
              </div>
              <div
                class="h-8 w-px bg-[linear-gradient(180deg,rgba(255,255,255,0.00)_0%,rgba(255,255,255,0.99)_49.48%,rgba(255,255,255,0.00)_100%)]"
              ></div>
              <div class="flex justify-start items-start gap-2">
                <div
                  class="flex justify-center items-center text-white rounded-full bg-p1 p-1.5"
                >
                  <i class="ph-fill ph-coins"></i>
                </div>
                <div class="">
                  <p class="text-xs">Code Verse Coin Earned</p>
                  <p class="text-base font-semibold">20</p>
                </div>
              </div>
            </div>
            <p class="pt-5 text-end text-xs">
              <span class="text-p1">* </span>Berjalan Bulan
            </p>
          </div>
          <div class="flex flex-col">
            <a
              href="upgrade-premium.html"
              class="flex justify-between items-center py-3 px-4 bg-p1 text-white"
            >

              <div class="flex justify-center items-center rounded-full">
                <i class="ph ph-arrow-right"></i>
              </div>
            </a>
            <a href="{{ url('/profile') }}">
                <div class="flex justify-start items-center gap-3 cursor-pointer">
                    <div
                        class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                    >
                        <i class="ph ph-user"></i>
                    </div>
                    <p class="font-semibold dark:text-white">Saya</p>
                </div>
            </a>

            
            <a
              href="earn-rewards.html"
              class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24"
            >
              <div class="flex justify-start items-center gap-3">
                <div
                  class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                >
                  <i class="ph ph-users-three"></i>
                </div>
                <p class="font-semibold dark:text-white">Forum Diskusi</p>
              </div>
            </a>
            <a href="{{ url('/notification') }}"

              class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24"
            >
              <div class="flex justify-start items-center gap-3">
                <div
                  class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                >
                  <i class="ph ph-bell"></i>
                </div>
                <p class="font-semibold dark:text-white">Notifikasi</p>
              </div>
              <div
                class="flex justify-center items-center rounded-full text-p2 dark:text-p1"
              >
                <i class="ph ph-arrow-right"></i>
              </div>
            </a>

            <a href="{{ url('/settings') }}"
              class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24"
            >
              <div class="flex justify-start items-center gap-3">
                <div
                  class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                >
                  <i class="ph ph-gear-six"></i>
                </div>
                <p class="font-semibold dark:text-white">Pengaturan</p>
              </div>
              <div
                class="flex justify-center items-center rounded-full text-p2 dark:text-p1"
              >
                <i class="ph ph-arrow-right"></i>
              </div>
            </a>
            <a
              href="master-medal.html"
              class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24"
            >
              <div class="flex justify-start items-center gap-3">
                <div
                  class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                >
                  <i class="ph ph-medal"></i>
                </div>
                <p class="font-semibold dark:text-white">Quiz</p>
              </div>
              <div
                class="flex justify-center items-center rounded-full text-p2 dark:text-p1"
              >
                <i class="ph ph-arrow-right"></i>
              </div>
            </a>
            <a
              href="chat.html"
              class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24"
            >
              <div class="flex justify-start items-center gap-3">
                <div
                  class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                >
                  <i class="ph ph-chats-teardrop"></i>
                </div>
                <p class="font-semibold dark:text-white">Chat dengan Mentor</p>
              </div>
              <div
                class="flex justify-center items-center rounded-full text-p2 dark:text-p1"
              >
                <i class="ph ph-arrow-right"></i>
              </div>
            </a>
            <a
              href="help-center.html"
              class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24"
            >
              <div class="flex justify-start items-center gap-3">
                <div
                  class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                >
                  <i class="ph ph-seal-question"></i>
                </div>
                <p class="font-semibold dark:text-white">Hubungi Kami</p>
              </div>
              <div
                class="flex justify-center items-center rounded-full text-p2 dark:text-p1"
              >
                <i class="ph ph-arrow-right"></i>
              </div>
            </a>
            <div
              class="flex justify-between items-center py-3 px-4 border-b border-dashed border-color21 dark:bg-color1 dark:border-color24"
            >
              <div class="flex justify-start items-center gap-3">
                <div
                  class="flex justify-center items-center p-2 rounded-full border bg-color16 border-color14 text-lg !leading-none text-p2 dark:bg-bgColor14 dark:border-bgColor16 dark:text-p1"
                >
                  <i class="ph ph-shield"></i>
                </div>
                <p class="font-semibold dark:text-white">Game Rules</p>
              </div>
              <div
                class="flex justify-center items-center rounded-full text-p2 dark:text-p1"
              >
                <i class="ph ph-arrow-right"></i>
              </div>
            </div>
            <button
              class="flex justify-between items-center py-3 px-4 dark:bg-color1 withdrawModalOpenButton"
            >
              <div class="flex justify-start items-center gap-3">
                <div
                  class="flex justify-center items-center p-2 rounded-full border text-lg !leading-none bg-bgColor14 border-bgColor16 text-p1"
                >
                  <i class="ph ph-sign-out"></i>
                </div>
                <p class="font-semibold text-p1">Logout</p>
              </div>
              <div
                class="flex justify-center items-center rounded-full text-p1"
              >
                <i class="ph ph-arrow-right"></i>
              </div>
            </button>
          </div>
          <div
            class="flex justify-between items-center p-4 bg-p2 dark:bg-p1 text-white"
          >
            <p class="text-sm">Rate this App</p>
            <div
              class="flex justify-start items-center gap-1 text-yellow-400 dark:text-white"
            >
              <i class="ph-fill ph-star-half"></i>
              <i class="ph-fill ph-star"></i>
              <i class="ph-fill ph-star"></i>
            </div>
          </div>
        </div>
      </div>
    </div>