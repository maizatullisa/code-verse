<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Pengajar</title>
  <link rel="stylesheet" href="/assets/css/swiper.min.css" />
  <link rel="stylesheet" href="/style.css" />
   <link
      rel="shortcut icon"
      href="assets/images/logo.png"
      type="image/x-icon"
    />
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'system': ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif']
          },
          backdropBlur: {
            'xl': '20px'
          }
        }
      }
    }
  </script>
</head>
<body class="font-system bg-gradient-to-br from-slate-50 to-slate-200 m-0 p-0 min-h-screen">
  <div class="flex min-h-screen w-full">
    <!-- Sidebar -->
    <aside class="w-70 min-h-screen bg-slate-900  border-r border-slate-200/80 shadow-2xl fixed left-0 top-0 z-50 lg:w-64 md:w-60">
      <div class="p-8 border-b border-slate-200/80 mb-5">
        <div class="flex items-center gap-4"> 
          <div>
            <h2 class="text-2xl font-bold text-white m-0">Code-Verse</h2>
            <p class="text-sm text-slate-500 mt-1 mb-0 font-medium">Teacher Portal</p>
          </div>
        </div>
      </div>

      <nav class="pb-8">
        <a href="{{ url('pengajar/dashboard') }}"
           class="text-white nav-item flex items-center p-4 mx-4 my-2 rounded-2xl no-underline transition-all duration-300 relative text-gray-600 hover:bg-sky-300  @if(request()->is('pengajar/dashboard')) bg-gradient-to-br from-blue-500 to-blue-700 text-white shadow-lg shadow-blue-500/30 @endif">
          <div class="nav-icon w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center mr-4 transition-all duration-300 text-slate-500 @if(request()->is('pengajar/dashboard')) bg-white/20 text-white @endif">
            <i class="ph ph-house text-lg"></i>
          </div>
          <span class="nav-text font-semibold text-base @if(request()->is('pengajar/dashboard')) text-white @endif">Dashboard</span>
        </a>

        <a href="{{ url('/pengajar/kelas') }}"
          class="text-white nav-item flex items-center p-4 mx-4 my-2 rounded-2xl no-underline transition-all duration-300 relative text-gray-600 hover:bg-sky-300 @if(request()->is('/pengajar/kelas')) bg-gradient-to-br from-blue-500 to-blue-700 text-white shadow-lg shadow-blue-500/30 @endif">
          <div class="nav-icon w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center mr-4 transition-all duration-300 text-slate-500 @if(request()->is('/pengajar/kelas')) bg-white/20 text-white @endif">
            <i class="ph ph-book-open text-lg"></i>
          </div>
          <span class="nav-text font-semibold text-base @if(request()->is('/pengajar/kelas')) text-white @endif">Kelas</span>
        </a>

        <a href="/pengajar/siswa" 
           class="text-white nav-item flex items-center p-4 mx-4 my-2 rounded-2xl no-underline transition-all duration-300 relative text-gray-600 hover:bg-blue-500/10 hover:translate-x-1 hover:text-gray-800 @if(request()->is('pengajar/siswa*')) bg-gradient-to-br from-blue-500 to-blue-700 text-white shadow-lg shadow-blue-500/30 @endif">
          <div class="nav-icon w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center mr-4 transition-all duration-300 text-slate-500 @if(request()->is('pengajar/siswa*')) bg-white/20 text-white @endif">
            <i class="ph ph-user-circle text-lg"></i>
          </div>
          <span class="nav-text font-semibold text-base @if(request()->is('pengajar/siswa')) text-white @endif">Siswa</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-70 min-h-screen w-[calc(100%-280px)] lg:ml-64 lg:w-[calc(100%-256px)] md:ml-60 md:w-[calc(100%-240px)]">
      @yield('content')
    </main>
  </div>

  <script src="/assets/js/main.js"></script>
  <script defer src="/index.js"></script>
  <script>
    // Mobile menu toggle
    function toggleSidebar() {
      const sidebar = document.querySelector('aside');
      sidebar.classList.toggle('mobile-active');
    }
    
    // Add mobile menu button if needed
    if (window.innerWidth <= 768) {
      // You can add mobile menu button logic here
    }

    // Add hover effects for nav items that aren't active
    document.querySelectorAll('.nav-item').forEach(item => {
      const icon = item.querySelector('.nav-icon');
      
      item.addEventListener('mouseenter', () => {
        if (!item.classList.contains('bg-gradient-to-br')) {
          icon.classList.remove('bg-slate-100', 'text-slate-500');
          icon.classList.add('bg-blue-500/15', 'text-blue-500');
        }
      });
      
      item.addEventListener('mouseleave', () => {
        if (!item.classList.contains('bg-gradient-to-br')) {
          icon.classList.remove('bg-blue-500/15', 'text-blue-500');
          icon.classList.add('bg-slate-100', 'text-slate-500');
        }
      });
    });
  </script>

  <style>
    /* Custom width for sidebar */
    .w-70 { width: 280px; }
    .ml-70 { margin-left: 280px; }
    
    /* Smooth transitions for nav items */
    .nav-item {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .nav-icon {
      transition: all 0.3s ease;
    }
  </style>
</body>
</html>