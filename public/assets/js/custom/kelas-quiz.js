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
let timeRemaining = quizData.timeLimit;
let timerInterval;
let quizSubmitted = false;
let currentQuestionIndex = 0;
let userAnswers = {};


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

function loadQuestion(index) {
    const totalQuestions = document.querySelectorAll('[id^="question-"]').length;
    
    // Update progress
    const progress = ((index + 1) / totalQuestions) * 100;
    document.getElementById('progressBar').style.width = progress + '%';
    document.getElementById('currentQuestion').textContent = index + 1;
    
    // Update navigation buttons
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    prevBtn.disabled = (index === 0);
    
    if (index === totalQuestions - 1) { // Last question
        nextBtn.style.display = 'none';
        // Show submit button
        const submitBtn = document.getElementById('submitButton');
        if (submitBtn) {
            submitBtn.style.display = 'block';
        }
    } else {
        nextBtn.style.display = 'inline-flex';
        // Hide submit button
        const submitBtn = document.getElementById('submitButton');
        if (submitBtn) {
            submitBtn.style.display = 'none';
        }
    }
}

function nextQuestion() {
    const totalQuestions = document.querySelectorAll('[id^="question-"]').length;
    if (currentQuestionIndex < totalQuestions - 1) {
        saveCurrentAnswer();
        currentQuestionIndex++;
        showOnlyQuestion(currentQuestionIndex);
        updateProgressBar(currentQuestionIndex);
        highlightActiveButton(currentQuestionIndex);
        loadQuestion(currentQuestionIndex);
    }
}

function prevQuestion() {
    if (currentQuestionIndex > 0) {
        saveCurrentAnswer();
        currentQuestionIndex--;
        showOnlyQuestion(currentQuestionIndex);
        updateProgressBar(currentQuestionIndex);
        highlightActiveButton(currentQuestionIndex);
        loadQuestion(currentQuestionIndex); 
    }
}

function scrollToQuestion(index) {
    const el = document.getElementById('question-' + index);
    if (el) el.scrollIntoView({ behavior: 'smooth' });
}


// function saveCurrentAnswer() {
//     const selectedOption = document.querySelector('input[name="question1"]:checked');
//     if (selectedOption) {
//         userAnswers[currentQuestionIndex] = selectedOption.value;
//     }
// }

function saveCurrentAnswer() {
    const currentQuestionDiv = document.getElementById(`question-${currentQuestionIndex}`);
    if (currentQuestionDiv) {
        const selectedOption = currentQuestionDiv.querySelector('input[type="radio"]:checked');
        if (selectedOption) {
            userAnswers[currentQuestionIndex] = selectedOption.value;
        }
    }
}

// Fungsi tampilkan soal tertentu
    function showOnlyQuestion(index) {
        document.querySelectorAll('[id^="question-"]').forEach((q, i) => {
            q.style.display = i === index ? 'block' : 'none';
        });
        document.getElementById('currentQuestion').textContent = index + 1;
    }

 // Fungsi update progress bar
    function updateProgressBar(index) {
        const totalQuestions = document.querySelectorAll('[id^="question-"]').length;
        const progress = ((index + 1) / totalQuestions) * 100;
        document.getElementById('progressBar').style.width = progress + '%';
}

    // Tandai tombol aktif di navigasi cepat
    function highlightActiveButton(index) {
        document.querySelectorAll('.grid button').forEach((btn, i) => {
            if (i === index) {
                btn.classList.add('bg-p2', 'text-white');
                btn.classList.remove('bg-gray-200', 'text-gray-600');
            } else {
                btn.classList.remove('bg-p2', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-600');
            }
        });
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

// function updateScoreDisplay(scoreData) {
//     const scoreElement = document.querySelector('#completeModal .text-4xl');
//     const detailElement = document.querySelector('#completeModal .text-lg');
    
//     scoreElement.textContent = `${scoreData.score}/100`;
//     detailElement.textContent = `${scoreData.correct} dari ${scoreData.total} jawaban benar`;
// }

function updateScoreDisplay(scoreData) {
    const scoreElement = document.getElementById('quiz-final-score');
    const detailElement = document.getElementById('quiz-final-detail');
    
    if (scoreElement) {
        scoreElement.textContent = `${scoreData.score}/100`;
    }
    if (detailElement) {
        detailElement.textContent = `${scoreData.correct} dari ${scoreData.total} jawaban benar`;
    }
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
        const totalQuestions = document.querySelectorAll('[id^="question-"]').length;
        if (index < totalQuestions) {
            saveCurrentAnswer();
            currentQuestionIndex = index;
            showOnlyQuestion(currentQuestionIndex);
            updateProgressBar(currentQuestionIndex);
            highlightActiveButton(currentQuestionIndex);
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

window.addEventListener('beforeunload', function (e) {
    if (!quizSubmitted) {
        e.preventDefault();
        e.returnValue = '';
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

document.addEventListener('DOMContentLoaded', function () {
    const quizForm = document.getElementById('quiz-form');
    if (!quizForm) {
        console.error('Form quiz tidak ditemukan!');
        return;
    }

    quizForm.addEventListener('submit', function (e) {
        e.preventDefault();
        quizSubmitted = true;

        const url = quizForm.dataset.submitUrl;
        const formData = new FormData(quizForm);

         fetch(url, {
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
        'Accept': 'application/json',
    },
    body: formData
    })
    .then(res => {
        console.log('Response status:', res.status);
        console.log('Response headers:', res.headers);
        if (!res.ok) {
            throw new Error(`HTTP ${res.status}`);
        }
        return res.json();
    })
    .then(data => {
        console.log("Response data:", data);
        // Update modal dengan data dari server
        updateScoreDisplay({
            score: data.percentage,
            correct: data.score,
            total: data.total
        });
        showCompleteModal();
    })
    .catch(err => {
        console.error("Gagal kirim quiz", err);
        alert("Gagal kirim jawaban. Coba lagi.");
        quizSubmitted = false;
    });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const totalQuestions = document.querySelectorAll('[id^="question-"]').length;

    // Tampilkan hanya soal pertama saat load
    showOnlyQuestion(currentQuestionIndex);
    updateProgressBar(currentQuestionIndex);

    // Tombol navigasi cepat
    document.querySelectorAll('.grid button').forEach((btn, index) => {
        btn.addEventListener('click', function () {
            currentQuestionIndex = index;
            showOnlyQuestion(currentQuestionIndex);
            updateProgressBar(currentQuestionIndex);
            highlightActiveButton(currentQuestionIndex);
        });
    });

    // Keyboard navigation (opsional)
    document.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowRight' && currentQuestionIndex < totalQuestions - 1) {
            currentQuestionIndex++;
            showOnlyQuestion(currentQuestionIndex);
            updateProgressBar(currentQuestionIndex);
            highlightActiveButton(currentQuestionIndex);
        } else if (e.key === 'ArrowLeft' && currentQuestionIndex > 0) {
            currentQuestionIndex--;
            showOnlyQuestion(currentQuestionIndex);
            updateProgressBar(currentQuestionIndex);
            highlightActiveButton(currentQuestionIndex);
        }
    });
});


function navigateToQuestion(index) {
    saveCurrentAnswer();
    currentQuestionIndex = index;
    showOnlyQuestion(currentQuestionIndex);
    updateProgressBar(currentQuestionIndex);
    highlightActiveButton(currentQuestionIndex);
    loadQuestion(currentQuestionIndex);
}

document.addEventListener('DOMContentLoaded', function() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    if (prevBtn) {
        prevBtn.addEventListener('click', prevQuestion);
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', nextQuestion);
    }
    
    // Initialize quiz
    loadQuestion(currentQuestionIndex);
    startTimer();
    
    // Setup quick navigation buttons
    const navButtons = document.querySelectorAll('.grid button');
    navButtons.forEach((btn, index) => {
        btn.addEventListener('click', function() {
            navigateToQuestion(index);
        });
    });
});