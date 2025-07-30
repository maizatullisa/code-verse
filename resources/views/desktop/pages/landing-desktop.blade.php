<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Code Verse - Interactive Onboarding</title>
  <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            'float-around': 'float-around 20s infinite linear',
            'logo-glow': 'logo-glow 3s ease-in-out infinite alternate',
            'pulse-ring': 'pulse-ring 2s ease-in-out infinite',
            'particle-float': 'particle-float 3s ease-in-out infinite',
          }
        }
      }
    }
  </script>
</head>

<body class="bg-gray-900 text-white overflow-x-hidden min-h-screen">
  <!-- Loading Overlay -->
  <div id="loadingOverlay" class="fixed inset-0 bg-gray-900 z-50 flex items-center justify-center transition-opacity duration-500">
    <div class="w-16 h-16 border-4 border-purple-300 border-t-purple-600 rounded-full spin"></div>
  </div>

  <!-- Custom Cursor -->
  <div id="cursor" class="fixed w-5 h-5 custom-gradient rounded-full pointer-events-none z-50 transition-transform duration-200 mix-blend-difference"></div>

  <!-- Animated Background -->
  <div class="fixed inset-0 z-0 overflow-hidden">
    <div class="absolute inset-0">
      <!-- Floating Shapes -->
      <div class="absolute w-24 h-24 rounded-full opacity-10 top-1/5 left-1/10 float-around" style="background: linear-gradient(45deg, #667eea, #764ba2); animation-delay: 0s;"></div>
      <div class="absolute w-16 h-16 rounded-full opacity-10 top-3/5 right-1/5 float-around" style="background: linear-gradient(45deg, #0ABAC9, #00d4ff); animation-delay: -5s;"></div>
      <div class="absolute w-20 h-20 rounded-full opacity-10 bottom-1/3 left-1/5 float-around" style="background: linear-gradient(45deg, #f093fb, #f5576c); animation-delay: -10s;"></div>
      <div class="absolute w-28 h-28 rounded-full opacity-10 top-1/10 right-1/10 float-around" style="background: linear-gradient(45deg, #4facfe, #00f2fe); animation-delay: -15s;"></div>
    </div>
  </div>

  <!-- Main Container -->
  <div class="relative z-10 min-h-screen flex items-center justify-center p-4 md:p-8">
    <div class="glass rounded-3xl p-6 md:p-12 max-w-4xl w-full relative overflow-hidden shadow-2xl">
      
      <!-- Particles Container -->
      <div id="particles" class="absolute inset-0 pointer-events-none overflow-hidden"></div>

      <!-- Header -->
      <div class="text-center mb-12 relative z-10">
        <div class="w-20 h-20 custom-gradient rounded-2xl flex items-center justify-center mx-auto mb-4 text-3xl text-white logo-glow transform perspective-1000 rotate-x-10">
          <i class="ph ph-code"></i>
        </div>
        <h2 class="text-3xl font-bold custom-gradient-text mb-2">CODE VERSE</h2>
        <p class="text-gray-300">Interactive Learning Experience</p>
      </div>

      <!-- Swiper Container -->
      <div class="swiper onboarding-swiper h-96 mb-8">
        <div class="swiper-wrapper">
          
          <!-- Slide 1 -->
          <div class="swiper-slide flex flex-col items-center justify-center text-center rounded-2xl bg-white bg-opacity-5 transition-all duration-300">
            <div class="w-28 h-28 md:w-32 md:h-32 custom-gradient rounded-3xl flex items-center justify-center text-4xl md:text-5xl text-white mb-8 transform transition-all duration-700 ease-out shine relative overflow-hidden slide-icon">
              <i class="ph ph-hand-waving"></i>
            </div>
            <h1 class="text-2xl md:text-4xl font-bold mb-4 text-white slide-title opacity-0 transform translate-y-5 transition-all duration-800 delay-200">
              Code Verse On <span class="highlight-gradient">Go</span>
            </h1>
            <p class="text-base md:text-lg text-gray-300 max-w-md slide-text opacity-0 transform translate-y-5 transition-all duration-800 delay-400">
              Selamat Datang Para Calon Developer 🙌🏻
            </p>
          </div>
          
          <!-- Slide 2 -->
          <div class="swiper-slide flex flex-col items-center justify-center text-center rounded-2xl bg-white bg-opacity-5 transition-all duration-300">
            <div class="w-28 h-28 md:w-32 md:h-32 custom-gradient rounded-3xl flex items-center justify-center text-4xl md:text-5xl text-white mb-8 transform transition-all duration-700 ease-out shine relative overflow-hidden slide-icon">
              <i class="ph ph-gift"></i>
            </div>
            <h1 class="text-2xl md:text-4xl font-bold mb-4 text-white slide-title opacity-0 transform translate-y-5 transition-all duration-800 delay-200">
              Tahu Engga sih?? Kalau Di <span class="highlight-gradient">CODE VERSE</span> tuh gratis
            </h1>
            <p class="text-base md:text-lg text-gray-300 max-w-md slide-text opacity-0 transform translate-y-5 transition-all duration-800 delay-400">
              Temukan Beberapa Materi dengan gratis
            </p>
          </div>
          
          <!-- Slide 3 -->
          <div class="swiper-slide flex flex-col items-center justify-center text-center rounded-2xl bg-white bg-opacity-5 transition-all duration-300">
            <div class="w-28 h-28 md:w-32 md:h-32 custom-gradient rounded-3xl flex items-center justify-center text-4xl md:text-5xl text-white mb-8 transform transition-all duration-700 ease-out shine relative overflow-hidden slide-icon">
              <i class="ph ph-rocket-launch"></i>
            </div>
            <h1 class="text-2xl md:text-4xl font-bold mb-4 text-white slide-title opacity-0 transform translate-y-5 transition-all duration-800 delay-200">
              Siapp????
            </h1>
            <p class="text-base md:text-lg text-gray-300 max-w-md slide-text opacity-0 transform translate-y-5 transition-all duration-800 delay-400">
              YUKSS KLIK MULAI 🙌🏻
            </p>
          </div>
          
        </div>
      </div>

      <!-- Custom Pagination -->
      <div id="customPagination" class="flex justify-center items-center gap-4 mb-8">
        <div class="pagination-dot w-3 h-3 rounded-full bg-white bg-opacity-30 cursor-pointer transition-all duration-300 relative active" data-slide="0"></div>
        <div class="pagination-dot w-3 h-3 rounded-full bg-white bg-opacity-30 cursor-pointer transition-all duration-300 relative" data-slide="1"></div>
        <div class="pagination-dot w-3 h-3 rounded-full bg-white bg-opacity-30 cursor-pointer transition-all duration-300 relative" data-slide="2"></div>
      </div>

      <!-- Navigation -->
      <div class="flex justify-between items-center">
        <a href="{{ url('/desktop/lorek-desktop') }}" class="skip-btn flex items-center gap-2 px-6 py-3 border border-white border-opacity-30 rounded-full text-white text-opacity-80 font-semibold transition-all duration-300 hover:bg-white hover:bg-opacity-10 hover:border-opacity-50 hover:-translate-x-2">
          <i class="ph ph-skip-forward"></i>
          Lnjut Masuk
        </a>
        <button id="nextBtn" class="w-16 h-16 md:w-18 md:h-18 custom-gradient rounded-full text-white text-xl md:text-2xl flex items-center justify-center transition-all duration-400 hover:scale-110 hover:rotate-6 hover:shadow-2xl relative overflow-hidden">
          <i class="ph ph-arrow-right"></i>
        </button>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/landing.js') }}"></script>
</body>
</html>