
<!--navbar bawah-->
<nav class="w-full bg-p2 dark:bg-p1 py-4 px-8 fixed  left-0 z-40 shadow-md bottom-0 rounded-xl">
  <div class="max-w-7xl mx-auto flex justify-between items-center gap-6">
    
    <!-- Menu Item -->
    <a href="{{ url('/home') }}" class="flex items-center gap-2 hover:opacity-90 transition">
      <div class="p-2 rounded-lg bg-p1 dark:bg-p2">
        <i class="ph ph-house text-xl text-white dark:text-color10"></i>
      </div>
      <span class="text-sm font-semibold text-white dark:text-color10">Beranda</span>
    </a>

    <a href="{{ url('/library') }}" class="flex items-center gap-2 hover:opacity-90 transition">
      <div class="p-2 rounded-lg bg-white dark:bg-color10">
        <i class="ph ph-squares-four text-xl text-p2 dark:text-white"></i>
      </div>
      <span class="text-sm font-semibold text-white dark:text-color10">Library</span>
    </a>

    <a href="{{ url('/kelas') }}" class="flex items-center gap-2 hover:opacity-90 transition">
      <div class="p-2 rounded-lg bg-white dark:bg-color10">
        <i class="ph ph-users-three text-xl text-p2 dark:text-white"></i>
      </div>
      <span class="text-sm font-semibold text-white dark:text-color10">Kelas</span>
    </a>

    <a href="{{ url('/box') }}" class="flex items-center gap-2 hover:opacity-90 transition">
      <div class="p-2 rounded-lg bg-white dark:bg-color10">
        <i class="ph ph-chat-circle-text text-xl text-p2 dark:text-white"></i>
      </div>
      <span class="text-sm font-semibold text-white dark:text-color10">Help AI</span>
    </a>

  </div>
</nav>
