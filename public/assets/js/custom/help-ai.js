 let chatHistory = [];
    let isTyping = false;
    
    const responses = {
        "enggan mengcoding": "bagus anak muda memang sebaiknya jangan ngoding, lebih baik scroll fesnuk!😱😱😱 ",
        
        "tips belajar": "Berikut tips belajar efektif yang terbukti ampuh! 💪\n\n🎯 **Strategi Utama:**\n• **Teknik Pomodoro**: Belajar 25 menit, istirahat 5 menit\n• **Active Recall**: Test diri sendiri tanpa melihat catatan\n• **Spaced Repetition**: Review materi secara berkala\n• **Feynman Technique**: Jelaskan konsep dengan kata-kata sederhana\n\n📝 **Manajemen Waktu:**\n1. Buat jadwal belajar yang realistis\n2. Prioritaskan materi yang sulit\n3. Gunakan deadline untuk motivasi\n4. Jangan lupa break dan me-time\n\n🧠 **Optimasi Otak:**\n• Tidur cukup (7-8 jam)\n• Olahraga teratur\n• Minum air yang cukup\n• Nutrisi seimbang\n\nMau saya buatkan jadwal belajar khusus untuk kamu?",
        
        "kata": "Mengatasi stress belajar itu penting banget! 🌟\n\n😌 **Teknik Relaksasi:**\n• **Breathing Exercise**: Tarik napas 4 detik, tahan 4 detik, buang 4 detik\n• **Progressive Muscle Relaxation**: Tegang dan rilekskan otot secara bertahap\n• **Mindfulness**: Fokus pada momen sekarang\n• **Visualization**: Bayangkan tempat yang tenang\n\n🎵 **Mood Boosters:**\n• Dengarkan musik favorit\n• Olahraga ringan (jalan kaki, yoga)\n• Hobi yang menyenangkan\n• Berbicara dengan teman/keluarga\n\n💪 **Mindset Positif:**\n1. \"Saya bisa belajar dan berkembang\"\n2. \"Kesalahan adalah bagian dari belajar\"\n3. \"Progress kecil tetap progress\"\n4. \"Saya layak mendapat istirahat\"\n\nIngat: Belajar itu perjalanan, bukan sprint! 🏃‍♂️",
        
        "jadwal untuk mengcoding": "waduh jangan buat jadwal lebih baik buka fesnuk",
        
        "rangkum": "Teknik merangkum yang efektif! 📝✨\n\n🔍 **Metode SQ3R:**\n• **Survey**: Scan keseluruhan materi\n• **Question**: Buat pertanyaan dari heading\n• **Read**: Baca detail sambil jawab pertanyaan\n• **Recite**: Ucapkan poin utama tanpa melihat\n• **Review**: Cek ulang dan perbaiki\n\n📋 **Format Rangkuman:**\n1. **Mind Map**: Visual untuk konsep berhubungan\n2. **Outline**: Hierarki informasi terstruktur\n3. **Cornell Notes**: Bagi halaman jadi 3 bagian\n4. **Flashcards**: Untuk definisi dan rumus\n\n💡 **Pro Tips:**\n• Gunakan kata-kata sendiri\n• Highlight dengan warna berbeda per tema\n• Buat akronim untuk daftar panjang\n• Tambahkan contoh konkret\n\nKirimkan materi yang mau dirangkum, nanti saya bantu buatkan!",
        
        "kuis": "Yuk bikin soal latihan yang menantang! 🎯🔥\n\n📚 **Jenis Soal yang Bisa Dibuat:**\n• **Multiple Choice**: Pilihan ganda dengan distractor\n• **True/False**: Benar salah dengan penjelasan\n• **Fill in the Blank**: Isian singkat\n• **Essay**: Uraian untuk pemahaman mendalam\n• **Case Study**: Aplikasi konsep dalam skenario\n\n⚡ **Level Kesulitan:**\n🟢 **Easy**: Recall fakta dasar\n🟡 **Medium**: Aplikasi konsep\n🔴 **Hard**: Analisis dan sintesis\n\n🎲 **Format Khusus:**\n• Quiz Show Style\n• Gamifikasi dengan poin\n• Progressive difficulty\n• Instant feedback\n\nBiar saya buatkan soal yang pas, tolong kasih tau:\n• Mata pelajaran apa?\n• Topik spesifik?\n• Level kesulitan?\n• Berapa soal?\n• Format yang diinginkan?\n\nLet's make learning fun! 🚀"

    };

    function handleKeyPress(event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            sendMessage();
        }
    }

    function sendMessage() {
        const input = document.getElementById('messageInput');
        const message = input.value.trim();
        
        if (!message || isTyping) return;
        
        addMessage(message, 'user');
        input.value = '';
        input.style.height = 'auto';
        
        // Show typing indicator
        showTyping();
        
        // Simulate AI response
        setTimeout(() => {
            hideTyping();
            const response = generateResponse(message);
            addMessage(response, 'ai');
        }, 1500 + Math.random() * 1000);
    }

    function addMessage(message, sender) {
        const chatContainer = document.getElementById('chatContainer');
        const messageDiv = document.createElement('div');
        
        if (sender === 'user') {
            messageDiv.innerHTML = `
                <div class="flex items-start gap-4 mb-6 message-bubble justify-end">
                    <div class="bg-gradient-to-r from-p1 to-p2 rounded-2xl rounded-tr-md p-4 shadow-lg max-w-2xl">
                        <p class="text-white font-medium">${message.replace(/\n/g, '<br>')}</p>
                        <p class="text-xs text-white text-opacity-80 mt-2 text-right">${new Date().toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</p>
                    </div>
                    <div class="bg-gray-200 p-3 rounded-2xl flex-shrink-0">
                        <i class="ph ph-user text-gray-600 text-2xl"></i>
                    </div>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="flex items-start gap-4 mb-6 message-bubble">
                    <div class="bg-p1 p-3 rounded-2xl flex-shrink-0">
                        <i class="ph ph-robot text-white text-2xl"></i>
                    </div>
                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl rounded-tl-md p-5 shadow-lg max-w-2xl border border-blue-100">
                        <div class="text-gray-800 whitespace-pre-line leading-relaxed">${message.replace(/\*\*(.*?)\*\*/g, '<strong class="font-bold text-p1">$1</strong>').replace(/• /g, '<span class="text-p1">•</span> ')}</div>
                        <p class="text-xs text-gray-500 mt-3">${new Date().toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</p>
                    </div>
                </div>
            `;
        }
        
        chatContainer.appendChild(messageDiv);
        chatContainer.scrollTop = chatContainer.scrollHeight;
        
        chatHistory.push({message, sender, timestamp: new Date()});
    }

    function showTyping() {
        isTyping = true;
        const chatContainer = document.getElementById('chatContainer');
        const typingDiv = document.createElement('div');
        typingDiv.id = 'typingIndicator';
        typingDiv.innerHTML = `
            <div class="flex items-start gap-4 mb-6">
                <div class="bg-p1 p-3 rounded-2xl flex-shrink-0">
                    <i class="ph ph-robot text-white text-2xl"></i>
                </div>
                <div class="bg-white rounded-2xl rounded-tl-md p-4 shadow-md border border-gray-200">
                    <div class="flex gap-2 items-center">
                        <div class="flex gap-1">
                            <div class="w-2 h-2 bg-p1 rounded-full typing-indicator"></div>
                            <div class="w-2 h-2 bg-p1 rounded-full typing-indicator" style="animation-delay: 0.2s"></div>
                            <div class="w-2 h-2 bg-p1 rounded-full typing-indicator" style="animation-delay: 0.4s"></div>
                        </div>
                        <span class="text-sm text-gray-500 ml-2">wait, zizi lagi ngetik...</span>
                    </div>
                </div>
            </div>
        `;
        chatContainer.appendChild(typingDiv);
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function hideTyping() {
        isTyping = false;
        const typingIndicator = document.getElementById('typingIndicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
    }

    function generateResponse(message) {
        const lowerMessage = message.toLowerCase();
        
        for (const [key, response] of Object.entries(responses)) {
            if (lowerMessage.includes(key)) {
                return response;
            }
        }
        
        // Default responses with personality
        const defaultResponses = [
            "lo nanya apaan dah?? susah banget males gue!",
            "ngomong apaan sih ngak jelas banget",
            "apasihh di luar konteks banget dah?",
            "dihh"
        ];
        
        return defaultResponses[Math.floor(Math.random() * defaultResponses.length)];
    }

    function quickAsk(question) {
        document.getElementById('messageInput').value = question;
        sendMessage();
    }

    function clearChat() {
        if (confirm('yakin nih di hapuss? 🥺🥺')) {
            document.getElementById('chatContainer').innerHTML = `
                <div class="flex items-start gap-4 mb-6 message-bubble">
                    <div class="bg-p1 p-3 rounded-2xl flex-shrink-0">
                        <i class="ph ph-robot text-white text-2xl"></i>
                    </div>
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl rounded-tl-md p-5 shadow-md max-w-2xl border border-blue-100">
                        <p class="text-gray-800 text-lg">Chat udah di berhisin! ✨</p>
                        <p class="text-gray-600 mt-2">mau tanya apa lu ke zizi? 😊</p>
                    </div>
                </div>
            `;
            chatHistory = [];
        }
    }

    function toggleVoice() {
        const btn = document.getElementById('voiceBtn');
        const icon = btn.querySelector('i');
        
        if (icon.classList.contains('ph-microphone')) {
            icon.className = 'ph ph-stop text-red-500 text-2xl';
            btn.classList.add('bg-red-100', 'border-red-300');
            btn.classList.remove('border-gray-200');
            
            // Simulate voice recording
            setTimeout(() => {
                icon.className = 'ph ph-microphone text-gray-600 text-2xl group-hover:text-p1 transition-colors';
                btn.classList.remove('bg-red-100', 'border-red-300');
                btn.classList.add('border-gray-200');
                
                // Simulate voice input result
                const voiceQuestions = [
                    "Bagaimana cara belajar matematika yang efektif?",
                    "Tips mengingat rumus fisika",
                    "Cara mengatasi rasa malas belajar"
                ];
                const randomQuestion = voiceQuestions[Math.floor(Math.random() * voiceQuestions.length)];
                document.getElementById('messageInput').value = randomQuestion;
            }, 3000);
        }
    }

    // Auto-resize textarea
    document.getElementById('messageInput').addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 128) + 'px';
    });

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('messageInput').focus();
        
        // Add welcome animation
        setTimeout(() => {
            const welcomeMsg = document.querySelector('.message-bubble');
            if (welcomeMsg) {
                welcomeMsg.style.transform = 'translateY(0)';
                welcomeMsg.style.opacity = '1';
            }
        }, 300);
    });