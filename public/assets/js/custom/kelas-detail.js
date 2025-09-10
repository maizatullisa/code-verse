document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetTab = btn.getAttribute('data-tab');
            
            // Remove active class from all buttons and contents
            tabBtns.forEach(b => {
                b.classList.remove('active', 'bg-yellow-400');
                b.classList.add('hover:bg-white/20');
            });
            tabContents.forEach(content => {
                content.classList.remove('active');
                content.classList.add('hidden');
            });
            
            // Add active class to clicked button and corresponding content
            btn.classList.add('active', 'bg-yellow-400');
            btn.classList.remove('hover:bg-white/20');
            document.getElementById(targetTab).classList.remove('hidden');
            document.getElementById(targetTab).classList.add('active');
        });
    });
});