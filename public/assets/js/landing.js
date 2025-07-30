window.addEventListener('load', () => {
      setTimeout(() => {
        document.getElementById('loadingOverlay').classList.add('opacity-0', 'pointer-events-none');
      }, 1000);
    });

    // Custom Cursor
    const cursor = document.getElementById('cursor');
    const trails = [];
    const trailCount = 5;

    // Create cursor trails
    for (let i = 0; i < trailCount; i++) {
      const trail = document.createElement('div');
      trail.className = 'cursor-trail';
      document.body.appendChild(trail);
      trails.push(trail);
    }

    document.addEventListener('mousemove', (e) => {
      cursor.style.left = e.clientX + 'px';
      cursor.style.top = e.clientY + 'px';

      // Animate trails
      trails.forEach((trail, index) => {
        setTimeout(() => {
          trail.style.left = e.clientX + 'px';
          trail.style.top = e.clientY + 'px';
        }, index * 50);
      });
    });

    // Cursor hover effects
    document.querySelectorAll('button, a, .pagination-dot').forEach(el => {
      el.addEventListener('mouseenter', () => {
        cursor.classList.add('scale-150');
      });
      el.addEventListener('mouseleave', () => {
        cursor.classList.remove('scale-150');
      });
    });

    // Create Particles
    function createParticles() {
      const particlesContainer = document.getElementById('particles');
      
      for (let i = 0; i < 20; i++) {
        const particle = document.createElement('div');
        particle.className = 'absolute w-1 h-1 bg-purple-400 bg-opacity-60 rounded-full particle-float';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 3 + 's';
        particlesContainer.appendChild(particle);
      }
    }

    // Initialize Swiper
    const swiper = new Swiper('.onboarding-swiper', {
      loop: false,
      allowTouchMove: true,
      slidesPerView: 1,
      spaceBetween: 30,
      speed: 800,
      effect: 'slide',
      autoHeight: false,
      on: {
        init: function() {
          updatePagination(0);
          animateSlideElements(0);
        },
        slideChange: function() {
          updatePagination(this.activeIndex);
          updateNextButton(this.activeIndex, this.slides.length);
          animateSlideElements(this.activeIndex);
        }
      }
    });

    // Animate slide elements
    function animateSlideElements(activeIndex) {
      // Reset all slides
      document.querySelectorAll('.slide-title, .slide-text').forEach(el => {
        el.classList.add('opacity-0', 'translate-y-5');
      });

      // Animate active slide
      const activeSlide = document.querySelectorAll('.swiper-slide')[activeIndex];
      const title = activeSlide.querySelector('.slide-title');
      const text = activeSlide.querySelector('.slide-text');

      setTimeout(() => {
        title.classList.remove('opacity-0', 'translate-y-5');
      }, 200);

      setTimeout(() => {
        text.classList.remove('opacity-0', 'translate-y-5');
      }, 400);
    }

    // Custom Pagination
    function updatePagination(activeIndex) {
      const dots = document.querySelectorAll('.pagination-dot');
      dots.forEach((dot, index) => {
        if (index === activeIndex) {
          dot.classList.add('active', 'custom-gradient', 'scale-125');
          dot.classList.remove('bg-white', 'bg-opacity-30');
        } else {
          dot.classList.remove('active', 'custom-gradient', 'scale-125');
          dot.classList.add('bg-white', 'bg-opacity-30');
        }
      });
    }

    // Pagination click events
    document.querySelectorAll('.pagination-dot').forEach((dot, index) => {
      dot.addEventListener('click', () => {
        swiper.slideTo(index);
      });
    });

    // Next Button Logic
    function updateNextButton(activeIndex, totalSlides) {
      const nextBtn = document.getElementById('nextBtn');
      
      if (activeIndex === totalSlides - 1) {
        nextBtn.innerHTML = '<i class="ph ph-check"></i>';
        nextBtn.onclick = function() {
          // Add completion animation
          nextBtn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
          nextBtn.classList.add('scale-125');
          
          setTimeout(() => {
            window.location.href = '#'; // Replace with actual URL
          }, 500);
        };
      } else {
        nextBtn.innerHTML = '<i class="ph ph-arrow-right"></i>';
        nextBtn.onclick = function() {
          swiper.slideNext();
        };
      }
    }

    // Initialize next button
    document.getElementById('nextBtn').onclick = function() {
      if (swiper.activeIndex < swiper.slides.length - 1) {
        swiper.slideNext();
      }
    };

    // Interactive hover effects for slides
    document.querySelectorAll('.swiper-slide').forEach(slide => {
      slide.addEventListener('mouseenter', () => {
        if (!slide.classList.contains('swiper-slide-active')) {
          slide.classList.add('bg-opacity-10');
        }
      });
      
      slide.addEventListener('mouseleave', () => {
        if (!slide.classList.contains('swiper-slide-active')) {
          slide.classList.remove('bg-opacity-10');
        }
      });
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') {
        swiper.slideNext();
      } else if (e.key === 'ArrowLeft') {
        swiper.slidePrev();
      } else if (e.key === 'Enter' || e.key === ' ') {
        document.getElementById('nextBtn').click();
      }
    });

    // Add click ripple effect
    document.querySelectorAll('button').forEach(button => {
      button.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.className = 'absolute rounded-full bg-white bg-opacity-30 pointer-events-none';
        ripple.style.transform = 'scale(0)';
        ripple.style.animation = 'ripple 0.6s linear';
        
        this.appendChild(ripple);
        
        setTimeout(() => {
          ripple.remove();
        }, 600);
      });
    });

    // Initialize everything
    createParticles();
    
    // Add active states for pagination dots
    document.querySelectorAll('.pagination-dot').forEach((dot, index) => {
      if (index === 0) {
        dot.classList.add('pulse-ring');
      }
    });