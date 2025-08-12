<!-- Bottom NAVBAR BAWAH MULAI -->
<div class="fixed bottom-0 left-0 right-0 z-40">
    <div class="container bg-p2 px-6 py-3 rounded-t-2xl flex justify-around items-center dark:bg-p1">
        <a href="{{ url('/home-mobile') }}" class="flex justify-center items-center text-center flex-col gap-1 {{ request()->is('home') ? 'active' : '' }}">
            <div class="flex justify-center items-center p-3 rounded-full {{ request()->is('home') ? 'bg-p1 dark:bg-p2' : 'bg-white dark:bg-color10' }}">
                <i class="ph ph-house text-xl !leading-none {{ request()->is('home') ? 'text-white' : 'dark:text-white' }}"></i>
            </div>
            <p class="text-xs text-white font-semibold dark:text-color10">Beranda</p>
        </a>
        
        <a href="{{ url('/roadmap-mobile') }}" class="flex justify-center items-center text-center flex-col gap-1 {{ request()->is('library') ? 'active' : '' }}">
            <div class="flex justify-center items-center p-3 rounded-full {{ request()->is('library') ? 'bg-p1 dark:bg-p2' : 'bg-white dark:bg-color10' }}">
                <i class="ph ph-squares-four text-xl !leading-none {{ request()->is('library') ? 'text-white' : 'dark:text-white' }}"></i>
            </div>
            <p class="text-xs text-white font-semibold dark:text-color10">Roadmap</p>
        </a>
        
        <a href="{{ url('/kelas') }}" class="flex justify-center items-center text-center flex-col gap-1 {{ request()->is('kelas') ? 'active' : '' }}">
            <div class="flex justify-center items-center p-3 rounded-full {{ request()->is('kelas') ? 'bg-p1 dark:bg-p2' : 'bg-white dark:bg-color10' }}">
                <i class="ph ph-users-three text-xl !leading-none {{ request()->is('kelas') ? 'text-white' : 'dark:text-white' }}"></i>
            </div>
            <p class="text-xs text-white font-semibold dark:text-color10">Kelas</p>
        </a>
        
        <a href="{{ url('/help-mobile') }}" class="flex justify-center items-center text-center flex-col gap-1 {{ request()->is('help-mobile') ? 'active' : '' }}">
            <div class="flex justify-center items-center p-3 rounded-full {{ request()->is('help-mobile') ? 'bg-p1 dark:bg-p2' : 'bg-white dark:bg-color10' }}">
                <i class="ph ph-question text-xl !leading-none {{ request()->is('help-mobile') ? 'text-white' : 'dark:text-white' }}"></i>
            </div>
            <p class="text-xs text-white font-semibold dark:text-color10">Help AI</p>
        </a>
    </div>
</div>
<!-- Bottom NAVBAR BAWAH SELESAI -->