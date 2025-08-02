<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maze Escape - Chase & Combat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/games/glitch.css') }}">
</head>
<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900 min-h-screen text-white">
    <div class="container mx-auto p-4">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl lg:text-4xl font-bold mb-2 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                🏃‍♂️ Maze Escape
            </h1>
            <p class="text-gray-300 text-sm lg:text-base">Kabur dari labirin sambil melawan musuh!</p>
        </div>

        <!-- Game Stats -->
        <div class="flex flex-wrap justify-center gap-4 mb-6">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-3 text-center min-w-[80px]">
                <div class="text-xl lg:text-2xl font-bold text-yellow-400" id="score">0</div>
                <div class="text-xs text-gray-300">Score</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-3 text-center min-w-[80px]">
                <div class="text-xl lg:text-2xl font-bold" id="timer">60</div>
                <div class="text-xs text-gray-300">Waktu</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-3 text-center min-w-[80px]">
                <div class="text-xl lg:text-2xl font-bold text-green-400" id="level">1</div>
                <div class="text-xs text-gray-300">Level</div>
            </div>
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-3 text-center min-w-[80px]">
                <div class="text-xl lg:text-2xl font-bold text-red-400" id="enemies-defeated">0</div>
                <div class="text-xs text-gray-300">Musuh</div>
            </div>
        </div>

        <!-- Health Bar -->
        <div class="max-w-md mx-auto mb-4">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-3">
                <div class="flex justify-between text-sm mb-2">
                    <span>❤️ Health</span>
                    <span id="health-text">100/100</span>
                </div>
                <div class="bg-gray-700 rounded-full h-3 overflow-hidden">
                    <div id="health-bar" class="health-bar bg-gradient-to-r from-green-500 to-red-500 h-full" style="width: 100%"></div>
                </div>
            </div>
        </div>

        <!-- Game Board -->
        <div class="flex justify-center mb-6">
            <div id="game-board" class="game-board"></div>
        </div>

        <!-- Controls -->
        <div class="max-w-md mx-auto mb-6">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-4">
                <h3 class="text-lg font-semibold mb-3 text-center">🎮 Kontrol</h3>
                <div class="grid grid-cols-3 gap-2 max-w-[150px] mx-auto mb-4">
                    <div></div>
                    <button id="btn-up" class="bg-blue-600 hover:bg-blue-700 p-2 rounded text-sm font-bold">↑</button>
                    <div></div>
                    <button id="btn-left" class="bg-blue-600 hover:bg-blue-700 p-2 rounded text-sm font-bold">←</button>
                    <button id="btn-attack" class="bg-red-600 hover:bg-red-700 p-2 rounded text-xs font-bold">⚔️</button>
                    <button id="btn-right" class="bg-blue-600 hover:bg-blue-700 p-2 rounded text-sm font-bold">→</button>
                    <div></div>
                    <button id="btn-down" class="bg-blue-600 hover:bg-blue-700 p-2 rounded text-sm font-bold">↓</button>
                    <div></div>
                </div>
                <div class="text-xs text-gray-300 text-center">
                    <p>WASD atau tombol untuk bergerak</p>
                    <p>SPACE atau ⚔️ untuk menyerang</p>
                </div>
            </div>
        </div>

        <!-- Game Status -->
        <div id="game-status" class="text-center p-4 rounded-lg mb-4 hidden"></div>

        <!-- Instructions -->
        <div class="max-w-2xl mx-auto">
            <div class="bg-white/5 backdrop-blur-lg rounded-xl p-4">
                <h3 class="text-lg font-semibold mb-3">📋 Cara Bermain</h3>
                <div class="grid md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="mb-2"><span class="text-blue-400">🔵 Player</span> - Karakter Anda</p>
                        <p class="mb-2"><span class="text-green-400">🟢 Exit</span> - Pintu keluar</p>
                        <p class="mb-2"><span class="text-red-400">🔴 Enemy</span> - Musuh yang mengejar</p>
                    </div>
                    <div>
                        <p class="mb-2"><span class="text-yellow-400">🟡 Power-up</span> - Tambah health</p>
                        <p class="mb-2">• Kabur ke pintu keluar sebelum waktu habis</p>
                        <p class="mb-2">• Lawan musuh untuk mendapat poin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Game Over Modal -->
    <div id="game-over-modal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-gradient-to-br from-red-800 to-pink-800 p-6 lg:p-8 rounded-2xl shadow-2xl max-w-md w-full text-center">
            <div class="text-5xl lg:text-6xl mb-4" id="game-over-icon">💀</div>
            <h2 class="text-xl lg:text-2xl font-bold mb-4" id="game-over-title">Game Over!</h2>
            <p class="text-gray-300 mb-4 text-sm lg:text-base" id="game-over-message">Waktu habis atau health habis!</p>
            <div class="bg-black/20 rounded-lg p-3 mb-6">
                <p class="text-yellow-400 font-bold">Final Score: <span id="final-score">0</span></p>
                <p class="text-red-400">Musuh Dikalahkan: <span id="final-enemies">0</span></p>
            </div>
            <button id="restart-game" class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                🔄 Main Lagi
            </button>
        </div>
    </div>

    <!-- Victory Modal -->
    <div id="victory-modal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-gradient-to-br from-green-800 to-blue-800 p-6 lg:p-8 rounded-2xl shadow-2xl max-w-md w-full text-center">
            <div class="text-5xl lg:text-6xl mb-4">🎉</div>
            <h2 class="text-xl lg:text-2xl font-bold mb-4">Level Complete!</h2>
            <p class="text-gray-300 mb-4 text-sm lg:text-base">Anda berhasil kabur dari labirin!</p>
            <div class="bg-black/20 rounded-lg p-3 mb-6">
                <p class="text-yellow-400 font-bold">Bonus Score: <span id="level-bonus">0</span></p>
                <p class="text-green-400">Time Bonus: <span id="time-bonus">0</span></p>
            </div>
            <button id="next-level" class="bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                Level Selanjutnya ➡️
            </button>
        </div>
    </div>

    <script src="{{ asset('assets/js/games/glitch.js') }}"></script>
</body>
</html>