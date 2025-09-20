<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Game</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            'float': 'float 4s ease-in-out infinite',
            'bounce-slow': 'bounce 2s infinite',
            'wiggle': 'wiggle 1s ease-in-out infinite',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-8px)' },
            },
            wiggle: {
              '0%, 100%': { transform: 'rotate(-3deg)' },
              '50%': { transform: 'rotate(3deg)' },
            }
          }
        }
      }
    }
  </script>
</head>
<body class="min-h-screen bg-blue-400 text-white">
  
  <div class="max-w-7xl mx-auto px-6 py-12">
    <!-- Header Section -->
    <div class="text-center mb-16">
      <div class="inline-block p-4 bg-white/20 rounded-full mb-6 backdrop-blur-sm">
        <span class="text-6xl animate-bounce-slow">🎮</span>
      </div>
      <h1 class="text-5xl md:text-6xl font-black mb-6 text-white drop-shadow-lg">
        Ngoding Capek? Main Aja Dulu!
      </h1>
      <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto leading-relaxed font-medium">
        Pilih game yang lo mau, gas otak lo dikit-dikit. Belajar sambil seru-seruan, why not? 🔥
      </p>
      <div class="mt-8 w-32 h-2 bg-white/40 mx-auto rounded-full"></div>
    </div>

    <!-- Games Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

      <!-- Game 1 - SyntaxLab -->
      <div class="group relative transform hover:scale-105 transition-all duration-300">
        <a href="{{ url('/games/syntaxLab') }}" 
          class="block p-8 bg-blue-600 hover:bg-blue-700 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border-4 border-blue-400 hover:border-blue-300">
          
          <div class="text-6xl mb-6 text-center group-hover:animate-wiggle">🧩</div>
          <h2 class="text-3xl font-black text-white mb-4 text-center">
            SyntaxLab
          </h2>
          <p class="text-blue-100 text-lg leading-relaxed text-center font-medium">
            Susun potongan kode sampe jalan cuy! Biar kelihatan lo tuh coder beneran, bukan cuma ngoding caption 🤓
          </p>
          
          <div class="mt-8 flex justify-center">
            <span class="text-sm font-black text-blue-800 bg-yellow-400 px-6 py-2 rounded-full shadow-lg">
              🎯 SEDANG
            </span>
          </div>
          
          <div class="absolute top-6 right-6 bg-white/20 rounded-full p-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </div>
        </a>
      </div>

      <!-- Game 2 - GlitchMaze -->
      <div class="group relative transform hover:scale-105 transition-all duration-300">
        <a href="{{ url('/games/glitchmaze') }}" 
          class="block p-8 bg-red-600 hover:bg-red-700 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border-4 border-red-400 hover:border-red-300">
          
          <div class="text-6xl mb-6 text-center group-hover:animate-wiggle">🐛</div>
          <h2 class="text-3xl font-black text-white mb-4 text-center">
            GlitchMaze
          </h2>
          <p class="text-red-100 text-lg leading-relaxed text-center font-medium">
            Lari dari kejaran NPC, hindari jebakan, dan tunjukin lo jago survive di dunia digital. Siap, gaskeun!
          </p>
          
          <div class="mt-8 flex justify-center">
            <span class="text-sm font-black text-red-800 bg-orange-400 px-6 py-2 rounded-full shadow-lg">
              🔥 SULIT
            </span>
          </div>
          
          <div class="absolute top-6 right-6 bg-white/20 rounded-full p-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </div>
        </a>
      </div>

      <!-- Game 3 - Syntax Showdown -->
      <div class="group relative transform hover:scale-105 transition-all duration-300">
        <a href="{{ url('/games/syntaxShowdown') }}" 
          class="block p-8 bg-green-600 hover:bg-green-700 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border-4 border-green-400 hover:border-green-300">
          
          <div class="text-6xl mb-6 text-center group-hover:animate-wiggle">🎯</div>
          <h2 class="text-3xl font-black text-white mb-4 text-center">
            Syntax Showdown
          </h2>
          <p class="text-green-100 text-lg leading-relaxed text-center font-medium">
            Lo pikir ini quiz biasa? Salah besar. Ini medan perang semua bahasa ngoding 😤 Kadang dapet soal gampang, kadang dikasih kode kayak mantra hitam. Good luck, warrior 🧠🔥
          </p>
          
          <div class="mt-8 flex justify-center">
            <span class="text-sm font-black text-green-800 bg-lime-400 px-6 py-2 rounded-full shadow-lg">
              ⚡ SEDANG
            </span>
          </div>
          
          <div class="absolute top-6 right-6 bg-white/20 rounded-full p-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </div>
        </a>
      </div>

      <!-- Game 4 - FlyBird -->
      <div class="group relative transform hover:scale-105 transition-all duration-300">
        <a href="{{ url('/games/bird') }}" 
          class="block p-8 bg-purple-600 hover:bg-purple-700 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border-4 border-purple-400 hover:border-purple-300">
          
          <div class="text-6xl mb-6 text-center group-hover:animate-float">🐦</div>
          <h2 class="text-3xl font-black text-white mb-4 text-center">
            FlyBird
          </h2>
          <p class="text-purple-100 text-lg leading-relaxed text-center font-medium">
            Terbangin burung lo sejauh-jauhnya, tapi hati-hati nabrak pipa ya bestie. Jangan sampe malu-maluin 🙃
          </p>
          
          <div class="mt-8 flex justify-center">
            <span class="text-sm font-black text-purple-800 bg-pink-400 px-6 py-2 rounded-full shadow-lg">
              🎈 MUDAH
            </span>
          </div>
          
          <div class="absolute top-6 right-6 bg-white/20 rounded-full p-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </div>
        </a>
      </div>
    </div>

    <!-- Footer Section -->
    <div class="text-center mt-20">
      <div class="inline-block p-6 bg-white/20 rounded-3xl backdrop-blur-sm mb-6">
        <p class="text-2xl font-black text-white">
          Belajar sih iya, tapi yang fun dong 😎 🚀
        </p>
      </div>
      
      <div class="flex justify-center space-x-4">
        <div class="w-4 h-4 bg-yellow-400 rounded-full animate-bounce shadow-lg"></div>
        <div class="w-4 h-4 bg-pink-400 rounded-full animate-bounce shadow-lg" style="animation-delay: 0.2s;"></div>
        <div class="w-4 h-4 bg-cyan-400 rounded-full animate-bounce shadow-lg" style="animation-delay: 0.4s;"></div>
        <div class="w-4 h-4 bg-green-400 rounded-full animate-bounce shadow-lg" style="animation-delay: 0.6s;"></div>
      </div>
    </div>
  </div>

</body>
</html>