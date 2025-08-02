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
            'float': 'float 6s ease-in-out infinite',
            'glow': 'glow 2s ease-in-out infinite alternate',
            'gradient': 'gradient 15s ease infinite',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-10px)' },
            },
            glow: {
              '0%': { boxShadow: '0 0 20px rgba(79, 70, 229, 0.4)' },
              '100%': { boxShadow: '0 0 40px rgba(79, 70, 229, 0.6)' },
            },
            gradient: {
              '0%, 100%': { backgroundPosition: '0% 50%' },
              '50%': { backgroundPosition: '100% 50%' },
            }
          }
        }
      }
    }
  </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white overflow-x-hidden">
  
  <!-- Background Effects -->
  <div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float" style="animation-delay: 2s;"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-float" style="animation-delay: 4s;"></div>
  </div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 py-16">
    <!-- Header Section -->
    <div class="text-center mb-16">
      <h1 class="text-6xl font-extrabold mb-6 bg-gradient-to-r from-purple-400 via-pink-500 to-indigo-500 bg-clip-text text-transparent animate-gradient bg-300% animate-pulse">
        🎮 Ngoding Capek? Main Aja Dulu!
      </h1>
      <p class="text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed">
        Pilih game yang lo mau, gas otak lo dikit-dikit. Belajar sambil seru-seruan, why not
      </p>
      <div class="mt-8 w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full"></div>
    </div>

    <!-- Games Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

      <!-- Game 1 -->
     <div class="group relative">
        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-600 to-blue-600 rounded-3xl blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
        <a href="{{ url('/games/syntaxLab') }}" 
          class="relative block p-8 bg-gray-900/90 backdrop-blur-sm rounded-3xl shadow-2xl hover:shadow-indigo-500/25 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 border border-gray-700/50">
          
          <div class="text-5xl mb-4 group-hover:animate-bounce">🧩</div>
          <h2 class="text-2xl font-bold text-indigo-400 mb-3 group-hover:text-indigo-300 transition-colors">
            SyntaxLab
          </h2>
          <p class="text-gray-400 leading-relaxed group-hover:text-gray-300 transition-colors">
            Susun potongan kode sampe jalan cuy! Biar kelihatan lo tuh coder beneran, bukan cuma ngoding caption 🤓
          </p>
          
          <div class="mt-6 flex items-center">
            <span class="text-xs font-semibold text-yellow-400 bg-yellow-900/30 px-3 py-1 rounded-full border border-yellow-700/50">
              SEDANG
            </span>
          </div>
          
          <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-2 group-hover:translate-x-0">
            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </div>
        </a>
      </div>

      <!-- Game 2 -->
      <div class="group relative">
        <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-orange-600 rounded-3xl blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
        <a href="{{ url('/games/glitchmaze') }}" 
          class="relative block p-8 bg-gray-900/90 backdrop-blur-sm rounded-3xl shadow-2xl hover:shadow-red-500/25 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 border border-gray-700/50">
          
          <div class="text-5xl mb-4 group-hover:animate-bounce">🐛</div>
          <h2 class="text-2xl font-bold text-red-400 mb-3 group-hover:text-red-300 transition-colors">
            GlitchMaze
          </h2>
          <p class="text-gray-400 leading-relaxed group-hover:text-gray-300 transition-colors">
            Lari dari kejaran NPC, hindari jebakan, dan tunjukin lo jago survive di dunia digital. Siap, gaskeun!
          </p>
          
          <div class="mt-6 flex items-center">
            <span class="text-xs font-semibold text-red-400 bg-red-900/30 px-3 py-1 rounded-full border border-red-700/50">
              SULIT
            </span>
          </div>
          
          <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-2 group-hover:translate-x-0">
            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </div>
        </a>
      </div>

      <!-- Game 3 -->
      <div class="group relative">
        <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-3xl blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
        <a href="{{ url('/games/syntaxShowdown') }}" 
          class="relative block p-8 bg-gray-900/90 backdrop-blur-sm rounded-3xl shadow-2xl hover:shadow-emerald-500/25 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 border border-gray-700/50">
          
          <div class="text-5xl mb-4 group-hover:animate-bounce">🎯</div>
          <h2 class="text-2xl font-bold text-emerald-400 mb-3 group-hover:text-emerald-300 transition-colors">
            Syntax Showdown
          </h2>
          <p class="text-gray-400 leading-relaxed group-hover:text-gray-300 transition-colors">
           Lo pikir ini quiz biasa? Salah besar. Ini medan perang semua bahasa ngoding 😤  
  Kadang dapet soal gampang, kadang dikasih kode kayak mantra hitam. Good luck, warrior 🧠🔥
          </p>
          
          <div class="mt-6 flex items-center">
            <span class="text-xs font-semibold text-emerald-400 bg-emerald-900/30 px-3 py-1 rounded-full border border-emerald-700/50">
              SEDANG
            </span>
          </div>
          
          <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-2 group-hover:translate-x-0">
            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </div>
        </a>
      </div>

      <!-- Game 4 -->
       <div class="group relative">
        <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-glow"></div>
        <a href="{{ url('/games/bird') }}" 
          class="relative block p-8 bg-gray-900/90 backdrop-blur-sm rounded-3xl shadow-2xl hover:shadow-purple-500/25 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 border border-gray-700/50">
          
          <div class="text-5xl mb-4 group-hover:animate-bounce">🐦</div>
          <h2 class="text-2xl font-bold text-purple-400 mb-3 group-hover:text-purple-300 transition-colors">
            FlyBird
          </h2>
          <p class="text-gray-400 leading-relaxed group-hover:text-gray-300 transition-colors">
            Terbangin burung lo sejauh-jauhnya, tapi hati-hati nabrak pipa ya bestie. Jangan sampe malu-maluin 🙃
          </p>
          
          <!-- Skill Level -->
          <div class="mt-6 flex items-center">
            <span class="text-xs font-semibold text-green-400 bg-green-900/30 px-3 py-1 rounded-full border border-green-700/50">
              MUDAH
            </span>
          </div>
          
          <!-- Hover Effect Arrow -->
          <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-2 group-hover:translate-x-0">
            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </div>
        </a>
       </div>
    </div>

    <!-- Footer Section -->
    <div class="text-center mt-20">
      <p class="text-gray-400 text-lg">
        Belajar sih iya, tapi yang fun dong 😎 🚀
      </p>
      <div class="mt-4 flex justify-center space-x-2">
        <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
        <div class="w-2 h-2 bg-pink-500 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
        <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
      </div>
    </div>
  </div>

</body>
</html>