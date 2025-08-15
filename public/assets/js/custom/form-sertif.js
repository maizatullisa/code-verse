document.addEventListener('DOMContentLoaded', function() {
            // Get elements
            const fullNameInput = document.getElementById('fullName');
            const form = document.getElementById('certificateForm');
            const submitBtn = document.getElementById('submitBtn');
            const nameCheck = document.getElementById('nameCheck');
            
            // Handle floating labels
            function setupFloatingLabel(input) {
                const inputGroup = input.closest('.input-group');
                
                function updateLabel() {
                    if (input.value.trim() !== '') {
                        inputGroup.classList.add('has-value');
                        nameCheck.classList.remove('hidden');
                    } else {
                        inputGroup.classList.remove('has-value');
                        nameCheck.classList.add('hidden');
                    }
                }
                
                updateLabel();
                input.addEventListener('input', updateLabel);
                input.addEventListener('change', updateLabel);
            }

            // Setup floating labels
            setupFloatingLabel(fullNameInput);

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (!fullNameInput.value.trim()) {
                    alert('Nama lengkap harus diisi!');
                    fullNameInput.focus();
                    return;
                }

                // Show loading
                const buttonText = submitBtn.querySelector('.button-text');
                buttonText.textContent = 'Generating...';
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;

                // Simulate generation
                setTimeout(() => {
                    buttonText.textContent = 'Generate Sertifikat Digital';
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                    
                    alert('Sertifikat berhasil dibuat! Download akan dimulai...');
                    
                    console.log({
                        name: fullNameInput.value,
                        id: 'CV-' + Date.now()
                    });
                }, 2000);
            });
        });