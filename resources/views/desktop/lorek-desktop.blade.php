<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/logo.png"
      type="image/x-icon"
    />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Masuk & Daftar</title>
    <link rel="stylesheet" href="{{ asset('assets/css/logrek.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#2563eb',
                        'primary-dark': '#1d4ed8',
                        'primary-light': '#3b82f6',
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-slate-50 overflow-x-hidden">
    
    <div class="min-h-screen flex">
        
        <!-- kiri Side - Info Panel (Desktop Only) -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-primary to-primary-dark flex-col justify-center items-center p-12 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-72 h-72 bg-white rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-72 h-72 bg-white rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000"></div>
            </div>
            
            <div class="max-w-lg text-center relative z-10">
                
                <!--  BISA DI PAKAI KALAU MEMBUTUHKAN
                <div class="flex gap-3 mb-16 justify-center">
                    <button onclick="showLogin()" 
                            class="toggle-btn px-6 py-3 rounded-xl text-white font-semibold transition-all duration-300 backdrop-blur-sm" 
                            id="loginToggle">
                        <div class="flex items-center gap-2">
                            <i class="ph ph-sign-in text-lg"></i>
                            <span>Masuk</span>
                        </div>
                    </button>
                    <button onclick="showRegister()" 
                            class="toggle-btn px-6 py-3 rounded-xl text-white/70 font-semibold transition-all duration-300 hover:bg-white/10 backdrop-blur-sm" 
                            id="registerToggle">
                        <div class="flex items-center gap-2">
                            <i class="ph ph-user-plus text-lg"></i>
                            <span>Daftar</span>
                        </div>
                    </button>
                </div> -->
                
                <!-- Main Icon -->
                <div class="w-24 h-24 mx-auto mb-8 rounded-2xl bg-white/20 backdrop-blur-sm p-6 shadow-lg">
                    <i class="ph ph-graduation-cap w-full h-full text-white text-4xl flex items-center justify-center" id="mainIcon"></i>
                </div>
                
                <!-- Main Content -->
                <div class="mb-12">
                    <h1 class="text-4xl font-bold mb-6 text-white drop-shadow-sm" id="mainTitle">
                        Udah siap belajar lagi?
                    </h1>
                    <p class="text-lg text-white/90 leading-relaxed" id="mainDescription">
                        Login dulu biar bisa lanjut ngulik bareng!
                    </p>
                </div>
                
                <!-- ICON -->
                <div class="flex justify-center gap-8 text-white/80">
                    <div class="text-center group">
                        <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center group-hover:bg-white/25 transition-all duration-300">
                            <i class="ph ph-graduation-cap text-xl"></i>
                        </div>
                        <span class="text-sm font-medium">Pembelajaran</span>
                    </div>
                    <div class="text-center group">
                        <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center group-hover:bg-white/25 transition-all duration-300">
                            <i class="ph ph-users text-xl"></i>
                        </div>
                        <span class="text-sm font-medium">Komunitas</span>
                    </div>
                    <div class="text-center group">
                        <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center group-hover:bg-white/25 transition-all duration-300">
                            <i class="ph ph-trophy text-xl"></i>
                        </div>
                        <span class="text-sm font-medium">Pencapaian</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side kanan- Forms Container -->
        <div class="w-full lg:w-1/2 relative bg-white flex flex-col">
            
            <!-- Mobile Header -->
            <div class="lg:hidden flex items-center justify-between p-6 bg-gradient-to-r from-primary to-primary-dark shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <i class="ph ph-graduation-cap text-white text-xl"></i>
                    </div>
                    <h1 class="text-xl font-bold text-white">CodeVerse</h1>
                </div>
                
                <div class="flex gap-2">
                    <button onclick="showLogin()" 
                            class="mobile-toggle px-4 py-2 rounded-lg text-sm font-semibold text-white transition-all duration-300" 
                            id="mobileLoginToggle">
                        Masuk
                    </button>
                    <button onclick="showRegister()" 
                            class="mobile-toggle px-4 py-2 rounded-lg text-sm font-semibold text-white/70 transition-all duration-300" 
                            id="mobileRegisterToggle">
                        Daftar
                    </button>
                    <button onclick="showLupaPw()" 
                            class="mobile-toggle px-4 py-2 rounded-lg text-sm font-semibold text-white/70 transition-all duration-300" 
                            id="mobileRegisterToggle">
                        Kirim OTP
                    </button>
                    <button onclick="showCreatePW()" 
                            class="mobile-toggle px-4 py-2 rounded-lg text-sm font-semibold text-white/70 transition-all duration-300" 
                            id="mobileRegisterToggle">
                        Konfirmasi
                    </button>
                </div>
            </div>

            <!-- Forms Container with Fixed Height -->
            <div class="flex-1 relative overflow-hidden">
                <div class="sliding-panel absolute inset-0 h-full flex" id="slidingPanel">
                    
                    <!-- LOGIN PANEL -->
                    <div class="panel-item flex items-center justify-center p-6 lg:p-12">
                        <div class="w-full max-w-md space-y-8">
                            
                            <!-- Header -->
                            <div class="flex items-center gap-4 mb-10">
                                <div>
                                    <h2 class="text-3xl font-bold text-gray-900"></h2>
                                    <p class="text-gray-600 text-sm"></p>
                                </div>
                            </div>

                            <!-- Login Faorm -->
                            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                                @csrf
                                
                                <!-- Input hidden untuk deteksi device -->
                                <input type="hidden" name="device" value="desktop">
                                                            
                                <!-- Email Field -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                    <div class="relative">
                                        <input type="email" 
                                               name="email" 
                                               placeholder="contoh@email.com"
                                               class="w-full px-4 py-4 pl-12 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                                               required />
                                        <i class="ph ph-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-xl text-gray-400 transition-colors duration-300"></i>
                                    </div>
                                </div>
                                
                                <!-- Password Field -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                                    <div class="relative">
                                        <input type="password" 
                                               name="password" 
                                               placeholder="Masukkan password"
                                               class="passwordField w-full px-4 py-4 pl-12 pr-12 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                                               required />
                                        <i class="ph ph-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-xl text-gray-400 transition-colors duration-300"></i>
                                        <i class="ph ph-eye-slash passwordShow absolute right-4 top-1/2 transform -translate-y-1/2 text-xl text-gray-400 cursor-pointer hover:text-gray-600 transition-all duration-300 hover:scale-110"></i>
                                    </div>
                                </div>
                                
                                <!-- link lupa Password -->
                                <div class="text-right">
                                    <button onclick="showLupaPw()" 
                                        class="text-primary hover:text-primary-dark font-bold underline ml-1 transition-colors duration-300">
                                        Lupa Password?
                                    </button>
                                </div>
                                <!-- Submit Button -->
                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98]">
                                    <span class="flex items-center justify-center gap-2">
                                        <span>Masuk Sekarang</span>
                                        <i class="ph ph-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                                    </span>
                                </button>
                            </form>

                            <!-- Social Login -->
                            <div class="mt-8">
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="flex-1 h-px bg-gray-300"></div>
                                    <span class="text-gray-600 text-sm px-4 font-medium">Atau masuk dengan</span>
                                    <div class="flex-1 h-px bg-gray-300"></div>
                                </div>
                                
                                <div class="space-y-3">
                                    <button class="flex items-center justify-center gap-3 py-4 bg-white border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 rounded-xl font-semibold text-gray-700 transition-all duration-300 w-full hover:shadow-md">
                                        <img src="{{ asset('assets/images/google.png') }}" alt="Google">
                                        <span>Masuk dengan Google</span>
                                    </button>
                                    
                                </div>
                            </div>

                            <!-- Toggle to Register -->
                            <p class="text-center text-gray-600 mt-8">
                                Belum punya akun?
                                <button onclick="showRegister()" 
                                        class="text-primary hover:text-primary-dark font-bold underline ml-1 transition-colors duration-300">
                                    Klik Disini
                                </button>
                            </p>
                        </div>
                    </div>

                    <!-- REGISTER PANEL -->
                    <div class="panel-item flex items-center justify-center p-6 lg:p-12">
                        <div class="w-full max-w-md">
                            
                            <!-- Header -->
                            <div class="flex items-center gap-4 mb-10">
                                <div>
                                    <h2 class="text-3xl font-bold text-gray-900">Registrasi</h2>
                                    <p class="text-gray-600 text-sm">Isi Data dibawah</p>
                                </div>
                            </div>

                            <!-- Register Form -->
                              <form method="POST" action="{{ route('register') }}" class="space-y-6">
                                     @csrf
                                
                                <div class="space-y-5 max-h-[50vh] lg:max-h-[60vh] overflow-y-auto pr-2 custom-scrollbar">

                                    <!-- Name Field -->
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                        <input type="text" 
                                               name="first_name" 
                                               placeholder="Masukkan nama lengkap"
                                               class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                                               required>
                                    </div>

                                    <!-- Email Field -->
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                        <input type="email" 
                                               name="email" 
                                               placeholder="contoh@email.com"
                                               class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                                               required>
                                    </div>

                                    <!-- Password Field -->
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                                        <input type="password" 
                                               name="password" 
                                               placeholder="Minimal 8 karakter"
                                               class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                                               required>
                                    </div>

                                    <!-- Confirm Password Field -->
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                                        <input type="password" 
                                               name="password_confirmation" 
                                               placeholder="Ulangi password"
                                               class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                                               required>
                                    </div>

                                    <!-- Gender Field -->
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-3">Jenis Kelamin</label>
                                        <div class="flex gap-6">
                                            <label class="flex items-center gap-2 cursor-pointer group">
                                                <input type="radio" 
                                                       name="gender" 
                                                       value="male" 
                                                       class="w-4 h-4 text-primary border-gray-300 focus:ring-primary transition-all duration-300" 
                                                       checked />
                                                <span class="text-gray-700 group-hover:text-primary transition-colors duration-300">Laki-laki</span>
                                            </label>
                                            <label class="flex items-center gap-2 cursor-pointer group">
                                                <input type="radio" 
                                                       name="gender" 
                                                       value="female" 
                                                       class="w-4 h-4 text-primary border-gray-300 focus:ring-primary transition-all duration-300" />
                                                <span class="text-gray-700 group-hover:text-primary transition-colors duration-300">Perempuan</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Role Field -->
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Peran</label>
                                        <select name="role" 
                                                class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-700 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                                                required>
                                            <option value="siswa">Siswa</option>
                                            <option value="pengajar">Pengajar</option>
                                        </select>
                                    </div>

                                     <input type="hidden" name="device" value="desktop">

                                    <!-- Terms Checkbox -->
                                    <div>
                                        <label class="flex items-start gap-3 cursor-pointer group">
                                            <input type="checkbox" 
                                                   name="terms" 
                                                   class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary mt-0.5 transition-all duration-300" 
                                                   required />
                                            <span class="text-sm text-gray-600 group-hover:text-gray-800 transition-colors duration-300">
                                                Saya menyetujui 
                                                <a href="#" class="text-primary hover:text-primary-dark font-semibold transition-colors duration-300">
                                                    Syarat dan Ketentuan
                                                </a>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98]">
                                    <span class="flex items-center justify-center gap-2">
                                        <span>Daftar Sekarang</span>
                                        <i class="ph ph-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                                    </span>
                                </button>
                            </form>

                            <!-- Toggle to Login -->
                            <p class="text-center text-gray-600 mt-8">
                                Sudah punya akun?
                                <button onclick="showLogin()" 
                                        class="text-primary hover:text-primary-dark font-bold underline ml-1 transition-colors duration-300">
                                    Masuk di sini
                                </button>
                            </p>
                        </div>
                    </div>

                    <!-- LUPA PASSWORD PANEL -->
                    <div class="panel-item flex items-center justify-center p-6 lg:p-12">
                            <div class="w-full max-w-md space-y-6">
                                <div class="flex items-center gap-4 mb-10">
                                    <div>
                                        <h2 class="text-3xl font-bold text-gray-900 py-2">Lupa Password</h2>
                                        <p class="text-gray-600 text-sm">Masukkan email untuk reset password</p>
                                    </div>
                                </div>

                                    <!-- Email Field -->
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                        <input type="email"
                                            name="reset_email"
                                            placeholder="email@email.com"
                                            class="w-full px-4 py-4 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300"
                                            required />
                                    </div>

                                    <!-- Submit -->
                                    <button onclick="showOtp()"
                                            class="w-full bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98]">
                                            Kirim Kode OTP
                                    </button>
                                </form>

                                <!-- Kembali ke login -->
                                <p class="text-center text-gray-600 mt-8">
                                    Sudah ingat password?
                                    <button onclick="showLogin()"
                                            class="text-primary hover:text-primary-dark font-bold underline ml-1 transition-colors duration-300">
                                        Masuk di sini
                                    </button>
                                </p>
                            </div>
                    </div>

                    <!-- OTP PANEL -->
                    <div class="panel-item flex items-center justify-center p-6 lg:p-12">
                            <div class="w-full max-w-md space-y-6">
                            
                                <div class="flex items-center gap-4 mb-10">
                                    <div>
                                        <h2 class="text-3xl font-bold text-gray-900">Verifikasi OTP</h2>
                                        <p class="text-gray-600 text-sm">Masukkin 4 digit Kodenya di bawah ya</p>
                                    </div>
                                </div>

                                
                                <form class="space-y-6">
                                    
                                    <div class="flex justify-between gap-4">
                                        <input type="text" maxlength="1"
                                            class="w-1/4 text-center py-4 bg-white border-2 border-gray-200 rounded-xl text-xl font-bold text-gray-700 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10" />
                                        <input type="text" maxlength="1"
                                            class="w-1/4 text-center py-4 bg-white border-2 border-gray-200 rounded-xl text-xl font-bold text-gray-700 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10" />
                                        <input type="text" maxlength="1"
                                            class="w-1/4 text-center py-4 bg-white border-2 border-gray-200 rounded-xl text-xl font-bold text-gray-700 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10" />
                                        <input type="text" maxlength="1"
                                            class="w-1/4 text-center py-4 bg-white border-2 border-gray-200 rounded-xl text-xl font-bold text-gray-700 placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10" />
                                    </div>

                                    
                                    <button type="button" onclick="showCreatePW()"
                                        class="w-full bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98]">
                                        verifikasi
                                    </button>


                                    
                                    <p class="text-center text-gray-600 text-sm">
                                        Belum dapat kode? 
                                        <button type="button" class="text-primary hover:text-primary-dark font-bold underline ml-1">Kirim Ulang</button>
                                    </p>
                                </form>
                            </div>
                    </div> 

                    <!-- PW BARU PANEL -->
                    <div class="panel-item flex items-center justify-center p-6 lg:p-12">
                            <div class="w-full max-w-md space-y-6">
                                
                                <div class="flex items-center gap-4 mb-10">
                                    <div>
                                        <h2 class="text-3xl font-bold text-gray-900">Password Baru</h2>
                                        <p class="text-gray-600 text-sm">Masukkan password baru Anda</p>
                                    </div>
                                </div>

                                
                                <form class="space-y-6">
                                    
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                                        <div class="relative">
                                            <input type="password"
                                                name="new_password"
                                                placeholder="Minimal 8 karakter"
                                                class="passwordField w-full px-4 py-4 pl-12 pr-12 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300"
                                                required />
                                            <i class="ph ph-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-xl text-gray-400"></i>
                                            <i class="ph ph-eye-slash passwordShow absolute right-4 top-1/2 transform -translate-y-1/2 text-xl text-gray-400 cursor-pointer hover:text-gray-600 transition-all duration-300 hover:scale-110"></i>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                                        <div class="relative">
                                            <input type="password"
                                                name="confirm_new_password"
                                                placeholder="Ulangi password baru"
                                                class="confirmPasswordField w-full px-4 py-4 pl-12 pr-12 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300"
                                                required />
                                            <i class="ph ph-lock-key-open absolute left-4 top-1/2 transform -translate-y-1/2 text-xl text-gray-400"></i>
                                            <i class="ph ph-eye-slash confirmPasswordShow absolute right-4 top-1/2 transform -translate-y-1/2 text-xl text-gray-400 cursor-pointer hover:text-gray-600 transition-all duration-300 hover:scale-110"></i>
                                        </div>
                                    </div>

                                    <button type="submit"
                                            class="w-full bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98]">
                                        Konfirmasi Password
                                    </button>

                                    <button onclick="showLogin()" 
                                        class="text-primary hover:text-primary-dark font-bold underline ml-1 transition-colors duration-300">
                                        Kembali Ke Login 
                                    </button>
                                </form>
                            </div>
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/custom/logrek.js') }}"></script>
</body>
</html>

