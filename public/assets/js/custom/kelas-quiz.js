const quizData = {
    questions: [
        {
            id: 1,
            question: "Apa yang dimaksud dengan JSX dalam React?",
            options: [
                { value: "a", text: "JavaScript XML", description: "Sebuah ekstensi sintaks untuk JavaScript yang memungkinkan penulisan markup seperti HTML di dalam kode JavaScript" },
                { value: "b", text: "Java Server Extensions", description: "Sebuah teknologi server-side untuk menjalankan aplikasi Java di web browser" },
                { value: "c", text: "JavaScript eXtended", description: "Sebuah versi lanjutan dari JavaScript dengan fitur-fitur tambahan untuk development" },
                { value: "d", text: "JSON Syntax Extension", description: "Sebuah ekstensi untuk format JSON yang mendukung sintaks yang lebih kompleks" }
            ],
            correct: "a"
        }
        // ... 9 more questions would be here
    ],
    timeLimit: 900 // 15 minutes in seconds
};

// Quiz state
let currentQuestionIndex = 0;
let userAnswers = {};
let timeRemaining = quizData.timeLimit;
let timerInterval;

// Initialize quiz
document.addEventListener('DOMContentLoaded', function() {
    startTimer();
    loadQuestion(currentQuestionIndex);
});

// Timer functionality
function startTimer() {
    timerInterval = setInterval(function() {
        timeRemaining--;
        updateTimerDisplay();
        
        if (timeRemaining <= 0) {
            clearInterval(timerInterval);
            autoSubmitQuiz();
        }
    }, 1000);
}

function updateTimerDisplay() {
    const minutes = Math.floor(timeRemaining / 60);
    const seconds = timeRemaining % 60;
    document.getElementById('timer').textContent = 
        `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    
    // Change color when time is running out
    const timer = document.getElementById('timer');
    if (timeRemaining <= 300) { // Last 5 minutes
        timer.classList.add('text-red-600');
    } else if (timeRemaining <= 600) { // Last 10 minutes
        timer.classList.add('text-yellow-600');
    }
}

// Question navigation
function loadQuestion(index) {
    // Update progress
    const progress = ((index + 1) / 10) * 100;
    document.getElementById('progressBar').style.width = progress + '%';
    document.getElementById('currentQuestion').textContent = index + 1;
    
    // Update navigation buttons
    document.getElementById('prevBtn').disabled = (index === 0);
    
    const nextBtn = document.getElementById('nextBtn');
    if (index === 9) { // Last question
        nextBtn.innerHTML = '<span>Selesai</span><i class="ph ph-check ml-2"></i>';
        nextBtn.onclick = showCompleteModal;
    } else {
        nextBtn.innerHTML = '<span>Selanjutnya</span><i class="ph ph-arrow-right ml-2"></i>';
        nextBtn.onclick = nextQuestion;
    }
}

function nextQuestion() {
    if (currentQuestionIndex < 9) {
        saveCurrentAnswer();
        currentQuestionIndex++;
        loadQuestion(currentQuestionIndex);
    }
}

function prevQuestion() {
    if (currentQuestionIndex > 0) {
        saveCurrentAnswer();
        currentQuestionIndex--;
        loadQuestion(currentQuestionIndex);
    }
}

function saveCurrentAnswer() {
    const selectedOption = document.querySelector('input[name="question1"]:checked');
    if (selectedOption) {
        userAnswers[currentQuestionIndex] = selectedOption.value;
    }
}

// Modal functions
function showExitConfirm() {
    document.getElementById('exitModal').classList.remove('hidden');
    document.getElementById('exitModal').classList.add('flex');
}

function hideExitConfirm() {
    document.getElementById('exitModal').classList.add('hidden');
    document.getElementById('exitModal').classList.remove('flex');
}

function exitQuiz() {
    clearInterval(timerInterval);
    window.location.href = '/desktop/kelas-materi'; 
}

function showCompleteModal() {
    saveCurrentAnswer();
    clearInterval(timerInterval);
    
    // Calculate score (mock calculation)
    const score = calculateScore();
    updateScoreDisplay(score);
    
    document.getElementById('completeModal').classList.remove('hidden');
    document.getElementById('completeModal').classList.add('flex');
}

function calculateScore() {
    // Mock score calculation - in real app this would be done on backend
    const correctAnswers = Object.keys(userAnswers).length;
    return {
        score: 85,
        correct: 8,
        total: 10
    };
}

function updateScoreDisplay(scoreData) {
    const scoreElement = document.querySelector('#completeModal .text-4xl');
    const detailElement = document.querySelector('#completeModal .text-lg');
    
    scoreElement.textContent = `${scoreData.score}/100`;
    detailElement.textContent = `${scoreData.correct} dari ${scoreData.total} jawaban benar`;
}

function autoSubmitQuiz() {
    // Auto submit when time runs out
    showCompleteModal();
}

// Answer selection handling
document.addEventListener('change', function(e) {
    if (e.target.type === 'radio') {
        // Visual feedback for selected answer
        const labels = document.querySelectorAll('label');
        labels.forEach(label => {
            label.classList.remove('border-p2', 'bg-p2/10');
            label.classList.add('border-gray-200');
        });
        
        const selectedLabel = e.target.closest('label');
        selectedLabel.classList.remove('border-gray-200');
        selectedLabel.classList.add('border-p2', 'bg-p2/10');
    }
});

// Quick navigation
document.querySelectorAll('.grid button').forEach((btn, index) => {
    btn.addEventListener('click', function() {
        if (index < 10) { // Make sure it's a question number button
            saveCurrentAnswer();
            currentQuestionIndex = index;
            loadQuestion(currentQuestionIndex);
            
            // Update quick nav indicators
            document.querySelectorAll('.grid button').forEach(b => {
                b.classList.remove('bg-p2', 'text-white');
                b.classList.add('bg-gray-200', 'text-gray-600');
            });
            this.classList.remove('bg-gray-200', 'text-gray-600');
            this.classList.add('bg-p2', 'text-white');
        }
    });
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowRight' && currentQuestionIndex < 9) {
        nextQuestion();
    } else if (e.key === 'ArrowLeft' && currentQuestionIndex > 0) {
        prevQuestion();
    } else if (e.key >= '1' && e.key <= '4') {
        // Select answer with number keys
        const optionIndex = parseInt(e.key) - 1;
        const options = document.querySelectorAll('input[type="radio"]');
        if (options[optionIndex]) {
            options[optionIndex].checked = true;
            options[optionIndex].dispatchEvent(new Event('change', { bubbles: true }));
        }
    }
});

// Prevent accidental page refresh
window.addEventListener('beforeunload', function(e) {
    if (timeRemaining > 0) {
        e.preventDefault();
        e.returnValue = 'Quiz sedang berlangsung. Yakin ingin keluar?';
        return e.returnValue;
    }
});

// Bookmark functionality
document.querySelector('.border-2.border-gray-300').addEventListener('click', function() {
    this.classList.toggle('border-yellow-500');
    this.classList.toggle('bg-yellow-50');
    this.classList.toggle('text-yellow-700');
    
    const icon = this.querySelector('i');
    icon.classList.toggle('ph-bookmark');
    icon.classList.toggle('ph-bookmark-simple-fill');
    
    // Show feedback
    const span = this.querySelector('span');
    if (this.classList.contains('border-yellow-500')) {
        span.textContent = 'Ditandai';
    } else {
        span.textContent = 'Tandai';
    }
});

// Add prev button functionality
document.getElementById('prevBtn').addEventListener('click', prevQuestion);

// Focus management for accessibility
document.addEventListener('DOMContentLoaded', function() {
    // Focus first radio button when page loads
    const firstRadio = document.querySelector('input[type="radio"]');
    if (firstRadio) {
        firstRadio.focus();
    }
});