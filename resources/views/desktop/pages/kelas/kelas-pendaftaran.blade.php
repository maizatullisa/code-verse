<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kelas - {{ $kelas->nama_kelas ?? 'Loading...' }}</title>
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
                        <p class="text-sm text-gray-600" id="course-title-header">{{ $kelas->nama_kelas ?? 'Loading...' }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-sm text-gray-600">
                        <span class="font-semibold" id="current-step">1</span> / 3 langkah
                    </div>
                    <div class="w-32 bg-gray-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-p2 to-p3 h-2 rounded-full transition-all duration-500" id="progress-bar" style="width: 33%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
   <form action="{{ route('enrollments.store', $kelas->id) }}" method="POST">
        @csrf
        
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

                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                                        <input type="text" name="full_name" required 
                                               value="{{ old('full_name', Auth::user()->first_name ?? '') }}"
                                               class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                               placeholder="Masukkan nama lengkap">
                                        @error('full_name')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                                        <input type="email" name="email" required 
                                               value="{{ old('email', Auth::user()->email ?? '') }}"
                                               class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                               placeholder="nama@email.com">
                                        @error('email')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp *</label>
                                        <input type="number" name="whatsapp" required 
                                               value="{{ old('whatsapp') }}"
                                               class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                               placeholder="+62 812 3456 7890">
                                        @error('whatsapp')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir *</label>
                                        <input type="date" name="birth_date" required 
                                               value="{{ old('birth_date') }}"
                                               class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20">
                                        @error('birth_date')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir *</label>
                                    <select name="education" required 
                                            class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20">
                                        <option value="">Pilih pendidikan terakhir</option>
                                        <option value="SMA/SMK" {{ old('education') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                        <option value="D3" {{ old('education') == 'D3' ? 'selected' : '' }}>Diploma 3</option>
                                        <option value="S1" {{ old('education') == 'S1' ? 'selected' : '' }}>Sarjana (S1)</option>
                                        <option value="S2" {{ old('education') == 'S2' ? 'selected' : '' }}>Magister (S2)</option>
                                        <option value="S3" {{ old('education') == 'S3' ? 'selected' : '' }}>Doktor (S3)</option>
                                    </select>
                                    @error('education')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pengalaman di Bidang Ini</label>
                                    <div class="space-y-3">
                                        <label class="flex items-center gap-3">
                                            <input type="radio" name="experience" value="beginner" 
                                                   {{ old('experience') == 'beginner' ? 'checked' : '' }}
                                                   class="text-p2 focus:ring-p2">
                                            <span class="text-gray-700">Pemula (belum pernah belajar)</span>
                                        </label>
                                        <label class="flex items-center gap-3">
                                            <input type="radio" name="experience" value="basic" 
                                                   {{ old('experience') == 'basic' ? 'checked' : '' }}
                                                   class="text-p2 focus:ring-p2">
                                            <span class="text-gray-700">Dasar (pernah belajar sedikit)</span>
                                        </label>
                                        <label class="flex items-center gap-3">
                                            <input type="radio" name="experience" value="intermediate" 
                                                   {{ old('experience') == 'intermediate' ? 'checked' : '' }}
                                                   class="text-p2 focus:ring-p2">
                                            <span class="text-gray-700">Menengah (sudah pernah praktek)</span>
                                        </label>
                                        <label class="flex items-center gap-3">
                                            <input type="radio" name="experience" value="advanced" 
                                                   {{ old('experience') == 'advanced' ? 'checked' : '' }}
                                                   class="text-p2 focus:ring-p2">
                                            <span class="text-gray-700">Advanced (sudah berpengalaman)</span>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Motivasi Mengikuti Kelas</label>
                                    <textarea name="motivation" rows="4" 
                                              class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                              placeholder="Ceritakan motivasi Anda mengikuti kelas ini...">{{ old('motivation') }}</textarea>
                                </div>
                            </div>
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

                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-4">Benefit yang Diinginkan</label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <label class="flex items-center gap-3">
                                            <input type="checkbox" name="features[]" value="certificate" 
                                                   {{ in_array('certificate', old('features', [])) ? 'checked' : '' }}
                                                   class="text-p2 focus:ring-p2 rounded">
                                            <span class="text-gray-700">Sertifikat Resmi</span>
                                        </label>
                                        <label class="flex items-center gap-3">
                                            <input type="checkbox" name="features[]" value="lifetime" 
                                                   {{ in_array('lifetime', old('features', [])) ? 'checked' : '' }}
                                                   class="text-p2 focus:ring-p2 rounded">
                                            <span class="text-gray-700">Akses Seumur Hidup</span>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Target Setelah Menyelesaikan Kelas</label>
                                    <textarea name="goals" rows="3" 
                                              class="text-black w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-p2 focus:ring-2 focus:ring-p2/20"
                                              placeholder="Ceritakan target dan harapan Anda setelah menyelesaikan kelas ini...">{{ old('goals') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Konfirmasi & Daftar -->
                    <div class="step-content hidden" id="step-3">
                        <div class="bg-white rounded-xl shadow-lg p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="bg-p2 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold">3</div>
                                <div>
                                    <h2 class="font-bold text-xl text-gray-800">Konfirmasi Pendaftaran</h2>
                                    <p class="text-gray-600 text-sm">Konfirmasi data Anda untuk menyelesaikan pendaftaran</p>
                                </div>
                            </div>

                            <!-- Special Offer Banner (conditional) -->
                            @if($kelas->harga == 0)
                            <div id="offer-banner" class="bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl p-4 mb-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                        <i class="ph ph-gift text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-green-800">Kelas Gratis Terbatas!</h3>
                                        <p class="text-green-700 text-sm">Anda mendapat akses penuh ke kelas ini tanpa biaya apapun. Terbatas untuk peserta pertama!</p>
                                    </div>
                                </div>
                            </div>
                            @endif

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
                                        <span class="text-gray-600">Kelas:</span>
                                        <span class="font-medium text-gray-800">{{ $kelas->nama_kelas }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Terms & Conditions -->
                            <div class="border border-gray-200 rounded-xl p-4 mb-6">
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" id="terms-checkbox" name="terms_agreement" value="1" required class="mt-1 text-p2 focus:ring-p2 rounded">
                                    <div class="text-sm text-gray-700">
                                        <span class="font-medium">Saya menyetujui </span>
                                        <a href="#" class="text-p2 hover:underline">Syarat & Ketentuan</a> 
                                        serta 
                                        <a href="#" class="text-p2 hover:underline">Kebijakan Privasi</a>
                                        yang berlaku. Saya berkomitmen mengikuti pembelajaran dengan baik.
                                    </div>
                                </label>
                            </div>

                            <!-- Newsletter Subscription -->
                            <!-- <div class="border border-gray-200 rounded-xl p-4 mb-6">
                                <label class="flex items-start gap-3 cursor-pointer">
                                    <input type="checkbox" id="newsletter-checkbox" name="newsletter_subscription" value="1" class="mt-1 text-p2 focus:ring-p2 rounded">
                                    <div class="text-sm text-gray-700">
                                        <span class="font-medium">Langganan Newsletter</span><br>
                                        Dapatkan update kelas terbaru, tips pembelajaran, dan penawaran khusus lainnya via email.
                                    </div>
                                </label>
                            </div> -->

                            <!-- Course Benefits -->
                            <div id="course-benefits" class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                                <h4 class="font-semibold text-blue-800 mb-3">Yang Anda Dapatkan:</h4>
                                <div id="benefits-list" class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm text-blue-700">
                                    @foreach($courseData['benefits'] as $benefit)
                                    <div class="flex items-center gap-2">
                                        <i class="ph ph-check text-green-600"></i>
                                        <span>{{ $benefit }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar - Course Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                        <div class="flex items-center gap-4 mb-6">
                            <img id="course-image" 
                                 src="{{ $courseData['cover_image'] }}" 
                                 alt="Course Image" 
                                 class="w-16 h-16 rounded-lg object-cover">
                            <div>
                                <h3 id="course-title" class="font-bold text-gray-800">{{ $courseData['nama_kelas'] }}</h3>
                                <p id="course-instructor" class="text-sm text-gray-600">by {{ $courseData['pengajar'] }}</p>
                                <!-- <div class="flex items-center gap-1 mt-1">
                                    <span id="course-rating" class="text-yellow-400">⭐⭐⭐⭐⭐</span>
                                    <span id="course-reviews" class="text-xs text-gray-500">(156 reviews)</span>
                                </div> -->
                            </div>
                        </div>

                        <div class="text-center mb-6">
                            <div id="course-price" class="text-3xl font-bold text-p2 mb-2">{{ $courseData['formatted_harga'] }}</div>
                            @if($courseData['harga'] > 0)
                                @php
                                    $originalPrice = $courseData['harga'] * 1.67;
                                    $discount = round((($originalPrice - $courseData['harga']) / $originalPrice) * 100);
                                @endphp
                                <div id="course-original-price" class="text-sm text-gray-500 line-through">
                                    Rp {{ number_format($originalPrice, 0, ',', '.') }}
                                </div>
                                <div id="course-discount" class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium mt-2">
                                    Diskon {{ $discount }}%
                                </div>
                            @endif
                        </div>

                        <div id="course-details" class="space-y-3 text-sm text-gray-600 mb-6">
                            <div class="flex items-center gap-2">
                                <!-- <i class="ph ph-clock text-p2"></i> -->
                                <!-- <span>{{ $courseData['durasi'] }}</span> -->
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="ph ph-book-open text-p2"></i>
                                <span>{{ $courseData['jumlah_materi'] }} Materi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="ph ph-medal text-p2"></i>
                                <span>{{ ucfirst($courseData['level']) }}</span>
                            </div>
                            <!-- <div class="flex items-center gap-2">
                                <i class="ph ph-users text-p2"></i>
                                <span>{{ $courseData['kapasitas'] >= 9999 ? 'Tidak Terbatas' : $courseData['kapasitas'] . ' Slot' }}</span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                <button type="button" id="prevBtn" class="flex items-center gap-2 text-gray-600 hover:text-p2 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    <i class="ph ph-arrow-left"></i>
                    <span>Sebelumnya</span>
                </button>
                
                <div class="flex items-center gap-3">
                    <button type="button" id="nextBtn" class="bg-gradient-to-r from-p2 to-p3 text-white px-8 py-3 rounded-full font-semibold hover:opacity-90 transition-all">
                        <span>Selanjutnya</span>
                        <i class="ph ph-arrow-right ml-2"></i>
                    </button>
                    <button type="submit" id="submitBtn" class="hidden bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition-all flex items-center gap-2">
                        <i class="ph ph-check"></i>
                        <span id="submit-text">Daftar Sekarang!</span>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-8 text-center animate-bounce-in">
            <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="ph ph-check text-white text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Selamat! 🎉</h3>
            <p class="text-gray-600 mb-6">Pendaftaran Anda berhasil! Anda sekarang memiliki akses ke kelas yang dipilih.</p>
            
            <div class="space-y-3">
               <a href="{{ route('desktop.pages.forum.forum-siswa', $kelas->id) }}" 
                        id="accessCourseBtn"
                        class="block text-center w-full bg-gradient-to-r from-p2 to-p3 text-white py-3 rounded-xl font-semibold hover:opacity-90 transition-all">
                        Mulai Belajar Sekarang
                    </a>

              <a href="{{ route('desktop.dashboard-user-desktop') }}" 
                id="goToDashboardBtn"
                class="block text-center w-full border border-gray-300 text-gray-600 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all">
                Ke Dashboard
                </a>
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

    <script>
        let currentStep = 1;
        const totalSteps = 3;

        // Navigation functions
        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('.step-content').forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('active');
            });

            // Show current step
            const currentStepElement = document.getElementById(`step-${step}`);
            if (currentStepElement) {
                currentStepElement.classList.remove('hidden');
                currentStepElement.classList.add('active');
            }

            // Update progress
            updateProgress(step);
            updateButtons(step);
        }

        function updateProgress(step) {
            const progressBar = document.getElementById('progress-bar');
            const currentStepElement = document.getElementById('current-step');
            
            const progressPercentage = (step / totalSteps) * 100;
            progressBar.style.width = `${progressPercentage}%`;
            currentStepElement.textContent = step;
        }

        function updateButtons(step) {
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');

            // Previous button
            if (step === 1) {
                prevBtn.disabled = true;
            } else {
                prevBtn.disabled = false;
            }

            // Next/Submit button
            if (step === totalSteps) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }
        }

        function validateStep(step) {
            const stepElement = document.getElementById(`step-${step}`);
            const requiredInputs = stepElement.querySelectorAll('input[required], select[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-500');
                } else {
                    input.classList.remove('border-red-500');
                }
            });

            // Additional validation for step 3
            if (step === 3) {
                const termsCheckbox = document.getElementById('terms-checkbox');
                if (!termsCheckbox.checked) {
                    isValid = false;
                    termsCheckbox.closest('.border').classList.add('border-red-500');
                } else {
                    termsCheckbox.closest('.border').classList.remove('border-red-500');
                }
            }

            return isValid;
        }

        function updateSummary() {
            // Get form values
            const fullName = document.querySelector('input[name="full_name"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const whatsapp = document.querySelector('input[name="whatsapp"]').value;
            const education = document.querySelector('select[name="education"]').value;

            // Update summary
            document.getElementById('summary-name').textContent = fullName || '-';
            document.getElementById('summary-email').textContent = email || '-';
            document.getElementById('summary-whatsapp').textContent = whatsapp || '-';
            document.getElementById('summary-education').textContent = education || '-';
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Next button
            document.getElementById('nextBtn').addEventListener('click', function() {
                if (validateStep(currentStep)) {
                    if (currentStep === 2) {
                        updateSummary();
                    }
                    currentStep++;
                    showStep(currentStep);
                } else {
                    alert('Mohon lengkapi semua field yang wajib diisi.');
                }
            });

            // Previous button
            document.getElementById('prevBtn').addEventListener('click', function() {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            // Form submission
            // document.getElementById('enrollmentForm').addEventListener('submit', function(e) {
            //     e.preventDefault();
                
            //     if (!validateStep(currentStep)) {
            //         alert('Mohon lengkapi semua field yang wajib diisi.');
            //         return;
            //     }
            document.getElementById('enrollmentForm').addEventListener('submit', function(e) {
            // Validasi langkah terakhir sebelum submit
            if (!validateStep(currentStep)) {
             e.preventDefault(); // ❗Boleh dibiarkan hanya untuk mencegah submit kalau tidak valid
            alert('Mohon lengkapi semua field yang wajib diisi.');
            }



                // Show loading
                // document.getElementById('loadingOverlay').classList.remove('hidden');

                // Simulate form submission
                setTimeout(() => {
                    // document.getElementById('loadingOverlay').classList.add('hidden');
                    // document.getElementById('successModal').classList.remove('hidden');
                }, 2000);
            });

            // Success modal buttons
            document.getElementById('accessCourseBtn').addEventListener('click', function() {
                // Redirect to course
                window.location.href = '/kelas/belajar';
            });

            document.getElementById('goToDashboardBtn').addEventListener('click', function() {
                // Redirect to dashboard
                window.location.href = '/dashboard';
            });

            // Initialize first step
            showStep(1);
        });
    </script>

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

        /* Error styling */
        .border-red-500 {
            border-color: #ef4444 !important;
        }
    </style>
</body>
</html>