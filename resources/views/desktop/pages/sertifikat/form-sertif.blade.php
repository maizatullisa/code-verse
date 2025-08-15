<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sertifikat - CODE VERSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        .font-inter { font-family: 'Inter', sans-serif; }
        .font-playfair { font-family: 'Playfair Display', serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .input-focus {
            border: 2px solid #e5e7eb;
        }
        
        .input-focus:focus {
            border-color: #3b82f6;
            outline: none;
        }
        
        .floating-label {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            padding: 0 8px;
            color: #6b7280;
            pointer-events: none;
            font-size: 0.875rem;
        }
        
        .input-group.has-value .floating-label {
            top: 0;
            transform: translateY(-50%);
            font-size: 0.75rem;
            color: #3b82f6;
            font-weight: 500;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 16px;
            height: 16px;
            margin: -8px 0 0 -8px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-inter">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="flex items-center justify-center mb-6">
                <div class="bg-white/20 text-white p-4 rounded-2xl mr-4">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                </div>
                <div class="text-left">
                    <h1 class="text-4xl font-bold text-white font-playfair">CODE VERSE</h1>
                    <p class="text-white/80 font-medium">Learning Technology Platform</p>
                </div>
            </div>
            <h2 class="text-4xl font-bold text-white mb-4 font-playfair">Dapatkan Sertifikat Anda</h2>
            <p class="text-white/90 text-lg max-w-2xl mx-auto">Lengkapi formulir di bawah ini untuk mendapatkan sertifikat kompetensi kelulusan yang dapat diunduh dan dicetak</p>
        </div>
        
        <!-- Form Card -->
        <div class="max-w-3xl mx-auto">
            <div class="glass-effect rounded-3xl shadow-xl p-8 md:p-12">
                <form id="certificateForm" class="space-y-8">
                    <!-- Personal Information Section -->
                    <div class="space-y-6">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-2 font-playfair">Nama Lengkap</h3>
                            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full"></div>
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="input-group relative">
                            <label class="floating-label">Nama Lengkap</label>
                            <input 
                                type="text" 
                                id="fullName" 
                                name="fullName" 
                                required
                                class="w-full px-4 py-4 input-focus rounded-xl bg-white/80 text-gray-800 font-medium"
                            >
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 hidden" id="nameCheck">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="pt-8">
                        <button 
                            type="submit"
                            id="submitBtn"
                            class="w-full bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 text-white font-bold py-5 px-8 rounded-2xl hover:from-blue-700 hover:via-purple-700 hover:to-blue-900 shadow-xl relative"
                        >
                            <span class="flex items-center justify-center text-lg">
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/>
                                    <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <span class="button-text">Generate Sertifikat Digital</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="max-w-4xl mx-auto mt-12 grid md:grid-cols-2 gap-8">
            <!-- Features Card -->
            <div class="glass-effect rounded-2xl p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-blue-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 font-playfair">Fitur Sertifikat</h3>
                </div>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center">
                        <span class="text-green-500 mr-3">✓</span>
                        <span>Desain profesional dan modern</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-green-500 mr-3">✓</span>
                        <span>Dapat diunduh dalam format PDF</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-green-500 mr-3">✓</span>
                        <span>Nomor sertifikat unik otomatis</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-green-500 mr-3">✓</span>
                        <span>Ready untuk print kualitas tinggi</span>
                    </li>
                </ul>
            </div>

            <!-- Instructions Card -->
            <div class="glass-effect rounded-2xl p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 font-playfair">Panduan Penggunaan</h3>
                </div>
                <ol class="space-y-3 text-gray-600">
                    <li class="flex items-start">
                        <span class="bg-blue-500 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5">1</span>
                        <span>Masukkan nama lengkap sesuai dokumen resmi</span>
                    </li>
                    <li class="flex items-start">
                        <span class="bg-purple-500 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5">2</span>
                        <span>Klik generate untuk membuat sertifikat</span>
                    </li>
                </ol>
            </div>
        </div>
    </div>

 <script src="{{ asset('assets/js/custom/form-sertif.js') }}"></script>
</body>
</html>