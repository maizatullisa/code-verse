let chatHistory = [];
let isTyping = false;

const SYSTEM_PROMPT = `Kamu adalah Zizi, AI assistant belajar yang santai dan friendly tapi kadang suka nge-roast dikit biar user semangat. Karakteristik lo:

1. Pake bahasa Indonesia gaul dan casual
2. Suka pake emoji yang relevan  
3. Kadang nge-roast dengan cara yang lucu dan motivasi
4. Selalu supportive dan helpful untuk belajar
5. Kalo user nanya di luar konteks belajar, lo bisa agak "males" tapi tetep bantuin
6. Jangan terlalu formal, santai aja kayak temen

Topik utama yang lo handle:
- Coding dan programming
- Tips belajar efektif
- Motivasi dan semangat belajar
- Rangkuman materi
- Bikin kuis dan soal latihan
- Jadwal belajar
- Mindset dan mental health untuk belajar
- Problem solving

Kalo user nanya hal yang ngak related sama belajar, lo bisa agak "ogah" tapi tetep kasih jawaban singkat.`;

async function callGeminiAPI(message) {
    try {
        const url = '/gemini/ask';
        console.log('Calling API:', url);
        console.log('Base URL:', window.APP_CONFIG?.baseUrl);
        
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.APP_CONFIG.csrfToken, 
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                message: message,
                system_prompt: SYSTEM_PROMPT,
                chat_history: chatHistory.slice(-10) 
            })
        });

        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(`HTTP error! status: ${response.status} - ${errorData.message || 'Unknown error'}`);
        }

        const data = await response.json();
        
        if (data.success) {
            return data.message;
        } else {
            throw new Error(data.message || 'API Error');
        }

    } catch (error) {
        console.error('API Error:', error);
    
        const fallbackResponses = [
            "Aduh sorry nih, lagi ada gangguan. Coba tanya lagi deh! 😅",
            "Wah koneksi lagi bermasalah nih. Tunggu sebentar ya! 🔄", 
            "Error nih bro, tapi gue tetep di sini kok. Coba lagi! 💪"
        ];
        
        return fallbackResponses[Math.floor(Math.random() * fallbackResponses.length)];
    }
}

function handleKeyPress(event) {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        sendMessage();
    }
}

async function sendMessage() {
    const input = document.getElementById('messageInput');
    const message = input.value.trim();
    
    if (!message || isTyping) return;
    
    const sendBtn = document.getElementById('sendBtn');
    sendBtn.disabled = true;
    sendBtn.innerHTML = '<i class="ph ph-spinner text-xl animate-spin"></i>';
    
    addMessage(message, 'user');
    input.value = '';
    input.style.height = 'auto';
    
    showTyping();
    
    try {
        const response = await callGeminiAPI(message);
        hideTyping();
        addMessage(response, 'ai');
    } catch (error) {
        hideTyping();
        addMessage('Ups, ada error nih! Coba lagi ya 😅', 'ai');
        console.error('Error:', error);
    } finally {
        sendBtn.disabled = false;
        sendBtn.innerHTML = '<i class="ph ph-paper-plane-right text-xl"></i>';
    }
}

function addMessage(message, sender) {
    const chatContainer = document.getElementById('chatContainer');
    const messageDiv = document.createElement('div');
    
    if (sender === 'user') {
        messageDiv.innerHTML = `
            <div class="flex items-start gap-4 mb-6 message-bubble justify-end">
                <div class="bg-gradient-to-r from-slate-700 to-slate-800 rounded-2xl rounded-tr-md p-4 shadow-lg max-w-2xl">
                    <p class="text-white font-medium">${escapeHtml(message).replace(/\n/g, '<br>')}</p>
                    <p class="text-xs text-white text-opacity-80 mt-2 text-right">${new Date().toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</p>
                </div>
                <div class="bg-gray-200 p-3 rounded-2xl flex-shrink-0">
                    <i class="ph ph-user text-gray-600 text-2xl"></i>
                </div>
            </div>
        `;
    } else {
        const formattedMessage = formatAIMessage(message);

        messageDiv.innerHTML = `
            <div class="flex items-start gap-4 mb-6 message-bubble">
                <div class="bg-slate-800 p-3 rounded-2xl flex-shrink-0">
                    <i class="ph ph-robot text-white text-2xl"></i>
                </div>
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl rounded-tl-md p-5 shadow-lg max-w-2xl border border-blue-100">
                    <div class="text-gray-800 leading-relaxed">${formattedMessage}</div>
                    <p class="text-xs text-gray-500 mt-3">${new Date().toLocaleTimeString('id-ID', {hour: '2-digit', minute: '2-digit'})}</p>
                </div>
            </div>
        `;
    }
    
    chatContainer.appendChild(messageDiv);
    chatContainer.scrollTop = chatContainer.scrollHeight;
    
    chatHistory.push({
        message: message,
        sender: sender,
        timestamp: new Date().toISOString()
    });
}

function formatAIMessage(message) {
    return escapeHtml(message)
        .replace(/\*\*(.*?)\*\*/g, '<strong class="font-bold text-slate-800">$1</strong>')
        .replace(/\*(.*?)\*/g, '<em class="italic text-purple-600">$1</em>')
        .replace(/`(.*?)`/g, '<code class="bg-gray-100 px-2 py-1 rounded text-sm font-mono">$1</code>')
        .replace(/(\d+\.\s)/g, '<span class="font-semibold text-slate-700">$1</span>')
        .replace(/(•\s)/g, '<span class="text-slate-700 font-bold">• </span>')
        .replace(/\n\n/g, '<br><br>')
        .replace(/\n/g, '<br>');
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function showTyping() {
    isTyping = true;
    const chatContainer = document.getElementById('chatContainer');
    const typingDiv = document.createElement('div');
    typingDiv.id = 'typingIndicator';
    typingDiv.innerHTML = `
        <div class="flex items-start gap-4 mb-6">
            <div class="bg-slate-800 p-3 rounded-2xl flex-shrink-0">
                <i class="ph ph-robot text-white text-2xl"></i>
            </div>
            <div class="bg-white rounded-2xl rounded-tl-md p-4 shadow-md border border-gray-200">
                <div class="flex gap-2 items-center">
                    <div class="flex gap-1">
                        <div class="w-2 h-2 bg-slate-800 rounded-full typing-indicator"></div>
                        <div class="w-2 h-2 bg-slate-800 rounded-full typing-indicator" style="animation-delay: 0.2s"></div>
                        <div class="w-2 h-2 bg-slate-800 rounded-full typing-indicator" style="animation-delay: 0.4s"></div>
                    </div>
                    <span class="text-sm text-gray-500 ml-2">Zizi lagi ngetik...</span>
                </div>
            </div>
        </div>
    `;
    
    if (!document.getElementById('typingAnimation')) {
        const style = document.createElement('style');
        style.id = 'typingAnimation';
        style.textContent = `
            @keyframes typing-bounce {
                0%, 60%, 100% { transform: translateY(0); opacity: 0.4; }
                30% { transform: translateY(-10px); opacity: 1; }
            }
            .typing-indicator {
                animation: typing-bounce 1.5s infinite;
            }
        `;
        document.head.appendChild(style);
    }
    
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

function quickAsk(question) {
    document.getElementById('messageInput').value = question;
    sendMessage();
}

function clearChat() {
    if (confirm('Yakin nih mau hapus chat? 🥺')) {
        document.getElementById('chatContainer').innerHTML = `
            <div class="flex items-start gap-4 mb-6 message-bubble">
                <div class="bg-slate-800 p-3 rounded-2xl flex-shrink-0">
                    <i class="ph ph-robot text-white text-2xl"></i>
                </div>
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl rounded-tl-md p-5 shadow-md max-w-2xl border border-blue-100">
                    <p class="text-gray-800 text-lg font-medium mb-3">Halo! 👋 Saya Zizi AI, asisten belajar digitalmu.</p>
                    <p class="text-gray-600 mb-4">Pilih topik yang ingin kamu pelajari atau tanyakan langsung:</p>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        <button onclick="quickAsk('kenapa saya enggan mengcoding')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 flex items-center gap-2">
                            <i class="ph ph-code"></i>
                            Enggan Coding
                        </button>
                        <button onclick="quickAsk('Tips belajar coding')" class="bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 flex items-center gap-2">
                            <i class="ph ph-lightbulb"></i>
                            Tips Belajar
                        </button>
                        <button onclick="quickAsk('Kata kata motivasi hari ini')" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 flex items-center gap-2">
                            <i class="ph ph-heart"></i>
                            Motivasi
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
        `;
        chatHistory = [];
    }
}

document.getElementById('messageInput').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = Math.min(this.scrollHeight, 128) + 'px';
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('messageInput').focus();
    
    setTimeout(() => {
        const welcomeMsg = document.querySelector('.message-bubble');
        if (welcomeMsg) {
            welcomeMsg.style.transform = 'translateY(0)';
            welcomeMsg.style.opacity = '1';
        }
    }, 300);
    
    if (typeof window.APP_CONFIG === 'undefined') {
        console.error('APP_CONFIG not found! Make sure the Blade template loads correctly.');
    }
});

window.addEventListener('error', function(e) {
    console.error('Uncaught error:', e.error);
    hideTyping();
});

window.addEventListener('unhandledrejection', function(e) {
    console.error('Unhandled promise rejection:', e.reason);
    hideTyping();
});