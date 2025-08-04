@if (!View::hasSection('hideBottomNavbar'))
    <!-- Bottom Navigation - Desktop Version -->
    <div class="fixed bottom-0 left-0 right-0 z-40">
        <div class="max-w-4xl mx-auto bg-p2 px-8 py-4 rounded-t-3xl flex justify-around items-center">
            <a href="{{ url('/desktop/home-desktop') }}" class="flex flex-col items-center gap-2 group active">
                <div class="bg-p1 p-4 rounded-full group-hover:scale-110 transition-transform">
                    <i class="ph ph-house text-2xl text-white"></i>
                </div>
                <p class="text-sm text-white font-semibold">Beranda</p>
            </a>

            <a href="{{ url('/desktop/pages/materi/materi-reviews') }}" class="flex flex-col items-center gap-2 group">
                <div class="bg-white p-4 rounded-full group-hover:scale-110 transition-transform">
                    <i class="ph ph-squares-four text-2xl text-black"></i>
                </div>
                <p class="text-sm text-white font-semibold">Library</p>
            </a>

            <a href="{{ url('/desktop/kelas-ditawarkan') }}" class="flex flex-col items-center gap-2 group">
                <div class="bg-white p-4 rounded-full group-hover:scale-110 transition-transform">
                    <i class="ph ph-users-three text-2xl text-black"></i>
                </div>
                <p class="text-sm text-white font-semibold">Kelas</p>
            </a>

            <a href="{{ url('/desktop/help-ai') }}" class="flex flex-col items-center gap-2 group">
                <div class="bg-white p-4 rounded-full group-hover:scale-110 transition-transform">
                    <i class="ph ph-robot text-2xl text-black"></i>
                </div>
                <p class="text-sm text-white font-semibold">Help AI</p>
            </a>
        </div>
    </div>
@endif
