 // Global variables
        let currentStep = 1;
        const totalSteps = 3;
        let courseData = null;

        // DOM elements
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const currentStepElement = document.getElementById('current-step');

        // Initialize course data from URL parameters or localStorage
        function initializeCourseData() {
            const urlParams = new URLSearchParams(window.location.search);
            const courseId = urlParams.get('courseId');
            
            // Sample course data - in real app, fetch from API
            const sampleCourseData = {
                id: courseId || '1',
                title: urlParams.get('title') || 'Kelas Programming',
                instructor: urlParams.get('instructor') || 'Instructor',
                image: urlParams.get('image') || 'https://via.placeholder.com/64x64/3B82F6/FFFFFF?text=Course',
                rating: urlParams.get('rating') || '5.0',
                reviews: urlParams.get('reviews') || '0',
                price: urlParams.get('price') || 'Rp 500.000',
                originalPrice: urlParams.get('originalPrice') || null,
                discount: urlParams.get('discount') || null,
                isFree: urlParams.get('isFree') === 'true',
                duration: urlParams.get('duration') || '4 minggu pembelajaran',
                videos: urlParams.get('videos') || '12 video pembelajaran',
                materials: urlParams.get('materials') || '8 materi bacaan',
                certificate: urlParams.get('certificate') !== 'false',
                lifetime: urlParams.get('lifetime') !== 'false',
                community: urlParams.get('community') !== 'false',
                hasOffer: urlParams.get('hasOffer') === 'true',
                hasCountdown: urlParams.get('hasCountdown') === 'true',
                hasStudentCount: urlParams.get('hasStudentCount') === 'true',
                currentStudents: parseInt(urlParams.get('currentStudents')) || 0,
                maxStudents: parseInt(urlParams.get('maxStudents')) || 100,
                benefits: [
                    urlParams.get('duration') || '4 minggu pembelajaran',
                    urlParams.get('videos') || '12 video pembelajaran', 
                    urlParams.get('materials') || '8 materi bacaan',
                    'Akses Forum Diskusi',
                    'Sertifikat Digital',
                    'Akses Seumur Hidup'
                ]
            };

            courseData = sampleCourseData;
            populateCourseInfo();
        }

        // Populate course information in the UI
        function populateCourseInfo() {
            if (!courseData) return;

            // Header
            document.getElementById('course-title-header').textContent = courseData.title;
            document.title = `Pendaftaran Kelas - ${courseData.title}`;

            // Sidebar course info
            document.getElementById('course-title').textContent = courseData.title;
            document.getElementById('course-instructor').textContent = `by ${courseData.instructor}`;
            document.getElementById('course-image').src = courseData.image;
            document.getElementById('course-image').alt = courseData.title;
            
            // Rating
            const stars = '⭐'.repeat(Math.floor(parseFloat(courseData.rating)));
            document.getElementById('course-rating').textContent = stars;
            document.getElementById('course-reviews').textContent = `${courseData.rating} (${courseData.reviews})`;

            // Price
            if (courseData.isFree) {
                document.getElementById('course-price').innerHTML = '<span class="text-green-600">GRATIS</span>';
                document.getElementById('submit-text').textContent = 'Daftar GRATIS Sekarang!';
                document.getElementById('offer-banner').classList.remove('hidden');
            } else {
                document.getElementById('course-price').textContent = courseData.price;
                if (courseData.originalPrice) {
                    document.getElementById('course-original-price').textContent = courseData.originalPrice;
                    document.getElementById('course-original-price').classList.remove('hidden');
                }
                if (courseData.discount) {
                    document.getElementById('course-discount').textContent = `Diskon ${courseData.discount}%`;
                    document.getElementById('course-discount').classList.remove('hidden');
                }
            }

            // Course details
            const detailsContainer = document.getElementById('course-details');
            detailsContainer.innerHTML = `
                <div class="flex items-center gap-2">
                    <i class="ph ph-clock text-gray-400"></i>
                    <span>${courseData.duration}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph ph-video text-gray-400"></i>
                    <span>${courseData.videos}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph ph-file-text text-gray-400"></i>
                    <span>${courseData.materials}</span>
                </div>
                ${courseData.certificate ? `<div class="flex items-center gap-2">
                    <i class="ph ph-certificate text-gray-400"></i>
                    <span>Sertifikat completion</span>
                </div>` : ''}
                ${courseData.lifetime ? `<div class="flex items-center gap-2">
                    <i class="ph ph-infinity text-gray-400"></i>
                    <span>Akses seumur hidup</span>
                </div>` : ''}
                ${courseData.community ? `<div class="flex items-center gap-2">
                    <i class="ph ph-users text-gray-400"></i>
                    <span>Forum diskusi</span>
                </div>` : ''}
            `;

            // Benefits
            const benefitsList = document.getElementById('benefits-list');
            benefitsList.innerHTML = courseData.benefits.map(benefit => `
                <div class="flex items-center gap-2">
                    <i class="ph ph-check text-green-600"></i>
                    <span>${benefit}</span>
                </div>
            `).join('');

            // Conditional elements
            if (courseData.hasCountdown) {
                document.getElementById('countdown-timer').classList.remove('hidden');
                updateCountdown();
            }

            if (courseData.hasStudentCount) {
                document.getElementById('student-count').classList.remove('hidden');
                updateStudentCount();
            }
        }

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
                
                // Collect form data
                const formData = collectFormData();
                
                // Here you would send data to your backend
                console.log('Form Data:', formData);
                
                // Simulate processing
                setTimeout(() => {
                    loadingOverlay.classList.add('hidden');
                    
                    // Show success modal
                    const successModal = document.getElementById('successModal');
                    successModal.classList.remove('hidden');
                    
                    const message = courseData.isFree ? 
                        'Selamat! Pendaftaran berhasil dan Anda mendapat akses GRATIS!' : 
                        'Selamat! Pendaftaran berhasil! Silakan lakukan pembayaran untuk mengakses kelas.';
                    showNotification(message, 'success');
                }, 2000);
            }
        });

        // Collect form data
        function collectFormData() {
            const personalForm = document.getElementById('personal-form');
            const preferencesForm = document.getElementById('preferences-form');
            
            const formData = {
                courseId: courseData.id,
                courseTitle: courseData.title,
                personalInfo: {
                    fullName: personalForm.querySelector('[name="full_name"]').value,
                    email: personalForm.querySelector('[name="email"]').value,
                    whatsapp: personalForm.querySelector('[name="whatsapp"]').value,
                    birthDate: personalForm.querySelector('[name="birth_date"]').value,
                    education: personalForm.querySelector('[name="education"]').value,
                    experience: personalForm.querySelector('[name="experience"]:checked')?.value,
                    motivation: personalForm.querySelector('[name="motivation"]').value
                },
                preferences: {
                    schedule: preferencesForm.querySelector('[name="schedule"]:checked')?.value,
                    learningType: preferencesForm.querySelector('[name="learning_type"]:checked')?.value,
                    features: Array.from(preferencesForm.querySelectorAll('[name="features[]"]:checked')).map(cb => cb.value),
                    goals: preferencesForm.querySelector('[name="goals"]').value
                },
                agreements: {
                    terms: document.getElementById('terms-checkbox').checked,
                    newsletter: document.getElementById('newsletter-checkbox').checked
                }
            };
            
            return formData;
        }

        // Success modal button handlers
        document.getElementById('accessCourseBtn').addEventListener('click', function() {
            // Redirect to course or forum - you can customize this URL
            window.location.href = `/course/${courseData.id}`;
        });

        document.getElementById('goToDashboardBtn').addEventListener('click', function() {
            // Redirect to dashboard
            window.location.href = '/dashboard';
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

        // Update student count
        function updateStudentCount() {
            if (!courseData.hasStudentCount) return;
            
            document.getElementById('current-students').textContent = courseData.currentStudents;
            document.getElementById('max-students').textContent = courseData.maxStudents;
            
            const percentage = (courseData.currentStudents / courseData.maxStudents) * 100;
            document.getElementById('student-progress').style.width = `${percentage}%`;
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
            initializeCourseData();
            showStep(1);
            
            if (courseData.hasCountdown) {
                updateCountdown();
                setInterval(updateCountdown, 1000);
            }
            
            // Welcome message
            setTimeout(() => {
                const message = courseData.isFree ? 
                    `Selamat datang! Daftar GRATIS untuk ${courseData.title} sekarang!` : 
                    `Selamat datang! Mulai pendaftaran untuk ${courseData.title}`;
                showNotification(message, 'success');
            }, 500);
        });