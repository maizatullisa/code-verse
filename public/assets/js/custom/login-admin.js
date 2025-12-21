document.addEventListener('DOMContentLoaded', function () {
    console.log('CodeVerse Admin Portal - Login Initialized');

    let currentStep = 1;
    let countdownTimer = null;

    // ===========================
    // UTILITY FUNCTIONS
    // ===========================
    
    function showStep(stepNumber) {
        // Hide all steps
        for (let i = 1; i <= 6; i++) {
            const step = document.getElementById(`step${i}`);
            if (step) {
                step.classList.remove('step-visible');
                step.classList.add('step-hidden');
            }
        }
        
        // Show target step after transition
        setTimeout(() => {
            const targetStep = document.getElementById(`step${stepNumber}`);
            if (targetStep) {
                targetStep.classList.remove('step-hidden');
                targetStep.classList.add('step-visible');
                currentStep = stepNumber;
            }
        }, 400);
    }

    function showError(fieldId, message) {
        const errorElement = document.getElementById(`${fieldId}Error`);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }
    }

    function hideError(fieldId) {
        const errorElement = document.getElementById(`${fieldId}Error`);
        if (errorElement) {
            errorElement.classList.add('hidden');
        }
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function showNotification(message, type = 'info') {
        const bgColor = type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6';
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${bgColor};
            color: white;
            padding: 16px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            z-index: 9999;
            font-size: 14px;
            font-weight: 600;
            animation: slideIn 0.3s ease-out;
        `;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease-out';
            setTimeout(() => document.body.removeChild(notification), 300);
        }, 3000);
    }

    // ===========================
    // PASSWORD TOGGLE
    // ===========================
    
    const togglePassword = document.getElementById('togglePassword');
    if (togglePassword) {
        togglePassword.addEventListener('click', function () {
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (password && eyeIcon) {
                if (password.type === 'password') {
                    password.type = 'text';
                    eyeIcon.className = 'ph ph-eye-slash text-sm';
                } else {
                    password.type = 'password';
                    eyeIcon.className = 'ph ph-eye text-sm';
                }
            }
        });
    }

    // Toggle New Password
    const toggleNewPassword = document.getElementById('toggleNewPassword');
    if (toggleNewPassword) {
        toggleNewPassword.addEventListener('click', function () {
            const newPassword = document.getElementById('newPassword');
            const icon = document.getElementById('newPasswordIcon');

            if (newPassword && icon) {
                if (newPassword.type === 'password') {
                    newPassword.type = 'text';
                    icon.className = 'ph ph-eye-slash text-sm';
                } else {
                    newPassword.type = 'password';
                    icon.className = 'ph ph-eye text-sm';
                }
            }
        });
    }

    // Toggle Confirm Password
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    if (toggleConfirmPassword) {
        toggleConfirmPassword.addEventListener('click', function () {
            const confirmPassword = document.getElementById('confirmNewPassword');
            const icon = document.getElementById('confirmPasswordIcon');

            if (confirmPassword && icon) {
                if (confirmPassword.type === 'password') {
                    confirmPassword.type = 'text';
                    icon.className = 'ph ph-eye-slash text-sm';
                } else {
                    confirmPassword.type = 'password';
                    icon.className = 'ph ph-eye text-sm';
                }
            }
        });
    }

    // ===========================
    // NAVIGATION BUTTONS
    // ===========================
    
    // Forgot Password Button
    const forgotPasswordBtn = document.getElementById('forgotPasswordBtn');
    if (forgotPasswordBtn) {
        forgotPasswordBtn.addEventListener('click', function (e) {
            e.preventDefault();
            showStep(3);
        });
    }

    // Back to Login dari Forgot Password
    const backToLoginBtn = document.getElementById('backToLoginBtn');
    if (backToLoginBtn) {
        backToLoginBtn.addEventListener('click', function () {
            showStep(1);
        });
    }

    // Back dari Email Sent ke Forgot Password
    const backToForgotBtn = document.getElementById('backToForgotBtn');
    if (backToForgotBtn) {
        backToForgotBtn.addEventListener('click', function () {
            showStep(3);
        });
    }

    // Continue to OTP dari Email Sent
    const continueToOtpBtn = document.getElementById('continueToOtpBtn');
    if (continueToOtpBtn) {
        continueToOtpBtn.addEventListener('click', function () {
            showStep(5);
            // Focus ke input OTP pertama
            const otp1 = document.getElementById('otp1');
            if (otp1) otp1.focus();
            // Start countdown timer
            startOtpCountdown();
        });
    }

    // Back dari OTP ke Email Sent
    const backToEmailSentBtn = document.getElementById('backToEmailSentBtn');
    if (backToEmailSentBtn) {
        backToEmailSentBtn.addEventListener('click', function () {
            // Clear countdown timer
            if (countdownTimer) {
                clearInterval(countdownTimer);
                countdownTimer = null;
            }
            showStep(4);
        });
    }

    // ===========================
    // OTP COUNTDOWN TIMER (5 MENIT)
    // ===========================
    
    function startOtpCountdown() {
        let timeLeft = 300; // 5 menit = 300 detik
        const countdownElement = document.getElementById('otpCountdown');
        const resendBtn = document.getElementById('resendOtpBtn');
        
        // Clear existing timer if any
        if (countdownTimer) {
            clearInterval(countdownTimer);
            countdownTimer = null;
        }
        
        // Reset dan hide resend button
        if (resendBtn) {
            resendBtn.classList.add('hidden');
        }
        
        // Reset countdown display color
        if (countdownElement) {
            countdownElement.classList.remove('text-red-500');
        }
        
        // Update immediately first
        if (countdownElement) {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            countdownElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }
        
        countdownTimer = setInterval(() => {
            timeLeft--;
            
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            
            if (countdownElement) {
                countdownElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }
            
            if (timeLeft <= 0) {
                clearInterval(countdownTimer);
                countdownTimer = null;
                if (countdownElement) {
                    countdownElement.textContent = '00:00';
                    countdownElement.classList.add('text-red-500');
                }
                // Show resend button
                if (resendBtn) {
                    resendBtn.classList.remove('hidden');
                }
            }
        }, 1000);
        
        console.log('OTP countdown started - 5 minutes');
    }
    
    // Resend OTP dari Step 5
    const resendOtpBtn = document.getElementById('resendOtpBtn');
    if (resendOtpBtn) {
    resendOtpBtn.addEventListener('click', function () {
        const email = document.getElementById('resetEmail').value.trim();
        
        if (!email) {
            showNotification('Email tidak ditemukan! Kembali ke halaman Lupa Password.', 'error');
            showStep(3); // Kembali ke halaman Lupa Password
            return;
        }

        const originalText = this.textContent;
        this.textContent = 'Mengirim...';
        this.disabled = true;
        
        fetch('/auth/send-otp', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ email })
        })
        .then(res => {
            this.textContent = originalText;
            this.disabled = false;
            
            if (!res.ok) {
                showNotification('Email tidak ditemukan! Silakan coba lagi.', 'error');
                showStep(3); // Kembali ke halaman Lupa Password jika gagal
                return;
            }

            return res.json();
        })
        .then(res => {
            if (res && res.message) {
                showNotification('Kode OTP baru telah dikirim 📧', 'success');
                // Reset countdown OTP
                startOtpCountdown();
            }
        })
        .catch(err => {
            this.textContent = originalText;
            this.disabled = false;
            showNotification('Gagal mengirim OTP! Silakan coba lagi.', 'error');
            console.error('Resend OTP error:', err);
        });
    });
}

    // ===========================
    // OTP INPUT HANDLING
    // ===========================
    
    const otpInputs = document.querySelectorAll('.otp-input');
    otpInputs.forEach((input, index) => {
        input.addEventListener('input', function () {
            const value = this.value;
            
            // Only allow numbers
            if (!/^\d*$/.test(value)) {
                this.value = '';
                return;
            }
            
            // Move to next input if filled
            if (value.length === 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });
        
        input.addEventListener('keydown', function (e) {
            // Handle backspace to move to previous input
            if (e.key === 'Backspace' && this.value === '' && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
    });

    // ===========================
    // FORGOT PASSWORD FORM (SEND OTP)
    // ===========================
    
const forgotPasswordForm = document.getElementById('forgotPasswordForm');
if (forgotPasswordForm) {
    forgotPasswordForm.addEventListener('submit', function (e) {
        e.preventDefault();
        
        const email = document.getElementById('resetEmail').value.trim();
        
        hideError('resetEmail'); // Hilangkan error sebelumnya
        
        if (!email) {
            showError('resetEmail', 'Email wajib diisi');
            return;
        }
        
        if (!validateEmail(email)) {
            showError('resetEmail', 'Format email tidak valid');
            return;
        }
        
        const resetBtn = document.getElementById('resetBtn');
        const resetBtnText = document.getElementById('resetBtnText');
        
        resetBtn.disabled = true;
        resetBtnText.innerHTML = `
            <div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></div>
            Memproses...
        `;
        
        // ✅ Kirim OTP ke Backend
        fetch('/auth/send-otp', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ email })
        })
        .then(res => {
            resetBtn.disabled = false; // Aktifkan kembali tombol jika berhasil
            resetBtnText.innerHTML = `Kirim Link Reset Password`;
            
            if (!res.ok) {
                // Jika email tidak ditemukan, jangan pindah ke halaman berikutnya
                showNotification('Email tidak ditemukan. Silakan coba lagi.', 'error');
                return; // Hentikan alur di sini
            }

            return res.json();
        })
        .then(res => {
            if (res && res.message) {
                showNotification(res.message, 'success');
                // Update tampilan email dan pindah ke halaman "Email Terkirim"
                const displayEmail = document.getElementById('displayEmail');
                if (displayEmail) displayEmail.textContent = email;
                showStep(4); // Pindah ke langkah berikutnya (Email Sent)
            }
        })
        .catch(() => {
            resetBtn.disabled = false;
            resetBtnText.innerHTML = `Kirim Link Reset Password`;
            showNotification('Terjadi masalah. Silakan coba lagi.', 'error');
        });
    });
}

    // ===========================
    // RESEND OTP
    // ===========================
    
    const resendResetBtn = document.getElementById('resendResetBtn');
    if (resendResetBtn) {
        resendResetBtn.addEventListener('click', function () {
            const email = document.getElementById('resetEmail').value.trim();
            
            if (!email) {
                showNotification('Email tidak ditemukan!', 'error');
                showStep(3);
                return;
            }

            const originalText = this.textContent;
            this.textContent = 'Mengirim...';
            this.disabled = true;
            
            fetch('/auth/send-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ email })
            })
            .then(res => res.json())
            .then(res => {
                this.disabled = false;
                if (res.message) {
                    this.textContent = 'Email terkirim! ✓';
                    this.classList.add('text-green-600');
                    showNotification('Kode OTP baru telah dikirim 📧', 'success');
                    
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.classList.remove('text-green-600');
                    }, 3000);
                } else {
                    this.textContent = originalText;
                    showNotification('Gagal mengirim OTP!', 'error');
                }
            })
            .catch(err => {
                this.disabled = false;
                this.textContent = originalText;
                showNotification('Gagal mengirim OTP!', 'error');
                console.error('Resend OTP error:', err);
            });
        });
    }

    // ===========================
    // VERIFY OTP FORM
    // ===========================
    
    const otpForm = document.getElementById('otpForm');
    if (otpForm) {
        otpForm.addEventListener('submit', function (e) {
            e.preventDefault();
            
            const otpInputs = document.querySelectorAll('.otp-input');
            let otp = '';
            otpInputs.forEach(input => otp += input.value.trim());
            
            hideError('otp');
            
            if (otp.length !== 4) {
                showError('otp', 'Masukkan 4 digit kode OTP lengkap');
                return;
            }
            
            const email = document.getElementById('resetEmail').value.trim();
            const verifyBtn = document.getElementById('verifyOtpBtn');
            const verifyBtnText = document.getElementById('verifyOtpBtnText');
            
            verifyBtn.disabled = true;
            verifyBtnText.innerHTML = `
                <div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></div>
                Memverifikasi...
            `;
            
            // ✅ Verify OTP ke Backend
            fetch('/auth/verify-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ email, otp })
            })
            .then(res => res.json())
            .then(res => {
                verifyBtn.disabled = false;
                verifyBtnText.innerHTML = `
                    Verifikasi Kode
                    <i class="ph ph-check-circle ml-1.5 text-sm"></i>
                `;
                
                if (res.message === 'OTP valid') {
                    showNotification('Kode OTP valid! Silakan buat password baru 🔐', 'success');
                    // Clear countdown timer
                    if (countdownTimer) {
                        clearInterval(countdownTimer);
                        countdownTimer = null;
                    }
                    showStep(6);
                } else {
                    showNotification(res.message || 'OTP tidak valid!', 'error');
                }
            })
            .catch(err => {
                verifyBtn.disabled = false;
                verifyBtnText.innerHTML = `
                    Verifikasi Kode
                    <i class="ph ph-check-circle ml-1.5 text-sm"></i>
                `;
                showNotification('Gagal verifikasi OTP!', 'error');
                console.error('Verify OTP error:', err);
            });
        });
    }

    // ===========================
    // NEW PASSWORD FORM
    // ===========================
    
    const newPasswordForm = document.getElementById('newPasswordForm');
    if (newPasswordForm) {
        newPasswordForm.addEventListener('submit', function (e) {
            e.preventDefault();
            
            const newPassword = document.getElementById('newPassword').value.trim();
            const confirmPassword = document.getElementById('confirmNewPassword').value.trim();
            
            hideError('newPassword');
            hideError('confirmNewPassword');
            
            if (!newPassword) {
                showError('newPassword', 'Password baru wajib diisi');
                return;
            }
            
            if (newPassword.length < 8) {
                showError('newPassword', 'Password minimal 8 karakter');
                return;
            }
            
            if (!confirmPassword) {
                showError('confirmNewPassword', 'Konfirmasi password wajib diisi');
                return;
            }
            
            if (newPassword !== confirmPassword) {
                showError('confirmNewPassword', 'Password tidak cocok');
                return;
            }
            
            const email = document.getElementById('resetEmail').value.trim();
            const otpInputs = document.querySelectorAll('.otp-input');
            let otp = '';
            otpInputs.forEach(input => otp += input.value.trim());
            
            const saveBtn = document.getElementById('savePasswordBtn');
            const saveBtnText = document.getElementById('savePasswordBtnText');
            
            saveBtn.disabled = true;
            saveBtnText.innerHTML = `
                <div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></div>
                Menyimpan...
            `;
            
            // ✅ Reset Password ke Backend
            fetch('/auth/reset-password', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    email,
                    otp,
                    new_password: newPassword,
                    new_password_confirmation: confirmPassword
                })
            })
            .then(res => res.json())
            .then(res => {
                saveBtn.disabled = false;
                saveBtnText.innerHTML = `
                    Simpan Password Baru
                    <i class="ph ph-check ml-1.5 text-sm"></i>
                `;
                
                if (res.message === 'Password berhasil direset!') {
                    showNotification(res.message, 'success');
                    setTimeout(() => showStep(1), 1500);
                } else {
                    showNotification(res.message || 'Gagal reset password!', 'error');
                }
            })
            .catch(err => {
                saveBtn.disabled = false;
                saveBtnText.innerHTML = `
                    Simpan Password Baru
                    <i class="ph ph-check ml-1.5 text-sm"></i>
                `;
                showNotification('Gagal reset password!', 'error');
                console.error('Reset password error:', err);
            });
        });
    }

    // ===========================
    // CLEAR ERROR ON INPUT
    // ===========================
    
    const username = document.getElementById('username');
    if (username) {
        username.addEventListener('input', function () {
            hideError('username');
        });
    }

    const password = document.getElementById('password');
    if (password) {
        password.addEventListener('input', function () {
            hideError('password');
        });
    }

    const resetEmail = document.getElementById('resetEmail');
    if (resetEmail) {
        resetEmail.addEventListener('input', function () {
            hideError('resetEmail');
        });
    }

    const newPassword = document.getElementById('newPassword');
    if (newPassword) {
        newPassword.addEventListener('input', function () {
            hideError('newPassword');
        });
    }

    const confirmNewPassword = document.getElementById('confirmNewPassword');
    if (confirmNewPassword) {
        confirmNewPassword.addEventListener('input', function () {
            hideError('confirmNewPassword');
        });
    }

    console.log('Admin Login System Ready');
    console.log('✓ Login form submits to Laravel backend');
    console.log('✓ Forgot password with OTP complete');
    console.log('✓ All steps: Login → Email → OTP → New Password');
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);