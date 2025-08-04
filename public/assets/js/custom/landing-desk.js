let currentSlide = 1;
        const totalSlides = 3;

        function showSlide(slideNumber) {
            for (let i = 1; i <= totalSlides; i++) {
                const slide = document.getElementById(`slide-${i}`);
                slide.classList.remove('active');
            }
            
            const currentSlideElement = document.getElementById(`slide-${slideNumber}`);
            currentSlideElement.classList.add('active');
            
            const dots = document.querySelectorAll('.pagination-dot');
            dots.forEach((dot, index) => {
                dot.classList.remove('active');
                if (index === slideNumber - 1) {
                    dot.classList.add('active');
                }
            });
        }

        function nextSlide() {
            if (currentSlide < totalSlides) {
                currentSlide++;
                showSlide(currentSlide);
            } else {
                goToLogin();
            }
        }

        function goToLogin() {
            window.location.href = '/desktop/lorek-desktop';
        }

        document.getElementById('nextBtn').addEventListener('click', nextSlide);
        
        document.querySelectorAll('.skip-btn').forEach(btn => {
            btn.addEventListener('click', goToLogin);
        });

        document.querySelectorAll('.pagination-dot').forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index + 1;
                showSlide(currentSlide);
            });
        });
        setInterval(() => {
            if (currentSlide < totalSlides) {
                nextSlide();
            }
        }, 5000); 

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight' || e.key === ' ') {
                nextSlide();
            } else if (e.key === 'Escape') {
                goToLogin();
            }
        });