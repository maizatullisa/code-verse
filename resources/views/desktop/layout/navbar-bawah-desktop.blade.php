@if (!View::hasSection('hideBottomNavbar'))
    <!-- Bottom Navigation - Desktop Version -->
    <div class="fixed bottom-0 left-0 right-0 z-40">
        <div class="max-w-4xl mx-auto bg-p2 px-8 py-4 rounded-t-3xl flex justify-around items-center">
            
            <!-- Beranda -->
            <a href="{{ url('/desktop/home-desktop') }}" class="flex flex-col items-center gap-2 group">
                <div class="{{ Request::is('desktop/home-desktop') ? 'bg-p1 scale-110' : 'bg-white' }} p-4 rounded-full transition-transform group-hover:scale-110">
                    <i class="ph ph-house text-2xl {{ Request::is('desktop/home-desktop') ? 'text-white' : 'text-black' }}"></i>
                </div>
                <p class="text-sm {{ Request::is('desktop/home-desktop') ? 'text-white' : 'text-white/70' }} font-semibold">Beranda</p>
            </a>

            <!-- ROADMAP -->
            <a href="{{ url('/desktop/index-roadmap') }}" class="flex flex-col items-center gap-2 group">
                <div class="{{ Request::is('desktop/index-roadmap*') ? 'bg-p1 scale-110' : 'bg-white' }} p-4 rounded-full transition-transform group-hover:scale-110">
                    <i class="ph ph-squares-four text-2xl {{ Request::is('/desktop/index-roadmap*') ? 'text-white' : 'text-black' }}"></i>
                </div>
                <p class="text-sm {{ Request::is('/desktop/index-roadmap*') ? 'text-white' : 'text-white/70' }} font-semibold">Roadmap</p>
            </a>

            <!-- Kelas AKU GANTI -->
            <a href="{{ url('/desktop/kelas-index') }}" class="flex flex-col items-center gap-2 group">
                <div class="{{ Request::is('desktop/kelas-index') ? 'bg-p1 scale-110' : 'bg-white' }} p-4 rounded-full transition-transform group-hover:scale-110">
                    <i class="ph ph-users-three text-2xl {{ Request::is('desktop/kelas-ditawarkan') ? 'text-white' : 'text-black' }}"></i>
                </div>
                <p class="text-sm {{ Request::is('desktop/kelas-index') ? 'text-white' : 'text-white/70' }} font-semibold">Kelas</p>
            </a>

            <!-- Help AI -->
            <a href="{{ url('/desktop/help-ai') }}" class="flex flex-col items-center gap-2 group">
                <div class="{{ Request::is('desktop/help-ai') ? 'bg-p1 scale-110' : 'bg-white' }} p-4 rounded-full transition-transform group-hover:scale-110">
                    <i class="ph ph-robot text-2xl {{ Request::is('desktop/help-ai') ? 'text-white' : 'text-black' }}"></i>
                </div>
                <p class="text-sm {{ Request::is('desktop/help-ai') ? 'text-white' : 'text-white/70' }} font-semibold">Help AI</p>
            </a>

        </div>
    </div>
@endif
