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
  <style>
    * {
      box-sizing: border-box;
    }
    
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }

    .layout-container {
      display: flex;
      min-height: 100vh;
      width: 100%;
    }

    .sidebar-fixed {
      width: 280px;
      min-height: 100vh;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-right: 1px solid rgba(226, 232, 240, 0.8);
      box-shadow: 4px 0 20px rgba(0, 0, 0, 0.08);
      position: fixed;
      left: 0;
      top: 0;
      z-index: 1000;
    }

    .main-wrapper {
      flex: 1;
      margin-left: 280px;
      min-height: 100vh;
      width: calc(100% - 280px);
    }

    .nav-item {
      display: flex;
      align-items: center;
      padding: 16px 20px;
      margin: 8px 16px;
      border-radius: 16px;
      text-decoration: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      color: #374151;
    }

    .nav-item:hover {
      background: rgba(59, 130, 246, 0.1);
      transform: translateX(4px);
      color: #1f2937;
    }

    .nav-item.active {
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      color: white;
      box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    }

    .nav-item.active .nav-icon {
      background: rgba(255, 255, 255, 0.2);
      color: white;
    }

    .nav-icon {
      width: 40px;
      height: 40px;
      border-radius: 12px;
      background: #f1f5f9;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 16px;
      transition: all 0.3s ease;
      color: #6b7280;
    }

    .nav-item:hover .nav-icon {
      background: rgba(59, 130, 246, 0.15);
      color: #3b82f6;
    }

    .brand-section {
      padding: 32px 24px;
      border-bottom: 1px solid rgba(226, 232, 240, 0.8);
      margin-bottom: 20px;
    }

    .brand-icon {
      width: 48px;
      height: 48px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .nav-text {
      font-weight: 600;
      font-size: 16px;
    }

    .nav-item.active .nav-text {
      color: white;
    }

        @media (max-width: 1024px) {
      .sidebar-fixed {
        width: 260px;
      }

      .main-wrapper {
        margin-left: 260px;
        width: calc(100% - 260px);
      }
    }

    @media (max-width: 768px) {
      .sidebar-fixed {
        width: 260px;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1000;
        transform: none !important;
      }

      .main-wrapper {
        margin-left: 260px;
        width: calc(100% - 260px);
      }
    }

  </style>
</head>
<body>
  <div class="layout-container">
    <!-- Sidebar -->
    <aside class="sidebar-fixed">
      <div class="brand-section">
        <div style="display: flex; align-items: center; gap: 16px;">
          <div class="brand-icon">
            <i class="ph ph-code text-white text-2xl"></i>
          </div>
          <div>
            <h2 style="font-size: 24px; font-weight: bold; color: #1e293b; margin: 0;">Code-Verse</h2>
            <p style="font-size: 14px; color: #64748b; margin: 4px 0 0 0; font-weight: 500;">Teacher Portal</p>
          </div>
        </div>
      </div>

      <nav style="padding: 0 0 32px 0;">
        <a href="{{ url('pengajar/dashboard') }}"
        {{--<a href="{{ route('pengajar/dashboard') }}"--}}
           class="nav-item @if(request()->is('pengajar/dashboard')) active @endif">
          <div class="nav-icon">
            <i class="ph ph-house text-lg"></i>
          </div>
          <span class="nav-text">Dashboard</span>
        </a>

        <a href="{{ url('/pengajar/kelas') }}"
        {{--<a href="{{ route('pengajar.materi.index') }}"--}}
         {{-- class="nav-item @if(request()->is('pengajar/materi*')) active @endif">--}}
          class="nav-item @if(request()->is('/pengajar/kelas')) active @endif">
          <div class="nav-icon">
            <i class="ph ph-book-open text-lg"></i>
          </div>
          <span class="nav-text">Kelas</span>
        </a>

        <a href="/pengajar/siswa" 
           class="nav-item @if(request()->is('pengajar/siswa*')) active @endif">
          <div class="nav-icon">
            <i class="ph ph-user-circle text-lg"></i>
          </div>
          <span class="nav-text">Siswa</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-wrapper">
      @yield('content')
    </main>
  </div>

  <script src="/assets/js/main.js"></script>
  <script defer src="/index.js"></script>
  <script>
    // Mobile menu toggle
    function toggleSidebar() {
      const sidebar = document.querySelector('.sidebar-fixed');
      sidebar.classList.toggle('mobile-active');
    }
    
    // Add mobile menu button if needed
    if (window.innerWidth <= 768) {
      // You can add mobile menu button logic here
    }
  </script>
</body>
</html>