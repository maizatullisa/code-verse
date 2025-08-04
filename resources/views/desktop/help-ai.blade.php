@extends('desktop.layout.master-desktop')

@section('title', 'Help AI Assistant - Code Verse')

@section('page-title', 'Help AI Assistant')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<style>
    :root {
        --p1: #6366f1;
        --p2: #4f46e5;
        --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .bg-p1 { background-color: var(--p1); }
    .bg-p2 { background-color: var(--p2); }
    .text-p1 { color: var(--p1); }
    
    .gradient-bg {
        background: var(--gradient);
    }
    
    .chat-container {
        height: calc(100vh - 280px);
    }
    
    .message-bubble {
        animation: slideIn 0.3s ease-out;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .typing-indicator {
        animation: pulse 1.5s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }
    
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
</style>

<!-- AI Header Card -->
<div class="gradient-bg text-white p-6 rounded-3xl shadow-xl mb-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <div class="bg-white bg-opacity-20 p-4 rounded-2xl backdrop-blur-sm">
                <i class="ph ph-robot text-4xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold">Zizi AI Assistant</h1>
                <p class="text-white text-opacity-90 text-lg">Yo! 👋 Aku Zizi, AI temen belajarmu yang siap nemenin kamuu ngoding, ngerjain soal, atau sekadar cari semangat. Gasken belajar bareng! 🚀</p>
            </div>
        </div>
        <div class="flex items-center gap-3 bg-white bg-opacity-20 px-4 py-2 rounded-full backdrop-blur-sm">
            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
            <span class="font-semibold">AI Online</span>
        </div>
    </div>
</div>

<!-- Chat Interface -->
<div class="bg-white rounded-3xl shadow-xl p-6 mb-6">
    <!-- Chat Messages Container -->
    <div class="chat-container overflow-y-auto scrollbar-hide border-2 border-gray-100 rounded-2xl p-4 mb-6" id="chatContainer">
        <!-- Welcome Message -->
        <div class="flex items-start gap-4 mb-6 message-bubble">
            <div class="bg-p1 p-3 rounded-2xl flex-shrink-0">
                <i class="ph ph-robot text-white text-2xl"></i>
            </div>
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl rounded-tl-md p-5 shadow-md max-w-2xl border border-blue-100">
                <p class="text-gray-800 text-lg font-medium mb-3">Halo! 👋 Saya zizi AI, asisten belajar digitalmu.</p>
                <p class="text-gray-600 mb-4">Pilih topik yang ingin kamu pelajari atau tanyakan langsung:</p>
                
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    <button onclick="quickAsk('kenapa saya enggan mengcoding')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 flex items-center gap-2">
                        <i class="ph ph-calculator"></i>
                        enggan mengcoding
                    </button>
                    <button onclick="quickAsk('Tips belajar coding')" class="bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 flex items-center gap-2">
                        <i class="ph ph-lightbulb"></i>
                        Tips Belajar
                    </button>
                    <button onclick="quickAsk('Kata kata hari ini...')" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 flex items-center gap-2">
                        <i class="ph ph-heart"></i>
                        kata kata hari ini
                    </button>
                    <button onclick="quickAsk('Buatkan jadwal belajar')" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 flex items-center gap-2">
                        <i class="ph ph-calendar"></i>
                        Jadwal
                    </button>
                    <button onclick="quickAsk('Rangkum materi ini')" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 flex items-center gap-2">
                        <i class="ph ph-note"></i>
                        Rangkuman
                    </button>
                    <button onclick="quickAsk('Buat soal latihan')" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 flex items-center gap-2">
                        <i class="ph ph-question"></i>
                        Kuis
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Input Area -->
    <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-5 border-2 border-gray-100">
        <div class="flex items-end gap-4">
            <!-- Voice Button -->
            <button onclick="toggleVoice()" class="bg-white hover:bg-gray-50 p-4 rounded-2xl transition-all shadow-md border-2 border-gray-200 group" id="voiceBtn">
                <i class="ph ph-microphone text-gray-600 text-2xl group-hover:text-p1 transition-colors"></i>
            </button>
            
            <!-- Message Input -->
            <div class="flex-1 bg-white rounded-2xl border-2 border-gray-200 focus-within:border-p1 transition-colors shadow-md">
                <textarea 
                    id="messageInput" 
                    placeholder="Mau nanya apa nich... (eh nanya apa curhat🫣)" 
                    class="w-full resize-none border-0 focus:outline-none text-gray-800 placeholder-gray-400 p-4 rounded-2xl text-lg max-h-32"
                    rows="1"
                    onkeydown="handleKeyPress(event)"
                ></textarea>
            </div>
            
            <!-- Send Button -->
            <button onclick="sendMessage()" class="bg-p1 hover:bg-p2 text-white p-4 rounded-2xl transition-all shadow-md transform hover:scale-105" id="sendBtn">
                <i class="ph ph-paper-plane-right text-2xl"></i>
            </button>
        </div>
        
        <!-- Quick Actions -->
        <div class="flex flex-wrap gap-3 mt-4 pt-4 border-t border-gray-200">
            <button onclick="quickAsk('Buat mind map')" class="text-gray-600 hover:text-p1 transition-colors text-sm font-medium flex items-center gap-2 bg-white px-3 py-2 rounded-lg hover:bg-gray-50">
                <i class="ph ph-tree-structure"></i>
                Mind Map
            </button>
            <button onclick="quickAsk('Teknik pomodoro')" class="text-gray-600 hover:text-p1 transition-colors text-sm font-medium flex items-center gap-2 bg-white px-3 py-2 rounded-lg hover:bg-gray-50">
                <i class="ph ph-timer"></i>
                Pomodoro
            </button>
            <button onclick="quickAsk('Cara mengingat rumus')" class="text-gray-600 hover:text-p1 transition-colors text-sm font-medium flex items-center gap-2 bg-white px-3 py-2 rounded-lg hover:bg-gray-50">
                <i class="ph ph-brain"></i>
                Memory Tips
            </button>
            <button onclick="clearChat()" class="text-gray-600 hover:text-red-500 transition-colors text-sm font-medium flex items-center gap-2 bg-white px-3 py-2 rounded-lg hover:bg-red-50 ml-auto">
                <i class="ph ph-trash"></i>
                Clear Chat
            </button>
        </div>
    </div>
</div>

<!-- AI Features Cards -->
<div class="grid md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow border border-gray-100">
        <div class="flex items-center gap-4 mb-4">
            <div class="bg-blue-100 p-3 rounded-2xl">
                <i class="ph ph-chats-circle text-blue-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Chat Interaktif</h3>
        </div>
        <p class="text-gray-600">Ngoding gak harus bikin stres. Chat aja kaya lagi curhat ke temen—bedanya, temen lo ini gak bakal nge-judge (eh kadang nge-roast dikit sih, biar lo semangat) 😏💬</p>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow border border-gray-100">
        <div class="flex items-center gap-4 mb-4">
            <div class="bg-green-100 p-3 rounded-2xl">
                <i class="ph ph-book-open text-green-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Materi Lengkap</h3>
        </div>
        <p class="text-gray-600">Gak usah repot Googling sana-sini. Semua materi udah gue siapin dari nol sampe lo bisa bilang: “Ohhh gitu toh cara kerja JS” 🧠🔥</p>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow border border-gray-100">
        <div class="flex items-center gap-4 mb-4">
            <div class="bg-purple-100 p-3 rounded-2xl">
                <i class="ph ph-target text-purple-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Personal Learning</h3>
        </div>
        <p class="text-gray-600">Mau lo tipe yang belajar jam 2 pagi sambil nyemil, atau yang baru buka laptop pas deadline? Gue ngikutin. Belajar santai tapi masuk 🛋️🧃</p>
    </div>
</div>

<script src="{{ asset('assets/js/custom/help-ai.js') }}"></script>
@endsection