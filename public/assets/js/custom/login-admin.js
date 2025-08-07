  
        let currentStep = 1;
        let countdownTimer = null;
        let tempToken = null; 

        // Utility functions
        function showStep(stepNumber) {
            // Hide all steps
            for (let i = 1; i <= 5; i++) {
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

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (password.type === 'password') {
                password.type = 'text';
                eyeIcon.className = 'ph ph-eye-slash text-sm';
            } else {
                password.type = 'password';
                eyeIcon.className = 'ph ph-eye text-sm';
            }
        });

        // OTP input handling
        function setupOTPInputs() {
            const otpInputs = document.querySelectorAll('[id^="otp"]');
            
            otpInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
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
                
                input.addEventListener('keydown', function(e) {
                    // Handle backspace to move to previous input
                    if (e.key === 'Backspace' && this.value === '' && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                });
            });
        }

        // Initialize OTP inputs
        setupOTPInputs();

        // Handle login form submission (Step 1)
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            
            // Clear previous errors
            hideError('username');
            hideError('password');
            
            // Validation
            let isValid = true;
            
            if (!username) {
                showError('username', 'Username atau email wajib diisi');
                isValid = false;
            }
            
            if (!password) {
                showError('password', 'Password wajib diisi');
                isValid = false;
            } else if (password.length < 6) {
                showError('password', 'Password minimal 6 karakter');
                isValid = false;
            }
            
            if (!isValid) return;
            
            // Show loading state
            const loginBtn = document.getElementById('loginBtn');
            const loginBtnText = document.getElementById('loginBtnText');
            
            loginBtn.disabled = true;
            loginBtnText.innerHTML = `
                <div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></div>
                Memverifikasi...
            `;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button state
                loginBtn.disabled = false;
                loginBtnText.innerHTML = `
                    Lanjutkan Verifikasi
                    <i class="ph ph-arrow-right ml-1.5 text-sm"></i>
                `;
                
                // Update email display for OTP
                const emailDisplay = document.getElementById('emailDisplay');
                if (username.includes('@')) {
                    emailDisplay.textContent = username;
                } else {
                    emailDisplay.textContent = 'admin@codeverse.com';
                }
                
                // Move to OTP step
                showStep(2);
                startCountdown();
            }, 2000);
        });

        // Handle forgot password button
        document.getElementById('forgotPasswordBtn').addEventListener('click', function(e) {
            e.preventDefault();
            showStep(3);
        });

        // Handle forgot password form submission
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('resetEmail').value.trim();
            
            // Clear previous errors
            hideError('resetEmail');
            
            // Validation
            if (!email) {
                showError('resetEmail', 'Email wajib diisi');
                return;
            }
            
            if (!validateEmail(email)) {
                showError('resetEmail', 'Format email tidak valid');
                return;
            }
            
            // Show loading state
            const resetBtn = document.getElementById('resetBtn');
            const resetBtnText = document.getElementById('resetBtnText');
            
            resetBtn.disabled = true;
            resetBtnText.innerHTML = `
                <div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></div>
                Mengirim...
            `;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button state
                resetBtn.disabled = false;
                resetBtnText.innerHTML = `
                    Kirim Link Reset Password
                    <i class="ph ph-paper-plane-tilt ml-1.5 text-sm"></i>
                `;
                
                // Move to reset sent step
                showStep(4);
            }, 2000);
        });

        // Handle back buttons
        document.getElementById('backBtn').addEventListener('click', function() {
            showStep(1);
            if (countdownTimer) {
                clearInterval(countdownTimer);
                countdownTimer = null;
            }
        });

        document.getElementById('backToLoginBtn').addEventListener('click', function() {
            showStep(1);
        });

        document.getElementById('backToLoginFromResetBtn').addEventListener('click', function() {
            showStep(1);
        });

        // Handle OTP verification
        document.getElementById('verifyBtn').addEventListener('click', function() {
            const otpInputs = document.querySelectorAll('[id^="otp"]');
            let otp = '';
            
            otpInputs.forEach(input => {
                otp += input.value;
            });
            
            // Clear previous errors
            hideError('otp');
            
            if (otp.length !== 4) {
                showError('otp', 'Masukkan sesuai dengan kode yng di kirim');
                return;
            }
            
            // Show loading state
            const verifyBtn = document.getElementById('verifyBtn');
            const verifyBtnText = document.getElementById('verifyBtnText');
            
            verifyBtn.disabled = true;
            verifyBtnText.innerHTML = `
                <div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></div>
                Memverifikasi...
            `;
            
            // Simulate API call
            setTimeout(() => {
                // Clear countdown timer
                if (countdownTimer) {
                    clearInterval(countdownTimer);
                    countdownTimer = null;
                }
                
                // Reset button state
                verifyBtn.disabled = false;
                verifyBtnText.innerHTML = `
                    Verifikasi dan Masuk
                    <i class="ph ph-shield-check ml-1.5 text-sm"></i>
                `;
                
                // Move to success step
                showStep(5);
                
                // Redirect after 3 seconds
                setTimeout(() => {
                    alert('Berhasil login! Mengalihkan ke dashboard...');
                    // window.location.href = '/admin/dashboard';
                }, 3000);
            }, 2000);
        });

        // Countdown timer
        function startCountdown() {
            let time = 300; // 5 minutes
            const countdown = document.getElementById('countdown');
            const resendBtn = document.getElementById('resendBtn');
            
            // Clear existing timer if any
            if (countdownTimer) {
                clearInterval(countdownTimer);
            }
            
            countdownTimer = setInterval(() => {
                const minutes = Math.floor(time / 60);
                const seconds = time % 60;
                countdown.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                
                if (time === 0) {
                    clearInterval(countdownTimer);
                    countdownTimer = null;
                    countdown.textContent = '00:00';
                    resendBtn.classList.remove('hidden');
                }
                
                time--;
            }, 1000);
        }

        // Resend OTP code
        document.getElementById('resendBtn').addEventListener('click', function() {
            this.classList.add('hidden');
            startCountdown();
            
            // Clear OTP inputs
            const otpInputs = document.querySelectorAll('[id^="otp"]');
            otpInputs.forEach(input => {
                input.value = '';
            });
            
            // Focus first input
            document.getElementById('otp1').focus();
            
            // Show success message
            const originalText = this.textContent;
            this.textContent = 'Kode baru telah dikirim!';
            this.classList.remove('text-blue-600', 'hover:text-blue-700');
            this.classList.add('text-green-600');
            
            setTimeout(() => {
                this.textContent = originalText;
                this.classList.remove('text-green-600');
                this.classList.add('text-blue-600', 'hover:text-blue-700');
            }, 2000);
        });

        // Resend reset email
        document.getElementById('resendResetBtn').addEventListener('click', function() {
            const originalText = this.textContent;
            this.textContent = 'Email reset telah dikirim ulang!';
            this.classList.add('text-green-600');
            
            setTimeout(() => {
                this.textContent = originalText;
                this.classList.remove('text-green-600');
            }, 3000);
        });

        // Clear form errors when user starts typing
        document.getElementById('username').addEventListener('input', () => hideError('username'));
        document.getElementById('password').addEventListener('input', () => hideError('password'));
        document.getElementById('resetEmail').addEventListener('input', () => hideError('resetEmail'));

        // Handle Enter key for OTP inputs
        document.querySelectorAll('[id^="otp"]').forEach(input => {
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    document.getElementById('verifyBtn').click();
                }
            });
        });

        // Auto-focus first input when OTP step is shown
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.target.id === 'step2' && mutation.target.classList.contains('step-visible')) {
                    setTimeout(() => {
                        document.getElementById('otp1').focus();
                    }, 100);
                }
            });
        });

        observer.observe(document.getElementById('step2'), {
            attributes: true,
            attributeFilter: ['class']
        });

        // Prevent form submission on Enter for OTP step
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && currentStep === 2) {
                e.preventDefault();
                document.getElementById('verifyBtn').click();
            }
        });

        console.log('CodeVerse Admin Portal - Login System Initialized');