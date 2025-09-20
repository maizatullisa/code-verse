<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <meta name="csrf-token" content="{{ csrf_token() }}">  
    <link
      rel="shortcut icon"
      href="assets/images/logo.png"
      type="image/x-icon"
    />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sf': ['-apple-system', 'BlinkMacSystemFont', 'San Francisco', 'Helvetica Neue', 'sans-serif'],
                    },
                    backdropBlur: {
                        'xs': '2px',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        .glass-effect {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .ios-shadow {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08), 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12), 0 2px 6px rgba(0, 0, 0, 0.08);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .soft-gradient {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 font-['Inter'] antialiased w-screen h-screen overflow-hidden">
    <div class="flex h-full">
        @include('admin.layouts.sidebar-admin')

        <div class="flex-1 flex flex-col h-full">
            @include('admin.layouts.navbar-admin')

            <main class="flex-1 overflow-y-auto px-6 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>