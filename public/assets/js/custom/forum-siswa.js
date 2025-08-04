        // Auto-resize textarea
        document.querySelectorAll('textarea').forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        });

        // Like button functionality
        document.querySelectorAll('[data-like-btn]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const heartIcon = this.querySelector('i');
                const countSpan = this.querySelector('span');
                let count = parseInt(countSpan.textContent.split(' ')[0]);
                
                if (heartIcon.classList.contains('ph-fill')) {
                    // Unlike
                    heartIcon.classList.remove('ph-fill', 'text-red-500');
                    heartIcon.classList.add('ph');
                    count--;
                    this.classList.remove('text-red-500');
                    this.classList.add('text-gray-500');
                } else {
                    // Like
                    heartIcon.classList.add('ph-fill', 'text-red-500');
                    heartIcon.classList.remove('ph');
                    count++;
                    this.classList.add('text-red-500');
                    this.classList.remove('text-gray-500');
                }
                
                countSpan.textContent = count + ' Suka';
            });
        });

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

        // Form submission handlers
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            showNotification('Diskusi berhasil diposting!', 'success');
            this.reset();
        });

        // Reply form handlers
        document.querySelectorAll('.reply-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                showNotification('Balasan berhasil dikirim!', 'success');
                this.reset();
            });
        });

        // Bookmark functionality
        document.querySelectorAll('[data-bookmark-btn]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');
                
                if (icon.classList.contains('ph-fill')) {
                    icon.classList.remove('ph-fill');
                    icon.classList.add('ph');
                    showNotification('Dihapus dari bookmark', 'info');
                } else {
                    icon.classList.add('ph-fill');
                    icon.classList.remove('ph');
                    showNotification('Ditambahkan ke bookmark', 'success');
                }
            });
        });

        // Quick action buttons
        document.querySelectorAll('.quick-action').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.querySelector('span').textContent;
                showNotification(`Membuka ${action}...`, 'info');
            });
        });

        // Real-time updates simulation
        function simulateRealTimeUpdates() {
            // Simulate new message notification
            setTimeout(() => {
                showNotification('💬 Sarah Dewi membalas pertanyaan Anda', 'info');
            }, 30000);

            // Simulate online status updates
            setInterval(() => {
                const onlineCount = document.querySelector('.bg-green-100 .text-green-800');
                if (onlineCount) {
                    let count = parseInt(onlineCount.textContent);
                    count = Math.max(15, Math.min(30, count + Math.floor(Math.random() * 3) - 1));
                    onlineCount.textContent = count;
                }
            }, 45000);
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            simulateRealTimeUpdates();
            
            // Welcome message for new students
            setTimeout(() => {
                showNotification('Selamat datang di forum diskusi! Jangan ragu untuk bertanya 😊', 'success');
            }, 1000);
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Search functionality
        function filterDiscussions(query) {
            const discussions = document.querySelectorAll('.discussion-item');
            discussions.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(query.toLowerCase())) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + K for quick search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                const searchInput = document.querySelector('input[type="search"]');
                if (searchInput) {
                    searchInput.focus();
                }
            }
            
            // Ctrl/Cmd + Enter to submit forms
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                const activeElement = document.activeElement;
                if (activeElement.tagName === 'TEXTAREA') {
                    const form = activeElement.closest('form');
                    if (form) {
                        form.dispatchEvent(new Event('submit'));
                    }
                }
            }
        });

        // Image lazy loading
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        }

        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }
        function updateProgress() {
            const progressBar = document.querySelector('.progress-bar');
            const progressText = document.querySelector('.progress-text');
            
            if (progressBar && progressText) {
                let currentProgress = parseInt(progressText.textContent);
                if (Math.random() > 0.7) { // 30% chance to increase
                    currentProgress = Math.min(100, currentProgress + 1);
                    progressBar.style.width = currentProgress + '%';
                    progressText.textContent = currentProgress + '%';
                }
            }
        }

        // Update progress every 2 minutes
        setInterval(updateProgress, 120000);