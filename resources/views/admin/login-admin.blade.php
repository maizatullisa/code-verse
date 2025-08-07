<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeVerse - Admin Portal</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'navy': {
                            50: '#f0f4ff',
                            100: '#e0e9ff',
                            500: '#1e40af',
                            600: '#1d4ed8',
                            700: '#1e3a8a',
                            800: '#1e293b',
                            900: '#0f172a'
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom/loginAdm.css') }}">
</head>
<body class="font-inter login-bg min-h-screen">
    
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="floating-orb w-96 h-96 -top-48 -left-48" style="animation-delay: 0s;"></div>
        <div class="floating-orb w-64 h-64 top-1/4 right-10" style="animation-delay: 7s;"></div>
        <div class="floating-orb w-80 h-80 bottom-10 left-20" style="animation-delay: 14s;"></div>
    </div>

    <div class="min-h-screen flex">
        
        <!-- LEFT SIDE - Brand & Features -->
        <div class="hidden lg:flex lg:w-1/2 flex-col justify-center items-center p-8 text-white relative z-10">
            <div class="max-w-md w-full">
                
                <!-- Brand Section -->
                <div class="text-center mb-10">
                    <div class="brand-logo inline-flex items-center justify-center w-16 h-16 mb-4">
                        <span class="text-2xl font-black">CV</span>
                    </div>
                    <h1 class="text-4xl font-black mb-2 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">CodeVerse</h1>
                    <p class="text-slate-300 text-lg font-semibold">Admin Portal</p>
                    <div class="w-16 h-1 bg-gradient-to-r from-blue-400 to-purple-400 mx-auto mt-3 rounded-full"></div>
                </div>

                <!-- Key Features -->
                <div class="space-y-5 mb-10">
                    <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/5 transition-colors">
                        <div class="w-10 h-10 bg-blue-500 bg-opacity-20 rounded-lg flex items-center justify-center border border-blue-400 border-opacity-30">
                            <i class="ph ph-shield-check text-blue-400 text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-base text-white">Keamanan</h3>
                            <p class="text-slate-300 text-xs">Sistem perlindungan multi-lapis</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/5 transition-colors">
                        <div class="w-10 h-10 bg-purple-500 bg-opacity-20 rounded-lg flex items-center justify-center border border-purple-400 border-opacity-30">
                            <i class="ph ph-chart-line text-purple-400 text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-base text-white">Analisis langsung</h3>
                            <p class="text-slate-300 text-xs">Pemantauan sistem yang komprehensif</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/5 transition-colors">
                        <div class="w-10 h-10 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center border border-green-400 border-opacity-30">
                            <i class="ph ph-users text-green-400 text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-base text-white">Manajemen Pengguna</h3>
                            <p class="text-slate-300 text-xs">Kontrol akses lengkap</p>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-3 text-center">
                    <div class="p-3 rounded-lg bg-white bg-opacity-5 border border-white border-opacity-10 hover:bg-opacity-10 transition-colors">
                        <div class="text-xl font-black text-white mb-1">99.9%</div>
                        <div class="text-slate-400 text-xs font-medium">Waktu aktif</div>
                    </div>
                    <div class="p-3 rounded-lg bg-white bg-opacity-5 border border-white border-opacity-10 hover:bg-opacity-10 transition-colors">
                        <div class="text-xl font-black text-white mb-1">24/7</div>
                        <div class="text-slate-400 text-xs font-medium">Dukungan</div>
                    </div>
                    <div class="p-3 rounded-lg bg-white bg-opacity-5 border border-white border-opacity-10 hover:bg-opacity-10 transition-colors">
                        <div class="text-xl font-black text-white mb-1">256-bit</div>
                        <div class="text-slate-400 text-xs font-medium">Enskripsi</div>
                    </div>
                </div>

            </div>
        </div>

        <!-- RIGHT SIDE - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-4 relative z-10">
            <div class="w-full max-w-md">
                
                <!-- Mobile Brand (visible on small screens only) -->
                <div class="lg:hidden text-center mb-6">
                    <div class="brand-logo inline-flex items-center justify-center w-14 h-14 mb-3">
                        <span class="text-xl font-black">CV</span>
                    </div>
                    <h1 class="text-2xl font-black text-white mb-1">CodeVerse</h1>
                    <p class="text-slate-300">Admin Portal</p>
                </div>
                
                <!-- Login Panel -->
                <div class="glass-panel rounded-2xl p-6 shadow-2xl">
                    
                    <!-- Admin Badge -->
                    <div class="text-center mb-6">
                        <div class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-slate-800 to-slate-700 rounded-full text-white font-bold text-xs shadow-lg">
                            <i class="ph ph-lock-key mr-1.5 text-sm"></i>
                            PORTAL AKSES ADMIN
                        </div>
                    </div>
                    
                    <!-- Step 1: Login Form -->
                    <div id="step1" class="step-transition step-visible">
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-black text-slate-800 mb-1">Selamat Datang Kembali</h2>
                            <p class="text-slate-600 text-sm">Masuk untuk mengakses dasbor Anda</p>
                        </div>

                        <form id="loginForm" class="space-y-4">
                            
                            <!-- Username Field -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold text-slate-700">
                                    Username atau Email
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="ph ph-user text-slate-400 text-sm"></i>
                                    </div>
                                    <input 
                                        type="text" 
                                        id="username"
                                        class="input-field w-full pl-10 pr-3 py-2.5 bg-slate-50 border-2 border-slate-200 rounded-lg text-slate-800 placeholder-slate-500 text-sm focus:outline-none focus:border-blue-500 focus:bg-white transition-all duration-300"
                                        placeholder="Masukkan username atau email"
                                        required
                                    >
                                </div>
                                <div class="text-red-500 text-xs mt-0.5 hidden" id="usernameError"></div>
                            </div>

                            <!-- Password Field -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold text-slate-700">
                                    Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="ph ph-lock text-slate-400 text-sm"></i>
                                    </div>
                                    <input 
                                        type="password" 
                                        id="password"
                                        class="input-field w-full pl-10 pr-10 py-2.5 bg-slate-50 border-2 border-slate-200 rounded-lg text-slate-800 placeholder-slate-500 text-sm focus:outline-none focus:border-blue-500 focus:bg-white transition-all duration-300"
                                        placeholder="Masukkan password"
                                        required
                                    >
                                    <button 
                                        type="button" 
                                        id="togglePassword"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 transition-colors"
                                    >
                                        <i class="ph ph-eye text-sm" id="eyeIcon"></i>
                                    </button>
                                </div>
                                <div class="text-red-500 text-xs mt-0.5 hidden" id="passwordError"></div>
                            </div>

                            <!-- Options -->
                            <div class="flex items-center justify-between text-xs">
                                <label class="flex items-center text-slate-600 cursor-pointer">
                                    <input type="checkbox" class="mr-1.5 w-3.5 h-3.5 text-blue-600 border-2 border-slate-300 rounded focus:ring-blue-500">
                                    <span class="font-medium">Ingatkan Saya</span>
                                </label>
                                <button type="button" id="forgotPasswordBtn" class="text-blue-600 hover:text-blue-700 font-semibold transition-colors">
                                    Lupa Password?
                                </button>
                            </div>

                            <!-- Login Button -->
                            <button 
                                type="submit" 
                                id="loginBtn"
                                class="btn-primary w-full py-2.5 text-white font-bold rounded-lg transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-30 text-sm"
                            >
                                <span id="loginBtnText" class="flex items-center justify-center">
                                    Lanjutkan Verifikasi
                                    <i class="ph ph-arrow-right ml-1.5 text-sm" id="loginBtnIcon"></i>
                                </span>
                            </button>

                        </form>
                    </div>

                    <!-- Step 2: OTP Verification -->
                    <div id="step2" class="step-transition step-hidden">
                        
                        <!-- Back Button -->
                        <button id="backBtn" class="flex items-center text-slate-600 hover:text-blue-600 mb-4 transition-colors font-semibold text-sm">
                            <i class="ph ph-arrow-left mr-1.5 text-sm"></i>
                            Kembali Login
                        </button>

                        <div class="text-center mb-6">
                            <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mx-auto mb-3 shadow-lg">
                                <i class="ph ph-envelope text-white text-xl"></i>
                            </div>
                            <h2 class="text-2xl font-black text-slate-800 mb-2">Verifikasi Identitas Anda</h2>
                            <p class="text-slate-600 text-sm mb-1">Kami telah mengirim kode OTP ke</p>
                            <p class="text-blue-600 font-bold text-sm" id="emailDisplay">admin@codeverse.com</p>
                        </div>

                        <!-- OTP Input -->
                        <div class="mb-4">
                            <label class="block text-xs font-semibold text-slate-700 mb-3 text-center">Masukkan Kode Verifikasi</label>
                            <div class="flex justify-center gap-2 mb-3">
                                <input type="text" maxlength="1" class="w-10 h-10 text-center text-base font-bold bg-slate-50 border-2 border-slate-200 rounded-md focus:border-blue-500 focus:outline-none transition-all duration-300" id="otp1">
                                <input type="text" maxlength="1" class="w-10 h-10 text-center text-base font-bold bg-slate-50 border-2 border-slate-200 rounded-md focus:border-blue-500 focus:outline-none transition-all duration-300" id="otp2">
                                <input type="text" maxlength="1" class="w-10 h-10 text-center text-base font-bold bg-slate-50 border-2 border-slate-200 rounded-md focus:border-blue-500 focus:outline-none transition-all duration-300" id="otp3">
                                <input type="text" maxlength="1" class="w-10 h-10 text-center text-base font-bold bg-slate-50 border-2 border-slate-200 rounded-md focus:border-blue-500 focus:outline-none transition-all duration-300" id="otp4">
                            </div>
                            <div class="text-red-500 text-xs text-center hidden" id="otpError"></div>
                        </div>

                        <!-- Timer & Resend -->
                        <div class="text-center mb-4">
                            <p class="text-slate-600 text-xs mb-1">Masa Berlaku Kode</p>
                            <p class="text-2xl font-black text-slate-800 font-mono" id="countdown">05:00</p>
                            <button id="resendBtn" class="text-blue-600 hover:text-blue-700 text-xs mt-2 font-semibold transition-colors hidden">
                                Kirim ulang kode verifikasi
                            </button>
                        </div>

                        <!-- Verify Button -->
                        <button 
                            id="verifyBtn"
                            class="btn-primary w-full py-2.5 text-white font-bold rounded-lg transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-30 text-sm"
                        >
                            <span id="verifyBtnText" class="flex items-center justify-center">
                                Verifikasi dan Masuk
                                <i class="ph ph-shield-check ml-1.5 text-sm" id="verifyBtnIcon"></i>
                            </span>
                        </button>

                    </div>

                    <!-- Step 3: Forgot Password -->
                    <div id="step3" class="step-transition step-hidden">
                        
                        <!-- Back Button -->
                        <button id="backToLoginBtn" class="flex items-center text-slate-600 hover:text-blue-600 mb-4 transition-colors font-semibold text-sm">
                            <i class="ph ph-arrow-left mr-1.5 text-sm"></i>
                            Kembali ke Login
                        </button>

                        <div class="text-center mb-6">
                            <div class="w-14 h-14 bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mx-auto mb-3 shadow-lg">
                                <i class="ph ph-key text-white text-xl"></i>
                            </div>
                            <h2 class="text-2xl font-black text-slate-800 mb-2">Lupa Password?</h2>
                            <p class="text-slate-600 text-sm">Masukkan email admin Anda dan kami akan mengirimkan link reset password</p>
                        </div>

                        <form id="forgotPasswordForm" class="space-y-4">
                            
                            <!-- Email Field -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold text-slate-700">
                                    Email Admin
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="ph ph-envelope text-slate-400 text-sm"></i>
                                    </div>
                                    <input 
                                        type="email" 
                                        id="resetEmail"
                                        class="input-field w-full pl-10 pr-3 py-2.5 bg-slate-50 border-2 border-slate-200 rounded-lg text-slate-800 placeholder-slate-500 text-sm focus:outline-none focus:border-blue-500 focus:bg-white transition-all duration-300"
                                        placeholder="Masukkan email admin Anda"
                                        required
                                    >
                                </div>
                                <div class="text-red-500 text-xs mt-0.5 hidden" id="resetEmailError"></div>
                            </div>

                            <!-- Reset Button -->
                            <button 
                                type="submit" 
                                id="resetBtn"
                                class="btn-primary w-full py-2.5 text-white font-bold rounded-lg transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-30 text-sm"
                            >
                                <span id="resetBtnText" class="flex items-center justify-center">
                                    Kirim Link Reset Password
                                    <i class="ph ph-paper-plane-tilt ml-1.5 text-sm" id="resetBtnIcon"></i>
                                </span>
                            </button>

                        </form>

                        <!-- Help Info -->
                        <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                            <div class="flex items-start space-x-2">
                                <i class="ph ph-info text-blue-600 text-sm mt-0.5"></i>
                                <div class="text-xs text-blue-800">
                                    <p class="font-semibold mb-1">Butuh bantuan?</p>
                                    <p>Jika Anda tidak memiliki akses ke email admin, hubungi super admin atau IT support untuk bantuan lebih lanjut.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Step 4: Reset Password Sent -->
                    <div id="step4" class="step-transition step-hidden text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="ph ph-check-circle text-white text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-black text-slate-800 mb-2">Email Terkirim!</h2>
                        <p class="text-slate-600 text-sm mb-4">Kami telah mengirimkan link reset password ke email Anda. Silakan cek inbox dan folder spam.</p>
                        
                        <div class="space-y-3">
                            <button 
                                id="backToLoginFromResetBtn"
                                class="w-full py-2.5 text-blue-600 font-bold rounded-lg border-2 border-blue-200 hover:bg-blue-50 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-30 text-sm"
                            >
                                Kembali ke Login
                            </button>
                            
                            <button 
                                id="resendResetBtn"
                                class="w-full py-2.5 text-slate-600 font-semibold rounded-lg hover:text-slate-800 transition-colors text-xs"
                            >
                                Kirim ulang email reset
                            </button>
                        </div>
                    </div>

                    <!-- Step 5: Success -->
                    <div id="step5" class="step-transition step-hidden text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="ph ph-check text-white text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-black text-slate-800 mb-2">Selamat Datang!</h2>
                        <p class="text-slate-600 text-sm mb-4">Login berhasil. Mengalihkan ke dasbor...</p>
                        <div class="w-6 h-6 border-3 border-blue-500 border-t-transparent rounded-full mx-auto animate-spin"></div>
                    </div>

                </div>

                <!-- Footer -->
                <div class="text-center mt-4">
                    <p class="text-slate-300 lg:text-slate-600 text-xs">© 2024 CodeVerse. All rights reserved.</p>
                </div>

            </div>
        </div>

    </div>

    <script src="{{ asset('assets/js/custom/login-admin.js') }}"></script>


</body>
</html>