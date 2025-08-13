@extends('desktop.layout.master-desktop')

@section('title', 'Help Zizi - Code Verse')

@section('page-title', 'Hallo Zizi disini')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')

<div class="min-h-screen bg-slate-50">
    <!-- AI Header Card -->
    <div class="bg-white shadow-sm border border-slate-200 rounded-2xl p-8 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-6">
                <div class="bg-slate-100 p-4 rounded-xl">
                    <i class="ph ph-robot text-3xl text-slate-700"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-semibold text-slate-900 mb-2">Zizi AI</h1>
                    <p class="text-slate-600 text-base leading-relaxed max-w-2xl">
                       Halo Aku Zizi aku yang akan temenin kamu belajar...
                       mau tanya apa silahkan tanya yaa
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-3 bg-emerald-50 px-4 py-2 rounded-full border border-emerald-200">
                <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                <span class="text-sm font-medium text-emerald-700">Online</span>
            </div>
        </div>
    </div>

    <!-- Chat Interface -->
    <div class="bg-white shadow-sm border border-slate-200 rounded-2xl p-6">
        <!-- Chat Messages Container -->
        <div class="h-[60vh] overflow-y-auto border border-slate-100 rounded-xl p-6 mb-6 bg-slate-50/30" id="chatContainer">
            <!-- Welcome Message -->
            <!--<div class="flex items-start gap-4 mb-6">
                <div class="bg-slate-200 p-3 rounded-xl flex-shrink-0">
                    <i class="ph ph-robot text-slate-700 text-xl"></i>
                </div>
                <div class="bg-white rounded-xl rounded-tl-md p-6 shadow-sm border border-slate-200 max-w-3xl">
                    <p class="text-slate-800 text-base font-medium mb-4">
                        Hallo! 👋 Saya Zizi AI, asisten belajar digital kamu.
                    </p>
                    <p class="text-slate-600 mb-6 text-sm">
                        Pilih topik yang ingin kamu pelajari atau tanyakan langsung:
                    </p>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        <button onclick="quickAsk('kenapa saya enggan mengcoding')" 
                                class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-2 border border-slate-200">
                            <i class="ph ph-calculator text-slate-600"></i>
                            Enggan Coding
                        </button>
                        <button onclick="quickAsk('Tips belajar coding')" 
                                class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-2 border border-slate-200">
                            <i class="ph ph-lightbulb text-slate-600"></i>
                            Tips Belajar
                        </button>
                        <button onclick="quickAsk('Kata kata hari ini...')" 
                                class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-2 border border-slate-200">
                            <i class="ph ph-heart text-slate-600"></i>
                            Motivasi
                        </button>
                        <button onclick="quickAsk('Buatkan jadwal belajar')" 
                                class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-2 border border-slate-200">
                            <i class="ph ph-calendar text-slate-600"></i>
                            Jadwal
                        </button>
                        <button onclick="quickAsk('Rangkum materi ini')" 
                                class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-2 border border-slate-200">
                            <i class="ph ph-note text-slate-600"></i>
                            Rangkuman
                        </button>
                        <button onclick="quickAsk('Buat soal latihan')" 
                                class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-2 border border-slate-200">
                            <i class="ph ph-question text-slate-600"></i>
                            Kuis
                        </button>
                    </div>
                </div>
            </div> -->
        </div>

        <!-- Input Area -->
        <div class="bg-slate-50 rounded-xl p-5 border border-slate-200">
            <div class="flex items-end gap-4">
                <!-- Voice Button -->
                <button onclick="toggleVoice()" 
                        class="bg-white hover:bg-slate-50 p-4 rounded-xl transition-colors duration-200 border border-slate-200 group" 
                        id="voiceBtn">
                    <i class="ph ph-microphone text-slate-600 text-xl group-hover:text-slate-800 transition-colors"></i>
                </button>
                
                <!-- Message Input -->
                <div class="flex-1 bg-white rounded-xl border border-slate-200 focus-within:border-slate-400 transition-colors duration-200">
                    <textarea 
                        id="messageInput" 
                        placeholder="Tanyakan sesuatu atau ceritakan masalah yang kamu hadapi..." 
                        class="w-full resize-none border-0 focus:outline-none text-slate-800 placeholder-slate-400 p-4 rounded-xl text-base max-h-32"
                        rows="1"
                        onkeydown="handleKeyPress(event)"
                    ></textarea>
                </div>
                
                <!-- Send Button -->
                <button onclick="sendMessage()" 
                        class="bg-slate-800 hover:bg-slate-900 text-white p-4 rounded-xl transition-colors duration-200" 
                        id="sendBtn">
                    <i class="ph ph-paper-plane-right text-xl"></i>
                </button>
            </div>
            
            <!-- Quick Actions -->
            <div class="flex flex-wrap gap-3 mt-4 pt-4 border-t border-slate-200">
                <button onclick="quickAsk('Buat mind map')" 
                        class="text-slate-600 hover:text-slate-800 transition-colors text-sm font-medium flex items-center gap-2 bg-white px-3 py-2 rounded-lg hover:bg-slate-50 border border-slate-200">
                    <i class="ph ph-tree-structure"></i>
                    Mind Map
                </button>
                <button onclick="quickAsk('Teknik pomodoro')" 
                        class="text-slate-600 hover:text-slate-800 transition-colors text-sm font-medium flex items-center gap-2 bg-white px-3 py-2 rounded-lg hover:bg-slate-50 border border-slate-200">
                    <i class="ph ph-timer"></i>
                    Pomodoro
                </button>
                <button onclick="quickAsk('Cara mengingat rumus')" 
                        class="text-slate-600 hover:text-slate-800 transition-colors text-sm font-medium flex items-center gap-2 bg-white px-3 py-2 rounded-lg hover:bg-slate-50 border border-slate-200">
                    <i class="ph ph-brain"></i>
                    Memory Tips
                </button>
                <button onclick="clearChat()" 
                        class="text-slate-600 hover:text-red-600 transition-colors text-sm font-medium flex items-center gap-2 bg-white px-3 py-2 rounded-lg hover:bg-red-50 border border-slate-200 ml-auto">
                    <i class="ph ph-trash"></i>
                    Clear Chat
                </button>
            </div>
        </div>
    </div>

    <!-- AI Features Cards -->
    <div class="grid md:grid-cols-3 gap-6 mt-8">
        <div class="bg-white rounded-xl p-6 border border-slate-200 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-blue-50 p-3 rounded-xl border border-blue-100">
                    <i class="ph ph-chats-circle text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Chat Interaktif</h3>
            </div>
            <p class="text-slate-600 text-sm leading-relaxed">
                Ngobrol santai seperti dengan teman. Tidak ada pertanyaan yang bodoh, 
                semua bisa dibahas dengan nyaman dan mudah dipahami.
            </p>
        </div>

        <div class="bg-white rounded-xl p-6 border border-slate-200 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-emerald-50 p-3 rounded-xl border border-emerald-100">
                    <i class="ph ph-book-open text-emerald-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Materi Lengkap</h3>
            </div>
            <p class="text-slate-600 text-sm leading-relaxed">
                Dari dasar hingga advanced, semua materi tersedia dengan penjelasan 
                yang mudah dipahami dan contoh praktis.
            </p>
        </div>

        <div class="bg-white rounded-xl p-6 border border-slate-200 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-violet-50 p-3 rounded-xl border border-violet-100">
                    <i class="ph ph-target text-violet-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Personal Learning</h3>
            </div>
            <p class="text-slate-600 text-sm leading-relaxed">
                Disesuaikan dengan gaya belajar dan kecepatan kamu. 
                Belajar jadi lebih efektif dan menyenangkan.
            </p>
        </div>
    </div>
</div>

<script>
    window.GEMINI_CONFIG = {
        isProduction: {{ app()->environment('production') ? 'true' : 'false' }},
        baseUrl: "{{ config('app.url') }}",
        csrfToken: "{{ csrf_token() }}"
    };
    
    if (window.GEMINI_CONFIG.isProduction) {
        console.log = function() {};
        console.error = function() {};
    }
</script>
<script src="{{ asset('assets/js/custom/help-ai.js') }}"></script>
@endsection