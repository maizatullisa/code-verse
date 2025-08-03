// Global variables
        let currentStep = 1;
        const totalSteps = 3;

        // DOM elements
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const currentStepElement = document.getElementById('current-step');

        // Update progress
        function updateProgress() {
            const progress = (currentStep / totalSteps) * 100;
            progressBar.style.width = `${progress}%`;
            progressText.textContent = `${Math.round(progress)}%`;
            currentStepElement.textContent = currentStep;
        }

        // Show step
        function showStep(step) {
            // Hide all step contents
            document.querySelectorAll('.step-content').forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('active');
            });

            // Show current step
            const currentStepContent = document.getElementById(`step-${step}`);
            currentStepContent.classList.remove('hidden');
            currentStepContent.classList.add('active');

            // Update button states
            prevBtn.disabled = step === 1;
            
            if (step === totalSteps) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
                updateSummary(); // Update summary on final step
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }

            updateProgress();
        }

        // Update summary in step 3
        function updateSummary() {
            const personalForm = document.getElementById('personal-form');
            const preferencesForm = document.getElementById('preferences-form');

            // Update summary fields
            document.getElementById('summary-name').textContent = 
                personalForm.querySelector('[name="full_name"]').value || '-';
            document.getElementById('summary-email').textContent = 
                personalForm.querySelector('[name="email"]').value || '-';
            document.getElementById('summary-whatsapp').textContent = 
                personalForm.querySelector('[name="whatsapp"]').value || '-';
            document.getElementById('summary-education').textContent = 
                personalForm.querySelector('[name="education"]').value || '-';

            // Get selected schedule
            const selectedSchedule = preferencesForm.querySelector('[name="schedule"]:checked');
            if (selectedSchedule) {
                const scheduleLabels = {
                    'weekday': 'Hari Kerja',
                    'weekend': 'Weekend',
                    'evening': 'Malam Hari',
                    'flexible': 'Fleksibel'
                };
                document.getElementById('summary-schedule').textContent = 
                    scheduleLabels[selectedSchedule.value] || '-';
            }
        }

        // Validate current step
        function validateCurrentStep() {
            const currentForm = document.querySelector(`#step-${currentStep} form`);
            if (!currentForm) return true;

            const requiredFields = currentForm.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (field.type === 'radio') {
                    const radioGroup = currentForm.querySelectorAll(`[name="${field.name}"]`);
                    const isChecked = Array.from(radioGroup).some(radio => radio.checked);
                    if (!isChecked) {
                        isValid = false;
                        showNotification('Mohon lengkapi semua field yang wajib diisi', 'error');
                    }
                } else if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                    showNotification('Mohon lengkapi semua field yang wajib diisi', 'error');
                } else {
                    field.classList.remove('border-red-500');
                }
            });

            return isValid;
        }

        // Validate step 3 (terms checkbox)
        function validateStep3() {
            const termsCheckbox = document.getElementById('terms-checkbox');
            if (!termsCheckbox.checked) {
                showNotification('Anda harus menyetujui Syarat & Ketentuan untuk melanjutkan', 'error');
                return false;
            }
            return true;
        }

        // Show notification
        function showNotification(message, type = 'info') {
            const colors = {
                success: 'bg-green-500',
                error: 'bg-red-500',
                warning: 'bg-yellow-500',
                info: 'bg-blue-500'
            };
            
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 ${colors[type]} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }

        // Next button handler
        nextBtn.addEventListener('click', function() {
            if (validateCurrentStep()) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                    showNotification(`Melanjutkan ke langkah ${currentStep}`, 'success');
                    
                    // Scroll to top
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            }
        });

        // Previous button handler
        prevBtn.addEventListener('click', function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
                showNotification(`Kembali ke langkah ${currentStep}`, 'info');
                
                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });

        // Submit button handler
        submitBtn.addEventListener('click', function() {
            if (validateCurrentStep() && validateStep3()) {
                const loadingOverlay = document.getElementById('loadingOverlay');
                loadingOverlay.classList.remove('hidden');
                
                // Simulate processing
                setTimeout(() => {
                    loadingOverlay.classList.add('hidden');
                    
                    // Show success modal
                    const successModal = document.getElementById('successModal');
                    successModal.classList.remove('hidden');
                    
                    showNotification('Selamat! Pendaftaran berhasil dan Anda mendapat akses GRATIS!', 'success');
                }, 2000);
            }
        });

        // Success modal button handlers
        document.getElementById('accessCourseBtn').addEventListener('click', function() {
            // Redirect to course forum
            window.location.href = 'forum-siswa.html';
        });

        document.getElementById('goToDashboardBtn').addEventListener('click', function() {
            // Redirect to dashboard
            window.location.href = 'dashboard.html';
        });

        // Form validation enhancements
        document.querySelectorAll('input[required], select[required]').forEach(field => {
            field.addEventListener('blur', function() {
                if (!this.value.trim()) {
                    this.classList.add('border-red-500');
                } else {
                    this.classList.remove('border-red-500');
                }
            });

            field.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('border-red-500');
                }
            });
        });

        // Email validation
        document.querySelector('input[name="email"]').addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.classList.add('border-red-500');
                showNotification('Format email tidak valid', 'error');
            } else {
                this.classList.remove('border-red-500');
            }
        });

        // Phone number formatting
        document.querySelector('input[name="whatsapp"]').addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.startsWith('0')) {
                value = '62' + value.substring(1);
            }
            if (!value.startsWith('62')) {
                value = '62' + value;
            }
            
            // Format: +62 812 3456 7890
            if (value.length > 2) {
                value = value.replace(/(\d{2})(\d{3})(\d{4})(\d{4})/, '+$1 $2 $3 $4');
            }
            
            this.value = value;
        });

        // Radio/checkbox visual enhancements
        document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
            input.addEventListener('change', function() {
                if (this.type === 'radio') {
                    // Remove active state from other radio buttons in the same group
                    document.querySelectorAll(`input[name="${this.name}"]`).forEach(radio => {
                        const label = radio.closest('label');
                        if (label) {
                            label.classList.remove('border-p2', 'bg-p2/5');
                            label.classList.add('border-gray-300');
                        }
                    });
                }

                // Add active state to current selection
                const label = this.closest('label');
                if (label && this.checked) {
                    label.classList.remove('border-gray-300');
                    label.classList.add('border-p2', 'bg-p2/5');
                }
            });
        });

        // Countdown timer
        function updateCountdown() {
            const endDate = new Date();
            endDate.setDate(endDate.getDate() + 7);
            endDate.setHours(23, 59, 59);

            const now = new Date();
            const timeLeft = endDate - now;

            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = days.toString().padStart(2, '0');
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }

        // Close modal when clicking outside
        document.getElementById('successModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch (e.key) {
                    case 'ArrowRight':
                        e.preventDefault();
                        if (currentStep < totalSteps && !nextBtn.classList.contains('hidden')) {
                            nextBtn.click();
                        } else if (currentStep === totalSteps) {
                            submitBtn.click();
                        }
                        break;
                    case 'ArrowLeft':
                        e.preventDefault();
                        if (currentStep > 1) {
                            prevBtn.click();
                        }
                        break;
                }
            }
        });

        // Prevent form submission on Enter key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
                e.preventDefault();
                if (currentStep < totalSteps) {
                    nextBtn.click();
                } else {
                    submitBtn.click();
                }
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            showStep(1);
            updateCountdown();
            setInterval(updateCountdown, 1000);
            
            // Welcome message
            setTimeout(() => {
                showNotification('Selamat datang! Daftar GRATIS dan mulai belajar React JS sekarang!', 'success');
            }, 500);
        });
