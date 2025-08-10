<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="manifest.json" />
    <title>Chat dengan AI - Code Verse</title>
    <link href="style.css" rel="stylesheet">
</head>
<body class="">
    <div class="container h-screen dark:text-white flex flex-col justify-between">
        <!-- Header -->
        <div class="flex justify-between items-center bg-p2 px-6 py-8">
            <div class="flex justify-start items-center gap-4">
                <a href="/home" class="border border-color16 p-1.5 rounded-full flex justify-center items-center dark:border-bgColor16 dark:bg-bgColor14 bg-white">
                    <i class="ph ph-caret-left"></i>
                </a>
                <div class="relative border-2 border-p1 p-1 rounded-full">
                    <img src="assets/images/user-img-1.png" alt="" class="size-10 rounded-full bg-color8" />
                    <div class="bg-white p-0.5 rounded-full absolute -right-1.5 bottom-1">
                        <div class="size-3 rounded-full bg-p3"></div>
                    </div>
                </div>
                <div class="text-white">
                    <p class="text-2xl font-semibold">Zizi AI</p>
                    <p class="text-xs font-semibold">Asisten Belajar Digital</p>
                </div>
            </div>
            <div class="flex justify-center items-center p-2 rounded-full border-color24 border bg-color24 text-white">
                <i class="ph ph-dots-three-vertical"></i>
            </div>
        </div>

        <!-- Chat Container -->
        <div class="relative h-full flex justify-end flex-col items-start pb-24 bg-bgColor1 dark:bg-color1" style="background-image: url('assets/images/bg-image.png')">
            
            <!-- Date Divider -->
            <div class="flex justify-center items-center w-full pb-8">
                <p class="text-xs font-semibold bg-white dark:bg-color9 dark:border-color24 py-2 px-8 border border-color21 rounded-full" id="chatDate">
                    Hari ini
                </p>
            </div>

            <!-- Messages Container -->
            <div class="flex flex-col gap-8" id="messagesContainer">
                
                <!-- Welcome Message -->
                <div class="flex justify-start items-start gap-3 w-full px-6" id="welcomeMessage">
                    <div class="flex flex-col justify-center items-center shrink-0">
                        <div class="relative border-2 border-p1 p-1 rounded-full">
                            <img src="assets/images/user-img-1.png" alt="" class="size-9 rounded-full bg-color8" />
                            <div class="bg-white p-0.5 rounded-full absolute -right-1.5 bottom-1">
                                <div class="size-3 rounded-full bg-p3"></div>
                            </div>
                        </div>
                        <p class="text-xs text-color5 pt-1" id="welcomeTime"></p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="flex justify-start items-center gap-2">
                            <p class="text-white p-4 bg-p2 dark:bg-p1 rounded-r-2xl rounded-bl-2xl text-xs max-w-[280px]">
                                Hai! 👋 Saya Zizi AI, asisten belajar digital kamu.
                            </p>
                        </div>
                        <div class="flex justify-start items-center gap-2">
                            <p class="text-white p-4 bg-p2 dark:bg-p1 rounded-r-2xl rounded-bl-2xl text-xs max-w-[280px]">
                                Apa yang bisa saya bantu hari ini? Pilih salah satu atau tanyakan langsung:
                            </p>
                        </div>
                        
                        <!-- Quick Action Buttons -->
                        <div class="grid grid-cols-2 gap-2 max-w-[280px] px-4">
                            <button onclick="quickAsk('Tips belajar coding')" class="bg-white dark:bg-color9 text-color5 dark:text-white px-3 py-2 rounded-lg text-xs font-medium border border-color21 hover:bg-gray-50">
                                📚 Tips Belajar
                            </button>
                            <button onclick="quickAsk('Motivasi belajar')" class="bg-white dark:bg-color9 text-color5 dark:text-white px-3 py-2 rounded-lg text-xs font-medium border border-color21 hover:bg-gray-50">
                                💪 Motivasi
                            </button>
                            <button onclick="quickAsk('Buat jadwal belajar')" class="bg-white dark:bg-color9 text-color5 dark:text-white px-3 py-2 rounded-lg text-xs font-medium border border-color21 hover:bg-gray-50">
                                📅 Jadwal
                            </button>
                            <button onclick="quickAsk('Rangkum materi')" class="bg-white dark:bg-color9 text-color5 dark:text-white px-3 py-2 rounded-lg text-xs font-medium border border-color21 hover:bg-gray-50">
                                📝 Rangkuman
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Input Area -->
            <div class="fixed bottom-0 left-0 right-0 z-50">
                <div class="flex justify-between items-center gap-2 px-6 container pb-8">
                    <button class="bg-p1 rounded-full flex justify-center items-center text-white p-2">
                        <i class="ph ph-plus"></i>
                    </button>
                    <button class="text-p1 text-2xl">
                        <i class="ph ph-camera"></i>
                    </button>
                    <button class="text-p1 text-2xl">
                        <i class="ph-fill ph-image"></i>
                    </button>
                    <button class="text-p1 text-2xl" id="voiceBtn">
                        <i class="ph-fill ph-microphone"></i>
                    </button>
                    <div class="flex justify-between items-center bg-white dark:bg-color9 p-3.5 rounded-full w-full border border-color21">
                        <input type="text" id="messageInput" placeholder="Ketik pesan..." class="text-xs placeholder:text-color9 bg-transparent dark:text-white dark:placeholder:text-white outline-none w-full" />
                        <i class="ph ph-smiley text-color5 dark:text-white"></i>
                    </div>
                    <button class="text-white flex justify-center items-center bg-p1 p-3.5 rounded-full text-xl" id="sendBtn">
                        <i class="ph-fill ph-paper-plane-tilt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Configuration Script -->
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

    <!-- Dependencies -->
    <script src="assets/js/main.js"></script>
    
    <!-- Custom AI Chat Script -->
    <script src="{{ asset('assets/js/custom/help-ai-mobile.js') }}"></script>
</body>
</html>