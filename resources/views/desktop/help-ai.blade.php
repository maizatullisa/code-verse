@extends('desktop.layout.master-desktop')

@section('title', 'Help Zizi - Code Verse')

@section('page-title', 'Hallo Zizi disini')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')

<div class="min-h-screen bg-slate-50 rounded-xl px-4 sm:px-6 lg:px-8">
    <!-- AI Header Card -->
    <div class="bg-white shadow-sm border border-slate-200 rounded-2xl p-4 sm:p-6 lg:p-8 mb-4 sm:mb-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-6">
            <div class="flex items-start sm:items-center gap-4 sm:gap-6 w-full sm:w-auto">
                <div class="bg-slate-100 p-3 sm:p-4 rounded-xl flex-shrink-0">
                    <i class="ph ph-robot text-2xl sm:text-3xl text-slate-700"></i>
                </div>
                <div class="flex-1">
                    <h1 class="text-xl sm:text-2xl font-semibold text-slate-900 mb-2">Zizi AI</h1>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                       Halo Aku Zizi aku yang akan temenin kamu belajar...
                       mau tanya apa silahkan tanya yaa
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-2 sm:gap-3 bg-emerald-50 px-3 sm:px-4 py-2 rounded-full border border-emerald-200 flex-shrink-0">
                <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                <span class="text-xs sm:text-sm font-medium text-emerald-700">Online</span>
            </div>
        </div>
    </div>

    <!-- Chat Interface -->
    <div class="bg-white shadow-sm border border-slate-200 rounded-2xl p-4 sm:p-6">
        <!-- Chat Messages Container -->
        <div class="h-[50vh] sm:h-[60vh] overflow-y-auto border border-slate-100 rounded-xl p-4 sm:p-6 mb-4 sm:mb-6 bg-slate-50/30" id="chatContainer">
            <!-- Welcome Message -->
            
        </div>

        <!-- Input Area -->
        <div class="bg-slate-50 rounded-xl p-4 sm:p-5 border border-slate-200">
            <div class="flex items-end gap-3 sm:gap-4">
                <!-- Message Input -->
                <div class="flex-1 bg-white rounded-xl border border-slate-200 focus-within:border-slate-400 transition-colors duration-200">
                    <textarea 
                        id="messageInput" 
                        placeholder="Tanyakan sesuatu atau ceritakan masalah yang kamu hadapi..." 
                        class="w-full resize-none border-0 focus:outline-none text-slate-800 placeholder-slate-400 p-3 sm:p-4 rounded-xl text-sm sm:text-base max-h-32"
                        rows="1"
                        onkeydown="handleKeyPress(event)"
                    ></textarea>
                </div>
                
                <!-- Send Button -->
                <button onclick="sendMessage()" 
                        class="bg-slate-800 hover:bg-slate-900 text-white p-3 sm:p-4 rounded-xl transition-colors duration-200 flex-shrink-0" 
                        id="sendBtn">
                    <i class="ph ph-paper-plane-right text-lg sm:text-xl"></i>
                </button>
            </div>
            
            <!-- Quick Actions -->
            <div class="flex flex-wrap gap-2 sm:gap-3 mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-slate-200">
                <button onclick="quickAsk('Buat mind map')" 
                        class="text-slate-600 hover:text-slate-800 transition-colors text-xs sm:text-sm font-medium flex items-center gap-1 sm:gap-2 bg-white px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg hover:bg-slate-50 border border-slate-200">
                    <i class="ph ph-tree-structure text-sm sm:text-base"></i>
                    <span class="hidden xs:inline">Mind Map</span>
                    <span class="xs:hidden">Mind</span>
                </button>
                <button onclick="quickAsk('Teknik pomodoro')" 
                        class="text-slate-600 hover:text-slate-800 transition-colors text-xs sm:text-sm font-medium flex items-center gap-1 sm:gap-2 bg-white px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg hover:bg-slate-50 border border-slate-200">
                    <i class="ph ph-timer text-sm sm:text-base"></i>
                    Pomodoro
                </button>
                <button onclick="quickAsk('Cara mengingat rumus')" 
                        class="text-slate-600 hover:text-slate-800 transition-colors text-xs sm:text-sm font-medium flex items-center gap-1 sm:gap-2 bg-white px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg hover:bg-slate-50 border border-slate-200">
                    <i class="ph ph-brain text-sm sm:text-base"></i>
                    <span class="hidden xs:inline">Memory Tips</span>
                    <span class="xs:hidden">Memory</span>
                </button>
                <button onclick="clearChat()" 
                        class="text-slate-600 hover:text-red-600 transition-colors text-xs sm:text-sm font-medium flex items-center gap-1 sm:gap-2 bg-white px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg hover:bg-red-50 border border-slate-200 sm:ml-auto">
                    <i class="ph ph-trash text-sm sm:text-base"></i>
                    Clear
                </button>
            </div>
        </div>
    </div>

    <!-- AI Features Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 mt-6 sm:mt-8">
        <div class="bg-white rounded-xl p-4 sm:p-6 border border-slate-200 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                <div class="bg-blue-50 p-2 sm:p-3 rounded-xl border border-blue-100 flex-shrink-0">
                    <i class="ph ph-chats-circle text-blue-600 text-lg sm:text-xl"></i>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900">Chat Interaktif</h3>
            </div>
            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                Ngobrol santai seperti dengan teman. Tidak ada pertanyaan yang bodoh, 
                semua bisa dibahas dengan nyaman dan mudah dipahami.
            </p>
        </div>

        <div class="bg-white rounded-xl p-4 sm:p-6 border border-slate-200 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                <div class="bg-emerald-50 p-2 sm:p-3 rounded-xl border border-emerald-100 flex-shrink-0">
                    <i class="ph ph-book-open text-emerald-600 text-lg sm:text-xl"></i>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900">Materi Lengkap</h3>
            </div>
            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                Dari dasar hingga advanced, semua materi tersedia dengan penjelasan 
                yang mudah dipahami dan contoh praktis.
            </p>
        </div>

        <div class="bg-white rounded-xl p-4 sm:p-6 border border-slate-200 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                <div class="bg-violet-50 p-2 sm:p-3 rounded-xl border border-violet-100 flex-shrink-0">
                    <i class="ph ph-target text-violet-600 text-lg sm:text-xl"></i>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900">Personal Learning</h3>
            </div>
            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                Disesuaikan dengan gaya belajar dan kecepatan kamu. 
                Belajar jadi lebih efektif dan menyenangkan.
            </p>
        </div>
    </div>
</div>

<script>
    window.APP_CONFIG = {
        isProduction: "{{ app()->environment('production') ? 'true' : 'false' }}",
        baseUrl: "{{ config('app.url') }}",
        csrfToken: "{{ csrf_token() }}"
    };

    if (window.APP_CONFIG.isProduction === 'true') {
        console.log = function() {};
        console.error = function() {};
        console.warn = function() {};
        console.info = function() {};
    }
</script>

<script src="{{ asset('assets/js/custom/help-ai.js') }}"></script>
@endsection