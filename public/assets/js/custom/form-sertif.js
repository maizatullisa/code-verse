document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('certificateForm');
    const fullNameInput = document.getElementById('fullName');
    const submitBtn = document.getElementById('submitBtn');
    const nameCheck = document.getElementById('nameCheck');

    // Floating label
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

    setupFloatingLabel(fullNameInput);

    form.addEventListener('submit', function (e) {
        if (!fullNameInput.value.trim()) {
            e.preventDefault();
            alert('Nama lengkap wajib diisi!');
            fullNameInput.focus();
            return;
        }

        submitBtn.disabled = true;
        submitBtn.classList.add('loading');
        submitBtn.querySelector('.button-text').textContent = 'Generating...';

       setTimeout(() => {
        const buttonText = submitBtn.querySelector('.button-text');
        buttonText.textContent = 'Generate Sertifikat Digital';
        submitBtn.classList.remove('loading');
        submitBtn.disabled = false;
        
        alert('Sertifikat berhasil dibuat!');
    }, 2000);
        // biarin submit tetap jalan biar PDF valid dikirim dari backend
    });
});

