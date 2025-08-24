let isRegisterMode = false;
let currentPanel = 'login';

// PANEL NAVIGATION FUNCTIONS
function showLogin() {
    const panel = document.getElementById('slidingPanel');
    const mainIcon = document.getElementById('mainIcon');
    const mainTitle = document.getElementById('mainTitle');
    const mainDescription = document.getElementById('mainDescription');

    // Mobile toggle styling
    updateMobileToggle('login');

    // Slide to login panel
    panel.style.transform = 'translateX(0)';

    // Update left panel content with animation
    if (mainIcon) {
        mainIcon.style.transform = 'scale(0.8) rotate(180deg)';
        setTimeout(() => {
            mainIcon.className = 'ph ph-graduation-cap w-full h-full text-white text-5xl flex items-center justify-center transition-all duration-500';
            mainTitle.textContent = 'Udah siap upgrade skill hari ini?';
            mainDescription.textContent = 'Login yuk, langsung gas ke materi seru!';
            mainIcon.style.transform = 'scale(1) rotate(0deg)';
        }, 200);
    }

    currentPanel = 'login';
    isRegisterMode = false;
}

function showRegister() {
    const panel = document.getElementById('slidingPanel');
    const mainIcon = document.getElementById('mainIcon');
    const mainTitle = document.getElementById('mainTitle');
    const mainDescription = document.getElementById('mainDescription');

    updateMobileToggle('register');

    // Slide to register panel (20% = 1/5)
    panel.style.transform = 'translateX(-20%)';

    if (mainIcon) {
        mainIcon.style.transform = 'scale(0.8) rotate(180deg)';
        setTimeout(() => {
            mainIcon.className = 'ph ph-user-plus w-full h-full text-white text-5xl flex items-center justify-center transition-all duration-500';
            mainTitle.textContent = 'Baru pertama di sini? No worries ✨';
            mainDescription.textContent = 'Yuk daftar dulu, banyak hal seru nunggu kamu di dalam! 🚀';
            mainIcon.style.transform = 'scale(1) rotate(0deg)';
        }, 200);
    }

    currentPanel = 'register';
    isRegisterMode = true;
}

function showLupaPw() {
    const panel = document.getElementById('slidingPanel');
    const mainIcon = document.getElementById('mainIcon');
    const mainTitle = document.getElementById('mainTitle');
    const mainDescription = document.getElementById('mainDescription');

    updateMobileToggle('login');

    // Slide to forgot password panel (40% = 2/5)
    panel.style.transform = 'translateX(-40%)';

    if (mainIcon) {
        mainIcon.style.transform = 'scale(0.8) rotate(180deg)';
        setTimeout(() => {
            mainIcon.className = 'ph ph-key w-full h-full text-white text-5xl flex items-center justify-center transition-all duration-500';
            mainTitle.textContent = 'Lupa password ya? Santuy, bisa diatur 😎';
            mainDescription.textContent = 'Ketik email kamu waktu daftar, nanti kita kirimin kode OTP 4 digit ke sana.';
            mainIcon.style.transform = 'scale(1) rotate(0deg)';
        }, 200);
    }

    currentPanel = 'forgot';
}

function showOtp() {
    const panel = document.getElementById('slidingPanel');
    const mainIcon = document.getElementById('mainIcon');
    const mainTitle = document.getElementById('mainTitle');
    const mainDescription = document.getElementById('mainDescription');

    updateMobileToggle('login');

    // Slide to OTP panel (60% = 3/5)
    panel.style.transform = 'translateX(-60%)';

    if (mainIcon) {
        mainIcon.style.transform = 'scale(0.8) rotate(180deg)';
        setTimeout(() => {
            mainIcon.className = 'ph ph-envelope-simple w-full h-full text-white text-5xl flex items-center justify-center transition-all duration-500';
            mainTitle.textContent = 'Cek email kamu ya! 📧';
            mainDescription.textContent = 'Udah kirim kode OTP ke email kamu nih. Coba cek inbox atau folder spam. Tinggal masukin 4 digit kodenya aja! 🔢✨';
            mainIcon.style.transform = 'scale(1) rotate(0deg)';
        }, 200);
    }

    currentPanel = 'otp';
}

function showCreatePW() {
    const panel = document.getElementById('slidingPanel');
    const mainIcon = document.getElementById('mainIcon');
    const mainTitle = document.getElementById('mainTitle');
    const mainDescription = document.getElementById('mainDescription');

    updateMobileToggle('login');

    // Slide to create password panel (80% = 4/5)
    panel.style.transform = 'translateX(-80%)';

    if (mainIcon) {
        mainIcon.style.transform = 'scale(0.8) rotate(180deg)';
        setTimeout(() => {
            mainIcon.className = 'ph ph-lock-key w-full h-full text-white text-5xl flex items-center justify-center transition-all duration-500';
            mainTitle.textContent = 'Yay! Tinggal dikit lagi! 😄';
            mainDescription.textContent = 'Sekarang saatnya bikin password baru yang kuat dan aman. Pastikan minimal 8 karakter ya, biar akun kamu tetep secure! 💪🛡️';
            mainIcon.style.transform = 'scale(1) rotate(0deg)';
        }, 200);
    }

    currentPanel = 'createPw';
}

// VALIDASI FORM FUNCTIONS
function validateForgotPasswordForm() {
    const emailInput = document.querySelector('input[name="reset_email"]');
    const email = emailInput.value.trim();
    
    if (!email) {
        showNotification('Email harus diisi!', 'error');
        emailInput.focus();
        return false;
    }
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showNotification('Format email tidak valid!', 'error');
        emailInput.focus();
        return false;
    }
    
    return true;
}

function validateOTPForm() {
    const otpInputs = document.querySelectorAll('.otp-input');
    let otp = '';
    
    otpInputs.forEach(input => {
        otp += input.value.trim();
    });
    
    if (otp.length !== 4) {
        showNotification('Mohon masukkan 4 digit kode OTP lengkap!', 'error');
        otpInputs[0].focus();
        return false;
    }
    
    return true;
}

function validateNewPasswordForm() {
    const newPasswordInput = document.querySelector('input[name="new_password"]');
    const confirmPasswordInput = document.querySelector('input[name="confirm_new_password"]');
    
    const newPassword = newPasswordInput.value.trim();
    const confirmPassword = confirmPasswordInput.value.trim();
    
    if (!newPassword) {
        showNotification('Password baru harus diisi!', 'error');
        newPasswordInput.focus();
        return false;
    }
    
    if (newPassword.length < 8) {
        showNotification('Password harus minimal 8 karakter!', 'error');
        newPasswordInput.focus();
        return false;
    }
    
    if (!confirmPassword) {
        showNotification('Konfirmasi password harus diisi!', 'error');
        confirmPasswordInput.focus();
        return false;
    }
    
    if (newPassword !== confirmPassword) {
        showNotification('Password tidak cocok! Silakan coba lagi.', 'error');
        confirmPasswordInput.focus();
        return false;
    }
    
    return true;
}

// MOBILE TOGGLE UPDATE
function updateMobileToggle(activePanel) {
    const mobileLoginToggle = document.getElementById('mobileLoginToggle');
    const mobileRegisterToggle = document.getElementById('mobileRegisterToggle');

    if (mobileLoginToggle && mobileRegisterToggle) {
        // Reset all
        mobileLoginToggle.classList.remove('bg-white/20', 'text-white', 'shadow-lg');
        mobileRegisterToggle.classList.remove('bg-white/20', 'text-white', 'shadow-lg');
        mobileLoginToggle.classList.add('text-white/70');
        mobileRegisterToggle.classList.add('text-white/70');

        // Activate current
        if (activePanel === 'login') {
            mobileLoginToggle.classList.add('bg-white/20', 'text-white', 'shadow-lg');
            mobileLoginToggle.classList.remove('text-white/70');
        } else if (activePanel === 'register') {
            mobileRegisterToggle.classList.add('bg-white/20', 'text-white', 'shadow-lg');
            mobileRegisterToggle.classList.remove('text-white/70');
        }
    }
}

// PASSWORD VISIBILITY TOGGLE
function setupPasswordToggle() {
    const passwordShows = document.querySelectorAll('.passwordShow, .confirmPasswordShow');
    passwordShows.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const input = this.parentNode.querySelector('input[type="password"], input[type="text"]');
            if (input) {
                if (input.type === 'password') {
                    input.type = 'text';
                    this.className = this.className.replace('ph-eye-slash', 'ph-eye');
                } else {
                    input.type = 'password';
                    this.className = this.className.replace('ph-eye', 'ph-eye-slash');
                }
            }
        });
    });
}

// OTP INPUT HANDLING
function moveToNext(current, index) {
    if (current.value.length === 1) {
        const inputs = document.querySelectorAll('.otp-input');
        if (index < inputs.length - 1) {
            inputs[index + 1].focus();
        }
    }
}

// FORM SUBMISSION HANDLERS - YANG SUDAH DIPERBAIKI
function handleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    // Loading state
    submitBtn.innerHTML = '<div class="flex items-center justify-center gap-3"><div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div><span>Memproses...</span></div>';
    submitBtn.disabled = true;

    // Simulate API call
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        showNotification('Login berhasil! Selamat datang kembali 🎉', 'success');
    }, 2000);
}

function handleForgotPassword(event) {
    event.preventDefault();
    
    // Validasi form terlebih dahulu
    if (!validateForgotPasswordForm()) {
        return;
    }
    
    const submitBtn = event.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    submitBtn.innerHTML = '<div class="flex items-center justify-center gap-3"><div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div><span>Mengirim...</span></div>';
    submitBtn.disabled = true;

    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        showNotification('Kode OTP berhasil dikirim ke email Anda 📧', 'success');
        showOtp();
    }, 2000);
}

function handleOTPVerification(event) {
    event.preventDefault();
    
    // Validasi OTP terlebih dahulu
    if (!validateOTPForm()) {
        return;
    }

    const submitBtn = event.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    submitBtn.innerHTML = '<div class="flex items-center justify-center gap-3"><div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div><span>Memverifikasi...</span></div>';
    submitBtn.disabled = true;

    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        showNotification('Kode OTP valid! Silakan buat password baru 🔐', 'success');
        showCreatePW();
    }, 2000);
}

function handleNewPassword(event) {
    event.preventDefault();
    
    // Validasi password terlebih dahulu
    if (!validateNewPasswordForm()) {
        return;
    }

    const submitBtn = event.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    submitBtn.innerHTML = '<div class="flex items-center justify-center gap-3"><div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div><span>Menyimpan...</span></div>';
    submitBtn.disabled = true;

    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        showNotification('Password berhasil diubah! Silakan masuk dengan password baru 🎉', 'success');
        setTimeout(() => showLogin(), 1500);
    }, 2000);
}

function resendOTP() {
    showNotification('Kode OTP baru telah dikirim 📧', 'success');
}

// NOTIFICATION SYSTEM
function showNotification(message, type = 'info') {
    const container = document.getElementById('notificationContainer');
    const notification = document.createElement('div');
    
    const bgColor = type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
    const icon = type === 'success' ? 'ph-check-circle' : type === 'error' ? 'ph-x-circle' : 'ph-info';

    notification.className = `${bgColor} text-white px-6 py-4 rounded-xl shadow-2xl transform translate-x-full transition-all duration-500 max-w-sm`;
    notification.innerHTML = `
        <div class="flex items-center gap-3">
            <i class="ph ${icon} text-xl flex-shrink-0"></i>
            <span class="font-medium text-sm">${message}</span>
        </div>
    `;

    container.appendChild(notification);

    // Slide in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    // Slide out and remove
    setTimeout(() => {
        notification.style.transform = 'translateX(full)';
        setTimeout(() => {
            if (container.contains(notification)) {
                container.removeChild(notification);
            }
        }, 500);
    }, 4000);
}

// PASSWORD STRENGTH CHECKER
function checkPasswordStrength(password) {
    let strength = 0;
    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    return Math.min(strength, 3);
}

function updatePasswordStrength() {
    const passwordInputs = document.querySelectorAll('input[name="new_password"]');
    passwordInputs.forEach(input => {
        input.addEventListener('input', function() {
            const strength = checkPasswordStrength(this.value);
            const bars = document.querySelectorAll('.password-strength-bar');
            const text = document.querySelector('.password-strength-text');
            
            bars.forEach((bar, index) => {
                if (index < strength) {
                    bar.style.width = '100%';
                } else {
                    bar.style.width = '0%';
                }
            });

            const strengthText = ['Lemah', 'Sedang', 'Kuat', 'Sangat Kuat'];
            const strengthColors = ['text-red-500', 'text-yellow-500', 'text-green-500', 'text-green-600'];
            
            if (text) {
                text.textContent = strengthText[strength] || 'Lemah';
                text.className = `password-strength-text ${strengthColors[strength] || 'text-gray-500'}`;
            }
        });
    });
}

// KEYBOARD NAVIGATION
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft' && currentPanel !== 'login') {
        e.preventDefault();
        showLogin();
    } else if (e.key === 'ArrowRight' && currentPanel === 'login') {
        e.preventDefault();
        showRegister();
    } else if (e.key === 'Escape' && currentPanel !== 'login') {
        e.preventDefault();
        showLogin();
    }
});

// MOBILE SWIPE SUPPORT
let startX = 0;
let currentX = 0;
let isDragging = false;

const panel = document.getElementById('slidingPanel');

if (panel) {
    panel.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
        isDragging = true;
    }, { passive: true });

    panel.addEventListener('touchmove', function(e) {
        if (!isDragging) return;
        currentX = e.touches[0].clientX;
        const diffX = startX - currentX;

        if (Math.abs(diffX) > 50) {
            if (diffX > 0) {
                // Swipe left
                if (currentPanel === 'login') showRegister();
                else if (currentPanel === 'register') showLupaPw();
            } else {
                // Swipe right
                if (currentPanel === 'register') showLogin();
                else if (currentPanel === 'forgot') showRegister();
            }
            isDragging = false;
        }
    }, { passive: true });

    panel.addEventListener('touchend', function() {
        isDragging = false;
    }, { passive: true });
}

// INPUT VALIDATION
function setupInputValidation() {
    const inputs = document.querySelectorAll('input, select');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.classList.add('scale-[1.02]');
        });

        input.addEventListener('blur', function() {
            this.classList.remove('scale-[1.02]');
        });

        input.addEventListener('input', function() {
            if (this.checkValidity()) {
                this.classList.remove('border-red-300', 'focus:border-red-500');
                this.classList.add('border-green-300', 'focus:border-green-500');
            } else {
                this.classList.remove('border-green-300', 'focus:border-green-500');
                this.classList.add('border-red-300', 'focus:border-red-500');
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', function() {
    showLogin();
    setupPasswordToggle();
    setupInputValidation();
    updatePasswordStrength();

    const elements = document.querySelectorAll('.space-y-6 > *, .space-y-8 > *');
    elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';

        setTimeout(() => {
            element.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, index * 100);
    });
});

// PREVENT HORIZONTAL SCROLL
document.addEventListener('wheel', function(e) {
    if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) {
        e.preventDefault();
    }
}, { passive: false });