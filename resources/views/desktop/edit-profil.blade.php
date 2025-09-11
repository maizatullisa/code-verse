@extends('desktop.layout.master-desktop')

@section('title', 'Code Verse - Edit Profil')

@section('page-title', 'Edit Profil')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
<div class="min-h-screen relative z-10">

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert bg-green-500 text-white p-3 rounded-lg mb-4 transition-opacity duration-500 opacity-100">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert Error --}}
    @if($errors->any())
        <div class="alert bg-red-500 text-white p-3 rounded-lg mb-4 transition-opacity duration-500 opacity-100">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Header -->
    <div class="bg-gray-900/95 backdrop-blur-md rounded-2xl p-6 mb-8 shadow-2xl border border-gray-700">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('user.desktop') }}" class="text-gray-400 hover:text-white transition-colors">
                    <i class="ph ph-arrow-left text-xl"></i>
                </a>
                <div>
                    <h2 class="text-2xl font-bold text-white">Edit Profil</h2>
                    <p class="text-gray-400 text-sm">Perbarui informasi pribadi Anda</p>
                </div>
            </div>
            <div class="flex space-x-3">
            </div>
        </div>
    </div>


    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
        @csrf
        
        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- Left Column - Profile Photo & Basic Info -->
            <div class="lg:col-span-1 space-y-8">
                
                <!-- Profile Photo -->
                <div class="bg-gray-900/95 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <i class="ph ph-camera text-blue-400 mr-2"></i>
                        Foto Profil
                    </h3>
                    
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="w-32 h-32 rounded-full overflow-hidden shadow-lg mx-auto mb-4 border-4 border-gray-600">
                                 <img id="profilePreview" 
                                     src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : '' }}" 
                                     alt="Foto Profil" 
                                     class="w-full h-full object-cover {{ !$user->profile_photo ? 'hidden' : '' }}">
                                     <div id="profilePlaceholder" class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-3xl font-bold {{ $user->profile_photo ? 'hidden' : '' }}">
                                    {{ strtoupper(substr($user->first_name ?? 'U', 0, 1)) }}
                                </div>
                            </div>
                            <label for="profile_photo" class="absolute bottom-0 right-1/2 transform translate-x-1/2 translate-y-2 bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full cursor-pointer shadow-lg transition-colors">
                                <i class="ph ph-camera text-lg"></i>
                            </label>
                        </div>
                        
                        <input type="file" 
                               id="profile_photo" 
                               name="profile_photo" 
                               class="hidden" 
                               accept="image/*"
                               onchange="previewImage(this)">
                        
                        <p class="text-gray-400 text-sm mt-2">
                            Klik ikon kamera untuk mengubah foto
                        </p>
                        <p class="text-gray-500 text-xs mt-1">
                            Format: JPG, PNG. Max: 2MB
                        </p>
                    </div>
                </div>
                <!-- User Info -->
                <div class="bg-gray-900/95 backdrop-blur-md rounded-2xl p-4 shadow-2xl border border-gray-700">
                    <div class="text-center">
                        <h4 class="text-white font-semibold">{{ $user->first_name }}</h4>
                        <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                        <p class="text-gray-500 text-xs mt-1">Bergabung {{ $user->created_at->format('M Y') }}</p>
                    </div>
                    </div>
            </div>
            
            <!-- Right Column - Form Fields -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Personal Information -->
                <div class="bg-gray-900/95 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-6 flex items-center">
                        <i class="ph ph-user text-blue-400 mr-2"></i>
                        Informasi Pribadi
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-300 mb-2">
                                Nama <span class="text-red-400">*</span>
                            </label>
                            <input type="text" 
                                   id="first_name" 
                                   name="first_name" 
                                   value="{{ old('first_name', $user->first_name ?? '') }}" 
                                   class="w-full bg-gray-800/50 border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder-gray-400"
                                   placeholder="Masukkan nama depan"
                                   required>
                            @error('first_name')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                                Email <span class="text-red-400">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email ?? '') }}" 
                                   class="w-full bg-gray-800/50 border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder-gray-400"
                                   placeholder="Masukkan email"
                                   required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                <!-- Password Change -->
                <div class="bg-gray-900/95 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-6 flex items-center">
                        <i class="ph ph-lock text-yellow-400 mr-2"></i>
                        Ubah Password
                    </h3>
                    
                    <!-- <div class="space-y-6"> -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4"></div>
                        <!-- Current Password -->
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">
                                Password Saat Ini
                            </label>
                            <div class="relative">
                                <input type="password" 
                                       id="current_password" 
                                       name="current_password" 
                                       class="w-full bg-gray-800/50 border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder-gray-400 pr-12"
                                       placeholder="Masukkan password saat ini">
                                <button type="button" onclick="togglePassword('current_password')" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white transition-colors">
                                    <i class="ph ph-eye" id="current_password_icon"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-300 mb-2">
                                Password Baru
                            </label>
                            <div class="relative">
                                <input type="password" 
                                       id="new_password" 
                                       name="new_password" 
                                       class="w-full bg-gray-800/50 border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder-gray-400 pr-12"
                                       placeholder="Masukkan password baru">
                                <button type="button" onclick="togglePassword('new_password')" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white transition-colors">
                                    <i class="ph ph-eye" id="new_password_icon"></i>
                                </button>
                            </div>
                            @error('new_password')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div>
                            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                                Konfirmasi Password Baru
                            </label>
                            <div class="relative">
                                <input type="password" 
                                       id="new_password_confirmation" 
                                       name="new_password_confirmation" 
                                       class="w-full bg-gray-800/50 border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all placeholder-gray-400 pr-12"
                                       placeholder="Konfirmasi password baru">
                                <button type="button" onclick="togglePassword('new_password_confirmation')" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white transition-colors">
                                    <i class="ph ph-eye" id="new_password_confirmation_icon"></i>
                                </button>
                            </div>
                            @error('new_password_confirmation')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="bg-yellow-900/30 border border-yellow-700 rounded-lg p-4">
                            <div class="flex items-start space-x-3">
                                <i class="ph ph-warning text-yellow-400 text-lg mt-0.5 flex-shrink-0"></i>
                                <div>
                                    <h4 class="text-yellow-300 font-medium text-sm">Tips Keamanan Password</h4>
                                    <ul class="mt-2 text-yellow-200 text-xs space-y-1">
                                        <li>• Minimal 8 karakter</li>
                                        <li>• Kombinasi huruf besar, kecil, angka, dan simbol</li>
                                        <li>• Tidak menggunakan informasi pribadi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                    <div class="mt-6 flex flex-wrap justify-center gap-4">
                        <a href="{{ route('user.desktop') }}" class="bg-gray-700 hover:bg-gray-600 text-gray-300 px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2 border border-gray-600">
                            <i class="ph ph-x"></i>
                            <span>Batal</span>
                        </a>
                        <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2 border border-blue-600">
                            <i class="ph ph-check"></i>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    // Preview uploaded image
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
                document.getElementById('profilePreview').classList.remove('hidden');
                document.getElementById('profilePlaceholder').classList.add('hidden');
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Reset form to original values
    function resetForm() {
        if (confirm('Apakah Anda yakin ingin mereset semua perubahan?')) {
            document.getElementById('profileForm').reset();

            const hasOriginalPhoto = '{{ $user->profile_photo ?? "" }}';
            if (hasOriginalPhoto) {
                document.getElementById('profilePreview').src = '{{ asset("storage/" . $user->profile_photo) }}';
                document.getElementById('profilePreview').classList.remove('hidden');
                document.getElementById('profilePlaceholder').classList.add('hidden');
            } else {
                document.getElementById('profilePreview').classList.add('hidden');
                document.getElementById('profilePlaceholder').classList.remove('hidden');
            }
        }
    }

    // Toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(fieldId + '_icon');
        
        if (field.type === 'password') {
            field.type = 'text';
            icon.className = 'ph ph-eye-slash';
        } else {
            field.type = 'password';
            icon.className = 'ph ph-eye';
        }
    }

    // Form validation before submit
    document.getElementById('profileForm').addEventListener('submit', function(e) {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('new_password_confirmation').value;

        if (newPassword && newPassword !== confirmPassword) {
            e.preventDefault();
            alert('Password baru dan konfirmasi password tidak cocok!');
            return false;
        }

        // Show loading state
        const submitBtn = e.target.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="ph ph-spinner animate-spin mr-2"></i><span>Menyimpan...</span>';
        submitBtn.disabled = true;

        // Re-enable button after 5 seconds as fallback
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 5000);
    });

    // Auto-hide alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }, 5000);
        });
    });
</script>
@endsection