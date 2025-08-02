<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>🐦 Flappy Bird</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'title-pulse': 'titlePulse 3s ease-in-out infinite',
                        'instructions-pulse': 'instructionsPulse 2s ease-in-out infinite',
                        'game-over-appear': 'gameOverAppear 0.5s ease-out',
                        'bg-shift': 'backgroundShift 15s ease-in-out infinite',
                    },
                    keyframes: {
                        titlePulse: {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.1)' }
                        },
                        instructionsPulse: {
                            '0%, 100%': { transform: 'translate(-50%, -50%) scale(1)' },
                            '50%': { transform: 'translate(-50%, -50%) scale(1.05)' }
                        },
                        gameOverAppear: {
                            '0%': { opacity: '0', transform: 'translate(-50%, -50%) scale(0.8)' },
                            '100%': { opacity: '1', transform: 'translate(-50%, -50%) scale(1)' }
                        },
                        backgroundShift: {
                            '0%, 100%': { background: 'linear-gradient(135deg, #1e3c72, #2a5298, #87CEEB)' },
                            '25%': { background: 'linear-gradient(135deg, #ff6b35, #f7931e, #ffeb3b)' },
                            '50%': { background: 'linear-gradient(135deg, #6c5ce7, #a29bfe, #fd79a8)' },
                            '75%': { background: 'linear-gradient(135deg, #00b894, #00cec9, #55efc4)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298, #87CEEB);
            animation: backgroundShift 15s ease-in-out infinite;
        }
        
        @keyframes backgroundShift {
            0%, 100% { background: linear-gradient(135deg, #1e3c72, #2a5298, #87CEEB); }
            25% { background: linear-gradient(135deg, #ff6b35, #f7931e, #ffeb3b); }
            50% { background: linear-gradient(135deg, #6c5ce7, #a29bfe, #fd79a8); }
            75% { background: linear-gradient(135deg, #00b894, #00cec9, #55efc4); }
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen m-0 font-comic overflow-hidden select-none touch-manipulation">
    <div class="relative w-screen h-screen max-w-10xl max-h-screen flex flex-col items-center justify-center p-4">
        
        <!-- Header -->
        <div class="absolute top-3 left-1/2 transform -translate-x-1/2 z-20 text-center">
            <h1 class="text-orange-500 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-2 animate-title-pulse drop-shadow-lg">
                🐦 Flappy Bird
            </h1>
            <div class="text-white text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold bg-black bg-opacity-40 px-4 py-2 rounded-full backdrop-blur-md border-2 border-white border-opacity-20 shadow-lg">
                Skor: <span id="score">0</span>
            </div>
        </div>
        
        <!-- Game Canvas -->
        <canvas id="gameCanvas" 
                class="border-4 border-yellow-800 rounded-2xl shadow-2xl bg-gradient-to-b from-sky-300 to-green-300 w-11/12 h-3/4 max-w-3xl max-h-4xl min-w-80 min-h-96">
        </canvas>
        
        <!-- Instructions -->
        <div id="instructions" 
             class="instructions absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-lg sm:text-xl md:text-2xl lg:text-3xl text-center z-15 bg-black bg-opacity-70 p-6 sm:p-8 rounded-3xl backdrop-blur-lg border-2 border-white border-opacity-30 animate-instructions-pulse shadow-2xl">
            <div class="text-xl sm:text-2xl md:text-3xl lg:text-4xl mb-3">
                🐦 Tap atau Tekan SPACE untuk terbang!
            </div>
            <div class="text-sm sm:text-base md:text-lg lg:text-xl opacity-90">
                Hindari pipa hijau dan raih skor tertinggi!
            </div>
        </div>
        
        <!-- Game Over -->
        <div id="gameOver" 
             class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black bg-opacity-90 text-white p-8 rounded-3xl text-center z-25 border-3 border-orange-500 backdrop-blur-xl shadow-2xl animate-game-over-appear">
            <h2 class="text-red-500 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
                💥 Game Over!
            </h2>
            <div class="text-lg sm:text-xl md:text-2xl lg:text-3xl mb-6">
                Skor Akhir: <span id="finalScore">0</span>
            </div>
            <button onclick="restartGame()" 
                    class="bg-gradient-to-r from-orange-500 to-yellow-500 hover:from-yellow-500 hover:to-orange-500 text-white border-none px-8 py-4 rounded-full text-lg sm:text-xl md:text-2xl font-bold cursor-pointer m-3 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 active:scale-95">
                🔄 Main Lagi
            </button>
        </div>
        
        <!-- Controls Hint -->
        <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 text-white text-sm sm:text-base md:text-lg z-10 bg-black bg-opacity-40 px-6 py-3 rounded-full backdrop-blur-md border border-white border-opacity-20 text-center shadow-lg">
            💻 Desktop: SPACE atau Click | 📱 Mobile: Tap layar
        </div>
    </div>

    <script src="{{ asset('assets/js/games/bird.js') }}"></script>
</body>
</html>