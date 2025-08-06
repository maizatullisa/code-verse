class MobileAIChat {
    constructor() {
        this.messagesContainer = document.getElementById('messagesContainer');
        this.messageInput = document.getElementById('messageInput');
        this.sendBtn = document.getElementById('sendBtn');
        this.voiceBtn = document.getElementById('voiceBtn');
        
        this.isTyping = false;
        this.isRecording = false;
        this.chatHistory = [];
        
        console.log('Initializing Mobile AI Chat...');
        console.log('Elements found:', {
            messagesContainer: !!this.messagesContainer,
            messageInput: !!this.messageInput,
            sendBtn: !!this.sendBtn,
            voiceBtn: !!this.voiceBtn
        });
        
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.loadChatHistory();
        console.log('Mobile AI Chat initialized successfully!');
    }

    setupEventListeners() {
        // Send button click
        if (this.sendBtn) {
            this.sendBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                console.log('Send button clicked');
                this.sendMessage();
            });
        }

        // Enter key on input
        if (this.messageInput) {
            this.messageInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    console.log('Enter key pressed');
                    this.sendMessage();
                }
            });
            
            // Focus handler
            this.messageInput.addEventListener('focus', () => {
                console.log('Input focused');
            });
        }

        // Voice button click
        if (this.voiceBtn) {
            this.voiceBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                console.log('Voice button clicked');
                this.toggleVoice();
            });
        }

        console.log('Event listeners setup complete');
    }

    async sendMessage() {
        console.log('sendMessage called');
        
        if (!this.messageInput) {
            console.error('Message input not found');
            return;
        }
        
        const message = this.messageInput.value.trim();
        console.log('Message to send:', message);
        
        if (!message || this.isTyping) {
            console.log('No message or currently typing');
            return;
        }

        // Clear input
        this.messageInput.value = '';
        console.log('Input cleared');

        // Hide welcome message
        this.hideWelcomeMessage();

        // Add user message to chat
        this.addUserMessage(message);

        // Show typing indicator
        this.showTypingIndicator();

        try {
            console.log('Calling Gemini API...');
            const response = await this.callGeminiAPI(message);
            console.log('API response:', response);
            
            // Hide typing indicator
            this.hideTypingIndicator();
            
            // Add AI response
            this.addAIMessage(response);
            
        } catch (error) {
            console.error('Error calling Gemini API:', error);
            this.hideTypingIndicator();
            this.addAIMessage('Maaf, terjadi kesalahan. Silakan coba lagi nanti. 😅');
        }
    }

    async callGeminiAPI(message) {
        const url = '/gemini/ask';
        console.log('Calling API:', url);
        
        const requestBody = {
            message: message,
            context: this.getChatContext()
        };
        console.log('Request body:', requestBody);

        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                'Accept': 'application/json'
            },
            body: JSON.stringify(requestBody)
        });

        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers);

        if (!response.ok) {
            const errorText = await response.text();
            console.error('API Error Response:', errorText);
            throw new Error(`HTTP error! status: ${response.status} - ${errorText}`);
        }

        const data = await response.json();
        console.log('API Response data:', data);
        
        // Fix: Controller return 'message', bukan 'response'
        return data.message || data.response || 'Tidak ada respons dari AI.';
    }

    getChatContext() {
        return this.chatHistory.slice(-5);
    }

    addUserMessage(message) {
        console.log('Adding user message:', message);
        
        const timestamp = new Date().toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });

        const messageHTML = `
            <div class="flex justify-end items-end gap-3 w-full px-6">
                <div class="flex flex-col gap-3">
                    <div class="flex justify-start items-center gap-2">
                        <p class="text-color5 border border-color21 p-4 bg-white dark:bg-color9 dark:text-white rounded-l-2xl rounded-tr-2xl text-xs max-w-[280px]">
                            ${this.escapeHtml(message)}
                        </p>
                    </div>
                </div>
                <div class="">
                    <i class="ph ph-check text-xs p-1 rounded-full bg-p2 dark:bg-p1 text-white"></i>
                </div>
            </div>
        `;

        this.addMessageToChat(messageHTML);
        this.addToHistory('user', message);
        this.scrollToBottom();
    }

    addAIMessage(message) {
        console.log('Adding AI message:', message);
        
        const timestamp = new Date().toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });

        const messageHTML = `
            <div class="flex justify-start items-start gap-3 w-full px-6">
                <div class="flex flex-col justify-center items-center shrink-0">
                    <div class="relative border-2 border-p1 p-1 rounded-full">
                        <img src="assets/images/user-img-1.png" alt="" class="size-9 rounded-full bg-color8" />
                        <div class="bg-white p-0.5 rounded-full absolute -right-1.5 bottom-1">
                            <div class="size-3 rounded-full bg-p3"></div>
                        </div>
                    </div>
                    <p class="text-xs text-color5 pt-1">${timestamp}</p>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="flex justify-start items-center gap-2">
                        <p class="text-white p-4 bg-p2 dark:bg-p1 rounded-r-2xl rounded-bl-2xl text-xs max-w-[280px]">
                            ${this.formatMessage(message)}
                        </p>
                        <button>
                            <i class="ph ph-dots-three-vertical text-p2 dark:text-p1"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;

        this.addMessageToChat(messageHTML);
        this.addToHistory('assistant', message);
        this.scrollToBottom();
    }

    addMessageToChat(messageHTML) {
        if (!this.messagesContainer) {
            console.error('Messages container not found');
            return;
        }
        
        const messageDiv = document.createElement('div');
        messageDiv.innerHTML = messageHTML;
        this.messagesContainer.appendChild(messageDiv.firstElementChild);
        console.log('Message added to chat');
    }

    hideWelcomeMessage() {
        const welcomeMsg = document.getElementById('welcomeMessage');
        if (welcomeMsg) {
            welcomeMsg.style.opacity = '0.5';
            console.log('Welcome message hidden');
        }
    }

    showTypingIndicator() {
        this.isTyping = true;
        console.log('Showing typing indicator');
        
        const typingHTML = `
            <div class="flex justify-start items-start gap-3 w-full px-6" id="typingIndicator">
                <div class="flex flex-col justify-center items-center shrink-0">
                    <div class="relative border-2 border-p1 p-1 rounded-full">
                        <img src="assets/images/user-img-1.png" alt="" class="size-9 rounded-full bg-color8" />
                        <div class="bg-white p-0.5 rounded-full absolute -right-1.5 bottom-1">
                            <div class="size-3 rounded-full bg-p3"></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="flex justify-start items-center gap-2">
                        <div class="bg-p2 dark:bg-p1 p-4 rounded-r-2xl rounded-bl-2xl">
                            <div class="flex items-center gap-1">
                                <div class="w-2 h-2 bg-white rounded-full animate-bounce"></div>
                                <div class="w-2 h-2 bg-white rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                <div class="w-2 h-2 bg-white rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        if (this.messagesContainer) {
            const typingDiv = document.createElement('div');
            typingDiv.innerHTML = typingHTML;
            this.messagesContainer.appendChild(typingDiv.firstElementChild);
            this.scrollToBottom();
        }
    }

    hideTypingIndicator() {
        this.isTyping = false;
        const typingIndicator = document.getElementById('typingIndicator');
        if (typingIndicator) {
            typingIndicator.remove();
            console.log('Typing indicator hidden');
        }
    }

    toggleVoice() {
        console.log('Toggle voice called, isRecording:', this.isRecording);
        
        if (!this.isRecording) {
            this.startVoiceRecording();
        } else {
            this.stopVoiceRecording();
        }
    }

    startVoiceRecording() {
        this.isRecording = true;
        console.log('Voice recording started');
        
        if (this.voiceBtn) {
            this.voiceBtn.classList.add('bg-red-500', 'text-white');
            const icon = this.voiceBtn.querySelector('i');
            if (icon) {
                icon.className = 'ph-fill ph-stop';
            }
        }
        
        // Placeholder - implement actual voice recording here
        setTimeout(() => {
            this.stopVoiceRecording();
            // this.messageInput.value = "Hasil voice recognition akan muncul di sini";
        }, 3000);
    }

    stopVoiceRecording() {
        this.isRecording = false;
        console.log('Voice recording stopped');
        
        if (this.voiceBtn) {
            this.voiceBtn.classList.remove('bg-red-500', 'text-white');
            const icon = this.voiceBtn.querySelector('i');
            if (icon) {
                icon.className = 'ph-fill ph-microphone';
            }
        }
    }

    formatMessage(message) {
        return message
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\*(.*?)\*/g, '<em>$1</em>')
            .replace(/\n/g, '<br>');
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    addToHistory(role, content) {
        this.chatHistory.push({ role, content });
        this.saveChatHistory();
    }

    scrollToBottom() {
        setTimeout(() => {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        }, 100);
    }

    saveChatHistory() {
        try {
            // Ganti localStorage dengan sessionStorage untuk mobile
            sessionStorage.setItem('mobile_ai_chat_history', JSON.stringify(this.chatHistory));
        } catch (error) {
            console.error('Error saving chat history:', error);
        }
    }

    loadChatHistory() {
        try {
            // Ganti localStorage dengan sessionStorage untuk mobile  
            const history = sessionStorage.getItem('mobile_ai_chat_history');
            if (history) {
                this.chatHistory = JSON.parse(history);
                console.log('Chat history loaded:', this.chatHistory.length, 'messages');
            }
        } catch (error) {
            console.error('Error loading chat history:', error);
            this.chatHistory = [];
        }
    }

    clearChat() {
        const userMessages = this.messagesContainer?.querySelectorAll('.flex.justify-start, .flex.justify-end');
        if (userMessages) {
            userMessages.forEach(msg => {
                if (!msg.querySelector('.text-xs.font-semibold')) {
                    msg.remove();
                }
            });
        }
        
        this.chatHistory = [];
        sessionStorage.removeItem('mobile_ai_chat_history');
        
        // Show welcome message again
        const welcomeMsg = document.getElementById('welcomeMessage');
        if (welcomeMsg) {
            welcomeMsg.style.opacity = '1';
        }
        
        console.log('Chat cleared');
    }
}

// Global functions untuk quick actions dan compatibility
window.quickAsk = function(question) {
    console.log('Quick ask called:', question);
    
    if (window.mobileAIChat && window.mobileAIChat.messageInput) {
        window.mobileAIChat.messageInput.value = question;
        window.mobileAIChat.sendMessage();
    } else {
        console.error('Mobile AI Chat not initialized or input not found');
    }
};

window.clearChat = function() {
    if (window.mobileAIChat && confirm('Hapus semua chat?')) {
        window.mobileAIChat.clearChat();
    }
};

// Debug functions
window.testSend = function() {
    if (window.mobileAIChat) {
        window.mobileAIChat.messageInput.value = "Test message";
        window.mobileAIChat.sendMessage();
    }
};

window.debugChat = function() {
    console.log('Chat instance:', window.mobileAIChat);
    console.log('Elements:', {
        messagesContainer: window.mobileAIChat?.messagesContainer,
        messageInput: window.mobileAIChat?.messageInput,
        sendBtn: window.mobileAIChat?.sendBtn,
        voiceBtn: window.mobileAIChat?.voiceBtn
    });
    console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'));
};

// Initialize when DOM loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing Mobile AI Chat...');
    
    // Wait a bit for all elements to be ready
    setTimeout(() => {
        try {
            window.mobileAIChat = new MobileAIChat();
            console.log('Mobile AI Chat instance created');
            
            // Add to global scope for debugging
            window.debugChat();
            
        } catch (error) {
            console.error('Error initializing Mobile AI Chat:', error);
        }
    }, 500);
});

// Backup initialization on window load
window.addEventListener('load', function() {
    if (!window.mobileAIChat) {
        console.log('Backup initialization triggered');
        try {
            window.mobileAIChat = new MobileAIChat();
        } catch (error) {
            console.error('Error in backup initialization:', error);
        }
    }
});