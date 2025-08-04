<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kelas - React JS Fundamental</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'p2': '#3B82F6',
                        'p3': '#8B5CF6'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Progress Header -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-30">
        <div class="max-w-4xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-4">
                    <button onclick="history.back()" class="text-gray-600 hover:text-p2 transition-colors">
                        <i class="ph ph-arrow-left text-xl"></i>
                    </button>
                    <div>
                        <h1 class="font-bold text-lg text-gray-800">Pendaftaran Kelas</h1>
                        <p class="text-sm text-gray-600">React JS Fundamental</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-sm text-gray-600">
                        <span class="font-semibold" id="current-step">1</span> / 3 langkah
                    </div>
                    <div class="w-32 bg-gray-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-p2 to-p3 h-2 rounded-full transition-all duration-500" id="progress-bar" style="width: 33%"></div>
                    </div>
                    <span class="text-sm font-semibold text-p2" id="progress-text">33%</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Form Area -->
            <div class="lg:col-span-2">
                <!-- Step 1: Personal Information -->
                <div class="step-content active" id="step-1">
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="bg-p2 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold">1</div>
                            <div>
                                <h2 class="font-bold text-xl text-gray-800">Informasi Pribadi</h2>
                                <p class="text-gray-600 text-sm">Lengkapi data diri Anda untuk melanjutkan pendaftaran</p>
                            </div>
                        </div>

                        <form id="personal-form" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                                    <input type="text" name="full_name" required 
                                           class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                           placeholder="Masukkan nama lengkap">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                                    <input type="email" name="email" required 
                                           class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                           placeholder="nama@email.com">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp *</label>
                                    <input type="tel" name="whatsapp" required 
                                           class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                           placeholder="+62 812 3456 7890">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir *</label>
                                    <input type="date" name="birth_date" required 
                                           class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir *</label>
                                <select name="education" required 
                                        class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20">
                                    <option value="">Pilih pendidikan terakhir</option>
                                    <option value="SMA/SMK">SMA/SMK</option>
                                    <option value="D3">Diploma 3</option>
                                    <option value="S1">Sarjana (S1)</option>
                                    <option value="S2">Magister (S2)</option>
                                    <option value="S3">Doktor (S3)</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Pengalaman Programming</label>
                                <div class="space-y-3">
                                    <label class="flex items-center gap-3">
                                        <input type="radio" name="experience" value="beginner" class="text-p2 focus:ring-p2">
                                        <span class="text-gray-700">Pemula (belum pernah programming)</span>
                                    </label>
                                    <label class="flex items-center gap-3">
                                        <input type="radio" name="experience" value="basic" class="text-p2 focus:ring-p2">
                                        <span class="text-gray-700">Dasar (pernah belajar HTML/CSS/JS)</span>
                                    </label>
                                    <label class="flex items-center gap-3">
                                        <input type="radio" name="experience" value="intermediate" class="text-p2 focus:ring-p2">
                                        <span class="text-gray-700">Menengah (sudah pernah buat project sederhana)</span>
                                    </label>
                                    <label class="flex items-center gap-3">
                                        <input type="radio" name="experience" value="advanced" class="text-p2 focus:ring-p2">
                                        <span class="text-gray-700">Advanced (sudah bekerja sebagai developer)</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Motivasi Mengikuti Kelas</label>
                                <textarea name="motivation" rows="4" 
                                          class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                          placeholder="Ceritakan motivasi Anda mengikuti kelas React JS ini..."></textarea>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Step 2: Learning Preferences -->
                <div class="step-content hidden" id="step-2">
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="bg-p2 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold">2</div>
                            <div>
                                <h2 class="font-bold text-xl text-gray-800">Preferensi Pembelajaran</h2>
                                <p class="text-gray-600 text-sm">Bantu kami menyesuaikan pengalaman belajar Anda</p>
                            </div>
                        </div>

                        <form id="preferences-form" class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-4">Jadwal Belajar Preferensi *</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="border border-gray-300 rounded-lg p-4 cursor-pointer hover:border-p2 has-[:checked]:border-p2 has-[:checked]:bg-p2/5">
                                        <input type="radio" name="schedule" value="weekday" class="sr-only">
                                        <div class="flex items-center gap-3">
                                            <i class="ph ph-sun text-2xl text-p2"></i>
                                            <div>
                                                <div class="font-semibold text-gray-800">Hari Kerja</div>
                                                <div class="text-sm text-gray-600">Senin - Jumat, siang/sore</div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="border border-gray-300 rounded-lg p-4 cursor-pointer hover:border-p2 has-[:checked]:border-p2 has-[:checked]:bg-p2/5">
                                        <input type="radio" name="schedule" value="weekend" class="sr-only">
                                        <div class="flex items-center gap-3">
                                            <i class="ph ph-calendar text-2xl text-p2"></i>
                                            <div>
                                                <div class="font-semibold text-gray-800">Weekend</div>
                                                <div class="text-sm text-gray-600">Sabtu - Minggu, kapan saja</div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="border border-gray-300 rounded-lg p-4 cursor-pointer hover:border-p2 has-[:checked]:border-p2 has-[:checked]:bg-p2/5">
                                        <input type="radio" name="schedule" value="evening" class="sr-only">
                                        <div class="flex items-center gap-3">
                                            <i class="ph ph-moon text-2xl text-p2"></i>
                                            <div>
                                                <div class="font-semibold text-gray-800">Malam Hari</div>
                                                <div class="text-sm text-gray-600">Setelah jam 19:00</div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="border border-gray-300 rounded-lg p-4 cursor-pointer hover:border-p2 has-[:checked]:border-p2 has-[:checked]:bg-p2/5">
                                        <input type="radio" name="schedule" value="flexible" class="sr-only">
                                        <div class="flex items-center gap-3">
                                            <i class="ph ph-clock text-2xl text-p2"></i>
                                            <div>
                                                <div class="font-semibold text-gray-800">Fleksibel</div>
                                                <div class="text-sm text-gray-600">Kapan saja ada waktu</div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-4">Tipe Pembelajar *</label>
                                <div class="space-y-3">
                                    <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg cursor-pointer hover:border-p2 has-[:checked]:border-p2 has-[:checked]:bg-p2/5">
                                        <input type="radio" name="learning_type" value="visual" class="text-p2 focus:ring-p2">
                                        <i class="ph ph-eye text-xl text-p2"></i>
                                        <div>
                                            <div class="font-semibold text-gray-800">Visual Learner</div>
                                            <div class="text-sm text-gray-600">Lebih suka belajar melalui video dan diagram</div>
                                        </div>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg cursor-pointer hover:border-p2 has-[:checked]:border-p2 has-[:checked]:bg-p2/5">
                                        <input type="radio" name="learning_type" value="hands-on" class="text-p2 focus:ring-p2">
                                        <i class="ph ph-code text-xl text-p2"></i>
                                        <div>
                                            <div class="font-semibold text-gray-800">Hands-on Learner</div>
                                            <div class="text-sm text-gray-600">Belajar sambil praktek coding langsung</div>
                                        </div>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg cursor-pointer hover:border-p2 has-[:checked]:border-p2 has-[:checked]:bg-p2/5">
                                        <input type="radio" name="learning_type" value="reading" class="text-p2 focus:ring-p2">
                                        <i class="ph ph-book text-xl text-p2"></i>
                                        <div>
                                            <div class="font-semibold text-gray-800">Reading Learner</div>
                                            <div class="text-sm text-gray-600">Lebih suka membaca dokumentasi dan artikel</div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-4">Fitur yang Diinginkan</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <label class="flex items-center gap-3">
                                        <input type="checkbox" name="features[]" value="mentoring" class="text-p2 focus:ring-p2 rounded">
                                        <span class="text-gray-700">1:1 Mentoring Session</span>
                                    </label>
                                    <label class="flex items-center gap-3">
                                        <input type="checkbox" name="features[]" value="community" class="text-p2 focus:ring-p2 rounded">
                                        <span class="text-gray-700">Akses Komunitas Eksklusif</span>
                                    </label>
                                    <label class="flex items-center gap-3">
                                        <input type="checkbox" name="features[]" value="projects" class="text-p2 focus:ring-p2 rounded">
                                        <span class="text-gray-700">Project-based Learning</span>
                                    </label>
                                    <label class="flex items-center gap-3">
                                        <input type="checkbox" name="features[]" value="certificate" class="text-p2 focus:ring-p2 rounded">
                                        <span class="text-gray-700">Sertifikat Resmi</span>
                                    </label>
                                    <label class="flex items-center gap-3">
                                        <input type="checkbox" name="features[]" value="job_support" class="text-p2 focus:ring-p2 rounded">
                                        <span class="text-gray-700">Job Placement Support</span>
                                    </label>
                                    <label class="flex items-center gap-3">
                                        <input type="checkbox" name="features[]" value="lifetime" class="text-p2 focus:ring-p2 rounded">
                                        <span class="text-gray-700">Akses Seumur Hidup</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Target Setelah Menyelesaikan Kelas</label>
                                <textarea name="goals" rows="3" 
                                          class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                          placeholder="Contoh: Ingin bekerja sebagai Frontend Developer, membuat startup sendiri, dll..."></textarea>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Step 3: Konfirmasi & Daftar Gratis -->
                <div class="step-content hidden" id="step-3">
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="bg-p2 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold">3</div>
                            <div>
                                <h2 class="font-bold text-xl text-gray-800">Konfirmasi Pendaftaran</h2>
                                <p class="text-gray-600 text-sm">Kelas ini GRATIS! Konfirmasi data Anda untuk menyelesaikan pendaftaran</p>
                            </div>
                        </div>

                        <!-- Special Offer Banner -->
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl p-4 mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="ph ph-gift text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-green-800">Kelas Gratis Terbatas!</h3>
                                    <p class="text-green-700 text-sm">Anda mendapat akses penuh ke kelas React JS Fundamental tanpa biaya apapun. Terbatas untuk 100 siswa pertama!</p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Summary -->
                        <div class="bg-gray-50 rounded-xl p-6 mb-6">
                            <h3 class="font-semibold text-gray-800 mb-4">Ringkasan Data Pendaftaran</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Nama Lengkap:</span>
                                    <span class="font-medium text-gray-800" id="summary-name">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Email:</span>
                                    <span class="font-medium text-gray-800" id="summary-email">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">WhatsApp:</span>
                                    <span class="font-medium text-gray-800" id="summary-whatsapp">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pendidikan:</span>
                                    <span class="font-medium text-gray-800" id="summary-education">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jadwal Belajar:</span>
                                    <span class="font-medium text-gray-800" id="summary-schedule">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="border border-gray-200 rounded-xl p-4 mb-6">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="checkbox" id="terms-checkbox" class="mt-1 text-p2 focus:ring-p2 rounded">
                                <div class="text-sm text-gray-700">
                                    <span class="font-medium">Saya menyetujui </span>
                                    <a href="#" class="text-p2 hover:underline">Syarat & Ketentuan</a> 
                                    serta 
                                    <a href="#" class="text-p2 hover:underline">Kebijakan Privasi</a>
                                    yang berlaku. Saya memahami bahwa kelas ini gratis dan berkomitmen mengikuti pembelajaran dengan baik.
                                </div>
                            </label>
                        </div>

                        <!-- Newsletter Subscription -->
                        <div class="border border-gray-200 rounded-xl p-4 mb-6">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="checkbox" id="newsletter-checkbox" class="mt-1 text-p2 focus:ring-p2 rounded" checked>
                                <div class="text-sm text-gray-700">
                                    <span class="font-medium">Langganan Newsletter</span><br>
                                    Dapatkan update kelas terbaru, tips programming, dan penawaran khusus lainnya via email.
                                </div>
                            </label>
                        </div>

                        <!-- Free Access Benefits -->
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                            <h4 class="font-semibold text-blue-800 mb-3">Yang Anda Dapatkan GRATIS:</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm text-blue-700">
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-check text-green-600"></i>
                                    <span>24 Video Pembelajaran</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-check text-green-600"></i>
                                    <span>15 Materi Bacaan</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-check text-green-600"></i>
                                    <span>Akses Forum Diskusi</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-check text-green-600"></i>
                                    <span>Sertifikat Digital</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-check text-green-600"></i>
                                    <span>Akses Seumur Hidup</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-check text-green-600"></i>
                                    <span>Project-Based Learning</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Course Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                    <div class="flex items-center gap-4 mb-6">
                        <img src="https://via.placeholder.com/64x64/3B82F6/FFFFFF?text=React" 
                             alt="React JS Fundamental" 
                             class="w-16 h-16 rounded-lg object-cover">
                        <div>
                            <h3 class="font-bold text-gray-800">React JS Fundamental</h3>
                            <p class="text-sm text-gray-600">by John Doe</p>
                            <div class="flex items-center gap-1 mt-1">
                                <span class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                <span class="text-xs text-gray-500">4.8 (124)</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-6">
                        <div class="text-3xl font-bold text-green-600 mb-2">GRATIS</div>
                        <div class="text-sm text-gray-500 line-through">Rp 999.000</div>
                        <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium mt-2">
                            Hemat 100%
                        </div>
                    </div>

                    <div class="space-y-3 text-sm text-gray-600 mb-6">
                        <div class="flex items-center gap-2">
                            <i class="ph ph-clock text-gray-400"></i>
                            <span>8 minggu pembelajaran</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph ph-video text-gray-400"></i>
                            <span>24 video pembelajaran</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph ph-file-text text-gray-400"></i>
                            <span>15 materi bacaan</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph ph-certificate text-gray-400"></i>
                            <span>Sertifikat completion</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph ph-infinity text-gray-400"></i>
                            <span>Akses seumur hidup</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="ph ph-users text-gray-400"></i>
                            <span>Forum diskusi</span>
                        </div>
                    </div>

                    <!-- Countdown Timer -->
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                        <div class="text-center">
                            <div class="text-xs text-red-600 font-medium mb-2">Penawaran Terbatas!</div>
                            <div class="grid grid-cols-4 gap-2 text-center">
                                <div class="bg-red-600 text-white rounded p-2">
                                    <div class="text-lg font-bold" id="days">07</div>
                                    <div class="text-xs">Hari</div>
                                </div>
                                <div class="bg-red-600 text-white rounded p-2">
                                    <div class="text-lg font-bold" id="hours">23</div>
                                    <div class="text-xs">Jam</div>
                                </div>
                                <div class="bg-red-600 text-white rounded p-2">
                                    <div class="text-lg font-bold" id="minutes">45</div>
                                    <div class="text-xs">Menit</div>
                                </div>
                                <div class="bg-red-600 text-white rounded p-2">
                                    <div class="text-lg font-bold" id="seconds">12</div>
                                    <div class="text-xs">Detik</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student Count -->
                    <div class="text-center text-sm text-gray-600">
                        <div class="flex items-center justify-center gap-2 mb-2">
                            <i class="ph ph-users text-green-600"></i>
                            <span><strong>67</strong> dari <strong>100</strong> slot terisi</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 67%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
            <button id="prevBtn" class="flex items-center gap-2 text-gray-600 hover:text-p2 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <i class="ph ph-arrow-left"></i>
                <span>Sebelumnya</span>
            </button>
            
            <div class="flex items-center gap-3">
                <button id="nextBtn" class="bg-gradient-to-r from-p2 to-p3 text-white px-8 py-3 rounded-full font-semibold hover:opacity-90 transition-all">
                    <span>Selanjutnya</span>
                    <i class="ph ph-arrow-right ml-2"></i>
                </button>
                <button id="submitBtn" class="hidden bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition-all flex items-center gap-2">
                    <i class="ph ph-check"></i>
                    <span>Daftar GRATIS Sekarang!</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-8 text-center animate-bounce-in">
            <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="ph ph-check text-white text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Selamat! 🎉</h3>
            <p class="text-gray-600 mb-6">Pendaftaran Anda berhasil! Anda sekarang memiliki akses penuh ke kelas React JS Fundamental.</p>
            
            <div class="space-y-3">
                <button id="accessCourseBtn" class="w-full bg-gradient-to-r from-p2 to-p3 text-white py-3 rounded-xl font-semibold hover:opacity-90 transition-all">
                    <a href="{{ url('/desktop/forum-siswa') }}"</a>
                    Mulai Belajar Sekarang dan gabung ke forum
                </button>
                <button id="goToDashboardBtn" class="w-full border border-gray-300 text-gray-600 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all">
                    Ke Dashboard
                </button>
            </div>

            <div class="mt-6 p-4 bg-blue-50 rounded-xl">
                <div class="flex items-center gap-2 text-blue-700 text-sm">
                    <i class="ph ph-info"></i>
                    <span>Link akses kelas telah dikirim ke email Anda</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-6 flex items-center gap-3">
            <div class="animate-spin rounded-full h-6 w-6 border-2 border-p2 border-t-transparent"></div>
            <span class="text-gray-700">Memproses pendaftaran...</span>
        </div>
    </div>

    <script src="{{ asset('assets/js/custom/kelas-pendaftaran.js') }}"></script>

    <style>
        .step-content.active {
            display: block;
        }
        .step-content.hidden {
            display: none;
        }
        
        /* Custom radio button styling */
        input[type="radio"]:checked + * {
            border-color: #3B82F6;
            background-color: rgba(59, 130, 246, 0.05);
        }
        
        /* Smooth transitions */
        .step-content {
            transition: opacity 0.3s ease-in-out;
        }
        
        /* Loading animation */
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .animate-spin {
            animation: spin 1s linear infinite;
        }

        /* Bounce in animation for modal */
        @keyframes bounce-in {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }
            50% {
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .animate-bounce-in {
            animation: bounce-in 0.6s ease-out;
        }
    </style>
</body>
</html>