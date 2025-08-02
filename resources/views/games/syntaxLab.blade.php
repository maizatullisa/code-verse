<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Code Puzzle Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/games/syntaxLab.css') }}">

</head>
<body class="bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 min-h-screen text-white">
    <div class="container mx-auto p-4 lg:p-6">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl lg:text-4xl font-bold mb-2 bg-gradient-to-r from-yellow-400 to-pink-400 bg-clip-text text-transparent">
                🧩 JavaScript Code Puzzle
            </h1>
            <p class="text-gray-300 text-sm lg:text-base">Susun kode JavaScript dengan urutan yang benar!</p>
        </div>

        <!-- Game Stats -->
        <div class="flex justify-center mb-6">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-4 flex space-x-4 lg:space-x-8">
                <div class="text-center">
                    <div class="text-xl lg:text-2xl font-bold text-yellow-400" id="current-level">1</div>
                    <div class="text-xs lg:text-sm text-gray-300">Level</div>
                </div>
                <div class="text-center">
                    <div class="text-xl lg:text-2xl font-bold text-green-400" id="score">0</div>
                    <div class="text-xs lg:text-sm text-gray-300">Score</div>
                </div>
                <div class="text-center">
                    <div class="text-xl lg:text-2xl font-bold text-blue-400" id="attempts">3</div>
                    <div class="text-xs lg:text-sm text-gray-300">Kesempatan</div>
                </div>
            </div>
        </div>

        <!-- Game Area -->
        <div class="max-w-6xl mx-auto">
            <!-- Level Description -->
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-4 lg:p-6 mb-6">
                <h2 class="text-lg lg:text-xl font-bold mb-2" id="level-title">Level 1: Fungsi Sederhana</h2>
                <p class="text-gray-300 mb-4 text-sm lg:text-base" id="level-description">Susun kode untuk membuat fungsi yang mengembalikan "Hello World!"</p>
                <div class="bg-gray-800 rounded-lg p-3 lg:p-4">
                    <p class="text-xs lg:text-sm text-gray-400 mb-2">Target Output:</p>
                    <code class="text-green-400 text-sm lg:text-base" id="expected-output">Hello World!</code>
                </div>
            </div>

            <!-- Drop Zone (Answer Area) -->
            <div class="bg-white/5 backdrop-blur-lg rounded-xl p-4 lg:p-6 mb-6">
                <h3 class="text-base lg:text-lg font-semibold mb-4 flex items-center">
                    <span class="mr-2">📝</span> Area Jawaban
                </h3>
                <div id="drop-zone" class="drop-zone bg-gray-800/50 rounded-lg p-4 border-2 border-dashed border-gray-500">
                    <p class="text-gray-400 text-center py-8 text-sm lg:text-base" id="drop-hint">
                        Seret blok kode ke sini untuk menyusun jawaban
                    </p>
                </div>
            </div>

            <!-- Code Blocks (Draggable Items) -->
            <div class="bg-white/5 backdrop-blur-lg rounded-xl p-4 lg:p-6 mb-6">
                <h3 class="text-base lg:text-lg font-semibold mb-4 flex items-center">
                    <span class="mr-2">🧩</span> Blok Kode
                </h3>
                <div id="code-blocks" class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                    <!-- Code blocks will be inserted here -->
                </div>
            </div>

            <!-- Control Buttons -->
            <div class="flex flex-wrap justify-center gap-3 mb-6">
                <button id="check-answer" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 px-4 lg:px-6 py-2 lg:py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg text-sm lg:text-base">
                    ✅ Periksa Jawaban
                </button>
                <button id="reset-level" class="bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 px-4 lg:px-6 py-2 lg:py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg text-sm lg:text-base">
                    🔄 Reset
                </button>
                <button id="hint-btn" class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 px-4 lg:px-6 py-2 lg:py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg text-sm lg:text-base">
                    💡 Hint
                </button>
            </div>

            <!-- Result Message -->
            <div id="result-message" class="hidden text-center p-4 rounded-lg mb-6 text-sm lg:text-base"></div>
        </div>
    </div>

    <!-- Victory Modal -->
    <div id="victory-modal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-gradient-to-br from-purple-800 to-blue-800 p-6 lg:p-8 rounded-2xl shadow-2xl max-w-md w-full text-center">
            <div class="text-5xl lg:text-6xl mb-4">🎉</div>
            <h2 class="text-xl lg:text-2xl font-bold mb-4">Selamat!</h2>
            <p class="text-gray-300 mb-6 text-sm lg:text-base" id="victory-message">Anda telah menyelesaikan level ini!</p>
            <button id="next-level" class="bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                Level Selanjutnya ➡️
            </button>
        </div>
    </div>

    <!-- Game Over Modal -->
    <div id="gameover-modal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-gradient-to-br from-red-800 to-pink-800 p-6 lg:p-8 rounded-2xl shadow-2xl max-w-md w-full text-center">
            <div class="text-5xl lg:text-6xl mb-4">💀</div>
            <h2 class="text-xl lg:text-2xl font-bold mb-4">Game Over!</h2>
            <p class="text-gray-300 mb-6 text-sm lg:text-base">Kesempatan habis! Jangan menyerah, coba lagi!</p>
            <button id="restart-game" class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                🔄 Main Lagi
            </button>
        </div>
    </div>

    <script src="{{ asset('assets/js/games/syntaxLab.js') }}"></script>
</body>
</html>